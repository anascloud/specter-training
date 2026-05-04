<?php

namespace App\Models\Cms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Section extends Model
{
    use HasFactory;

    protected $table = 'cms_sections';

    protected $fillable = [
        'page_id',
        'name',
        'type',
        'css_classes',
        'content',
        'content_json',
        'sort_order',
    ];

    protected $casts = [
        'content_json' => 'array',
        'sort_order' => 'integer',
    ];

    public function page(): BelongsTo
    {
        return $this->belongsTo(Page::class, 'page_id');
    }
}

