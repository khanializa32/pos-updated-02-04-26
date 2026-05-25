<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

class CommissionAgentSaleMade implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $agentName;
    public $invoice_no;
    public $businessId;
    public $currentUserId;

    public function __construct(string $agentName, string $invoice_no, int $businessId, int $currentUserId = null)
    {
        $this->agentName = $agentName;
        $this->invoice_no = $invoice_no;
        $this->businessId = $businessId;
        $this->currentUserId = $currentUserId;
    }

    public function broadcastOn()
    {
        return new Channel('admin-sales');
    }

    public function broadcastAs()
    {
        return 'commission.sale';
    }
}
