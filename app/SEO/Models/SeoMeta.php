<?php

namespace App\SEO\Models;

use Illuminate\Database\Eloquent\Model;

class SeoMeta extends Model
{
    protected $fillable = [
        'path',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'robots',
        'canonical_url',
        'og_title',
        'og_description',
        'og_image',
        'og_type',
        'twitter_title',
        'twitter_description',
        'twitter_image',
        'schema_markup',
        'header_scripts',
        'footer_scripts',
        'is_active',
    ];
    protected $casts = [
    'header_scripts' => 'array',
    'footer_scripts' => 'array',
];
}
