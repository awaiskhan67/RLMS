@extends('layouts.base')
@section('content')


       <!-- start page title -->
       <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Users</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Utility</a></li>
                            <li class="breadcrumb-item active">Users</li>
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
                                <span class="d-none d-sm-block">Created users</span> 
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " data-bs-toggle="tab" href="#users1" role="tab">
                                <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                <span class="d-none d-sm-block">Online register users</span> 
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if($errors->any()) active @endif" data-bs-toggle="tab" href="#messages1" role="tab">
                                <span class="d-block d-sm-none"><i class="fas fa-lock"></i></span>
                                <span class="d-none d-sm-block">Add new user</span>   
                            </a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content p-3 text-muted">
            
                        <div class="tab-pane @if(!$errors->any()) active @endif" id="profile1" role="tabpanel">
                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive table-hover" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Pic</th>
                                        <th>Name</th>
                                        <th>Contact</th>
                                        <th>Role</th>
                                        <th>Status</th>
                                        <th>Created by</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                        @php $i=1  @endphp
                                        @foreach ($users as $row)
                                        <tr >
                                            <td>{{ $i }}</td>
                                            <td><img class="rounded-circle" alt="200x200" width="300" src="{{ (!empty($row->image)) ? asset('uploads/'.$row->image.''):asset('assets/images/small/profile.png') }}" data-holder-rendered="true"  style="width:50px;height:50px"></td>
                                            <td>{{$row->f_name}}{{$row->l_name}}</td>
                                            <td>{{$row->contact_number}}</td>
                                            <td>
                                            @if($row->roles->count() > 0)  
                                               <span class="badge bg-info" style="font-size: 15px;"><b>{{ $row->roles->first()->name }}</b></span>
                                            @endif
                                            </td>
                                            <td>@if($row->active_status == 0) <span class="badge bg-danger" style="font-size: 15px;"><b>Disabled</b></span> @else <span class="badge bg-success" style="font-size: 15px;"><b>Active</b></span> @endif </td>
                                            <td>
                                                @if($row->user) {{ $row->user->f_name }} {{ $row->user->l_name }} @endif
                                            </td>

                                            <td>
                                                <a href="#" class="user-details-link" data-user-id="{{ $row->id }}">
                                                    <i class="ri-eye-fill text-success" style="font-size: 20px;"></i>
                                                </a>&nbsp;&nbsp;
                                                <a href="{{ route('userEdite', $row->id) }}"><i class="ri-edit-2-fill  text-primary" style="font-size: 20px;"></i></a>&nbsp;&nbsp;
                                                <a href="{{ route('userDelete', $row->id) }}" onclick="return confirm('Are you sure you want to delete this user?');"><i class="ri-delete-bin-fill  text-danger" style="font-size: 20px;"></i></a>
                                            </td>
                                        </tr>
                                            @php $i++  @endphp
                                        @endforeach
                                </tbody> 

                           
                            </table>
                        </div>

                        <div class="tab-pane" id="users1" role="tabpanel">
                            <table id="datatable" class="table table-striped table-bordered dt-responsive table-hover" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Pic</th>
                                        <th>Name</th>
                                        <th>Contact</th>
                                        <th>Status</th>
                                        <th>Created at</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                        @php $i=1  @endphp
                                        @foreach ($onlneusers as $row)
                                        <tr >
                                            <td>{{ $i }}</td>
                                            <td><img class="rounded-circle" alt="200x200" width="300" src="{{ (!empty($row->image)) ? asset('uploads/'.$row->image.''):asset('assets/images/small/profile.png') }}" data-holder-rendered="true"  style="width:50px;height:50px"></td>
                                            <td>{{$row->f_name}}{{$row->l_name}}</td>
                                            <td>{{$row->contact_number}}</td>
                                            <td>@if($row->active_status == 0) <span class="badge bg-danger" style="font-size: 15px;"><b>Disabled</b></span> @else <span class="badge bg-success" style="font-size: 15px;"><b>Active</b></span> @endif </td>
                                            <td>{{ $row->created_at->format('d M / Y, g:i A') }}</td>
                                            
                                            <td>
                                                <a href="{{ route('userEdite', $row->id) }}"><i class="ri-edit-2-fill  text-primary" style="font-size: 20px;"></i></a>&nbsp;&nbsp;
                                                <a href="{{ route('userDelete', $row->id) }}" onclick="return confirm('Are you sure you want to delete this user ?');"><i class="ri-delete-bin-fill  text-danger" style="font-size: 20px;"></i></a>
                                            </td>
                                        </tr>
                                            @php $i++  @endphp
                                        @endforeach
                                </tbody> 

                           
                            </table>
                        </div>

                        <div class="tab-pane @if($errors->any()) active @endif" id="messages1" role="tabpanel">
                            <form method="post" action="{{ route('userCreate') }}" class="mt-6 space-y-6"  enctype="multipart/form-data">
                               @csrf
                                <h4 class="card-title">Profile Info</h4>
                                <p class="card-text">Basics detials about user.</p>

                                <div class="row mt-2">
                                    <div class="col-md-4">
                                        <lable>First Name</lable>
                                        <input class="form-control" type="text" name="f_name"  value="{{ old('f_name') }}" placeholder="Enter First name">
                                        @error('f_name')<li class="text-danger">{{ $message }}</li>@enderror
                                    </div>
                                
                                    <div class="col-md-4">
                                        <lable>Last Name</label>
                                        <input class="form-control" type="text" name="l_name"  value="{{ old('l_name') }}"  placeholder="Enter Last name">
                                        @error('l_name')<li class="text-danger">{{ $message }}</li>@enderror
                                    </div>

                                    <div class="col-md-4">
                                        <lable>Email</lable>
                                        <input class="form-control" type="email" name="email"  value="{{ old('email') }}" placeholder="Enter Email address">
                                        @error('email')<li class="text-danger">{{ $message }}</li>@enderror 
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-4">
                                        <lable>Contact Number</lable>
                                        <input class="form-control" type="number" name="contact_number" value="{{ old('contact_number') }}" placeholder="Enter contact number">
                                        @error('contact_number')<li class="text-danger">{{ $message }}</li>@enderror
                                    </div>
                                
                                    <div class="col-md-4">
                                        <lable>Whatsapp Number</label>
                                        <input class="form-control" type="number" name="whatsapp_number" value="{{ old('whatsapp_number') }}" placeholder="Enter whatsapp number">
                                        @error('whatsapp_number')<li class="text-danger">{{ $message }}</li>@enderror
                                    </div>

                                    <div class="col-md-4">
                                        <lable>Select Role</label>
                                        <select class="form-control" name="role" required>
                                            <option value="">select role</option>
                                            @foreach($roles as $role)
                                                <option value="{{ $role->id }}" @if(old('role') == $role->id) selected  @endif>{{ $role->name }}</option>
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
                                        <input class="form-control" type="password" name="password"  required="" placeholder="Enter New Password">
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
                                            <option value="1">Active</option>
                                            <option value="0">Disabled</option>
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
                                        <textarea class="form-control" name="address"  placeholder="Enter user address">{{ old('address') }}</textarea> 
                                        @error('address')<li class="text-danger">{{ $message }}</li>@enderror
                                    </div>
                                
                                    
                                </div><hr>

                                <div class="mt-3 d-flex justify-content-end">
                                <button class="btn-outline btn btn-primary" type="submit">Create user & account</button>&nbsp;&nbsp;<button class="btn-outline btn btn-dark" type="reset">Reset</button>
                                </div>

                            </form>
                        </div>
                    
                    </div>

                </div>
            </div>    
            
            
                        <!-- Add this code where you want to display the modal -->
            <div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="userModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="myModalLabel">User Information</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Display user information here -->
                            <img class="rounded mx-auto d-block" alt="200x200" width="325" src="" data-holder-rendered="true" id="profileimg"><hr>
                            <div id="userDetails">
                                <p style="font-size: 16px;">Name : <span id="userName"> </span>&nbsp;<span id="serName"></span></p>
                                <p style="font-size: 16px;">Role : <span class="badge bg-info" id="role" style="font-size: 13px;"></span></p>
                                <p style="font-size: 16px;">Email : <span id="userEmail"></span></p>
                                <p style="font-size: 16px;">Contact number : <span id="contact"></span></p>
                                <p style="font-size: 16px;">Whatsapp number : <span id="whatsapp"></span></p>
                                <p style="font-size: 16px;">Address : <span id="address"></span></p>
                                <!-- Add other user details you want to display -->
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




// Function to fetch user details and show in the modal
function showUserDetails(userId) {
        $.ajax({
            type: "GET",
            url: "{{ route('userShow', ['id' => ':id']) }}".replace(':id', userId),
            success: function (response) {
                // Populate the modal with user information
                $("#userName").text(response.f_name);
                $("#serName").text(response.l_name);
                $("#userEmail").text(response.email);

                $("#contact").text(response.contact_number);
                $("#whatsapp").text(response.whatsapp_number);
                $("#address").text(response.address);
                // Add other user details as needed
                $("#profileimg").attr("src", (response.image !== null) ? "{{ asset('uploads/') }}/" + response.image : "{{ asset('assets/images/small/profile.png') }}");  
                $("#role").text(response.role); // Display the user's role
                $("#status").text(response.active_status); // Display the user's role
                
            
                // Show the modal
                $("#userModal").modal("show");
            },
            error: function (error) {
                console.error("Error fetching user details:", error);
            }
        });
    }

    // Add a click event to the action icon to trigger the AJAX request and display the modal
    $(document).on("click", ".user-details-link", function (event) {
        event.stopPropagation(); // Stop event bubbling to prevent row selection
        // Get the user ID from the span's data attribute
        var userId = $(this).data("user-id");
        showUserDetails(userId);
    });

</script>

@endsection