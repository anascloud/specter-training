<?php

namespace App\Models\Cms;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Page extends Model
{
    use HasFactory;

    protected $table = 'cms_pages';

    protected $fillable = [
        'title',
        'slug',
        'meta_title',
        'meta_description',
        'status',
        'seo_score',
        'seo_report',
    ];

    protected $casts = [
        'seo_report' => 'array',
        'seo_score' => 'integer',
    ];

    public function sections(): HasMany
    {
        return $this->hasMany(Section::class, 'page_id')->orderBy('sort_order');
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('status', 'published');
    }
}

