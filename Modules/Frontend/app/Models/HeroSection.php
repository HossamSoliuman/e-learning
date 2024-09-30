<?php

namespace Modules\Frontend\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Modules\Blog\app\Models\BlogTranslation;
use Modules\Frontend\Database\factories\HeroSectionFactory;

class HeroSection extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $guarded = [];

    public function translation(): ?HasOne
    {
        return $this->hasOne(HeroSectionTranslation::class)->where('lang_code', getSessionLanguage());
    }

    public function getTranslation($code): ?HeroSectionTranslation
    {
        return $this->hasOne(HeroSectionTranslation::class)->where('lang_code', $code)->first();
    }

    public function translations(): ?HasMany
    {
        return $this->hasMany(HeroSectionTranslation::class, 'hero_section_id', 'id');
    }
    
}
