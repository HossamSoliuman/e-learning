<?php

namespace Modules\InstructorRequest\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\InstructorRequest\Database\factories\InstructorRequestSettingFactory;

class InstructorRequestSetting extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['id', 'need_certificate', 'need_identity_scan', 'instructions', 'bank_information'];

}
