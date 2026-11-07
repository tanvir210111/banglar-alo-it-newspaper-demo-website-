<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'language_id',
        'division_id',
        'district_id',
        'upazila_id',
        'title',
        'slug',
        'short_description',
        'images_caption',
        'meta_tag',
        'show_right_column',
        'is_feature',
        'is_slider',
        'is_trending',
        'is_videoGallery',
        'tags',
        'description',
        'image_big',
        'rss_image',
        'image_small',
        'video',
        'audio',
        'category_id',
        'subcategories_id',
        'admin_id',
        'user_id',
        'status',
        'schedule_post',
        'schedule_post_date',
        'is_pending',
        'post_type',
        'slider_left',
        'slider_right',
        'rss_link',
        'embed_video'
    ];

    protected $table = 'posts';

    protected $dates = [
        'created_at',
        'updated_at',
        'schedule_post_date',
    ];

    // 🔹 Relationships
    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id')->withDefault(function ($data) {
            foreach ($data->getFillable() as $dt) {
                $data[$dt] = __('Deleted');
            }
        });
    }

    public function language()
    {
        return $this->belongsTo(Language::class)->withDefault();
    }

    public function division()
    {
        return $this->belongsTo(Division::class)->withDefault();
    }

    public function district()
    {
        return $this->belongsTo(District::class)->withDefault();
    }

    public function upazila()
    {
        return $this->belongsTo(Upazila::class)->withDefault();
    }

    public function admin()
    {
        return $this->belongsTo('App\Models\Admin')->withDefault();
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User')->withDefault();
    }

    public function galleries()
    {
        return $this->hasMany('App\Models\Gallery', 'post_id');
    }

    public function views()
    {
        return $this->hasMany('App\Models\View', 'post_id');
    }

    public function tquizs()
    {
        return $this->hasMany('App\Models\TriviaQuestion', 'post_id');
    }

    public function tresults()
    {
        return $this->hasMany('App\Models\TriviaResult', 'post_id');
    }

    public function pquizs()
    {
        return $this->hasMany('App\Models\PersonalityQuestion', 'post_id');
    }

    public function presults()
    {
        return $this->hasMany('App\Models\PersonalityResult', 'post_id');
    }

    public function sorts()
    {
        return $this->hasMany('App\Models\ShortList', 'post_id');
    }

    // 🔹 Helper
    public function createdAt()
    {
        return $this->created_at->toFormattedDateString();
    }
}
