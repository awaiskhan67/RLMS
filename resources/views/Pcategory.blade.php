@extends('layouts.base')
@section('content')


       <!-- start page title -->
       <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Property Category</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Utility</a></li>
                            <li class="breadcrumb-item active">Category</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

       <div class="card">
                <div class="card-body">


                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                       
                        <li class="nav-item">
                            <a class="nav-link @if(!$errors->any()) active @endif" data-bs-toggle="tab" href="#profile1" role="tab">
                                <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                <span class="d-none d-sm-block">List</span> 
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if($errors->any()) active @endif" data-bs-toggle="tab" href="#messages1" role="tab">
                                <span class="d-block d-sm-none"><i class="fas fa-lock"></i></span>
                                <span class="d-none d-sm-block">Add new category</span>   
                            </a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content p-3 text-muted">
            
                        <div class="tab-pane @if(!$errors->any()) active @endif" id="profile1" role="tabpanel">
                            <table id="datatable" class="table table-striped table-bordered dt-responsive table-hover" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Created at</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                        @php $i=1  @endphp
                                        @foreach ($category as $row)
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $row->name }}</td>
                                            <td>{{ $row->shortDes }}</td>
                                            <td>{{ $row->created_at->format('d M / Y, g:i A') }}</td>
                                            <td>
                                                <a href="{{ route('pcategory.edite', $row->id) }}"><i class="ri-edit-2-fill  text-primary" style="font-size: 20px;"></i></a>&nbsp;&nbsp;
                                                <a href="{{ route('pcategory.delete', $row->id) }}" onclick="return confirm('Are you sure you want to delete this category?');"><i class="ri-delete-bin-fill  text-danger" style="font-size: 20px;"></i></a>
                                            </td>
                                        </tr>
                                            @php $i++  @endphp
                                        @endforeach
                                </tbody> 

                           
                            </table>
                        </div>

                        <div class="tab-pane @if($errors->any()) active @endif" id="messages1" role="tabpanel">
                            <form method="post" action="{{ route('pcategory.add') }}" class="mt-6 space-y-6"  >
                               @csrf
                                <h4 class="card-title">Add new category</h4>
                                <p class="card-text">Property category should be unique.</p>

                                <div class="row mt-2">
                                    <div class="col-md-6">
                                        <lable>Enter category name</lable>
                                        <input class="form-control" type="text" name="name"  value="{{ old('name') }}" placeholder="Enter category name">
                                        @error('name')<li class="text-danger">{{ $message }}</li>@enderror
                                    </div>
                                
                                    <div class="col-md-6">
                                        <lable>Enter category short description</label>
                                        <textarea class="form-control" name="des"  placeholder="Enter short description">{{ old('des') }}</textarea> 
                                        @error('des')<li class="text-danger">{{ $message }}</li>@enderror
                                    </div>
                                </div><hr>

                                <div class="mt-3 d-flex justify-content-end">
                                <button class="btn-outline btn btn-primary" type="submit">Create categoory</button>&nbsp;&nbsp;<button class="btn-outline btn btn-dark" type="reset">Reset</button>
                                </div>

                            </form>
                        </div>
                    
                    </div>

                </div>
            </div>    
            
            

@endsection


@section('script')

<script>





</script>

@endsection