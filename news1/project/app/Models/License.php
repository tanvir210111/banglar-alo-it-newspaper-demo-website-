<?php

namespace App\Models; // এই লাইনটি ঠিক থাকতে হবে

use Illuminate\Database\Eloquent\Model;

class License extends Model
{
    // আপনার টেবিলের নাম যদি 'licenses' না হয়ে অন্য কিছু হয় তবে এখানে বলে দিতে পারেন
    protected $table = 'licenses'; 

    protected $fillable = ['domain_name', 'license_key', 'expiry_date', 'status'];
}