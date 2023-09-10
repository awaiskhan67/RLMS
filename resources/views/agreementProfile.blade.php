@extends('layouts.base')
@section('content')
       <style>
            /* Custom CSS for the gap and image border */
            .img-with-border {
                border: 2px solid #ccc; /* Adjust the border style and color as needed */
                margin-bottom: 10px; /* Add a slight gap between image and content */
                padding: 10px; /* Add padding inside the border */
            }



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
                    <h4 class="mb-sm-0">Agreement Profile</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('agreement') }}"><button class="btn-dark"><- Back to Agreements</button></a></li>
                            <li class="breadcrumb-item active">Agreement profile</li>
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
                            <div class="col-lg-12">
                               

                                        <div class="row">
                                            <!-----  --->
                                            <div class="col-md-6 col-xl-6">
                                                <div class="card m-b-30">
                                                    <div class="card-body">
                                                        <div class="d-md-flex align-items-center">
                                                            <!-- Image Section -->
                                                            <div class="col-md-6">
                                                                <a href=""><img src="{{ (!empty($agreement->property->image)) ? asset('uploads/'.$agreement->property->image) : asset('assets/images/small/property.png') }}" alt="" class="img-fluid w-100 img-with-border"></a>
                                                            </div>
                                                            <!-- Information Section -->
                                                            <div class="col-md-6" style="padding:20px;">
                                                                <h5 class="mb-2"><i class="fa fa-circle text-primary "></i> Property : {{ $agreement->property->name }} (5502)</h5>
                                                                <p class="m-0">Type : {{ $agreement->property->pcategory->name }} </p>
                                                                <p class="m-0">Country : {{ $agreement->property->country }} </p>
                                                                <p class="m-0">City : {{ $agreement->property->city }} </p>
                                                                <p class="m-0">Location : {{ $agreement->property->street }} </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!------ ---->

                                            <!-----  --->
                                            <div class="col-md-6 col-xl-6">
                                                <div class="card m-b-30">
                                                    <div class="card-body">
                                                        <div class="d-md-flex align-items-center">
                                                            <!-- Image Section -->
                                                            <div class="col-md-6">
                                                                <a href=""><img src="{{ (!empty($agreement->tenant->image)) ? asset('uploads/'.$agreement->tenant->image) : asset('assets/images/small/profile.png') }}" alt="" class="img-fluid w-100 img-with-border"></a>
                                                            </div>
                                                            <!-- Information Section -->
                                                            <div class="col-md-6" style="padding:20px;">
                                                                <h5 class=""><i class="fa fa-circle text-success "></i> {{ $agreement->tenant->f_name }} {{ $agreement->tenant->l_name }}</h5>
                                                                <p class="m-0">CNIC : {{ $agreement->tenant->cnic }}</p>
                                                                <p class="m-0">Email : {{ $agreement->tenant->email }}</p>
                                                                <p class="m-0">Contact : {{ $agreement->tenant->contact1 }}</p>
                                                                <p class="m-0">Country : {{ $agreement->tenant->country }}</p>
                                                                <p class="m-0">City : {{ $agreement->tenant->city }}</p>
                                                                <p class="m-0">Address : {{ $agreement->tenant->address }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!------ ---->
                                        </div><hr>



                                <div class="card shadow-lg">
                                    <div class="card-body">

                                        <div class="about-text go-to">
                                       
                                            <div class="row col-md-12 about-list">

                                                <div class="col-md-4">
                                                    <div class="media">
                                                        <label>Status</label>
                                                        <p>
                                                            @if($agreement->status == 1) <span class="badge bg-success" style="font-size:15px;">Active</span>@else
                                                            <span class="badge bg-danger" style="font-size:15px;">Not active</span>@endif
                                                        </p>
                                                    </div>
                                                    <!-- Add other details here -->
                                                </div>
                                        
                                                <div class="col-md-4">
                                                    <div class="media">
                                                        <label>Agreement Name</label>
                                                        <p>{{ $agreement->agreement_name }}</p>
                                                    </div>
                                                    <!-- Add other details here -->
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="media">
                                                        <label>Agreement Number</label>
                                                        <p><a >850265</a></p>
                                                    </div>
                                                    <!-- Add other details here -->
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="media">
                                                        <label>payment type</label>
                                                        <p>{{ $agreement->payment_frequency }}</p>
                                                    </div>
                                                    <!-- Add other details here -->
                                                </div>

                                                
                                                <div class="col-md-4">
                                                    <div class="media">
                                                        <label>Rent amount</label>
                                                        <p>{{ $agreement->rent }}</p>
                                                    </div>
                                                    <!-- Add other details here -->
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="media">
                                                        <label>Security Money</label>
                                                        <p>{{ $agreement->security_money }}</p>
                                                    </div>
                                                    <!-- Add other details here -->
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="media">
                                                        <label>Invrement</label>
                                                        <p>{{ $agreement->increment }} % /Years</p>
                                                    </div>
                                                    <!-- Add other details here -->
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="media">
                                                        <label>Period</label>
                                                        <p>{{ $agreement->period}} years</p>
                                                    </div>
                                                    <!-- Add other details here -->
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="media">
                                                        <label>Starting Date</label>
                                                        <p>{{ \Carbon\Carbon::parse($agreement->start_date)->format('F j, Y') }}</p>

                                                    </div>
                                                    <!-- Add other details here -->
                                                </div>
                                                
                                                <div class="col-md-4">
                                                    <div class="media">
                                                        <label>Attachment</label>
                                                        <p><button class="btn btn-success waves-effect waves-dark"><i class="fa fa-download"></i></button></p>
                                                    </div>
                                                    <!-- Add other details here -->
                                                </div><hr>

                                                 <div class="card-title">Condition</div>
                                            <!---conditions-->
                                               @foreach($conditions as $row)
                                                <div class="col-md-6">
                                                    <div class="media">   
                                                        <div class="my-2"><i class="fa fa-circle text-primary text-xs mr-1"></i>&nbsp;
                                                           <span style="font-size:20px;">{{ $row->condition }}</span>
                                                        </div>
                                                    </div>
                                                    <!-- Add other details here -->
                                                </div>
                                               @endforeach 
                                              
                                            <!--end of the condition-->

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="counter">
                                <div class="row">
                                    <div class="col-6 col-lg-6">
                                        <div class="count-data text-center">
                                            <h6 class="count h2" data-to="500" data-speed="500">564</h6>
                                            <p class="m-0px font-w-600 text-danger">Invoice Amount</p>
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-6">
                                        <div class="count-data text-center">
                                            <h6 class="count h2" data-to="150" data-speed="150">150</h6>
                                            <p class="m-0px font-w-600 text-success">Paid Amout</p>
                                        </div>
                                    </div>
                                  
                                </div>
                            </div>


                        </div>
                    </div>
                </section>
            

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