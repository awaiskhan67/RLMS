@extends('layouts.base')
@section('content')

       <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Payments</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Utility</a></li>
                            <li class="breadcrumb-item active">Property payments</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->
        <form method="post" action="{{ route('rentPay.add') }}" class="mt-6 space-y-6"  enctype="multipart/form-data">
        @csrf
            <div class="card"> 
                <div class="card-body"> 
                <select class="form-control" name="agreement_id" required id="agreement">
                        <option value="">Select Agreement</option>
                        @foreach($agreement as $row)
                        <option value="{{ $row->id }}">{{$row->agreement_no}} ({{$row->agreement_name}})</option>
                        @endforeach
                    </select>

                </div>
            </div>

            <div class="row">
                <!-----  --->
                <div class="col-md-6 col-xl-6">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="d-md-flex align-items-center">
                                <!-- Image Section -->
                                <div class="col-md-6">
                                    <a href=""><img  id="propertyImage" src="{{ asset('assets/images/small/property.png') }}" alt="" class="img-fluid w-100 img-with-border"></a>
                                </div>
                                <!-- Information Section -->
                                <div class="col-md-6" style="padding:20px;">
                                    <h5 class="mb-2"> Property : <span id="p_name">.......</span></h5>
                                    <p class="m-0">Type : <span id="p_type">.......</span> </p>
                                    <p class="m-0">Country : <span id="p_country">.......</span> </p>
                                    <p class="m-0">City : <span id="p_city">.......</span> </p>
                                    <p class="m-0">Location : <span id="p_street">.......</span> </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!------ ---->

                <!-----  --->
                <div class="col-md-6 col-xl-6">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="d-md-flex align-items-center">
                                <!-- Image Section -->
                                <div class="col-md-6">
                                    <a href=""><img  id="tenantImage" src="{{  asset('assets/images/small/profile.png') }}" alt="" class="img-fluid w-100 img-with-border"></a>
                                </div>
                                <!-- Information Section -->
                                <div class="col-md-6" style="padding:20px;">
                                    <h5 class=""> <span id="t_fname">.........</span> <span id="t_lname">.........</span></h5>
                                    <p class="m-0">CNIC : <span id="t_cnic">.........</span></p>
                                    <p class="m-0">Email : <span id="t_email">.........</span></p>
                                    <p class="m-0">Contact : <span id="t_phone">.........</span></p>
                                    <p class="m-0">Country : <span id="t_country">.........</span></p>
                                    <p class="m-0">City : <span id="t_city">.........</span></p>
                                    <p class="m-0">Address : <span id="t_address">.........</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!------ ---->
            </div>

            <div class="card"> 
                <div class="card-body"> 
                    <div class="card-title" style="font-size:20px;">Due Invoices</div><hr>
                        <div class="row" id="invoiceTableBody">
                        </div>
                </div>
            </div>


            <!-------  -- ------>
            <div class="row">
                <div class="col-md-4">
                    <div class="card border-primary">
                        <div class="card-header bg-primary text-white">
                            <h5 class="card-title mb-0 text-white" >Payment Summary</h5>
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item border-0">
                                    <strong>Total Due Rent Amount : </strong>
                                    <span id="due_amount" class="float-right">......</span>
                                </li>
                                <li class="list-group-item border-0">
                                    <strong>Total Due Late Fee Amount : </strong>
                                    <span id="late_amount" class="float-right">......</span>
                                </li>
                                <li class="list-group-item border-0">
                                    <strong>Total Partial Paid Amount : </strong>
                                    <span id="paid_amount" class="float-right">......</span>
                                </li>
                                <li class="list-group-item border-0">
                                    <mark><strong>Total Payable : </strong>
                                    <span id="total_due" class="float-right">......</span><mark>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!--this is the payment card---->
                <div class="col-md-8">
                    <div class="card border-success">
                        <div class="card-header bg-success text-white">
                            <h5 class="card-title mb-0 text-white" >Make payment</h5>
                        </div>
                        <div class="card-body">
                            <ul class="nav nav-pills nav-justified" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link @if(!$errors->any()) active @endif" data-bs-toggle="tab" href="#profile1" role="tab">
                                        <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                        <span class="d-none d-sm-block">Direct Payment</span> 
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link @if($errors->any()) active @endif" data-bs-toggle="tab" href="#messages1" role="tab">
                                        <span class="d-block d-sm-none"><i class="fas fa-lock"></i></span>
                                        <span class="d-none d-sm-block">Other Payment option</span>   
                                    </a>
                                </li>
                            </ul>

                                <!-- Tab panes -->
                            <div class="tab-content p-3 text-muted">
                
                            <div class="tab-pane @if(!$errors->any()) active @endif" id="profile1" role="tabpanel">

                               <hr>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <select class="form-control" id="paymentType" name="pay_type" required>
                                                <option value="">Select Payment type</option>
                                                <option value="CASH">By Cash</option>
                                                <option value="BANK">By Bank</option>
                                                <option value="CHECK">By Check</option>
                                            </select>
                                        </div>

                                        <div class="col-md-6">
                                            <input type="date" name="pay_date" class="form-control" placeholder="Please enter payment date" required>
                                        </div>
                                    </div><br>

                                <!-- this section is for by bank part ---->
                                    <div id="bankDetails" style="display: none;"> 
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input type="text" id="bank_name" name="bank_name" class="form-control" placeholder="Enter bank name">
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" id="bank_branch" name="branch_name" class="form-control" placeholder="Enter bank branch name">
                                            </div>
                                        </div><br>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <input type="number" id="account_number" name="account_number" class="form-control" placeholder="Enter bank account Number">
                                            </div>
                                            <div class="col-md-6">
                                                <input type="number" class="form-control" name="bank_number" placeholder="Enter bank code (optional)">
                                            </div>
                                        </div>
                                    </div>
                                <!---end of the section------>

                                <!-- this section is for by bank part ---->
                                    <div id="checkDetails" style="display: none;"> 
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input type="number" id="check_number" name="check_number" class="form-control" placeholder="Enter check number">
                                            </div>
                                            <div class="col-md-6">
                                                <input type="file" id="check" name="check" class="form-control" >
                                            </div>
                                        </div>
                                    </div>
                                <!---end of the section------>

                                <!--- this is the main amount section --><hr>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="number" class="form-control" name="paid_amount" placeholder="Enter paid amount" id="paidAmount">
                                            <div id="output" style="background-color: #f0f0f0;padding: 1px;border-radius: 1px;margin-top: 1px;">
                                               <p id="textOutput1" style="color:green;"></p>
                                            </div>
                                            <p id="errorText" style="color: red; display: none;">Paid amount is less than the total amount!</p>
                                           
                                            <mark><p id="remainingBalance" style="font-size:15px;"></p></mark>
                                        </div>
                                    </div><br>


                                <!---- end of the section ---->

                                    <br><button type="submit" id="submitButton" class="btn btn-danger">Seriously pay now</button>
                            

                            </div>

                            <div class="tab-pane @if($errors->any()) active @endif" id="messages1" role="tabpanel">
                            
                            </div>
            
                        </div>
                    <!----  -----  - --->

                        </div>
                    </div>
                </div>
            </div>
            <!------ ---------->
        </form>


            
@endsection


@section('script')

<script>

// data fetching section from the tables 

$('#agreement').on('change', function () {
        var agreementId = $(this).val()
        // Make an AJAX request to fetch agreement details
        $.ajax({
            type: "GET",
            url: "{{ route('agreement_details', ['id' => ':id']) }}".replace(':id', agreementId),
            success: function (response) {
                console.log(response); 
                var agreement = response.agreement;
                var property = response.agreement.property;
                var tenant = response.agreement.tenant;
                var category = response.agreement.property.pcategory; // Access the category data
    
                $("#propertyImage").attr("src", (property.image !== null) ? "{{ asset('uploads/') }}/" + property.image : "{{ asset('assets/images/small/profile.png') }}");  
                $("#p_name").text(property.name);
                $("#p_type").text(category.name);
                $("#p_street").text(property.street);
                $("#p_city").text(property.city);
                $("#p_country").text(property.country);


                $("#tenantImage").attr("src", (tenant.image !== null) ? "{{ asset('uploads/') }}/" + tenant.image : "{{ asset('assets/images/small/profile.png') }}"); 
                $("#t_fname").text(tenant.f_name);
                $("#t_lname").text(tenant.l_name);
                $("#t_email").text(tenant.email);
                $("#t_phone").text(tenant.contact1);
                $("#t_cnic").text(tenant.cnic);
                $("#t_city").text(tenant.city);
                $("#t_country").text(tenant.country);
                $("#t_address").text(tenant.address);

            },
            
        });
});

//this is data for getting the invoices amount 

$('#agreement').on('change', function () {
    var agreementId = $(this).val();
    
    // Make an AJAX request to fetch invoices for the selected agreement
    $.ajax({
        type: "GET",
        url: "{{ route('fetch_invoices', ['id' => ':id']) }}".replace(':id', agreementId),
        success: function (response) {
            // Clear the existing table rows
            $('#invoiceTableBody').empty();

            // Loop through the retrieved invoices and populate the table
            $.each(response.invoices, function (index, invoice) {
                var dueDate = new Date(invoice.due_date);
                var formattedDueDate = dueDate.toLocaleDateString('en-US', {
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric'
                });

                var row ='<div class="card col-md-4" style="background: linear-gradient(to bottom, #ff6b6b, #ffafbd); border: none; border-radius: 10px;"' +
                            ' data-amount="' + invoice.total_amount + ' ' +' data-rent="' + invoice.total_amount + ' ' +' data-latefee="' + invoice.total_amount + ' ' +' data-paid="' + invoice.total_amount + '">' + 
                            '<div class="card-body">' +
                                '<div class="form-check form-switch mb-3">' +
                                    '<input class="form-check-input" type="checkbox" name="selected_invoices[]" value="'+ invoice.id +'" id="invoiceCheckbox" style="transform: scale(1.5); margin-right: 10px;">' +
                                    '<label class="form-check-label" for="invoiceCheckbox" style="color: white;">Paid Invoice</label>' +
                                '</div>' +
                                '<ul class="list-group list-group-flush">' +
                                    '<li class="list-group-item list-group-item-danger">Status : ' + invoice.status + '</li>' +
                                    '<li class="list-group-item list-group-item-warning">Due Date : ' + formattedDueDate + '</li>' +
                                    '<li class="list-group-item list-group-item-success">Total Amount : ' + invoice.total_amount + ' Rs</li>' +
                                '</ul>' +
                            '</div>' +
                        '</div>';


                 

                $('#invoiceTableBody').append(row);
            });

            // $("#due_amount").text(response.totalDueAmount);
            // $("#late_amount").text(response.totalLateFeeAmount);
            // $("#paid_amount").text(response.totalPartiallyPaidAmount);
            // $("#total_due").text(response.remainingAmount);

        },
        error: function (error) {
            console.error("Error fetching invoices:", error);
        }
    });
});

//end of the section

// Add an event listener for invoice checkboxes
// Listen for checkbox changes within the invoice table
// Listen for checkbox changes within the invoice table
// Listen for checkbox changes within the invoice table
function calculateTotalPayable() {
    var totalPayable = 0;
    var totalrent = 0;
    var totalfee = 0;
    var totalPaid = 0;
    // Iterate through checked checkboxes
    $('#invoiceTableBody input[type="checkbox"]:checked').each(function () {
        var amount = parseFloat($(this).closest('.card').data('amount'));
        var rent = parseFloat($(this).closest('.card').data('rent'));
        var latefee = parseFloat($(this).closest('.card').data('latefee'));
        var paid = parseFloat($(this).closest('.card').data('paid'));

        var isChecked = $(this).prop('checked');
        if (isChecked) {
            // Check for NaN values and handle them
            if (!isNaN(amount)) {
                totalPayable += amount;
            }

            if (!isNaN(rent)) {
                totalrent += rent;
            }

            if (!isNaN(latefee)) {
                totalfee += latefee;
            }

            if (!isNaN(paid)) {
                totalPaid += paid;
            }

        }else{
            if (!isNaN(amount)) {
                totalPayable -= amount;
            }

            if (!isNaN(rent)) {
                totalrent -= rent;
            }

            if (!isNaN(latefee)) {
                totalfee -= latefee;
            }

            if (!isNaN(paid)) {
                totalPaid -= paid;
            }

        }

    });

    // Update the total payable amount
    $('#total_due').text(totalPayable.toFixed(2) );
    $('#late_amount').text(totalfee.toFixed(2) );
    $('#paid_amount').text(totalPaid.toFixed(2) );
    $('#due_amount').text(totalrent.toFixed(2) );
}

$(document).on('change', '#invoiceTableBody input[type="checkbox"]', function () {
    calculateTotalPayable();
});


// this is the input forms section 
    // Add an event listener to the paymentType select element using jQuery
    $(document).ready(function() {
        //this is for bank
        $('#paymentType').change(function() {
            var selectedOption = $(this).val();

            // Check if the selected option is "By Bank"
            if (selectedOption === 'BANK') {
                // If "By Bank" is selected, show the bankDetails div and add the required attribute to the input field
                $('#bankDetails').show();

                $('#bank_name').prop('required', true);
                $('#bank_branch').prop('required', true);
                $('#account_number').prop('required', true);
            } else {
                // If any other option is selected, hide the bankDetails div and remove the required attribute
                $('#bankDetails').hide();

                $('#bank_name').prop('required', false);
                $('#bank_branch').prop('required', false);
                $('#account_number').prop('required', false);
            }
        });
        // this is for by checks
        $('#paymentType').change(function() {
            var selectedOption = $(this).val();

            // Check if the selected option is "By Bank"
            if (selectedOption === 'CHECK') {
                // If "By Bank" is selected, show the bankDetails div and add the required attribute to the input field
                $('#checkDetails').show();

                $('#check_number').prop('required', true);
                $('#check').prop('required', true);
            } else {
                // If any other option is selected, hide the bankDetails div and remove the required attribute
                $('#checkDetails').hide();

                $('#check_number').prop('required', false);
                $('#check').prop('required', false);
            }
        });


    });
///end of the section 

// this is for the input pament part
$(document).ready(function() {
        // Event listener for the paid amount input
        $('#paidAmount').on('input', function() {
            // Get the selected invoices' total amount from your section called total_amount
            var totalAmount = parseFloat($('#total_due').text());
            
             // Get the paid amount entered by the user
             var paidAmount = parseFloat($(this).val());

            // Calculate the remaining balance or extra amount
            var balance = totalAmount - paidAmount;

           // Display the remaining balance or extra amount
            var message = (balance >= 0) ? 'Remaining Balance: ' + balance.toFixed(2) : 'Extra Amount Paid: ' + Math.abs(balance).toFixed(2);
            $('#remainingBalance').text(message);
            
            // Show or hide the error message and submit button based on the paid amount
            if (paidAmount < totalAmount) {
                $('#errorText').show();
                $('#submitButton').hide();
            } else {
                $('#errorText').hide();
                $('#submitButton').show();
            }


        });
    });
//end of the section
$(document).ready(function() {
            $('#paidAmount').on('input', function() {
                const inputValue = $(this).val();
                const textOutput = convertAmountToText(inputValue);
                $('#textOutput1').text(textOutput);
            });
});





</script>

@endsection