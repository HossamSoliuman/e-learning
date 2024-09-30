<?php

namespace Modules\Frontend\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Modules\Frontend\Database\factories\OurFeaturesSectionFactory;

class OurFeaturesSection extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['image_one', 'image_two', 'image_three', 'id'];

    public function translation(): ?HasOne
    {
        return $this->hasOne(OurFeaturesSectionTranslation::class)->where('lang_code', getSessionLanguage());
    }

    public function getTranslation($code): ?OurFeaturesSectionTranslation
    {
        return $this->hasOne(OurFeaturesSectionTranslation::class)->where('lang_code', $code)->first();
    }

    public function translations(): ?HasMany
    {
        return $this->hasMany(OurFeaturesSectionTranslation::class, 'our_features_section_id', 'id');
    }
}
