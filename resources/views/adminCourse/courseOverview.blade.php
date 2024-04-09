@extends('layouts.admin_layout')

@section('content')
<section class="w-full lg:h-screen md:w-3/4 lg:w-10/12">
    <div class="h-full px-2 py-4 pt-24 rounded-lg shadow-lg md:overflow-hidden md:overflow-y-scroll md:pt-6">
        <div class="flex justify-between px-10">
            <h1 class="text-4xl font-bold text-darthmouthgreen">Course Syllabus Management</h1>
            <div class="">
                <p class="text-xl font-semibold text-darthmouthgreen">{{$admin->admin_codename}}</p>
            </div>
        </div>
        <div class="mb-5">
            <a href="/admin/courseManage" class="">
                <i class="text-2xl md:text-3xl fa-solid fa-arrow-left" style="color: #000000;"></i>
            </a>
        </div>

        <div class="relative z-0 pb-4 text-black border rounded-lg shadow-lg">
            <div class="flex flex-col-reverse justify-between gap-4 p-3 lg:flex-row" id="courseInfo">
                <div class="" id="courseInfo_left">
                    <h1 class="text-4xl font-semibold">{{$course->course_name}}</h1>
                    <h4 class="text-2xl">Course ID: {{$course->course_id}}</h4>
                    <h4 class="mt-10 ">Course Level: {{$course->course_difficulty}}</h4>
                    <h4><i class="fa-regular fa-clock text-darthmouthgreen"></i> Est. Time:
                        {{$totalCourseTime}}</h4>
                    <h4 class="mt-3 ">Total Units: {{$totalSyllabusCount}}</h4>
                    <h4>&emsp;<i class="fa-regular fa-file text-darthmouthgreen"></i> Lessons:
                        {{$totalLessonsCount}}</h4>
                    <h4>&emsp;<i class="fa-regular fa-clipboard text-darthmouthgreen"></i> Activities:
                        {{$totalActivitiesCount}}</h4>
                    <h4>&emsp;<i class="fa-regular fa-pen-to-square text-darthmouthgreen"></i> Quizzes:
                        {{$totalQuizzesCount}}</h4>


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
                </div>
                <div class="flex flex-col items-center justify-between mr-10" id="courseInfo_right">
                    <img class="object-cover w-40 h-40 my-4 mb-10 rounded-full lg:w-40 lg:h-40"
                        src="{{ asset('storage/' . $course->profile_picture) }}" alt="Profile Picture">
                    <div class="flex flex-col space-y-2">
                        <a href="{{ url("/admin/courseManage/content/$course->course_id") }}" id="" class="btn btn-primary">Enter</a>
                        <button id="viewDetailsBtn" class="btn btn-warning">View
                            Details</button>
                    </div>
                </div>
            </div>
        </div>


        <div class="relative z-0 flex flex-col justify-between p-3 pb-4 mt-10 space-y-2 text-black border rounded-lg shadow-lg lg:space-y-0 lg:space-x-3 lg:flex-row"
            id="courseDescAndTopics">
            <div class="lg:w-7/12 overflow-y-auto h-[400px]" id="courseDesc">
                <h1 class="text-2xl font-semibold">Course Description</h1>
                <div class="whitespace-pre-line">
                    {{$course->course_description}}
                </div>
            </div>
            <div class="lg:w-5/12 overflow-y-auto h-[400px]" id="courseTopics">
                <h1 class="text-2xl font-semibold">Course Topics</h1>
                @foreach ($syllabus as $topic)
                @if ($topic->category === "LESSON")
                <h4 class="px-5 pt-5 text-lg"><i class="text-2xl fa-regular fa-file text-darthmouthgreen "></i> -
                    {{$topic->topic_title}}</h4>
                @elseif ($topic->category === "ACTIVITY")
                <h4 class="px-5 pt-5 text-lg"><i class="text-2xl fa-regular fa-clipboard text-darthmouthgreen "></i> -
                    {{$topic->topic_title}}</h4>
                @elseif ($topic->category === "QUIZ")
                <h4 class="px-5 pt-5 text-lg"><i class="text-2xl fa-regular fa-pen-to-square text-darthmouthgreen "></i>
                    - {{$topic->topic_title}}</h4>
                @endif
                @endforeach
            </div>
        </div>


        <div class="mt-5 h-[250px] flex justify-between flex-col lg:flex-row space-y-2 lg:space-y-0 lg:space-x-2"
            id="enrolledData">
            <div class="border-2 rounded border-primary lg:w-5/12" id="totalEnrollees">
                <h1 class="mt-10 text-2xl text-center">
                    <span class="text-6xl font-semibold text-darthmouthgreen">
                        {{$totalEnrolledCount}}
                    </span><br>
                    Learners Enrolled
                </h1>
            </div>
            <div class="flex items-center justify-between border-2 rounded border-primary lg:w-7/12"
                id="learnerProgressData">
                <canvas id="learnerProgressChart"></canvas>
            </div>
        </div>


        <div class="mt-16" id="learnerProgressArea">
            <div class="">
                <h1 class="text-2xl font-semibold">Enrolled Learners</h1>

            </div>

            <div class="p-3 overflow-auto">
                <table class="table w-full table-auto">
                    <thead class="text-left">
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
                                <a class="btn btn-primary" href="{{ url("instructor/viewProfile/$enrollee->learner_id")
                                    }}">
                                    view profile
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</section>




<div id="courseDetailsModal"
    class="z-[90] fixed top-0 left-0 hidden flex items-center justify-center w-full h-full overflow-hidden bg-gray-200 bg-opacity-75 md:py-4">
    <div class="w-full h-full p-4 overflow-auto bg-white rounded-lg shadow-lg md:w-3/5 modal-content">
        <div class="flex justify-end w-full">
            <button class="closeCourseDetailsModal">
                <i class="text-xl fa-solid fa-xmark" style="color: #949494;"></i>
            </button>
        </div>
        <div class="flex flex-col" id="content">
            <div class=" bg-darthmouthgreen rounded-s-xl rounded-e-xl" id="courseDetailsDirectory">
                <ul class="flex flex-row divide-x-2 divide-white">
                    <li class="w-full p-3 font-semibold text-center text-white rounded-s-xl hover:bg-white hover:text-darthmouthgreen bg-darthmouthgreen"
                        id="courseDetailsBtn">Course Details</li>
                    <li class="w-full p-3 font-semibold text-center text-white hover:bg-white hover:text-darthmouthgreen bg-darthmouthgreen"
                        id="learnersEnrolledBtn">Learners Enrolled</li>
                    <li class="w-full p-3 font-semibold text-center text-white hover:bg-white hover:text-darthmouthgreen bg-darthmouthgreen"
                        id="gradesheetBtn">Gradesheet</li>
                    <li class="w-full p-3 font-semibold text-center text-white hover:bg-white hover:text-darthmouthgreen bg-darthmouthgreen"
                        id="courseFilesBtn">Course Files</li>
                    <li class="w-full p-3 font-semibold text-center text-white rounded-e-xl hover:bg-white hover:text-darthmouthgreen bg-darthmouthgreen"
                        id="courseGradingBtn">Grading System</li>
                </ul>
            </div>

            <div class="py-5 mx-5" id="courseDetailsContentArea">
                <div class="flex flex-col-reverse items-center justify-between md:flex-row" id="courseInfoArea">

                    <div class="w-4/5 py-5 mx-10" id="courseInfo_left">
                        <h1 class="text-2xl font-semibold md:text-4xl" id="courseName">{{$course->course_name}}</h1>
                        <h4 class="text-xl">Course ID: {{$course->course_id}}</h4>
                        <h4 class="mt-10">Course Level: {{$course->course_difficulty}}</h4>
                        <h4 class=""><i class="fa-regular fa-clock text-darthmouthgreen"></i> Est. Time:
                            {{$totalCourseTime}}</h4>
                        <h4 class="mt-3 ">Total Units: {{$totalSyllabusCount}}</h4>
                        <h4>&emsp;<i class="fa-regular fa-file text-darthmouthgreen"></i> Lessons:
                            {{$totalLessonsCount}}</h4>
                        <h4>&emsp;<i class="fa-regular fa-clipboard text-darthmouthgreen"></i>
                            Activities: {{$totalActivitiesCount}}</h4>
                        <h4>&emsp;<i class="fa-regular fa-pen-to-square text-darthmouthgreen"></i>
                            Quizzes: {{$totalQuizzesCount}}</h4>
                        <h4 class="mt-10 text-xl">Course Description</h4>
                        <div class="whitespace-pre-line w-full overflow-y-auto h-[180px]" id="courseDescription">
                            {{$course->course_description}}
                        </div>
                        <div class="py-3">
                            <button id="deleteCourseBtn" data-course-id="{{ $course->course_id }}"
                                class="text-white btn btn-error">Delete
                                Course</button>
                        </div>

                    </div>
                    <div class="flex flex-col items-center justify-center w-full md:w-1/2" id="courseInfo_right">
                        <img class="object-cover w-40 h-40 my-4 mb-10 rounded-full lg:w-40 lg:h-40"
                            src="{{ asset('storage/' . $course->profile_picture) }}" alt="Profile Picture">
                        <h4 class="text-xl">{{$course->instructor_fname}} {{$course->instructor_lname}}</h4>
                        <h4 class="text-xl">INSTRUCTOR</h4>
                        <button id="courseEditBtn" class="btn btn-primary">Edit</button>
                    </div>
                </div>


                <div class="hidden w-full py-5" id="learnersEnrolledArea">
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>

                    <!-- start-generate-pdf -->
                    <div class="" id="generatedPdfArea">
                        <h1 id="courseNamePdf" class="text-4xl font-semibold">{{ $course->course_name }}</h1>
                        <h1 class="text-2xl font-semibold md:text-4xl">Learners Enrolled</h1>

                        <div class="overflow-auto">
                            <table class="table w-full table-auto">
                                <thead class="text-left text-white bg-darthmouthgreen">
                                    <th class="w-[150px]">Name</th>
                                    <th class="w-[150px]">Email</th>
                                    <th class="w-[150px]">Enrollment Status</th>
                                    <th class="w-[150px]">Date Enrolled</th>
                                    <th class="w-[150px]">Course Progress</th>
                                    <th class="w-[150px]"></th>
                                </thead>
                                <tbody class="">
                                    @forelse ($courseEnrollees as $enrollee)
                                    <tr class="border-b-2 border-gray-500">
                                        <td class="py-3 pl-5">{{ $enrollee->learner_fname }} {{ $enrollee->learner_lname
                                            }}</td>
                                        <td>{{ $enrollee->learner_email }}</td>
                                        <td>{{ $enrollee->status }}</td>
                                        <td>{{ $enrollee->created_at }}</td>
                                        <td>{{ $enrollee->course_progress }}</td>
                                        <td>
                                            <a href="{{ url("/instructor/profile/learner/$enrollee->learner_email") }}"
                                                class="btn btn-primary">View Profile</a>
                                        </td>
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
                    <button id="generateEnrolledLearnersBtn" class="my-3 btn btn-primary">Download
                        PDF</button>
                </div>


                <div class="hidden w-full py-5" id="gradesheetArea">
                    <div class="" id="exportExcelGrades">
                        <h1 id="courseNamePdf" class="text-2xl font-semibold md:text-4xl">{{ $course->course_name }}
                        </h1>
                        <h1 class="text-xl font-semibold">Enrollee Gradesheet</h1>
                        <div class="overflow-auto ">
                            <table id="gradesheet" class="table w-full table-auto">
                                <thead class="text-center text-white bg-darthmouthgreen">
                                    <th class="w-[150px] pl-5">Name</th>
                                    <th class="w-[150px]">Status</th>
                                    <th class="w-[150px]">Date Started</th>
                                    <th class="w-[150px]">Pre Assessment</th>

                                    @foreach ($activitySyllabus as $activity)
                                    <th class="w-[150px]">{{ $activity->activity_title }}</th>
                                    @endforeach

                                    @foreach ($quizSyllabus as $quiz)
                                    <th class="w-[150px]">{{ $quiz->quiz_title }}</th>
                                    @endforeach

                                    <th class="w-[150px]">Post Assessment</th>
                                    <th class="w-[150px]">Grade</th>
                                    <th class="w-[150px]">Remarks</th>
                                    <th class="w-[150px]">Date Finished</th>
                                </thead>

                                <tbody class="text-center">
                                    @forelse ($gradesheet as $grade)
                                    <tr>
                                        <td class="py-3">{{ $grade->learner_fname }} {{ $grade->learner_lname }}
                                        </td>
                                        <td>{{ $grade->course_progress }}</td>
                                        <td>{{ $grade->start_period }}</td>
                                        <td>{{$grade->pre_assessment->score}}</td>

                                        {{-- Display activity scores --}}
                                        @foreach ($activitySyllabus as $activity)
                                        @php
                                        $activityScore = $grade->activities->firstWhere('activity_id',
                                        $activity->activity_id);
                                        @endphp
                                        <td>{{ $activityScore ? $activityScore->average_score : '#' }}</td>
                                        @endforeach

                                        {{-- Display quiz scores --}}
                                        @foreach ($quizSyllabus as $quiz)
                                        @php
                                        $quizScore = $grade->quizzes->firstWhere('quiz_id', $quiz->quiz_id);
                                        @endphp
                                        <td>{{ $quizScore ? $quizScore->average_score : '#' }}</td>
                                        @endforeach

                                        <td>{{$grade->post_assessment->average_score}}</td>
                                        <td>{{$grade->grade}}</td>
                                        <td>{{$grade->remarks}}</td>
                                        <td>{{ $grade->finish_period }}</td>
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
                    <button id="generateGradesheetBtn" class="my-3 btn btn-primary">Export
                        Excel File</button>
                    <button id="generateGradesheetPDFBtn" class="my-3 btn btn-warning">Generate
                        PDF</button>
                </div>


                <div class="hidden w-full py-5" id="filesArea">
                    <h1 class="text-xl font-semibold">Your Files</h1>
                    <div class="overflow-auto">
                        <table class="table w-full table-auto">
                            <thead class="w-full text-center text-white bg-darthmouthgreen">
                                <th class="w-[150px]">File</th>
                                <th class="w-[150px]"></th>
                                <th class="w-[150px]"></th>
                                <th class="w-[150px]"></th>
                            </thead>
                            <tbody>

                                @foreach($courseFiles as $file)
                                <tr>
                                    <td class="">{{ basename($file) }}</td>
                                    <td>
                                        <a href="{{ Storage::url("$file") }}" target="_blank"
                                            class="btn btn-primary">View
                                            File</a>
                                    </td>
                                    <td>
                                        <a href="{{ Storage::url($file) }}" class="btn btn-warning"
                                            download>Download</a>
                                    </td>
                                    <td>
                                        <a href="{{ url("/admin/courseManage/$course->course_id/delete_file/" .
                                            basename($file)) }}" class="btn btn-error"
                                            onclick="return confirm('Are you sure you want to delete this
                                            file?')">Delete</a>
                                    </td>

                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                        <button id="addNewFileBtn" class="my-3 btn btn-primary">Add
                            New File</button>
                    </div>
                </div>

                <div class="hidden w-full py-5" id="courseGradesArea">
                    <h1 class="text-2xl font-semibold">Grading System</h1>
                    <div class="px-3 overflow-auto">
                        <div class="mt-3" id="activityPercentArea">
                            <label for="activity_percent" class=" text-darthmouthgreen">Activities
                                Grade</label><br>
                            <input class="w-full input input-bordered focus:input-primary" type="text"
                                name="activity_percent" id="activity_percent"
                                value="{{$gradingSystem->activity_percent}}" disabled>
                            <span id="activityPercentError" class="text-red-500"></span>
                        </div>

                        <div class="mt-3" id="quizPercentArea">
                            <label for="quiz_percent" class=" text-darthmouthgreen">Quizzes Grade</label><br>
                            <input class="w-full input input-bordered focus:input-primary" type="text"
                                name="quiz_percent" id="quiz_percent" value="{{$gradingSystem->quiz_percent}}" disabled>
                            <span id="quizPercentError" class="text-red-500"></span>
                        </div>

                        <div class="mt-3" id="preAssessmentPercentArea">
                            <label for="pre_assessment_percent" class=" text-darthmouthgreen">Pre Assessment
                                Grade</label><br>
                            <input class="w-full input input-bordered focus:input-primary" type="text"
                                name="pre_assessment_percent" id="pre_assessment_percent"
                                value="{{$gradingSystem->pre_assessment_percent}}" disabled>
                            <span id="preAssessmentPercentError" class="text-red-500"></span>
                        </div>

                        <div class="mt-3" id="postAssessmentPercentArea">
                            <label for="post_assessment_percent" class=" text-darthmouthgreen">Post Assessment
                                Grade</label><br>
                            <input class="w-full input input-bordered focus:input-primary" type="text"
                                name="post_assessment_percent" id="post_assessment_percent"
                                value="{{$gradingSystem->post_assessment_percent}}" disabled>
                            <span id="postAssessmentPercentError" class="text-red-500"></span>
                        </div>

                        <h1 id="totalPercent"></h1>
                        <span id="totalPercentError" class="text-red-500"></span>

                        <div class="flex mt-3 space-x-2" id="">
                            <button class="btn btn-warning" id="editCourseGradesBtn">Edit</button>
                            <button class="hidden btn btn-primary" id="saveCourseGradesBtn">Save</button>
                            <button class="hidden btn btn-error" id="cancelCourseGradesBtn">Cancel</button>
                        </div>
                    </div>
                </div>


            </div>
        </div>

    </div>
</div>


<div id="courseDetailsEditModal"
    class="z-[90] fixed top-0 left-0 flex items-center justify-center hidden w-full h-full bg-gray-200 bg-opacity-75">
    <div class="modal-content bg-white p-4 rounded-lg shadow-lg lg:w-[500px]">
        <div class="flex justify-end w-full">
            <button class="cancelEdit">
                <i class="text-xl fa-solid fa-xmark" style="color: #949494;"></i>
            </button>
        </div>

        <h2 class="mb-2 text-2xl font-semibold">Edit Course Details</h2>

        <label for="courseEditName">Course Name</label><br>
        <input id="courseEditName" type="text" class="w-full input input-bordered focus:input-primary"
            placeholder="your course name" value="{{ $course->course_name }}">
        <br><br>
        <label for="courseDescription" class="">Course Description</label><br>
        <textarea id="courseEditDescription" class="w-full h-40 input input-bordered focus:input-primary"
            placeholder="Your course description">{{ $course->course_description }}</textarea>

        <div class="flex justify-center w-full mt-5 space-x-2">
            <button id="saveCourseEditDetailsBtn" data-course-id="{{$course->course_id}}" class="btn btn-primary">Apply
                Changes</button>
            <button id="" class="btn btn-error cancelEdit">Cancel</button>
        </div>
    </div>
</div>


<div id="addNewFileModal"
    class="z-[90] fixed top-0 left-0 flex items-center justify-center hidden w-full h-full bg-gray-200 bg-opacity-75">
    <div class="modal-content bg-white p-4 rounded-lg shadow-lg lg:w-[500px]">
        <div class="flex justify-end w-full">
            <button class="cancelAddNewFile">
                <i class="text-xl fa-solid fa-xmark" style="color: #949494;"></i>
            </button>
        </div>

        <form id="uploadFileForm" action="{{ url("/admin/courseManage/$course->course_id/add_file") }}" method="POST"
            enctype="multipart/form-data">

            @csrf
            <div class="flex flex-col items-center w-full mt-5">
                <label for="file" class="mb-2 text-lg font-semibold">Choose File:</label>
                <input type="file" name="file" id="file"
                    class="w-full file-input file-input-bordered file-input-primary">
            </div>

            <div class="flex justify-center w-full mt-5 space-x-2">
                <button type="submit" class="btn btn-primary">Apply
                    File</button>
                <button type="button" class="btn btn-error cancelAddNewFile">Cancel</button>
            </div>
        </form>
    </div>
</div>

<div id="deleteCourseModal"
    class="z-[90] fixed hidden top-0 left-0 flex items-center justify-center w-full h-full bg-gray-200 bg-opacity-75">
    <div class="modal-content bg-white p-4 rounded-lg shadow-lg lg:w-[500px]">
        <div class="flex justify-end w-full">
            <button class="cancelDelete">
                <i class="text-xl fa-solid fa-xmark" style="color: #949494;"></i>
            </button>
        </div>

        <div class="text-center">
            <p class="mb-4 text-xl font-semibold">Are you sure you want to delete this course?</p>
            <p class="text-gray-600">This action cannot be undone.</p>
        </div>

        <div class="flex justify-center w-full mt-5 space-x-2">
            <button type="button" data-course-id="{{ $course->course_id }}" id="confirmDeleteCourseBtn"
                class="btn btn-error">Delete
                Course</button>
            <button type="button" class="btn cancelDelete">Cancel</button>
        </div>

    </div>
</div>
@endsection