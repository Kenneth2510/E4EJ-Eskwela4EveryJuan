@extends('layouts.admin_layout')

@section('content')
<section class="w-full h-screen md:w-3/4 lg:w-10/12">
    <div class="h-full px-2 py-4 pt-24 rounded-lg shadow-lg md:overflow-hidden md:overflow-y-scroll md:pt-6">
        <div class="flex justify-between px-10">
            <h1 class="text-4xl font-bold text-darthmouthgreen">Learner Management</h1>
            <div class="">
                <p class="text-xl font-semibold text-darthmouthgreen">{{$admin->admin_codename}}</p>
            </div>
        </div>
        <div class="mb-5">
            <a href="/admin/learners" class="">
                <i class="text-2xl md:text-3xl fa-solid fa-arrow-left" style="color: #000000;"></i>
            </a>
        </div>
        <div class="py-4 space-y-2 lg:flex lg:space-y-0 lg:space-x-2">
            <div class="flex flex-col items-center justify-start h-full p-3 bg-white rounded-lg shadow-lg lg:w-3/12"
                id="upper_left_container">
                <div class="relative flex flex-col items-center justify-start" style="margin:0 auto; padding: auto;">
                    <img class="z-0 object-contain w-40 h-40 rounded-full"
                        src="{{ asset('storage/'. $learner->profile_picture)}}" alt="Profile Picture">
                </div>

                <div class="mt-10" id="name_area">
                    <h1 class="text-2xl font-semibold text-center" id="nameDisp">{{$learner->learner_fname}}
                        {{$learner->learner_lname}}</h1>
                </div>

                <div class="mt-5 text-center" id="status_area">
                    <h1 class="text-xl" id="roleDisp">LEARNER</h1>
                </div>

                <div class="mt-5 space-y-3 text-center" id="account_status_area">
                    <h1 class="text-xl" id="statusDisp">Status</h1>

                    @if($admin->role === 'IT_DEPT' || $admin->role === 'SUPER_ADMIN' || $admin->role ===
                    'USER_MANAGER')
                    @if ($learner->status == 'Approved')
                    <div id="status" class="btn btn-primary">
                        Approved</div>
                    <div id="button" class="flex flex-col hidden space-y-2">
                        <form action="/admin/pending_learner/{{$learner->learner_id}}" method="POST">
                            @method('put')
                            @csrf
                            <button class="btn btn-warning">Change to pending</button>
                        </form>
                        <form action="/admin/block_learner/{{$learner->learner_id}}" method="POST">
                            @method('PUT')
                            @csrf
                            <button class="btn btn-error">Block Learner</button>
                        </form>
                    </div>
                    @elseif ($learner->status == 'Blocked')
                    <div id="status" class="btn btn-error">Blocked
                    </div>
                    <div id="button" class="flex flex-col hidden space-y-2">
                        <form action="/admin/pending_learner/{{$learner->learner_id}}" method="POST">
                            @method('put')
                            @csrf
                            <button class="btn btn-warning">change
                                to pending</button>
                        </form>
                        <form action="/admin/approve_learner/{{$learner->learner_id}}" method="POST">
                            @method('put')
                            @csrf
                            <button type="submit" class="btn btn-primary">approve
                                now</button>
                        </form>
                    </div>
                    @elseif ($learner->status == 'Expired')
                    <div id="status" class="text-white bg-gray-500 btn btn-error">Expired
                    </div>
                    <div id="button" class="flex flex-col hidden space-y-2">
                        <form action="/admin/pending_learner/{{$learner->learner_id}}" method="POST">
                            @method('put')
                            @csrf
                            <button class="btn btn-warning">change
                                to pending</button>
                        </form>
                        <form action="/admin/approve_learner/{{$learner->learner_id}}" method="POST">
                            @method('put')
                            @csrf
                            <button type="submit" class="btn btn-primary">approve
                                now</button>
                        </form>
                        <form action="/admin/block_learner/{{$learner->learner_id}}" method="POST">
                            @method('PUT')
                            @csrf
                            <button class="btn btn-error">Block Learner</button>
                        </form>
                    </div>
                    @else
                    <div id="status" class="btn btn-warning">pending
                    </div>
                    <div id="button" class="flex flex-col hidden space-y-2">
                        <form action="/admin/approve_learner/{{$learner->learner_id}}" method="POST">
                            @method('put')
                            @csrf
                            <button type="submit" class="btn btn-primary">approve
                                now</button>
                        </form>

                        <form action="/admin/block_learner/{{$learner->learner_id}}" method="POST">
                            @method('PUT')
                            @csrf
                            <button class="btn btn-error">Block Learner</button>
                        </form>
                    </div>
                    @endif
                    @endif
                </div>


                <div class="flex justify-center w-full px-5 mt-5">
                    @if($admin->role === 'IT_DEPT' || $admin->role === 'SUPER_ADMIN' || $admin->role ===
                    'USER_MANAGER')
                    <div class="flex flex-col items-center justify-center w-full mt-5 space-y-2">
                        <button type="button" class="btn btn-primary" id="edit_info_btn">Edit Info</button>

                        <button type="button" class="hidden btn btn-primary" id="apply_change_btn">Apply
                            Changes</button>


                        {{-- <button type="button" class="hidden btn btn-error" id="delete_btn">Delete</button> --}}

                        <button type="button" class="hidden btn" id="cancel_btn">cancel</button>

                    </div>
                    @endif
                </div>

            </div>
            <div class="h-full lg:w-9/12" id="upper_right_container">
                <div class="w-full px-5 py-10 bg-white shadow-lg rounded-xl" id="upper_right_1">
                    <h1 class="text-4xl font-semibold text-darthmouthgreen">User Details</h1>

                    <hr class="my-6 border-t-2 border-gray-300">

                    <div class="flex w-full mt-5" id="userInfo">
                        <div class="w-1/2 mx-2" id="userInfo_left">
                            <div class="mt-3" id="firstNameArea">
                                <label for="learner_fname">First Name</label><br>
                                <input class="w-full input input-bordered focus:input-primary"
                                    type="text" name="learner_fname" id="learner_fname"
                                    value="{{$learner->learner_fname}}" disabled>
                                <span id="firstNameError" class="text-red-500"></span>
                            </div>
                            <div class="mt-3" id="bdayArea">
                                <label for="learner_bday ">Birthday</label><br>
                                <input class="w-full input input-bordered focus:input-primary"
                                    type="date" name="learner_bday" id="learner_bday" value="{{$learner->learner_bday}}"
                                    disabled>
                                <span id="bdayError" class="text-red-500"></span>
                            </div>
                            <div class="mt-3" id="contactArea">
                                <label for="learner_contactno">Contact Number</label><br>
                                <input class="w-full input input-bordered focus:input-primary"
                                    type="text" maxlength="11" name="learner_contactno" id="learner_contactno"
                                    value="{{$learner->learner_contactno}}" disabled placeholder="09">
                                <span id="contactError" class="text-red-500"></span>
                            </div>
                        </div>
                        <div class="w-1/2 mx-2" id="userInfo_right">
                            <div class="mt-3" id="lastNameArea">
                                <label for="learner_lname">Last Name</label><br>
                                <input class="w-full input input-bordered focus:input-primary"
                                    type="text" name="learner_lname" id="learner_lname"
                                    value="{{$learner->learner_lname}}" disabled>
                                <span id="lastNameError" class="text-red-500"></span>
                            </div>
                            <div class="mt-3" id="genderArea">
                                <label for="learner_gender">Gender</label><br>
                                <select class="w-full select select-bordered focus:select-primary"
                                    name="learner_gender" id="learner_gender" disabled>
                                    <option value="" {{$learner->learner_gender == '' ? 'selected' : ''}}>--
                                        select an option --</option>
                                    <option value="Male" {{$learner->learner_gender == 'Male' ? 'selected' :
                                        ''}}>Male</option>
                                    <option value="Female" {{$learner->learner_gender == 'Female' ? 'selected' :
                                        ''}}>Female</option>
                                    <option value="Others" {{$learner->learner_gender == 'Others' ? 'selected' :
                                        ''}}>Preferred not to say</option>
                                </select>
                                <span id="genderError" class="text-red-500"></span>
                            </div>
                            <div class="mt-3" id="emailArea">
                                <label for="learner_email">Email Address</label><br>
                                <input class="w-full input input-bordered focus:input-primary"
                                    type="email" name="learner_email" id="learner_email"
                                    value="{{$learner->learner_email}}" disabled>
                                <span id="emailError" class="text-red-500"></span>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="w-full px-5 py-10 mt-5 bg-white shadow-lg rounded-xl" id="upper_right_2">
                    <h1 class="text-4xl font-semibold text-darthmouthgreen">Business Details</h1>

                    <hr class="my-6 border-t-2 border-gray-300">

                    <div class="mt-3" id="businessNameArea">
                        <label for="business_name">Business Name</label><br>
                        <input class="w-full input input-bordered focus:input-primary" type="text"
                            name="business_name" id="business_name" value="{{$business->business_name}}" disabled>
                        <span id="businessNameError" class="text-red-500"></span>
                    </div>

                    <div class="mt-3" id="businessAddressArea">
                        <label for="business_address">Business Address</label><br>
                        <input class="w-full input input-bordered focus:input-primary" type="text"
                            name="business_address" id="business_address" value="{{$business->business_address}}"
                            disabled>
                        <span id="businessAddressError" class="text-red-500"></span>
                    </div>

                    <div class="mt-3" id="businessOwnerArea">
                        <label for="business_owner_name">Business Owner Name</label><br>
                        <input class="w-full input input-bordered focus:input-primary" type="text"
                            name="business_owner_name" id="business_owner_name"
                            value="{{$business->business_owner_name}}" disabled>
                        <span id="businessOwnerNameError" class="text-red-500"></span>
                    </div>

                    <div class="mt-3" id="bplo_account_numberArea">
                        <label for="bplo_account_number">BPLO Account Number</label><br>
                        <input class="w-full input input-bordered focus:input-primary" maxlength="7"
                            type="text" name="bplo_account_number" id="bplo_account_number"
                            value="{{$business->bplo_account_number}}" placeholder="A-00000" disabled>
                        <span id="bploError" class="text-red-500"></span>
                    </div>

                    <div class="flex justify-between w-full">

                        <div class="w-full mt-3 mr-2" id="business_categoryArea">
                            <label for="business_category">Business Category</label><br>
                            <select class="w-full select select-bordered focus:select-primary"
                                name="business_category" id="business_category" disabled>
                                <option value="" {{$business->business_category == '' ? 'selected' : ''}}
                                    disabled>-- select an option --</option>
                                <option value="Micro" {{$business->business_category == 'Micro' ? 'selected' :
                                    ''}}>Micro</option>
                                <option value="Small" {{$business->business_category == 'Small' ? 'selected' :
                                    ''}}>Small</option>
                                <option value="Medium" {{$business->business_category == 'Medium' ? 'selected' :
                                    ''}}>Medium</option>
                            </select>
                            <span id="businessCategoryError" class="text-red-500"></span>
                        </div>

                        <div class="w-full mt-3 ml-2" id="business_classificationArea">
                            <label for="business_classification">Business Classification</label><br>
                            <select class="w-full select select-bordered focus:select-primary"
                                name="business_classification" id="business_classification" disabled>
                                <option value="" {{$business->business_classification == '' ? 'selected' : ''}}
                                    disabled>-- select an option --</option>
                                <option value="Retail" {{$business->business_classification == 'Retail' ?
                                    'selected' : ''}}>Retail</option>
                                <option value="Wholesale" {{$business->business_classification == 'Wholesale' ?
                                    'selected' : ''}}>Wholesale</option>
                                <option value="Financial Services" {{$business->business_classification ==
                                    'Financial Services' ? 'selected' : ''}}>Financial Services</option>
                                <option value="Real Estate" {{$business->business_classification == 'Real
                                    Estate' ? 'selected' : ''}}>Real Estate</option>
                                <option value="Transportation and Logistics" {{$business->
                                    business_classification == 'Transportation and Logistics' ? 'selected' :
                                    ''}}>Transportation and Logistics</option>
                                <option value="Technology" {{$business->business_classification == 'Technology'
                                    ? 'selected' : ''}}>Technology</option>
                                <option value="Healthcare" {{$business->business_classification == 'Healthcare'
                                    ? 'selected' : ''}}>Healthcare</option>
                                <option value="Education and Training" {{$business->business_classification ==
                                    'Education and Training' ? 'selected' : ''}}>Education and Training</option>
                                <option value="Entertainment and Media" {{$business->business_classification ==
                                    'Entertainment and Media' ? 'selected' : ''}}>Entertainment and Media
                                </option>
                                <option value="Hospitality and Tourism" {{$business->business_classification ==
                                    'Hospitality and Tourism' ? 'selected' : ''}}>Hospitality and Tourism
                                </option>

                            </select>
                            <span id="businessClassificationError" class="text-red-500"></span>
                        </div>
                    </div>

                    <div class="mt-3" id="business_descriptionArea">
                        <label for="business_description">Business Description</label><br>
                        <textarea name="business_description"
                            class="w-full px-5 py-1 border-2 rounded-lg h-36 border-darthmouthgreen"
                            id="business_description" disabled>{{$business->business_description}}</textarea>
                        <span id="businessDescriptionError" class="text-red-500"></span>
                    </div>

                </div>

                <div class="w-full px-5 py-10 mt-5 bg-white shadow-lg rounded-xl" id="upper_right_3">
                    <h1 class="text-4xl font-semibold text-darthmouthgreen">Account Details</h1>

                    <hr class="my-6 border-t-2 border-gray-300">

                    <div class="mt-3" id="learner_usernameArea">
                        <label for="learner_username">Username</label><br>
                        <input class="w-full input input-bordered focus:input-primary" type="text"
                            name="learner_username" id="learner_username" value="{{$learner->learner_username}}"
                            disabled>
                        <span id="usernameError" class="text-red-500"></span>
                    </div>

                    <div class="mt-3" id="passwordArea">
                        <label for="password">Password</label><br>
                        <input disabled class="w-full input input-bordered focus:input-primary"
                            type="password" name="password" id="password" disabled>
                        <span id="passwordError" class="text-red-500"></span>
                    </div>



                    <div id="changePasswordCheckbox" class="hidden mt-3 ">
                        <input type="checkbox" id="changePassword" class="mr-2">
                        <label for="changePassword" class="cursor-pointer">Change Password</label>
                    </div>

                    <div class="hidden mt-3" id="newPasswordArea">
                        <label for="newPassword">New Password</label><br>
                        <input class="w-full input input-bordered focus:input-primary" type="password"
                            name="newPassword" id="newPassword">
                        <span id="newPasswordError" class="text-red-500"></span>
                    </div>

                    <div id="passwordCheckbox" class="hidden mt-3 ">
                        <input type="checkbox" id="showPassword" class="mr-2">
                        <label for="showPassword" class="cursor-pointer">Show New Password</label>
                    </div>

                    <div class="hidden mt-3" id="passwordConfirmationArea">
                        <label for="passwordConfirm">Confirm New Password</label><br>
                        <input class="w-full input input-bordered focus:input-primary" type="password"
                            name="passwordConfirm" id="passwordConfirm">
                        <span id="passwordConfirmError" class="text-red-500"></span>
                    </div>


                    <div class="mt-3" id="securityCodeArea">
                        <label for="learner_security_code">Enter your Security Code</label><br>
                        <input class="w-full input input-bordered focus:input-primary" type="password"
                            maxlength="6" name="learner_security_code" id="learner_security_code" disabled>
                        <span id="securityCodeGuide" class="text-gray-500">Enter 6 characters of security
                            code</span>
                        <span id="securityCodeError" class="text-red-500"></span>
                    </div>
                </div>
            </div>
        </div>

</section>

<div id="loaderModal"
    class="fixed top-0 left-0 z-50 flex items-center justify-center hidden w-full h-full bg-gray-200 bg-opacity-75 ">
    <div
        class="flex flex-col items-center justify-center w-full h-screen p-4 bg-white rounded-lg shadow-lg modal-content md:h-1/3 lg:w-1/3">
        <span class="loading loading-spinner text-primary loading-lg"></span>

        <p class="mt-5 text-xl text-darthmouthgreen">loading</p>
    </div>
</div>
<script>
    $(document).ready(function() {

        var baseUrl = window.location.href
        var csrfToken = $('meta[name="csrf-token"]').attr('content'); // Get the CSRF token from the meta tag
    

        $('#showNewPassword').on('change', function() {
        var passwordInput = $('#password');
        var passwordConfirmInput = $('#learnerNewPasswordConfirm');
        var learner_security_code = $('#learner_security_code');
        if ($(this).is(':checked')) {
            passwordInput.attr('type', 'text');
            passwordConfirmInput.attr('type', 'text');            
            learner_security_code.attr('type', 'text');
        } else {
            passwordInput.attr('type', 'password');
            passwordConfirmInput.attr('type', 'password');           
            learner_security_code.attr('type', 'password');
        }
        });

        $('#learner_fname, #learner_lname').on('input', function() {
            var fname = $('#learner_fname').val();
            var lname = $(' #learner_lname').val(); 

            var name = fname + ' ' + lname;

            $('#nameDisp').text(name);
        })

        $('#learner_contactno').on('input', function() {
            var phoneNumber = $(this).val();
            // Replace any non-digit characters with empty string
            phoneNumber = phoneNumber.replace(/\D/g, '');
            // Check if the input starts with '09'
            if (phoneNumber.length >= 2 && phoneNumber.substring(0, 2) !== '09') {
                phoneNumber = '09' + phoneNumber.substring(2);
            }
            // Update the input value
            $(this).val(phoneNumber);
        });


        $('#edit_info_btn').on('click', function() {

            $('#changePasswordCheckbox').removeClass('hidden')

            
            $('#apply_change_btn').removeClass('hidden')
            $('#delete_btn').removeClass('hidden')
            $('#cancel_btn').removeClass('hidden')
            $('#edit_info_btn').addClass('hidden')
            
            $('#button').removeClass('hidden')

            $('#learner_fname').prop('disabled', false).focus()
            $('#learner_bday').prop('disabled', false)
            $('#learner_lname').prop('disabled', false)
            $('#learner_gender').prop('disabled', false)
            $('#learner_contactno').prop('disabled', false)
            $('#learner_email').prop('disabled', false)

            $('#business_name').prop('disabled', false)
            $('#business_address').prop('disabled', false)
            $('#business_owner_name').prop('disabled', false)
            $('#bplo_account_number').prop('disabled', false)
            $('#business_category').prop('disabled', false)
            $('#business_classification').prop('disabled', false)
            $('#business_description').prop('disabled', false)

            $('#learner_username').prop('disabled', false)
            $('#learner_security_code').prop('disabled', false)
        })

        $('#cancel_btn').on('click', function() {

            $('#changePasswordCheckbox').addClass('hidden')


            $('#apply_change_btn').addClass('hidden')
            $('#delete_btn').addClass('hidden')
            $('#cancel_btn').addClass('hidden')
            $('#edit_info_btn').removeClass('hidden')

            
            $('#newPasswordArea').addClass('hidden')
            $('#passwordConfirmationArea').addClass('hidden')

            $('#changePassword').prop('checked', false);

            $('#newPasswordError').text('');
            $('#passwordConfirmError').text('');

            $('#button').addClass('hidden')

            $('#learner_fname').prop('disabled', true)
            $('#learner_bday').prop('disabled', true)
            $('#learner_lname').prop('disabled', true)
            $('#learner_gender').prop('disabled', true)
            $('#learner_contactno').prop('disabled', true)
            $('#learner_email').prop('disabled', true)

            $('#business_name').prop('disabled', true)
            $('#business_address').prop('disabled', true)
            $('#business_owner_name').prop('disabled', true)
            $('#bplo_account_number').prop('disabled', true)
            $('#business_category').prop('disabled', true)
            $('#business_classification').prop('disabled', true)
            $('#business_description').prop('disabled', true)

            $('#learner_username').prop('disabled', true)
            $('#password').prop('disabled', true)
            $('#learner_security_code').prop('disabled', true)
        })

        $('#changePassword').on('change', function() {
            if ($(this).is(':checked')) {
                $('#passwordCheckbox').removeClass('hidden')
                $('#newPasswordArea').removeClass('hidden').focus();
                $('#passwordConfirmationArea').removeClass('hidden');
            } else {
                $('#passwordCheckbox').addClass('hidden')
                $('#newPasswordArea').addClass('hidden');
                $('#passwordConfirmationArea').addClass('hidden');
            }
        });

        $('#showPassword').on('change', function() {
        var passwordInput = $('#newPassword');
        var passwordConfirmInput = $('#passwordConfirm');
        var codeInput = $('#learner_security_code');
        
        if ($(this).is(':checked')) {
            passwordInput.attr('type', 'text');
            passwordConfirmInput.attr('type', 'text');
            codeInput.attr('type', 'text');
        } else {
            passwordInput.attr('type', 'password');
            passwordConfirmInput.attr('type', 'password');
            codeInput.attr('type', 'password');
        }
        });

        $('#apply_change_btn').on('click', function() {
            var learner_fname = $('#learner_fname').val()
            var learner_bday = $('#learner_bday').val()
            var learner_lname = $('#learner_lname').val()
            var learner_gender = $('#learner_gender').val()
            var learner_contactno = $('#learner_contactno').val()
            var learner_email = $('#learner_email').val()

            var business_name = $('#business_name').val()
            var business_address = $('#business_address').val()
            var business_owner_name = $('#business_owner_name').val()
            var bplo_account_number = $('#bplo_account_number').val()
            var business_category = $('#business_category').val()
            var business_classification = $('#business_classification').val()
            var business_description = $('#business_description').val()

            
            var learner_username = $('#learner_username').val()
            var password = $('#password').val()
            var newPassword = $('#newPassword').val()
            var passwordConfirm = $('#passwordConfirm').val()
            var learner_security_code = $('#learner_security_code').val()
            
            
            var changePassword = $('#changePassword')

            var isValid = true;

            if (learner_fname === '') {
                $('#firstNameError').text('Please enter a first name.');
                isValid = false;
            } else if (!/^[a-zA-Z0-9\s-]+$/.test(learner_fname)) {
                $("#firstNameError").text(
                "Special characters are not allowed in the first name except for one dash.",
                );
                isValid = false;
            } else {
                $('#firstNameError').text('');
            }
        
            if (learner_bday === '') {
                $('#bdayError').text('Please enter a birthday.');
                isValid = false;
            } else {
            var today = new Date();
            var birthDate = new Date(learner_bday);
            var age = today.getFullYear() - birthDate.getFullYear();
            var monthDiff = today.getMonth() - birthDate.getMonth();
            if (
            monthDiff < 0 || (monthDiff===0 && today.getDate() < birthDate.getDate()) ) { age--; } if (age < 12) {
                $("#bdayError").text( "The learner must be at least 12 years old." , ); isValid=false; } else {
                $("#bdayError").text(""); } }
        
            if (learner_lname === '') {
                $('#lastNameError').text('Please enter a last name.');
                isValid = false;
            } else if (!/^[a-zA-Z0-9\s-]+$/.test(learner_lname)) {
                $("#lastNameError").text(
                    "Special characters are not allowed in the last name except for one dash.",
                );
                isValid = false;
            } else {
                $('#lastNameError').text('');
            }
        
            if (learner_gender === '') {
                $('#genderError').text('Please select a gender.');
                isValid = false;
            } else {
                $('#genderError').text('');
            }

            if (learner_contactno === "" || learner_contactno.length != 11) {
                $("#contactnoError").text("Please enter your contact number.");
                isValid = false;
            } else {
                $("#contactError").text("");


                var url = "/learner/" + {{$learner->learner_id}} + "/checkContact";
                $.ajax ({
                    type: "GET",
                    url: url,
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    },
                    data: {
                        'number' : learner_contactno,
                    },
                    success: function(response) {
                        // console.log(response);
                        if(response.exists) {
                            $('#contactError').text('This contact number is already taken.');
                            isValid = false;
                        } else {
                            $('#contactError').text('');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }

                    })

            }

            if (learner_email === '') {
                $('#emailError').text('Please enter your email address.');
                isValid = false;
            } else if (!learner_email.includes('@')) {
                $('#emailError').text('Input must be valid email address (eg. name@example.com)');
                isValid = false;
            } else {
                $('#emailError').text('');

                var url = "/learner/" + {{$learner->learner_id}} + "/checkEmail";
                $.ajax ({
                    type: "GET",
                    url: url,
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    },
                    data: {
                        'email' : learner_email,
                    },
                    success: function(response) {
                        // console.log(response);
                        if(response.exists) {
                            $('#emailError').text('This email is already taken.');
                            isValid = false;
                        } else {
                            $('#emailError').text('');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }

                    })
            }


            if (business_name === '') {
                $('#businessNameError').text('Please enter a business name.');
                isValid = false;
            } else {
                $('#businessNameError').text('');
            }
        
            if (business_address === '') {
                $('#businessAddressError').text('Please enter a business address.');
                isValid = false;
            } else {
                $('#businessAddressError').text('');
            }
        
            if (business_owner_name === '') {
                $('#businessOwnerNameError').text('Please enter a owner name.');
                isValid = false;
            } else {
                $('#businessOwnerNameError').text('');
            }

            if (
                bplo_account_number === "" ||
                bplo_account_number.length !== 7 ||
                !/^.*[a-zA-Z].*[-].*$/.test(bplo_account_number)
            ) {
                $("#bploError").text(
                    "Please enter a valid BPLO Account Number.",
                );
                isValid = false;
            } else {
                $("#bploError").text("");

                var url = "/learner/" + {{$learner->learner_id}} + "/checkBPLO";
                $.ajax ({
                    type: "GET",
                    url: url,
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    },
                    data: {
                        'bplo_account_number' : bplo_account_number,
                    },
                    success: function(response) {
                        // console.log(response);
                        if(response.exists) {
                            $('#bploError').text('This account number is already taken.');
                            isValid = false;
                        } else {
                            $('#bploError').text('');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }

                    })
            }
        
            if (business_category === '') {
                $('#businessCategoryError').text('Please select a category.');
                isValid = false;
            } else {
                $('#businessCategoryError').text('');
            }
        

            if (business_classification === '') {
                $('#businessClassificationError').text('Please select a classification.');
                isValid = false;
            } else {
                $('#businessClassificationError').text('');
            }
        

            if (business_description === '') {
                $('#businessDescriptionError').text('Please select a description.');
                isValid = false;
            } else {
                $('#businessDescriptionError').text('');
            }

            if (learner_username === '') {
                $('#usernameError').text('Please enter your username.');
                isValid = false;
            } else {
                $('#usernameError').text('');
            }
        
        



            if(changePassword.is(':checked')) {
                if (newPassword === '') {
                $('#newPasswordError').text('Please enter a password.');
                isValid = false;
                } else {
                    $('#newPasswordError').text('');
                }

                if (passwordConfirm === '') {
                $('#passwordConfirmError').text('Please enter a password confirmation.');
                isValid = false;
                } else if (passwordConfirm !== newPassword) {
                    $('#passwordConfirmError').text('Your password does not match');
                    isValid = false;
                } else {
                    $('#passwordConfirmError').text('');
                }
            }


            if(isValid) {

                var withPass = 0;

                if(changePassword.is(':checked')) {

                    var learnerData = { 
                    withPass: 1,
                    learner_fname: learner_fname,
                    learner_lname: learner_lname,
                    learner_gender: learner_gender,
                    learner_contactno: learner_contactno,
                    learner_email: learner_email,
                    learner_bday: learner_bday,

                    business_name: business_name,
                    business_address: business_address,
                    business_owner_name: business_owner_name,
                    bplo_account_number: bplo_account_number,
                    business_category: business_category,
                    business_classification: business_classification,
                    business_description: business_description,

                    learner_username: learner_username,
                    password: newPassword,
                    learner_security_code: learner_security_code,
                }
                } else {

                    var learnerData = {
                    withPass: 0,
                    learner_fname: learner_fname,
                    learner_lname: learner_lname,
                    learner_gender: learner_gender,
                    learner_contactno: learner_contactno,
                    learner_email: learner_email,
                    learner_bday: learner_bday,

                    business_name: business_name,
                    business_address: business_address,
                    business_owner_name: business_owner_name,
                    bplo_account_number: bplo_account_number,
                    business_category: business_category,
                    business_classification: business_classification,
                    business_description: business_description,

                    learner_username: learner_username,
                    password: null,
                    learner_security_code: learner_security_code,
                }
                }

    
            var url = baseUrl;
            $('#loaderModal').removeClass('hidden');
            $.ajax ({
                type: "PUT",
                url: url,
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                data: learnerData,
                success: function(response) {
                    console.log(response);

                    if (response.redirect_url) {
                        $('#loaderModal').addClass('hidden');
                        window.location.href = response.redirect_url;
                    }

                    if (response.message === 'Validation failed') {
                        if (response.errors.includes('Username')) {
                            $('#usernameError').text('Username is already taken');
                        } else {
                            $('#usernameError').text('');
                        }
                        if (response.errors.includes('Contact Number')) {
                            $('#contactError').text('Contact Number is already taken');
                        } else {
                            $('#contactError').text('');
                        }
                        if (response.errors.includes('Email')) {
                            $('#emailError').text('Email is already taken');
                        } else {
                            $('#emailError').text('');
                        }
                    }
                },
                error: function(xhr, status, error) {
                    console.log(error);
                    if (xhr.status === 422) {
                        var response = xhr.responseJSON;
                        if (response.errors) {
                            // Display validation errors to the user
                            if (response.errors.includes('Username')) {
                                $('#usernameError').text('Username is already taken');
                            } else {
                                $('#usernameError').text('');
                            }
                            if (response.errors.includes('Contact Number')) {
                                $('#contactError').text('Contact Number is already taken');
                            } else {
                                $('#contactError').text('');
                            }
                            if (response.errors.includes('Email')) {
                                $('#emailError').text('Email is already taken');
                            } else {
                                $('#emailError').text('');
                            }
                        }
                    } else {
                        // Handle other types of errors
                        console.log('An error occurred:', error);
                    }
                }

            })
            }
        })



        $('#delete_btn').on('click', function() {
            var url = baseUrl + "/delete_learner";
            $('#loaderModal').removeClass('hidden');
            $.ajax ({
                type: "POST",
                url: url,
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                success: function (response){
                    console.log(response)
                    if (response.redirect_url) {
                        $('#loaderModal').addClass('hidden');
                    window.location.href = response.redirect_url;
        }
                    // window.location.reload();
                },
                error: function(error) {
                    console.log(error);
                }
            })
        })
    })
</script>

@endsection