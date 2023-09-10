@extends('layouts.base')
@section('content')

       <!-- start page title -->
       <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Agreement Edite</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Utility</a></li>
                            <li class="breadcrumb-item active">Update Agreement</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="card"> 
           <div class="card-body"> 
             <form method="post" action="{{ route('agreement.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $agreement->id }}">  
                
                <div class="row mt-4">
                    <div class="col-md-4">
                        <label>Serial No</label>
                        <input class="form-control" type="number" name="serial" value="{{ $agreement->serial_no }}" placeholder="00001"  readonly>
                        @error('serial')<li class="text-danger">{{ $message }}</li>@enderror
                    </div>
                    <div class="col-md-4">
                        <label>Agreement No</label>
                        <input class="form-control" type="number" name="agreement_no" value="{{ old('agreement_no',$agreement->agreement_no) }}" placeholder="Enter agreement number">
                        @error('agreement_no')<li class="text-danger">{{ $message }}</li>@enderror
                    </div>
                    <div class="col-md-4">
                        <label>Agreement Name</label>
                        <input class="form-control" type="text" name="agreement_name" value="{{ old('agreement_name',$agreement->agreement_name) }}" placeholder="Enter agreement name">
                        @error('agreement_name')<li class="text-danger">{{ $message }}</li>@enderror
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-6">
                        <label>Property</label>
                        <select class="form-control" name="property_id" id="property-select">
                            <!-- Populate property options dynamically here -->
                            <option value="">select property</option>
                            @foreach($property as $row)
                            <option value="{{ $row->id }}" @if( $row->id == $agreement->property_id) selected @endif>{{ $row->name }}</option>
                            @endforeach
                        </select>
                        @error('property_id')<li class="text-danger">{{ $message }}</li>@enderror
                        <div class="card">
                            <img class="card-img-top img-fluid" id="profileimg1" src="{{ (!empty($user->image)) ? asset('uploads/'.$user->image):asset('assets/images/small/property.png')  }}" alt="Card image cap">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><span id="p_name">....</span> , Address: -  <span id="p_city">....</span> , <span id="p_district">....</span> , <span id="p_country">....</span> .</li>
                                
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label>Tenant</label>
                        <select class="form-control" name="tenant_id" id="tenant-select">
                            <!-- Populate tenant options dynamically here -->
                            <option value="">select tenant</option>
                            @foreach($tenant as $row)
                            <option value="{{ $row->id }}" @if( $row->id == $agreement->tenant_id) selected @endif>{{ $row->f_name }} {{ $row->l_name }}</option>
                            @endforeach
                        </select>
                        @error('tenant_id')<li class="text-danger">{{ $message }}</li>@enderror
                        <div class="card">
                            <img class="card-img-top img-fluid" id="profileimg2" src="{{ (!empty($user->image)) ? asset('uploads/'.$user->image):asset('assets/images/small/profile.png')  }}" alt="Card image cap">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><span id="tf_name">....</span> <span id="tl_name">....</span> / CNIC: - <span id="cnic">....</span> , <span id="t_contact1">....</span> .</li>
                                
                            </ul>
                        </div>
                    </div>
                </div><hr>

                <div class="row mt-4">
                    <div class="col-md-6">
                        <label>Property Rent</label>
                        <input class="form-control" type="number" name="property_rent" id="amount1" value="{{ old('property_rent',$agreement->rent) }}" placeholder="Enter property rent">
                        @error('property_rent')<li class="text-danger">{{ $message }}</li>@enderror
                        <div id="output" style="background-color: #f0f0f0;padding: 3px;border-radius: 3px;margin-top: 2px;">
                            <p id="textOutput1" style="color:#008500;"></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label>Security Deposit</label>
                        <input class="form-control" type="number" name="security_deposit" id="amount2" value="{{ old('security_deposit',$agreement->security_money) }}" placeholder="Enter security deposit">
                        @error('security_deposit')<li class="text-danger">{{ $message }}</li>@enderror
                        <div id="output" style="background-color: #f0f0f0;padding: 3px;border-radius: 3px;margin-top: 2px;">
                            <p id="textOutput2" style="color:#008500;"></p>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-4">
                        <label>Late fee</label>
                        <select class="form-control" name="late_fee_active" id="late_fee_active">
                            <!-- Populate payment frequency options dynamically here -->
                            <option value="">Select let fee status</opton>
                            <option value="1" @if($agreement->late_fee_active === 1 ) selected @endif>Active</option>
                            <option value="0" @if($agreement->late_fee_active === 0 ) selected @endif>Disabled</option>
                        </select>
                        @error('late_fee_active')<li class="text-danger">{{ $message }}</li>@enderror
                    </div>
                    <div class="col-md-4">
                        <label>Late free day limit</label>
                        <input class="form-control" type="number" id="late_fee_days" name="late_fee_days" value="{{ old('late_fee_days',$agreement->late_fee_days) }}" placeholder="Enter late days" >
                        @error('late_fee_days')<li class="text-danger">{{ $message }}</li>@enderror
                    </div>
                    <div class="col-md-4">
                        <label>Late fee amount</label>
                        <input class="form-control" type="number" name="late_fee_amount" id="late_fee_amount" value="{{ old('late_fee_amount',$agreement->late_fee_amount) }}" placeholder="Enter security deposit">
                        @error('late_fee_amount')<li class="text-danger">{{ $message }}</li>@enderror
                        <div id="output" style="background-color: #f0f0f0;padding: 3px;border-radius: 3px;margin-top: 2px;">
                            <p id="textOutput3" style="color:#008500;"></p>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-4">
                        <label>Start Date</label>
                        <input class="form-control" type="date" name="start_date" value="{{ old('start_date',$agreement->start_date) }}">
                        @error('start_date')<li class="text-danger">{{ $message }}</li>@enderror
                    </div>
                    <div class="col-md-4">
                        <label>Period (in years)</label>
                        <input class="form-control" type="number" name="period" value="{{ old('period',$agreement->period) }}" placeholder="Enter period">
                        @error('period')<li class="text-danger">{{ $message }}</li>@enderror
                    </div>
                    <div class="col-md-4">
                        <label>Increment Rate (%)</label>
                        <input class="form-control" type="number" name="increment_rate" value="{{ old('increment_rate',$agreement->increment) }}" placeholder="Enter increment rate">
                        @error('increment_rate')<li class="text-danger">{{ $message }}</li>@enderror
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-4">
                        <label>Description</label>
                        <textarea class="form-control" name="description" rows="4" placeholder="Enter description">{{ old('description',$agreement->description) }}</textarea>
                        @error('description')<li class="text-danger">{{ $message }}</li>@enderror
                    </div>


                    <div class="col-md-4">
                        <label>Payment Frequency</label>
                        <select class="form-control" name="payment_frequency">
                            <!-- Populate payment frequency options dynamically here -->
                            <option value="">select payment frequency</opton>
                            <option value="monthly" @if($agreement->payment_frequency === 'monthly') selected @endif>Monthly</option>
                            <option value="quarterly" @if($agreement->payment_frequency === 'quarterly') selected @endif>Quarterly (Three monthly)</option>
                            <option value="half_yearly" @if($agreement->payment_frequency === 'half_yearly') selected @endif>Half Yearly</option>
                            <option value="yearly" @if($agreement->payment_frequency === 'yearly') selected @endif>Yearly</option>
                        </select>
                        @error('payment_frequency')<li class="text-danger">{{ $message }}</li>@enderror
                    </div>
                    <div class="col-md-4">
                        <label>Attachment (Allowed:- PDF , DOC , DOCX )</label>
                        <input class="form-control" type="file" name="attachment">
                        @error('attachment')<li class="text-danger">{{ $message }}</li>@enderror
                    </div>
                
                </div><hr>
                <h5>Conditions</h5><br>

                <div class="row">
                    @foreach($condition as $row)
                    <div class="col-md-6 mt-3">
                        <input type="checkbox" name="conditions[]" value="{{ $row->id }}"
                            @if(in_array($row->id, old('conditions', $agreement->conditions->pluck('id')->toArray()))) checked @endif>
                        {{ $row->condition }}
                    </div>
                    @endforeach
                </div><hr>
                                        
                <div class="mt-3 d-flex justify-content-end">
                   <button class="btn-outline btn btn-primary" type="submit">Update agreement</button>&nbsp;&nbsp;<a class="btn-outline btn btn-dark" href="{{ route('agreement') }}">Back</a>
                </div>
             </form>
           </div>
        </div>
            
@endsection


@section('script')

<script>


       //this is the amount into word

       $(document).ready(function() {
            // Function to update text output
            function updateTextOutput(inputId, outputId) {
                const inputValue = $(inputId).val();
                const textOutput = convertAmountToText(inputValue);
                $(outputId).text(textOutput);
            }

            $('#amount1').on('input', function() {
                const inputValue = $(this).val();
                const textOutput = convertAmountToText(inputValue);
                $('#textOutput1').text(textOutput);
            });

            $('#amount2').on('input', function() {
                const inputValue = $(this).val();
                const textOutput = convertAmountToText(inputValue);
                $('#textOutput2').text(textOutput);
            });

            $('#late_fee_amount').on('input', function() {
                const inputValue = $(this).val();
                const textOutput = convertAmountToText(inputValue);
                $('#textOutput3').text(textOutput);
            });

            // Call the function on document ready
            updateTextOutput('#amount1', '#textOutput1');
            updateTextOutput('#amount2', '#textOutput2');
            updateTextOutput('#late_fee_amount', '#textOutput3');
        });


        
                
        $(document).ready(function(){      
          //this is the section of the property and tenant select part   
            const selectedPropertyId = $("#property-select").val();
            const selectedTenantId = $("#tenant-select").val();
            pDetails(selectedPropertyId);
            tDetails(selectedTenantId);            
          // Add a change event to the select element to trigger the function
            $("#property-select").on("change", function () {
                var userId = $(this).val(); // Get the selected user ID from the selected option's value
                pDetails(userId);
            });

            $("#tenant-select").on("change", function () {
                var userId = $(this).val(); // Get the selected user ID from the selected option's value
                tDetails(userId);
            });
          //end of the section 
        });

        function pDetails(userId) {
            $.ajax({
                type: "GET",
                url: "{{ route('pShow', ['id' => ':id']) }}".replace(':id', userId),
                success: function (response) {

                    $("#profileimg1").attr("src", (response.image !== null) ? "{{ asset('uploads/') }}/" + response.image : "{{ asset('assets/images/small/property.png') }}");  
                    $("#p_name").text(response.name);
                    $("#p_city").text(response.city);
                    $("#p_district").text(response.district);
                    $("#p_country").text(response.country);
                },
                error: function (error) {
                    console.error("Error fetching user details:", error);
                }
            });
        }

        function tDetails(userId) {
            $.ajax({
                type: "GET",
                url: "{{ route('tShow', ['id' => ':id']) }}".replace(':id', userId),
                success: function (response) {
                    $("#profileimg2").attr("src", (response.image !== null) ? "{{ asset('uploads/') }}/" + response.image : "{{ asset('assets/images/small/profile.png') }}");  
                    $("#tf_name").text(response.f_name);
                    $("#tl_name").text(response.l_name);
                    $("#cnic").text(response.cnic);
                    $("#t_contact1").text(response.contact1);
                },
                error: function (error) {
                    console.error("Error fetching user details:", error);
                }
            });
        } 


        $(document).ready(function () {
            // Assuming input IDs are "input1" and "input2"
            var input1 = $("#late_fee_days");
            var input2 = $("#late_fee_amount");

            var lateFeeActiveValue = $("#late_fee_active").val();

            if (lateFeeActiveValue == 0) {
                // If value is 0, make inputs readonly
                input1.prop("readonly", true);
                input2.prop("readonly", true);
            } else {
                // If value is not 0, make inputs editable
                input1.prop("readonly", false);
                input2.prop("readonly", false);
            }

            $("#late_fee_active").on("change", function () {

                var userId = $(this).val();
                if (userId == 0) {
                    // If value is 0, make inputs readonly
                    input1.prop("readonly", true);
                    input2.prop("readonly", true);
                } else {
                    // If value is not 0, make inputs editable
                    input1.prop("readonly", false);
                    input2.prop("readonly", false);
                }

            });

            // Trigger initial change event to apply the readonly status on page load
            $("#late_fee_active").trigger("change");
        });





</script>

@endsection