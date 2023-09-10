@extends('layouts.base')
@section('content')

       <!-- start page title -->
       <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Roles & Permisson</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Utility</a></li>
                            <li class="breadcrumb-item active">Roles & Permissions</li>
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
                                <span class="d-none d-sm-block">Roles & Permissions</span> 
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if($errors->any()) active @endif" data-bs-toggle="tab" href="#messages1" role="tab">
                                <span class="d-block d-sm-none"><i class="fas fa-lock"></i></span>
                                <span class="d-none d-sm-block">New Roles & Permissions</span>   
                            </a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content p-3 text-muted">
            
                        <div class="tab-pane @if(!$errors->any()) active @endif" id="profile1" role="tabpanel">

                            <table id="datatable" class="table table-striped table-bordered dt-responsive " style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Roles</th>
                                        <th>Permissions</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                        @php $i=1  @endphp
                                        @foreach ($role_permissions as $role)
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td><span class="badge bg-info" style="font-size: 20px;">{{ $role->name }}</span></td>

                                            <td>
                                                @foreach($permission as $permiss)
                                                <span class="  @if($role->hasPermissionTo($permiss->name )) badge bg-success @else badge bg-danger @endif" style="font-size: 13px;">{{ $permiss->name  }}</span>&nbsp;
                                                @endforeach  
                                            
                                            </td>

                                            <td>
                                                <a href="{{ route('rolesPedite', $role->id) }}"><i class="ri-edit-2-fill  text-primary" style="font-size: 20px;"></i></a>&nbsp;&nbsp;
                                                <a href="{{ route('rolesPdelete', $role->id) }}" onclick="return confirm('Are you sure you want to delete this role?');"><i class="ri-delete-bin-fill  text-danger" style="font-size: 20px;"></i></a>
                                            </td>
                                        </tr>
                                            @php $i++  @endphp
                                        @endforeach
                                </tbody> 

                           
                            </table>
    
                        </div>
                        <div class="tab-pane @if($errors->any()) active @endif" id="messages1" role="tabpanel">

                         <form method="post" action="{{ route('rolesPcreate') }}" class="mt-6 space-y-6">
                           @csrf
                     

                           <div class="row">
                                <h4 class="card-title">New Role</h4>
                                <p class="card-text">Ensure role name is unique , otherwise you can't create it.</p>
                                <input type="text" class="form-control" placeholder="Enter a new role name" name="role">
                                 @error('role')<li class="text-danger">{{ $message }}</li>@enderror
                           </div><hr>

                           <h4 class="card-title">Permissions</h4>
                           <p class="card-text">Ensure Permissions that you will provide to this role.</p>

                           <div class="row">
                              @foreach($permission as $permiss)
                               <div class="col">
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $permiss->name  }}" id="formCheck1">
                                    <label class="form-check-label" for="formCheck1">
                                      {{ $permiss->name  }}
                                    </label>
                                </div>
                               </div>
                              @endforeach

                           </div><hr>
                           <button class="btn-outline btn btn-primary" type="submit">Create Role</button>&nbsp;&nbsp;<button class="btn-outline btn btn-dark">Reset</button>
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