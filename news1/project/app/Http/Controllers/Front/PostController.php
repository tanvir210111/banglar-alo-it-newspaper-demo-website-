<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    // ✅ নিউজ ডিটেইলস পেজ
    public function details($id, $slug)
    {
        $data = Post::where('id', $id)->where('slug', $slug)->firstOrFail();
        // ভিউ কাউন্ট বাড়ানো
        $data->increment('views_count');
        return view('frontend.details', compact('data'));
    }

    // ✅ প্রিন্ট ভিউ পেজ (ইপেপার স্টাইল)
    public function print($id, $slug)
    {
        $data = Post::where('id', $id)->where('slug', $slug)->firstOrFail();
        return view('frontend.print', compact('data'));
    }
}
