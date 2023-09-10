@extends('layouts.base')
@section('content')

<style>
#walletContainer {
    display: inline-flex;
    align-items: center;
    padding: 15px;
    background-color: #f0f0f0;
    border-radius: 25px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

#walletIcon {
    font-size: 30px;
    color: #3498db;
    margin-right: 10px;
}

#walletInfo {
    display: flex;
    flex-direction: column;
}

#walletAmount {
    font-size: 22px;
    font-weight: bold;
    color: #8bc34a; /* Yellow-greenish color (#8bc34a) */
}

#walletCurrency {
    font-size: 22px;
    font-weight: bold;
    color: #3498db; /* Blue color (#3498db) */
}

#currencyInfo {
    font-size: 12px;
    color: #999; /* Gray color (#999) */
}

</style>

     <!-- start page title -->
     <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Company</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Utility</a></li>
                            <li class="breadcrumb-item active">Company Profile</li>
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
                    <h4 class="card-title">Company Logo</h4><hr>
                    <img class="rounded mx-auto d-block" alt="200x200" width="300" src="{{ (!empty($user->logo)) ? asset('uploads/'.$user->logo):asset('assets/images/small/profile.png')  }}" data-holder-rendered="true" id="updateprofile">
                    <hr> <form action="{{ route('company.image.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $user->id }}">
                        <input type="file" class="form-control" name="logo" id="logo">
                        @error('logo')<li class="text-danger">{{ $message }}</li>@enderror
                        <button class="btn btn-primary form-control mt-3">UPDATE LOGO</button></form>
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
                                <span class="d-none d-sm-block">Credit account</span>   
                            </a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content p-3 text-muted">
            
                        <div class="tab-pane {{ ! $errors->any() ? 'active' : '' }}" id="profile1" role="tabpanel">
                         <form method="post" action="{{ route('compnay.update') }}" class="mt-6 space-y-6">
                            @csrf

                            <input type="hidden" name="id" value="{{ $user->id }}">

                            
                                <div class="container">
                                    <div class="card">
                                            <div class="card-header">
                                                Company informations
                                            </div>
                                            <div class="card-body">
                                                    <div class="row mt-2">
                                                        <div class="col-md-6">
                                                            <lable>Full name</lable>
                                                            <input class="form-control" type="text" name="name" value="{{ $user->name }}" required="" placeholder="Enter company full name">
                                                            @error('name')<li class="text-danger">{{ $message }}</li>@enderror
                                                        </div>
                                                    
                                                        <div class="col-md-6">
                                                            <lable>Email</label>
                                                            <input class="form-control" type="text" name="email" value="{{ $user->email }}"  placeholder="Enter company email address">
                                                            @error('email')<li class="text-danger">{{ $message }}</li>@enderror
                                                        </div>
                                                    </div>

                                                    <div class="row mt-3">
                                                        <div class="col-md-6">
                                                            <lable>Contact Number</lable>
                                                            <input class="form-control" type="number" name="contact_number" value="{{ $user->phone }}" required="" placeholder="Enter company contact number">
                                                            @error('contact_number')<li class="text-danger">{{ $message }}</li>@enderror
                                                        </div>
                                                    
                                                        <div class="col-md-6">
                                                            <lable>Contact Number 2</label>
                                                            <input class="form-control" type="number2" name="contact_number2" value="{{ $user->phone2 }}" placeholder="Enter company another contact number">
                                                            @error('contact_number2')<li class="text-danger">{{ $message }}</li>@enderror
                                                        </div>
                                                    </div>

                                                    <div class="row mt-3">
                                                        <div class="col-md-6">
                                                            <lable>Address</label>
                                                            <textarea class="form-control" name="address">{{ $user->address }}</textarea> 
                                                            @error('address')<li class="text-danger">{{ $message }}</li>@enderror
                                                        </div>
                                                    
                                                        <div class="col-md-6">
                                                            <lable>Description</label>
                                                            <textarea class="form-control" name="description">{{ $user->description }}</textarea> 
                                                            @error('description')<li class="text-danger">{{ $message }}</li>@enderror
                                                        </div>
                                                    </div> 
                                            </div>
                                    </div>
                               </div>
                         <hr>

                            <div class="container">
                                <div class="card">
                                    <div class="card-header">
                                        Company Links
                                    </div>
                                    <div class="card-body">
                                        <div class="row mt-2">
                                            <div class="col-md-6">
                                                <label>Website Link (optional)</label>
                                                <input class="form-control" type="text" name="website" value="{{ $user->website }}" placeholder="Website Link">
                                                @error('website')<li class="text-danger">{{ $message }}</li>@enderror
                                            </div>
                                            <div class="col-md-6">
                                                <label>Twitter Link (optional)</label>
                                                <input class="form-control" type="text" name="twitter" value="{{ $user->twitter }}" placeholder="Twitter Link">
                                                @error('twitter')<li class="text-danger">{{ $message }}</li>@enderror
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-6">
                                                <label>Instagram Link (optional)</label>
                                                <input class="form-control" type="text" name="instagram" value="{{ $user->instagram }}" placeholder="Instagram Link">
                                                @error('instagram')<li class="text-danger">{{ $message }}</li>@enderror
                                            </div>
                                            <div class="col-md-6">
                                                <label>Facebook Link (optional)</label>
                                                <input class="form-control" type="text" name="facebook" value="{{ $user->facebook }}" placeholder="Facebook Link">
                                                @error('facebook')<li class="text-danger">{{ $message }}</li>@enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><hr>

                            
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    &nbsp;<button class=" btn btn-success" type="submit">UPDATE PROFILE INFO</button>
                                </div>
                            </div>
                        
                         </form>
                        </div>
                        <div class="tab-pane {{ $errors->updatePassword->any() ? 'active' : '' }}" id="messages1" role="tabpanel">
                            <form method="post" action="{{ route('Inamount.update') }}" class="mt-6 space-y-6">
                            @csrf

                            

                            @if(!isset($wallet) || $wallet->initial_blance === null)
                                <p class="card-text">Fistly set the currency then you can add the intial amount.</p>
                            @endif

                            @if (!isset($wallet) || $wallet->initial_blance === null)

                            <input type="hidden" name="id"   @if(isset($wallet)) value="{{ $wallet->id }} @endif">

                                <div class="row mt-2">
                                    <div class="col-md-8">
                                        <lable>Initial Amount</lable>
                                        <input class="form-control" type="number" id="amount" name="amount" placeholder="Enter the inital amount">
                                        <div id="output" style="background-color: #f0f0f0;padding: 3px;border-radius: 3px;margin-top: 2px;">
                                        <p id="textOutput" style="color:#006400;"></p>
                                        </div>
                                    </div>

                                    @if(isset($wallet) && $wallet->currency !== null)
                                    <div class="col-md-4"><br>
                                        <button class="form-contol btn btn-dark">Update ammount</button>
                                    </div>
                                    @endif
                                </div>

                                @else
                                <div class="row mt-2">
                                <div class="col-md-6">
                                    <div class="container">
                                        <div id="walletContainer">
                                            <span id="walletIcon" class="ri-wallet-2-line"></span>
                                            <span id="walletAmount" style="color:#e74c3c;">{{ $wallet->initial_blance }} </span>&nbsp;&nbsp;<span id="walletCurrency">{{ $wallet->currency }}</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="container">
                                        <div id="walletContainer">
                                            <span id="walletIcon" class="ri-wallet-3-fill"></span>
                                            <span id="walletAmount">{{ $wallet->initial_blance }} </span>&nbsp;&nbsp;<span id="walletCurrency">{{ $wallet->currency }}</span>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                @endif
                            </form>
                            
                            
                            <hr>

                         <form method="post" action="{{ route('currency.update') }}" class="mt-6 space-y-6">
                           @csrf

                           <input type="hidden" name="id"   @if(isset($wallet)) value="{{ $wallet->id }} @endif">

                            <div class="row mt-2">
                                <div class="col-md-8">
                                    <lable>Currency</lable>
                                    <select id="currencySelect" class="form-control" required name="currency">
                                        <option value="">Selet currency</option>
                                        <option value="USD" @if(isset($wallet) && $wallet->currency == 'USD') selected @endif>USD - United States Dollar</option>
                                        <option value="EUR" @if(isset($wallet) && $wallet->currency == 'EUR') selected @endif>EUR - Euro</option>
                                        <option value="GBP" @if(isset($wallet) && $wallet->currency == 'GBP') selected @endif>GBP - British Pound Sterling</option>
                                        <option value="JPY" @if(isset($wallet) && $wallet->currency == 'JPY') selected @endif>JPY - Japanese Yen</option>
                                        <option value="CNY" @if(isset($wallet) && $wallet->currency == 'CNY') selected @endif>CNY - Chinese Yuan</option>
                                        <option value="INR" @if(isset($wallet) && $wallet->currency == 'INR') selected @endif>INR - Indian Rupee</option>
                                        <option value="KRW" @if(isset($wallet) && $wallet->currency == 'KRW') selected @endif>KRW - South Korean Won</option>
                                        <option value="AUD" @if(isset($wallet) && $wallet->currency == 'AUD') selected @endif>AUD - Australian Dollar</option>
                                        <option value="CAD" @if(isset($wallet) && $wallet->currency == 'CAD') selected @endif>CAD - Canadian Dollar</option>
                                        <option value="AED" @if(isset($wallet) && $wallet->currency == 'AED') selected @endif>AED - United Arab Emirates Dirham</option>
                                        <option value="SAR" @if(isset($wallet) && $wallet->currency == 'SAR') selected @endif>SAR - Saudi Riyal</option>
                                        <option value="QAR" @if(isset($wallet) && $wallet->currency == 'QAR') selected @endif>QAR - Qatari Riyal</option>
                                        <option value="OMR" @if(isset($wallet) && $wallet->currency == 'OMR') selected @endif>OMR - Omani Rial</option>
                                        <option value="KWD" @if(isset($wallet) && $wallet->currency == 'KWD') selected @endif>KWD - Kuwaiti Dinar</option>
                                        <option value="PKR" @if(isset($wallet) && $wallet->currency == 'PKR') selected @endif>PKR - Pakistani Rupee</option>
                                        <option value="AFN" @if(isset($wallet) && $wallet->currency == 'AFN') selected @endif>AFN - Afghan Afghani</option>
                                        <option value="MYR" @if(isset($wallet) && $wallet->currency == 'MYR') selected @endif>MYR - Malaysian Ringgit</option>
                                        <option value="TRY" @if(isset($wallet) && $wallet->currency == 'TRY') selected @endif>TRY - Turkish Lira</option>
                                        <option value="IRR" @if(isset($wallet) && $wallet->currency == 'IRR') selected @endif>IRR - Iranian Rial</option>
                                        <option value="BDT" @if(isset($wallet) && $wallet->currency == 'BDT') selected @endif>BDT - Bangladeshi Taka</option>
                                        <!-- Add more currencies here -->
                                    </select>
                                </div>
                                <div class="col-md-4"><br>
                                    <button class="form-contol btn @if(isset($wallet) && $wallet->currency === null) btn-dark  @else btn-danger @endif" type="submit">Update currency</button>
                                </div>
                            </div>

                         </form>
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

    //this is the number to text converter 

    $(document).ready(function() {
            $('#amount').on('input', function() {
                const inputValue = $(this).val();
                const textOutput = convertAmountToText(inputValue);
                $('#textOutput').text(textOutput);
            });

        });

    //end of the section
        //this is for instant image showing for ptofile
        $(document).ready(function(){
            $('#logo').change(function(e){
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