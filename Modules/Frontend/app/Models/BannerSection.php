<?php

namespace Modules\Frontend\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Frontend\Database\factories\BannerSectionFactory;

class BannerSection extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['id', 'instructor_image', 'student_image'];
    
    protected static function newFactory(): BannerSectionFactory
    {
        //return BannerSectionFactory::new();
    }
}
