<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LicenseController extends Controller
{
    /**
     * ডোমেইন এবং .env কী ব্যবহার করে মাদার সাইট থেকে লাইসেন্স তথ্য যাচাই করা
     */
    public function licenseInfo()
    {
        // ১. মাদার সাইটের ভেরিফিকেশন এপিআই ইউআরএল
        $apiUrl = "https://creativedesign.com.bd/api/verify-license"; 

        // ২. বর্তমান ডোমেইন সংগ্রহ এবং ক্লিন করা (news1.creativedesign.com.bd)
        $rawDomain = request()->getHost(); 
        $domain = preg_replace('/^www\./', '', $rawDomain); 
        
        // ৩. .env ফাইল থেকে লাইসেন্স কী সংগ্রহ করা
        $license_key = env('LICENSE_KEY'); 

        // .env ফাইলে কী না থাকলে সরাসরি মেসেজ দিয়ে ভিউতে পাঠানো
        if (!$license_key) {
            $licenseData = [
                'status' => 'invalid', 
                'message' => '.env ফাইলে কোনো লাইসেন্স কী (LICENSE_KEY) সেট করা নেই।'
            ];
            return view('admin.license.info', compact('licenseData'));
        }

        try {
            // ৪. মাদার সাইটে ডোমেইন এবং কী পাঠানো হচ্ছে
            // SSL ভেরিফিকেশন ফলস রাখা হয়েছে যাতে লোকাল হোস্ট বা সেলফ-সাইনড সার্টিফিকেটে সমস্যা না হয়
            $response = Http::withOptions([
                'verify' => false
            ])->timeout(15)->post($apiUrl, [
                'domain'      => $domain,
                'license_key' => $license_key,
            ]);

            // যদি এপিআই কল সফল হয় (Status code 200)
            if ($response->successful()) {
                $licenseData = $response->json(); 
            } else {
                // সার্ভার এরর হলে
                $licenseData = [
                    'status' => 'invalid', 
                    'message' => 'মাদার সার্ভার রেসপন্স করছে না। এরর কোড: ' . $response->status()
                ];
            }

        } catch (\Exception $e) {
            // নেটওয়ার্ক বা অন্য কোনো টেকনিক্যাল এরর হলে তা লগ করা
            Log::error("License Check Error: " . $e->getMessage());
            
            $licenseData = [
                'status' => 'error', 
                'message' => 'মাদার সাইটের সাথে সংযোগ স্থাপন করা সম্ভব হচ্ছে না।'
            ];
        }

        // ৫. সকল ডাটা ভিউতে পাঠানো
        return view('admin.license.info', compact('licenseData'));
    }
}