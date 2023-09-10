@extends('layouts.base')
@section('content')

       <!-- start page title -->
       <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Roles & Permisson Update</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Utility</a></li>
                            <li class="breadcrumb-item active">Roles & Permissions Update</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="card"> 
        <div class="card-body"> 
             <form method="post" action="{{ route('rolesPupdate') }}" class="mt-6 space-y-6">
                @csrf
                <input type="hidden" name="id" value="{{ $role->id }}">  
                     
                           <div class="row">
                                <h4 class="card-title">Update Role</h4>
                                <p class="card-text">Ensure role name is unique , otherwise you can't create it.</p>
                                <input type="text" class="form-control" placeholder="Enter a new role name" name="updated_role" value="{{ $role->name }}">
                                 @error('updated_role')<li class="text-danger">{{ $message }}</li>@enderror
                           </div><hr>

                           <h4 class="card-title">Update Permissions</h4>
                           <p class="card-text">Ensure Permissions that you will provide to this role.</p>

                           <div class="row">
                              @foreach($permission as $permiss)
                               <div class="col">
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $permiss->name  }}" id="formCheck1"  @foreach($role_permission as $pers)
                                                                    @if($permiss->name == $pers->name) {{ "checked" }} @endif @endforeach>
                                    <label class="form-check-label" for="formCheck1">
                                      {{ $permiss->name  }}
                                    </label>
                                </div>
                               </div>
                              @endforeach

                           </div><hr>
                           <button class="btn-outline btn btn-primary" type="submit">Update Role</button>&nbsp;&nbsp;<a class="btn-outline btn btn-dark" href="{{ route('rolesP') }}">Back</a>
            </form></div></div>
            

@endsection


@section('script')

<script>





</script>

@endsection