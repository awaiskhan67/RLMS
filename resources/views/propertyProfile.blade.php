@extends('layouts.base')
@section('content')
       <style>
           .about-section .counter {
            padding: 22px 20px;
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 30px rgba(31, 45, 61, 0.125);
            }
            .about-section .counter .count-data {
            margin-top: 10px;
            margin-bottom: 10px;
            }
            .about-section .counter .count {
            font-weight: 700;
            color: #20247b;
            margin: 0 0 5px;
            }
            .about-section .counter p {
            font-weight: 600;
            margin: 0;
            }
            mark {
                background-image: linear-gradient(rgba(252, 83, 86, 0.6), rgba(252, 83, 86, 0.6));
                background-size: 100% 3px;
                background-repeat: no-repeat;
                background-position: 0 bottom;
                background-color: transparent;
                padding: 0;
                color: currentColor;
            }
            .theme-color {
                color: #fc5356;
            }
            .dark-color {
                color: #20247b;
            }

       </style>
       <!-- start page title -->
       <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Property Profile</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('property') }}"><button class="btn-dark"><- Back to Properties</button></a></li>
                            <li class="breadcrumb-item active">Propert profile</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="card">
            <div class="card-body">
                <section class="section about-section" id="about">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-6">
                                <div class="about-avatar d-flex justify-content-center">
                                    <img src="{{ (!empty($property->image)) ? asset('uploads/'.$property->image) : asset('assets/images/small/property.png') }}" alt="Profile Avatar" class="img-fluid border border-primary  mb-4">
                                </div>
                                <div class="d-flex justify-content-center">
                                    <!-- Large icons or buttons below the image -->
                                    <!-- <a href="#" class="btn btn-primary mx-2"><i class="fas fa-envelope"></i></a>
                                    <a href="#" class="btn btn-info mx-2"><i class="fas fa-phone"></i></a>
                                    <a href="#" class="btn btn-success mx-2"><i class="fab fa-skype"></i></a> -->
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="card shadow-lg">
                                    <div class="card-body">
                                        <div class="about-text go-to">
                                            <h6 class="theme-color lead">{{ $property->name  }}</h6>
                                            <hr>
                                            <p>{{ $property->shortDes }}</p>
                                            <hr>
                                            <div class="row about-list">
                                                <div class="col-md-6">
                                                    <div class="media">
                                                        <label>Occupied Status</label>
                                                        <p><span class="badge bg-success" style="font-size:15px;">Active</span></p>
                                                    </div>
                                                    <!-- Add other details here -->
                                                </div>
                                            

                                                <div class="col-md-6">
                                                    <div class="media">
                                                        <label>Property Name</label>
                                                        <p>{{ $property->name }}</p>
                                                    </div>
                                                    <!-- Add other details here -->
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="media">
                                                        <label>Property Number</label>
                                                        <p><a >850265</a></p>
                                                    </div>
                                                    <!-- Add other details here -->
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="media">
                                                        <label>Property Category</label>
                                                        <p>{{ $property->pcategory->name }}</p>
                                                    </div>
                                                    <!-- Add other details here -->
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="media">
                                                        <label>Country</label>
                                                        <p>{{ $property->country }}</p>
                                                    </div>
                                                    <!-- Add other details here -->
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="media">
                                                        <label>District</label>
                                                        <p>{{ $property->district }}</p>
                                                    </div>
                                                    <!-- Add other details here -->
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="media">
                                                        <label>City</label>
                                                        <p>{{ $property->city }}</p>
                                                    </div>
                                                    <!-- Add other details here -->
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="media">
                                                        <label>Location</label>
                                                        <p>{{ $property->street }}</p>
                                                    </div>
                                                    <!-- Add other details here -->
                                                </div>
                                        

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="counter">
                                <div class="row">
                                    <div class="col-6 col-lg-6">
                                        <div class="count-data text-center">
                                            <h6 class="count h2" data-to="{{ $totalInvoiceAmount }}" data-speed="500">{{ $totalInvoiceAmount }}</h6>
                                            <p class="m-0px font-w-600 text-danger">Invoice Amount</p>
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-6">
                                        <div class="count-data text-center">
                                            <h6 class="count h2" data-to="{{ $totalPaidAmount }}" data-speed="150">{{ $totalPaidAmount }}</h6>
                                            <p class="m-0px font-w-600 text-success">Paid Amout</p>
                                        </div>
                                    </div>
                                  
                                </div>
                            </div>


                        </div>
                    </div>
                </section>
                <hr>

                <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link @if(!$errors->any()) active @endif" data-bs-toggle="tab" href="#profile1" role="tab">
                            <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                            <span class="d-none d-sm-block">Agreement List</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if($errors->any()) active @endif" data-bs-toggle="tab" href="#messages1" role="tab">
                            <span class="d-block d-sm-none"><i class="fas fa-lock"></i></span>
                            <span class="d-none d-sm-block">Payments</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link @if($errors->any()) active @endif" data-bs-toggle="tab" href="#invoices" role="tab">
                            <span class="d-block d-sm-none"><i class="fas fa-lock"></i></span>
                            <span class="d-none d-sm-block">Invoices</span>
                        </a>
                    </li>
                </ul>

                <div class="tab-content p-3 text-muted">
                    <div class="tab-pane @if(!$errors->any()) active @endif" id="profile1" role="tabpanel">
                        <!-- Content for Property List tab -->
                            <table id="datatable" class="table table-bordered  dt-responsive table-hover" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead class="table-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Tenant Pic</th>
                                        <th>Tenant Info</th>
                                        <th>Agreement Info</th>
                                    </tr>
                                </thead>

                                <tbody>
                                        @php $i=1  @endphp
                                        @foreach ($agreements as $row)
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>
                                                <div style="width: 180px; height: 120px; overflow: hidden;">
                                                    <img class="rounded" alt="Image" src="{{ (!empty($row->tenant->image)) ? asset('uploads/'.$row->tenant->image) : asset('assets/images/small/profile.png') }}" style="object-fit: cover; width: 100%; height: 100%;" />
                                                </div>
                                            </td>
                                            <td>
                                                {{ $row->tenant->f_name  }}  {{ $row->tenant->l_name  }}<br>
                                                CNIC : {{ $row->tenant->cnic  }}<br>
                                                {{ $row->tenant->email  }} <br>
                                                {{ $row->tenant->contact1  }} / {{ $row->tenant->contact2  }}<br>
                                                {{ $row->tenant->country  }} , {{ $row->tenant->city  }}<br>
                                                1st Gaurantor : {{ $row->tenant->gaurantor1->f_name  }} {{ $row->tenant->gaurantor1->l_name  }} / {{ $row->tenant->gaurantor1->cnic }}
                                            </td>
                                            <td>
                                                Status : @if($row->status == 1) <span class="badge bg-success" style="font-size:15px;">Active</span> @else <span class="badge bg-danger" style="font-size:15px;">Not Active</span> @endif<br>
                                               {{ $row->agreement_no  }} ( {{ $row->agreement_name  }} )<br>
                                                Payment Type : {{ $row->payment_frequency  }}<br>
                                                Rent money : {{ $row->rent  }} <br>
                                                Security money : {{ $row->security_money  }} <br>
                                                Period : {{ $row->period  }}  Years <br>
                                                Increments : {{ $row->increment  }} % / Year
                                            </td>
                                        </tr>
                                            @php $i++  @endphp
                                        @endforeach
                                </tbody> 

                           
                            </table>

                    </div>

                    <div class="tab-pane @if($errors->any()) active @endif" id="messages1" role="tabpanel">
                        <!-- Content for Add New Property tab -->
                        <!---- ------->
                        <table id="datatable" class="table table-bordered  dt-responsive table-hover" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Tenant</th>
                                    <th>Paid Date</th>
                                    <th>Status</th>
                                    <th>Amount</th>
                                    <th>Transaction</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                    @php $i=1  @endphp
                                    @foreach ($allPayments as $row)
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>
                                            {{ $row['tenant']['f_name'] }} {{ $row['tenant']['l_name'] }}<br>
                                            CNIC : {{ $row['tenant']['cnic'] }}
                                        </td>
                                        <td>{{ \Carbon\Carbon::parse($row['pay_date'])->format('F j, Y') }}</td>
                                        <td>
                                            @if($row['status']  == 1) <span class="badge bg-success" style="font-size: 14px;">Paid</span>
                                            @else <span class="badge bg-danger" style="font-size: 14px;">Cancled</span> @endif
                                        </td>
                                        <td>{{ $row['amount'] }}</td>
                                        <td>
                                        By : {{ $row['user']['f_name'] }} {{ $row['user']['l_name'] }}<br>
                                        Email :  {{ $row['user']['email'] }}<br>
                                        Time : {{ \Carbon\Carbon::parse($row['created_at'])->format('d M / Y, g:i A') }}

                                        </td>
                                        <td> 
                                        <a href="{{ route('rentPay.Slip', $row['id']) }}"><i class="ri-printer-fill  text-primary" style="font-size: 24px;"></i></a>&nbsp;&nbsp;
                                            @if($row['confirm'] == 0)
                                            <a class="approve-confirm" data-id="{{ route('rentPay.confirm', $row['id']) }}" href="#"><i class="ri-checkbox-circle-fill  text-warning" style="font-size: 24px;"></i></a>&nbsp;&nbsp;
                                            <a class="cancel" data-id="{{ route('rentPay.cancel', $row['id']) }}" href="#"><i class="ri-close-circle-fill  text-danger" style="font-size: 24px;"></i></a> 
                                            @endif
                                        </td>
                                    </tr>
                                        @php $i++  @endphp
                                    @endforeach
                            </tbody> 

                        
                        </table>
                        <!------ ----->
                    </div>

                    
                    <div class="tab-pane @if($errors->any()) active @endif" id="invoices" role="tabpanel">
                        <!-- Content for Add New Property tab -->
                            <table id="datatable1" class="table table-bordered  dt-responsive table-hover" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead class="table-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Invoice no</th>
                                        <th>Agreement no</th>
                                        <th>Tenant</th>
                                        <th>Invoice amount</th>
                                        <th>Paid Amount</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                        @php $i=1  @endphp
                                        @foreach ($allInvoices as $row)
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td># 5252</td>
                                            <td>{{ $row['agreement']['agreement_no'] }}</td>
                                            <td>
                                                {{ $row['agreement']['tenant']['f_name'] }}
                                                {{ $row['agreement']['tenant']['l_name'] }}({{ $row['agreement']['tenant']['cnic'] }})
                                            </td>
                                            <td>{{ $row['total_amount']  }}</td>
                                            <td>{{ $row['paid_amount']  }}</td>
                                            <td> @if($row['status'] == 'paid')<span class="badge bg-danger" style="font-size:15px;">{{ $row['status']  }}</span>@else<span class="badge bg-danger" style="font-size:15px;">{{ $row['status']  }}</span> @endif</span></td>
                                            <td>{{ $row['paid_amount']  }}</td>
                                        </tr>
                                            @php $i++  @endphp
                                        @endforeach
                                </tbody> 

                           
                            </table>

                    </div>


                </div>
            </div>
        </div>

            
@endsection


@section('script')

<script>

  //this is for instant image showing for ptofile
  $(document).ready(function(){
            $('#profile').change(function(e){
                let reader = new FileReader();
                reader.onload = function(e){
                    $('#updateprofile').attr('src',e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    // end of the section




</script>

@endsection