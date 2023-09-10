@extends('layouts.base')
@section('content')

<style>
/* Additional styles to improve the icon and modal */
.modal-confirm .icon-box {
    width: 100px;
    height: 100px;
    margin: 0 auto;
    border-radius: 50%;
    z-index: 9;
    text-align: center;
    background-color: #28a745; /* Green background color */
}

.modal-confirm .icon-box i {
    color: #fff; /* White icon color */
    font-size: 3rem; /* Increase the icon size */
    display: inline-block;
    margin-top: 25px;
}

.modal-confirm h4 {
    text-align: center;
    font-size: 26px;
    margin: 30px 0 -10px;
}

</style>

       <!-- start page title -->
       <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Rent Transaction</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Utility</a></li>
                            <li class="breadcrumb-item active">Transaction</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="card"> 
           <div class="card-body"> 
                <!---- ------->
                <table id="datatable" class="table table-bordered  dt-responsive table-hover" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Agreement</th>
                            <th>Property</th>
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
                            @foreach ($payments as $row)
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $row->agreement->agreement_no }}<br>{{ $row->agreement->agreement_name }}</td>
                                <td>
                                    {{ $row->property->name }} {{ $row->property->pcategory->name }}<br>
                                    CNIC : {{ $row->tenant->cnic }}
                                </td>
                                <td>
                                    {{ $row->tenant->f_name }} {{ $row->tenant->l_name }}<br>
                                    CNIC : {{ $row->tenant->cnic }}
                                </td>
                                <td>{{ \Carbon\Carbon::parse($row->pay_date)->format('F j, Y') }}</td>
                                <td>
                                    @if($row->status  == 1) <span class="badge bg-success" style="font-size: 14px;">Paid</span>
                                    @else <span class="badge bg-danger" style="font-size: 14px;">Cancled</span> @endif
                                </td>
                                <td>{{ $row->amount }}</td>
                                <td>
                                 By : {{ $row->user->f_name }} {{ $row->user->l_name }}<br>
                                 Email :  {{ $row->user->email }}<br>
                                 Time : {{ $row->created_at->format('d M / Y, g:i A') }}
                                </td>
                                <td> 
                                   <a href="{{ route('rentPay.Slip', $row->id) }}"><i class="ri-printer-fill  text-primary" style="font-size: 24px;"></i></a>&nbsp;&nbsp;
                                    @if($row->confirm == 0)
                                      <a class="approve-confirm" data-id="{{ route('rentPay.confirm', $row->id) }}" href="#"><i class="ri-checkbox-circle-fill  text-warning" style="font-size: 24px;"></i></a>&nbsp;&nbsp;
                                      <a class="cancel" data-id="{{ route('rentPay.cancel', $row->id) }}" href="#"><i class="ri-close-circle-fill  text-danger" style="font-size: 24px;"></i></a> 
                                    @endif
                                </td>
                            </tr>
                                @php $i++  @endphp
                            @endforeach
                    </tbody> 

                
                </table>
                <!------ ----->
           </div>
        </div>


            <!-- Thsi is a confirmation model  -->
             <div id="ApproveModal" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="icon-box">
                                <i class="ri-error-warning-fill text-danger" style="font-size:35px;"></i>
                            </div>&nbsp;&nbsp;
                            <h4 class="modal-title w-100">Are you sure?</h4>
                        </div>
                        <div class="modal-body">
                            <p style="font-size:15px;">Do you really want to confirm this payment? This process cannot be undone & can't cancel the payment.</p>
                        </div>
                        <div class="modal-footer justify-content-center">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <a href="#" class="btn btn-danger con">Yes confirm now</a>
                        </div>
                    </div>
                </div>
             </div>
            <!--End of the modal---->


            <!-- Thsi is a confirmation model  -->
               <div id="CancelModal" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="icon-box">
                                <i class="ri-error-warning-fill text-danger" style="font-size:35px;"></i>
                            </div>&nbsp;&nbsp;
                            <h4 class="modal-title w-100">Are you sure to cancel ?</h4>
                        </div>
                        <div class="modal-body">
                            <p style="font-size:15px;">Do you really want to cancel this payment? This process cannot be undone .</p>
                        </div>
                        <div class="modal-footer justify-content-center">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <a href="#" class="btn btn-danger can">Yes</a>
                        </div>
                    </div>
                </div>
             </div>
            <!--End of the modal---->
            
@endsection


@section('script')

<script>

$( document ).ready(function() { 
  $(".approve-confirm").click(function(e){
     e.preventDefault();
     let id = $(this).attr("data-id");
     $('#ApproveModal').modal('show');
     $(".con").attr("href", id)
  });
});

$( document ).ready(function() { 
  $(".cancel").click(function(e){
     e.preventDefault();
     let id = $(this).attr("data-id");
     $('#CancelModal').modal('show');
     $(".can").attr("href", id)
  });
});


</script>

@endsection