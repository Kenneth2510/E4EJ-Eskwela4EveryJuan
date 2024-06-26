@extends('layouts.learner_login')

@section('content')
    {{-- MAIN --}}
    <div class="relative w-full h-screen pt-16 md:h-auto lg:h-screen lg:overflow-auto bg-mainwhitebg text-darthmouthgreen md:bg-mainwhitebg lg:w-1/2 lg:text-mainwhitebg lg:pt-24">
        <div class="p-3 text-black rounded-lg md:shadow-xl md:w-3/4 md:mx-auto md:bg-mainwhitebg lg:bg-opacity-0 lg:shadow-transparent ">

        

            <h1 class="text-4xl font-bold text-darthmouthgreen">Create New Learner Account</h1>
            <p class="mt-3 text-darthmouthgreen">Welcome, future learner! We're excited to have you join our learning community. Please provide the necessary information below to create your new account.</p>

            
<!--            <form class="pb-4 mx-4 mt-10 text-sm" action="{{ url('/learner/register') }}" method="POST" enctype="multipart/form-data">

                @csrf-->
                <div class="" id="first-form">
                    <div class="flex flex-col flex-nowrap lg:flex-row">
                        <div class="text-black FORM-CTNR lg:w-1/2 lg:mr-2">
                            <label for="learner_fname" class="text-lg text-darthmouthgreen">Firstname:</label>
                            @error('learner_fname')
                                <span class="p-1 text-sm text-red-500">
                                    {{$message}}
                                </span>
                            @enderror
                            {{-- <input class="border IN-V-INP border-darthmouthgreen" type="text" name="learner_fname" id="learner_fname" value="{{old('learner_fname')}}"> --}}
                            <input class="w-full input input-bordered"
                            type="text"
                            name="learner_fname"
                            id="learner_fname"
                            value="{{old('learner_fname')}}"
                            placeholder="First Name" 
                            />
                            <span id="firstNameError" class="text-red-500"></span>
                            
                        </div>
                        <div class=" FORM-CTNR lg:w-1/2 lg:ml-2">
                            <label for="learner_lname" class="text-lg text-darthmouthgreen">Lastname:</label>
                            @error('learner_lname')
                            <span class="p-1 text-sm text-red-500">
                                    {{$message}}
                                </span>
                            @enderror
                            {{-- <input class="border IN-V-INP border-darthmouthgreen" type="text" name="learner_lname" id="learner_lname" value="{{old('learner_lname')}}"> --}}
                            <input class="w-full input input-bordered"
                            type="text"
                            name="learner_lname"
                            id="learner_lname"
                            value="{{old('learner_lname')}}"
                            placeholder="Last Name" 
                            />
                            <span id="lastNameError" class="text-red-500"></span>
                        </div>
                    </div>
                    
                    <div class="flex flex-col lg:flex-row lg:justify-between">
                        <div class="lg:mr-2 FORM-CTNR lg:w-1/2">
                            <label for="learner_bday" class="text-lg text-darthmouthgreen">Birthday:</label>
                            @error('learner_bday')
                            <span class="p-1 text-sm text-red-500">
                                    {{$message}}
                                </span>
                            @enderror
                            {{-- <input class="border IN-V-INP border-darthmouthgreen" type="date" name="learner_bday" id="learner_bday" value="{{old('learner_bday')}}"> --}}
                            <input class="w-full input input-bordered"
                            type="date"
                            name="learner_bday"
                            id="learner_bday"
                            value="{{old('learner_bday')}}"
                            />
                            <span id="bdayError" class="text-red-500"></span>
                        </div>
                        
                        <div class="lg:ml-2 FORM-CTNR lg:w-1/2">
                            <label for="learner_gender" class="text-lg text-darthmouthgreen">Gender</label>
                            @error('learner_gender')
                            <span class="p-1 text-sm text-red-500">
                                    {{$message}}
                                </span>
                            @enderror
                            {{-- <select name="learner_gender" id="learner_gender" class="border IN-V-INP border-darthmouthgreen">
                                <option value="" {{old('learner_gender') == "" ? 'selected' : ''}} class=""></option>
                                <option value="Male" {{old('learner_gender') == "Male" ? 'selected' : ''}} class="">Male</option>
                                <option value="Female" {{old('learner_gender') == "Female" ? 'selected' : ''}} class="">Female</option>
                                <option value="Others" {{old('learner_gender') == "Others" ? 'selected' : ''}} class="">Preferred not to say</option>
                            </select> --}}
                            <select class="w-full select select-bordered"
                            name="learner_gender"
                            id="learner_gender">
                                <option value="" {{old('learner_gender') == "" ? 'selected' : ''}}>Gender</option>
                                <option value="Male" {{old('learner_gender') == "Male" ? 'selected' : ''}}>Male</option>
                                <option value="Female" {{old('learner_gender') == "Female" ? 'selected' : ''}}>Female</option>
                                <option value="Others" {{old('learner_gender') == "Others" ? 'selected' : ''}}>Preferred not to say</option>
                            </select>
                            <span id="genderError" class="text-red-500"></span>
                        </div>
                    </div>

                    <div class="FORM-CTNR">
                        <label for="learner_email" class="text-lg text-darthmouthgreen">Email:</label>
                        @error('learner_email')
                        <span class="p-1 text-sm text-red-500">
                                {{$message}}
                            </span>
                        @enderror
                        {{-- <input class="border IN-V-INP border-darthmouthgreen" type="email" name="learner_email" id="learner_email" value="{{old('learner_email')}}"> --}}
                        <input class="w-full input input-bordered"
                            type="email"
                            name="learner_email"
                            id="learner_email"
                            value="{{old('learner_email')}}"
                            placeholder="Email" 
                            />
                        <span id="emailError" class="text-red-500"></span>
                    </div>
                    <div class="FORM-CTNR">
                        <label for="learner_contactno" class="text-lg text-darthmouthgreen">Contact Number:</label>
                            @error('learner_contactno')
                        <span class="p-1 text-sm text-red-500">
                                {{$message}}
                            </span>
                        @enderror
                        {{-- <input type="tel" id="learner_contactno" maxlength="11" pattern="[0-9]{11}" name="learner_contactno" class="border IN-V-INP border-darthmouthgreen" placeholder="09" value="{{old('learner_contactno')}}"> --}}
                        <input class="w-full input input-bordered"
                            type="tel"
                            maxlength="11"
                            pattern="[0-9]{11}"
                            name="learner_contactno"
                            id="learner_contactno"
                            value="{{old('learner_contactno')}}"
                            placeholder="09" 
                            />
                        <span id="contactnoError" class="text-red-500"></span>
                    </div>
                    <div class="FORM-CTNR">
                        <label for="learner_username" class="text-lg text-darthmouthgreen">Username:</label>
                        @error('learner_username')
                        <span class="p-1 text-sm text-red-500">
                                {{$message}}
                            </span>
                        @enderror
                        {{-- <input class="border IN-V-INP border-darthmouthgreen" type="text" name="learner_username" id="learner_username" value="{{old('learner_username')}}"> --}}
                        <input class="w-full input input-bordered"
                            type="text"
                            name="learner_username"
                            id="learner_username"
                            value="{{old('learner_username')}}"
                            placeholder="User Name" 
                            />
                        <span id="usernameError" class="text-red-500"></span>
                    </div>
                    <div class="FORM-CTNR">
                        <label for="password" class="text-lg text-darthmouthgreen">Password:</label>
                        @error('password')
                        <span class="p-1 text-sm text-red-500">
                                {{$message}}
                            </span>
                        @enderror
                        {{-- <input class="border IN-V-INP border-darthmouthgreen" type="password" minlength="8" name="password" id="password"> --}}
                        <input class="w-full input input-bordered"
                            type="password"
                            name="password"
                            id="password"
                            placeholder="Password"
                            minlength="8" 
                            />
                        <span id="passwordError" class="text-red-500"></span>
                        <span id="passwordRequirements" class="text-sm text-gray-500">Password must contain at least 8 characters, including uppercase, lowercase, numbers, and special characters.</span>
                    </div>

                    <div class="text-darthmouthgreen">
                        <input type="checkbox" id="showPassword"> Show Password
                    </div>

                    <div class="FORM-CTNR">
                        <label for="password_confirmation" class="text-lg text-darthmouthgreen">Confirm Password:</label>
                        {{-- <input class="border IN-V-INP border-darthmouthgreen" type="password" name="password_confirmation" id="password_confirmation"> --}}
                        <input class="w-full input input-bordered"
                            type="password"
                            name="password_confirmation"
                            id="password_confirmation"
                            placeholder="Confirm Password" 
                            />
                        <span id="passwordConfirmationError" class="text-red-500"></span>
                    </div>

                    

                    
                    <div class="grid h-auto mt-5 text-black place-items-end" >
                        <button type="button" class="btn btn-primary" id="nxtBtn" name="Next">Next <i class="fa-solid fa-arrow-right hover:text-darthmouthgreen"></i></button>
                    </div>
                </div> 
                
                <div class="hidden overflow-hidden" id="resumeForm">
                
                    
                    <div class="px-4 mt-2 mb-2">
                

                        <h1 class="text-2xl font-bold text-darthmouthgreen">About you Business</h1>
                        <p class="mt-3 text-xs text-darthmouthgreen md:text-base">Welcome, future learner! To tailor your experience and provide the best learning opportunities, please share some details about your business with us. Your information will be kept confidential and used solely for educational purposes.</p>
        
                    </div>

                

                    <div class="mt-4 FORM-CTNR">
                        <label for="business_name" class="text-lg text-darthmouthgreen">Business Name:</label>
                        @error('business_name')
                        <span class="p-1 text-sm text-red-500">
                                {{$message}}
                            </span>
                        @enderror
                        {{-- <input class="border IN-V-INP border-darthmouthgreen" type="text" name="business_name" id="business_name" value="{{old('business_name')}}"> --}}
                        <input class="w-full input input-bordered"
                            type="text"
                            name="business_name"
                            id="business_name"
                            value="{{old('business_name')}}"
                            placeholder="Business Name" 
                            />
                        <span id="businessNameError" class="text-red-500"></span>
                    </div>

                    
                    <div class="mt-4 FORM-CTNR">
                        <label for="business_address" class="text-lg text-darthmouthgreen">Business Address:</label>
                        @error('business_address')
                        <span class="p-1 text-sm text-red-500">
                                {{$message}}
                            </span>
                        @enderror
                        {{-- <input class="border IN-V-INP border-darthmouthgreen" type="text" name="business_address" id="business_address" value="{{old('business_address')}}"> --}}
                        <input class="w-full input input-bordered"
                            type="text"
                            name="business_address"
                            id="business_address"
                            value="{{old('business_address')}}"
                            placeholder="Business Address" 
                            />
                        <span id="businessAddressError" class="text-red-500"></span>
                    </div>

                    
                    <div class="mt-4 FORM-CTNR">
                        <label for="business_owner_name" class="text-lg text-darthmouthgreen">Business Owner Name:</label>
                        @error('business_owner_name')
                        <span class="p-1 text-sm text-red-500">
                                {{$message}}
                            </span>
                        @enderror
                        {{-- <input class="border IN-V-INP border-darthmouthgreen" type="text" name="business_owner_name" id="business_owner_name" value="{{old('business_owner_name')}}"> --}}
                        <input class="w-full input input-bordered"
                            type="text"
                            name="business_owner_name"
                            id="business_owner_name"
                            value="{{old('business_owner_name')}}"
                            placeholder="Business Owner Name" 
                            />
                        <span id="businessOwnerNameError" class="text-red-500"></span>
                    </div>
                    

                    <div class="mt-4 FORM-CTNR">
                        <label for="bplo_account_number" class="text-lg text-darthmouthgreen">BPLO Account Number:</label>
                        @error('bplo_account_number')
                        <span class="p-1 text-sm text-red-500">
                                {{$message}}
                            </span>
                        @enderror
                        {{-- <input class="border IN-V-INP border-darthmouthgreen" type="text" maxlength="13" name="bplo_account_number" id="bplo_account_number" value="{{old('bplo_account_number')}}"> --}}
                        <input class="w-full input input-bordered"
                            type="text"
                            maxlength="7"
                            name="bplo_account_number"
                            id="bplo_account_number"
                            value="{{old('bplo_account_number')}}"
                            placeholder="A-00000" 
                            />
                        <span id="bploCategoryError" class="text-red-500"></span>
                    </div>

                    <div class=" FORM-CTNR">
                        <label for="business_category" class="text-lg text-darthmouthgreen">Business Category: </label>
                        @error('business_category')
                        <span class="p-1 text-sm text-red-500">
                                {{$message}}
                            </span>
                        @enderror
                        {{-- <select name="business_category" id="business_category" class="border IN-V-INP border-darthmouthgreen">
                            <option value="" {{old('business_category') == "" ? 'selected' : ''}} class=""></option>
                            <option value="Micro" {{old('business_category') == "Micro" ? 'selected' : ''}} class="">Micro</option>
                            <option value="Small" {{old('business_category') == "Small" ? 'selected' : ''}} class="">Small</option>
                            <option value="Medium" {{old('business_category') == "Medium" ? 'selected' : ''}} class="">Medium</option>
                        </select> --}}
                        <select class="w-full select select-bordered"
                        name="business_category"
                        id="business_category">
                            <option value="" {{old('business_category') == "" ? 'selected' : ''}}></option>
                            <option value="Micro" {{old('business_category') == "Micro" ? 'selected' : ''}}>Micro</option>
                            <option value="Smaill" {{old('business_category') == "Small" ? 'selected' : ''}}>Small</option>
                            <option value="Medium" {{old('business_category') == "Medium" ? 'selected' : ''}}>Medium</option>
                        </select>
                        <span id="businessCategoryError" class="text-red-500"></span>
                    </div>

                    <div class=" FORM-CTNR">
                        <label for="business_classification" class="text-lg text-darthmouthgreen">Business Classification: </label>
                        @error('business_classification')
                        <span class="p-1 text-sm text-red-500">
                                {{$message}}
                            </span>
                        @enderror
<!--                        {{-- <select name="business_classification" id="business_classification" class="border IN-V-INP border-darthmouthgreen">
                            <option value="" selected disabled>-- select an option --</option>
                            <option value="Retail">Retail</option>
                            <option value="Wholesale">Wholesale</option>
                            <option value="Food">Food</option>
                            <option value="Financial Services">Financial Services</option>
                            <option value="Real Estate">Real Estate</option>
                            <option value="Transportation and Logistics">Transportation and Logistics</option>
                            <option value="Technology">Technology</option>
                            <option value="Healthcare">Healthcare</option>
                            <option value="Education and Training">Education and Training</option>
                            <option value="Entertainment and Media">Entertainment and Media</option>
                            <option value="Hospitality and Tourism">Hospitality and Tourism</option>
                            <option value="Others">Others</option>
                        </select> --}}-->
                        
                        <select id="business_classification" name="business_classification" class="w-full select select-bordered">
          <!--                  <option value="" selected disabled>-- select an option --</option>
                            <option value="Retail">Retail</option>
                            <option value="Wholesale">Wholesale</option>
                            <option value="Food">Food</option>
                            <option value="Financial Services">Financial Services</option>
                            <option value="Real Estate">Real Estate</option>
                            <option value="Transportation and Logistics">Transportation and Logistics</option>
                            <option value="Technology">Technology</option>
                            <option value="Healthcare">Healthcare</option>
                            <option value="Education and Training">Education and Training</option>
                            <option value="Entertainment and Media">Entertainment and Media</option>
                            <option value="Hospitality and Tourism">Hospitality and Tourism</option>
                            <option value="Others">Others</option>
                            -->
                            
                            <option value="" {{old('business_classification') == "" ? 'selected' : ''}}></option>
                            <option value="Micro" {{old('business_classification') == "Retail" ? 'selected' : ''}}>Retail</option>
                            <option value="Smaill" {{old('business_classification') == "Wholesale" ? 'selected' : ''}}>Wholesale</option>
                            <option value="Medium" {{old('business_classification') == "Food" ? 'selected' : ''}}>Food</option>
                            <option value="Medium" {{old('business_classification') == "Financial Services" ? 'selected' : ''}}>Financial Services</option>
                            <option value="Medium" {{old('business_classification') == "Real Estate" ? 'selected' : ''}}>Real Estate</option>
                            <option value="Medium" {{old('business_classification') == "Transportation and Logistics" ? 'selected' : ''}}>Transportation and Logistics</option>
                            <option value="Medium" {{old('business_classification') == "Technology" ? 'selected' : ''}}>Technology</option>
                            <option value="Medium" {{old('business_classification') == "Healthcare" ? 'selected' : ''}}>Healthcare</option>
                            <option value="Medium" {{old('business_classification') == "Education and Training" ? 'selected' : ''}}>Education and Training</option>
                            <option value="Medium" {{old('business_classification') == "Entertainment and Media" ? 'selected' : ''}}>Entertainment and Media</option>
                            <option value="Medium" {{old('business_classification') == "Hospitality and Tourism" ? 'selected' : ''}}>Hospitality and Tourism</option>
                            <option value="Medium" {{old('business_classification') == "Others" ? 'selected' : ''}}>Others</option>
                        </select>
                        <span id="businessClassificationError" class="text-red-500"></span>
                    </div>

                    <div class=" FORM-CTNR">
                        <label for="business_description" class="text-lg text-darthmouthgreen">Business Description</label><br>
                        {{-- <textarea name="business_description" class="w-full px-5 py-1 border-2 rounded-lg h-36 border-darthmouthgreen text-darthmouthgreen" id="business_description"></textarea> --}}
                        <textarea class="textarea textarea-bordered h-36"
                        name="business_description"
                        id="business_description"
                        placeholder="Business Description"></textarea>
                        <span id="businessDescriptionError" class="text-red-500"></span>
                    </div>

                    <div class="">

                        <div class="grid h-auto my-10 text-black place-items-end" >
                            <div class="flex space-x-2" >

                                <button type="button" class="btn btn-ghost" id="prevBtn" name="Back"><i class="fa-solid fa-arrow-left hover:text-darthmouthgreen"></i>Back</button>
                                <button type="button" class="btn btn-primary" id="nxtBtn2" name="Next">Next <i class="fa-solid fa-arrow-right hover:text-darthmouthgreen"></i></button>
                            </div>
                            
                        </div>
                    </div>
                </div>


                <div class="hidden overflow-hidden" id="security_code">
        
                    <div class="px-4 mt-4">
                        <h1 class="text-2xl font-bold text-darthmouthgreen">Set your Security Code</h1>
                        <p class="mt-3 text-xs text-darthmouthgreen md:text-base">Secure your account by setting a unique security code. This code will add an extra layer of protection to your account, ensuring that only you can access sensitive information. Please choose a memorable code that combines numbers and letters to maximize security.</p>

                    </div>

                <div class="flex items-center pb-4 my-8 ml-5 font-semibold text-black border-b-2 security-code-container">
                        <label for="learner_security_code" class="text-xl text-darthmouthgreen">Security Code:</label>
                        <input class="code mx-1 h-16 text-center shadow outline-none focus:ring-black focus:ring-[1px]" type="password" name="security_code_1" id="security_code_1" maxlength="1" size="1" min="0" max="9" pattern="{0-9}{1}" autofocus>
                        <input class="code h-16 mx-1 text-center shadow outline-none focus:ring-black focus:ring-[1px]" type="password" name="security_code_2" id="security_code_2" maxlength="1" size="1" min="0" max="9" pattern="{0-9}{1}">
                        <input class="code h-16 mx-1 text-center shadow outline-none focus:ring-black focus:ring-[1px]" type="password" name="security_code_3" id="security_code_3" maxlength="1" size="1" min="0" max="9" pattern="{0-9}{1}">
                        <input class="code h-16 mx-1 text-center shadow outline-none focus:ring-black focus:ring-[1px]" type="password" name="security_code_4" id="security_code_4" maxlength="1" size="1" min="0" max="9" pattern="{0-9}{1}">
                        <input class="code h-16 mx-1 text-center shadow outline-none focus:ring-black focus:ring-[1px]" type="password" name="security_code_5" id="security_code_5" maxlength="1" size="1" min="0" max="9" pattern="{0-9}{1}">
                        <input class="code h-16 mx-1 text-center shadow outline-none focus:ring-black focus:ring-[1px]" type="password" name="security_code_6" id="security_code_6" maxlength="1" size="1" min="0" max="9" pattern="{0-9}{1}">

                        <span id="securityCodeError" class="text-red-500"></span>
                        
                        <script>
                        
                            const inputFields = document.querySelectorAll('.security-code-container .code');
                            inputFields.forEach((input, index) => {
                                input.addEventListener('input', (event) => {
        
                                if (event.target.value !== '' && index < inputFields.length - 1) {
                                    inputFields[index + 1].focus();
                                }
                            });
                        });

                        </script>
                    </div>
                    @error('security_code_1')
                        <span class="p-1 text-sm text-red-500">
                                    {{$message}}
                                </span>
                        @enderror
                        @error('security_code_2')
                        <span class="p-1 text-sm text-red-500">
                                    {{$message}}
                                </span>
                        @enderror
                        @error('security_code_3')
                        <span class="p-1 text-sm text-red-500">
                                    {{$message}}
                                </span>
                        @enderror
                        @error('security_code_4')
                        <span class="p-1 text-sm text-red-500">
                                    {{$message}}
                                </span>
                        @enderror
                        @error('security_code_5')
                        <span class="p-1 text-sm text-red-500">
                                    {{$message}}
                                </span>
                        @enderror
                        @error('security_code_6')
                        <span class="p-1 text-sm text-red-500">
                                    {{$message}}
                                </span>
                        @enderror
                

                    <div class="">
                        {{-- <div class="flex flex-row">
                            <input class="mx-2" type="checkbox" name="" id="" required>
                            <p class="text-sm text-darthmouthgreen">I've read and accept <span class="font-bold text-darthmouthgreen"><a href="">Terms & Condition</a></span></p>
                        </div> --}}
                        
                        <div class="grid h-auto mt-5 text-black place-items-end" >
                            <div class="flex space-x-2">
                    
                                <button type="button" class="btn btn-ghost" id="prevBtn2" name="Back"><i class="fa-solid fa-arrow-left hover:text-darthmouthgreen"></i>Back</button>
                                {{-- <button class="px-5 py-3 mx-2 text-xl text-white rounded-xl bg-darthmouthgreen hover:bg-white hover:text-darthmouthgreen hover:border-darthmouthgreen hover:border-2" id="register_submit_btn" type="button" name="Create my account">Create my account</button> --}}
                                <button type="button" class="btn btn-primary" onclick="terms_condition.showModal()">Create my account</button>
                            </div>
                        </div>
                    </div>
                </div>

            <!--{{-- </form> --}}-->

            <div class="py-10 mx-auto text-sm w-max md:text-base">

                <p class="text-darthmouthgreen md:text-darthmouthgreen">Already have an account?
                    <span class="font-bold text-darthmouthgreen md:text-darthmouthgreen">
                        <a href="{{ url('/learner') }}">
                            Sign in
                        </a>
                    </span>
                </p>
            </div>
        </div>
    </div>

    {{-- modal here --}}
    <!-- Open the modal using ID.showModal() method -->

    <dialog id="terms_condition" class="modal">
        <div class=" modal-box">
            <h1 class="text-xl font-bold md:text-3xl">Terms & Conditions</h1>
        <div class="overflow-auto h-52">
            <div class="my-4 space-y-4 text-center">
                <p>Read our terms & condition below to learn more about your rights and responsibilities as an <span class="font-medium text-darthmouthgreen">Eskwela4EveryJuan</span> user.</p>
            </div>
            {{-- contents --}}
            <div class="space-y-4 text-left">
                <h3>Updated March 2024</h3>
                
                <p><strong>Acceptance of Terms:</strong> By registering for the Learning Management System (LMS), you agree to abide by these Terms and Conditions, which govern your use of the platform. These terms constitute a binding agreement between you and the LMS provider.</p>
            
                <p><strong>Registration:</strong> You must provide accurate and complete information during the registration process. You are responsible for maintaining the confidentiality of your account credentials and for all activities that occur under your account.</p>

                <p><strong>Access and Use:</strong> Access to the LMS is granted solely for educational and informational purposes. You agree not to use the platform for any unlawful or prohibited activities, including but not limited to distributing, transmitting, or storing any material that violates applicable laws or infringes upon the rights of others.</p>

                <p><strong>Intellectual Property:</strong> All content provided on the LMS, including but not limited to text, graphics, logos, images, and software, is the property of the LMS provider or its licensors and is protected by intellectual property laws. You may not reproduce, modify, distribute, or publicly display any content from the platform without prior written consent.</p>

                <p><strong>Privacy:</strong> The LMS provider is committed to protecting your privacy. Please refer to the Privacy Policy for information on how your personal data is collected, used, and disclosed.</p>

                <p><strong>Termination:</strong> The LMS provider reserves the right to suspend or terminate your access to the platform at any time, with or without cause, and without prior notice. Upon termination, your account and any associated data may be permanently deleted.</p>

                <p><strong>Modifications:</strong> The LMS provider reserves the right to modify or update these Terms and Conditions at any time, without prior notice. Your continued use of the platform after any such changes constitutes acceptance of the revised terms.</p>

                <p><strong>Governing Law:</strong> These Terms and Conditions shall be governed by and construed in accordance with the laws of [Jurisdiction], without regard to its conflict of law provisions.</p>
            </div>
        </div>
            <div class=" modal-action">
                <form method="dialog">
                    <!-- if there is a button in form, it will close the modal -->
                    <button class="btn">Close</button>
                    <button type="button" class="btn btn-primary" onclick="privacy_statement.showModal()">Next</button>
                </form>
            </div>
        </div>
    </dialog>

    <dialog id="privacy_statement" class="modal">
        <div class="modal-box">
            <h3 class="text-xl font-bold md:text-3xl">Data Privacy Statement</h3>
            <div class="overflow-auto h-52">
                <div class="space-y-6">
                    <h3 class="font-bold text-primary">Updated March 2024</h3>

                    <div class="space-y-2 ">
                    <h1 class="text-xl font-bold md:text-3xl text-primary">Data Protection</h1>
                    <p>We will use reasonable and suitable organizational, physical, and technical security measures to protect the personal data we collect. The security measures must seek to ensure the availability, integrity, and confidentiality of personal data and are meant to protect personal data from accidental or unlawful destruction, alteration, and disclosure, as well as any other unlawful processing. We only allow authorized people to access or process your data, and they keep such information strictly confidential. We restrict access to information to anyone who would like to know/obtain such information without a valid reason. Any data security incident or breach discovered by Eskwela4EveryJuan shall be recorded and disclosed in accordance with applicable laws. Eskwela4EveryJuan will take all necessary and reasonable actions to rectify the event or breach and reduce its negative consequences. If there is a strong suspicion that an incident involves your personal information, Eskwela4EveryJuan will tell you immediately.</p>

                    <i class="text-sm">(Gagamit kami ng makatwiran at angkop na mga hakbang sa seguridad na organisasyonal, pisikal, at teknikal upang protektahan ang personal na datos na aming kinokolekta. Ang mga hakbang sa seguridad ay dapat na naglalayong tiyakin ang pagkakaroon, integridad, at kompidensyalidad ng personal na data at layuning protektahan ang personal na data mula sa aksidenteng o labag sa batas na pagkasira, pagbabago, at pagsisiwalat, pati na rin ang anumang iba pang labag sa batas na pagproseso. Pinapayagan lamang namin ang mga awtorisadong tao na magkaroon ng access o magproseso ng iyong data, at mahigpit nilang pinananatiling kompidensyal ang nasabing impormasyon. Nililimitahan namin ang access sa impormasyon sa sinumang nais malaman/makakuha ng naturang impormasyon nang walang balidong dahilan. Anumang insidente ng seguridad sa data o paglabag na natuklasan ng Eskwela4EveryJuan ay irerecord at isiwalat alinsunod sa naaangkop na mga batas. Gagawin ng Eskwela4EveryJuan ang lahat ng kinakailangan at makatwirang aksyon upang ayusin ang pangyayari o paglabag at bawasan ang mga negatibong kahihinatnan nito. Kung may hinala na ang isang insidente ay kasangkot ang iyong personal na impormasyon, agad na ipapaalam sa Eskwela4EveryJuan.)</i>
                    </div>
                    
                    <div class="space-y-2 ">
                    <h1 class="text-xl font-bold md:text-3xl text-primary">Right to Privacy</h1>
                    <p>According to the law, you are to object to the use of your personal data, request access to your personal information, and/or have it amended, erased, or blocked on legitimate grounds. For more information on your rights as a data subject, please contact our Data Privacy Officer at (+632 988 3100 or +6346 481 8000 local 1464) or the National Privacy Commission at <a class="link link-primary" href="https://privacy.gov.ph/">https://privacy.gov.ph/</a>. Eskwela4EveryJuan will review your request and reserve the right to handle the case in line with the law.</p>
                    <i class="text-sm">(Ayon sa batas, may karapatan kang tumutol sa paggamit ng iyong personal na data, humiling ng access sa iyong personal na impormasyon, at/o ipaayos, burahin, o harangan ito sa lehitimong mga dahilan. Para sa karagdagang impormasyon tungkol sa iyong mga karapatan bilang isang subject ng data, mangyaring makipag-ugnayan sa aming Opisyal ng Proteksyon ng Data sa (+632 988 3100 o +6346 481 8000 lokal 1464) o sa National Privacy Commission sa <a class="link link-primary" href="https://privacy.gov.ph/">https://privacy.gov.ph/</a>. Sisiyasatin ng Eskwela4EveryJuan ang iyong kahilingan at may karapatan na hawakan ang kaso alinsunod sa batas.)</i>
                    </div>
                    
                    <div class="space-y-2 ">
                    <h1 class="text-xl font-bold md:text-3xl text-primary">Consent</h1>
                    <p>I have read this form, understand its contents, and agree to the processing of my personal information. I understand that my consent does not prohibit the existence of additional conditions for the lawful processing of personal data, nor does it waive any of my rights under the Data Privacy Act of 2012 or other applicable legislation.</p>
                    <i class="text-sm">(Nabasa ko ang form na ito, nauunawaan ko ang mga nilalaman nito, at sumasang-ayon ako sa pagproseso ng aking personal na impormasyon. Nauunawaan ko na ang aking pagsang-ayon ay hindi nagbabawal sa pagkakaroon ng karagdagang mga kondisyon para sa legal na pagproseso ng personal na data, ni hindi ito nagwawaksi ng alinman sa aking mga karapatan sa ilalim ng Data Privacy Act ng 2012 o iba pang naaangkop na batas.)</i>
                    </div>
                </div>
            </div>
            <div class="flex flex-row py-2">
                <input class="mx-2" type="checkbox" name="" id="" required>
                <p class="text-sm text-darthmouthgreen">I've read and accept <span class="font-bold text-darthmouthgreen">Terms & Condition and Privacy Statement<span></p>
            </div>
            <div class="modal-action">
                <form method="dialog">
                    <!-- if there is a button in form, it will close the modal -->
                    <button class="btn btn-ghost" onclick="terms_condition.showModal()">Back</button>
                    <button class="btn btn-primary"
                    id="register_submit_btn"
                    type="button"
                    name="Create my account">
                    Submit
                    </button>
                </form>
                <!--</form>-->
            </div>
        </div>
    </dialog>

        
            
    {{-- MAIN LEFT --}}
    <div class="relative hidden h-screen bg-seagreen md:w-1/2 lg:block">
        {{-- IMAGE HOLDER --}}
        <div class="relative w-full h-full overflow-hidden rounded-lg">
            {{-- img-1 --}}
            <div class="hidden slides" id="slide1">
                <img src="{{asset('/images/ins-login-img1.png')}}" class="absolute block -translate-x-1/2 -translate-y-1/2 top-1/3 left-1/2" alt="image-1">
                <div class="absolute block text-center -translate-x-1/2 top-3/4 left-1/2">
                    <h1 class="text-2xl font-bold text-white">Maintain your Business</h1>
                    <p class="text-base text-white">Never stop learning! Eskwela4EveryJuan provides personalized learning with a friendly chatbot. What are you waiting for? </p>
                </div>
                
            </div>
            {{-- img-2 --}}
            <div class="hidden slides" id="slide2">
                <img src="{{asset('/images/ins-login-img2.png')}}" class="absolute block -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="image-2">
                <div class="absolute block text-center -translate-x-1/2 top-3/4 left-1/2">
                    <h1 class="text-2xl font-bold text-white">Knowledge is Power!</h1>
                    <p class="text-base text-white">Want to gain more assets? Or do you want to be an asset yourself? We got you! A flexible Learning Management System is all you need.</p>
                </div>
            </div>
            {{-- img-3 --}}
            <div class="hidden slides" id="slide3">
                <img src="{{asset('/images/ins-login-img3.png')}}" class="absolute block -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="image-3">
                <div class="absolute block text-center -translate-x-1/2 top-3/4 left-1/2">
                    <h1 class="text-2xl font-bold text-white">Improvement is the Goal</h1>
                    <p class="text-base text-white">All you need to do is create an account and complete the course! More completed courses mean more certificates.</p>
                </div>
            </div>
        </div>

        {{-- BOTTOM BUTTONS --}}
        <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2" id="carouselBtn">
            <button type="button" class="w-2 h-2 rounded-full bg-slate-200" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" class="w-2 h-2 rounded-full bg-slate-200" aria-current="true" aria-label="Slide 2"></button>
            <button type="button" class="w-2 h-2 rounded-full bg-slate-200" aria-current="true" aria-label="Slide 3"></button>
        </div>
        
        <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" id="l-prevBtn">
            <span class="inline-flex items-center justify-center w-10 h-10 bg-white rounded-full dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                </svg>
                <span class="sr-only">Previous</span>
            </span>
        </button>

        <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" id="l-nextBtn">
            <span class="inline-flex items-center justify-center w-10 h-10 bg-white rounded-full dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <span class="sr-only">Next</span>
            </span>
        </button>
    </div>
@endsection
