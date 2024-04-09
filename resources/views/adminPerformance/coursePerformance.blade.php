@extends('layouts.admin_layout')

@section('content')
<section class="w-full h-auto text-black md:w-3/4 md:h-screen lg:w-10/12">
    <div class="h-full px-2 py-4 pt-12 rounded-lg shadow-lg md:overflow-auto md:pt-6">
        <div class="flex items-center justify-between p-3">
            <h1 class="text-2xl font-bold text-darthmouthgreen md:text-3xl lg:text-4xl">Performance Overview</h1>
            <div class="">
                <p class="font-semibold text-darthmouthgreen md:text-lg">{{$admin->admin_codename}}</p>
            </div>
        </div>

        <div class="mt-10">
            <div class="mb-5">
                <a href="/admin/performance" class="">
                    <i class="text-2xl md:text-3xl fa-solid fa-arrow-left" style="color: #000000;"></i>
                </a>
            </div>
            <h1 class="mx-5 text-2xl font-semibold">{{$course->course_name}}'s Overview</h1>
            <hr class="my-6 border-t-2 border-gray-300">
        </div>


        <div class="flex w-full space-x-2" id="genInfo">
            <div class="relative w-1/2 md:w-3/5 lg:h-[300px] border-2 border-darthmouthgreen flex flex-col justify-between py-2 md:py-4"
                id="totalLearnersArea">
                <div class="flex justify-center text-center item-center">

                    <i
                        class="absolute -translate-y-1/2 md:px-4 md:opacity-100 md:relative fa-solid fa-user text-darthmouthgreen fa-10x opacity-20 top-1/2"></i>
                    <p class="text-2xl font-bold"><span class="text-8xl text-darthmouthgreen"
                            id="totalLearnerCourseCount">0</span><br>Total Learner</p>
                </div>
                <div class="flex flex-col justify-center md:flex-row">
                    <div class="flex items-center">
                        <div class="w-3 h-3 mx-3 rounded-full bg-darthmouthgreen"></div>
                        <p class="font-bold text-md">Approved: <span id="totalApprovedCourse" class="">0</span></p>
                    </div>

                    <div class="flex items-center">
                        <div class="w-3 h-3 mx-3 bg-yellow-400 rounded-full"></div>
                        <p class="font-bold text-md">Pending: <span id="totalPendingCourse" class="">0</span></p>
                    </div>

                    <div class="flex items-center">
                        <div class="w-3 h-3 mx-3 bg-red-700 rounded-full"></div>
                        <p class="font-bold text-md">Rejected: <span id="totalRejectedCourse" class="">0</span></p>
                    </div>
                </div>
            </div>

            <div class="relative w-1/2 md:w-3/5 lg:h-[300px] border-2 border-darthmouthgreen flex flex-col justify-between py-2 md:py-4"
                id="totalLearnersArea">
                <div class="flex justify-center text-center item-center">

                    <i
                        class="absolute -translate-y-1/2 md:px-4 md:opacity-100 md:relative fa-solid fa-book-bookmark text-darthmouthgreen fa-10x opacity-20 top-1/2"></i>
                    <p class="text-2xl font-bold"><span class="text-8xl text-darthmouthgreen"
                            id="totalSyllabusCount">0</span><br>Total Topics</p>
                </div>

                <div class="flex flex-col justify-center md:flex-row">
                    <div class="flex items-center mx-1">
                        <i class="mx-3 text-xl fa-solid fa-file text-darthmouthgreen"></i>
                        <p class="font-bold text-md">Lessons: <span id="totalLessonsCount" class="">0</span></p>
                    </div>

                    <div class="flex items-center mx-1">
                        <i class="mx-3 text-xl fa-solid fa-clipboard text-darthmouthgreen"></i>
                        <p class="font-bold text-md">Activities: <span id="totalActivitiesCount" class="">0</span></p>
                    </div>

                    <div class="flex items-center mx-1">
                        <i class="mx-3 text-xl fa-solid fa-pen-to-square text-darthmouthgreen"></i>
                        <p class="font-bold text-md">Quizzes: <span id="totalQuizzesCount" class="">0</span></p>
                    </div>
                </div>
            </div>
        </div>

        <hr class="my-6 border-t-2 border-gray-300">

        <h1 class="p-3 text-2xl">Course Progress</h1>

        <div class="flex flex-col justify-between space-y-2 lg:flex-row lg:space-y-0 lg:space-x-2"
            id="learnerCourseProgressArea">
            <div class="lg:w-3/5 lg:h-[350px] border-2 border-darthmouthgreen" id="learnerCourseProgressChart">
                <canvas class="p-5" id="learnerCourseDataChart"></canvas>
            </div>

            <div class="lg:w-2/5 max-h-[350px] border-2 border-darthmouthgreen overflow-auto"
                id="learnerCourseListArea">
                <table id="learnerCourseTable" class="table w-full table-auto">
                    <thead class="text-white bg-darthmouthgreen">
                        <th class="w-1/5">Name</th>
                        <th class="w-1/5">Date Enrolled</th>
                        <th class="w-1/5">Progress</th>
                        <th class="w-1/5"></th>
                    </thead>
                    <tbody class="learnerCourseRowData" style="max-height: 300px;">

                    </tbody>
                </table>
            </div>


        </div>

        <hr class="my-6 border-t-2 border-gray-300">

        <h1 class="p-3 text-2xl h-">Grades Overview</h1>
        <div class="w-full overflow-y-auto border-2 border-darthmouthgreen" id="gradesheet">
            <h1 class="p-3 text-4xl font-semibold">Enrollee Gradesheet</h1>
            <div class=" overflow-auto h-[350px]">
                <table id="gradesheet" class="table w-full table-auto">
                    <thead class="text-center text-white bg-darthmouthgreen">
                        <th class="w-[150px]">Name</th>
                        <th class="w-[150px]">Status</th>
                        <th class="w-[150px]">Date Started</th>
                        <th class="w-[150px]">Pre Assessment</th>

                        @foreach ($activitySyllabus as $activity)
                        <th class="w-[150px]">{{ $activity->activity_title }} /({{$activity->total_score}})</th>
                        @endforeach

                        @foreach ($quizSyllabus as $quiz)
                        <th class="w-[150px]">{{ $quiz->quiz_title }} /({{$quiz->total_score}})</th>
                        @endforeach

                        <th class="w-[150px]">Post Assessment</th>
                        <th class="w-[150px]">Grade</th>
                        <th class="w-[150px]">Remarks</th>
                        <th class="w-[150px]">Date Finished</th>
                    </thead>

                    <tbody class="text-center">
                        @forelse ($gradesheet as $grade)
                        <tr>
                            <td class="">{{ $grade->learner_fname }} {{ $grade->learner_lname }}</td>
                            <td>{{ $grade->course_progress }}</td>
                            <td>{{ $grade->start_period }}</td>
                            <td>{{$grade->pre_assessment->score}}</td>

                            {{-- Display activity scores --}}
                            @foreach ($activitySyllabus as $activity)
                            @php
                            $activityScore = $grade->activities->firstWhere('activity_id', $activity->activity_id);
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

        @if($learnerPreAssessmentData)
        <hr class="my-6 border-t-2 border-gray-300">

        <h1 class="p-3 text-2xl ">Pre Assessment Overview</h1>
        <div class="flex" id="preAssessmentData">
            <div class="w-full max-h-[500px] overflow-auto border-2 border-darthmouthgreen"
                id="preAssessmentDataTableArea">
                <table class="table w-full table-auto">
                    <thead class="text-white bg-darthmouthgreen">
                        <th class="w-[150px]">Name</th>
                        <th class="w-[150px]">Date Taken</th>
                        <th class="w-[150px]">Status</th>
                        <th class="w-[150px]">Score</th>
                        <th class="w-[150px]">Remarks</th>
                        <th class="w-[150px]">Finish Period</th>
                        <th class="w-[150px]"></th>
                    </thead>
                    <tbody class="text-center ">
                        @forelse ($learnerPreAssessmentData as $preAssessmentData)
                        <tr>
                            <td>{{$preAssessmentData->learner_fname}} {{$preAssessmentData->learner_lname}}</td>
                            <td>{{$preAssessmentData->start_period}}</td>
                            <td>{{$preAssessmentData->status}}</td>
                            <td>{{$preAssessmentData->score}}</td>
                            <td>{{$preAssessmentData->remarks}}</td>
                            <td>{{$preAssessmentData->finish_period}}</td>
                            <td>
                                <a href="{{  url("/admin/performance/learners/view/$preAssessmentData->course_id/$preAssessmentData->learner_course_id/pre_assessment/view_output")}}"
                                    class="btn btn-primary">view</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td>No Data available</td>
                        </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>
        @endif

        @if($learnerPostAssessmentData)
        <hr class="my-6 border-t-2 border-gray-300">

        <h1 class="p-3 text-2xl">Post Assessment Overview</h1>
        <div class="flex" id="postAssessmentData">
            <div class="w-full max-h-[500px] border-2 overflow-auto border-darthmouthgreen"
                id="postAssessmentDataTableArea">
                <table class="table w-full table-auto">
                    <thead class="text-white bg-darthmouthgreen">

                        <th class="w-[150px]">Name</th>
                        <th class="w-[150px]">Date Taken</th>
                        <th class="w-[150px]">Status</th>
                        <th class="w-[150px]">Score</th>
                        <th class="w-[150px]">Attempts</th>
                        <th class="w-[150px]">Remarks</th>
                        <th class="w-[150px]">Finish Period</th>
                        <th class="w-[150px]"></th>
                    </thead>
                    <tbody class="text-center">
                        @forelse ($learnerPostAssessmentData as $postAssessment)
                        <tr>
                            <td>{{$postAssessment->learner_fname}} {{$postAssessment->learner_lname}}</td>
                            <td class="">{{$postAssessment->start_period}}</td>
                            <td>{{$postAssessment->status}}</td>
                            <td>{{$postAssessment->score}}</td>
                            <td>{{$postAssessment->attempt}}</td>
                            <td>{{$postAssessment->remarks}}</td>
                            <td>{{$postAssessment->finish_period}}</td>
                            <td>
                                <a href="{{  url("/admin/performance/learners/view/$postAssessment->course_id/$postAssessment->learner_course_id/post_assessment/view_output/$postAssessment->attempt")}}"
                                    class="btn btn-primary">view</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td>no data available</td>
                        </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>
        @endif
        <hr class="my-6 border-t-2 border-gray-300">
        <h1 class="mx-5 mb-5 text-2xl">Syllabus Overview</h1>

        <div class="flex flex-col items-center justify-center w-full space-y-2" id="topicDetailsArea">
            <div class="w-full" id="selectTopicArea">
                <select name="" class="w-full input input-bordered focus:input-primary" id="selectTopic">
                    <option value="" disabled selected>Choose Topic</option>
                    @foreach ($syllabus as $topic)
                    <option value="{{ $topic->syllabus_id }}">{{ $topic->topic_title }}</option>
                    @endforeach
                </select>
            </div>

            <div class="w-full max-h-[400px] border-2 border-darthmouthgreen" id="learnerCourseTopicProgressChart">
                <canvas id="learnerTopicDataChart"></canvas>
            </div>

            <div class="flex flex-col w-full" id="learnerCourseTopicProgressTable">
                <a href="" method="GET" class="text-right underline text-primary">view more details</a>
                <div class="overflow-auto mt-7">
                    <table id="learnerSyllabusTable" class="table w-full table-auto">
                        <thead class="text-white bg-darthmouthgreen">
                            <th class="w-[150px]">Name</th>
                            <th class="w-[150px]">Date Enrolled</th>
                            <th class="w-[150px]">Progress</th>
                            <th class="w-[150px]">Start Date</th>
                            <th class="w-[150px]">Finish Date</th>
                            <th class="w-[150px]"></th>
                        </thead>
                        <tbody class="learnerSyllabusRowData">

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection