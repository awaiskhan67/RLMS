@extends('layouts.base')
@section('content')


       <!-- start page title -->
       <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Tenant</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Utility</a></li>
                            <li class="breadcrumb-item active">Tenant</li>
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
                                <span class="d-none d-sm-block">Tenant List</span> 
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if($errors->any()) active @endif" data-bs-toggle="tab" href="#messages1" role="tab">
                                <span class="d-block d-sm-none"><i class="fas fa-lock"></i></span>
                                <span class="d-none d-sm-block">Add new Tenant</span>   
                            </a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content p-3 text-muted">
            
                        <div class="tab-pane @if(!$errors->any()) active @endif" id="profile1" role="tabpanel">
                            <table id="datatable" class="table table-bordered  dt-responsive table-hover" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead class="table-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Pic</th>
                                        <th>Name</th>
                                        <th>CNIC</th>
                                        <th>Country</th>
                                        <th>City</th>
                                        <th>Created at</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                        @php $i=1  @endphp
                                        @foreach ($tenant as $row)
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>
                                                <div style="width: 100px; height: 70px; overflow: hidden;">
                                                    <img class="rounded" alt="Image" src="{{ (!empty($row->image)) ? asset('uploads/'.$row->image) : asset('assets/images/small/profile.png') }}" style="object-fit: cover; width: 100%; height: 100%;" />
                                                </div>
                                            </td>
                                            <td>{{ $row->f_name }}{{ $row->l_name }}</td>
                                            <td>{{ $row->cnic }}</td>
                                            <td>{{ $row->country }}</td>
                                            <td>{{ $row->city }}</td>
                                            <td>{{ $row->created_at->format('d M / Y, g:i A') }}</td>
                                            <td>
                                                <a href="{{ route('tenant.profile', $row->id) }}"><i class=" ri-arrow-right-circle-line  text-success" style="font-size: 26px;"></i></a>&nbsp;&nbsp;
                                                <a href="{{ route('tenant.edite', $row->id) }}"><i class="ri-edit-2-fill  text-primary" style="font-size: 26px;"></i></a>&nbsp;&nbsp;
                                                <a href="{{ route('tenant.delete', $row->id) }}" onclick="return confirm('Are you sure you want to delete this Tenanter ?');"><i class="ri-delete-bin-fill  text-danger" style="font-size: 26px;"></i></a>
                                            </td>
                                        </tr>
                                            @php $i++  @endphp
                                        @endforeach
                                </tbody> 

                           
                            </table>
                        </div>

                        <div class="tab-pane @if($errors->any()) active @endif" id="messages1" role="tabpanel">
                            <form method="post" action="{{ route('tenant.add') }}" class="mt-6 space-y-6"  enctype="multipart/form-data">
                               @csrf
                       

                                <div class="row mt-4">

                                    <div class="col-md-4">
                                        <label>Serial No</label>
                                        <input class="form-control" type="text" name="serial"  value="@if($lastSerialNo  != 0) {{ $lastSerialNo + 1 }} @endif" placeholder="00001" @if($lastSerialNo != 0) readonly @endif>
                                        @error('serial')<li class="text-danger">{{ $message }}</li>@enderror
                                    </div>
                                 
                                    <div class="col-md-4">
                                        <label>First Name</label>
                                        <input class="form-control" type="text" name="f_name" value="{{ old('f_name') }}" placeholder="Enter first name">
                                        @error('f_name')<li class="text-danger">{{ $message }}</li>@enderror
                                    </div>

                                    <div class="col-md-4">
                                            <label>Last Name</label>
                                            <input class="form-control" type="text" name="l_name" value="{{ old('l_name') }}" placeholder="Enter last name">
                                            @error('l_name')<li class="text-danger">{{ $message }}</li>@enderror
                                    </div>

                                  
                                </div>

                                <div class="row mt-4">

                                    <div class="col-md-4">
                                        <label>Email</label>
                                        <input class="form-control" type="email" name="email" value="{{ old('email') }}" placeholder="Enter email">
                                        @error('email')<li class="text-danger">{{ $message }}</li>@enderror
                                    </div>

                                   <div class="col-md-4">

                                        <label>CNIC Number</label>
                                        <input class="form-control" type="number" name="cnic" value="{{ old('cnic') }}" placeholder="Enter CNIC">
                                        @error('cnic')<li class="text-danger">{{ $message }}</li>@enderror
                                   
                                   </div>

                                   <div class="col-md-4">
                                       <label>Country</label>
                                        <select id="country" name="country" class="form-control">
                                            <option value="">select country</option>
                                            <option value="Afghanistan">Afghanistan</option>
                                            <option value="Åland Islands">Åland Islands</option>
                                            <option value="Albania">Albania</option>
                                            <option value="Algeria">Algeria</option>
                                            <option value="American Samoa">American Samoa</option>
                                            <option value="Andorra">Andorra</option>
                                            <option value="Angola">Angola</option>
                                            <option value="Anguilla">Anguilla</option>
                                            <option value="Antarctica">Antarctica</option>
                                            <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                            <option value="Argentina">Argentina</option>
                                            <option value="Armenia">Armenia</option>
                                            <option value="Aruba">Aruba</option>
                                            <option value="Australia">Australia</option>
                                            <option value="Austria">Austria</option>
                                            <option value="Azerbaijan">Azerbaijan</option>
                                            <option value="Bahamas">Bahamas</option>
                                            <option value="Bahrain">Bahrain</option>
                                            <option value="Bangladesh">Bangladesh</option>
                                            <option value="Barbados">Barbados</option>
                                            <option value="Belarus">Belarus</option>
                                            <option value="Belgium">Belgium</option>
                                            <option value="Belize">Belize</option>
                                            <option value="Benin">Benin</option>
                                            <option value="Bermuda">Bermuda</option>
                                            <option value="Bhutan">Bhutan</option>
                                            <option value="Bolivia">Bolivia</option>
                                            <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                            <option value="Botswana">Botswana</option>
                                            <option value="Bouvet Island">Bouvet Island</option>
                                            <option value="Brazil">Brazil</option>
                                            <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                            <option value="Brunei Darussalam">Brunei Darussalam</option>
                                            <option value="Bulgaria">Bulgaria</option>
                                            <option value="Burkina Faso">Burkina Faso</option>
                                            <option value="Burundi">Burundi</option>
                                            <option value="Cambodia">Cambodia</option>
                                            <option value="Cameroon">Cameroon</option>
                                            <option value="Canada">Canada</option>
                                            <option value="Cape Verde">Cape Verde</option>
                                            <option value="Cayman Islands">Cayman Islands</option>
                                            <option value="Central African Republic">Central African Republic</option>
                                            <option value="Chad">Chad</option>
                                            <option value="Chile">Chile</option>
                                            <option value="China">China</option>
                                            <option value="Christmas Island">Christmas Island</option>
                                            <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                            <option value="Colombia">Colombia</option>
                                            <option value="Comoros">Comoros</option>
                                            <option value="Congo">Congo</option>
                                            <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
                                            <option value="Cook Islands">Cook Islands</option>
                                            <option value="Costa Rica">Costa Rica</option>
                                            <option value="Cote D ivoire">Cote D ivoire</option>
                                            <option value="Croatia">Croatia</option>
                                            <option value="Cuba">Cuba</option>
                                            <option value="Cyprus">Cyprus</option>
                                            <option value="Czech Republic">Czech Republic</option>
                                            <option value="Denmark">Denmark</option>
                                            <option value="Djibouti">Djibouti</option>
                                            <option value="Dominica">Dominica</option>
                                            <option value="Dominican Republic">Dominican Republic</option>
                                            <option value="Ecuador">Ecuador</option>
                                            <option value="Egypt">Egypt</option>
                                            <option value="El Salvador">El Salvador</option>
                                            <option value="Equatorial Guinea">Equatorial Guinea</option>
                                            <option value="Eritrea">Eritrea</option>
                                            <option value="Estonia">Estonia</option>
                                            <option value="Ethiopia">Ethiopia</option>
                                            <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                                            <option value="Faroe Islands">Faroe Islands</option>
                                            <option value="Fiji">Fiji</option>
                                            <option value="Finland">Finland</option>
                                            <option value="France">France</option>
                                            <option value="French Guiana">French Guiana</option>
                                            <option value="French Polynesia">French Polynesia</option>
                                            <option value="French Southern Territories">French Southern Territories</option>
                                            <option value="Gabon">Gabon</option>
                                            <option value="Gambia">Gambia</option>
                                            <option value="Georgia">Georgia</option>
                                            <option value="Germany">Germany</option>
                                            <option value="Ghana">Ghana</option>
                                            <option value="Gibraltar">Gibraltar</option>
                                            <option value="Greece">Greece</option>
                                            <option value="Greenland">Greenland</option>
                                            <option value="Grenada">Grenada</option>
                                            <option value="Guadeloupe">Guadeloupe</option>
                                            <option value="Guam">Guam</option>
                                            <option value="Guatemala">Guatemala</option>
                                            <option value="Guernsey">Guernsey</option>
                                            <option value="Guinea">Guinea</option>
                                            <option value="Guinea-bissau">Guinea-bissau</option>
                                            <option value="Guyana">Guyana</option>
                                            <option value="Haiti">Haiti</option>
                                            <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                                            <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                                            <option value="Honduras">Honduras</option>
                                            <option value="Hong Kong">Hong Kong</option>
                                            <option value="Hungary">Hungary</option>
                                            <option value="Iceland">Iceland</option>
                                            <option value="India">India</option>
                                            <option value="Indonesia">Indonesia</option>
                                            <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                                            <option value="Iraq">Iraq</option>
                                            <option value="Ireland">Ireland</option>
                                            <option value="Isle of Man">Isle of Man</option>
                                            <option value="Israel">Israel</option>
                                            <option value="Italy">Italy</option>
                                            <option value="Jamaica">Jamaica</option>
                                            <option value="Japan">Japan</option>
                                            <option value="Jersey">Jersey</option>
                                            <option value="Jordan">Jordan</option>
                                            <option value="Kazakhstan">Kazakhstan</option>
                                            <option value="Kenya">Kenya</option>
                                            <option value="Kiribati">Kiribati</option>
                                            <option value="Korea, Democratic Peoples Republic of">Korea, Democratic Peoples Republic of</option>
                                            <option value="Korea, Republic of">Korea, Republic of</option>
                                            <option value="Kuwait">Kuwait</option>
                                            <option value="Kyrgyzstan">Kyrgyzstan</option>
                                            <option value="Lao Peoples Democratic Republic">Lao Peoples Democratic Republic</option>
                                            <option value="Latvia">Latvia</option>
                                            <option value="Lebanon">Lebanon</option>
                                            <option value="Lesotho">Lesotho</option>
                                            <option value="Liberia">Liberia</option>
                                            <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                            <option value="Liechtenstein">Liechtenstein</option>
                                            <option value="Lithuania">Lithuania</option>
                                            <option value="Luxembourg">Luxembourg</option>
                                            <option value="Macao">Macao</option>
                                            <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
                                            <option value="Madagascar">Madagascar</option>
                                            <option value="Malawi">Malawi</option>
                                            <option value="Malaysia">Malaysia</option>
                                            <option value="Maldives">Maldives</option>
                                            <option value="Mali">Mali</option>
                                            <option value="Malta">Malta</option>
                                            <option value="Marshall Islands">Marshall Islands</option>
                                            <option value="Martinique">Martinique</option>
                                            <option value="Mauritania">Mauritania</option>
                                            <option value="Mauritius">Mauritius</option>
                                            <option value="Mayotte">Mayotte</option>
                                            <option value="Mexico">Mexico</option>
                                            <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                                            <option value="Moldova, Republic of">Moldova, Republic of</option>
                                            <option value="Monaco">Monaco</option>
                                            <option value="Mongolia">Mongolia</option>
                                            <option value="Montenegro">Montenegro</option>
                                            <option value="Montserrat">Montserrat</option>
                                            <option value="Morocco">Morocco</option>
                                            <option value="Mozambique">Mozambique</option>
                                            <option value="Myanmar">Myanmar</option>
                                            <option value="Namibia">Namibia</option>
                                            <option value="Nauru">Nauru</option>
                                            <option value="Nepal">Nepal</option>
                                            <option value="Netherlands">Netherlands</option>
                                            <option value="Netherlands Antilles">Netherlands Antilles</option>
                                            <option value="New Caledonia">New Caledonia</option>
                                            <option value="New Zealand">New Zealand</option>
                                            <option value="Nicaragua">Nicaragua</option>
                                            <option value="Niger">Niger</option>
                                            <option value="Nigeria">Nigeria</option>
                                            <option value="Niue">Niue</option>
                                            <option value="Norfolk Island">Norfolk Island</option>
                                            <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                            <option value="Norway">Norway</option>
                                            <option value="Oman">Oman</option>
                                            <option value="Pakistan">Pakistan</option>
                                            <option value="Palau">Palau</option>
                                            <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                                            <option value="Panama">Panama</option>
                                            <option value="Papua New Guinea">Papua New Guinea</option>
                                            <option value="Paraguay">Paraguay</option>
                                            <option value="Peru">Peru</option>
                                            <option value="Philippines">Philippines</option>
                                            <option value="Pitcairn">Pitcairn</option>
                                            <option value="Poland">Poland</option>
                                            <option value="Portugal">Portugal</option>
                                            <option value="Puerto Rico">Puerto Rico</option>
                                            <option value="Qatar">Qatar</option>
                                            <option value="Reunion">Reunion</option>
                                            <option value="Romania">Romania</option>
                                            <option value="Russian Federation">Russian Federation</option>
                                            <option value="Rwanda">Rwanda</option>
                                            <option value="Saint Helena">Saint Helena</option>
                                            <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                            <option value="Saint Lucia">Saint Lucia</option>
                                            <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                                            <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                                            <option value="Samoa">Samoa</option>
                                            <option value="San Marino">San Marino</option>
                                            <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                            <option value="Saudi Arabia">Saudi Arabia</option>
                                            <option value="Senegal">Senegal</option>
                                            <option value="Serbia">Serbia</option>
                                            <option value="Seychelles">Seychelles</option>
                                            <option value="Sierra Leone">Sierra Leone</option>
                                            <option value="Singapore">Singapore</option>
                                            <option value="Slovakia">Slovakia</option>
                                            <option value="Slovenia">Slovenia</option>
                                            <option value="Solomon Islands">Solomon Islands</option>
                                            <option value="Somalia">Somalia</option>
                                            <option value="South Africa">South Africa</option>
                                            <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
                                            <option value="Spain">Spain</option>
                                            <option value="Sri Lanka">Sri Lanka</option>
                                            <option value="Sudan">Sudan</option>
                                            <option value="Suriname">Suriname</option>
                                            <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                                            <option value="Swaziland">Swaziland</option>
                                            <option value="Sweden">Sweden</option>
                                            <option value="Switzerland">Switzerland</option>
                                            <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                                            <option value="Taiwan">Taiwan</option>
                                            <option value="Tajikistan">Tajikistan</option>
                                            <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                                            <option value="Thailand">Thailand</option>
                                            <option value="Timor-leste">Timor-leste</option>
                                            <option value="Togo">Togo</option>
                                            <option value="Tokelau">Tokelau</option>
                                            <option value="Tonga">Tonga</option>
                                            <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                            <option value="Tunisia">Tunisia</option>
                                            <option value="Turkey">Turkey</option>
                                            <option value="Turkmenistan">Turkmenistan</option>
                                            <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                            <option value="Tuvalu">Tuvalu</option>
                                            <option value="Uganda">Uganda</option>
                                            <option value="Ukraine">Ukraine</option>
                                            <option value="United Arab Emirates">United Arab Emirates</option>
                                            <option value="United Kingdom">United Kingdom</option>
                                            <option value="United States">United States</option>
                                            <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                                            <option value="Uruguay">Uruguay</option>
                                            <option value="Uzbekistan">Uzbekistan</option>
                                            <option value="Vanuatu">Vanuatu</option>
                                            <option value="Venezuela">Venezuela</option>
                                            <option value="Viet Nam">Viet Nam</option>
                                            <option value="Virgin Islands, British">Virgin Islands, British</option>
                                            <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                                            <option value="Wallis and Futuna">Wallis and Futuna</option>
                                            <option value="Western Sahara">Western Sahara</option>
                                            <option value="Yemen">Yemen</option>
                                            <option value="Zambia">Zambia</option>
                                            <option value="Zimbabwe">Zimbabwe</option>
                                        </select>
                                        @error('country')<li class="text-danger">{{ $message }}</li>@enderror
                                   </div>

                                 
                                </div>

                                <div class="row mt-4">

                                  <div class="col-md-4">
                                       <label>City</label>
                                        <input class="form-control" type="text" name="city" value="{{ old('city') }}" placeholder="Enter city">
                                        @error('city')<li class="text-danger">{{ $message }}</li>@enderror
                                   </div>


                                   <div class="col-md-4">
                                        <label>Contact Number 1</label>
                                        <input class="form-control" type="number" name="contact1" value="{{ old('contact1') }}" placeholder="Enter contact number 1">
                                        @error('contact1')<li class="text-danger">{{ $message }}</li>@enderror
                                   </div>   

                                   <div class="col-md-4">
                                       <label>Contact Number 2</label>
                                        <input class="form-control" type="number" name="contact2" value="{{ old('contact2') }}" placeholder="Enter contact number 2">
                                        @error('contact2')<li class="text-danger">{{ $message }}</li>@enderror
                                   </div>

                                </div>

                                <div class="row mt-4">

                                   <div class="col-md-4">
                                       <label>Contact Number 3</label>
                                        <input class="form-control" type="number" name="contact3" value="{{ old('contact3') }}" placeholder="Enter contact number 3">
                                        @error('contact3')<li class="text-danger">{{ $message }}</li>@enderror
                                   </div>


                                   <div class="col-md-4">
                                        <label>Image</label>
                                        <input class="form-control" type="file" id="profile" name="image">
                                        @error('image')<li class="text-danger">{{ $message }}</li>@enderror
                                   </div>

                                   <div class="col-md-4">

                                       <label>Address</label>
                                        <input class="form-control" type="text" name="address" value="{{ old('address') }}" placeholder="Enter address">
                                        @error('address')<li class="text-danger">{{ $message }}</li>@enderror
                                   </div>

                                </div><hr>

                                 <div class="row mt-4">
                                    <div class="col-md-4">
                                        <label>Gaurantor 1</label>
                                        <select class="form-control" id="g1-select" name="guarantor1">
                                            <option value="">select gaurantor</option>
                                            @foreach($gaurantor as $row)
                                                <option value="{{ $row->id }}">{{ $row->f_name }} {{ $row->l_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('guarantor1')<li class="text-danger">{{ $message }}</li>@enderror
                                        <div class="card">
                                            <img class="card-img-top img-fluid" id="profileimg1" src="{{ (!empty($user->image)) ? asset('uploads/'.$user->image):asset('assets/images/small/profile.png')  }}" alt="Card image cap">
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item">Name :   <span id="g1_fname">....</span> <span id="g1_lname">....</span></li>
                                                <li class="list-group-item">CNIC :   <span id="g1_cnic">....</span></li>
                                                <li class="list-group-item">Country :  <span id="g1_country">....</span></li>
                                                <li class="list-group-item">City :    <span id="g1_city">....</span></li>
                                                <li class="list-group-item">Address :  <span id="g1_address">....</span></li>
                                            </ul>
                                        </div>
                                    </div>   

                                    <div class="col-md-4">
                                        <label>Gaurantor 1</label>
                                        <select class="form-control" id="g2-select" name="guarantor2">
                                           <option value="">select gaurantor</option>
                                            @foreach($gaurantor as $row)
                                                <option value="{{ $row->id }}">{{ $row->f_name }} {{ $row->l_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('guarantor2')<li class="text-danger">{{ $message }}</li>@enderror
                                        <div class="card">
                                            <img class="card-img-top img-fluid" id="profileimg2" src="{{ (!empty($user->image)) ? asset('uploads/'.$user->image):asset('assets/images/small/profile.png')  }}" alt="Card image cap">
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item">Name :   <span id="g2_fname">....</span> <span id="g2_lname">....</span></li>
                                                <li class="list-group-item">CNIC :   <span id="g2_cnic">....</span></li>
                                                <li class="list-group-item">Country :  <span id="g2_country">....</span></li>
                                                <li class="list-group-item">City :    <span id="g2_city">....</span></li>
                                                <li class="list-group-item">Address :  <span id="g2_address">....</span></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label>Gaurantor 1</label>
                                        <select class="form-control" id="g3-select" name="guarantor3">
                                            <option value="">select gaurantor</option>
                                            @foreach($gaurantor as $row)
                                                <option value="{{ $row->id }}">{{ $row->f_name }} {{ $row->l_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('guarantor3')<li class="text-danger">{{ $message }}</li>@enderror
                                        <div class="card">
                                            <img class="card-img-top img-fluid" id="profileimg3" src="{{ (!empty($user->image)) ? asset('uploads/'.$user->image):asset('assets/images/small/profile.png')  }}" alt="Card image cap">
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item">Name :   <span id="g3_fname">....</span> <span id="g3_lname">....</span></li>
                                                <li class="list-group-item">CNIC :   <span id="g3_cnic">....</span></li>
                                                <li class="list-group-item">Country :  <span id="g3_country">....</span></li>
                                                <li class="list-group-item">City :    <span id="g3_city">....</span></li>
                                                <li class="list-group-item">Address :  <span id="g3_address">....</span></li>
                                            </ul>
                                        </div>
                                    </div>


                                 </div>   


                                <div class="mt-3 d-flex justify-content-end">
                                <button class="btn-outline btn btn-primary" type="submit">Add Tenant</button>&nbsp;&nbsp;<button class="btn-outline btn btn-dark" type="reset">Reset</button>
                                </div>

                            </form>
                        </div>
                    
                    </div>

                </div>
            </div>    
            
            

@endsection


@section('script')

<script>


    function g1Details(userId) {
        $.ajax({
            type: "GET",
            url: "{{ route('gShow', ['id' => ':id']) }}".replace(':id', userId),
            success: function (response) {

                $("#profileimg1").attr("src", (response.image !== null) ? "{{ asset('uploads/') }}/" + response.image : "{{ asset('assets/images/small/profile.png') }}");  
                $("#g1_fname").text(response.f_name);
                $("#g1_lname").text(response.l_name);
                $("#g1_cnic").text(response.cnic);
                $("#g1_country").text(response.country);
                $("#g1_city").text(response.city);
                $("#g1_address").text(response.address);
            },
            error: function (error) {
                console.error("Error fetching user details:", error);
            }
        });
    }

    function g2Details(userId) {
        $.ajax({
            type: "GET",
            url: "{{ route('gShow', ['id' => ':id']) }}".replace(':id', userId),
            success: function (response) {
                $("#profileimg2").attr("src", (response.image !== null) ? "{{ asset('uploads/') }}/" + response.image : "{{ asset('assets/images/small/profile.png') }}");  
                $("#g2_fname").text(response.f_name);
                $("#g2_lname").text(response.l_name);
                $("#g2_cnic").text(response.cnic);
                $("#g2_country").text(response.country);
                $("#g2_city").text(response.city);
                $("#g2_address").text(response.address);
            },
            error: function (error) {
                console.error("Error fetching user details:", error);
            }
        });
    }


    function g3Details(userId) {
        $.ajax({
            type: "GET",
            url: "{{ route('gShow', ['id' => ':id']) }}".replace(':id', userId),
            success: function (response) {
                $("#profileimg3").attr("src", (response.image !== null) ? "{{ asset('uploads/') }}/" + response.image : "{{ asset('assets/images/small/profile.png') }}");  
                $("#g3_fname").text(response.f_name);
                $("#g3_lname").text(response.l_name);
                $("#g3_cnic").text(response.cnic);
                $("#g3_country").text(response.country);
                $("#g3_city").text(response.city);
                $("#g3_address").text(response.address);
            },
            error: function (error) {
                console.error("Error fetching user details:", error);
            }
        });
    }

    // Add a change event to the select element to trigger the function
    $("#g1-select").on("change", function () {
        var userId = $(this).val(); // Get the selected user ID from the selected option's value
        g1Details(userId);
    });

    $("#g2-select").on("change", function () {
        var userId = $(this).val(); // Get the selected user ID from the selected option's value
        g2Details(userId);
    });

    $("#g3-select").on("change", function () {
        var userId = $(this).val(); // Get the selected user ID from the selected option's value
        g3Details(userId);
    });






</script>

@endsection