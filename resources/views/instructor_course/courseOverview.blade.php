@extends('layouts.instructor_layout')

@section('content')
    {{-- MAIN --}}
<section class="w-full h-screen md:w-3/4 lg:w-10/12">
    <div class="h-full px-2 py-4 pt-24 overflow-hidden overflow-y-scroll rounded-lg shadow-lg md:pt-0">
        <div class="relative z-0 p-4 text-black border rounded-lg shadow-lg">
                    {{-- course name/title --}}
            <a href="{{ url('/instructor/courses') }}" class="w-8 h-8 m-2">
                <svg xmlns="http://www.w3.org/2000/svg" height="25" viewBox="0 -960 960 960" width="24"><path d="m313-440 224 224-57 56-320-320 320-320 57 56-224 224h487v80H313Z"/></svg>
            </a>
            <div class="flex justify-between w-full" id="courseInfo">
                <div class="" id="courseInfo_left">
                    <h1 class="text-2xl font-semibold md:text-4xl">{{$course->course_name}}</h1>
                    <h4 class="mt-10">Course Level: {{$course->course_difficulty}}</h4>
                    <h4 class=""><i class="fa-regular fa-clock text-darthmouthgreen"></i> Est. Time:  {{$totalCourseTime}}</h4>
                    <h4>&emsp;<i class="fa-regular fa-file text-darthmouthgreen"></i> Lessons: {{$totalLessonsCount}}</h4>
                    <h4>&emsp;<i class="fa-regular fa-clipboard text-darthmouthgreen"></i> Activities: {{$totalActivitiesCount}}</h4>
                    <h4>&emsp;<i class="fa-regular fa-pen-to-square text-darthmouthgreen"></i> Quizzes:  {{$totalQuizzesCount}}</h4>
                
                
                    <h4 class="flex items-center mt-10">
                        Approval Status: 
                        @if ($course->course_status === 'Approved')
                        <div class="w-5 h-5 mx-2 rounded-full bg-darthmouthgreen"></div>
                    @elseif ($course->course_status ==='Pending')
                        <div class="w-5 h-5 mx-2 bg-yellow-500 rounded-full"></div>
                    @else
                        <div class="w-5 h-5 mx-2 bg-red-500 rounded-full"></div>
                    @endif
                    
                    {{$course->course_status}}
                    </h4>

                    @if($course->course_status === 'Approved') 
                    <button class="btn btn-primary">
                        <a href="{{ url("/instructor/course/$course->course_id/certificate") }}" target="_blank" class="space-x-2 text-white hover:text-darthmouthgreen"><span>Certificate of Recognition</span><i class="fa-solid fa-download"></i></a>
                    </button>
                    @endif
                </div>
                <div class="flex flex-col items-center justify-between" id="courseInfo_right">
                    <img class="w-40 h-40 my-4 mb-10 rounded-full lg:w-40 lg:h-40 object-cover" src="{{ asset('storage/' . $course->profile_picture) }}" alt="Profile Picture">
                    <div class="flex flex-col  space-y-2">
                        <a href="{{ url("/instructor/course/content/$course->course_id") }}" id="" class="btn btn-primary">Enter</a>
                        <button id="viewDetailsBtn"  class="btn btn-warning">View Details</button>    
                    </div>
                </div>
            </div>
        </div>


        <div class="relative z-0 flex flex-col p-3 pb-4 mt-10 text-black border rounded-lg shadow-lg lg:flex-row lg:justify-between" id="courseDescAndTopics">
            <div class="lg:w-7/12 overflow-y-auto h-[400px]" id="courseDesc">
                <h1 class="text-2xl font-semibold md:text-3xl lg:text-4xl">Course Description</h1>
                <div class="whitespace-pre-line">
                    {{$course->course_description}}
                </div>
            </div>
            <div class="lg:w-5/12 overflow-y-auto h-full" id="courseTopics">
                <h1 class="text-2xl font-semibold md:text-3xl lg:text-4xll">Course Topics</h1>
                @foreach ($syllabus as $topic)
                    @if ($topic->category === "LESSON")
                        <h4 class="px-5 pt-5"><i class="text-2xl fa-regular fa-file text-darthmouthgreen "></i> - {{$topic->topic_title}}</h4>
                    @elseif ($topic->category === "ACTIVITY")
                        <h4 class="px-5 pt-5"><i class="text-2xl fa-regular fa-clipboard text-darthmouthgreen "></i> - {{$topic->topic_title}}</h4>
                    @elseif ($topic->category === "QUIZ")
                        <h4 class="px-5 pt-5"><i class="text-2xl fa-regular fa-pen-to-square text-darthmouthgreen "></i> - {{$topic->topic_title}}</h4>
                    @endif
                @endforeach
            </div>
        </div>


        <div class="mt-5 lg:min-h-[250px] flex-col lg:flex-row flex justify-between" id="enrolledData">
            <div class="lg:w-5/12" id="totalEnrollees">
                <h1 class="mt-10 text-2xl text-center">
                    <span class="text-6xl font-semibold text-darthmouthgreen">
                        {{$totalEnrolledCount}}
                    </span><br>
                    Learners Enrolled
                </h1>
            </div>
            <div class="flex items-center justify-between lg:w-7/12" id="learnerProgressData">
                <canvas id="learnerProgressChart"></canvas>
            </div>
        </div>


        <div class="px-4 mt-16 min-h-[200px]" id="learnerProgressArea">
            <div class="text-center">
                <h1 class="text-xl font-semibold">Enrolled Learners</h1>
            
            </div>
            <div class="overflow-auto">
                <table class="table w-full mt-5 table-auto">
                    <thead class="bg-primary text-white">
                        <th class="w-[150px]">Name</th>
                        <th class="w-[150px]">Email</th>
                        <th class="w-[150px]">Date Enrolled</th>
                        <th class="w-[150px]">Status</th>
                        <th class="w-[150px]"></th>
                    </thead>
                    <tbody id="enrollePercentArea">
                        @foreach ($courseEnrollees as $enrollee)
                            <tr>
                                <td class="py-5">{{$enrollee->learner_fname}} {{$enrollee->learner_lname}}</td>
                                <td>{{$enrollee->learner_email}}</td>
                                <td>{{$enrollee->start_period}}</td>
                                <td>{{$enrollee->course_progress}}</td>
                                <td>
                                    <button class="btn btn-primary">
                                        <a class="text-white hover:text-darthmouthgreen" href="{{ url("instructor/profile/learner/$enrollee->learner_id") }}">
                                        view profile
                                        </a>
                                    </button>
                                    
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        </div>
    </div>
</section>

    <div id="courseDetailsModal" class="fixed top-0 left-0 z-50 flex items-center justify-center hidden w-full h-full overflow-hidden bg-gray-200 bg-opacity-75 md:py-4">
        <div class="w-full h-full p-4 overflow-x-hidden overflow-y-auto bg-white rounded-lg shadow-lg md:w-3/5 modal-content overscroll-y-auto md:overflow-y-hidden">
            <div class="flex justify-end w-full">
                <button class="closeCourseDetailsModal">
                    <i class="text-xl fa-solid fa-xmark" style="color: #949494;"></i>
                </button>
            </div>
            <div class="flex flex-col " id="content">
                <div class=" bg-darthmouthgreen rounded-s-xl rounded-e-xl overflow-x-auto" id="courseDetailsDirectory">
                    <ul class="flex flex-row divide-x-2 divide-white">
                        <li class="w-full p-3 font-semibold text-center text-white rounded-s-xl hover:bg-white hover:text-darthmouthgreen bg-darthmouthgreen" id="courseDetailsBtn">Course Details</li>
                        <li class="w-full p-3 font-semibold text-center text-white hover:bg-white hover:text-darthmouthgreen bg-darthmouthgreen" id="learnersEnrolledBtn">Learners Enrolled</li>
                        <li class="w-full p-3 font-semibold text-center text-white hover:bg-white hover:text-darthmouthgreen bg-darthmouthgreen" id="gradesheetBtn">Gradesheet</li>
                        <li class="w-full p-3 font-semibold text-center text-white rounded-e-xl hover:bg-white hover:text-darthmouthgreen bg-darthmouthgreen" id="courseFilesBtn">Course Files</li>
                    </ul>
                </div>

                <div class="py-5 mx-5" id="courseDetailsContentArea">
                    
                    <div class="flex flex-col-reverse items-center justify-between md:flex-row" id="courseInfoArea">
                        <div class="w-full py-5 mx-5 md:w-1/2" id="courseInfo_left">
                            <h1 class="text-2xl font-semibold md:text-4xl" id="courseName">{{$course->course_name}}</h1>
                            <h4 class="text-xl">Course ID: {{$course->course_id}}</h4>
                            <h4 class="mt-10 text-xl">Course Level: {{$course->course_difficulty}}</h4>
                            <h4 class="text-xl"><i class="fa-regular fa-clock text-darthmouthgreen"></i> Est. Time:  {{$totalCourseTime}}</h4>
                            {{-- <h4 class="mt-3 text-xl">Total  Units: {{$totalSyllabusCount}}</h4> --}}
                            <h4 class="pl-5 text-xl"><i class="fa-regular fa-file text-darthmouthgreen"></i> Lessons: {{$totalLessonsCount}}</h4>
                            <h4 class="pl-5 text-xl"><i class="fa-regular fa-clipboard text-darthmouthgreen"></i> Activities: {{$totalActivitiesCount}}</h4>
                            <h4 class="pl-5 text-xl"><i class="fa-regular fa-pen-to-square text-darthmouthgreen"></i> Quizzes:  {{$totalQuizzesCount}}</h4>
                            <h4 class="mt-10 text-xl">Course Description</h4>
                            <div class="whitespace-pre-line w-full overflow-y-auto h-[180px]" id="courseDescription">
                                {{$course->course_description}}
                            </div>
                            <div class="mt-5">
                                <button id="deleteCourseBtn" data-course-id="{{ $course->course_id }}" class="px-5 py-3 text-white bg-red-600 hover:bg-white hover:text-red-600 hover:border-2 hover:border-red-600 rounded-xl">Delete Course</button>
                            </div>
                        
                        </div>
                        <div class="flex flex-col items-center justify-center w-full md:w-1/2" id="courseInfo_right">
                            <img class="w-40 h-40 my-4 mb-10 bg-red-500 rounded-full lg:w-40 lg:h-40 object-cover" src="{{ asset('storage/' . $instructor->profile_picture) }}" alt="Profile Picture">
                            <h4 class="text-xl">{{$instructor->instructor_fname}} {{$instructor->instructor_lname}}</h4>
                            <h4 class="text-xl">INSTRUCTOR</h4>
                            <button id="courseEditBtn" class="px-5 py-3 text-white bg-darthmouthgreen hover:bg-white hover:text-darthmouthgreen hover:border-2 hover:border-darthmouthgreen rounded-xl">Edit</button>
                        </div>
                    </div>
                    
                    

                <div class="hidden py-5" id="learnersEnrolledArea">
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    
                    <!-- start-generate-pdf -->
                    <div class="" id="generatedPdfArea">
                        <h1 id="courseNamePdf" class="text-4xl font-semibold">{{ $course->course_name }}</h1>
                        <h1 class="text-2xl font-semibold">Learners Enrolled</h1>
                        
                        <div class="mt-5 px-5 overflow-auto h-[600px]">
                            <table class="">
                                <thead class="px-3 text-left text-white bg-darthmouthgreen">
                                    <th class="w-3/12 pl-5">Name</th>
                                    <th class="w-2/12">Email</th>
                                    <th class="w-1/12">Enrollment Status</th>
                                    <th class="w-2/12">Date Enrolled</th>
                                    <th class="w-1/12">Course Progress</th>
                                </thead>
                                <tbody class="">
                                    @forelse ($courseEnrollees as $enrollee)
                                    <tr class="border-b-2 border-gray-500">
                                        <td class="py-3 pl-5">{{ $enrollee->learner_fname }} {{ $enrollee->learner_lname }}</td>
                                        <td>{{ $enrollee->learner_email }}</td>
                                        <td>{{ $enrollee->status }}</td>
                                        <td>{{ $enrollee->created_at }}</td>
                                        <td>{{ $enrollee->course_progress }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="py-3">No enrollees enrolled</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
    
    <!-- end-generate-pdf -->
                    {{-- <button id="generateEnrolledLearnersBtn" class="px-5 py-3 text-white bg-darthmouthgreen rounded-xl hover:bg-white hover:text-darthmouthgreen hover:border-2 hover:border-darthmouthgreen">Download PDF</button> --}}
                </div>



            <div class="hidden py-5 mx-5" id="gradesheetArea">
                <div class="" id="exportExcelGrades">
                    <h1 id="courseNamePdf" class="text-4xl font-semibold">{{ $course->course_name }}</h1>
                    <h1 class="text-4xl font-semibold">Enrollee Gradesheet</h1>
                    <div class="m-5 px-5 overflow-auto overflow-x-auto">
                        <table id="gradesheet" class="table-fixed border-collapse w-[3000px] border">
                            <thead class="px-3 text-center text-white bg-darthmouthgreen">
                                <th class="w-4/12 pl-5 border">Name</th>
                                <th class="w-4/12 border">Status</th>
                                <th class="w-4/12 border">Date Started</th>
                                <th class="w-4/12 border">Pre Assessment</th>
                                
                                @foreach ($activitySyllabus as $activity)
                                    <th class="w-4/12 border">{{ $activity->activity_title }}</th>
                                @endforeach
                                
                                @foreach ($quizSyllabus as $quiz)
                                    <th class="w-4/12 border">{{ $quiz->quiz_title }}</th>
                                @endforeach
                        
                                <th class="w-4/12 border">Post Assessment</th>
                                <th class="w-4/12 border">Grade</th>
                                <th class="w-4/12 border">Remarks</th>
                                <th class="w-4/12 border">Date Finished</th>
                            </thead>
                        
                            <tbody class="text-center">
                                @forelse ($gradesheet as $grade)
                                    <tr>
                                        <td class="py-3 pl-5 border">{{ $grade->learner_fname }} {{ $grade->learner_lname }}</td>
                                        <td class="border">{{ $grade->course_progress }}</td>
                                        <td class="border">{{ $grade->start_period }}</td>
                                        <td class="border">{{$grade->pre_assessment->score}}</td>
                                        
                                        {{-- Display activity scores --}}
                                        @foreach ($activitySyllabus as $activity)
                                            @php
                                                $activityScore = $grade->activities->firstWhere('activity_id', $activity->activity_id);
                                            @endphp
                                            <td class="border">{{ $activityScore ? $activityScore->average_score : '#' }}</td>
                                        @endforeach
                                        
                                        {{-- Display quiz scores --}}
                                        @foreach ($quizSyllabus as $quiz)
                                            @php
                                                $quizScore = $grade->quizzes->firstWhere('quiz_id', $quiz->quiz_id);
                                            @endphp
                                            <td class="border">{{ $quizScore ? $quizScore->average_score : '#' }}</td>
                                        @endforeach
                                        
                                        <td class="border">{{$grade->post_assessment->average_score}}</td>
                                        <td class="border">{{$grade->grade}}</td>
                                        <td class="border">{{$grade->remarks}}</td>
                                        <td class="border">{{ $grade->finish_period }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4">No gradesheet available</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        
                    </div>
                </div>
                <button id="generateGradesheetBtn" class="px-5 py-3 text-white bg-darthmouthgreen rounded-xl hover:bg-white hover:text-darthmouthgreen hover:border-2 hover:border-darthmouthgreen">Export Excel File</button>
                {{-- <button id="generateGradesheetPDFBtn" class="px-5 py-3 text-white bg-darthmouthgreen rounded-xl hover:bg-white hover:text-darthmouthgreen hover:border-2 hover:border-darthmouthgreen">Generate PDF</button> --}}
            </div>



                    <div class="hidden py-5 mx-5" id="filesArea">
                        <h1 class="text-4xl font-semibold">Your Files</h1>
                        <div class="m-5 px-5 overflow-auto overflow-x-auto h-[600px]">
                            <table class="table-fixed">
                                <thead class="w-full text-left">
                                    <th class="w-1/2 text-xl">File</th>
                                    <th class="w-1/3"></th>
                                    <th class="w-1/3"></th>
                                    <th class="w-1/3"></th>
                                </thead>
                                <tbody>
                    
                                    @foreach($courseFiles as $file)
                                        <tr>
                                            <td class="py-3">{{ basename($file) }}</td>
                                            <td>
                                                <a href="{{ Storage::url("$file") }}" target="_blank" class="px-5 py-3 text-white rounded-xl bg-darthmouthgreen hover:bg-white hover:border-2 hover:border-darthmouthgreen hover:text-darthmouthgreen">View File</a>
                                            </td>  
                                            <td>
                                                <a href="{{ Storage::url($file) }}" class="px-5 py-3 text-white rounded-xl bg-darthmouthgreen hover:bg-white hover:border-2 hover:border-darthmouthgreen hover:text-darthmouthgreen" download>Download</a>
                                            </td>     
                                            <td>
                                                <a href="{{ url("/instructor/course/$course->course_id/delete_file/" . basename($file)) }}" class="px-5 py-3 text-white bg-red-500 rounded-xl hover:bg-white hover:border-2 hover:border-red-500 hover:text-red-500" onclick="return confirm('Are you sure you want to delete this file?')">Delete</a>
                                            </td>
                                                                         
                                        </tr>
                                    @endforeach
                             
                                </tbody>
                            </table>
                            <button id="addNewFileBtn" class="px-5 py-3 text-white bg-darthmouthgreen rounded-xl hover:bg-white hover:text-darthmouthgreen hover:border-2 hover:border-darthmouthgreen">Add New File</button>
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>

    <div id="courseDetailsEditModal" class="fixed top-0 left-0 z-50 flex items-center justify-center hidden w-full h-full bg-gray-200 bg-opacity-75">
        <div class="modal-content bg-white p-4 rounded-lg shadow-lg w-[500px]">
            <div class="flex justify-end w-full">
                <button class="cancelEdit">
                    <i class="text-xl fa-solid fa-xmark" style="color: #949494;"></i>
                </button>
            </div>

            <h2 class="mb-2 text-2xl font-semibold">Edit Course Details</h2>

            <label for="courseEditName">Course Name</label><br>
            <input id="courseEditName" type="text" class="w-full h-16 px-3 py-3 text-lg text-black border-2 border-gray-500 rounded-lg" placeholder="your course name" value="{{ $course->course_name }}">
            <br><br>
            <label for="courseDescription" class="">Course Description</label><br>
            <textarea id="courseEditDescription" class="w-full h-40 px-3 py-3 text-sm text-black border-2 border-gray-500 rounded-lg" placeholder="Your course description">{{ $course->course_description }}</textarea>

            <div class="flex justify-center w-full mt-5">
                <button id="saveCourseEditDetailsBtn" data-course-id="{{$course->course_id}}" class="px-5 py-3 mx-2 mt-4 text-white rounded-lg bg-seagreen hover:bg-white hover:text-darthmouthgreen hover:border-2 hover:border-darthmouthgreen">Apply Changes</button>
                <button id="" class="px-5 py-3 mx-2 mt-4 text-white bg-red-500 rounded-lg cancelEdit hover:bg-white hover:text-red-500 hover:border-2 hover:border-red-500">Cancel</button>
            </div>
        </div>
    </div>



    <div id="deleteCourseModal" class="fixed z-[99] top-0 left-0 flex items-center justify-center hidden w-full h-full ml-10 bg-gray-200 bg-opacity-75">
        <div class="modal-content bg-white p-4 rounded-lg shadow-lg w-[500px]">
            <div class="flex justify-end w-full">
                <button class="cancelDelete">
                    <i class="text-xl fa-solid fa-xmark" style="color: #949494;"></i>
                </button>
            </div>
            
            <div class="text-center">
                <p class="mb-4 text-xl font-semibold">Are you sure you want to delete this course?</p>
                <p class="text-gray-600">This action cannot be undone.</p>
            </div>
            
            <div class="flex justify-center w-full mt-5">
                <button type="button" data-course-id="{{ $course->course_id }}" id="confirmDeleteCourseBtn" class="px-5 py-3 mx-2 mt-4 text-white rounded-lg bg-seagreen hover:bg-white hover:text-darthmouthgreen hover:border-2 hover:border-darthmouthgreen">Delete Course</button>
                <button type="button" class="px-5 py-3 mx-2 mt-4 text-white bg-red-500 rounded-lg cancelDelete hover:bg-white hover:text-red-500 hover:border-2 hover:border-red-500">Cancel</button>
            </div>
          
        </div>
    </div>


    <div id="addNewFileModal" class="fixed top-0 left-0 z-[90] flex items-center justify-center hidden w-full h-full ml-10 bg-gray-200 bg-opacity-75">
        <div class="modal-content bg-white p-4 rounded-lg shadow-lg w-[500px]">
            <div class="flex justify-end w-full">
                <button class="cancelAddNewFile">
                    <i class="text-xl fa-solid fa-xmark" style="color: #949494;"></i>
                </button>
            </div>
            
            <form id="uploadFileForm" action="{{ url("/instructor/course/$course->course_id/add_file") }}" method="POST" enctype="multipart/form-data">
                
                @csrf
                <div class="flex flex-col items-center w-full mt-5">
                    <label for="file" class="mb-2 text-lg font-semibold">Choose File:</label>
                    <input type="file" name="file" id="file" class="w-full p-2 border border-gray-300 rounded-md">
                </div>
    
                <div class="flex justify-center w-full mt-5">
                    <button type="submit" class="px-5 py-3 mx-2 mt-4 text-white rounded-lg bg-seagreen hover:bg-white hover:text-darthmouthgreen hover:border-2 hover:border-darthmouthgreen">Apply File</button>
                    <button type="button" class="px-5 py-3 mx-2 mt-4 text-white bg-red-500 rounded-lg cancelAddNewFile hover:bg-white hover:text-red-500 hover:border-2 hover:border-red-500">Cancel</button>
                </div>
            </form>
        </div>
    </div>
@endsection
