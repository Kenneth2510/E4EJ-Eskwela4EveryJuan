@include('partials.header')

<section class="flex flex-row w-screen text-sm main-container bg-mainwhitebg md:text-base">
@include('partials.sidebar')




<section class="w-screen px-2 pt-[40px] mx-2 mt-2  overscroll-auto md:overflow-auto">
    <div class="flex justify-between px-10">
        <h1 class="text-6xl font-bold text-darthmouthgreen">Reports</h1>
        <div class="">
            <p class="text-xl font-semibold text-darthmouthgreen">{{$admin->admin_codename}}</p>
        </div>
    </div>

    <div class="" id="mainContainer">
        <div class="mt-10">
            <h1 class="mx-5 text-2xl font-semibold">Choose Category</h1>
            <hr class="my-3 border-t-2 border-gray-300">    
        </div>


        
        <div class="flex w-full">

            <div class="w-3/12 mt-10" id="reportCategoryArea">
                <select class="w-4/5 px-5 py-3 text-xl border border-darthmouthgreen rounded-xl" name="reportCategory" id="reportCategory">
                    <option value="" selected disabled>--choose category--</option>
                    <option value="LearnerList">List of Learners</option>
                    <option value="SelectedLearner">View Selected Learner</option>
                    <option value="InstructorList">List of Instructors</option>
                    <option value="SelectedInstructor">View Selected Instructor</option>
                    <option value="Session">Session Logs</option>
                    <option value="UserSession">User Session Logs</option>
                    <option value="Courses">List of Courses</option>
                    <option value="SelectedCourse">View Selected Course</option>
                    <option value="Enrollees">List of Course Enrollees</option>
                    <option value="CourseGradesheets">Course Gradesheets</option>
                    <option value="LearnerGradesheets">Learner Gradesheets</option>
                </select>
            </div>

        
            <div class="w-6/12 " id="selectedReportSubCategoryArea">
                
                <div class="hidden mt-5 " id="listLearnerArea">
                    <h1 class="text-4xl font-semibold text-darthmouthgreen">List of Learners</h1>
                    <form action="{{ url('admin/reports/list/learners') }}"  method="GET">

                        <div class="mt-5" id="learnerStatusArea">
                            <h1 class="text-xl font-semibold">Choose Status</h1>
                            <select class="w-4/5 px-5 py-3 text-xl border border-darthmouthgreen rounded-xl" name="learnerStatus" id="learnerStatus">
                                <option value="" selected>ALL</option>
                                <option value="Pending">Pending</option>
                                <option value="Approved">Approved</option>
                                <option value="Rejected">Rejected</option>
                            </select>
                        </div>

                            
                        <div class="mt-5" id="learnerDateTimeArea">
                            <h1 class="text-xl font-semibold">Filter By Date</h1>
                            <input type="checkbox" name="learnerSelectedDayCheck" id="learnerSelectedDayCheck">
                            <label for="learnerSelectedDayCheck" class="text-lg">Filter by Date</label><br>
                            <div class="hidden" id="enable_customDate">
                                <label for="learnerDateStart">Start Date</label>
                                <input type="date" class="w-1/5 px-3 py-2 mx-5 border border-darthmouthgreen rounded-xl " name="learnerDateStart" id="learnerDateStart">
                                
                                <label for="learnerDateFinish">Until</label>
                                <input type="date" class="w-1/5 px-3 py-2 mx-5 border border-darthmouthgreen rounded-xl " name="learnerDateFinish" id="learnerDateFinish">
                            </div>

                            <span id="" class="hidden text-gray-600 note_time text-md">the time will be 00:00</span>
                        </div>

                        <div class="mt-5" id="learnerNameArea">
                            <h1 class="text-xl font-semibold">Filter By Name</h1>
                            <input type="checkbox" name="userNameCheck" id="userNameCheck">
                            <label for="userNameCheck" class="text-lg">Filter by Name</label><br>
                            <div class="hidden" id="enable_customName">
                                <label for="userLearnerFname">First Name</label>
                                <input type="text" class="w-1/5 px-3 py-2 mx-5 border border-darthmouthgreen rounded-xl " name="userLearnerFname" id="userLearnerFname">
                                <label for="userLearnerLname">Last Name</label>
                                <input type="text" class="w-1/5 px-3 py-2 mx-5 border border-darthmouthgreen rounded-xl " name="userLearnerLname" id="userLearnerLname">
                            </div>
                        </div>
                        
                        
                        <div class="mt-5" id="customFiltersArea">
                            
                            <h1 class="text-xl font-semibold">Custom Filters</h1>
                            <input type="checkbox" name="learnerCustomCheck" id="learnerCustomCheck">
                            <label for="learnerCustomCheck" class="text-lg">Use Custom Filters</label><br>

                            <div class="hidden mx-5" id="learnerCustomFilters_EnabledArea">
                                <h1 class="text-xl font-semibold">Filter By Gender</h1>
                                <input type="checkbox" name="learnerCustomGenderCheck" id="learnerCustomGenderCheck">
                                <label for="learnerCustomGenderCheck" class="text-lg">Filter Gender</label><br>
                                <div class="hidden" id="enabled_customGender">
                                    <h1 class="text-xl font-semibold">Choose Gender</h1>
                                    <select class="w-4/5 px-5 py-3 text-xl border border-darthmouthgreen rounded-xl" name="learnerGender" id="learnerGender">
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Others">Others</option>
                                    </select>
                                </div>



                                <h1 class="text-xl font-semibold">Filter By Birthday</h1>
                                <input type="checkbox" name="learnerCustomBdayCheck" id="learnerCustomBdayCheck">
                                <label for="learnerCustomBdayCheck" class="text-lg">Filter Birthday</label><br>
                                <div class="hidden" id="enabled_customBirthday">
                                    <label for="learnerBday">Select Date</label>
                                    <input type="date" class="w-1/5 px-3 py-2 mx-5 border border-darthmouthgreen rounded-xl " name="learnerBday" id="learnerBday">
                                    
                                </div>
                            </div>

                        </div>

                        <div class="mt-5" id="selectToDisplayArea">
                            <h1 class="text-xl font-semibold">Display Type</h1>
                            <select class="w-4/5 px-5 py-3 text-xl border border-darthmouthgreen rounded-xl" name="displayType" id="displayType">
                                <option value="Default">Default</option>
                                <option value="Custom">Custom</option>
                            </select>
                        </div>

                        <div class="hidden mx-5" id="customDisplay_enabled">
                            <h1 class="text-xl font-semibold">Choose what to display:</h1>
                            <div class="mt-3">
                                <input type="checkbox" name="disp_name" id="disp_name">
                                <label for="disp_name" class="text-lg">Name</label><br>

                                
                                <input type="checkbox" name="disp_contact" id="disp_contact">
                                <label for="disp_contact" class="text-lg">Contact</label><br>

                                
                                <input type="checkbox" name="disp_gender" id="disp_gender">
                                <label for="disp_gender" class="text-lg">Gender</label><br>

                                
                                <input type="checkbox" name="disp_bday" id="disp_bday">
                                <label for="disp_bday" class="text-lg">Birthday</label><br>

                                
                                <input type="checkbox" name="disp_date_created" id="disp_date_created">
                                <label for="disp_date_created" class="text-lg">Date Created</label><br>

                                
                                <input type="checkbox" name="disp_status" id="disp_status">
                                <label for="disp_status" class="text-lg">Status</label><br>

                                
                                <input type="checkbox" name="disp_business_name" id="disp_business_name">
                                <label for="disp_business_name" class="text-lg">Business Name</label><br>

                                
                                <input type="checkbox" name="disp_business_address" id="disp_business_address">
                                <label for="disp_business_address" class="text-lg">Business Address</label><br>

                                
                                <input type="checkbox" name="disp_account_number" id="disp_account_number">
                                <label for="disp_account_number" class="text-lg">Account Number</label><br>

                                
                                <input type="checkbox" name="disp_category" id="disp_category">
                                <label for="disp_category" class="text-lg">Busines Category</label><br>

                                
                                <input type="checkbox" name="disp_business_classification" id="disp_business_classification">
                                <label for="disp_business_classification" class="text-lg">Business Classification</label><br>
                            </div>
                        </div>


                        <div class="w-3/12 mt-10" id="generateArea">
                            <button type="submit" id="generateBtn" class="px-5 py-3 text-xl text-white bg-darthmouthgreen rounded-xl hover:bg-white hover:text-darthmouthgreen hover:border hover:border-darthmouthgreen">Generate Report</button>
                        </div>
                    </form>

                </div>


                <div class="hidden mt-5 " id="selectedLearnerArea">
                    <h1 class="text-4xl font-semibold text-darthmouthgreen">Selected Learner</h1>
                    <form action="{{ url('admin/reports/select/learner') }}"  method="GET">
                        
                        <div class="" id="searchLearnerArea">
                            <label for="searchLearner" class="text-xl font-semibold">Filter Learner by Name</label>
                            <input type="text" class="w-4/5 px-5 py-3 text-xl border border-darthmouthgreen rounded-xl searchLearner" name="searchLearner" id="">
                        </div>

                        <div class="mt-5" id="selectLearnerArea">
                            <h1 class="text-xl font-semibold">Choose Learner</h1><br>
                            <select class="w-4/5 px-5 py-3 text-xl border border-darthmouthgreen rounded-xl selectLearner" name="selectLearner" id="">
                                <option value="" selected disabled>--choose user--</option>
                            </select>
                        </div>

                        <div class="w-3/12 mt-10" id="generateArea">
                            <button type="submit" id="generateBtn" class="px-5 py-3 text-xl text-white bg-darthmouthgreen rounded-xl hover:bg-white hover:text-darthmouthgreen hover:border hover:border-darthmouthgreen">Generate Report</button>
                        </div>
                    </form>

                </div>


                <div class="hidden mt-5 " id="listInstructorArea">
                    <h1 class="text-4xl font-semibold text-darthmouthgreen">List of Instructors</h1>
                    <form action="{{ url('admin/reports/list/instructors') }}"  method="GET">
                        
                        
                        <div class="mt-5" id="instructorStatusArea">
                            <h1 class="text-xl font-semibold">Choose Status</h1>
                            <select class="w-4/5 px-5 py-3 text-xl border border-darthmouthgreen rounded-xl" name="instructorStatus" id="instructorStatus">
                                <option value="" selected>ALL</option>
                                <option value="Pending">Pending</option>
                                <option value="Approved">Approved</option>
                                <option value="Rejected">Rejected</option>
                            </select>
                        </div>

                            
                        <div class="mt-5" id="instructorDateTimeArea">
                            <h1 class="text-xl font-semibold">Filter By Date</h1>
                            <input type="checkbox" name="instructorSelectedDayCheck" id="instructorSelectedDayCheck">
                            <label for="instructorSelectedDayCheck" class="text-lg">Filter by Date</label><br>
                            <div class="hidden" id="instructor_enable_customDate">
                                <label for="instructorDateStart">Start Date</label>
                                <input type="date" class="w-1/5 px-3 py-2 mx-5 border border-darthmouthgreen rounded-xl " name="instructorDateStart" id="instructorDateStart">
                                
                                <label for="instructorDateFinish">Until</label>
                                <input type="date" class="w-1/5 px-3 py-2 mx-5 border border-darthmouthgreen rounded-xl " name="instructorDateFinish" id="instructorDateFinish">
                            </div>

                            <span id="" class="hidden text-gray-600 note_time text-md">the time will be 00:00</span>
                        </div>

                        <div class="mt-5" id="instructorNameArea">
                            <h1 class="text-xl font-semibold">Filter By Name</h1>
                            <input type="checkbox" name="instructorNameCheck" id="instructorNameCheck">
                            <label for="instructorNameCheck" class="text-lg">Filter by Name</label><br>
                            <div class="hidden" id="instructor_enable_customName">
                                <label for="userInstructorFname">First Name</label>
                                <input type="text" class="w-1/5 px-3 py-2 mx-5 border border-darthmouthgreen rounded-xl " name="userInstructorFname" id="userInstructorFname">
                                <label for="userInstructorLname">Last Name</label>
                                <input type="text" class="w-1/5 px-3 py-2 mx-5 border border-darthmouthgreen rounded-xl " name="userInstructorLname" id="userInstructorLname">
                            </div>
                        </div>
                        
                        
                        <div class="mt-5" id="customFiltersArea">
                            
                            <h1 class="text-xl font-semibold">Custom Filters</h1>
                            <input type="checkbox" name="learnerCustomCheck" id="instructorCustomCheck">
                            <label for="instructorCustomCheck" class="text-lg">Use Custom Filters</label><br>

                            <div class="hidden mx-5" id="instructorCustomFilters_EnabledArea">
                                <h1 class="text-xl font-semibold">Filter By Gender</h1>

                                <input type="checkbox" name="instructorCustomGenderCheck" id="instructorCustomGenderCheck">
                                <label for="instructorCustomGenderCheck" class="text-lg">Filter Gender</label><br>
                                <div class="hidden" id="instructor_enabled_customGender">
                                    <h1 class="text-xl font-semibold">Choose Gender</h1>
                                    <select class="w-4/5 px-5 py-3 text-xl border border-darthmouthgreen rounded-xl" name="instructorGender" id="instructorGender">
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Others">Others</option>
                                    </select>
                                </div>



                                <h1 class="text-xl font-semibold">Filter By Birthday</h1>
                                <input type="checkbox" name="instructorCustomBdayCheck" id="instructorCustomBdayCheck">
                                <label for="instructorCustomBdayCheck" class="text-lg">Filter Birthday</label><br>
                                <div class="hidden" id="instructor_enabled_customBirthday">
                                    <label for="instructorBday">Select Date</label>
                                    <input type="date" class="w-1/5 px-3 py-2 mx-5 border border-darthmouthgreen rounded-xl " name="instructorBday" id="instructorBday">
                                    
                                </div>
                            </div>

                        </div>

                        <div class="mt-5" id="selectToDisplayArea">
                            <h1 class="text-xl font-semibold">Display Type</h1>
                            <select class="w-4/5 px-5 py-3 text-xl border border-darthmouthgreen rounded-xl" name="instructor_displayType" id="instructor_displayType">
                                <option value="Default">Default</option>
                                <option value="Custom">Custom</option>
                            </select>
                        </div>

                        <div class="hidden mx-5" id="instructor_customDisplay_enabled">
                            <h1 class="text-xl font-semibold">Choose what to display:</h1>
                            <div class="mt-3">
                                <input type="checkbox" name="disp_name" id="disp_name">
                                <label for="disp_name" class="text-lg">Name</label><br>

                                
                                <input type="checkbox" name="disp_contact" id="disp_contact">
                                <label for="disp_contact" class="text-lg">Contact</label><br>

                                
                                <input type="checkbox" name="disp_gender" id="disp_gender">
                                <label for="disp_gender" class="text-lg">Gender</label><br>

                                
                                <input type="checkbox" name="disp_bday" id="disp_bday">
                                <label for="disp_bday" class="text-lg">Birthday</label><br>

                                
                                <input type="checkbox" name="disp_date_created" id="disp_date_created">
                                <label for="disp_date_created" class="text-lg">Date Created</label><br>

                                
                                <input type="checkbox" name="disp_status" id="disp_status">
                                <label for="disp_status" class="text-lg">Status</label><br>
                            </div>
                        </div>
                        
                        <div class="w-3/12 mt-10" id="generateArea">
                            <button type="submit" id="generateBtn" class="px-5 py-3 text-xl text-white bg-darthmouthgreen rounded-xl hover:bg-white hover:text-darthmouthgreen hover:border hover:border-darthmouthgreen">Generate Report</button>
                        </div>
                    </form>

                </div>


                <div class="hidden mt-5 " id="selectedInstructorArea">
                    <h1 class="text-4xl font-semibold text-darthmouthgreen">Selected Instructor</h1>
                    <form action="{{ url('admin/reports/select/instructor') }}"  method="GET">
                        

                        <div class="" id="searchInstructorArea">
                            <label for="searchInstructor" class="text-xl font-semibold">Filter Instructor by Name</label>
                            <input type="text" class="w-4/5 px-5 py-3 text-xl border border-darthmouthgreen rounded-xl searchInstructor" name="searchInstructor" id="">
                        </div>

                        <div class="mt-5" id="selectInstructorArea">
                            <h1 class="text-xl font-semibold">Choose Instructor</h1><br>
                            <select class="w-4/5 px-5 py-3 text-xl border border-darthmouthgreen rounded-xl selectInstructor" name="selectInstructor" id="">
                                <option value="" selected disabled>--choose user--</option>
                            </select>
                        </div>

                        <div class="w-3/12 mt-10" id="generateArea">
                            <button type="submit" id="generateBtn" class="px-5 py-3 text-xl text-white bg-darthmouthgreen rounded-xl hover:bg-white hover:text-darthmouthgreen hover:border hover:border-darthmouthgreen">Generate Report</button>
                        </div>
                    </form>
                </div>


                <div class="hidden mt-5 " id="sessionLogsArea">
                    <h1 class="text-4xl font-semibold text-darthmouthgreen">Session Logs</h1>
                    <form action="{{ url('admin/reports/list/session') }}"  method="GET">
                        

                        <div class="mt-5" id="userCategoryArea">
                            <h1 class="text-xl font-semibold">Choose Category</h1>
                            <select class="w-4/5 px-5 py-3 text-xl border border-darthmouthgreen rounded-xl" name="userCategory" id="userCategory">
                                <option value="ALL" selected>ALL Users</option>
                                <option value="Learners">Learners</option>
                                <option value="Instructors">Instructors</option>
                            </select>
                        </div>

                        <div class="mt-5" id="userDateTimeArea">
                            <input type="checkbox" name="userSelectedDayCheck" id="sessionUserSelectedDayCheck">
                            <label for="sessionUserSelectedDayCheck" class="text-lg">Custom Time</label><br>

                            <div class="hidden" id="session_enable_customDate">
                                <label for="sessionDateStart">Start Date</label>
                                <input type="date" class="w-1/5 px-3 py-2 mx-5 border border-darthmouthgreen rounded-xl " name="sessionDateStart" id="sessionDateStart">
                                
                                <label for="sessionDateFinish">Until</label>
                                <input type="date" class="w-1/5 px-3 py-2 mx-5 border border-darthmouthgreen rounded-xl " name="sessionDateFinish" id="sessionDateFinish">
                            </div>

                            <span id="" class="hidden text-gray-600 note_time text-md">the time will be 00:00</span>
                        </div>

                        <div class="w-3/12 mt-10" id="generateArea">
                            <button type="submit" id="generateBtn" class="px-5 py-3 text-xl text-white bg-darthmouthgreen rounded-xl hover:bg-white hover:text-darthmouthgreen hover:border hover:border-darthmouthgreen">Generate Report</button>
                        </div>
                    </form>

                </div>


                <div class="hidden mt-5 " id="selectedSessionLogsArea">
                    <h1 class="text-4xl font-semibold text-darthmouthgreen">Selected Session Logs</h1>
                    <form action="{{ url('admin/reports/select/session') }}"  method="GET">
                        
                        
                        <div class="mt-5" id="userCategoryArea">
                            <h1 class="text-xl font-semibold">Choose Category</h1>
                            <select class="w-4/5 px-5 py-3 text-xl border border-darthmouthgreen rounded-xl" name="selectedSession_userCategory" id="selectedSession_userCategory">
                                <option value="ALL" selected>ALL Users</option>
                                <option value="Learners">Learners</option>
                                <option value="Instructors">Instructors</option>
                            </select>
                        </div>


                        <div class="hidden mt-5" id="learnerSelectedSessionArea">
                            <div class="" id="searchLearnerArea">
                                <label for="searchLearner" class="text-xl font-semibold">Filter Learner by Name</label>
                                <input type="text" class="w-4/5 px-5 py-3 text-xl border border-darthmouthgreen rounded-xl selectedSession_searchLearner" name="selectedSession_searchLearner" id="">
                            </div>
    
                            <div class="mt-5" id="selectLearnerArea">
                                <h1 class="text-xl font-semibold">Choose Learner</h1><br>
                                <select class="w-4/5 px-5 py-3 text-xl border border-darthmouthgreen rounded-xl selectedSession_selectLearner" name="userSession" id="">
                                    <option value="" selected disabled>--choose user--</option>
                                </select>
                            </div>
                        </div>

                        
                        <div class="hidden mt-5" id="instructorSelectedSessionArea">
                            <div class="" id="searchInstructorArea">
                                <label for="searchInstructor" class="text-xl font-semibold">Filter Instructor by Name</label>
                                <input type="text" class="w-4/5 px-5 py-3 text-xl border border-darthmouthgreen rounded-xl selectedSession_searchInstructor" name="selectedSession_searchInstructor" id="">
                            </div>
    
                            <div class="mt-5" id="selectInstructorArea">
                                <h1 class="text-xl font-semibold">Choose Instructor</h1><br>
                                <select class="w-4/5 px-5 py-3 text-xl border border-darthmouthgreen rounded-xl selectedSession_selectInstructor" name="userSession" id="">
                                    <option value="" selected disabled>--choose user--</option>
                                </select>
                            </div>
                        </div>

                        <div class="mt-5" id="userDateTimeArea">
                            <input type="checkbox" name="userSelectedDayCheck" id="selectedSessionUserSelectedDayCheck">
                            <label for="selectedSessionUserSelectedDayCheck" class="text-lg">Custom Time</label><br>

                            <div class="hidden" id="selectedSession_enable_customDate">
                                <label for="selectedSessionDateStart">Start Date</label>
                                <input type="date" class="w-1/5 px-3 py-2 mx-5 border border-darthmouthgreen rounded-xl " name="selectedSessionDateStart" id="selectedSessionDateStart">
                                
                                <label for="selectedSessionDateFinish">Until</label>
                                <input type="date" class="w-1/5 px-3 py-2 mx-5 border border-darthmouthgreen rounded-xl " name="selectedSessionDateFinish" id="selectedSessionDateFinish">
                            </div>

                            <span id="" class="hidden text-gray-600 note_time text-md">the time will be 00:00</span>
                        </div>

                        <div class="w-3/12 mt-10" id="generateArea">
                            <button type="submit" id="generateBtn" class="px-5 py-3 text-xl text-white bg-darthmouthgreen rounded-xl hover:bg-white hover:text-darthmouthgreen hover:border hover:border-darthmouthgreen">Generate Report</button>
                        </div>
                    </form>
                </div>


                <div class="hidden mt-5 " id="listCourseArea">
                    <h1 class="text-4xl font-semibold text-darthmouthgreen">List of Courses</h1>
                    <form action="{{ url('admin/reports/list/courses') }}"  method="GET">

                        <div class="mt-5" id="courseStatusArea">
                            <h1 class="text-xl font-semibold">Choose Status</h1>
                            <select class="w-4/5 px-5 py-3 text-xl border border-darthmouthgreen rounded-xl" name="courseStatus" id="courseStatus">
                                <option value="" selected>ALL</option>
                                <option value="Pending">Pending</option>
                                <option value="Approved">Approved</option>
                                <option value="Rejected">Rejected</option>
                            </select>
                        </div>

                        <div class="mt-5" id="userDateTimeArea">
                            <input type="checkbox" name="courseSelectedDayCheck" id="courseSelectedDayCheck">
                            <label for="courseSelectedDayCheck" class="text-lg">Custom Time</label><br>

                            <div class="hidden" id="course_enable_customDate">
                                <label for="courseDateStart">Start Date</label>
                                <input type="date" class="w-1/5 px-3 py-2 mx-5 border border-darthmouthgreen rounded-xl " name="courseDateStart" id="courseDateStart">
                                
                                <label for="courseDateFinish">Until</label>
                                <input type="date" class="w-1/5 px-3 py-2 mx-5 border border-darthmouthgreen rounded-xl " name="courseDateFinish" id="courseDateFinish">
                            </div>

                            <span id="" class="hidden text-gray-600 note_time text-md">the time will be 00:00</span>
                        </div>
                        
                        <div class="w-3/12 mt-10" id="generateArea">
                            <button type="submit" id="generateBtn" class="px-5 py-3 text-xl text-white bg-darthmouthgreen rounded-xl hover:bg-white hover:text-darthmouthgreen hover:border hover:border-darthmouthgreen">Generate Report</button>
                        </div>
                    </form>
                </div>


                <div class="hidden mt-5 " id="selectedCourseArea">
                    <h1 class="text-4xl font-semibold text-darthmouthgreen">Selected  Course</h1>
                    <form action="{{ url('admin/reports/select/course') }}"  method="GET">
                        

                        <div class="" id="searchCourseArea">
                            <label for="searchCourse" class="text-xl font-semibold">Filter Course by Name</label>
                            <input type="text" class="w-4/5 px-5 py-3 text-xl border border-darthmouthgreen rounded-xl searchCourse" name="searchCourse" id="">
                        </div>

                        <div class="mt-5" id="selectCourseArea">
                            <h1 class="text-xl font-semibold">Choose Course</h1><br>
                            <select class="w-4/5 px-5 py-3 text-xl border border-darthmouthgreen rounded-xl selectCourse" name="selectCourse" id="">
                                <option value="" selected disabled>--choose user--</option>
                            </select>
                        </div>

                        <div class="w-3/12 mt-10" id="generateArea">
                            <button type="submit" id="generateBtn" class="px-5 py-3 text-xl text-white bg-darthmouthgreen rounded-xl hover:bg-white hover:text-darthmouthgreen hover:border hover:border-darthmouthgreen">Generate Report</button>
                        </div>
                    </form>
                </div>


                <div class="hidden mt-5 " id="listCourseEnrolleesArea">
                    <h1 class="text-4xl font-semibold text-darthmouthgreen">List of Course Enrollees</h1>
                    <form action="{{ url('admin/reports/list/course/enrollees') }}"  method="GET">
                        

                        <div class="" id="searchCourseArea">
                            <label for="searchApprovedCourse" class="text-xl font-semibold">Filter Course by Name</label>
                            <input type="text" class="w-4/5 px-5 py-3 text-xl border border-darthmouthgreen rounded-xl searchApprovedCourse" name="searchApprovedCourse" id="">
                        </div>

                        <div class="mt-5" id="selectCourseArea">
                            <h1 class="text-xl font-semibold">Choose Course</h1><br>
                            <select class="w-4/5 px-5 py-3 text-xl border border-darthmouthgreen rounded-xl selectApprovedCourse" name="selectApprovedCourse" id="">
                                <option value="" selected disabled>--choose course--</option>
                            </select>
                        </div>

                        <div class="mt-5" id="userDateTimeArea">
                            <input type="checkbox" name="courseEnrolleesSelectedDayCheck" id="courseEnrolleesSelectedDayCheck">
                            <label for="courseEnrolleesSelectedDayCheck" class="text-lg">Custom Time</label><br>

                            <div class="hidden" id="courseEnrollees_enable_customDate">
                                <label for="enrollees_courseDateStart">Start Date</label>
                                <input type="date" class="w-1/5 px-3 py-2 mx-5 border border-darthmouthgreen rounded-xl " name="enrollees_courseDateStart" id="enrollees_courseDateStart">
                                
                                <label for="enrollees_courseDateFinish">Until</label>
                                <input type="date" class="w-1/5 px-3 py-2 mx-5 border border-darthmouthgreen rounded-xl " name="enrollees_courseDateFinish" id="enrollees_courseDateFinish">
                            </div>

                            <span id="" class="hidden text-gray-600 note_time text-md">the time will be 00:00</span>
                        </div>

                        <div class="w-3/12 mt-10" id="generateArea">
                            <button type="submit" id="generateBtn" class="px-5 py-3 text-xl text-white bg-darthmouthgreen rounded-xl hover:bg-white hover:text-darthmouthgreen hover:border hover:border-darthmouthgreen">Generate Report</button>
                        </div>
                    </form>
                </div>


                <div class="hidden mt-5 " id="courseGradeSheetsArea">
                    <h1 class="text-4xl font-semibold text-darthmouthgreen">Course Grade Sheet</h1>
                    <form action="{{ url('admin/reports/list/course/gradesheet') }}"  method="GET">
                        
                        <div class="" id="searchCourseArea">
                            <label for="grades_searchApprovedCourse" class="text-xl font-semibold">Filter Course by Name</label>
                            <input type="text" class="w-4/5 px-5 py-3 text-xl border border-darthmouthgreen rounded-xl grades_searchApprovedCourse" name="grades_searchApprovedCourse" id="">
                        </div>

                        <div class="mt-5" id="selectCourseArea">
                            <h1 class="text-xl font-semibold">Choose Course</h1><br>
                            <select class="w-4/5 px-5 py-3 text-xl border border-darthmouthgreen rounded-xl grades_selectApprovedCourse" name="grades_selectApprovedCourse" id="">
                                <option value="" selected disabled>--choose course--</option>
                            </select>
                        </div>

                        <div class="w-3/12 mt-10" id="generateArea">
                            <button type="submit" id="generateBtn" class="px-5 py-3 text-xl text-white bg-darthmouthgreen rounded-xl hover:bg-white hover:text-darthmouthgreen hover:border hover:border-darthmouthgreen">Generate Report</button>
                        </div>
                    </form>

                </div>


                <div class="hidden mt-5 " id="learnerCourseGradeSheetArea">
                    <h1 class="text-4xl font-semibold text-darthmouthgreen">Selected Learner & Course Grade Sheet</h1>
                    <form action="{{ url('admin/reports/select/learner/course/gradesheet') }}"  method="GET">
                        
                        <div class="" id="searchCourseArea">
                            <label for="grades_searchApprovedCourse" class="text-xl font-semibold">Filter Course by Name</label>
                            <input type="text" class="w-4/5 px-5 py-3 text-xl border border-darthmouthgreen rounded-xl learnerCoursegrades_searchApprovedCourse" name="learnerCoursegrades_searchApprovedCourse" id="">
                        </div>

                        <div class="mt-5" id="selectCourseArea">
                            <h1 class="text-xl font-semibold">Choose Course</h1><br>
                            <select class="w-4/5 px-5 py-3 text-xl border border-darthmouthgreen rounded-xl learnerCoursegrades_selectApprovedCourse" name="learnerCoursegrades_selectApprovedCourse" id="">
                                <option value="" selected disabled>--choose course--</option>
                            </select>
                        </div>

                        <div class="" id="searchLearnerArea">
                            <label for="searchLearner" class="text-xl font-semibold">Filter Learner by Name</label>
                            <input type="text" class="w-4/5 px-5 py-3 text-xl border border-darthmouthgreen rounded-xl learnnerCourseGrades_searchLearner" name="learnerCourseGrades_searchLearner" id="">
                        </div>

                        <div class="mt-5" id="selectLearnerArea">
                            <h1 class="text-xl font-semibold">Choose Learner</h1><br>
                            <select class="w-4/5 px-5 py-3 text-xl border border-darthmouthgreen rounded-xl learnerCourseGrades_selectLearner" name="learnerCourseGrades_selectLearner" id="">
                                <option value="" selected disabled>--choose user--</option>
                            </select>
                        </div>

                        <div class="w-3/12 mt-10" id="generateArea">
                            <button type="submit" id="generateBtn" class="px-5 py-3 text-xl text-white bg-darthmouthgreen rounded-xl hover:bg-white hover:text-darthmouthgreen hover:border hover:border-darthmouthgreen">Generate Report</button>
                        </div>
                    </form>
                </div>

            </div>

        </div>

    </div>

</section>
</section>

@include('partials.footer')