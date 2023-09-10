@extends('layouts.base')
@section('content')

       <!-- start page title -->
       <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Invoice</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Invoice</a></li>
                            <li class="breadcrumb-item active">Invoice</li>
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
                                    <h4 class="float-end font-size-16"><strong>Order # 12345</strong></h4>
                                    <h3>
                                        <img src="{{ (!empty($company->logo)) ? asset('uploads/'.$company->logo) : asset('assets/images/small/property.png') }}" alt="logo" height="24"/>
                                    </h3>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-6">
                                        <address>
                                            <strong>Tentnant information :</strong><br>
                                            {{ $invoice->agreement->tenant->f_name }} {{ $invoice->agreement->tenant->l_name }}<br>
                                            CNIC : {{ $invoice->agreement->tenant->cnic }}<br>
                                            Country : {{ $invoice->agreement->tenant->country }}<br>
                                            Location : {{ $invoice->agreement->tenant->address }},{{ $invoice->agreement->tenant->city }}

                                        </address>
                                    </div>
                                    <div class="col-6 text-end">
                                        <address>
                                            <strong>Property information :</strong><br>
                                            {{ $invoice->agreement->property->name}}( {{ $invoice->agreement->property->serial_no }})<br>
                                            {{ $invoice->agreement->property->pcategory->name }}<br>
                                            Country : {{ $invoice->agreement->property->country }}<br>
                                            Address : {{ $invoice->agreement->property->street }},{{ $invoice->agreement->property->district }},{{ $invoice->agreement->property->city}}
                                        </address>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 mt-4">
                                        <address>
                                            <strong>Payment Due Date:</strong><br>
                                            {{ \Carbon\Carbon::parse($invoice->due_date)->format('F j, Y') }}<br><br>
                                        </address>
                                    </div>
                                    <div class="col-6 mt-4 text-end">
                                        <address>
                                            <strong>Payment Status:</strong><br>
                                            <div class="my-2"><i class="fa fa-circle text-danger-m2 text-xs mr-1"></i> <mark> {{ $invoice->status }} </mark> </div><br><br>
                                        </address>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div>
                                    <div class="p-2">
                                        <h3 class="font-size-16"><strong>Payment summary</strong></h3>
                                    </div>
                                    <div class="">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <td>Agreement id</td>
                                                    <td class="text-center"><strong>Rent Amount</strong></td>
                                                    <td class="thick-line text-end"><strong>Late fee</strong>
                                                    </td>
                                                    
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                                <tr>
                                                    <td># {{ $invoice->agreement->agreement_no }}</td>
                                                    <td class="text-center">{{ $invoice->rent_amount  }}</td>
                                                    <td class="thick-line text-end">{{ $invoice->late_fee_amount  }}</td>
                                                 
                                                </tr>
                                   
                                                <tr>
                                             
                                                    <td></td>
                                                    <td class="thick-line text-center">
                                                        <strong class="">Rent</strong></td>
                                                    <td class="thick-line text-end">{{ $invoice->rent_amount  }}</td>
                                                </tr>
                                                <tr>
                                            
                                                    <td></td>
                                                    <td class="no-line text-center">
                                                        <strong>Late fee</strong></td>
                                                    <td class="no-line text-end">{{ $invoice->late_fee_amount  }}</td>
                                                </tr>
                                                <tr>
                         
                                                   <td></td>
                                                    <td class="no-line text-center">
                                                        <strong>Total</strong></td>
                                                    <td class="no-line text-end"><h4 class="m-0">{{ $invoice->total_amount  }}</h4></td>
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