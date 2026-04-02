@extends('layouts.app')
@section('title', 'Informe de Sobrantes y Faltantes')

@section('content')
<section class="content-header">
    <h1>Informe de Sobrantes y Faltantes  en Caja</h1>
</section>

<section class="content">
    <div class="box box-primary">
        <div class="box-body">
            {!! Form::open(['url' => action([\App\Http\Controllers\CashRegisterController::class, 'getDiffReport']), 'method' => 'get']) !!}
                <div class="col-md-4">
                    <div class="form-group">
                        {!! Form::label('user_id', 'Seleccionar Cajero:') !!}
                        {!! Form::select('user_id', $users, request()->input('user_id'), ['class' => 'form-control select2', 'placeholder' => 'Todos']) !!}
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        {!! Form::label('date_range', 'Rango de Fechas:') !!}
                        <div class="input-group">
                            <input type="date" name="start_date" value="{{request()->input('start_date')}}" class="form-control">
                            <span class="input-group-addon">-</span>
                            <input type="date" name="end_date" value="{{request()->input('end_date')}}" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn bg-info text-white" style="margin-top: 25px;">Buscar</button>
                </div>
            {!! Form::close() !!}
        </div>
    </div>

    <div class="box">
        <div class="box-body">
            <table class="table table-bordered table-striped" id="diff_report_table">
    <thead>
        <tr>
            <th>Fecha Cierre</th>
            <th>Cajero</th>
            <th>Valor del Cierre</th>
            <th>Diferencia</th>
            <th>Estado</th>
        </tr>
    </thead>
    <tbody>
        @foreach($diff_reports as $report)
        <tr>
            <td>{{ @format_datetime($report->closed_at) }}</td>
            <td>{{ $report->first_name }} {{ $report->last_name }}</td>
            <td><span class="display_currency" data-currency_symbol="true">{{ $report->closing_amount }}</span></td>
            <td>
                @if($report->difference_amount < 0)
                    <span class="text-danger"><b>{{ @num_format($report->difference_amount) }}</b></span>
                @elseif($report->difference_amount > 0)
                    <span class="text-success"><b>{{ @num_format($report->difference_amount) }}</b></span>
                @else
                    <span class="text-muted">0</span>
                @endif
            </td>
            <td>
                @if($report->difference_amount < 0) Faltante @elseif($report->difference_amount > 0) Sobrante @else Cuadrado @endif
            </td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
    <tr class="bg-gray font-17 footer-total" style="font-weight: bold;">
        <td colspan="3" class="text-right"><strong>Totales del Periodo:</strong></td>
        <td colspan="2">
            <div style="margin-bottom: 5px;">
                <span class="text-success font-weight-bold">Total Sobrantes:</span>
                <span class="display_currency" data-currency_symbol="true" style="font-weight: bold;">{{ $total_sobrante }}</span>
            </div>
            <div style="margin-bottom: 5px;">
                <span class="text-danger font-weight-bold">Total Faltantes:</span> 
                <span class="display_currency" data-currency_symbol="true" style="font-weight: bold;">{{ $total_faltante }}</span>
            </div>
            <hr style="margin: 5px 0; border-top: 1px dashed #000;">
            <div>
                <strong>Saldo:</strong> 
                <span class="display_currency {{ $neto < 0 ? 'text-danger' : 'text-success' }}" 
                    data-currency_symbol="true" style="font-weight: bold;">{{ $neto }}</span>
            </div>
        </td>
    </tr>
</tfoot>
</table>
        </div>
    </div>
</section>
@endsection