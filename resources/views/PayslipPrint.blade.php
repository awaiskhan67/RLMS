@extends('layouts.base')
@section('content')

       <!-- start page title -->
       <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Payslip</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('rent.Transactions') }}"><button class="btn-dark"><- Back to List</button></a></li>
                            <li class="breadcrumb-item active">Rent Payslip</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-12">
                                <div class="invoice-title">
                                    <h4 class="float-end font-size-16"><strong>Payslip # 12345</strong></h4>
                                    <h2>
                                    <img src="{{ (!empty($company->logo)) ? asset('uploads/' . $company->logo) : asset('assets/images/small/property.png') }}" alt="logo" height="24"/>

                                    </h2>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-6">
                                        <address>
                                            <strong>Tentnant information :</strong><br>
                                            {{ $payment->tenant->f_name }} {{ $payment->tenant->l_name }}<br>
                                            CNIC : {{ $payment->tenant->cnic }}<br>
                                            Country : {{ $payment->tenant->country }}<br>
                                            Location : {{ $payment->tenant->address }},{{ $payment->tenant->city }}

                                        </address>
                                    </div>
                                    <div class="col-6 text-end">
                                        <address>
                                            <strong>Property information :</strong><br>
                                            {{ $payment->property->name}}( {{ $payment->property->serial_no }})<br>
                                            {{ $payment->property->pcategory->name }}<br>
                                            Country : {{ $payment->property->country }}<br>
                                            Address : {{ $payment->property->street }},{{ $payment->property->district }},{{ $payment->property->city}}
                                        </address>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 mt-4">
                                        <address>
                                            <strong>Agreement:</strong><br>
                                            Rent amount : {{ $payment->agreement->rent }}<br>
                                            Period : {{ $payment->agreement->period }} years<br>
                                            Increment Rate : {{ $payment->agreement->increment }} %<br>
                                            
                                        </address>
                                    </div>
                                    <div class="col-6 mt-4 text-end">
                                        <address>
                                            <strong>Transaction info:</strong><br>
                                            Payment Frequency : {{ $payment->agreement->payment_frequency }}<br>
                                            Pay Date : {{ \Carbon\Carbon::parse($payment->due_date)->format('F j, Y') }}<br>
                                            Transaction Time : {{ $payment->created_at->format('d M / Y, g:i A') }}<br>
                                        </address>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div>
                                    <div class="p-2">
                                        <h3 class="font-size-16"><strong>Invoices & payments summary</strong></h3>
                                    </div>
                                    <div class="">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <td>Invoice id</td>
                                                    <td class="text-center"><strong>Due date</strong></td>
                                                    <td class="text-center"><strong>Total rent amount</strong></td>
                                                    <td class="text-center"><strong>Total late fee</strong></td>
                                                    <td class="thick-line text-end"><strong>Total amount</strong>
                                                    </td>
                                                    
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @php
                                                    $totalRent = 0;
                                                    $totalLateFee = 0;
                                                    $totalAmount = 0;
                                                @endphp

                                                @foreach($payment->invoices as $invoice)
                                                    <tr>
                                                        <td># 56952</td>
                                                        <td class="text-center">{{ \Carbon\Carbon::parse($invoice->due_date)->format('F j, Y') }}</td>
                                                        <td class="text-center">{{ $invoice->rent_amount  }}</td>
                                                        <td class="text-center">{{ $invoice->late_fee_amount  }}</td>
                                                        <td class="thick-line text-end">{{ $invoice->total_amount  }}</td>
                                                    </tr>

                                                    @php
                                                        $totalRent += $invoice->rent_amount;
                                                        $totalLateFee += $invoice->late_fee_amount;
                                                        $totalAmount += $invoice->total_amount;
                                                    @endphp

                                                @endforeach
                                                <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                               
                                   
                                                <tr>
                                                   <td></td>
                                                   <td></td>
                                                    <td></td>
                                                    <td class="thick-line text-center">
                                                        <strong class="">Total Rent</strong></td>
                                                    <td class="thick-line text-end">{{ $totalRent  }}</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td class="no-line text-center">
                                                        <strong>Toal Late fee</strong></td>
                                                    <td class="no-line text-end">{{ $totalLateFee  }}</td>
                                                </tr>
                                                <tr>
                                                   <td></td>
                                                   <td></td>
                                                   <td></td>
                                                    <td class="no-line text-center">
                                                        <strong>Total amount</strong></td>
                                                    <td class="no-line text-end"><h4 class="m-0">{{ $totalAmount  }}</h4></td>
                                                </tr>

                                                <tr>
                                                   <td></td>
                                                   <td></td>
                                                   <td></td>
                                                    <td class="no-line text-center">
                                                        <strong>Paid amount</strong></td>
                                                    <td class="no-line text-end"><h4 class="m-0">{{ $payment->amount  }}</h4></td>
                                                </tr>

                                                <tr>
                                                   <td></td>
                                                   <td></td>
                                                   <td></td>
                                                    <td class="no-line text-center"><strong>Extra paid</strong></td>
                                                    <td class="no-line text-end"><h4 class="m-0">@if($payment->amount > $totalAmount) {{ $payment->amount - $totalAmount  }} @else 0.00  @endif</h4></td>
                                                </tr>

                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="d-print-none">
                                            <div class="float-end">
                                                <a href="javascript:window.print()" class="btn btn-success waves-effect waves-light"><i class="fa fa-print"></i></a>
                                                <a href="#" class="btn btn-primary waves-effect waves-light ms-2">Send</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div> <!-- end row -->

                    </div>
                </div>
            </div> <!-- end col -->
        </div> 
        <!-- end row -->
@endsection


@section('script')

<script>






</script>

@endsection