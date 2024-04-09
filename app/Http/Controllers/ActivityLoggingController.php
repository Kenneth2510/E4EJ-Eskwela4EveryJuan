<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\ActivityLogs;

class ActivityLoggingController extends Controller
{
    public function log_activity ($user_type, $user_id, $action) {
        
        try {

            $now = Carbon::now('Asia/Manila');
            $timestampString = $now->toDateTimeString();

            $data = [
                "user_type" => $user_type,
                "user_id" => $user_id, 
                "action" => $action,
                "timestamp" => $timestampString
            ];

            ActivityLogs::create($data);

        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}
