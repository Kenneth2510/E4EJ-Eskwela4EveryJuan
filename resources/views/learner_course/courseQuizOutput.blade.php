@extends('layouts.learner_layout')

@section('content')
<section class="w-full h-screen md:w-3/4 lg:w-10/12">
    <div class="h-full px-2 py-4 pt-24 overflow-auto rounded-lg shadow-lg md:pt-6">

        <div style="background-color:{{$mainBackgroundCol}};" class="z-50 p-2 text-white fill-white rounded-xl">
            <a href="{{ url("/learner/course/manage/$learnerSyllabusProgressData->course_id/overview") }}" class="my-2 bg-gray-300 rounded-full ">
                <svg xmlns="http://www.w3.org/2000/svg" height="30" viewBox="0 -960 960 960" width="24">
                    <path d="M560-240 320-480l240-240 56 56-184 184 184 184-56 56Z" />
                </svg>
            </a>
            <h1 class="w-1/2 py-4 text-2xl font-bold md:text-3xl lg:text-4xl"><span class="">{{
                    $learnerSyllabusProgressData->course_name }}</span></h1>
            {{-- subheaders --}}
            <div class="flex flex-col justify-between fill-mainwhitebg">
                <h1 class="w-1/2 py-4 text-lg font-bold md:text-xl" id="quiz_title"
                    data-course-id="{{$learnerSyllabusProgressData->course_id}}"
                    data-syllabus-id="{{$learnerSyllabusProgressData->syllabus_id}}"><span class="">{{
                        $learnerSyllabusProgressData->quiz_title }}</span></h1>
            </div>
        </div>

        <div class="mx-2">
            <div class="mt-1 text-gray-600">
                <a href="{{ url('/learner/courses') }}" class="">course></a>
                <a href="{{ url("/learner/course/$learnerSyllabusProgressData->course_id")
                    }}">{{$learnerSyllabusProgressData->course_name}}></a>
                <a href="{{ url("/learner/course/manage/$learnerSyllabusProgressData->course_id/overview")
                    }}">content></a>
                <a href="">{{ $learnerSyllabusProgressData->quiz_title }}</a>
            </div>
            {{-- head --}}
            <div class="flex flex-col justify-between py-4 border-b-2 lg:flex-row">
                <div class="flex flex-row items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">
                        <path fill="currentColor"
                            d="M12 29a1 1 0 0 1-.92-.62L6.33 17H2v-2h5a1 1 0 0 1 .92.62L12 25.28l8.06-21.63A1 1 0 0 1 21 3a1 1 0 0 1 .93.68L25.72 15H30v2h-5a1 1 0 0 1-.95-.68L21 7l-8.06 21.35A1 1 0 0 1 12 29Z" />
                    </svg>
                    <h1 class="mx-2 text-2xl font-semibold" id="quiz_title"
                        data-course-id="{{$learnerSyllabusProgressData->course_id}}"
                        data-syllabus-id="{{$learnerSyllabusProgressData->syllabus_id}}">
                        {{$learnerSyllabusProgressData->quiz_title}}</h1>
                </div>
                <h1 class="mx-2 text-xl font-semibold">
                    @if ($learnerSyllabusProgressData->status === "NOT YET STARTED")
                    <p>STATUS: <span class="text-danger">NOT YET STARTED</span></p>
                    @elseif ($learnerSyllabusProgressData->status === "COMPLETED")
                    <p>STATUS: <span class="text-primary">COMPLETED</span></p>
                    @else
                    <p>STATUS: <span class="text-warning">IN PROGRESS</span></p>
                    @endif
                </h1>
            </div>

            {{-- main content --}}
            <div class="flex flex-col mt-5 lg:flex-row">
                <div class="border-r-2 border-green-200 lg:w-2/6 px-auto" id="quiz_info_area">
                    <div class="grid grid-cols-5 gap-2 px-3 py-5 mx-5 mt-5 border-2 border-gray-200"
                        id="isAnsweredMeter">
                        {{-- <div
                            class="flex items-center justify-center question_isAnswered w-[35px] h-[45px] hover:cursor-pointer border border-darthmouthgreen transition-all duration-300">
                            1</div>
                        <div
                            class="flex items-center justify-center question_isAnswered w-[35px] h-[45px] hover:cursor-pointer border border-darthmouthgreen transition-all duration-300">
                            2</div>
                        <div
                            class="flex items-center justify-center question_isAnswered w-[35px] h-[45px] hover:cursor-pointer border border-darthmouthgreen transition-all duration-300">
                            3</div>
                        <div
                            class="flex items-center justify-center question_isAnswered w-[35px] h-[45px] hover:cursor-pointer border border-darthmouthgreen transition-all duration-300">
                            4</div>
                        <div
                            class="flex items-center justify-center question_isAnswered w-[35px] h-[45px] hover:cursor-pointer border border-darthmouthgreen transition-all duration-300">
                            5</div> --}}
                    </div>

                    {{-- <div class="mt-5">
                        <h1 class="">Time remaining: </h1>
                    </div> --}}

                </div>

                <div id="quiz_content_area" class="w-full overflow-y-auto px-auto">
                    <div id="questionContainer" class="w-4/5 p-5 mx-auto my-5 rounded-lg">

                    </div>
                    <div id="pagination" class="flex items-center justify-center">
                        <button id="prevPage" class="btn ">Previous</button>
                        <span id="currentPage" class="mx-4 text-lg font-semibold">Page 1</span>
                        <button id="nextPage" class="btn btn-primary">Next</button>
                    </div>
                    <div class="w-full my-2 text-center " id="">
                        <a href="{{ url("/learner/course/content/$learnerSyllabusProgressData->course_id/$learnerSyllabusProgressData->learner_course_id/quiz/$learnerSyllabusProgressData->syllabus_id")}}"
                            class="w-1/2 btn btn-primary">Return</a>
                    </div>
                </div>

            </div>
        </div>

    </div>
</section>
@include('partials.chatbot-btn')
@include('partials.chatbot')

@endsection