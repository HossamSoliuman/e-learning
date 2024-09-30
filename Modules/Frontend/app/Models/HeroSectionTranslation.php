<?php

namespace Modules\Frontend\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Frontend\Database\factories\HeroSectionTranslationFactory;

class HeroSectionTranslation extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'id',
        'lang_code',
        'hero_section_id',
        'title',
        'sub_title',
        'action_button_text',
        'video_button_text',
        'total_student',
        'total_instructor'
    ];
}
