<?php

namespace Modules\Frontend\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Frontend\Database\factories\OurFeaturesSectionTranslationFactory;

class OurFeaturesSectionTranslation extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'title_one',
        'sub_title_one',
        'title_two',
        'sub_title_two',
        'title_three',
        'sub_title_three',
        'title_four',
        'sub_title_four',
    ];
    

}
