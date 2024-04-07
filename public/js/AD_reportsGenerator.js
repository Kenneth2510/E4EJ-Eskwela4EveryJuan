$(document).ready(function() {

    var baseUrl = window.location.href;


    $('#reportCategory').on('change', function(e) {
        e.preventDefault();

        var category = $(this).val();

        $('#listLearnerArea , #selectedLearnerArea ,#listInstructorArea ,#selectedInstructorArea ,#sessionLogsArea ,#selectedSessionLogsArea ,#listCourseArea ,#selectedCourseArea ,#listCourseEnrolleesArea ,#courseGradeSheetsArea ,#learnerCourseGradeSheetArea').addClass('hidden');


        switch(category) {
            case "LearnerList":
                $('#listLearnerArea').removeClass('hidden');
                break;

            case "SelectedLearner":
                getLearners();
                $('#selectedLearnerArea').removeClass('hidden');
                 break;

            case "InstructorList":
                $('#listInstructorArea').removeClass('hidden');
                break;
    
            case "SelectedInstructor":
                getInstructors();
                $('#selectedInstructorArea').removeClass('hidden');
                 break;
    
            case "Session":
                $('#sessionLogsArea').removeClass('hidden');
                 break;

            case "UserSession":
                $('#selectedSessionLogsArea').removeClass('hidden');
                 break;

            case "Courses":
                $('#listCourseArea').removeClass('hidden');
                 break;

            case "SelectedCourse":
                getCourses();
                $('#selectedCourseArea').removeClass('hidden');
                break;

            case "Enrollees":
                getApprovedCourses();
                $('#listCourseEnrolleesArea').removeClass('hidden');
                break; 

            case "CourseGradesheets":
                getGradeApprovedCourses();
                $('#courseGradeSheetsArea').removeClass('hidden');
                break;
                
            case "LearnerGradesheets":
                getlearnerCourseGradeApprovedCourses();
                $('#learnerCourseGradeSheetArea').removeClass('hidden');
                break; 

            default:
                alert("Please choose a category");
                break;
        }
    })


    $('#learnerSelectedDayCheck').on('change', function(e) {
        e.preventDefault();

        if($(this).is(':checked')) {
            $('#enable_customDate').removeClass('hidden');
            $('#note_time').removeClass('hidden');
        } else {
            $('#enable_customDate').addClass('hidden');
            $('#note_time').addClass('hidden');
        }
    })

    $('#userNameCheck').on('change', function(e) {
        e.preventDefault();

        if($(this).is(':checked')) {
            $('#enable_customName').removeClass('hidden');
        } else {
            $('#enable_customName').addClass('hidden');
        }
    })


    $('#learnerCustomCheck').on('change', function(e) {
        e.preventDefault();

        if($(this).is(':checked')) {
            $('#learnerCustomFilters_EnabledArea').removeClass('hidden');


            $('#learnerCustomGenderCheck').on('change', function(e) {
                e.preventDefault();

                if($(this).is(':checked')) {
                    $('#enabled_customGender').removeClass('hidden');
                } else {
                    $('#enabled_customGender').addClass('hidden');
                }
            })

            $('#learnerCustomBdayCheck').on('change', function(e) {
                e.preventDefault();

                if($(this).is(':checked')) {
                    $('#enabled_customBirthday').removeClass('hidden');
                } else {
                    $('#enabled_customBirthday').addClass('hidden');
                }
            })


        } else {
            $('#learnerCustomFilters_EnabledArea').addClass('hidden');
        }
    })



    $('#displayType').on('change', function(e) {
        e.preventDefault();

        displayTypeVal = $(this).val();

        if(displayTypeVal === 'Custom') {
            $('#customDisplay_enabled').removeClass('hidden')
        } else {
            $('#customDisplay_enabled').addClass('hidden');
        }
    })








// view selected learner

    function getLearners() {
        var filterVal = $('.searchLearner').val();

        var url = baseUrl + "/search/learners";

        $.ajax ({
            type: "GET",
            url: url,
            data: {
                'filterVal': filterVal,
            },
            dataType: 'json',
            success: function (response){
                console.log(response)
                var learners = response['learners']
                displaySearchLearners(learners)
            },
            error: function(error) {
                console.log(error);
            }
      })
    }


    var debounceGetLearners = _.debounce(getLearners, 300); // 300ms debounce delay

    $('.searchLearner').on('input', function(e) {
        debounceGetLearners();
    });


    function displaySearchLearners(learners) {
        disp_learners = ``;

        for (let i = 0; i < learners.length; i++) {
            const name = learners[i]['name'];
            const id = learners[i]['learner_id'];


            disp_learners += `
                <option value="${id}">${name}</option>
            `
        }

        $('.selectLearner').empty();
        $('.selectLearner').append(disp_learners);

    }




    // list of instructors
    $('#instructorSelectedDayCheck').on('change', function(e) {
        e.preventDefault();

        if($(this).is(':checked')) {
            $('#instructor_enable_customDate').removeClass('hidden');
            $('#note_time').removeClass('hidden');
        } else {
            $('#instructor_enable_customDate').addClass('hidden');
            $('#note_time').addClass('hidden');
        }
    })

    $('#instructorNameCheck').on('change', function(e) {
        e.preventDefault();

        if($(this).is(':checked')) {
            $('#instructor_enable_customName').removeClass('hidden');
        } else {
            $('#instructor_enable_customName').addClass('hidden');
        }
    })


    $('#instructorCustomCheck').on('change', function(e) {
        e.preventDefault();

        if($(this).is(':checked')) {
            $('#instructorCustomFilters_EnabledArea').removeClass('hidden');


            $('#instructorCustomGenderCheck').on('change', function(e) {
                e.preventDefault();

                if($(this).is(':checked')) {
                    $('#instructor_enabled_customGender').removeClass('hidden');
                } else {
                    $('#instructor_enabled_customGender').addClass('hidden');
                }
            })

            $('#instructorCustomBdayCheck').on('change', function(e) {
                e.preventDefault();

                if($(this).is(':checked')) {
                    $('#instructor_enabled_customBirthday').removeClass('hidden');
                } else {
                    $('#instructor_enabled_customBirthday').addClass('hidden');
                }
            })


        } else {
            $('#instructorCustomFilters_EnabledArea').addClass('hidden');
        }
    })



    $('#instructor_displayType').on('change', function(e) {
        e.preventDefault();

        displayTypeVal = $(this).val();

        if(displayTypeVal === 'Custom') {
            $('#instructor_customDisplay_enabled').removeClass('hidden')
        } else {
            $('#instructor_customDisplay_enabled').addClass('hidden');
        }
    })




    // view selected instructor

    
    function getInstructors() {
        var filterVal = $('.searchInstructor').val();

        var url = baseUrl + "/search/instructors";

        $.ajax ({
            type: "GET",
            url: url,
            data: {
                'filterVal': filterVal,
            },
            dataType: 'json',
            success: function (response){
                console.log(response)
                var instructors = response['instructors']
                displaySearchInstructors(instructors)
            },
            error: function(error) {
                console.log(error);
            }
      })
    }


    var debounceGetInstructors = _.debounce(getInstructors, 300); // 300ms debounce delay

    $('.searchInstructor').on('input', function(e) {
        debounceGetInstructors();
    });


    function displaySearchInstructors(instructors) {
        disp_instructors = ``;

        for (let i = 0; i < instructors.length; i++) {
            const name = instructors[i]['name'];
            const id = instructors[i]['instructor_id'];


            disp_instructors += `
                <option value="${id}">${name}</option>
            `
        }

        $('.selectInstructor').empty();
        $('.selectInstructor').append(disp_instructors);

    }



    //  session logs
    $('#sessionUserSelectedDayCheck').on('change', function(e) {
        e.preventDefault();

        if($(this).is(':checked')) {
            $('#session_enable_customDate').removeClass('hidden');
            $('#note_time').removeClass('hidden');
        } else {
            $('#session_enable_customDate').addClass('hidden');
            $('#note_time').addClass('hidden');
        }
    })



    // selected session logs
    $('#selectedSession_userCategory').on('change',function(e) {
        var categ = $(this).val();


        $('#learnerSelectedSessionArea , #instructorSelectedSessionArea').addClass('hidden');

        if (categ === 'Learners') {
            getSessionLearners();
            $('#learnerSelectedSessionArea').removeClass('hidden');
        } else if (categ === 'Instructors') {
            getSessionInstructors();
            $('#instructorSelectedSessionArea').removeClass('hidden');
        } else {
            $('#learnerSelectedSessionArea , #instructorSelectedSessionArea').addClass('hidden');
        }
    })

    $('#selectedSessionUserSelectedDayCheck').on('change', function(e) {
        e.preventDefault();

        if($(this).is(':checked')) {
            $('#selectedSession_enable_customDate').removeClass('hidden');
            $('#note_time').removeClass('hidden');
        } else {
            $('#selectedSession_enable_customDate').addClass('hidden');
            $('#note_time').addClass('hidden');
        }
    })


    function getSessionLearners() {
        var filterVal = $('.selectedSession_searchLearner').val();

        var url = baseUrl + "/search/learners";

        $.ajax ({
            type: "GET",
            url: url,
            data: {
                'filterVal': filterVal,
            },
            dataType: 'json',
            success: function (response){
                console.log(response)
                var learners = response['learners']
                displaySessionSearchLearners(learners)
            },
            error: function(error) {
                console.log(error);
            }
      })
    }


    var debounceSessionGetLearners = _.debounce(getSessionLearners, 300); // 300ms debounce delay

    $('.selectedSession_searchLearner').on('input', function(e) {
        debounceSessionGetLearners();
    });


    function displaySessionSearchLearners(learners) {
        disp_learners = ``;

        for (let i = 0; i < learners.length; i++) {
            const name = learners[i]['name'];
            const id = learners[i]['learner_id'];


            disp_learners += `
                <option value="${id}">${name}</option>
            `
        }

        $('.selectedSession_selectLearner').empty();
        $('.selectedSession_selectLearner').append(disp_learners);

    }



    function getSessionInstructors() {
        var filterVal = $('.selectedSession_searchInstructor').val();

        var url = baseUrl + "/search/instructors";

        $.ajax ({
            type: "GET",
            url: url,
            data: {
                'filterVal': filterVal,
            },
            dataType: 'json',
            success: function (response){
                console.log(response)
                var instructors = response['instructors']
                displaySessionSearchInstructors(instructors)
            },
            error: function(error) {
                console.log(error);
            }
      })
    }


    var debounceSessionGetInstructors = _.debounce(getSessionInstructors, 300); // 300ms debounce delay

    $('.selectedSession_searchInstructor').on('input', function(e) {
        debounceSessionGetInstructors();
    });


    function displaySessionSearchInstructors(instructors) {
        disp_instructors = ``;

        for (let i = 0; i < instructors.length; i++) {
            const name = instructors[i]['name'];
            const id = instructors[i]['instructor_id'];


            disp_instructors += `
                <option value="${id}">${name}</option>
            `
        }

        $('.selectedSession_selectInstructor').empty();
        $('.selectedSession_selectInstructor').append(disp_instructors);

    }



    // list of courses

    $('#courseSelectedDayCheck').on('change', function(e) {
        e.preventDefault();

        if($(this).is(':checked')) {
            $('#course_enable_customDate').removeClass('hidden');
            $('#note_time').removeClass('hidden');
        } else {
            $('#course_enable_customDate').addClass('hidden');
            $('#note_time').addClass('hidden');
        }
    })



    // selected course

    
    function getCourses() {
        var filterVal = $('.searchCourse').val();

        var url = baseUrl + "/search/course";

        $.ajax ({
            type: "GET",
            url: url,
            data: {
                'filterVal': filterVal,
            },
            dataType: 'json',
            success: function (response){
                console.log(response)
                var courses = response['courses']
                displaySearchCourse(courses)
            },
            error: function(error) {
                console.log(error);
            }
      })
    }


    var debounceGetCourse = _.debounce(getCourses, 300); // 300ms debounce delay

    $('.searchCourse').on('input', function(e) {
        debounceGetCourse();
    });


    function displaySearchCourse(courses) {
        disp_courses = ``;

        for (let i = 0; i < courses.length; i++) {
            const name = courses[i]['course_name'];
            const id = courses[i]['course_id'];


            disp_courses += `
                <option value="${id}">${name}</option>
            `
        }

        $('.selectCourse').empty();
        $('.selectCourse').append(disp_courses);

    }




    // list of course enrollees
    function getApprovedCourses() {
        var filterVal = $('.searchApprovedCourse').val();

        var url = baseUrl + "/search/course/approved";

        $.ajax ({
            type: "GET",
            url: url,
            data: {
                'filterVal': filterVal,
            },
            dataType: 'json',
            success: function (response){
                console.log(response)
                var courses = response['courses']
                displaySearchApproveCourse(courses)
            },
            error: function(error) {
                console.log(error);
            }
      })
    }


    var debounceGetApprovedCourse = _.debounce(getApprovedCourses, 300); // 300ms debounce delay

    $('.searchApprovedCourse').on('input', function(e) {
        debounceGetApprovedCourse();
    });


    function displaySearchApproveCourse(courses) {
        disp_courses = ``;

        for (let i = 0; i < courses.length; i++) {
            const name = courses[i]['course_name'];
            const id = courses[i]['course_id'];


            disp_courses += `
                <option value="${id}">${name}</option>
            `
        }

        $('.selectApprovedCourse').empty();
        $('.selectApprovedCourse').append(disp_courses);

    }


    $('#courseEnrolleesSelectedDayCheck').on('change', function(e) {
        e.preventDefault();

        if($(this).is(':checked')) {
            $('#courseEnrollees_enable_customDate').removeClass('hidden');
            $('#note_time').removeClass('hidden');
        } else {
            $('#courseEnrollees_enable_customDate').addClass('hidden');
            $('#note_time').addClass('hidden');
        }
    })



    // course grade sheet
    function getGradeApprovedCourses() {
        var filterVal = $('.grades_searchApprovedCourse').val();

        var url = baseUrl + "/search/course/approved";

        $.ajax ({
            type: "GET",
            url: url,
            data: {
                'filterVal': filterVal,
            },
            dataType: 'json',
            success: function (response){
                console.log(response)
                var courses = response['courses']
                displaySearchApproveGradeCourse(courses)
            },
            error: function(error) {
                console.log(error);
            }
      })
    }


    var debounceGetGradeApprovedCourse = _.debounce(getGradeApprovedCourses, 300); // 300ms debounce delay

    $('.grades_searchApprovedCourse').on('input', function(e) {
        debounceGetGradeApprovedCourse();
    });


    function displaySearchApproveGradeCourse(courses) {
        disp_courses = ``;

        for (let i = 0; i < courses.length; i++) {
            const name = courses[i]['course_name'];
            const id = courses[i]['course_id'];


            disp_courses += `
                <option value="${id}">${name}</option>
            `
        }

        $('.grades_selectApprovedCourse').empty();
        $('.grades_selectApprovedCourse').append(disp_courses);

    }



    // learner course grade sheet
    function getlearnerCourseGradeApprovedCourses() {
        var filterVal = $('.learnerCoursegrades_searchApprovedCourse').val();

        var url = baseUrl + "/search/course/approved";

        $.ajax ({
            type: "GET",
            url: url,
            data: {
                'filterVal': filterVal,
            },
            dataType: 'json',
            success: function (response){
                console.log(response)
                var courses = response['courses']
                displaySearchlearnerCourseGradeCourse(courses)
                
                getLearnerCourse();
            },
            error: function(error) {
                console.log(error);
            }
      })
    }


    var debounceGetlearnerCourseGradeApprovedCourse = _.debounce(getlearnerCourseGradeApprovedCourses, 300); // 300ms debounce delay

    $('.learnerCoursegrades_searchApprovedCourse').on('input', function(e) {
        debounceGetlearnerCourseGradeApprovedCourse();
    });


    function displaySearchlearnerCourseGradeCourse(courses) {
        disp_courses = ``;

        for (let i = 0; i < courses.length; i++) {
            const name = courses[i]['course_name'];
            const id = courses[i]['course_id'];


            disp_courses += `
                <option value="${id}">${name}</option>
            `
        }
        $('.learnerCoursegrades_selectApprovedCourse').empty();
        $('.learnerCoursegrades_selectApprovedCourse').append(disp_courses);
    }

    $('.learnerCoursegrades_selectApprovedCourse').on('change', function(e) {
        getLearnerCourse();
    })



    function getLearnerCourse() {
        var filterVal = $('.learnerCourseGrades_searchLearner').val();
        var courseVal = $('.learnerCoursegrades_selectApprovedCourse').val();
        var url = baseUrl + "/search/learner/course";

        $.ajax ({
            type: "GET",
            url: url,
            data: {
                'filterVal': filterVal,
                'courseVal': courseVal,
            },
            dataType: 'json',
            success: function (response){
                console.log(response)
                var learners = response['learners']
                displaySearchLearnerCourse(learners)
            },
            error: function(error) {
                console.log(error);
            }
      })
    }


    var debounceGetLearnerCourse = _.debounce(getLearnerCourse, 300); // 300ms debounce delay

    $('.learnnerCourseGrades_searchLearner').on('input', function(e) {
        debounceGetLearnerCourse();
    });


    function displaySearchLearnerCourse(learners) {
        disp_learners = ``;

        for (let i = 0; i < learners.length; i++) {
            const name = learners[i]['name'];
            const learner_course_id = learners[i]['learner_course_id'];
  /*          console.log(id);*/

            disp_learners += `
                <option value="${learner_course_id}">${name}</option>
            `
        }

        $('.learnerCourseGrades_selectLearner').empty();
        $('.learnerCourseGrades_selectLearner').append(disp_learners);

    }

})