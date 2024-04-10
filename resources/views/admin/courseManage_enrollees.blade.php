@extends('layouts.admin_layout')

@section('content')
<section class="w-full h-auto text-black md:w-3/4 md:h-screen lg:w-10/12">
    <div class="h-full px-2 py-4 pt-12 rounded-lg shadow-lg md:overflow-auto md:pt-6">
        <div class="flex items-center justify-between p-3 md:py-8">
            <h1 class="text-2xl font-bold text-darthmouthgreen md:text-3xl lg:text-4xl">Course Enrollees</h1>
            <div class="">
                <p class="font-semibold text-darthmouthgreen md:text-lg">{{$admin->admin_codename}}</p>
            </div>
        </div>
        <div class="w-full" id="selectCourseArea">
            <h1 class="text-xl font-semibold text-darthmouthgreen">Select a Course</h1>
            <select name="selectedCourse" id="selectedCourse" class="select select-bordered focus:select-primary">
                @forelse ($courses as $course)
                <option value="{{$course->course_id}}">{{$course->course_name}}</option>
                @empty
                <option value="" disabled>--no approved courses--</option>
                @endforelse
            </select>
        </div>

        <hr class="my-6 border-t-2 border-gray-300">

        <div class="flex flex-col items-center space-y-2 lg:space-y-0 lg:flex-row lg:space-x-2">
            <div id="addNewLearnerCourseBtn">
                @if(in_array($admin->role, ['IT_DEPT', 'SUPER_ADMIN', 'COURSE_SUPERVISOR',
                'COURSE_ASST_SUPERVISOR']))
                <a href="/admin/course/enrollment/addNew" class="btn btn-primary">Enroll
                    New Learner</a>
                @endif
            </div>
            <div class="space-x-1" id="filterLearnerCourse">
                <select class="select select-bordered focus:select-primary" name="filterByStatus" id="filterByStatus">
                    <option value="">Show All</option>
                    <option value="Pending">Pending</option>
                    <option value="Approved">Approved</option>
                    <option value="Rejected">Rejected</option>
                </select>
                <input class="input input-bordered input-primary" type="date" id="filterByDate">
            </div>
            <div id="searchLearnerCourse">
                <input class="input input-bordered input-primary" type="text" placeholder="search by name"
                    id="searchLearner">
            </div>
        </div>


        <div class="overflow-auto mt-7" id="learnerCourseTableArea">
            <table class="table w-full table-auto">
                <thead class="text-xl">
                    <th class="py-2">Enrollee ID</th>
                    <th>Learner ID</th>
                    <th>Enrollee Info</th>
                    <th>Date Enrolled</th>
                    <th>Status</th>
                    <th></th>
                </thead>
                <tbody class="" id="learnerCourseTableDispArea">


                </tbody>
            </table>
        </div>


    </div>
</section>

<script>
    $(document).ready(function() {

var baseUrl = window.location.href

getLearnerCourseData()

function getLearnerCourseData() {

    var course_id = $('#selectedCourse').val();


    var url = baseUrl + "/learnerCoursesData"

    $.ajax({
        type: "GET",
        url: url,
        data: {
            course_id: course_id
        },
        success: function (response) {
            console.log(response);

            var learnerCourseData = response['learnerCourseData']
            dispLearnerCourseData(learnerCourseData)
        },
        error: function(error) {
            console.log(error);
        }
    });
}

$('#selectedCourse').on('change', function () {
    getLearnerCourseData();
})

function dispLearnerCourseData(learnerCourseData) {
    var learnerCourseDisp = ``;

    for (let i = 0; i < learnerCourseData.length; i++) {
        const name = learnerCourseData[i]['name'];
        const learner_course_id = learnerCourseData[i]['learner_course_id'];
        const learner_id = learnerCourseData[i]['learner_id'];
        const status = learnerCourseData[i]['status'];
        const created_at = learnerCourseData[i]['created_at'];
        const learner_email = learnerCourseData[i]['learner_email'];


        learnerCourseDisp += `
        <tr>
            <td>${learner_course_id}</td>
            <td>${learner_id}</td>
            <td>
                ${name}<br>
                ${learner_email}
            </td>
            <td>${created_at}</td>
            <td>${status}</td>
            <td>
                `
                @if (in_array($admin->role, ['IT_DEPT', 'SUPER_ADMIN', 'COURSE_SUPERVISOR' , 'COURSE_ASST_SUPERVISOR'])) 
                    learnerCourseDisp +=   `<a href="/admin/course/enrollment/learnerCourse/${learner_course_id}" class="btn btn-primary">Enter</a>`
                @endif
                
            
                learnerCourseDisp += `</td>
        </tr>
        `;
        
    }

    $('#learnerCourseTableDispArea').empty()
    $('#learnerCourseTableDispArea').append(learnerCourseDisp)
}


$('#filterByStatus, #filterByDate, #searchLearner').on('change keyup', function(e) {
        e.preventDefault()

        var filterStatus = $('#filterByStatus').val()
        var filterDate = $('#filterByDate').val()
        var searchLearner = $('#searchLearner').val()
        var course_id = $('#selectedCourse').val()

        var  url = baseUrl + '/search';

        $.ajax({
        type: "GET",
        url: url,
        data: {
            course_id: course_id,
            searchLearner: searchLearner,
            filterDate: filterDate,
            filterStatus: filterStatus,
        },
        success: function (response) {
            console.log(response);

            var learnerCourseData = response['learnerCourseData']
            dispLearnerCourseData(learnerCourseData)
        },
        error: function(error) {
            console.log(error);
        }
    });
        
    });

})
</script>
@endsection