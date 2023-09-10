@extends('layouts.base')
@section('content')

       <!-- start page title -->
       <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Conditions</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Utility</a></li>
                            <li class="breadcrumb-item active">Agreement Condition</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row mt-2">
                    <div class="col-md-4">
                        <div class="card ">
                            <div class="card-header"> Create New condition </div> 
                            <div class="card-body"> 
                                <form method="post" action="{{ route('condition.add') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
                                    @csrf  
                                        <div class="col-md-12">
                                            <lable>Enter Condition</lable>
                                            <textarea class="form-control"  name="condition" placeholder="Enter your condition in short">{{old('condition')}}</textarea>
                                            @error('condition')<li class="text-danger">{{ $message }}</li>@enderror
                                        </div>

                                        <div class="mt-3 d-flex justify-content-end">
                                            <button class="btn-outline btn btn-primary" type="submit">Add condition</button>
                                        </div>
                                </form>
                            </div>
                       </div>
                    </div>


                    <div class="col-md-8">
                        <div class="card "> 
                                <div class="card-header"> Condition lists</div> 
                            <div class="card-body"> 
                                <table id="datatable" class="table table-bordered  dt-responsive table-hover" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead class="table-light">
                                            <tr>
                                                <th>#</th>
                                                <th>Conditon</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                                @php $i=1  @endphp
                                                @foreach ($conditions as $row)
                                                <tr>
                                                    <td>{{ $i }}</td>
                                                    <td>{{ $row->condition }}</td>
                                                    <td>
                                                        <a href="{{ route('condition.delete', $row->id) }}" onclick="return confirm('Are you sure you want to delete this Condition?');"><i class="ri-delete-bin-fill  text-danger" style="font-size: 20px;"></i></a>
                                                    </td>
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