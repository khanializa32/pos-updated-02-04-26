<?php

namespace App;

use App\Events\TransactionPaymentDeleted;
use App\Events\TransactionPaymentUpdated;
use Illuminate\Database\Eloquent\Model;

class TransactionPayment extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * Get the phone record associated with the user.
     */
    public function payment_account()
    {
        return $this->belongsTo(\App\Account::class, 'account_id');
    }

    /**
     * Get the transaction related to this payment.
     */
    public function transaction()
    {
        return $this->belongsTo(\App\Transaction::class, 'transaction_id');
    }

    /**
     * Get the user.
     */
    public function created_user()
    {
        return $this->belongsTo(\App\User::class, 'created_by');
    }

    /**
     * Get child payments
     */
    public function child_payments()
    {
        return $this->hasMany(\App\TransactionPayment::class, 'parent_id');
    }

    /**
     * Retrieves documents path if exists
     */
    public function getDocumentPathAttribute()
    {
        $path = ! empty($this->document) ? asset('/uploads/documents/'.$this->document) : null;

        return $path;
    }

    /**
     * Removes timestamp from document name
     */
    public function getDocumentNameAttribute()
    {
        $document_name = ! empty(explode('_', $this->document, 2)[1]) ? explode('_', $this->document, 2)[1] : $this->document;

        return $document_name;
    }

    protected static function addCashRegisterReversalForDeletedPayment(self $payment): void
    {
        if (empty($payment->transaction_id) || empty($payment->method) || empty($payment->amount)) {
            return;
        }

        $cash_register_id = CashRegisterTransaction::where('transaction_id', $payment->transaction_id)
            ->orderBy('id', 'desc')
            ->value('cash_register_id');

        if (empty($cash_register_id)) {
            return;
        }

        $transaction = $payment->relationLoaded('transaction')
            ? $payment->transaction
            : Transaction::select('id', 'type')->find($payment->transaction_id);

        if (empty($transaction) || empty($transaction->type)) {
            return;
        }

        $amount = (float) $payment->amount;
        $is_return = (int) ($payment->is_return ?? 0) === 1;
        $signed_amount = $is_return ? (-1 * $amount) : $amount;
        $reversal_amount = -1 * $signed_amount;

        if ($reversal_amount == 0.0) {
            return;
        }

        CashRegisterTransaction::create([
            'cash_register_id' => $cash_register_id,
            'amount' => $reversal_amount,
            'pay_method' => $payment->method,
            'type' => $transaction->type === 'expense' ? 'debit' : 'credit',
            'transaction_type' => $transaction->type,
            'transaction_id' => $payment->transaction_id,
        ]);
    }
    
    public static function deletePayment($payment)
    {
        //Update parent payment if exists
        if (! empty($payment->parent_id)) {
            $parent_payment = TransactionPayment::find($payment->parent_id);
            $parent_payment->amount -= $payment->amount;

            if ($parent_payment->amount <= 0) {
                self::addCashRegisterReversalForDeletedPayment($parent_payment);
                $parent_payment->delete();
                event(new TransactionPaymentDeleted($parent_payment));
            } else {
                $parent_payment->save();
                //Add event to update parent payment account transaction
                event(new TransactionPaymentUpdated($parent_payment, null));
            }
        }

        self::addCashRegisterReversalForDeletedPayment($payment);
        $payment->delete();

        $transactionUtil = new \App\Utils\TransactionUtil();

        if (! empty($payment->transaction_id)) {
            //update payment status
            $transaction = $payment->load('transaction')->transaction;
            $transaction_before = $transaction->replicate();

            $payment_status = $transactionUtil->updatePaymentStatus($payment->transaction_id);

            $transaction->payment_status = $payment_status;

            $transactionUtil->activityLog($transaction, 'payment_edited', $transaction_before);
        }

        $log_properities = [
            'id' => $payment->id,
            'ref_no' => $payment->payment_ref_no,
        ];
        $transactionUtil->activityLog($payment, 'payment_deleted', null, $log_properities);

        //Add event to delete account transaction
        event(new TransactionPaymentDeleted($payment));
    }

    public function denominations()
    {
        return $this->morphMany(\App\CashDenomination::class, 'model');
    }
}
