@extends('layouts.base')
@section('content')

       <!-- start page title -->
       <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Property category Edite</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Utility</a></li>
                            <li class="breadcrumb-item active">Property category Update</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="card"> 
           <div class="card-body"> 
             <form method="post" action="{{ route('pcategory.update') }}" class="mt-6 space-y-6" >
                @csrf
                    <input type="hidden" name="id" value="{{ $cat->id }}">  
                    <h4 class="card-title">Add new category</h4>
                    <p class="card-text">Property category should be unique.</p>

                    <div class="row mt-2">
                        <div class="col-md-6">
                                <lable>Enter category name</lable>
                                <input class="form-control" type="text" name="name"  value="{{ old('name',$cat->name) }}" placeholder="Enter category name">
                                @error('name')<li class="text-danger">{{ $message }}</li>@enderror
                        </div>
                        
                        <div class="col-md-6">
                            <lable>Enter category short description</label>
                            <textarea class="form-control" name="des"  placeholder="Enter short description">{{old('des', $cat->shortDes)}}</textarea> 
                            @error('des')<li class="text-danger">{{ $message }}</li>@enderror
                        </div>
                    </div><hr>

                    <div class="mt-3 d-flex justify-content-end">
                        <button class="btn-outline btn btn-primary" type="submit">Update category</button>&nbsp;&nbsp;<a class="btn-outline btn btn-dark" href="{{ route('pcategory') }}">Back</a>
                    </div>
             </form>
           </div>
        </div>
            
@endsection


@section('script')

<script>






</script>

@endsection