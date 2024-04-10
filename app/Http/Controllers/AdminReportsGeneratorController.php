<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Business;
use App\Models\Learner;
use App\Models\Instructor;
use App\Models\Admin;
use App\Models\Course;
use App\Models\LearnerCourse;
use App\Models\Syllabus;
use App\Models\Lessons;
use App\Models\Activities;
use App\Models\ActivityContents;
use App\Models\ActivityContentCriterias;
use App\Models\Quizzes;
use App\Models\LearnerCourseProgress;
use App\Models\LearnerSyllabusProgress;
use App\Models\LearnerLessonProgress;
use App\Models\LearnerActivityProgress;
use App\Models\LearnerQuizProgress;
use App\Models\LearnerActivityOutput;
use App\Models\LearnerActivityCriteriaScore;
use App\Models\LearnerQuizOutputs;
use App\Models\LearnerPreAssessmentProgress;
use App\Models\LearnerPreAssessmentOutput;
use App\Models\LearnerPostAssessmentProgress;
use App\Models\LearnerPostAssessmentOutput;
use App\Models\Message;
use App\Models\MessageContent;
use App\Models\MessageContentFile;
use App\Models\MessageReply;
use App\Models\MessageReplyContent;
use App\Models\MessageReplyContentFile;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Profiler\Profile;
use Carbon\Carbon;
use Barryvdh\Snappy\Facades\SnappyPdf as PDF;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\File;
use Codedge\Fpdf\Fpdf\Fpdf;
use Illuminate\Support\Facades\Response;
use Dompdf\Dompdf;
use Dompdf\Options;
use TCPDF;

use App\Http\Controllers\ActivityLoggingController;


class AdminReportsGeneratorController extends Controller
{
    

    public function log($action) {
        $admin = session('admin');
        $logging = new ActivityLoggingController();
    
        $user_id = $admin->admin_id;
        $user_type = "Instructor";
    
        $logging->log_activity($user_type, $user_id, $action);
    }


    public function index() {
        if (auth('admin')->check()) {
            $adminSession = session('admin');
                try {

                    $learners = DB::table('learner')
                    ->select(
                        'learner_id',
                        DB::raw('CONCAT(learner_fname, " ", learner_lname) as name')
                    )
                    ->get();

                    $instructors = DB::table('instructor')
                    ->select(
                        'instructor_id',
                        DB::raw('CONCAT(instructor_fname, " ", instructor_lname) as name')
                    )
                    ->get();

                    $approvedCourses = DB::table('course')
                    ->select(
                        'course_name',
                        'course_id',
                    )
                    ->where('course_status', 'Approved')
                    ->get();

                    $action = "Opened Admin Reports Generator";
                    $this->log($action);
        

                    $data = [
                        'title' => 'Reports',
                        'scripts' => ['AD_reportsGenerator.js'],
                        'admin' => $adminSession,
                        'learners' => $learners,
                        'instructors' => $instructors,
                        'approvedCourses' => $approvedCourses,
                    ];


                    return view('adminReports.reportsGenerator')
                    ->with($data);

                } catch (\Exception $e) {
                    dd($e->getMessage());
                }
            }  else {
                return redirect('/admin');
            }
    }



    // print list of learners
    public function listLearners(Request $request) {

        try {

            $learnerStatus = $request->input('learnerStatus');
            $learnerSelectedDayCheck = $request->has('learnerSelectedDayCheck');
            $learnerDateStart = $request->input('learnerDateStart');
            $learnerDateFinish = $request->input('learnerDateFinish');
            $userNameCheck = $request->has('userNameCheck');
            $userLearnerFname = $request->input('userLearnerFname');
            $userLearnerLname = $request->input('userLearnerLname');
            $learnerCustomCheck = $request->has('learnerCustomCheck');
            $learnerCustomGenderCheck = $request->has('learnerCustomGenderCheck');
            $learnerGender = $request->input('learnerGender');
            $learnerCustomBdayCheck = $request->has('learnerCustomBdayCheck');
            $learnerBday = $request->input('learnerBday');
            $displayType = $request->input('displayType');
            $disp_name = $request->has('disp_name');
            $disp_contact = $request->has('disp_contact');
            $disp_gender = $request->has('disp_gender');
            $disp_bday = $request->has('disp_bday');
            $disp_date_created = $request->has('disp_date_created');
            $disp_status = $request->has('disp_status');
            $disp_business_name = $request->has('disp_business_name');
            $disp_business_address = $request->has('disp_business_address');
            $disp_account_number = $request->has('disp_account_number');
            $disp_category = $request->has('disp_category');
            $disp_business_classification = $request->has('disp_business_classification');

            if($displayType === 'Default') {
                $learner = DB::table('learner')
                ->select(
                    'learner.status',
                    DB::raw('CONCAT(learner.learner_fname, " ", learner.learner_lname) as name'),
                    'learner.learner_email',
                    'learner.learner_contactno',
                    'learner.created_at',
                    'business.business_name',
                )
                ->join('business', 'learner.learner_id', 'business.learner_id');
    
            } else {
                $fields =[
                    'learner.learner_id'
                ];

                $learner = DB::table('learner')
                ->select($fields)
                ->join('business', 'business.learner_id', 'learner.learner_id');


                
                if($disp_status) {
                    $learner->addSelect('learner.status');
                }


                if($disp_name) {
                    $learner->addSelect(DB::raw('CONCAT(learner.learner_fname, " ", learner.learner_lname) as name'));
                }

                
                if($disp_contact) {
                    $learner->addSelect('learner.learner_contactno');
                    $learner->addSelect('learner.learner_email');
                }
                

                if($disp_gender) {
                    $learner->addSelect('learner.learner_gender');
                }
                

                if($disp_bday) {
                    $learner->addSelect('learner.learner_bday');
                }

                
                if($disp_date_created) {
                    $learner->addSelect('learner.created_at');
                }

                
                if($disp_business_name ) {
                    $learner->addSelect('business.business_name');
                }

                
                if($disp_business_address ) {
                    $learner->addSelect('business.business_address');
                }

                
                if($disp_account_number) {
                    $learner->addSelect('business.bplo_account_number');
                }

                
                if($disp_category) {
                    $learner->addSelect('business.business_category');
                }

                
                if($disp_business_classification) {
                    $learner->addSelect('business.business_classification');
                }
            }


            if($learnerStatus) {
                $learner->where('learner.status' , $learnerStatus);
            }

            if($userNameCheck) {
                if($userNameCheck) {
                    $learner->where('learner.learner_fname', 'LIKE', '%' . $userLearnerFname . '%');
                    $learner->where('learner.learner_lname', 'LIKE', '%' . $userLearnerLname . '%');
                }
            }

                
            if ($learnerSelectedDayCheck) {
                $startDate = $learnerDateStart ?: date('Y-m-d');
                $finishDate = $learnerDateFinish ?: date('Y-m-d');
                $learner->whereBetween('learner.created_at', [$startDate, $finishDate]);
            }

            if($learnerCustomCheck) {
                
                if($learnerCustomGenderCheck) {
                    $learner->where('learner.learner_gender', $learnerGender);
                }

                if($learnerCustomBdayCheck) {
                    $learner->where('learner.learner_bday', $learnerBday);
                }
            }


            $learners = $learner->get();


            if($displayType === 'Default') {
                $headers = [
                    'status' => 'Status',
                    'name' => 'Name',
                    'learner_email' => 'Email',
                    'learner_contactno' => 'Contact No',
                    'created_at' => 'Date Registered',
                    'business_name' => 'Business Name',
                ];

            } else {
                $headers = [];

                
                
                if($disp_status) {
                    $headers['status'] = 'Account Status';
                }

                if($disp_name) {
                    $headers['name'] = 'Name';
                }

                
                if($disp_contact) {
                    $headers['learner_contactno'] = 'Contact Number';
                    $headers['learner_email'] = 'Email';
                }
                

                if($disp_gender) {
                    $headers['learner_gender'] = 'Gender';
                }
                

                if($disp_bday) {
                    $headers['learner_bday'] = 'Birthday';
                }

                
                if($disp_date_created) {
                    $headers['created_at'] = 'Date Registered';
                }

                
                if($disp_business_name ) {
                    $headers['business_name'] = 'Business Name';
                }

                
                if($disp_business_address ) {
                    $headers['business_address'] = 'Business Address';
                }

                
                if($disp_account_number) {
                    $headers['bplo_account_number'] = 'Account Number';
                }

                
                if($disp_category) {
                    $headers['business_category'] = 'Business Category';
                }

                
                if($disp_business_classification) {
                   $headers['business_classification'] = 'Business Classification';
                }

            }

            $html = View::make('adminReportsGenerator.list_learner', [
                'learners' => $learners,
                'headers' => $headers,
            ])->render();

            $action = "Generated List of Learners";
            $this->log($action);


            $dompdf = new Dompdf();

            // Load HTML content
            $dompdf->loadHtml($html);

            // Set paper size and orientation based on displayType
            if($displayType === 'Default') {
                $dompdf->setPaper('A4', 'portrait');
            } else {
                $dompdf->setPaper('A4', 'landscape');
            }

                    // Set the scale of the PDF (0.5 = 50% scale)
            $options = new Options();
            $options->set('isPhpEnabled', true); // Enable PHP code
            $options->set('defaultFont', 'Arial'); // Set the default font
            $options->set('scale', 0.6); // Set the scale of the PDF (0.8 = 80% scale)
            
            $dompdf->setOptions($options);


            // Render the HTML as PDF
            $dompdf->render();

            // Generate a unique filename for the PDF
            $filename = 'list_learners_' . date('YmdHis') . '.pdf';

            // Output the generated PDF (inline or download)
            $dompdf->stream($filename, array('Attachment' => true));


        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }



// print selected kearner
    public function selectLearner(Request $request) {
        try {

            $learner_id = $request->input('selectLearner');

            $learnerData = DB::table('learner')
            ->select(
                'learner.status',
                'learner.learner_fname',
                'learner.learner_lname',
                'learner.learner_contactno',
                'learner.learner_email',
                'learner.learner_gender',
                'learner.learner_bday',
                'learner.created_at',
                
            )
            ->where('learner.learner_id', $learner_id)
            ->first();

            $businessData = DB::table('business')
            ->select(
                'business.business_name',
                'business.business_address',
                'business.business_owner_name',
                'business.bplo_account_number',
                'business.business_category',
                'business.business_classification',
                'business.business_description',
            )->where('business.learner_id', $learner_id)
            ->first();

            $learnerCourseData = DB::table('learner_course')
            ->select(
                'learner_course.learner_course_id',
                'learner_course.status as enrollment_status',

                'course.course_name',

                'learner_course_progress.course_progress',
                'learner_course_progress.start_period',
            )
            ->join('course', 'learner_course.course_id', 'course.course_id')
            ->join('learner_course_progress', 'learner_course.learner_course_id', 'learner_course_progress.learner_course_id')
            ->where('learner_course.learner_id', $learner_id)
            ->get();

            $action = "Generated Selected Learner ID: " . $learner_id;
            $this->log($action);


            $html = View::make('adminReportsGenerator.select_learner', [
                'learnerData' => $learnerData,
                'businessData' => $businessData,
                'learnerCourseData' => $learnerCourseData,
            ])->render();

            $dompdf = new Dompdf();

            $dompdf->loadHtml($html);


            $options = new Options();
            $options->set('isPhpEnabled', true); // Enable PHP code
            $options->set('defaultFont', 'Arial'); // Set the default font
            $options->set('scale', 0.6); // Set the scale of the PDF (0.8 = 80% scale)
            
            $dompdf->setOptions($options);

            $dompdf->render();

            $filename = $learnerData->learner_fname . "_" . $learnerData->learner_lname . "_" . date('YmdHis') . '.pdf';

            $dompdf->stream($filename, array('Attachment' => true));


        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }





// print list of instructors
    public function listInstructors(Request $request) {

        try {

            $instructorStatus = $request->input('instructorStatus');
            $instructorSelectedDayCheck = $request->has('instructorSelectedDayCheck');
            $instructorDateStart = $request->input('instructorDateStart');
            $instructorDateFinish = $request->input('instructorDateFinish');
            $instructorNameCheck = $request->has('instructorNameCheck');
            $userInstructorFname = $request->input('userInstructorFname');
            $userInstructorLname = $request->input('userInstructorLname');
            $instructorCustomCheck = $request->has('instructorCustomCheck');
            $instructorCustomGenderCheck = $request->has('instructorCustomGenderCheck');
            $instructorGender = $request->input('instructorGender');
            $instructorCustomBdayCheck = $request->has('instructorCustomBdayCheck');
            $instructorBday = $request->input('instructorBday');
            $instructor_displayType = $request->input('instructor_displayType');
            $disp_name = $request->has('disp_name');
            $disp_contact = $request->has('disp_contact');
            $disp_gender = $request->has('disp_gender');
            $disp_bday = $request->has('disp_bday');
            $disp_date_created = $request->has('disp_date_created');
            $disp_status = $request->has('disp_status');

            if($instructor_displayType === 'Default') {
                $instructor = DB::table('instructor')
                ->select(
                    'instructor.status',
                    DB::raw('CONCAT(instructor.instructor_fname, " ", instructor.instructor_lname) as name'),
                    'instructor.instructor_email',
                    'instructor.instructor_contactno',
                    'instructor.created_at',
                );
    
            } else {
                $fields =[
                    'instructor.instructor_id'
                ];

                $instructor = DB::table('instructor')
                ->select($fields);


                
                if($disp_status) {
                    $instructor->addSelect('instructor.status');
                }


                if($disp_name) {
                    $instructor->addSelect(DB::raw('CONCAT(instructor.instructor_fname, " ", instructor.instructor_lname) as name'));
                }

                
                if($disp_contact) {
                    $instructor->addSelect('instructor.instructor_contactno');
                    $instructor->addSelect('instructor.instructor_email');
                }
                

                if($disp_gender) {
                    $instructor->addSelect('instructor.instructor_gender');
                }
                

                if($disp_bday) {
                    $instructor->addSelect('instructor.instructor_bday');
                }

                
                if($disp_date_created) {
                    $instructor->addSelect('instructor.created_at');
                }

                
            }


            if($instructorStatus) {
                $instructor->where('instructor.status' , $instructorStatus);
            }

            if($instructorNameCheck) {
                if($instructorNameCheck) {
                    $instructor->where('instructor.instructor_fname', 'LIKE', '%' . $userInstructorFname . '%');
                    $instructor->where('instructor.instructor_lname', 'LIKE', '%' . $userInstructorLname . '%');
                }
            }

                
            if ($instructorSelectedDayCheck) {
                $startDate = $instructorDateStart ?: date('Y-m-d');
                $finishDate = $instructorDateFinish ?: date('Y-m-d');
                $instructor->whereBetween('instructor.created_at', [$startDate, $finishDate]);
            }

            if($instructorCustomCheck) {
                
                if($instructorCustomGenderCheck) {
                    $instructor->where('instructor.instructor_gender', $instructorGender);
                }

                if($instructorCustomBdayCheck) {
                    $instructor->where('instructor.instructor_bday', $instructorBday);
                }
            }


            $instructors = $instructor->get();


            if($instructor_displayType === 'Default') {
                $headers = [
                    'status' => 'Status',
                    'name' => 'Name',
                    'instructor_email' => 'Email',
                    'instructor_contactno' => 'Contact No',
                    'created_at' => 'Date Registered',
                ];

            } else {
                $headers = [];

                
                
                if($disp_status) {
                    $headers['status'] = 'Account Status';
                }

                if($disp_name) {
                    $headers['name'] = 'Name';
                }

                
                if($disp_contact) {
                    $headers['instructor_contactno'] = 'Contact Number';
                    $headers['instructor_email'] = 'Email';
                }
                

                if($disp_gender) {
                    $headers['instructor_gender'] = 'Gender';
                }
                

                if($disp_bday) {
                    $headers['instructor_bday'] = 'Birthday';
                }

                
                if($disp_date_created) {
                    $headers['created_at'] = 'Date Registered';
                }

            }

            $action = "Generated List of Instructors";
            $this->log($action);

            $html = View::make('adminReportsGenerator.list_instructor', [
                'instructors' => $instructors,
                'headers' => $headers,
            ])->render();


            $dompdf = new Dompdf();

            // Load HTML content
            $dompdf->loadHtml($html);

            // Set paper size and orientation based on displayType
            if($instructor_displayType === 'Default') {
                $dompdf->setPaper('A4', 'portrait');
            } else {
                $dompdf->setPaper('A4', 'landscape');
            }

                    // Set the scale of the PDF (0.5 = 50% scale)
            $options = new Options();
            $options->set('isPhpEnabled', true); // Enable PHP code
            $options->set('defaultFont', 'Arial'); // Set the default font
            $options->set('scale', 0.6); // Set the scale of the PDF (0.8 = 80% scale)
            
            $dompdf->setOptions($options);


            // Render the HTML as PDF
            $dompdf->render();

            // Generate a unique filename for the PDF
            $filename = 'list_instructors_' . date('YmdHis') . '.pdf';

            // Output the generated PDF (inline or download)
            $dompdf->stream($filename, array('Attachment' => true));


        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }




// print selected instructor
    public function selectInstructor(Request $request) {
        try {

            $instructor_id = $request->input('selectInstructor');

            $instructorData = DB::table('instructor')
            ->select(
                'instructor.status',
                'instructor.instructor_fname',
                'instructor.instructor_lname',
                'instructor.instructor_contactno',
                'instructor.instructor_email',
                'instructor.instructor_gender',
                'instructor.instructor_bday',
                'instructor.created_at',
                
            )
            ->where('instructor.instructor_id', $instructor_id)
            ->first();


            $instructorCourseData = DB::table('course')
            ->select(
                'course.course_name',
                'course.course_difficulty',
                'course.course_status',
                'course.created_at'
            )
             ->where('course.instructor_id', $instructor_id)
            ->get();

            $action = "Generated Selected Instructor ID: " . $instructor_id;
            $this->log($action);

            $html = View::make('adminReportsGenerator.select_instructor', [
                'instructorData' => $instructorData,
                'instructorCourseData' => $instructorCourseData,
            ])->render();

            $dompdf = new Dompdf();

            $dompdf->loadHtml($html);


            $options = new Options();
            $options->set('isPhpEnabled', true); // Enable PHP code
            $options->set('defaultFont', 'Arial'); // Set the default font
            $options->set('scale', 0.6); // Set the scale of the PDF (0.8 = 80% scale)
            
            $dompdf->setOptions($options);

            $dompdf->render();

            $filename = $instructorData->instructor_fname . "_" . $instructorData->instructor_lname . "_" . date('YmdHis') . '.pdf';

            $dompdf->stream($filename, array('Attachment' => true));


        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }


    // print session list
    public function listSession(Request $request) {
        try {
            $userCategory = $request->input('userCategory');
            $customTime = $request->has('userSelectedDayCheck');
            $startDate = $request->input('userDateStart');
            $finishDate = $request->input('userDateFinish');
            
            $sessionData = DB::table('session_logs')
                ->select(
                    'session_logs.session_log_id',
                    'session_logs.session_user_id',
                    'session_logs.session_user_type',
                    'session_logs.session_in',
                    'session_logs.session_out',
                    'session_logs.time_difference'
                )
                ->leftJoin('learner', function ($join) {
                    $join->on('session_logs.session_user_id', '=', 'learner.learner_id')
                        ->where('session_logs.session_user_type', '=', 'LEARNER');
                })
                ->leftJoin('instructor', function ($join) {
                    $join->on('session_logs.session_user_id', '=', 'instructor.instructor_id')
                        ->where('session_logs.session_user_type', '=', 'INSTRUCTOR');
                })
                ->selectRaw('
                    IF(session_logs.session_user_type = "LEARNER", CONCAT(learner.learner_fname, " ", learner.learner_lname), NULL) AS learner_name,
                    IF(session_logs.session_user_type = "INSTRUCTOR", CONCAT(instructor.instructor_fname, " ", instructor.instructor_lname), NULL) AS instructor_name
                ');
    
            if ($customTime) {
                $startDate = $startDate ?: date('Y-m-d');
                $finishDate = $finishDate ?: date('Y-m-d');
                $sessionData->whereBetween('session_logs.session_in', [$startDate, $finishDate]);
            }
    
            if ($userCategory === 'Learners') {
                $sessionData->where('session_logs.session_user_type', 'LEARNER');
            } else if ($userCategory === 'Instructors') {
                $sessionData->where('session_logs.session_user_type', 'INSTRUCTOR');
            }
    
            $sessionData = $sessionData->get();

            $action = "Generated Session Data";
            $this->log($action);
    
            $html = view('adminReports.session', [
                'sessionData' => $sessionData,
            ])->render();

            $dompdf = new Dompdf();

            $dompdf->loadHtml($html);


            $options = new Options();
            $options->set('isPhpEnabled', true); // Enable PHP code
            $options->set('defaultFont', 'Arial'); // Set the default font
            $options->set('scale', 0.6); // Set the scale of the PDF (0.8 = 80% scale)
            
            $dompdf->setOptions($options);

            $dompdf->render();

            $filename = "list_sessionData_" . date('YmdHis') . '.pdf';

            $dompdf->stream($filename, array('Attachment' => true));


        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }


    // print selected session data
    public function selectSession(Request $request) {
        try {
            
      

            $selectedSession_userCategory = $request->input('selectedSession_userCategory');
            $userSession = $request->input('userSession');
            $customTime = $request->has('selectedSessionUserSelectedDayCheck');
            $startDate = $request->input('selectedSessionDateStart');
            $finishDate = $request->input('selectedSessionDateFinish');


            $sessionData = DB::table('session_logs')
            ->select(
                'session_logs.session_log_id',
                'session_logs.session_user_id',
                'session_logs.session_user_type',
                'session_logs.session_in',
                'session_logs.session_out',
                'session_logs.time_difference'
            )
            ->leftJoin('learner', function ($join) {
                $join->on('session_logs.session_user_id', '=', 'learner.learner_id')
                    ->where('session_logs.session_user_type', '=', 'LEARNER');
            })
            ->leftJoin('instructor', function ($join) {
                $join->on('session_logs.session_user_id', '=', 'instructor.instructor_id')
                    ->where('session_logs.session_user_type', '=', 'INSTRUCTOR');
            })
            ->selectRaw('
                IF(session_logs.session_user_type = "LEARNER", CONCAT(learner.learner_fname, " ", learner.learner_lname), NULL) AS learner_name,
                IF(session_logs.session_user_type = "INSTRUCTOR", CONCAT(instructor.instructor_fname, " ", instructor.instructor_lname), NULL) AS instructor_name
            ')
            ->where('session_logs.session_user_id', $userSession);

        if ($customTime) {
            $startDate = $startDate ?: date('Y-m-d');
            $finishDate = $finishDate ?: date('Y-m-d');
            $sessionData->whereBetween('session_logs.session_in', [$startDate, $finishDate]);
        }

        if ($selectedSession_userCategory === 'Learners') {
            $sessionData->where('session_logs.session_user_type', 'LEARNER');
        } else if ($selectedSession_userCategory === 'Instructors') {
            $sessionData->where('session_logs.session_user_type', 'INSTRUCTOR');
        }

        $sessionData = $sessionData->get();

        $action = "Generated Session Selected User Type: ". $selectedSession_userCategory ." ID: " . $userSession;
        $this->log($action);

        $html = view('adminReports.session', [
            'sessionData' => $sessionData,
        ])->render();


        $dompdf = new Dompdf();

            $dompdf->loadHtml($html);


            $options = new Options();
            $options->set('isPhpEnabled', true); // Enable PHP code
            $options->set('defaultFont', 'Arial'); // Set the default font
            $options->set('scale', 0.6); // Set the scale of the PDF (0.8 = 80% scale)
            
            $dompdf->setOptions($options);

            $dompdf->render();

            $session = $sessionData->first();

            if ($selectedSession_userCategory === 'Learners' && !is_null($session->learner_name)) {
                $filename = $session->learner_name . "_" . date('YmdHis') . '.pdf';
            } else if ($selectedSession_userCategory === 'Instructors' && !is_null($session->instructor_name)) {
                $filename = $session->instructor_name . "_" . date('YmdHis') . '.pdf';
            } else {
                // Handle the case when the filename is not found
                $filename = "unknown_" . date('YmdHis') . '.pdf'; // Or provide a default filename
            }

            $dompdf->stream($filename, array('Attachment' => true));

        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }


    // print list of courses
    public function listCourses(Request $request) {
        try {

            $courseStatus = $request->input('courseStatus');
            $customTime = $request->has('courseSelectedDayCheck');
            $courseStartDate = $request->input('courseDateStart');
            $courseFinishDate = $request->input('courseDateFinish');

            $course = DB::table('course')
            ->select(
                'course.course_name',
                'course.course_status',
                'course.course_difficulty',
                'course.created_at',

                DB::raw('CONCAT(instructor.instructor_fname, " ", instructor.instructor_lname) as name'),
            )
            ->join('instructor', 'instructor.instructor_id', 'course.instructor_id');


            if($courseStatus) {
                $course->where('course.course_status' , $courseStatus);
            }


            if ($customTime) {
                $startDate = $courseStartDate ?: date('Y-m-d');
                $finishDate = $courseFinishDate ?: date('Y-m-d');
                $course->whereBetween('course.created_at', [$startDate, $finishDate]);
            }

            $courses = $course->get();

            $action = "Generated List of Courses";
            $this->log($action);
            
            $html = view('adminReportsGenerator.list_course', [
                'courseData' => $courses,
            ])->render();


            $dompdf = new Dompdf();

            $dompdf->loadHtml($html);


            $options = new Options();
            $options->set('isPhpEnabled', true); // Enable PHP code
            $options->set('defaultFont', 'Arial'); // Set the default font
            $options->set('scale', 0.6); // Set the scale of the PDF (0.8 = 80% scale)
            
            $dompdf->setOptions($options);

            $dompdf->render();

   

            $filename = "list_courses_" . date('YmdHis') . '.pdf';

            $dompdf->stream($filename, array('Attachment' => true));

        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }



    // print selected course 
    public function selectCourse(Request $request) {
        try {

            $course_id = $request->input('selectCourse');

            $courseData = DB::table('course')
            ->select(
                'course.course_id',
                'course.course_status',
                'course.course_name',
                'course.course_difficulty',
                'course.course_description',
                'course.created_at',
                
                DB::raw('CONCAT(instructor.instructor_fname, " ", instructor.instructor_lname) as name'),
            )
            ->join('instructor', 'instructor.instructor_id', 'course.instructor_id')
            ->where('course.course_id', $course_id)
            ->first();


            $syllabusData = DB::table('syllabus')
            ->select(
                'syllabus_id',
                'topic_id',
                'category',
                'topic_title',
            )
            ->where('course_id', $course_id)
            ->orderBy('topic_id', 'asc')
            ->get();

            $action = "Generated Selected Course ID: " .  $course_id;
            $this->log($action);

            $html = View::make('adminReportsGenerator.select_course', [
                'courseData' => $courseData,
                'syllabusData' => $syllabusData
            ])->render();

            $dompdf = new Dompdf();

            $dompdf->loadHtml($html);


            $options = new Options();
            $options->set('isPhpEnabled', true); // Enable PHP code
            $options->set('defaultFont', 'Arial'); // Set the default font
            $options->set('scale', 0.6); // Set the scale of the PDF (0.8 = 80% scale)
            
            $dompdf->setOptions($options);

            $dompdf->render();

            $filename = "Course_" . $courseData->course_name . "_" . date('YmdHis') . '.pdf';

            $dompdf->stream($filename, array('Attachment' => true));


        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }



    // print learner course enrollees
    public function listCourseEnrollees(Request $request) {
        try {

            $course_id = $request->input('selectApprovedCourse');
            $customTime = $request->has('courseEnrolleesSelectedDayCheck');
            $enrollees_courseDateStart = $request->input('enrollees_courseDateStart');
            $enrollees_courseDateFinish = $request->input('enrollees_courseDateFinish');
            
            $course = DB::table('course')
            ->select(
                'course_id',
                'course_name',
            )
            ->where('course_id', $course_id)
            ->first();

            $learner_course = DB::table('learner_course')
            ->select(
                DB::raw('CONCAT(learner.learner_fname, " ", learner.learner_lname) as name'),
                'learner_course.status',
                'learner_course.created_at',
                'learner_course_progress.course_progress',
                'learner_course_progress.start_period',
                'course.course_name',
            )
            ->join('course', 'course.course_id', 'learner_course.course_id')
            ->join('learner', 'learner.learner_id', 'learner_course.learner_id')
            ->join('learner_course_progress', 'learner_course_progress.learner_course_id', 'learner_course.learner_course_id');



            if ($customTime) {
                $startDate = $enrollees_courseDateStart ?: date('Y-m-d');
                $finishDate = $enrollees_courseDateFinish ?: date('Y-m-d');
                $learner_course->whereBetween('course.created_at', [$startDate, $finishDate]);
            }

            $learner_courses = $learner_course->get();

            $action = "Generated List of Enrollees Course ID: " . $course->course_id;
            $this->log($action);

            $html = View::make('adminReportsGenerator.list_course_enrollees', [
                'course' => $course,
                'learner_courses' => $learner_courses,
            ])->render();

            $dompdf = new Dompdf();

            $dompdf->loadHtml($html);


            $options = new Options();
            $options->set('isPhpEnabled', true); // Enable PHP code
            $options->set('defaultFont', 'Arial'); // Set the default font
            $options->set('scale', 0.6); // Set the scale of the PDF (0.8 = 80% scale)
            
            $dompdf->setOptions($options);

            $dompdf->render();


            $filename = "Course_" . $course->course_name . "_Enrollees_" . date('YmdHis') . '.pdf';

            $dompdf->stream($filename, array('Attachment' => true));


        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }



    public function listCourseGradesheet(Request $request) {
        try { 

            $course = $request->input('grades_selectApprovedCourse');

            $courseData = DB::table('course')
                    ->select(
                        'course_id',
                        'course_name',
                    )
                    ->where('course_id', $course)
                    ->first();

                    $syllabus = DB::table('syllabus')
                    ->select(
                        'syllabus.syllabus_id',
                        'syllabus.course_id',
                        'syllabus.topic_id',
                        'syllabus.topic_title',
                        'syllabus.category',

                    )
                    ->join('course', 'course.course_id', 'syllabus.course_id')
                    ->where('syllabus.course_id', $course)
                    ->orderBy('syllabus.topic_id')
                    ->get();


                    $gradeData = DB::table('learner_course')
                ->select(
                    'learner_course.learner_course_id',
                    'learner_course.learner_id',
                    'learner_course.created_at',
                    'learner_course_progress.course_progress',
                    'learner_course_progress.start_period',
                    'learner_course_progress.finish_period',
                    'learner_course_progress.grade',
                    'learner_course_progress.remarks',
                    'learner.learner_fname',
                    'learner.learner_lname',
                )
                ->join('learner_course_progress', 'learner_course_progress.learner_course_id', '=', 'learner_course.learner_course_id')
                ->join('learner', 'learner.learner_id', '=', 'learner_course.learner_id')
                ->where('learner_course.course_id', $course)
                ->orderBy('learner_course.learner_id', 'asc');

            $gradeWithActivityData = $gradeData->get();

            foreach ($gradeWithActivityData as $key => $activityData) {
                $activityData->activities = DB::table('learner_activity_output')
                    ->select(
                        'learner_activity_output.activity_id',
                        'learner_activity_output.activity_content_id',
                        'activities.activity_title',
                        DB::raw('COALESCE(ROUND(AVG(IFNULL(attempts.total_score, 0)), 2), 0) as average_score')
                    )
                    ->leftJoin('activities', 'activities.activity_id', '=', 'learner_activity_output.activity_id')
                    ->leftJoin(
                        DB::raw('(SELECT learner_activity_output_id, AVG(total_score) as total_score FROM learner_activity_output GROUP BY learner_activity_output_id) as attempts'),
                        'attempts.learner_activity_output_id',
                        '=',
                        'learner_activity_output.learner_activity_output_id'
                    )
                    ->where('learner_activity_output.course_id', $course)
                    ->where('learner_activity_output.learner_course_id', $activityData->learner_course_id)
                    ->groupBy('learner_activity_output.activity_id', 'learner_activity_output.activity_content_id', 'activities.activity_title')
                    ->get();

                // Retrieve quiz data for the current learner
                $activityData->quizzes = DB::table('learner_quiz_progress')
                ->select(
                    'learner_quiz_progress.quiz_id',
                    'quizzes.quiz_title',
                    DB::raw('COALESCE(ROUND(AVG(IFNULL(learner_quiz_progress.score, 0)), 2), 0) as average_score')
                )
                ->leftJoin('quizzes', 'quizzes.quiz_id', '=', 'learner_quiz_progress.quiz_id')
                ->where('learner_quiz_progress.course_id', $course)
                ->where('learner_quiz_progress.learner_course_id', $activityData->learner_course_id)
                ->groupBy('learner_quiz_progress.quiz_id', 'quizzes.quiz_title')
                ->get();


                $activityData->pre_assessment = DB::table('learner_pre_assessment_progress')
                ->select(
                    'score'
                )
                ->where('course_id', $course)
                ->where('learner_course_id', $activityData->learner_course_id)
                ->first();

                $activityData->post_assessment = DB::table('learner_post_assessment_progress')
                ->select (
                        DB::raw('COALESCE(ROUND(AVG(IFNULL(learner_post_assessment_progress.score, 0)), 2), 0) as average_score')
                    )
                    ->where('course_id', $course)
                    ->where('learner_course_id', $activityData->learner_course_id)
                    ->first();

                // Add the updated $activityData back to the main array
                $gradeWithActivityData[$key] = $activityData;
            }

            $activitySyllabusData = DB::table('activities')
            ->select(
                'activities.activity_id',
                'activities.course_id',
                'activities.syllabus_id',
                'activities.activity_title',
                'activity_content.total_score',
                'syllabus.topic_id',
            )
            ->join('syllabus', 'activities.syllabus_id', 'syllabus.syllabus_id')
            ->join('activity_content', 'activities.activity_id', 'activity_content.activity_id')
            ->where('activities.course_id', $course)
            ->orderBy('syllabus.topic_id',  'asc')
            ->get();

            $quizSyllabusData = DB::table('quizzes')
            ->select(
                'quizzes.quiz_id',
                'quizzes.course_id',
                'quizzes.syllabus_id',
                'quizzes.quiz_title',
                DB::raw('COUNT(quiz_content.question_id) AS total_score'),

                'syllabus.topic_id',
            )
            ->join('syllabus', 'quizzes.syllabus_id', 'syllabus.syllabus_id')
            ->join('quiz_content', 'quizzes.quiz_id', 'quiz_content.quiz_id')
            ->where('quizzes.course_id', $course)
            ->groupBy('quizzes.quiz_id', 'quizzes.course_id', 'quizzes.syllabus_id', 'quizzes.quiz_title', 'syllabus.topic_id')
            ->orderBy('syllabus.topic_id', 'asc')
            ->get();

            $learnerPreAssessmentData = DB::table('learner_pre_assessment_progress')
            ->select(
                'learner_pre_assessment_progress.learner_pre_assessment_progress_id',
                'learner_pre_assessment_progress.course_id',
                'learner_pre_assessment_progress.learner_id',
                'learner_pre_assessment_progress.learner_course_id',
                'learner_pre_assessment_progress.status',
                'learner_pre_assessment_progress.start_period',
                'learner_pre_assessment_progress.finish_period',
                'learner_pre_assessment_progress.score',
                'learner_pre_assessment_progress.remarks',

                'learner.learner_fname',
                'learner.learner_lname',
            )
            ->join('learner', 'learner.learner_id', 'learner_pre_assessment_progress.learner_id')
            ->where('learner_pre_assessment_progress.course_id', $course)
            ->orderBy('learner_pre_assessment_progress.learner_id', 'asc')
            ->get();
        
        $learnerPostAssessmentData = DB::table('learner_post_assessment_progress')
            ->select(
                'learner_post_assessment_progress.learner_post_assessment_progress_id',
                'learner_post_assessment_progress.course_id',
                'learner_post_assessment_progress.learner_course_id',
                'learner_post_assessment_progress.learner_id',
                'learner_post_assessment_progress.status',
                'learner_post_assessment_progress.start_period',
                'learner_post_assessment_progress.finish_period',
                'learner_post_assessment_progress.score',
                'learner_post_assessment_progress.remarks',
                'learner_post_assessment_progress.attempt',
                'learner.learner_fname',
                'learner.learner_lname',
            )
            ->join('learner', 'learner.learner_id', 'learner_post_assessment_progress.learner_id')
            ->where('learner_post_assessment_progress.course_id', $course)
            ->orderBy('learner_post_assessment_progress.learner_id', 'asc')
            ->get();
    

            $data = [
                'gradeWithActivityData' => $gradeWithActivityData,
                'syllabus' => $syllabus,
                'activitySyllabusData' => $activitySyllabusData,
                'quizSyllabusData' => $quizSyllabusData,
                'learnerPreAssessmentData' => $learnerPreAssessmentData,
                'learnerPostAssessmentData' => $learnerPostAssessmentData,
            ];

            $action = "Generated Learner Gradesheet Course ID: " .  $course;
            $this->log($action);

            $html = view('adminReports.courseGradesheet', $data)->render();

            $dompdf = new Dompdf();

            $dompdf->loadHtml($html);


            $options = new Options();
            $options->set('isPhpEnabled', true); // Enable PHP code
            $options->set('defaultFont', 'Arial'); // Set the default font
            $options->set('scale', 0.6); // Set the scale of the PDF (0.8 = 80% scale)
            
            $dompdf->setOptions($options);

            $dompdf->render();


            $filename = "Course_" . $courseData->course_name . "_Grades_" . date('YmdHis') . '.pdf';

            $dompdf->stream($filename, array('Attachment' => true));

        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }


    // print learner course gradesheet
    public function listLearnerCourseGradesheet(Request $request) {

        try {
            $course = $request->input('learnerCoursegrades_selectApprovedCourse');
            $learnerCourse = $request->input('learnerCourseGrades_selectLearner');
            
            $syllabus = DB::table('syllabus')
            ->select(
                'syllabus.syllabus_id',
                'syllabus.course_id',
                'syllabus.topic_id',
                'syllabus.topic_title',
                'syllabus.category',

                'course.course_name',
            )
            ->join('course', 'course.course_id', 'syllabus.course_id')
            ->where('syllabus.course_id', $course)
            ->orderBy('syllabus.topic_id')
            ->get();

            $courseNameData = DB::table('course')
            ->select(
                'course_name'
            )
            ->where('course_id', $course)
            ->first();


            $learnerNameData = DB::table('learner_course')
            ->select(
                DB::raw('CONCAT(learner.learner_fname, " ", learner.learner_lname) as name'),
                'learner_course.learner_id',
            )
            ->join('learner', 'learner_course.learner_id', 'learner.learner_id')
            ->where('learner_course.learner_course_id', $learnerCourse)
            ->first();

            $gradeData = DB::table('learner_course')
        ->select(
            'learner_course.learner_course_id',
            'learner_course.learner_id',
            'learner_course.created_at',
            'learner_course_progress.course_progress',
            'learner_course_progress.start_period',
            'learner_course_progress.finish_period',
            'learner_course_progress.grade',
            'learner_course_progress.remarks',
            'learner.learner_fname',
            'learner.learner_lname',
        )
        ->join('learner_course_progress', 'learner_course_progress.learner_course_id', '=', 'learner_course.learner_course_id')
        ->join('learner', 'learner.learner_id', '=', 'learner_course.learner_id')
        ->where('learner_course.course_id', $course)
        ->where('learner_course.learner_course_id', $learnerCourse);

        $gradeWithActivityData = $gradeData->first();
            $gradeWithActivityData->activities = DB::table('learner_activity_output')
                ->select(
                    'learner_activity_output.activity_id',
                    'learner_activity_output.activity_content_id',
                    'activities.activity_title',
                    DB::raw('COALESCE(ROUND(AVG(IFNULL(attempts.total_score, 0)), 2), 0) as average_score')
                )
                ->leftJoin('activities', 'activities.activity_id', '=', 'learner_activity_output.activity_id')
                ->leftJoin(
                    DB::raw('(SELECT learner_activity_output_id, AVG(total_score) as total_score FROM learner_activity_output GROUP BY learner_activity_output_id) as attempts'),
                    'attempts.learner_activity_output_id',
                    '=',
                    'learner_activity_output.learner_activity_output_id'
                )
                ->where('learner_activity_output.course_id', $course)
                ->where('learner_activity_output.learner_course_id', $gradeWithActivityData->learner_course_id)
                ->groupBy('learner_activity_output.activity_id', 'learner_activity_output.activity_content_id', 'activities.activity_title')
                ->get();

            // Retrieve quiz data for the current learner
            $gradeWithActivityData->quizzes = DB::table('learner_quiz_progress')
            ->select(
                'learner_quiz_progress.quiz_id',
                'quizzes.quiz_title',
                DB::raw('COALESCE(ROUND(AVG(IFNULL(learner_quiz_progress.score, 0)), 2), 0) as average_score')
            )
            ->leftJoin('quizzes', 'quizzes.quiz_id', '=', 'learner_quiz_progress.quiz_id')
            ->where('learner_quiz_progress.course_id', $course)
            ->where('learner_quiz_progress.learner_course_id', $gradeWithActivityData->learner_course_id)
            ->groupBy('learner_quiz_progress.quiz_id', 'quizzes.quiz_title')
            ->get();


            $gradeWithActivityData->pre_assessment = DB::table('learner_pre_assessment_progress')
            ->select(
                'score'
            )
            ->where('course_id', $course)
            ->where('learner_course_id', $gradeWithActivityData->learner_course_id)
            ->first();

            $gradeWithActivityData->post_assessment = DB::table('learner_post_assessment_progress')
            ->select (
                    DB::raw('COALESCE(ROUND(AVG(IFNULL(learner_post_assessment_progress.score, 0)), 2), 0) as average_score')
                )
                ->where('course_id', $course)
                ->where('learner_course_id', $gradeWithActivityData->learner_course_id)
                ->first();


        $activitySyllabusData = DB::table('activities')
        ->select(
            'activities.activity_id',
            'activities.course_id',
            'activities.syllabus_id',
            'activities.activity_title',
            'activity_content.total_score',

            'syllabus.topic_id'
        )
        ->join('syllabus', 'syllabus.syllabus_id', 'activities.syllabus_id')
        ->join('activity_content', 'activities.activity_id', 'activity_content.activity_id')
        ->where('activities.course_id', $course)
        ->orderBy('syllabus.topic_id',  'asc')
        ->get();

        $quizSyllabusData = DB::table('quizzes')
        ->select(
            'quizzes.quiz_id',
            'quizzes.course_id',
            'quizzes.syllabus_id',
            'quizzes.quiz_title',
            DB::raw('COUNT(quiz_content.question_id) AS total_score'),

            'syllabus.topic_id'
        )
        ->join('syllabus', 'syllabus.syllabus_id', 'quizzes.syllabus_id')
        ->join('quiz_content', 'quizzes.quiz_id', 'quiz_content.quiz_id')
        ->where('quizzes.course_id', $course)
        ->groupBy('quizzes.quiz_id', 'quizzes.course_id', 'quizzes.syllabus_id', 'quizzes.quiz_title', 'syllabus.topic_id')
        ->orderBy('syllabus.topic_id', 'asc')
        ->get();

        $learnerPreAssessmentData = DB::table('learner_pre_assessment_progress')
        ->select(
            'learner_pre_assessment_progress.learner_pre_assessment_progress_id',
            'learner_pre_assessment_progress.course_id',
            'learner_pre_assessment_progress.learner_id',
            'learner_pre_assessment_progress.learner_course_id',
            'learner_pre_assessment_progress.status',
            'learner_pre_assessment_progress.start_period',
            'learner_pre_assessment_progress.finish_period',
            'learner_pre_assessment_progress.score',
            'learner_pre_assessment_progress.remarks',

            'learner.learner_fname',
            'learner.learner_lname',
        )
        ->join('learner', 'learner.learner_id', 'learner_pre_assessment_progress.learner_id')
        ->where('learner_pre_assessment_progress.course_id', $course)
        ->where('learner_pre_assessment_progress.learner_id', $gradeWithActivityData->learner_id)
        ->get();

    $learnerPostAssessmentData = DB::table('learner_post_assessment_progress')
        ->select(
            'learner_post_assessment_progress.learner_post_assessment_progress_id',
            'learner_post_assessment_progress.course_id',
            'learner_post_assessment_progress.learner_course_id',
            'learner_post_assessment_progress.status',
            'learner_post_assessment_progress.start_period',
            'learner_post_assessment_progress.finish_period',
            'learner_post_assessment_progress.score',
            'learner_post_assessment_progress.remarks',
            'learner_post_assessment_progress.attempt',
            'learner.learner_fname',
            'learner.learner_lname',
        )
        ->join('learner', 'learner.learner_id', 'learner_post_assessment_progress.learner_id')
        ->where('learner_post_assessment_progress.course_id', $course)
        ->where('learner_post_assessment_progress.learner_id', $gradeWithActivityData->learner_id)
        ->get();


        $data = [
            'gradeWithActivityData' => $gradeWithActivityData,
            'syllabus' => $syllabus,
            'activitySyllabusData' => $activitySyllabusData,
            'quizSyllabusData' => $quizSyllabusData,
            'learnerPreAssessmentData' => $learnerPreAssessmentData,
            'learnerPostAssessmentData' => $learnerPostAssessmentData,
        ];

        $action = "Generated Selected Learner Gradesheet Course ID: " . $course . " Learner ID: " . $learnerNameData->learner_id;
        $this->log($action);

        $html = view('adminReports.learnerGradesheet', $data)->render();

        $dompdf = new Dompdf();

        $dompdf->loadHtml($html);


        $options = new Options();
        $options->set('isPhpEnabled', true); // Enable PHP code
        $options->set('defaultFont', 'Arial'); // Set the default font
        $options->set('scale', 0.6); // Set the scale of the PDF (0.8 = 80% scale)
        
        $dompdf->setOptions($options);

        $dompdf->render();


        $filename = "Course_" . $courseNameData->course_name . "_" . $learnerNameData->name . "_Grades_" . date('YmdHis') . '.pdf';

        $dompdf->stream($filename, array('Attachment' => true));


    } catch (\Exception $e) {
        dd($e->getMessage());
    }

}














    // get learner data

    public function searchLearner(Request $request) {
        try {
            $filterVal = $request->input('filterVal');
            // dd($filterVal);
            $learner = DB::table('learner')
            ->select(
                'learner.learner_id',
                DB::raw('CONCAT(learner.learner_fname, " ", learner.learner_lname) as name')
            );

            if ($filterVal) {
                $learner->where(function ($query) use ($filterVal) {
                    $query->where('learner_fname', 'LIKE', '%' . $filterVal . '%')
                          ->orWhere('learner_lname', 'LIKE', '%' . $filterVal . '%');
                });
            }
            

            $learners = $learner->get();

                $data = [
                    'learners' => $learners
                ];
    
                return response()->json($data);
                        
            } catch (\Exception $e) {
                return response()->json(['error' => $e->getMessage()], 500);
            }
    }


    // get instructor data
    public function searchInstructor(Request $request) {
        try {
            $filterVal = $request->input('filterVal');
            // dd($filterVal);
            $instructor = DB::table('instructor')
            ->select(
                'instructor.instructor_id',
                DB::raw('CONCAT(instructor.instructor_fname, " ", instructor.instructor_lname) as name')
            );

            if ($filterVal) {
                $instructor->where(function ($query) use ($filterVal) {
                    $query->where('instructor_fname', 'LIKE', '%' . $filterVal . '%')
                          ->orWhere('instructor_lname', 'LIKE', '%' . $filterVal . '%');
                });
            }
            

            $instructors = $instructor->get();

                $data = [
                    'instructors' => $instructors
                ];
    
                return response()->json($data);
                        
            } catch (\Exception $e) {
                return response()->json(['error' => $e->getMessage()], 500);
            }
    }
    

    public function searchCourse(Request $request) {
        try {
            $filterVal = $request->input('filterVal');
            // dd($filterVal);
            $course = DB::table('course')
            ->select(
                'course.course_id',
                'course.course_name'
            );

            if ($filterVal) {
                $course->where(function ($query) use ($filterVal) {
                    $query->where('course_name', 'LIKE', '%' . $filterVal . '%');
                });
            }
            

            $courses = $course->get();

                $data = [
                    'courses' => $courses
                ];
    
                return response()->json($data);
                        
            } catch (\Exception $e) {
                return response()->json(['error' => $e->getMessage()], 500);
            }
    }


    public function searchApprovedCourse(Request $request) {
        try {
            $filterVal = $request->input('filterVal');
            // dd($filterVal);
            $course = DB::table('course')
            ->select(
                'course.course_id',
                'course.course_name'
            )
            ->where('course.course_status', 'Approved');

            if ($filterVal) {
                $course->where(function ($query) use ($filterVal) {
                    $query->where('course_name', 'LIKE', '%' . $filterVal . '%');
                });
            }
            

            $courses = $course->get();

                $data = [
                    'courses' => $courses
                ];
    
                return response()->json($data);
                        
            } catch (\Exception $e) {
                return response()->json(['error' => $e->getMessage()], 500);
            }
    }

    public function searchLearnerCourse(Request $request) {
        try {
            $filterVal = $request->input('filterVal');
            $courseVal = $request->input('courseVal');

            $learnerCourse = DB::table('learner_course')
            ->select(
                DB::raw('CONCAT(learner.learner_fname, " ", learner.learner_lname) as name'),
                'learner_course.learner_course_id',
            )
            ->join('learner', 'learner_course.learner_id', 'learner.learner_id')
            ->where('learner_course.course_id', $courseVal);

            if ($filterVal) {
                $learnerCourse->where(function ($query) use ($filterVal) {
                    $query->where('learner.learner_fname', 'LIKE', '%' . $filterVal . '%')
                          ->orWhere('learner.learner_lname', 'LIKE', '%' . $filterVal . '%');
                });
            }
            

            $learners = $learnerCourse->get();

                $data = [
                    'learners' => $learners
                ];
    
                return response()->json($data);
                        
            } catch (\Exception $e) {
                return response()->json(['error' => $e->getMessage()], 500);
            }
    }
}
