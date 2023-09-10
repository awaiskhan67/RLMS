@extends('layouts.base')
@section('content')

       <!-- start page title -->
       <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Tenant Edite</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Utility</a></li>
                            <li class="breadcrumb-item active">Update tenant</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="card"> 
           <div class="card-body"> 
             <form method="post" action="{{ route('tenant.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="id" value="{{ $property->id }}"> 
                    <div class="row mt-4">
                        <div class="col-md-4">
                            <label>Serial No</label>
                            <input class="form-control" type="text" name="serial"  value="{{ $property->serial_no }}" readonly>
                            @error('serial')<li class="text-danger">{{ $message }}</li>@enderror
                        </div>

                        <div class="col-md-4">
                            <label>First Name</label>
                            <input class="form-control" type="text" name="f_name" value="{{ old('f_name' , $property->f_name ) }}" placeholder="Enter first name">
                            @error('f_name')<li class="text-danger">{{ $message }}</li>@enderror
                        </div>

                        <div class="col-md-4">
                            <label>Last Name</label>
                            <input class="form-control" type="text" name="l_name" value="{{ old('l_name', $property->l_name ) }}" placeholder="Enter last name">
                            @error('l_name')<li class="text-danger">{{ $message }}</li>@enderror
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-4">
                            <label>Email</label>
                            <input class="form-control" type="email" name="email" value="{{ old('email' , $property->email ) }}" placeholder="Enter email">
                            @error('email')<li class="text-danger">{{ $message }}</li>@enderror
                        </div>

                        <div class="col-md-4">
                                <label>CNIC Number</label>
                                <input class="form-control" type="number" name="cnic" value="{{ old('cnic' , $property->cnic ) }}" placeholder="Enter CNIC">
                                @error('cnic')<li class="text-danger">{{ $message }}</li>@enderror
                        </div>

                        <div class="col-md-4">
                            <label>Country</label>
                            <select id="country" name="country" class="form-control">
                                <option value="">select country</option>
                                <option value="Afghanistan" @if($property->country == 'Afghanistan') selected @endif>Afghanistan</option>
                                <option value="Åland Islands" @if($property->country == 'Åland Islands') selected @endif>Åland Islands</option>
                                <option value="Albania" @if($property->country == 'Albania') selected @endif>Albania</option>
                                <option value="Algeria" @if($property->country == 'Algeria') selected @endif>Algeria</option>
                                <option value="American Samoa" @if($property->country == 'American Samoa') selected @endif>American Samoa</option>
                                <option value="Andorra" @if($property->country == 'Andorra') selected @endif>Andorra</option>
                                <option value="Angola" @if($property->country == 'Angola') selected @endif>Angola</option>
                                <option value="Anguilla" @if($property->country == 'Anguilla') selected @endif>Anguilla</option>
                                <option value="Antarctica" @if($property->country == 'Antarctica') selected @endif>Antarctica</option>
                                <option value="Antigua and Barbuda" @if($property->country == 'Antigua and Barbuda') selected @endif>Antigua and Barbuda</option>
                                <option value="Argentina" @if($property->country == 'Argentina') selected @endif>Argentina</option>
                                <option value="Armenia" @if($property->country == 'Armenia') selected @endif>Armenia</option>
                                <option value="Aruba" @if($property->country == 'Aruba') selected @endif>Aruba</option>
                                <option value="Australia" @if($property->country == 'Australia') selected @endif>Australia</option>
                                <option value="Austria" @if($property->country == 'Austria') selected @endif>Austria</option>
                                <option value="Azerbaijan" @if($property->country == 'Azerbaijan') selected @endif>Azerbaijan</option>
                                <option value="Bahamas" @if($property->country == 'Bahamas') selected @endif>Bahamas</option>
                                <option value="Bahrain" @if($property->country == 'Bahrain') selected @endif>Bahrain</option>
                                <option value="Bangladesh" @if($property->country == 'Bangladesh') selected @endif>Bangladesh</option>
                                <option value="Barbados" @if($property->country == 'Barbados') selected @endif>Barbados</option>
                                <option value="Belarus" @if($property->country == 'Belarus') selected @endif>Belarus</option>
                                <option value="Belgium" @if($property->country == 'Belgium') selected @endif>Belgium</option>
                                <option value="Belize" @if($property->country == 'Belize') selected @endif>Belize</option>
                                <option value="Benin" @if($property->country == 'Benin') selected @endif>Benin</option>
                                <option value="Bermuda" @if($property->country == 'Bermuda') selected @endif>Bermuda</option>
                                <option value="Bhutan" @if($property->country == 'Bhutan') selected @endif>Bhutan</option>
                                <option value="Bolivia" @if($property->country == 'Bolivia') selected @endif>Bolivia</option>
                                <option value="Bosnia and Herzegovina" @if($property->country == 'Bosnia and Herzegovina') selected @endif>Bosnia and Herzegovina</option>
                                <option value="Botswana" @if($property->country == 'Botswana') selected @endif>Botswana</option>
                                <option value="Bouvet Island" @if($property->country == 'Bouvet Island') selected @endif>Bouvet Island</option>
                                <option value="Brazil" @if($property->country == 'Brazil') selected @endif>Brazil</option>
                                <option value="British Indian Ocean Territory" @if($property->country == 'British Indian Ocean Territory') selected @endif>British Indian Ocean Territory</option>
                                <option value="Brunei Darussalam" @if($property->country == 'Brunei Darussalam') selected @endif>Brunei Darussalam</option>
                                <option value="Bulgaria" @if($property->country == 'Bulgaria') selected @endif>Bulgaria</option>
                                <option value="Burkina Faso" @if($property->country == 'Burkina Faso') selected @endif>Burkina Faso</option>
                                <option value="Burundi" @if($property->country == 'Burundi') selected @endif>Burundi</option>
                                <option value="Cambodia" @if($property->country == 'Cambodia') selected @endif>Cambodia</option>
                                <option value="Cameroon" @if($property->country == 'Cameroon') selected @endif>Cameroon</option>
                                <option value="Canada" @if($property->country == 'Canada') selected @endif>Canada</option>
                                <option value="Cape Verde" @if($property->country == 'Cape Verde') selected @endif>Cape Verde</option>
                                <option value="Cayman Islands" @if($property->country == 'Cayman Islands') selected @endif>Cayman Islands</option>
                                <option value="Central African Republic" @if($property->country == 'Central African Republic') selected @endif>Central African Republic</option>
                                <option value="Chad" @if($property->country == 'Chad') selected @endif>Chad</option>
                                <option value="Chile" @if($property->country == 'Chile') selected @endif>Chile</option>
                                <option value="China" @if($property->country == 'China') selected @endif>China</option>
                                <option value="Christmas Island" @if($property->country == 'Christmas Island') selected @endif>Christmas Island</option>
                                <option value="Cocos (Keeling) Islands" @if($property->country == 'Cocos (Keeling) Islands') selected @endif>Cocos (Keeling) Islands</option>
                                <option value="Colombia" @if($property->country == 'Colombia') selected @endif>Colombia</option>
                                <option value="Comoros" @if($property->country == 'Comoros') selected @endif>Comoros</option>
                                <option value="Congo" @if($property->country == 'Congo') selected @endif>Congo</option>
                                <option value="Congo, The Democratic Republic of The" @if($property->country == 'Congo, The Democratic Republic of The') selected @endif>Congo, The Democratic Republic of The</option>
                                <option value="Cook Islands" @if($property->country == 'Cook Islands') selected @endif>Cook Islands</option>
                                <option value="Costa Rica" @if($property->country == 'Costa Rica') selected @endif>Costa Rica</option>
                                <option value="Cote D ivoire" @if($property->country == 'Cote D ivoire') selected @endif>Cote D ivoire</option>
                                <option value="Croatia" @if($property->country == 'Croatia') selected @endif>Croatia</option>
                                <option value="Cuba" @if($property->country == 'Cuba') selected @endif>Cuba</option>
                                <option value="Cyprus" @if($property->country == 'Cyprus') selected @endif>Cyprus</option>
                                <option value="Czech Republic" @if($property->country == 'Czech Republic') selected @endif>Czech Republic</option>
                                <option value="Denmark" @if($property->country == 'Denmark') selected @endif>Denmark</option>
                                <option value="Djibouti" @if($property->country == 'Djibouti') selected @endif>Djibouti</option>
                                <option value="Dominica" @if($property->country == 'Dominica') selected @endif>Dominica</option>
                                <option value="Dominican Republic" @if($property->country == 'Dominican Republic') selected @endif>Dominican Republic</option>
                                <option value="Ecuador" @if($property->country == 'Ecuador') selected @endif>Ecuador</option>
                                <option value="Egypt" @if($property->country == 'Egypt') selected @endif>Egypt</option>
                                <option value="El Salvador" @if($property->country == 'El Salvador') selected @endif>El Salvador</option>
                                <option value="Equatorial Guinea" @if($property->country == 'Equatorial Guinea') selected @endif>Equatorial Guinea</option>
                                <option value="Eritrea" @if($property->country == 'Eritrea') selected @endif>Eritrea</option>
                                <option value="Estonia" @if($property->country == 'Estonia') selected @endif>Estonia</option>
                                <option value="Ethiopia" @if($property->country == 'Ethiopia') selected @endif>Ethiopia</option>
                                <option value="Falkland Islands (Malvinas)" @if($property->country == 'Falkland Islands (Malvinas)') selected @endif>Falkland Islands (Malvinas)</option>
                                <option value="Faroe Islands" @if($property->country == 'Faroe Islands') selected @endif>Faroe Islands</option>
                                <option value="Fiji" @if($property->country == 'Fiji') selected @endif>Fiji</option>
                                <option value="Finland" @if($property->country == 'Finland') selected @endif>Finland</option>
                                <option value="France" @if($property->country == 'France') selected @endif>France</option>
                                <option value="French Guiana" @if($property->country == 'French Guiana') selected @endif>French Guiana</option>
                                <option value="French Polynesia" @if($property->country == 'French Polynesia') selected @endif>French Polynesia</option>
                                <option value="French Southern Territories" @if($property->country == 'French Southern Territories') selected @endif>French Southern Territories</option>
                                <option value="Gabon" @if($property->country == 'Gabon') selected @endif>Gabon</option>
                                <option value="Gambia" @if($property->country == 'Gambia') selected @endif>Gambia</option>
                                <option value="Georgia" @if($property->country == 'Georgia') selected @endif>Georgia</option>
                                <option value="Germany" @if($property->country == 'Germany') selected @endif>Germany</option>
                                <option value="Ghana" @if($property->country == 'Ghana') selected @endif>Ghana</option>
                                <option value="Gibraltar" @if($property->country == 'Gibraltar') selected @endif>Gibraltar</option>
                                <option value="Greece" @if($property->country == 'Greece') selected @endif>Greece</option>
                                <option value="Greenland" @if($property->country == 'Greenland') selected @endif>Greenland</option>
                                <option value="Grenada" @if($property->country == 'Grenada') selected @endif>Grenada</option>
                                <option value="Guadeloupe" @if($property->country == 'Guadeloupe') selected @endif>Guadeloupe</option>
                                <option value="Guam" @if($property->country == 'Guam') selected @endif>Guam</option>
                                <option value="Guatemala" @if($property->country == 'Guatemala') selected @endif>Guatemala</option>
                                <option value="Guernsey" @if($property->country == 'Guernsey') selected @endif>Guernsey</option>
                                <option value="Guinea" @if($property->country == 'Guinea') selected @endif>Guinea</option>
                                <option value="Guinea-bissau" @if($property->country == 'Guinea-bissau') selected @endif>Guinea-bissau</option>
                                <option value="Guyana" @if($property->country == 'Guyana') selected @endif>Guyana</option>
                                <option value="Haiti" @if($property->country == 'Haiti') selected @endif>Haiti</option>
                                <option value="Heard Island and Mcdonald Islands" @if($property->country == 'Heard Island and Mcdonald Islands') selected @endif>Heard Island and Mcdonald Islands</option>
                                <option value="Holy See (Vatican City State)" @if($property->country == 'Holy See (Vatican City State)') selected @endif>Holy See (Vatican City State)</option>
                                <option value="Honduras" @if($property->country == 'Honduras') selected @endif>Honduras</option>
                                <option value="Hong Kong" @if($property->country == 'Hong Kong') selected @endif>Hong Kong</option>
                                <option value="Hungary" @if($property->country == 'Hungary') selected @endif>Hungary</option>
                                <option value="Iceland" @if($property->country == 'Iceland') selected @endif>Iceland</option>
                                <option value="India" @if($property->country == 'India') selected @endif>India</option>
                                <option value="Indonesia" @if($property->country == 'Indonesia') selected @endif>Indonesia</option>
                                <option value="Iran, Islamic Republic of" @if($property->country == 'Iran, Islamic Republic of') selected @endif>Iran, Islamic Republic of</option>
                                <option value="Iraq" @if($property->country == 'Iraq') selected @endif>Iraq</option>
                                <option value="Ireland" @if($property->country == 'Ireland') selected @endif>Ireland</option>
                                <option value="Isle of Man" @if($property->country == 'Isle of Man') selected @endif>Isle of Man</option>
                                <option value="Israel" @if($property->country == 'Israel') selected @endif>Israel</option>
                                <option value="Italy" @if($property->country == 'Italy') selected @endif>Italy</option>
                                <option value="Jamaica" @if($property->country == 'Jamaica') selected @endif>Jamaica</option>
                                <option value="Japan" @if($property->country == 'Japan') selected @endif>Japan</option>
                                <option value="Jersey" @if($property->country == 'Jersey') selected @endif>Jersey</option>
                                <option value="Jordan" @if($property->country == 'Jordan') selected @endif>Jordan</option>
                                <option value="Kazakhstan" @if($property->country == 'Kazakhstan') selected @endif>Kazakhstan</option>
                                <option value="Kenya" @if($property->country == 'Kenya') selected @endif>Kenya</option>
                                <option value="Kiribati" @if($property->country == 'Kiribati') selected @endif>Kiribati</option>
                                <option value="Korea, Democratic Peoples Republic of" @if($property->country == 'Korea, Democratic Peoples Republic of') selected @endif>Korea, Democratic People's Republic of</option>
                                <option value="Korea, Republic of" @if($property->country == 'Korea, Republic of') selected @endif>Korea, Republic of</option>
                                <option value="Kuwait" @if($property->country == 'Kuwait') selected @endif>Kuwait</option>
                                <option value="Kyrgyzstan" @if($property->country == 'Kyrgyzstan') selected @endif>Kyrgyzstan</option>
                                <option value="Lao Peoples Democratic Republic" @if($property->country == 'Lao Peoples Democratic Republic') selected @endif>Lao Peoples Democratic Republic</option>
                                <option value="Latvia" @if($property->country == 'Latvia') selected @endif>Latvia</option>
                                <option value="Lebanon" @if($property->country == 'Lebanon') selected @endif>Lebanon</option>
                                <option value="Lesotho" @if($property->country == 'Lesotho') selected @endif>Lesotho</option>
                                <option value="Liberia" @if($property->country == 'Liberia') selected @endif>Liberia</option>
                                <option value="Libyan Arab Jamahiriya" @if($property->country == 'Libyan Arab Jamahiriya') selected @endif>Libyan Arab Jamahiriya</option>
                                <option value="Liechtenstein" @if($property->country == 'Liechtenstein') selected @endif>Liechtenstein</option>
                                <option value="Lithuania" @if($property->country == 'Lithuania') selected @endif>Lithuania</option>
                                <option value="Luxembourg" @if($property->country == 'Luxembourg') selected @endif>Luxembourg</option>
                                <option value="Macao" @if($property->country == 'Macao') selected @endif>Macao</option>
                                <option value="Macedonia, The Former Yugoslav Republic of" @if($property->country == 'Macedonia, The Former Yugoslav Republic of') selected @endif>Macedonia, The Former Yugoslav Republic of</option>
                                <option value="Madagascar" @if($property->country == 'Madagascar') selected @endif>Madagascar</option>
                                <option value="Malawi" @if($property->country == 'Malawi') selected @endif>Malawi</option>
                                <option value="Malaysia" @if($property->country == 'Malaysia') selected @endif>Malaysia</option>
                                <option value="Maldives" @if($property->country == 'Maldives') selected @endif>Maldives</option>
                                <option value="Mali" @if($property->country == 'Mali') selected @endif>Mali</option>
                                <option value="Malta" @if($property->country == 'Malta') selected @endif>Malta</option>
                                <option value="Marshall Islands" @if($property->country == 'Marshall Islands') selected @endif>Marshall Islands</option>
                                <option value="Martinique" @if($property->country == 'Martinique') selected @endif>Martinique</option>
                                <option value="Mauritania" @if($property->country == 'Mauritania') selected @endif>Mauritania</option>
                                <option value="Mauritius" @if($property->country == 'Mauritius') selected @endif>Mauritius</option>
                                <option value="Mayotte" @if($property->country == 'Mayotte') selected @endif>Mayotte</option>
                                <option value="Mexico" @if($property->country == 'Mexico') selected @endif>Mexico</option>
                                <option value="Micronesia, Federated States of" @if($property->country == 'Micronesia, Federated States of') selected @endif>Micronesia, Federated States of</option>
                                <option value="Moldova, Republic of" @if($property->country == 'Moldova, Republic of') selected @endif>Moldova, Republic of</option>
                                <option value="Monaco" @if($property->country == 'Monaco') selected @endif>Monaco</option>
                                <option value="Mongolia" @if($property->country == 'Mongolia') selected @endif>Mongolia</option>
                                <option value="Montenegro" @if($property->country == 'Montenegro') selected @endif>Montenegro</option>
                                <option value="Montserrat" @if($property->country == 'Montserrat') selected @endif>Montserrat</option>
                                <option value="Morocco" @if($property->country == 'Morocco') selected @endif>Morocco</option>
                                <option value="Mozambique" @if($property->country == 'Mozambique') selected @endif>Mozambique</option>
                                <option value="Myanmar" @if($property->country == 'Myanmar') selected @endif>Myanmar</option>
                                <option value="Namibia" @if($property->country == 'Namibia') selected @endif>Namibia</option>
                                <option value="Nauru" @if($property->country == 'Nauru') selected @endif>Nauru</option>
                                <option value="Nepal" @if($property->country == 'Nepal') selected @endif>Nepal</option>
                                <option value="Netherlands" @if($property->country == 'Netherlands') selected @endif>Netherlands</option>
                                <option value="Netherlands Antilles" @if($property->country == 'Netherlands Antilles') selected @endif>Netherlands Antilles</option>
                                <option value="New Caledonia" @if($property->country == 'New Caledonia') selected @endif>New Caledonia</option>
                                <option value="New Zealand" @if($property->country == 'New Zealand') selected @endif>New Zealand</option>
                                <option value="Nicaragua" @if($property->country == 'Nicaragua') selected @endif>Nicaragua</option>
                                <option value="Niger" @if($property->country == 'Niger') selected @endif>Niger</option>
                                <option value="Nigeria" @if($property->country == 'Nigeria') selected @endif>Nigeria</option>
                                <option value="Niue" @if($property->country == 'Niue') selected @endif>Niue</option>
                                <option value="Norfolk Island" @if($property->country == 'Norfolk Island') selected @endif>Norfolk Island</option>
                                <option value="Northern Mariana Islands" @if($property->country == 'Northern Mariana Islands') selected @endif>Northern Mariana Islands</option>
                                <option value="Norway" @if($property->country == 'Norway') selected @endif>Norway</option>
                                <option value="Oman" @if($property->country == 'Oman') selected @endif>Oman</option>
                                <option value="Pakistan" @if($property->country == 'Pakistan') selected @endif>Pakistan</option>
                                <option value="Palau" @if($property->country == 'Palau') selected @endif>Palau</option>
                                <option value="Palestinian Territory, Occupied" @if($property->country == 'Palestinian Territory, Occupied') selected @endif>Palestinian Territory, Occupied</option>
                                <option value="Panama" @if($property->country == 'Panama') selected @endif>Panama</option>
                                <option value="Papua New Guinea" @if($property->country == 'Papua New Guinea') selected @endif>Papua New Guinea</option>
                                <option value="Paraguay" @if($property->country == 'Paraguay') selected @endif>Paraguay</option>
                                <option value="Peru" @if($property->country == 'Peru') selected @endif>Peru</option>
                                <option value="Philippines" @if($property->country == 'Philippines') selected @endif>Philippines</option>
                                <option value="Pitcairn" @if($property->country == 'Pitcairn') selected @endif>Pitcairn</option>
                                <option value="Poland" @if($property->country == 'Poland') selected @endif>Poland</option>
                                <option value="Portugal" @if($property->country == 'Portugal') selected @endif>Portugal</option>
                                <option value="Puerto Rico" @if($property->country == 'Puerto Rico') selected @endif>Puerto Rico</option>
                                <option value="Qatar" @if($property->country == 'Qatar') selected @endif>Qatar</option>
                                <option value="Reunion" @if($property->country == 'Reunion') selected @endif>Reunion</option>
                                <option value="Romania" @if($property->country == 'Romania') selected @endif>Romania</option>
                                <option value="Russian Federation" @if($property->country == 'Russian Federation') selected @endif>Russian Federation</option>
                                <option value="Rwanda" @if($property->country == 'Rwanda') selected @endif>Rwanda</option>
                                <option value="Saint Helena" @if($property->country == 'Saint Helena') selected @endif>Saint Helena</option>
                                <option value="Saint Kitts and Nevis" @if($property->country == 'Saint Kitts and Nevis') selected @endif>Saint Kitts and Nevis</option>
                                <option value="Saint Lucia" @if($property->country == 'Saint Lucia') selected @endif>Saint Lucia</option>
                                <option value="Saint Pierre and Miquelon" @if($property->country == 'Saint Pierre and Miquelon') selected @endif>Saint Pierre and Miquelon</option>
                                <option value="Saint Vincent and The Grenadines" @if($property->country == 'Saint Vincent and The Grenadines') selected @endif>Saint Vincent and The Grenadines</option>
                                <option value="Samoa" @if($property->country == 'Samoa') selected @endif>Samoa</option>
                                <option value="San Marino" @if($property->country == 'San Marino') selected @endif>San Marino</option>
                                <option value="Sao Tome and Principe" @if($property->country == 'Sao Tome and Principe') selected @endif>Sao Tome and Principe</option>
                                <option value="Saudi Arabia" @if($property->country == 'Saudi Arabia') selected @endif>Saudi Arabia</option>
                                <option value="Senegal" @if($property->country == 'Senegal') selected @endif>Senegal</option>
                                <option value="Serbia" @if($property->country == 'Serbia') selected @endif>Serbia</option>
                                <option value="Seychelles" @if($property->country == 'Seychelles') selected @endif>Seychelles</option>
                                <option value="Sierra Leone" @if($property->country == 'Sierra Leone') selected @endif>Sierra Leone</option>
                                <option value="Singapore" @if($property->country == 'Singapore') selected @endif>Singapore</option>
                                <option value="Slovakia" @if($property->country == 'Slovakia') selected @endif>Slovakia</option>
                                <option value="Slovenia" @if($property->country == 'Slovenia') selected @endif>Slovenia</option>
                                <option value="Solomon Islands" @if($property->country == 'Solomon Islands') selected @endif>Solomon Islands</option>
                                <option value="Somalia" @if($property->country == 'Somalia') selected @endif>Somalia</option>
                                <option value="South Africa" @if($property->country == 'South Africa') selected @endif>South Africa</option>
                                <option value="South Georgia and The South Sandwich Islands" @if($property->country == 'South Georgia and The South Sandwich Islands') selected @endif>South Georgia and The South Sandwich Islands</option>
                                <option value="Spain" @if($property->country == 'Spain') selected @endif>Spain</option>
                                <option value="Sri Lanka" @if($property->country == 'Sri Lanka') selected @endif>Sri Lanka</option>
                                <option value="Sudan" @if($property->country == 'Sudan') selected @endif>Sudan</option>
                                <option value="Suriname" @if($property->country == 'Suriname') selected @endif>Suriname</option>
                                <option value="Svalbard and Jan Mayen" @if($property->country == 'Svalbard and Jan Mayen') selected @endif>Svalbard and Jan Mayen</option>
                                <option value="Swaziland" @if($property->country == 'Swaziland') selected @endif>Swaziland</option>
                                <option value="Sweden" @if($property->country == 'Sweden') selected @endif>Sweden</option>
                                <option value="Switzerland" @if($property->country == 'Switzerland') selected @endif>Switzerland</option>
                                <option value="Syrian Arab Republic" @if($property->country == 'Syrian Arab Republic') selected @endif>Syrian Arab Republic</option>
                                <option value="Taiwan" @if($property->country == 'Taiwan') selected @endif>Taiwan</option>
                                <option value="Tajikistan" @if($property->country == 'Tajikistan') selected @endif>Tajikistan</option>
                                <option value="Tanzania, United Republic of" @if($property->country == 'Tanzania, United Republic of') selected @endif>Tanzania, United Republic of</option>
                                <option value="Thailand" @if($property->country == 'Thailand') selected @endif>Thailand</option>
                                <option value="Timor-leste" @if($property->country == 'Timor-leste') selected @endif>Timor-leste</option>
                                <option value="Togo" @if($property->country == 'Togo') selected @endif>Togo</option>
                                <option value="Tokelau" @if($property->country == 'Tokelau') selected @endif>Tokelau</option>
                                <option value="Tonga" @if($property->country == 'Tonga') selected @endif>Tonga</option>
                                <option value="Trinidad and Tobago" @if($property->country == 'Trinidad and Tobago') selected @endif>Trinidad and Tobago</option>
                                <option value="Tunisia" @if($property->country == 'Tunisia') selected @endif>Tunisia</option>
                                <option value="Turkey" @if($property->country == 'Turkey') selected @endif>Turkey</option>
                                <option value="Turkmenistan" @if($property->country == 'Turkmenistan') selected @endif>Turkmenistan</option>
                                <option value="Turks and Caicos Islands" @if($property->country == 'Turks and Caicos Islands') selected @endif>Turks and Caicos Islands</option>
                                <option value="Tuvalu" @if($property->country == 'Tuvalu') selected @endif>Tuvalu</option>
                                <option value="Uganda" @if($property->country == 'Uganda') selected @endif>Uganda</option>
                                <option value="Ukraine" @if($property->country == 'Ukraine') selected @endif>Ukraine</option>
                                <option value="United Arab Emirates" @if($property->country == 'United Arab Emirates') selected @endif>United Arab Emirates</option>
                                <option value="United Kingdom" @if($property->country == 'United Kingdom') selected @endif>United Kingdom</option>
                                <option value="United States" @if($property->country == 'United States') selected @endif>United States</option>
                                <option value="United States Minor Outlying Islands" @if($property->country == 'United States Minor Outlying Islands') selected @endif>United States Minor Outlying Islands</option>
                                <option value="Uruguay" @if($property->country == 'Uruguay') selected @endif>Uruguay</option>
                                <option value="Uzbekistan" @if($property->country == 'Uzbekistan') selected @endif>Uzbekistan</option>
                                <option value="Vanuatu" @if($property->country == 'Vanuatu') selected @endif>Vanuatu</option>
                                <option value="Venezuela" @if($property->country == 'Venezuela') selected @endif>Venezuela</option>
                                <option value="Viet Nam" @if($property->country == 'Viet Nam') selected @endif>Viet Nam</option>
                                <option value="Virgin Islands, British" @if($property->country == 'Virgin Islands, British') selected @endif>Virgin Islands, British</option>
                                <option value="Virgin Islands, U.S." @if($property->country == 'Virgin Islands, U.S.') selected @endif>Virgin Islands, U.S.</option>
                                <option value="Wallis and Futuna" @if($property->country == 'Wallis and Futuna') selected @endif>Wallis and Futuna</option>
                                <option value="Western Sahara" @if($property->country == 'Western Sahara') selected @endif>Western Sahara</option>
                                <option value="Yemen" @if($property->country == 'Yemen') selected @endif>Yemen</option>
                                <option value="Zambia" @if($property->country == 'Zambia') selected @endif>Zambia</option>
                                <option value="Zimbabwe" @if($property->country == 'Zimbabwe') selected @endif>Zimbabwe</option>

                            </select>
                            @error('country')<li class="text-danger">{{ $message }}</li>@enderror
                        </div>
                    </div>

                    <div class="row mt-4">

                        <div class="col-md-4">
                            <label>City</label>
                                <input class="form-control" type="text" name="city" value="{{ old('city' , $property->city ) }}" placeholder="Enter city">
                                @error('city')<li class="text-danger">{{ $message }}</li>@enderror
                        </div>

                        <div class="col-md-4">
                            <label>Contact Number 1</label>
                            <input class="form-control" type="number" name="contact1" value="{{ old('contact1',$property->contact1) }}" placeholder="Enter contact number 1">
                            @error('contact1')<li class="text-danger">{{ $message }}</li>@enderror
                        </div>   

                        <div class="col-md-4">
                          <label>Contact Number 2</label>
                            <input class="form-control" type="number" name="contact2" value="{{ old('contact2',$property->contact2) }}" placeholder="Enter contact number 2">
                            @error('contact2')<li class="text-danger">{{ $message }}</li>@enderror
                        </div>

                    </div>

                    <div class="row mt-4">

                        <div class="col-md-4">
                            <label>Contact Number 3</label>
                            <input class="form-control" type="number" name="contact3" value="{{ old('contact3',$property->contact3) }}" placeholder="Enter contact number 3">
                            @error('contact3')<li class="text-danger">{{ $message }}</li>@enderror
                        </div>

                        <div class="col-md-4">
                            <label>Image</label>
                            <input class="form-control" type="file" id="profile" name="image">
                            @error('image')<li class="text-danger">{{ $message }}</li>@enderror
                        </div>

                        <div class="col-md-4">

                           <label>Address</label>
                            <input class="form-control" type="text" name="address" value="{{ old('address',$property->address) }}" placeholder="Enter address">
                            @error('address')<li class="text-danger">{{ $message }}</li>@enderror
                        </div>

                    </div><hr>

                    <div class="row mt-4">
                        <div class="col-md-4">
                            <label>Gaurantor 1</label>
                            <select class="form-control" id="g1-select" name="guarantor1">
                                <option value="">select gaurantor</option>
                                @foreach($gaurantor as $row)
                                    <option value="{{ $row->id }}" @if($property->guarantor1 == $row->id) selected @endif>{{ $row->f_name }} {{ $row->l_name }}</option>
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
                                    <option value="{{ $row->id }}" @if($property->guarantor2 == $row->id) selected @endif>{{ $row->f_name }} {{ $row->l_name }}</option>
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
                                    <option value="{{ $row->id }}" @if($property->guarantor3 == $row->id) selected @endif>{{ $row->f_name }} {{ $row->l_name }}</option>
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
                  <button class="btn-outline btn btn-primary" type="submit">Update Tenant</button>&nbsp;&nbsp;<a class="btn-outline btn btn-dark" href="{{ route('tenant') }}">Back</a>
                </div>
             </form>
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

    // this is for slected gaurantor section for update case
    $(document).ready(function() {
        // Get the selected value of the select input
        var selectedValue1 = $("#g1-select").val();
        var selectedValue2 = $("#g2-select").val();
        var selectedValue3 = $("#g3-select").val();
    
       // Check if a value is selected
        if (selectedValue1 !== null) {
            g1Details(selectedValue1);
        }
        if (selectedValue2 !== null) {
            g2Details(selectedValue2);
        }
        if (selectedValue3 !== null) {
            g3Details(selectedValue3);
        }

    });





</script>

@endsection