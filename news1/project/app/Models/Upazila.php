<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Upazila extends Model
{
    protected $fillable = ['language_id', 'district_id', 'name', 'slug'];

    public function language()
    {
        return $this->belongsTo(Language::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }
}
