<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    protected $fillable = ['language_id', 'name', 'slug'];

    public function language()
    {
        return $this->belongsTo(Language::class);
    }

    public function districts()
    {
        return $this->hasMany(District::class);
    }
}
