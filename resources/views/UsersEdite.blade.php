@extends('layouts.base')
@section('content')

       <!-- start page title -->
       <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">User Edite</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Utility</a></li>
                            <li class="breadcrumb-item active">User Update</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="card"> 
           <div class="card-body"> 
             <form method="post" action="{{ route('userUpdate') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $user->id }}">  

                <h4 class="card-title">Profile Info</h4>
                                <p class="card-text">Basics detials about user.</p>

                                <div class="row mt-2">
                                    <div class="col-md-4">
                                        <lable>First Name</lable>
                                        <input class="form-control" type="text" name="f_name"  value="{{old('f_name', $user->f_name)}}" placeholder="Enter First name">
                                        @error('f_name')<li class="text-danger">{{ $message }}</li>@enderror
                                    </div>
                                
                                    <div class="col-md-4">
                                        <lable>Last Name</label>
                                        <input class="form-control" type="text" name="l_name"  value="{{old('l_name', $user->l_name)}}"  placeholder="Enter Last name">
                                        @error('l_name')<li class="text-danger">{{ $message }}</li>@enderror
                                    </div>

                                    <div class="col-md-4">
                                        <lable>Email</lable>
                                        <input class="form-control" type="email" name="email"  value="{{old('email', $user->email)}}" placeholder="Enter Email address">
                                        @error('email')<li class="text-danger">{{ $message }}</li>@enderror 
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-4">
                                        <lable>Contact Number</lable>
                                        <input class="form-control" type="number" name="contact_number"  value="{{old('contact_number', $user->contact_number)}}" placeholder="Enter contact number">
                                        @error('contact_number')<li class="text-danger">{{ $message }}</li>@enderror
                                    </div>
                                
                                    <div class="col-md-4">
                                        <lable>Whatsapp Number</label>
                                        <input class="form-control" type="number" name="whatsapp_number"  value="{{old('whatsapp_number', $user->whatsapp_number)}}"  placeholder="Enter whatsapp number">
                                        @error('whatsapp_number')<li class="text-danger">{{ $message }}</li>@enderror
                                    </div>

                                    <div class="col-md-4">
                                        <lable>Select Role</label>
                                        <select class="form-control" name="role" required>
                                            <option value="">select role</option>
                                            @foreach($roles as $role)
                                                <option value="{{ $role->id }}" @if($user->roles->first() && $user->roles->first()->id === $role->id) selected @endif>{{ $role->name }}</option>
                                            @endforeach


                                        </select>
                                        @error('role')<li class="text-danger">{{ $message }}</li>@enderror
                                    </div>
                                </div><hr>

                                <h4 class="card-title">Account Info</h4>
                                <p class="card-text">Create account passwords etc.</p>

                                <div class="row mt-3">
                                    <div class="col-md-4">
                                        <lable>Create Password</lable>
                                        <input class="form-control" type="password" name="password"   placeholder="Enter New Password">
                                        @error('password')<li class="text-danger">{{ $message }}</li>@enderror
                                    </div>
                                
                                    <div class="col-md-4">
                                        <lable>Confirm Password</label>
                                        <input class="form-control" type="password" name="password_confirmation"  placeholder="Confirm the password">
                                        @error('password_confirm')<li class="text-danger">{{ $message }}</li>@enderror
                                    </div>

                                    <div class="col-md-4">
                                        <lable>Account active status</label>
                                        <select class="form-control" name="status" required>
                                            <option value="">select status</option>
                                            <option value="1" @if($user->active_status === 1) selected @endif>Active</option>
                                            <option value="0" @if($user->active_status === 0) selected @endif>Disabled</option>
                                        </select>
                                        @error('status')<li class="text-danger">{{ $message }}</li>@enderror
                                    </div>
                                </div>

                                <div class="row mt-3">

                                    <div class="col-md-6">
                                        <lable>Upload Image</label>
                                        <input class="form-control" type="file" name="image" id="profile" >
                                        @error('image')<li class="text-danger">{{ $message }}</li>@enderror<br>
                                        <img class="rounded mx-auto d-block" alt="200x200" width="300" src="{{ (!empty($user->image)) ? asset('uploads/'.$user->image):asset('assets/images/small/profile.png')  }}" data-holder-rendered="true" id="updateprofile">
                                    </div>

                                    <div class="col-md-6">
                                        <lable>Address</label>
                                        <textarea class="form-control" name="address"  placeholder="Enter user address">{{old('address', $user->address)}}</textarea> 
                                        @error('address')<li class="text-danger">{{ $message }}</li>@enderror
                                    </div>
                                
                                    
                                </div><hr>

                                <div class="mt-3 d-flex justify-content-end">
                                <button class="btn-outline btn btn-primary" type="submit">Update user data</button>&nbsp;&nbsp;<a class="btn-outline btn btn-dark" href="{{ route('users') }}">Back</a>
                                </div>
             </form>
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