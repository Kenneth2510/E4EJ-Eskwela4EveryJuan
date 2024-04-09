@extends('layouts.admin_layout')

@section('content')
<section class="w-full h-auto text-black md:h-screen lg:w-10/12">
    <div class="h-full px-2 py-4 pt-12 rounded-lg shadow-lg md:overflow-auto md:pt-6">
        <div class="flex items-center justify-between p-3 md:py-8">
            <h1 class="text-2xl font-bold text-darthmouthgreen md:text-3xl lg:text-4xl">Performance Overview</h1>
            <div class="">
                <p class="font-semibold text-darthmouthgreen md:text-lg">{{$admin->admin_codename}}</p>
            </div>
        </div>

        <div class="mt-10">
            <h1 class="mx-5 text-2xl font-semibold">Learner Overview</h1>
            <hr class="my-6 border-t-2 border-gray-300">
        </div>

        <div class="w-full mt-10 space-y-2" id="learnerOverviewArea">
            <div class="flex flex-col mt-5 space-y-2 lg:flex-row lg:space-y-0 lg:space-x-2"
                id="learnerOverviewArea_upper">
                <div class="lg:w-1/4 flex flex-col justify-evenly items-center border border-darthmouthgreen rounded-xl lg:h-[325px]"
                    id="totalLearnerNumberArea">
                    <div class="text-center">
                        <h1 class="text-6xl font-bold text-darthmouthgreen" id="totalLearners">0</h1>
                        <p class="w-3/4 mx-auto font-semibold text-darthmouthgreen">total learners</p>
                    </div>
                    <div class="">
                        <a href="{{ url("/admin/performance/learners") }}"
                            class="text-right underline text-darthmouthgreen text-md">view list of learners</a>
                    </div>

                </div>
                <div class="lg:w-3/4  border border-darthmouthgreen rounded-xl lg:h-[325px] p-4"
                    id="dateRegisteredDataArea">
                    <h1 class="p-3 text-xl font-semibold">Registered Learners</h1>
                    <select name="dateRegisteredDataFilter" class="w-full input input-bordered focus:input-primary"
                        id="dateRegisteredDataFilter">
                        <option value="daily">daily</option>
                        <option value="weekly">weekly</option>
                        <option value="monthly">monthly</option>
                    </select>
                    <div class="w-full p-3 h-3/4" id="dateRegisteredData_dayArea">
                        <canvas class="" id="dateRegisteredData_day"></canvas>
                    </div>
                    <div class="hidden w-full p-3 h-3/4" id="dateRegisteredData_weekArea">
                        <canvas class="" id="dateRegisteredData_week"></canvas>
                    </div>
                    <div class="hidden w-full p-3 h-3/4" id="dateRegisteredData_monthArea">
                        <canvas class="" id="dateRegisteredData_month"></canvas>
                    </div>
                </div>
            </div>
            <div class="flex flex-col w-full space-y-2 lg:flex-row lg:space-y-0 lg:space-x-2"
                id="learnerOverviewArea_lower">
                <div class="lg:w-3/5 border border-darthmouthgreen rounded-xl h-[325px] p-4" id="AvgSessionDataArea">
                    <h1 class="p-3 text-xl font-semibold">Learners Session Data</h1>
                    <select name="AvgSessionDataFilter" class="w-full input input-bordered input-primary"
                        id="AvgSessionDataFilter">
                        {{-- <option value="hourly">hourly</option> --}}
                        <option value="daily">daily</option>
                        <option value="weekly">weekly</option>
                        <option value="monthly">monthly</option>
                    </select>

                    {{-- <div class="w-full h-full p-5 pb-10" id="AvgSessionData_hourArea">
                        <canvas id="AvgSessionData_hour"></canvas>
                    </div> --}}
                    <div class="w-full p-3 h-3/4" id="AvgSessionData_dayArea">
                        <canvas id="AvgSessionData_day"></canvas>
                    </div>
                    <div class="hidden w-full p-3 h-3/4" id="AvgSessionData_weekArea">
                        <canvas id="AvgSessionData_week"></canvas>
                    </div>
                    <div class="hidden w-full p-3 h-3/4" id="AvgSessionData_monthArea">
                        <canvas id="AvgSessionData_month"></canvas>
                    </div>
                </div>
                <div class="lg:w-2/5 border border-darthmouthgreen rounded-xl h-[325px] p-4"
                    id="totalLearnerStatusArea">
                    <h1 class="text-xl font-semibold">Learners Status</h1>
                    <canvas class="p-5" id="totalLearnerStatus"></canvas>
                </div>
            </div>
        </div>


        <div class="w-full mt-10">
            <h1 class="p-3 text-2xl font-semibold">Instructor Overview</h1>
            <hr class="my-6 border-t-2 border-gray-300">
        </div>

        <div class="w-full mt-10 space-y-2" id="instructorOverviewArea">
            <div class="flex flex-col mt-5 space-y-2 lg:flex-row lg:space-y-0 lg:space-x-2"
                id="instructorOverviewArea_upper">
                <div class="lg:w-1/4 flex flex-col justify-evenly items-center border border-darthmouthgreen rounded-xl lg:h-[325px]"
                    id="totalInstructorNumberArea">
                    <div class="text-center">
                        <h1 class="text-6xl font-bold text-darthmouthgreen" id="totalInstructors">0</h1>
                        <p class="w-3/4 mx-auto font-semibold text-darthmouthgreen">total instructors</p>
                    </div>
                    <div class="">
                        <a href="{{ url("/admin/performance/instructors") }}"
                            class="text-right underline text-darthmouthgreen text-md">view list of instructors</a>
                    </div>

                </div>
                <div class="lg:w-3/4 border border-darthmouthgreen rounded-xl lg:h-[325px] p-4"
                    id="i_dateRegisteredDataArea">
                    <h1 class="p-3 text-xl font-semibold">Registered Instructors</h1>
                    <select name="i_dateRegisteredDataFilter" class="w-full input input-bordered"
                        id="i_dateRegisteredDataFilter">
                        <option value="daily">daily</option>
                        <option value="weekly">weekly</option>
                        <option value="monthly">monthly</option>
                    </select>
                    <div class="w-full p-3 h-3/4 " id="i_dateRegisteredData_dayArea">
                        <canvas class="" id="i_dateRegisteredData_day"></canvas>
                    </div>
                    <div class="hidden w-full p-3 h-3/4" id="i_dateRegisteredData_weekArea">
                        <canvas class="" id="i_dateRegisteredData_week"></canvas>
                    </div>
                    <div class="hidden w-full p-3 h-3/4" id="i_dateRegisteredData_monthArea">
                        <canvas class="" id="i_dateRegisteredData_month"></canvas>
                    </div>
                </div>
            </div>
            <div class="flex flex-col mt-5 space-y-2 lg:flex-row lg:space-y-0 lg:space-x-2"
                id="instructorOverviewArea_lower">
                <div class="lg:w-3/5 border border-darthmouthgreen rounded-xl h-[325px] p-4" id="i_AvgSessionDataArea">
                    <h1 class="p-3 text-xl font-semibold">Instructor Session Data</h1>
                    <select name="i_AvgSessionDataFilter" class="w-full input input-bordered"
                        id="i_AvgSessionDataFilter">
                        {{-- <option value="hourly">hourly</option> --}}
                        <option value="daily">daily</option>
                        <option value="weekly">weekly</option>
                        <option value="monthly">monthly</option>
                    </select>

                    {{-- <div class="w-full h-full p-5 pb-10" id="AvgSessionData_hourArea">
                        <canvas id="AvgSessionData_hour"></canvas>
                    </div> --}}
                    <div class="w-full p-3 h-3/4" id="i_AvgSessionData_dayArea">
                        <canvas id="i_AvgSessionData_day"></canvas>
                    </div>
                    <div class="hidden w-full p-3 h-3/4" id="i_AvgSessionData_weekArea">
                        <canvas id="i_AvgSessionData_week"></canvas>
                    </div>
                    <div class="hidden w-full p-3 h-3/4" id="i_AvgSessionData_monthArea">
                        <canvas id="i_AvgSessionData_month"></canvas>
                    </div>
                </div>
                <div class="lg:w-2/5 border border-darthmouthgreen rounded-xl h-[325px] p-4"
                    id="totalInstructorStatusArea">
                    <h1 class="text-xl font-semibold ">Instructors Status</h1>
                    <canvas class="p-5" id="totalInstructorStatus"></canvas>
                </div>
            </div>
        </div>


        <div class="mt-10">
            <h1 class="mx-5 text-2xl font-semibold">Course Overview</h1>
            <hr class="my-6 border-t-2 border-gray-300">
        </div>

        <div class="w-full mt-10 space-y-2" id="courseOverviewArea">
            <div class="flex flex-col mt-5 space-y-2 lg:flex-row lg:space-y-0 lg:space-x-2"
                id="courseOverviewArea_upper">
                <div class="lg:w-1/4 flex flex-col justify-evenly items-center border border-darthmouthgreen rounded-xl lg:h-[325px]"
                    id="totalCourseNumberArea">
                    <div class="text-center">
                        <h1 class="text-6xl font-bold text-darthmouthgreen" id="totalCourse">0</h1>
                        <p class="w-3/4 mx-auto font-semibold text-darthmouthgreen">total courses</p>
                    </div>
                    <div class="">
                        <a href="{{ url("/admin/performance/courses") }}"
                            class="text-right underline text-darthmouthgreen text-md">view list of courses</a>
                    </div>

                </div>
                <div class="lg:w-3/4 border border-darthmouthgreen rounded-xl lg:h-[325px] p-4"
                    id="c_dateRegisteredDataArea">
                    <h1 class="p-3 text-xl font-semibold">Registered Courses</h1>
                    <select name="c_dateRegisteredDataFilter" class="w-full input input-bordered"
                        id="c_dateRegisteredDataFilter">
                        <option value="daily">daily</option>
                        <option value="weekly">weekly</option>
                        <option value="monthly">monthly</option>
                    </select>
                    <div class="w-full p-3 h-3/4 " id="c_dateRegisteredData_dayArea">
                        <canvas class="" id="c_dateRegisteredData_day"></canvas>
                    </div>
                    <div class="hidden w-full p-3 h-3/4" id="c_dateRegisteredData_weekArea">
                        <canvas class="" id="c_dateRegisteredData_week"></canvas>
                    </div>
                    <div class="hidden w-full p-3 h-3/4" id="c_dateRegisteredData_monthArea">
                        <canvas class="" id="c_dateRegisteredData_month"></canvas>
                    </div>
                </div>
            </div>
            <div class="flex flex-col w-full mt-5 space-y-2 lg:flex-row lg:space-y-0 lg:space-x-2"
                id="courseOverviewArea_lower">
                <div class="lg:w-3/5 border border-darthmouthgreen rounded-xl h-[325px] p-4" id="enrolleeNumbersArea">
                    <h1 class="p-3 text-xl font-semibold ">Number of Enrollees</h1>

                    <canvas class="p-4" id="enrolleeNumbers"></canvas>
                </div>
                <div class="lg:w-2/5 border border-darthmouthgreen rounded-xl h-[325px] p-4" id="totalCourseStatusArea">
                    <h1 class="mx-5 text-xl font-semibold">Courses Status</h1>
                    <canvas class="p-4" id="totalCourseStatus"></canvas>
                </div>
            </div>
        </div>
    </div>


</section>
@endsection