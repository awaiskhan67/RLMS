@extends('layouts.base')
@section('content')
       <style>
           body{
    margin-top:20px;
}
/* User Cards */
.user-box {
    width: 110px;
    margin: auto;
    margin-bottom: 20px;
    
}

.user-box img {
    width: 100%;
    border-radius: 50%;
	padding: 3px;
	background: #fff;
	-webkit-box-shadow: 0px 5px 25px 0px rgba(0, 0, 0, 0.2);
    -moz-box-shadow: 0px 5px 25px 0px rgba(0, 0, 0, 0.2);
    -ms-box-shadow: 0px 5px 25px 0px rgba(0, 0, 0, 0.2);
    box-shadow: 0px 5px 25px 0px rgba(0, 0, 0, 0.2);
}

.profile-card-2 .card {
	position:relative;
}

.profile-card-2 .card .card-body {
	z-index:1;
}

.profile-card-2 .card::before {
    content: "";
    position: absolute;
    top: 0px;
    right: 0px;
    left: 0px;
	border-top-left-radius: .25rem;
    border-top-right-radius: .25rem;
    height: 112px;
    background-color: #e6e6e6;
}

.profile-card-2 .card.profile-primary::before {
	background-color: #008cff;
}
.profile-card-2 .card.profile-success::before {
	background-color: #15ca20;
}
.profile-card-2 .card.profile-danger::before {
	background-color: #fd3550;
}
.profile-card-2 .card.profile-warning::before {
	background-color: #ff9700;
}
.profile-card-2 .user-box {
	margin-top: 30px;
}

.profile-card-3 .user-fullimage {
	position:relative;
}

.profile-card-3 .user-fullimage .details{
	position: absolute;
    bottom: 0;
    left: 0px;
	width:100%;
}

.profile-card-4 .user-box {
    width: 110px;
    margin: auto;
    margin-bottom: 10px;
    margin-top: 15px;
}

.profile-card-4 .list-icon {
    display: table-cell;
    font-size: 30px;
    padding-right: 20px;
    vertical-align: middle;
    color: #223035;
}

.profile-card-4 .list-details {
	display: table-cell;
	vertical-align: middle;
	font-weight: 600;
    color: #223035;
    font-size: 15px;
    line-height: 15px;
}

.profile-card-4 .list-details small{
	display: table-cell;
	vertical-align: middle;
	font-size: 12px;
	font-weight: 400;
    color: #808080;
}

/*Nav Tabs & Pills */
.nav-tabs .nav-link {
    color: #223035;
	font-size: 12px;
    text-align: center;
	letter-spacing: 1px;
    font-weight: 600;
	margin: 2px;
    margin-bottom: 0;
	padding: 12px 20px;
    text-transform: uppercase;
    border: 1px solid transparent;
    border-top-left-radius: .25rem;
    border-top-right-radius: .25rem;
	
}
.nav-tabs .nav-link:hover{
    border: 1px solid transparent;
}
.nav-tabs .nav-link i {
    margin-right: 2px;
	font-weight: 600;
}

.top-icon.nav-tabs .nav-link i{
	margin: 0px;
	font-weight: 500;
	display: block;
    font-size: 20px;
    padding: 5px 0;
}

.nav-tabs-primary.nav-tabs{
	border-bottom: 1px solid #008cff;
}

.nav-tabs-primary .nav-link.active, .nav-tabs-primary .nav-item.show>.nav-link {
    color: #008cff;
    background-color: #fff;
    border-color: #008cff #008cff #fff;
    border-top: 3px solid #008cff;
}

.nav-tabs-success.nav-tabs{
	border-bottom: 1px solid #15ca20;
}

.nav-tabs-success .nav-link.active, .nav-tabs-success .nav-item.show>.nav-link {
    color: #15ca20;
    background-color: #fff;
    border-color: #15ca20 #15ca20 #fff;
    border-top: 3px solid #15ca20;
}

.nav-tabs-info.nav-tabs{
	border-bottom: 1px solid #0dceec;
}

.nav-tabs-info .nav-link.active, .nav-tabs-info .nav-item.show>.nav-link {
    color: #0dceec;
    background-color: #fff;
    border-color: #0dceec #0dceec #fff;
    border-top: 3px solid #0dceec;
}

.nav-tabs-danger.nav-tabs{
	border-bottom: 1px solid #fd3550;
}

.nav-tabs-danger .nav-link.active, .nav-tabs-danger .nav-item.show>.nav-link {
    color: #fd3550;
    background-color: #fff;
    border-color: #fd3550 #fd3550 #fff;
    border-top: 3px solid #fd3550;
}

.nav-tabs-warning.nav-tabs{
	border-bottom: 1px solid #ff9700;
}

.nav-tabs-warning .nav-link.active, .nav-tabs-warning .nav-item.show>.nav-link {
    color: #ff9700;
    background-color: #fff;
    border-color: #ff9700 #ff9700 #fff;
    border-top: 3px solid #ff9700;
}

.nav-tabs-dark.nav-tabs{
	border-bottom: 1px solid #223035;
}

.nav-tabs-dark .nav-link.active, .nav-tabs-dark .nav-item.show>.nav-link {
    color: #223035;
    background-color: #fff;
    border-color: #223035 #223035 #fff;
    border-top: 3px solid #223035;
}

.nav-tabs-secondary.nav-tabs{
	border-bottom: 1px solid #75808a;
}
.nav-tabs-secondary .nav-link.active, .nav-tabs-secondary .nav-item.show>.nav-link {
    color: #75808a;
    background-color: #fff;
    border-color: #75808a #75808a #fff;
    border-top: 3px solid #75808a;
}

.tabs-vertical .nav-tabs .nav-link {
    color: #223035;
    font-size: 12px;
    text-align: center;
    letter-spacing: 1px;
    font-weight: 600;
    margin: 2px;
    margin-right: -1px;
    padding: 12px 1px;
    text-transform: uppercase;
    border: 1px solid transparent;
    border-radius: 0;
    border-top-left-radius: .25rem;
    border-bottom-left-radius: .25rem;
}

.tabs-vertical .nav-tabs{
	border:0;
	border-right: 1px solid #dee2e6;
}

.tabs-vertical .nav-tabs .nav-item.show .nav-link, .tabs-vertical .nav-tabs .nav-link.active {
    color: #495057;
    background-color: #fff;
    border-color: #dee2e6 #dee2e6 #fff;
    border-bottom: 1px solid #dee2e6;
    border-right: 0;
    border-left: 1px solid #dee2e6;
}

.tabs-vertical-primary.tabs-vertical .nav-tabs{
	border:0;
	border-right: 1px solid #008cff;
}

.tabs-vertical-primary.tabs-vertical .nav-tabs .nav-item.show .nav-link, .tabs-vertical-primary.tabs-vertical .nav-tabs .nav-link.active {
    color: #008cff;
    background-color: #fff;
    border-color: #008cff #008cff #fff;
    border-bottom: 1px solid #008cff;
    border-right: 0;
    border-left: 3px solid #008cff;
}

.tabs-vertical-success.tabs-vertical .nav-tabs{
	border:0;
	border-right: 1px solid #15ca20;
}

.tabs-vertical-success.tabs-vertical .nav-tabs .nav-item.show .nav-link, .tabs-vertical-success.tabs-vertical .nav-tabs .nav-link.active {
    color: #15ca20;
    background-color: #fff;
    border-color: #15ca20 #15ca20 #fff;
    border-bottom: 1px solid #15ca20;
    border-right: 0;
    border-left: 3px solid #15ca20;
}

.tabs-vertical-info.tabs-vertical .nav-tabs{
	border:0;
	border-right: 1px solid #0dceec;
}

.tabs-vertical-info.tabs-vertical .nav-tabs .nav-item.show .nav-link, .tabs-vertical-info.tabs-vertical .nav-tabs .nav-link.active {
    color: #0dceec;
    background-color: #fff;
    border-color: #0dceec #0dceec #fff;
    border-bottom: 1px solid #0dceec;
    border-right: 0;
    border-left: 3px solid #0dceec;
}

.tabs-vertical-danger.tabs-vertical .nav-tabs{
	border:0;
	border-right: 1px solid #fd3550;
}

.tabs-vertical-danger.tabs-vertical .nav-tabs .nav-item.show .nav-link, .tabs-vertical-danger.tabs-vertical .nav-tabs .nav-link.active {
    color: #fd3550;
    background-color: #fff;
    border-color: #fd3550 #fd3550 #fff;
    border-bottom: 1px solid #fd3550;
    border-right: 0;
    border-left: 3px solid #fd3550;
}

.tabs-vertical-warning.tabs-vertical .nav-tabs{
	border:0;
	border-right: 1px solid #ff9700;
}

.tabs-vertical-warning.tabs-vertical .nav-tabs .nav-item.show .nav-link, .tabs-vertical-warning.tabs-vertical .nav-tabs .nav-link.active {
    color: #ff9700;
    background-color: #fff;
    border-color: #ff9700 #ff9700 #fff;
    border-bottom: 1px solid #ff9700;
    border-right: 0;
    border-left: 3px solid #ff9700;
}

.tabs-vertical-dark.tabs-vertical .nav-tabs{
	border:0;
	border-right: 1px solid #223035;
}

.tabs-vertical-dark.tabs-vertical .nav-tabs .nav-item.show .nav-link, .tabs-vertical-dark.tabs-vertical .nav-tabs .nav-link.active {
    color: #223035;
    background-color: #fff;
    border-color: #223035 #223035 #fff;
    border-bottom: 1px solid #223035;
    border-right: 0;
    border-left: 3px solid #223035;
}

.tabs-vertical-secondary.tabs-vertical .nav-tabs{
	border:0;
	border-right: 1px solid #75808a;
}

.tabs-vertical-secondary.tabs-vertical .nav-tabs .nav-item.show .nav-link, .tabs-vertical-secondary.tabs-vertical .nav-tabs .nav-link.active {
    color: #75808a;
    background-color: #fff;
    border-color: #75808a #75808a #fff;
    border-bottom: 1px solid #75808a;
    border-right: 0;
    border-left: 3px solid #75808a;
}

.nav-pills .nav-link {
    border-radius: .25rem;
    color: #223035;
    font-size: 12px;
    text-align: center;
	letter-spacing: 1px;
    font-weight: 600;
    text-transform: uppercase;
	margin: 3px;
    padding: 12px 20px;
	-webkit-transition: all 0.3s ease;
    -moz-transition: all 0.3s ease;
    -o-transition: all 0.3s ease;
    transition: all 0.3s ease; 

}

.nav-pills .nav-link:hover {
    background-color:#f4f5fa;
}

.nav-pills .nav-link i{
	margin-right:2px;
	font-weight: 600;
}

.top-icon.nav-pills .nav-link i{
	margin: 0px;
	font-weight: 500;
	display: block;
    font-size: 20px;
    padding: 5px 0;
}

.nav-pills .nav-link.active, .nav-pills .show>.nav-link {
    color: #fff;
    background-color: #008cff;
    box-shadow: 0 4px 20px 0 rgba(0,0,0,.14), 0 7px 10px -5px rgba(0, 140, 255, 0.5);
}

.nav-pills-success .nav-link.active, .nav-pills-success .show>.nav-link {
    color: #fff;
    background-color: #15ca20;
    box-shadow: 0 4px 20px 0 rgba(0,0,0,.14), 0 7px 10px -5px rgba(21, 202, 32, .5);
}

.nav-pills-info .nav-link.active, .nav-pills-info .show>.nav-link {
    color: #fff;
    background-color: #0dceec;
    box-shadow: 0 4px 20px 0 rgba(0,0,0,.14), 0 7px 10px -5px rgba(13, 206, 236, 0.5);
}

.nav-pills-danger .nav-link.active, .nav-pills-danger .show>.nav-link{
    color: #fff;
    background-color: #fd3550;
    box-shadow: 0 4px 20px 0 rgba(0,0,0,.14), 0 7px 10px -5px rgba(253, 53, 80, .5);
}

.nav-pills-warning .nav-link.active, .nav-pills-warning .show>.nav-link {
    color: #fff;
    background-color: #ff9700;
    box-shadow: 0 4px 20px 0 rgba(0,0,0,.14), 0 7px 10px -5px rgba(255, 151, 0, .5);
}

.nav-pills-dark .nav-link.active, .nav-pills-dark .show>.nav-link {
    color: #fff;
    background-color: #223035;
    box-shadow: 0 4px 20px 0 rgba(0,0,0,.14), 0 7px 10px -5px rgba(34, 48, 53, .5);
}

.nav-pills-secondary .nav-link.active, .nav-pills-secondary .show>.nav-link {
    color: #fff;
    background-color: #75808a;
    box-shadow: 0 4px 20px 0 rgba(0,0,0,.14), 0 7px 10px -5px rgba(117, 128, 138, .5);
}
.card .tab-content{
	padding: 1rem 0 0 0;
}

.z-depth-3 {
    -webkit-box-shadow: 0 11px 7px 0 rgba(0,0,0,0.19),0 13px 25px 0 rgba(0,0,0,0.3);
    box-shadow: 0 11px 7px 0 rgba(0,0,0,0.19),0 13px 25px 0 rgba(0,0,0,0.3);
}
       </style>
       <!-- start page title -->
       <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Tenant Profile</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('tenant') }}"><button class="btn-dark"><- Back to Tenants</button></a></li>
                            <li class="breadcrumb-item active">tenant profile</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="card"> 
           <div class="card-body">
            <!--   --->
            <div class="container">
            <div class="row">
                    <div class="col-lg-4">
                    <div class="profile-card-4 z-depth-3">
                        <div class="card">
                        <div class="card-body text-center bg-primary rounded-top">
                        <div class="user-box">
                            <img src="{{ (!empty($tenant->image)) ? asset('uploads/'.$tenant->image) : asset('assets/images/small/profile.png') }}" alt="user avatar">
                        </div>
                        <h5 class="mb-1 text-white">{{ $tenant->f_name }} {{ $tenant->l_name }}</h5>
                        <h6 class="text-light">CNIC :  {{ $tenant->cnic}}</h6>
                        </div>
                        <div class="card-body">
                            <ul class="list-group shadow-none">
                            <li class="list-group-item">
                            <div class="list-icon">
                                <i class="fa fa-phone-square"></i>
                            </div>
                            <div class="list-details">
                                <span>{{ $tenant->contact1 }}</span><br>
                                <span>{{ $tenant->contact2 }}</span>
                                <!-- <small>Mobile Number</small> -->
                            </div>
                            </li>
                            <li class="list-group-item">
                            <div class="list-icon">
                                <i class="fa fa-envelope"></i>
                            </div>
                            <div class="list-details">
                                <span>{{ $tenant->email }}</span>
                            </div>
                            </li>
                            <li class="list-group-item">
                            <div class="list-icon">
                                <i class="fa fa-globe"></i>
                            </div>
                            <div class="list-details">
                                <span>{{ $tenant->country }}</span>
                                <small>{{ $tenant->city }} , {{ $tenant->address }}</small>
                            </div>
                            </li>

                            <li class="list-group-item">
                            <div class="list-icon">
                                <i class="fa fa-wallet"></i>
                            </div>
                            <div class="list-details">
                                <span>Wallet Blance</span>
                                <small>{{ $tenant_wallet->amount }}</small>
                            </div>
                            </li>

                            </ul>
                            <div class="row text-center mt-4">
                            <div class="col p-2">
                            <h4 class="mb-1 line-height-5">{{ $totalActiveAgreements }}</h4>
                                <small class="mb-0 font-weight-bold">Property</small>
                            </div>
                                <div class="col p-2">
                                <h4 class="mb-1 line-height-5 text-danger">{{ $totalInvoiceAmount}}</h4>
                                <small class="mb-0 font-weight-bold ">Invoice</small>
                                </div>
                                <div class="col p-2">
                                <h4 class="mb-1 line-height-5 text-success">0.00</h4>
                                <small class="mb-0 font-weight-bold ">paid</small>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <a href="javascript:void()" class="btn-social btn-facebook waves-effect waves-light m-1"><i class="fa fa-facebook"></i></a>
                            <a href="javascript:void()" class="btn-social btn-google-plus waves-effect waves-light m-1"><i class="fa fa-google-plus"></i></a>
                            <a href="javascript:void()" class="list-inline-item btn-social btn-behance waves-effect waves-light"><i class="fa fa-behance"></i></a>
                            <a href="javascript:void()" class="list-inline-item btn-social btn-dribbble waves-effect waves-light"><i class="fa fa-dribbble"></i></a>
                        </div>
                        </div>
                    </div>
                    </div>
                    <div class="col-lg-8">
                    <div class="card z-depth-3">
                            <div class="card-body">
                                <!-- Nav tabs -->
                                <ul class="nav nav-pills nav-justified" role="tablist">
                                                        <li class="nav-item waves-effect waves-light">
                                                            <a class="nav-link active" data-bs-toggle="tab" href="#home-1" role="tab">
                                                                <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                                                <span class="d-none d-sm-block">Agreements</span> 
                                                            </a>
                                                        </li>
                                                        <li class="nav-item waves-effect waves-light">
                                                            <a class="nav-link" data-bs-toggle="tab" href="#profile-1" role="tab">
                                                                <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                                                <span class="d-none d-sm-block">Payments</span> 
                                                            </a>
                                                        </li>
                                                        <li class="nav-item waves-effect waves-light">
                                                            <a class="nav-link" data-bs-toggle="tab" href="#messages-1" role="tab">
                                                                <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                                <span class="d-none d-sm-block">Invoices</span>   
                                                            </a>
                                                        </li>
                                                    
                                                    </ul>
                    
                                                    <!-- Tab panes -->
                                                    <div class="tab-content p-3 text-muted">
                                                        <div class="tab-pane active" id="home-1" role="tabpanel">
                                                            <p class="mb-0">
                                                                <table id="datatable" class="table table-bordered  dt-responsive table-hover" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                                    <thead class="table-light">
                                                                        <tr>
                                                                            <th>#</th>
                                                                            <th>Property Pic</th>
                                                                            <th>Property Info</th>
                                                                            <th>Agreement Info</th>
                                                                        </tr>
                                                                    </thead>

                                                                    <tbody>
                                                                            @php $i=1  @endphp
                                                                            @foreach ($agreements as $row)
                                                                            <tr>
                                                                                <td>{{ $i }}</td>
                                                                                <td>
                                                                                    <div style="width: 100px; height: 90px; overflow: hidden;">
                                                                                        <img class="rounded" alt="Image" src="{{ (!empty($row->property->image)) ? asset('uploads/'.$row->property->image) : asset('assets/images/small/property.png') }}" style="object-fit: cover; width: 100%; height: 100%;" />
                                                                                    </div><br>&nbsp;&nbsp;
                                                                                    <button class="btn btn-success waves-effect waves-dark"><i class="fa fa-download"></i></button>
                                                                                </td>
                                                                                <td>
                                                                                    {{ $row->property->name  }}<br>
                                                                                    Type : {{ $row->property->pcategory->name  }}<br>
                                                                                    County : {{ $row->property->country  }} <br>
                                                                                    City : {{ $row->property->city  }} <br>
                                                                                    District : {{ $row->property->district  }} <br>
                                                                                    Location : {{ $row->property->street  }} <br>
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
                                                            </p>
                                                        </div>
                                                        <div class="tab-pane" id="profile-1" role="tabpanel">
                                                            <p class="mb-0">
                                                                Food truck fixie locavore, accusamus mcsweeney's marfa nulla
                                                                single-origin coffee squid. Exercitation +1 labore velit, blog
                                                                sartorial PBR leggings next level wes anderson artisan four loko
                                                                farm-to-table craft beer twee. Qui photo booth letterpress,
                                                                commodo enim craft beer mlkshk aliquip jean shorts ullamco ad
                                                                vinyl cillum PBR. Homo nostrud organic, assumenda labore
                                                                aesthetic magna 8-bit.
                                                            </p>
                                                        </div>
                                                        <div class="tab-pane" id="messages-1" role="tabpanel">
                                                            <p class="mb-0">
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
                                                                            @foreach ($invoices as $row)
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
                                                            </p>
                                                        </div>
                                                
                                                    </div>
                            </div>
                    </div>
                    </div>
                    
                </div>
            </div>
            <!--   --->
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