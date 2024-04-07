
    <section style="margin-left:15%;" class="w-10/12 p-5 mx-5 bg-white rounded-lg overscroll-auto md:overflow-auto">
        <script src="{{asset('js/instructor_course_manage.js')}}" defer></script>
       

         <a href="" class="w-8 h-8 m-2">
            <svg xmlns="http://www.w3.org/2000/svg" height="25" viewBox="0 -960 960 960" width="24"><path d="m313-440 224 224-57 56-320-320 320-320 57 56-224 224h487v80H313Z"/></svg>
        </a>


            <div class="flex mt-5 rounded-lg">
                <div id="side_items" class="w-1/6 h-full bg-green-700 rounded-lg h-">
                    <ul class="px-5 py-5 text-xl font-medium text-white">
                        <li id="edit_info_btn" class="w-full px-2 py-5 mt-2 rounded-xl hover:bg-green-900">
                                <i class="pr-2 text-3xl fa-solid fa-book-open"></i>
                                Edit Info
                        </li>
                        <li id="enrolled_learners_btn" class="w-full px-2 py-5 mt-2 rounded-xl hover:bg-green-900">
                                <i class="pr-2 text-3xl fa-solid fa-users"></i>
                                Enrolled Learners
                        </li>
                        <li id="course_summary_btn" class="w-full px-2 py-5 mt-2 rounded-xl hover:bg-green-900">
                                <i class="pr-2 text-3xl fa-solid fa-book"></i>
                                Course Summary
                        </li>
                        <li class="w-full px-2 py-3 mt-2 rounded-xl">
                          
                        </li>
                        <li class="w-full px-2 py-3 mt-2 rounded-xl">
                          
                        </li>
                    </ul>
                </div>
         
                <div id="content_area" class="w-5/6 m-5 overflow-y-auto ">
                    <div id="course_info" class="">
                        <h1 class="text-2xl font-semibold border-b-2 border-black">Course Information</h1>

                        <form id="updateCourse" name="updateCourse" data-course-id="{{ $course->course_id }}">
                            @csrf
                            <div id="info" class="mt-5 overflow-y-auto">
                                <div class="flex">
                                    <div class="w-2/5">
                                        <div class="flex my-2 justify-normal">
                                            <label for="" class="w-2/6 text-lg">Course ID:</label>
                                            <input type="text" value="{{ $course->course_id }}" class="w-4/6 text-lg" disabled>
                                        </div>
                                        <div class="flex my-2 justify-normal ">
                                            <label for="course_name" class="w-2/6 text-lg">Course Name:</label>
                                            <input type="text" id="course_name" name="course_name" value="{{ $course->course_name }}" class="w-4/6 text-lg" disabled>
                                        </div>
                                    </div>
                                    
                                    <div class="w-2/5 mx-5">
                                        <div class="flex my-1 justify-normal ">
                                            <h1 class="w-2/6 text-lg">Course Status:</h1>
                                            @if ($course->course_status == 'Approved')
                                            <p class="px-5 py-2 bg-green-600 rounded-full">Approved</p>
                                            @elseif ($course->course_status == 'Pending')
                                            <p class="px-5 py-2 bg-yellow-400 rounded-full">Pending</p>
                                            @else
                                            <p class="px-5 py-2 bg-red-600 rounded-full">Rejected</p>
                                            @endif
                                            
                                        </div>
                                        <div class="flex py-1 my-1 justify-normal">
                                            <label for="" class="w-2/5 text-lg">Course Difficulty:</label>
                                            <select name="course_difficulty" id="course_difficulty" class="w-2/5" disabled>
                                                <option value="" {{ $course->course_difficulty == '' ? 'selected' : '' }}>--select an option--</option>
                                                <option value="Beginner" {{ $course->course_difficulty == 'Beginner' ? 'selected': '' }}>Beginner</option>
                                                <option value="Intermediate" {{ $course->course_difficulty == 'Intermediate' ? 'selected': '' }}>Intermediate</option>
                                                <option value="Advanced" {{ $course->course_difficulty == 'Advanced' ? 'selected': '' }}>Advanced</option>
                                            </select>
                                        </div>
                                    </div>
    
                                    <div class="mt-5">
                                        <h1>Created {{ $course->created_at }} by {{ $course->instructor_fname }} {{ $course->instructor_lname }}</h1>
                                        <h1>Last Modified {{ $course->updated_at }}</h1>
                                    </div>
                                </div>
    
                                <div class="mt-1">
                                    <h1>Course Description</h1>
                                    {{-- <p class="h-24 overflow-y-auto ">{{ $course->course_description }}</p> --}}
                                    <textarea name="course_description" id="course_description" class="w-full h-24 max-w-full max-h-24" disabled>{{ $course->course_description }}</textarea>
                                </div>
                                
                               
    
                                <div class="flex justify-end mr-16">
                                    <button type="button" id="editCourse" class="py-5 text-lg font-medium text-white bg-green-600 w-44 rounded-2xl hover:bg-green-800 focus">
                                        Edit Course Info
                                    </button>
    
                                    <button type="button" id="cancelEditCourse" class="hidden py-5 text-lg font-medium text-white bg-red-600 w-44 rounded-2xl hover:bg-red-800 focus">
                                        Cancel
                                    </button>
    
                                    <button type="button" id="saveEditCourse" class="hidden py-5 text-lg font-medium text-white bg-green-600 w-44 rounded-2xl hover:bg-green-800 focus">

                                        Save Changes
                                    </button>
                                </div>

                                <div id="updateCourseModal" class="fixed top-0 left-0 flex items-center justify-center hidden w-screen h-screen bg-black bg-opacity-50">
                                 
                                        <div class="p-5 text-center bg-white rounded-lg">
                                            <p>Are you sure you want to edit this course?</p>
                                            <button type="submit" id="confirmUpdate" class="px-4 py-2 m-2 text-white bg-green-600 rounded-md">Confirm</button>
                                            <button type="button" id="cancelUpdate" class="px-4 py-2 m-2 text-gray-700 bg-gray-400 rounded-md">Cancel</button>
                                        </div>
                                </div>
                                
                            </div>
                        </form>
                        
                    </div>

   
                    <div id="enrolled_learners" class="hidden">
                        <h1 class="text-2xl font-semibold border-b-2 border-black">Enrolled Learner</h1>

                        <form id="enrolleeForm" data-course-id="{{$course->course_id}}" action="/instructor/course/manage/{{$course->course_id}}" method="GET">
                            <div class="flex items-center">
                                <div class="flex items-center mx-10">
                                    <div class="mx-2">
                                        <label for="filterDate" class="">Filter by Date</label><br>
                                        <input data-course-id="{{$course->course_id}}" id="filterDate" type="date" name="filterDate" class="w-40 px-2 py-2 text-base border-2 border-black rounded-xl" value="{{ request('filterDate') }}">
                                    </div>
                                    <div class="mx-2">
                                        <label for="filterStatus" class="">Filter by Status</label><br>
                                        <select data-course-id="{{$course->course_id}}" name="filterStatus" id="filterStatus" class="w-32 px-2 py-2 text-base border-2 border-black rounded-xl">
                                            <option value="" {{ $filterStatus == '' ? 'selected': ''}}>Select Status</option>
                                            <option value="Pending" {{ $filterStatus == 'Pending' ? 'selected': ''}}>Pending</option>
                                            <option value="Approved" {{ $filterStatus == 'Approved' ? 'selected': ''}}>Approved</option>
                                            <option value="Rejected" {{ $filterStatus == 'Rejected' ? 'selected': ''}}>Rejected</option>
                                        </select>
                                    </div>
                                    <button class="h-12 px-5 py-1 mx-3 text-lg font-medium bg-green-600 rounded-xl hover:bg-green-900 hover:text-white" type="submit">Filter</button>
                                </div>
                                <div class="">
                                    <select name="searchBy" id="" class="w-40 px-2 py-2 text-lg border-2 border-black rounded-xl">
                                        <option value="" {{request('searchBy') == '' ? 'selected' : ''}}class="">Search By</option>
                                        <option value="learner_course_id" {{request('searchBy') == 'learner_course_id' ? 'selected' : ''}}>Enrollee ID</option>
                                        <option value="learner_id" {{request('searchBy') == 'learner_id' ? 'selected' : ''}}>Learner ID</option>
                                        <option value="name" {{request('searchBy') == 'name' ? 'selected' : ''}}>Name</option>
                                        <option value="learner_email" {{request('searchBy') == 'learner_email' ? 'selected' : ''}}>Email</option>
                                        <option value="learner_contactno" {{request('searchBy') == 'learner_contactno' ? 'selected' : ''}}>Contact No.</option>
                                        
                                    </select>
                                    <input type="text" name="searchVal" class="px-2 py-2 ml-3 text-lg border-2 border-black w-80 rounded-xl" value="{{ request('searchVal') }}" placeholder="Type to search">
                                    <button class="px-3 py-2 mx-3 text-lg font-medium bg-green-600 rounded-xl hover:bg-green-900 hover:text-white" type="submit">Search</button>        
                                </div>
                            </div>
                        </form> 

                        <div id="learner_table" class="mt-5">
                            <table>
                                <thead class="text-left">
                                    <th class="w-1/5">Enrollee ID</th>
                                    <th class="w-1/5">Learner ID</th>
                                    <th class="w-1/5">Enrollee Info</th>
                                    <th class="w-1/5">Date</th>
                                    <th class="w-1/5">Status</th>
                                    <th class="w-1/5"></th>
                                </thead>
                                <tbody id="enrollees_table">
                                    {{-- @forelse ($enrollees as $enrollee)
                                    <tr>
                                        <td>{{$enrollee->learner_course_id}}</td>
                                        <td>{{$enrollee->learner_id}}</td>
                                        <td>
                                            <h1>{{$enrollee->learner_fname}} {{$enrollee->learner_lname}} </h1>
                                            <p>{{$enrollee->learner_email}}</p>
                                        </td>
                                        <td>{{$enrollee->created_at}}</td>
                                        <td>{{$enrollee->status}}</td>
                                        <td>
                                            {{-- <button class="px-5 py-2 bg-green-500 rounded-2xl hover:bg-green-700">
                                                view
                                            </button> --}}
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td class="py-1 text-lg font-normal" colspan="7">No enrollees found.</td>
                                    </tr>
                                    @endforelse --}}
                                </tbody>
                            </table>
                        </div>
                    </div> 


                    <div id="course_summary" class="hidden overflow-y-auto">
                        <h1 class="text-2xl font-semibold border-b-2 border-black">Course Summary</h1>

                        <div class="flex mt-3 justify-normal">
                            <div class="w-2/5">
                                <h1>Course Name: {{ $course->course_name }}</h1>
                                <h1>Course ID: {{ $course->course_id }}</h1>
                            </div>
                            <div class="w-2/5">
                                <h1>Instructor: {{ $course->instructor_fname }} {{ $course->instructor_lname }}</h1>
                                <h1>Course Difficulty: {{ $course->course_difficulty }}</h1>
                                <div class="flex">
                                    <h1>Course Status: </h1>
                                    @if ($course->course_status == 'Approved')
                                   <p class="px-5 py-2 bg-green-600 rounded-full">Approved</p>
                                   @elseif ($course->course_status == 'Pending')
                                   <p class="px-5 py-2 bg-yellow-400 rounded-full">Pending</p>
                                   @else
                                   <p class="px-5 py-2 bg-red-600 rounded-full">Rejected</p>
                                   @endif
                                </div>
                                
                            </div>
                            <div class="w-2/5">
                                <h1>Created at: {{ $course->created_at }}</h1>
                                <h1>Updated at: {{ $course->updated_at }}</h1>
                            </div>
                        </div>
                        
                        <div class="mt-3">
                            <h1>Course Description</h1>
                            <p class="h-24 overflow-y-auto ">{{ $course->course_description }}</p>
                        </div>

                        <div class="flex justify-end">
                            <button id="showDeleteModal" class="px-5 py-5 text-xl bg-red-600 rounded-xl hover:bg-red-700">Delete Course</button>
                        </div>
                        
                        <div id="deleteCourseModal" class="fixed top-0 left-0 flex items-center justify-center hidden w-screen h-screen bg-black bg-opacity-50">
                            <form id="deleteCourse" action="" data-course-id="{{ $course->course_id }}">
                                @csrf
                                <div class="p-5 text-center bg-white rounded-lg">
                                    <p>Are you sure you want to delete this course?</p>

                                    <button type="submit" id="confirmDelete" class="px-4 py-2 m-2 text-white bg-red-600 rounded-md">Confirm</button>
                                    <button type="button" id="cancelDelete" class="px-4 py-2 m-2 text-gray-700 bg-gray-400 rounded-md">Cancel</button>
                                </div>
                            </form>
                            
                        </div>
                        
                    </div>

                </div> --}}
            </div>
            
        </div>


    {{-- @include('partials.footer') --}}