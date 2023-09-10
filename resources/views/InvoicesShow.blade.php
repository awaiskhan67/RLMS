@extends('layouts.base')
@section('content')

       <!-- start page title -->
       <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Invoices</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('invoices.index') }}"><button class="btn-dark"><- Back to Invoices</button></a></li>
                            <li class="breadcrumb-item active">Invoices</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="card"> 
           <div class="card-body"> 
           <div class="d-flex align-items-center justify-content-between">
                <h1 class="card-title">Invoices for Year -- {{ $selectedYear }}</h1>
                
            </div><hr>
 
            <table id="datatable" class="table table-bordered  dt-responsive table-hover" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead class="table-light">
                    <tr>
                        <th>Invoice ID</th>
                        <th>Invoice Date</th>
                        <th>Status</th>
                        <th>Late fee Amount</th>
                        <th>Total Amount</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $lateFeeTotal = 0;
                        $totalAmountTotal = 0;
                    @endphp
                    @foreach($invoices as $invoice)
                            @php
                                $lateFeeTotal += $invoice->late_fee_amount;
                                $totalAmountTotal += $invoice->total_amount;
                            @endphp
                        <tr>
                            <td>{{ $invoice->id }}</td>
                            <td>{{ $invoice->created_at->formatLocalized('%B %d, %Y') }}</td>
                            <td>Active</td>
                            <td>{{ $invoice->late_fee_amount }}</td>
                            <td>{{ $invoice->total_amount }}</td>
                            <td><a href="{{ route('invoice.print', ['invoiceId' => $invoice->id]) }}" class="btn btn-dark">Action</a></td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot class="table-warning">
                    <tr>
                        <th colspan="3">Totals:</th>
                        <th>Total : {{ $lateFeeTotal }}</th>
                        <th>Total : {{ $totalAmountTotal }}</th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>

           </div>
        </div>
            
@endsection


@section('script')

<script>






</script>

@endsection