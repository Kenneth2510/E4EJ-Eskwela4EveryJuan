@extends('layouts.admin_layout')

@section('content')
<section class="w-full h-screen md:w-3/4 lg:w-10/12">
    <div class="h-full px-2 py-4 pt-24 rounded-lg shadow-lg md:overflow-hidden md:overflow-y-scroll md:pt-6">
        <div class="flex justify-between py-10">
            <h1 class="text-4xl font-bold text-darthmouthgreen">Admin Management</h1>
            <div class="">
                <p class="text-xl font-semibold text-darthmouthgreen">{{$admin->admin_codename}}</p>
            </div>
        </div>
        <div class="mb-5">
            <a href="/admin/admins" class="">
                <i class="text-2xl md:text-3xl fa-solid fa-arrow-left" style="color: #000000;"></i>
            </a>
        </div>
        <div class="py-4 space-y-2 lg:flex lg:space-y-0 lg:space-x-2" id="upper_container">
            <div class="flex flex-col items-center justify-start h-full py-4 bg-white rounded-lg shadow-lg lg:w-3/12"
                id="upper_left_container">
                <div class="relative flex flex-col items-center justify-start" style="margin:0 auto; padding: auto;">
                    <img class="z-0 object-cover w-40 h-40 rounded-full"
                        src="{{ asset('storage/images/default_profile.png')}}" alt="Profile Picture">
                </div>

                <div class="mt-10" id="name_area">
                    <h1 class="text-2xl font-semibold text-center" id="codenameDisp">{{$adminData->admin_codename}}
                    </h1>
                </div>

                <div class="mt-5 text-center" id="account_status_area">
                    <h1 class="text-xl" id="roleDisp">{{ $adminData->role }}</h1>
                </div>


                <div class="flex flex-col items-center justify-center w-full px-5 mt-5 space-y-2">
                    <button type="button" class="w-full btn btn-primary" id="edit_info_btn">Edit Info</button>

                    <button type="button" class="hidden w-full btn btn-primary" id="apply_change_btn">Apply
                        Changes</button>
                    <button type="button" class="hidden w-full btn btn-error" id="cancel_btn">Cancel</button>
                </div>

            </div>
            <div class="h-full lg:w-9/12" id="upper_right_container">
                <div class="w-full px-5 py-10 bg-white shadow-lg rounded-xl" id="upper_right_1">
                    <h1 class="text-4xl font-semibold text-darthmouthgreen">User Details</h1>

                    <hr class="my-6 border-t-2 border-gray-300">

                    <div class="w-full mt-5" id="userInfo">

                        <div class="w-full mt-3" id="codenameArea">
                            <label for="admin_codename">Code Name</label><br>
                            <input class="w-full input input-bordered focus:input-primary" type="text"
                                name="admin_codename" id="admin_codename" value="{{$adminData->admin_codename}}"
                                disabled>
                            <span id="codenameError" class="text-red-500"></span>
                        </div>

                        <div class="w-full mt-3" id="roleArea">
                            <label for="role">Admin Role</label><br>
                            <select class="w-full select select-bordered focus:select-primary"
                                name="role" id="role" disabled>
                                <option value="SUPER_ADMIN" {{$adminData->role == "SUPER_ADMIN" ? 'selected' :
                                    ''}}disabled>SUPER_ADMIN</option>
                                <option value="IT_DEPT" {{$adminData->role == "IT_DEPT" ? 'selected' : ''}}>IT_DEPT
                                </option>
                                <option value="COURSE_SUPERVISOR" {{$adminData->role == "COURSE_SUPERVISOR" ?
                                    'selected' : ''}}>COURSE_SUPERVISOR</option>
                                <option value="COURSE_ASST_SUPERVISOR" {{$adminData->role ==
                                    "COURSE_ASST_SUPERVISOR" ? 'selected' : ''}}>COURSE_ASST_SUPERVISOR</option>
                                <option value="USER_MANAGER" {{$adminData->role == "USER_MANAGER" ? 'selected' :
                                    ''}}>USER_MANAGER</option>
                                <option value="CLERK" {{$adminData->role == "CLERK" ? 'selected' : ''}}>CLERK
                                </option>
                            </select>
                            <span id="roleError" class="text-red-500"></span>
                        </div>

                    </div>

                </div>

                <div class="w-full px-5 py-10 mt-5 bg-white shadow-lg rounded-xl" id="upper_right_3">
                    <h1 class="text-4xl font-semibold text-darthmouthgreen">Account Details</h1>

                    <hr class="my-6 border-t-2 border-gray-300">

                    <div class="mt-3" id="usernameArea">
                        <label for="admin_username">Username</label><br>
                        <input class="w-full input input-bordered focus:input-primary" type="text"
                            name="admin_username" id="admin_username" value="{{$adminData->admin_username}}" disabled>
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

                </div>
            </div>
        </div>
    </div>



</section>
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
    $(document).ready(function () {

        var baseUrl = window.location.href
        var csrfToken = $('meta[name="csrf-token"]').attr('content'); // Get the CSRF token from the meta tag
    

        $('#edit_info_btn').on('click' , function() {
          
            $('#apply_change_btn').removeClass('hidden')
            $('#cancel_btn').removeClass('hidden')

            $('#edit_info_btn').addClass('hidden')

            $('#admin_codename').prop('disabled', false).focus()
            $('#admin_username').prop('disabled', false)

            $('#changePasswordCheckbox').removeClass('hidden')
            
        })

        $('#cancel_btn').on('click' , function() {
          
          $('#apply_change_btn').addClass('hidden')
          $('#cancel_btn').addClass('hidden')

          $('#edit_info_btn').removeClass('hidden')

          $('#admin_codename').prop('disabled', true)
          $('#admin_username').prop('disabled', true)

          $('#passwordCheckbox').addClass('hidden')
          $('#newPasswordArea').addClass('hidden');
          $('#passwordConfirmationArea').addClass('hidden');

          $('#changePassword').prop('checked', false);
          $('#changePasswordCheckbox').addClass('hidden')

      })


      $('#showPassword').on('change', function() {
        var passwordInput = $('#newPassword');
        var passwordConfirmInput = $('#passwordConfirm');
        if ($(this).is(':checked')) {
            passwordInput.attr('type', 'text');
            passwordConfirmInput.attr('type', 'text'); 
        } else {
            passwordInput.attr('type', 'password');
            passwordConfirmInput.attr('type', 'password'); 
        }
        });

        $('#admin_codename').on('input', function() {
            var codename = $('#admin_codename').val()

            $('#codenameDisp').text(codename);
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


        $('#apply_change_btn').on('click', function(e) {
            e.preventDefault()

            var admin_codename = $('#admin_codename').val()
            var admin_username = $('#admin_username').val()
            var newPassword = $('#newPassword').val()
            var passwordConfirm = $('#passwordConfirm').val()

            var changePassword = $('#changePassword')
            var isValid = true;

            if (admin_codename === '') {
            $('#codenameError').text('Please enter a code name.');
            isValid = false;
            } else {
                $('#codenameError').text('');
            }

            if (admin_username === '') {
                $('#admin_username').text('Please enter a username.');
                isValid = false;
            } else {
                $('#admin_username').text('');
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
            
                var adminData = {
                    withPass: 1,
                    admin_codename: admin_codename,
                    admin_username: admin_username,
                    password: newPassword,
                }
            } else {
                var adminData = {
                    withPass: 0,
                    admin_codename: admin_codename,
                    admin_username: admin_username,
                }
            }

            console.log(adminData['password']);
            var url = baseUrl + "/update"
    
            $('#loaderModal').removeClass('hidden');
            $.ajax ({
                type: "POST",
                url: url,
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                data: adminData,
                success: function(response) {
                    console.log(response);

                    if (response.redirect_url) {
                        
            $('#loaderModal').addClass('hidden');
                        window.location.href = response.redirect_url;
                    }
                },
                error: function(xhr, status, error) {
                        console.log('An error occurred:', error);
                    }
                })
            }
    })




    })
</script>
@endsection