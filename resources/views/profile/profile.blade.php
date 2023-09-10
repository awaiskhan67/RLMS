@extends('layouts.base')
@section('content')

     <!-- start page title -->
     <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Profile</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Utility</a></li>
                            <li class="breadcrumb-item active">Starter page</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
    <!-- end page title -->


    <div class="row">

        <div class="col-xl-4 col-md-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Profile picture</h4><hr>
                    <img class="rounded mx-auto d-block" alt="200x200" width="300" src="{{ (!empty($user->image)) ? asset('uploads/'.$user->image):asset('assets/images/small/profile.png')  }}" data-holder-rendered="true" id="updateprofile">
                    <hr> <form action="{{ route('profile.image.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
    

                        <input type="file" class="form-control" name="profile" id="profile">
                        @error('profile')<li class="text-danger">{{ $message }}</li>@enderror
                        <button class="btn btn-primary form-control mt-3">UPDATE IMAGE</button></form>
                </div>
            </div>
        </div>


        <div class="col-xl-8 col-md-4">
            <div class="card">
                <div class="card-body">


                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link {{ ! $errors->updatePassword->any() ? 'active' : '' }}" data-bs-toggle="tab" href="#profile1" role="tab">
                                <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                <span class="d-none d-sm-block">Profile</span> 
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ $errors->updatePassword->any() ? 'active' : '' }}" data-bs-toggle="tab" href="#messages1" role="tab">
                                <span class="d-block d-sm-none"><i class="fas fa-lock"></i></span>
                                <span class="d-none d-sm-block">Security</span>   
                            </a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content p-3 text-muted">
            
                        <div class="tab-pane {{ ! $errors->updatePassword->any() ? 'active' : '' }}" id="profile1" role="tabpanel">
                         <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
                            @csrf
                            @method('patch')

                            <div class="row mt-2">
                                <div class="col-md-6">
                                    <lable>First Name</lable>
                                    <input class="form-control" type="text" name="f_name" value="{{ $user->f_name }}" required="" placeholder="Enter First name">
                                    @error('f_name')<li class="text-danger">{{ $message }}</li>@enderror
                                </div>
                              
                                <div class="col-md-6">
                                    <lable>Last Name</label>
                                    <input class="form-control" type="text" name="l_name" value="{{ $user->l_name }}"  placeholder="Enter Last name">
                                    @error('l_name')<li class="text-danger">{{ $message }}</li>@enderror
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <lable>Contact Number</lable>
                                    <input class="form-control" type="number" name="contact_number" value="{{ $user->contact_number }}" required="" placeholder="Enter contact number">
                                    @error('contact_number')<li class="text-danger">{{ $message }}</li>@enderror
                                </div>
                              
                                <div class="col-md-6">
                                    <lable>Whatsapp Number</label>
                                    <input class="form-control" type="number" name="whatsapp_number" value="{{ $user->whatsapp_number }}" placeholder="Enter whatsapp number">
                                    @error('whatsapp_number')<li class="text-danger">{{ $message }}</li>@enderror
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <lable>Email</lable>
                                    <input class="form-control" type="email" name="email" required="" value="{{ $user->email }}" placeholder="Enter First name" readonly>
                                    @error('email')<li class="text-danger">{{ $message }}</li>@enderror 
                                </div>
                              
                                <div class="col-md-6">
                                    <lable>Address</label>
                                    <textarea class="form-control" name="address">{{ $user->address }}</textarea> 
                                    @error('address')<li class="text-danger">{{ $message }}</li>@enderror
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <button class="form-control btn btn-primary" type="submit">UPDATE PROFILE INFO</button>
                                </div>
                            </div>
                        
                         </form>
                        </div>
                        <div class="tab-pane {{ $errors->updatePassword->any() ? 'active' : '' }}" id="messages1" role="tabpanel">
                           <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
                           @csrf
                           @method('put')

                            
                            <h4 class="card-title">Password Change</h4>
                            <p class="card-text">Ensure your account is using a long, random password to stay secure.</p>
                            <div class="row mt-2">
                                <div class="col-md-12">
                                    <lable>Current Password</lable>
                                    <input class="form-control" type="password" name="current_password"  >
                                    @if($errors->updatePassword->has('current_password'))
                                      <div class="text-danger">{{ $errors->updatePassword->first('current_password') }}</div>
                                    @endif
                                </div>
                              
                                <div class="col-md-12 mt-3">
                                    <lable>New Password</label>
                                    <input class="form-control" type="password" name="password" >
                                    @if($errors->updatePassword->has('password'))
                                      <div class="text-danger">{{ $errors->updatePassword->first('password') }}</div>
                                    @endif
                                </div>

                                <div class="col-md-12 mt-3">
                                    <lable>Confirm Password</label>
                                    <input class="form-control" type="password" name="password_confirmation"  >
                                    @if($errors->updatePassword->has('password_confirmation'))
                                      <div class="text-danger">{{ $errors->updatePassword->first('password_confirmation') }}</div>
                                    @endif
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <button class="btn btn-dark" type="submit">Update Password</button>
                                </div>
                            </div>
                         </form>
                         <hr>

                      

                            <h4 class="card-title">Delete Account</h4>
                            <p class="card-text">Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.</p>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                <button class="btn btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#deleteAccountModal">Delete Account</button>

                                </div>
                            </div>
                        
                            <!--delete model--->
                            <div class="modal fade" id="deleteAccountModal" tabindex="-1" aria-labelledby="deleteAccountModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                    <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
                                    @csrf
                                    @method('delete')
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteAccountModalLabel">Delete Account</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                        <h4 class="card-title">Are you sure you want to delete your account ?</h4>
                                        <p class="card-text text-danger">Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.</p>
                                        <div class="row">
                                                <div class="col-md-2"></div>
                                                <div class="col-md-8">
                                                    <lable>Enter Password</lable>
                                                    <input class="form-control" type="password" name="password">
                                                    @if($errors->userDeletion->has('password'))
                                                        <div class="text-danger">{{ $errors->userDeletion->first('password') }}</div>
                                                    @endif
                                                </div>
                                                <div class="col-md-2"></div>
                                        </div>  
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </div>
                            <!--end of the model-->
                        </div>
                    
                    </div>

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



$(document).ready(function() {
    // Check your condition here and open the modal if the condition is true
    @if($errors->userDeletion->has('password'))
       toastr.error("Your Enter wrong password ! , you can't delete the account");
    @endif
  });
</script>

@endsection