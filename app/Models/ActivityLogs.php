<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityLogs extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $primaryKey = 'activity_log_id';
    protected $table = 'activity_logs';

    protected $fillable = [
        'activity_log_id',
        'user_type',
        'user_id',
        'action',
        'timestamp'
    ];
}
