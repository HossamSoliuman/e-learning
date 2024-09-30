<?php

namespace Modules\Frontend\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Modules\Frontend\Database\factories\FaqSectionFactory;

class FaqSection extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['image', 'id'];


    public function translation(): ?HasOne
    {
        return $this->hasOne(FaqSectionTranslation::class)->where('lang_code', getSessionLanguage());
    }

    public function getTranslation($code): ?FaqSectionTranslation
    {
        return $this->hasOne(FaqSectionTranslation::class)->where('lang_code', $code)->first();
    }

    public function translations(): ?HasMany
    {
        return $this->hasMany(FaqSectionTranslation::class, 'faq_section_id');
    }
    
}
