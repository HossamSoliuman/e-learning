<?php

namespace Modules\Frontend\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Frontend\Database\factories\AboutSectionTranslationFactory;

class AboutSectionTranslation extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'about_section_id',
        'lang_code',
        'title',
        'description',
        'button_text',
    ];
    
}
