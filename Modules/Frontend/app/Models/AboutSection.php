<?php

namespace Modules\Frontend\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Modules\Frontend\Database\factories\AboutSectionFactory;

class AboutSection extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'id',
        'image',
        'video_url',
        'button_url'
    ];

    public function translation(): ?HasOne
    {
        return $this->hasOne(AboutSectionTranslation::class)->where('lang_code', getSessionLanguage());
    }

    public function getTranslation($code): ?AboutSectionTranslation
    {
        return $this->hasOne(AboutSectionTranslation::class)->where('lang_code', $code)->first();
    }

    public function translations(): ?HasMany
    {
        return $this->hasMany(AboutSectionTranslation::class, 'about_section_id');
    }
}
