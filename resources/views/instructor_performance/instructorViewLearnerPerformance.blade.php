@extends('layouts.instructor_layout')

@section('content')
    {{-- MAIN --}}
<section class="w-full h-auto md:h-screen md:w-3/4 lg:w-10/12">
    <div class="h-full px-2 py-4 pt-24 rounded-lg shadow-lg md:overflow-hidden md:overflow-y-scroll md:pt-0">
        <a href="{{ url("/instructor/performances/course/$course->course_id") }}" class="my-2 bg-gray-300 rounded-full ">
            <svg  xmlns="http://www.w3.org/2000/svg" height="30" viewBox="0 -960 960 960" width="24"><path d="M560-240 320-480l240-240 56 56-184 184 184 184-56 56Z"/></svg>
        </a>
        <h1 class="mx-5 text-xl font-normal md:text-3xl">
            <span class="text-4xl font-bold text-darthmouthgreen">{{ $course->course_name }}</span><br>
            <span class="mt-5 text-2xl font-semibold text-darthmouthgreen">{{ $learner->learner_fname }} {{ $learner->learner_lname }}' course performance </span>
            <hr class="mt-6 border-t-2 border-gray-300">
            <br>
            PERFORMANCE DASHBOARD
        </h1>
    
        <div class="flex md:space-x-2" id="genInfo">
            <div class="relative w-1/2 h-[300px] border-2 border-darthmouthgreen flex flex-col justify-between py-2 md:py-4" id="totalLearnerPerformancePercent">
                <div class="flex justify-center text-center item-center">
                    <i class="absolute -translate-x-1/2 -translate-y-1/2 lg:px-4 lg:opacity-100 lg:relative fa-10x top-1/2 left-1/2 opacity-20 lg:left-auto lg:-translate-x-0 lg:top-auto lg:-translate-y-0 fa-solid fa-user text-darthmouthgreen"></i>
                    <p class="text-2xl font-bold"><span class="text-8xl text-darthmouthgreen" id="learnerPerformancePercent">0</span><span class="text-darthmouthgreen text-8xl">%</span><br>Syllabus Topics Completed</p>
                </div>
                <div class="flex flex-col justify-center lg:flex-row">
                    <div class="flex items-center">
                        <div class="w-3 h-3 mx-2 rounded-full bg-darthmouthgreen"></div>
                        <p class="text-sm font-bold">COMPLETED: <span id="totalCompletedSyllabus" class="">0</span></p>
                    </div>

                    <div class="flex items-center">
                        <div class="w-3 h-3 mx-2 bg-yellow-400 rounded-full"></div>
                        <p class="text-sm font-bold">IN PROGRESS: <span id="totalInProgressSyllabus" class="">0</span></p>
                    </div>

                    <div class="flex items-center">
                        <div class="w-3 h-3 mx-2 bg-red-700 rounded-full"></div>
                        <p class="text-sm font-bold">NOT YET STARTED: <span id="totalLockedSyllabus" class="">0</span></p>
                    </div>
                </div>
            </div>

            <div class="relative w-1/2 md:w-3/5 h-[300px] border-2 border-darthmouthgreen flex flex-col justify-between py-2 md:py-4 items-center" id="averageLearnerProgressTime">
                <div class="flex items-center justify-center h-full text-center">
    
                    <i class="absolute -translate-x-1/2 -translate-y-1/2 lg:px-4 lg:opacity-100 lg:relative fa-10x top-1/2 left-1/2 opacity-20 lg:top-auto lg:left-auto lg:-translate-x-0 lg:-translate-y-0 fa-solid fa-clock text-darthmouthgreen "></i>
                        <p class="text-2xl font-bold"><span class="text-darthmouthgreen lg:text-8xl" id="averageLearnerProgress">0</span><br>Average Time of Completion</p>
                </div>
            </div>
        </div>

        <hr class="my-6 border-t-2 border-gray-300">

        <div class="flex mx-auto h-[300px] border-2 border-darthmouthgreen overflow-auto" id="learnerSyllabusProgressTable">
            <table class="w-full table table-fixed">
                <thead class="bg-primary">
                    <th >Topic ID</th>
                    <th >Topic Title</th>
                    <th >Category</th>
                    <th >Status</th>
                </thead>
                <tbody style="max-height: 300px;">
                    @foreach ($learnerCourse as $course)
                    <tr class="text-center">
                        <td>{{ $course->topic_id }}</td>
                        <td>{{ $course->topic_title }}</td>
                        <td>{{ $course->category }}</td>
                        <td>{{ $course->status }}</td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>

        <hr class="my-6 border-t-2 border-gray-300">

        <h1 class="mx-5 mb-5 text-2xl">Lesson Progress</h1>
        <!--<div class=" px-7" id="learnerLessonProgressChartContainer">-->
        <!--    <div class="flex justify-between w-full">-->
        <!--        <div class="w-1/2 h-[350px] ml-5 border-2 border-darthmouthgreen" id="learnerLessonProgressChartArea">-->
        <!--            <canvas id="learnerLessonProgressChart"></canvas>-->
        <!--        </div>-->

        <!--        <div class="ml-5 w-1/2 h-[350px] flex flex-col justify-between" id="learnerLessonProgressChartTable">-->
                    
        <!--            <div class="border-2 h-[230px] border-darthmouthgreen overflow-y-scroll" style="max-height: 230px;">-->
        <!--                <table class="w-full table-fixed">-->
        <!--                    <thead class="text-white text-md bg-darthmouthgreen">-->
        <!--                        <th class="w-1/5">Lesson Title</th>-->
        <!--                        <th class="w-1/5">Status</th>-->
        <!--                        <th class="w-1/5">Start Period</th>-->
        <!--                        <th class="w-1/5">Finish Period</th>-->
        <!--                    </thead>-->
        <!--                    <tbody class="overflow-y-auto text-sm text-center learnerLessonProgressRowData" style="max-height: 220px;">-->
                                <!-- Your table rows go here -->
        <!--                    </tbody>-->
        <!--                </table>-->
        <!--            </div>-->
                    
        <!--            <div class="flex items-center px-10 py-3 mt-3 border-2 border-darthmouthgreen">-->
        <!--                <i class="text-4xl fa-solid fa-clock text-darthmouthgreen"></i>-->
        <!--                <p class="flex items-center mx-5 mt-3 text-xl font-bold"><span class="text-darthmouthgreen text-[50px] mr-5" id="averageLearnerLessonProgress">0</span>Average Time of Completion</p>-->
        <!--            </div>-->
        <!--        </div>-->
                
        <!--    </div>-->
            
        <!--    <div class="w-full mt-5 h-[350px] ml-5 border-2 border-darthmouthgreen" id="learnerLessonProgressLineChartArea">-->
        <!--        <canvas id="learnerLessonProgressLineChart"></canvas>-->
        <!--    </div>-->
        <!--</div>-->
        
        <div class="space-y-2 lg:space-y-0" id="learnerLessonProgressChartContainer">
            <div class="flex flex-col justify-between w-full space-y-2 lg:space-x-2 lg:space-y-0 lg:flex-row">
                <div class="lg:w-1/2 h-[350px] border-2 border-darthmouthgreen" id="learnerLessonProgressChartArea">
                    <canvas id="learnerLessonProgressChart"></canvas>
                </div>

                <div class="lg:w-1/2 h-[350px] flex flex-col justify-between space-y-2" id="learnerLessonProgressChartTable"> 
                    
                    <div class="border-2 h-[230px] border-darthmouthgreen overflow-auto" style="max-height: 230px;">
                        <table class="table w-full table-fixed">
                            <thead class="text-white text-md bg-darthmouthgreen">
                                <th class="w-[150px]">Lesson Title</th>
                                <th class="w-[150px]">Status</th>
                                <th class="w-[150px]">Start Period</th>
                                <th class="w-[150px]">Finish Period</th>
                            </thead>
                            <tbody class="overflow-y-auto text-sm text-center learnerLessonProgressRowData" style="max-height: 220px;">
                                <!-- Your table rows go here -->
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="relative flex flex-col py-4 border-2 lg:flex-row lg:flex-rowitems-center border-darthmouthgreen">
                        <i class="absolute -translate-x-1/2 -translate-y-1/2 lg:px-4 lg:opacity-100 lg:relative fa-5x top-1/2 left-1/2 opacity-20 lg:top-auto lg:left-auto lg:-translate-x-0 lg:-translate-y-0 fa-solid fa-clock text-darthmouthgreen "></i>
                        <p class="flex items-center mt-3 text-xl font-bold"><span class="text-darthmouthgreen text-4xl px-2" id="averageLearnerLessonProgress">0</span>Average Time of Completion</p>
                    </div>
                </div>
                
            </div>
            
            <div class="w-full h-[350px] border-2 border-darthmouthgreen" id="learnerLessonProgressLineChartArea">
                <canvas id="learnerLessonProgressLineChart"></canvas>
            </div>
        </div>

        
        <hr class="my-6 border-t-2 border-gray-300">

        <h1 class="mb-5 text-2xl">Activity Progress</h1>
        <div class="space-y-2" id="learnerActivityProgressChartContainer">
            <div class="flex flex-col justify-between space-y-2 lg:flex-row lg:space-x-2 lg:space-y-0">
                <div class="md:w-1/2 h-[350px] border-2 border-darthmouthgreen" id="learnerActivityProgressChartArea">
                    <canvas id="learnerActivityProgressChart"></canvas>
                </div>

                <div class="md:w-1/2 h-[350px] border-2 border-darthmouthgreen overflow-auto" id="learnerActivityProgressChartTable">
                    <table class="table-fixed">
                        <thead class="text-white text-md bg-darthmouthgreen">
                            <th class="w-[130px] py-2">Activity Title</th>
                            <th class="w-[130px] py-2">Status</th>
                            <th class="w-[130px] py-2">Start Period</th>
                            <th class="w-[130px] py-2">Finish Period</th>
                            <th class="w-[130px] py-2"></th>
                        </thead>
                        <tbody class="text-sm text-center learnerActivityProgressRowData" style="max-height: 350px;">
                    
                        </tbody>
                    </table>
                </div>
            </div>
            

            <div class="flex flex-col justify-between space-y-2 lg:flex-row lg:space-x-2 lg:space-y-0">
                <div class="md:w-full h-[350px] border-2 border-darthmouthgreen" id="learnerActivityProgressLineChartArea">
                    <canvas id="learnerActivityProgressLineChart"></canvas>
                </div>
                <div class="md:w-1/3 h-[350px] border-2 border-darthmouthgreen"  id="learnerActivityProgressRemarksChartArea">
                    <canvas id="learnerActivityProgressRemarksChart"></canvas>
                </div>
            </div>
           
        </div>

        <hr class="my-6 border-t-2 border-gray-300">

        <h1 class="mb-5 text-2xl ">Quiz Progress</h1>
        <div class="" id="learnerQuizProgressChartContainer">
            <div class="flex flex-col justify-between space-y-2 md:flex-row md:space-x-2 md:space-y-0">
                <div class="md:w-1/3 h-[350px] border-2 border-darthmouthgreen" id="learnerQuizProgressChartArea">
                    <canvas id="learnerQuizProgressChart"></canvas>
                </div>

                <div class="md:w-2/3 h-[350px] border-2 border-darthmouthgreen overflow-auto" id="learnerQuizProgressChartTable">
                    <table class="w-full mt-5 table-fixed">
                        <thead class="text-white text-md bg-darthmouthgreen">
                            <th class="py-2 w-[130px]">Quiz Title</th>
                            <th class="py-2 w-[130px]">Status</th>
                            <th class="py-2 w-[130px]">Attempt</th>
                            <th class="py-2 w-[130px]">Score</th>
                            <th class="py-2 w-[130px]">Remarks</th>
                            <th class="py-2 w-[130px]">Start Period</th>
                            <th class="py-2 w-[130px]">Finish Period</th>
                            <th class="py-2 w-[130px]"></th>
                        </thead>
                        <tbody class="text-sm text-center learnerQuizProgressRowData">
        
                        </tbody>
                    </table>
                </div>
            </div>
            
            <div class="flex flex-col justify-between space-y-2 md:flex-row md:space-x-2 md:space-y-0">
                <div class="md:w-2/3 mt-5 h-[350px] ml-5 border-2 border-darthmouthgreen" id="learnerQuizProgressLineChartArea">
                    <canvas id="learnerQuizProgressLineChart"></canvas>
                </div>
                <div class="md:w-1/3 mt-5 h-[350px] ml-5 border-2 border-darthmouthgreen"  id="learnerQuizProgressRemarksChartArea">
                    <canvas id="learnerQuizProgressRemarksChart"></canvas>
                </div>
            </div>
        </div>
     </div>
</section>  
@endsection

