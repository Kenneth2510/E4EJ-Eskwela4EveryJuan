@extends('layouts.admin_layout')

@section('content')
<section class="w-full h-screen md:w-3/4 lg:w-10/12">
    <div class="h-full px-2 py-4 pt-24 rounded-lg shadow-lg md:overflow-hidden md:overflow-y-scroll md:pt-6">
        <div class="flex justify-between px-10">
            <h1 class="text-4xl font-bold text-darthmouthgreen">Instructor Management</h1>
            <div class="">
                <p class="text-xl font-semibold text-darthmouthgreen">{{$admin->admin_codename}}</p>
            </div>
        </div>
        <div class="mb-5">
            <a href="/admin/instructors" class="">
                <i class="text-2xl md:text-3xl fa-solid fa-arrow-left" style="color: #000000;"></i>
            </a>
        </div>
        <div class="py-4 space-y-2 lg:flex lg:space-y-0 lg:space-x-2">
            <div class="flex flex-col items-center justify-start h-full p-3 bg-white rounded-lg shadow-lg lg:w-3/12"
                id="upper_left_container">
                <div class="relative flex flex-col items-center justify-start" style="margin:0 auto; padding: auto;">
                    <img class="z-0 object-cover w-40 h-40 rounded-full"
                        src="{{ asset('storage/' . $instructor->profile_picture)}}" alt="Profile Picture">
                </div>

                <div class="mt-10" id="name_area">
                    <h1 class="text-2xl font-semibold text-center" id="nameDisp">
                        {{$instructor->instructor_fname}} {{$instructor->instructor_lname}}</h1>
                </div>

                <div class="mt-5 text-center" id="account_status_area">
                    <h1 class="text-xl" id="roleDisp">INSTRUCTOR</h1>
                </div>


                <div class="mt-5 space-y-3 text-center" id="account_status_area">
                    <h1 class="text-xl" id="statusDisp">Status</h1>

                    @if($admin->role === 'IT_DEPT' || $admin->role === 'SUPER_ADMIN' || $admin->role ===
                    'USER_MANAGER')
                    @if ($instructor->status == 'Approved')
                    <div id="status" class="btn btn-primary">
                        Approved</div>
                    <div id="button" class="flex flex-col hidden space-y-2">
                        <form action="/admin/pending_instructor/{{$instructor->instructor_id}}" method="POST">
                            @method('put')
                            @csrf
                            <button class="btn btn-warning">Change
                                to pending</button>
                        </form>
                        <form action="/admin/block_instructor/{{$instructor->instructor_id}}" method="POST">
                            @method('PUT')
                            @csrf
                            <button class="btn btn-error">Block Instructor</button>
                        </form>
                    </div>
                    @elseif ($instructor->status == 'Blocked')
                    <div id="status" class="btn btn-error">Blocked
                    </div>
                    <div id="button" class="flex flex-col hidden space-y-2">
                        <form action="/admin/pending_instructor/{{$instructor->instructor_id}}" method="POST">
                            @method('put')
                            @csrf
                            <button class="btn btn-warning">change
                                to pending</button>
                        </form>
                        <form action="/admin/approve_instructor/{{$instructor->instructor_id}}" method="POST">
                            @method('put')
                            @csrf
                            <button type="submit" class="btn btn-primary">approve
                                now</button>
                        </form>
                    </div>
                    @elseif ($instructor->status == 'Expired')
                    <div id="status" class="text-white bg-gray-500 btn btn-error">Expired
                    </div>
                    <div id="button" class="flex flex-col hidden space-y-2">
                        <form action="/admin/pending_instructor/{{$instructor->instructor_id}}" method="POST">
                            @method('put')
                            @csrf
                            <button class="btn btn-warning">change
                                to pending</button>
                        </form>
                        <form action="/admin/approve_instructor/{{$instructor->instructor_id}}" method="POST">
                            @method('put')
                            @csrf
                            <button type="submit" class="btn btn-primary">approve
                                now</button>
                        </form>
                        <form action="/admin/block_instructor/{{$instructor->instructor_id}}" method="POST">
                            @method('PUT')
                            @csrf
                            <button class="btn btn-error">Block Instuctor</button>
                        </form>
                    </div>
                    @else
                    <div id="status" class="btn btn-warning">pending
                    </div>
                    <div id="button" class="flex flex-col hidden space-y-2">
                        <form action="/admin/approve_instructor/{{$instructor->instructor_id}}" method="POST">
                            @method('put')
                            @csrf
                            <button type="submit" class="btn btn-primary">approve
                                now</button>
                        </form>

                        <form action="/admin/block_instructor/{{$instructor->instructor_id}}" method="POST">
                            @method('PUT')
                            @csrf
                            <button class="btn btn-error">Block Instuctor</button>
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
                                <label for="instructor_fname">First Name</label><br>
                                <input class="w-full input input-bordered focus:input-primary" type="text"
                                    name="instructor_fname" id="instructor_fname"
                                    value="{{$instructor->instructor_fname}}" disabled>
                                <span id="firstNameError" class="text-red-500"></span>
                            </div>
                            <div class="mt-3" id="bdayArea">
                                <label for="instructor_bday ">Birthday</label><br>
                                <input class="w-full input input-bordered focus:input-primary" type="date"
                                    name="instructor_bday" id="instructor_bday" value="{{$instructor->instructor_bday}}"
                                    disabled>
                                <span id="bdayError" class="text-red-500"></span>
                            </div>
                            <div class="mt-3" id="contactArea">
                                <label for="instructor_contactno">Contact Number</label><br>
                                <input class="w-full input input-bordered focus:input-primary" type="text"
                                    maxlength="11" name="instructor_contactno" id="instructor_contactno"
                                    value="{{$instructor->instructor_contactno}}" disabled placeholder="09">
                                <span id="contactError" class="text-red-500"></span>
                            </div>
                        </div>
                        <div class="w-1/2 mx-2" id="userInfo_right">
                            <div class="mt-3" id="lastNameArea">
                                <label for="instructor_lname">Last Name</label><br>
                                <input class="w-full input input-bordered focus:input-primary" type="text"
                                    name="instructor_lname" id="instructor_lname"
                                    value="{{$instructor->instructor_lname}}" disabled>
                                <span id="lastNameError" class="text-red-500"></span>
                            </div>
                            <div class="mt-3" id="genderArea">
                                <label for="instructor_gender">Gender</label><br>
                                <select class="w-full select select-bordered focus:select-primary"
                                    name="instructor_gender" id="instructor_gender" disabled>
                                    <option value="" {{$instructor->instructor_gender == '' ? 'selected' : ''}}
                                        disabled>-- select an option --</option>
                                    <option value="Male" {{$instructor->instructor_gender == 'Male' ? 'selected'
                                        : ''}}>Male</option>
                                    <option value="Female" {{$instructor->instructor_gender == 'Female' ?
                                        'selected' : ''}}>Female</option>
                                    <option value="Others" {{$instructor->instructor_gender == 'Others' ?
                                        'selected' : ''}}>Preferred not to say</option>
                                </select>
                                <span id="genderError" class="text-red-500"></span>
                            </div>
                            <div class="mt-3" id="emailArea">
                                <label for="instructor_email">Email Address</label><br>
                                <input class="w-full input input-bordered focus:input-primary" type="email"
                                    name="instructor_email" id="instructor_email"
                                    value="{{$instructor->instructor_email}}" disabled>
                                <span id="emailError" class="text-red-500"></span>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="w-full px-5 py-10 mt-5 bg-white shadow-lg rounded-xl" id="courseProgress">
                    <h1 class="text-4xl font-semibold text-darthmouthgreen">Your Credentials</h1>

                    <hr class="my-6 border-t-2 border-gray-300">

                    <input class="file-input file-input-primary" type="file" name="instructor_credentials"
                        id="instructor_credentials" value="{{$instructor->instructor_credentials}}" disabled>

                    @if($instructor->instructor_credentials)
                    @php
                    $pathParts = explode('/', $instructor->instructor_credentials);
                    $filename = end($pathParts);
                    $fileurl = asset("storage/$instructor->instructor_credentials");
                    @endphp
                    <p class="text-xl w-96">File: <a href="{{ $fileurl }}" target="_blank">{{$filename}}</a></p>
                    @else
                    <p class="text-xl w-96">No file Uploaded</p>
                    @endif
                    <span id="credentialsError" class="text-red-500"></span>

                </div>


                <div class="w-full px-5 py-10 mt-5 bg-white shadow-lg rounded-xl" id="upper_right_3">
                    <h1 class="text-4xl font-semibold text-darthmouthgreen">Account Details</h1>

                    <hr class="my-6 border-t-2 border-gray-300">

                    <div class="mt-3" id="instructor_usernameArea">
                        <label for="instructor_username">Username</label><br>
                        <input class="w-full input input-bordered focus:input-primary" type="text"
                            name="instructor_username" id="instructor_username"
                            value="{{$instructor->instructor_username}}" disabled>
                        <span id="usernameError" class="text-red-500"></span>
                    </div>

                    <div class="mt-3" id="passwordArea">
                        <label for="password">Password</label><br>
                        <input disabled class="w-full input input-bordered focus:input-primary" type="password"
                            name="password" id="password" disabled>
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
                        <label for="instructor_security_code">Enter your Security Code</label><br>
                        <input class="w-full input input-bordered focus:input-primary" type="password" maxlength="6"
                            name="instructor_security_code" id="instructor_security_code"
                            value="{{$instructor->instructor_security_code}}" disabled>
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
        var passwordInput = $('#newPassword');
        var passwordConfirmInput = $('#passwordConfirm');
        var instructor_security_code = $('#instructor_security_code');
        if ($(this).is(':checked')) {
            passwordInput.attr('type', 'text');
            passwordConfirmInput.attr('type', 'text');            
            instructor_security_code.attr('type', 'text');
        } else {
            passwordInput.attr('type', 'password');
            passwordConfirmInput.attr('type', 'password');           
            instructor_security_code.attr('type', 'password');
        }
        });

        $('#instructor_fname, #instructor_lname').on('input', function() {
            var fname = $('#instructor_fname').val();
            var lname = $(' #instructor_lname').val(); 

            var name = fname + ' ' + lname;

            $('#nameDisp').text(name);
        })

        $('#instructor_contactno').on('input', function() {
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

            $('#instructor_fname').prop('disabled', false).focus()
            $('#instructor_bday').prop('disabled', false)
            $('#instructor_lname').prop('disabled', false)
            $('#instructor_gender').prop('disabled', false)
            $('#instructor_contactno').prop('disabled', false)
            $('#instructor_email').prop('disabled', false)

            $('#instructor_credentials').prop('disabled', false)

            $('#instructor_username').prop('disabled', false)
            $('#instructor_security_code').prop('disabled', false)
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

            $('#instructor_fname').prop('disabled', true)
            $('#instructor_bday').prop('disabled', true)
            $('#instructor_lname').prop('disabled', true)
            $('#instructor_gender').prop('disabled', true)
            $('#instructor_contactno').prop('disabled', true)
            $('#instructor_email').prop('disabled', true)

            $('#instructor_credentials').prop('disabled', true)

            $('#instructor_username').prop('disabled', true)
            $('#password').prop('disabled', true)
            $('#instructor_security_code').prop('disabled', true)
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
        var codeInput = $('#instructor_security_code');
        
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
          
            var instructor_fname = $('#instructor_fname').val();
            var instructor_bday = $('#instructor_bday').val();
            var instructor_lname = $('#instructor_lname').val();
            var instructor_gender = $('#instructor_gender').val();
            var instructor_contactno = $('#instructor_contactno').val();
            var instructor_email = $('#instructor_email').val();

            var credentials = $('#instructor_credentials')[0];
            var instructor_credentials = credentials.files[0];

            var instructor_username = $('#instructor_username').val();
            var password = $('#password').val();
            var newPassword = $('#newPassword').val();
            var passwordConfirm = $('#passwordConfirm').val();
            var instructor_security_code = $('#instructor_security_code').val();
            var changePassword = $('#changePassword');

            var isValid = true;

            if (instructor_fname === '') {
                $('#firstNameError').text('Please enter a first name.');
                isValid = false;
            } else if (!/^[a-zA-Z0-9\s-]+$/.test(instructor_fname)) {
                $("#firstNameError").text(
                "Special characters are not allowed in the first name except for one dash.",
                );
                isValid = false;
            } else {
                $('#firstNameError').text('');
            }
        
            if (instructor_bday === '') {
                $('#bdayError').text('Please enter a birthday.');
                isValid = false;
            } else {
                var today = new Date();
                var birthDate = new Date(instructor_bday);
                var age = today.getFullYear() - birthDate.getFullYear();
                var monthDiff = today.getMonth() - birthDate.getMonth();
                if (
                    monthDiff < 0 ||
                    (monthDiff === 0 && today.getDate() < birthDate.getDate())
                ) {
                    age--;
                }

                if (age < 22) {
                    $("#bdayError").text(
                        "The instructor must be at least 22 years old.",
                    );
                    isValid = false;
                } else {
                    $("#bdayError").text("");
                }
            }
        
            if (instructor_lname === '') {
                $('#lastNameError').text('Please enter a last name.');
                isValid = false;
            } else if (!/^[a-zA-Z0-9\s-]+$/.test(instructor_lname)) {
                $("#lastNameError").text(
                    "Special characters are not allowed in the last name except for one dash.",
                );
                isValid = false;
            } else {
                $('#lastNameError').text('');
            }
        
            if (instructor_gender === '') {
                $('#genderError').text('Please select a gender.');
                isValid = false;
            } else {
                $('#genderError').text('');
            }

            if (instructor_contactno === '' || instructor_contactno.length != 11) {
                $('#contactError').text('Please enter your contact number.');
                isValid = false;
            } else {
                $('#contactError').text('');

                var url = "/instructor/" + {{$instructor->instructor_id}} + "/checkContact";
                $.ajax ({
                    type: "GET",
                    url: url,
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    },
                    data: {
                        'number' : instructor_contactno,
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

            if (instructor_email === '') {
                $('#emailError').text('Please enter your email address.');
                isValid = false;
            } else {
                $('#emailError').text('');
                

                var url = "/instructor/"+ {{$instructor->instructor_id}} +"/checkEmail";
                $.ajax ({
                    type: "GET",
                    url: url,
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    },
                    data: {
                        'email' : instructor_email,
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




            if (instructor_username === '') {
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
                var withFile = 0;

                var formData = new FormData();
                formData.append('instructor_fname', instructor_fname);
                formData.append('instructor_bday', instructor_bday);
                formData.append('instructor_lname', instructor_lname);
                formData.append('instructor_gender', instructor_gender);
                formData.append('instructor_contactno', instructor_contactno);
                formData.append('instructor_email', instructor_email);
                formData.append('instructor_username', instructor_username);
                formData.append('instructor_security_code', instructor_security_code);

                if (changePassword.is(':checked')) {
                    formData.append('withPass', 1);
                    formData.append('password', newPassword);
                    formData.append('passwordConfirm', passwordConfirm);
                } else {
                    formData.append('withPass', 0);
                    formData.append('password', password);
                }

                if (instructor_credentials) {
                    formData.append('withFile', 1);
                    formData.append('instructor_credentials', instructor_credentials);
                } else {
                    formData.append('withFile', 0);
                }
    
                var url = baseUrl + '/update';

    // $('#loaderModal').removeClass('hidden');

                $.ajax({
                    type: "POST",
                    url: url,
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    },
                    data: formData, 
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        console.log(response);

                        if (response.redirect_url) {
                            // $('#loaderModal').addClass('hidden');

                            window.location.href = response.redirect_url;
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

                });

            }
        })



        $('#delete_btn').on('click', function() {
            var url = baseUrl + "/delete_instructor";
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