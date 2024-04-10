<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Business;
use App\Models\Learner;
use App\Models\Instructor;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class AccountDetailVerifierController extends Controller
{
    public function checkLearnerContact(Request $request) {

        $contact_number = $request->input('number');

        $currentLearnerRowData = DB::table('learner')
        ->where('learner_contactno', $contact_number)
        ->first();

        if ($currentLearnerRowData) {
            // Contact number exists
            return response()->json(['exists' => true]);
        } else {
            // Contact number does not exist
            return response()->json(['exists' => false]);
        }
    }


    public function checkLearnerUsername(Request $request) {

        $username = $request->input('username');

        $currentLearnerRowData = DB::table('learner')
        ->where('learner_username', $username)
        ->first();

        if ($currentLearnerRowData) {
            // Contact number exists
            return response()->json(['exists' => true]);
        } else {
            // Contact number does not exist
            return response()->json(['exists' => false]);
        }
    }

    public function checkLearnerEmail(Request $request) {

        $email = $request->input('email');

        $currentLearnerRowData = DB::table('learner')
        ->where('learner_email', $email)
        ->first();

        if ($currentLearnerRowData) {
            // Contact number exists
            return response()->json(['exists' => true]);
        } else {
            // Contact number does not exist
            return response()->json(['exists' => false]);
        }
    }


    public function checkLearnerBPLO(Request $request) {

        $bplo = $request->input('bplo_account_number');

        $currentLearnerRowData = DB::table('business')
        ->where('bplo_account_number', $bplo)
        ->first();

        if ($currentLearnerRowData) {
            // Contact number exists
            return response()->json(['exists' => true]);
        } else {
            // Contact number does not exist
            return response()->json(['exists' => false]);
        }
    }


    public function checkExistingLearnerContact(Learner $learner, Request $request) {

        $contact_number = $request->input('number');

        $currentLearnerRowData = DB::table('learner')
        ->where('learner_contactno', $contact_number)
        ->first();

        if ($currentLearnerRowData && $currentLearnerRowData->learner_id !== $learner->learner_id) {
            // Contact number exists
            return response()->json(['exists' => true]);
        } else {
            // Contact number does not exist
            return response()->json(['exists' => false]);
        }
    }



    public function checkExistingLearnerEmail(Learner $learner, Request $request) {

        $email = $request->input('email');

        $currentLearnerRowData = DB::table('learner')
        ->where('learner_email', $email)
        ->first();

        if ($currentLearnerRowData && $currentLearnerRowData->learner_id !== $learner->learner_id) {
            // Contact number exists
            return response()->json(['exists' => true]);
        } else {
            // Contact number does not exist
            return response()->json(['exists' => false]);
        }
    }


    public function checkExistingLearnerBPLO(Learner $learner, Request $request) {

        $bplo = $request->input('bplo_account_number');

        $currentLearnerRowData = DB::table('business')
        ->where('bplo_account_number', $bplo)
        ->first();

        if ($currentLearnerRowData && $currentLearnerRowData->learner_id !== $learner->learner_id) {
            // Contact number exists
            return response()->json(['exists' => true]);
        } else {
            // Contact number does not exist
            return response()->json(['exists' => false]);
        }
    }



    public function checkInstructorContact(Request $request) {

        $contact_number = $request->input('number');

        $currentInstructorRowData = DB::table('instructor')
        ->where('instructor_contactno', $contact_number)
        ->first();

        if ($currentInstructorRowData) {
            // Contact number exists
            return response()->json(['exists' => true]);
        } else {
            // Contact number does not exist
            return response()->json(['exists' => false]);
        }
    }

    public function checkInstructorUsername(Request $request) {

        $username = $request->input('username');

        $currentInstructorRowData = DB::table('instructor')
        ->where('instructor_username', $username)
        ->first();

        if ($currentInstructorRowData) {
            // Contact number exists
            return response()->json(['exists' => true]);
        } else {
            // Contact number does not exist
            return response()->json(['exists' => false]);
        }
    }


    public function checkInstructorEmail(Request $request) {

        $email = $request->input('email');

        $currentInstructorRowData = DB::table('instructor')
        ->where('instructor_email', $email)
        ->first();

        if ($currentInstructorRowData) {
            // Contact number exists
            return response()->json(['exists' => true]);
        } else {
            // Contact number does not exist
            return response()->json(['exists' => false]);
        }
    }


    public function checkExistingInstructorContact(Instructor $instructor, Request $request) {

        $contact_number = $request->input('number');

        $currentInstructorRowData = DB::table('instructor')
        ->where('instructor_contactno', $contact_number)
        ->first();

        if ($currentInstructorRowData && $currentInstructorRowData->instructor_id !== $instructor->instructor_id) {
            // Contact number exists
            return response()->json(['exists' => true]);
        } else {
            // Contact number does not exist
            return response()->json(['exists' => false]);
        }
    }



    public function checkExistingInstructorEmail(Instructor $instructor, Request $request) {

        $email = $request->input('email');

        $currentInstructorRowData = DB::table('instructor')
        ->where('instructor_email', $email)
        ->first();

        if ($currentInstructorRowData && $currentInstructorRowData->instructor_id !== $instructor->instructor_id) {
            // Contact number exists
            return response()->json(['exists' => true]);
        } else {
            // Contact number does not exist
            return response()->json(['exists' => false]);
        }
    }
}

