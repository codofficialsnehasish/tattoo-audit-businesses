<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\CertificationType;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\NewsletterEmail;

class HomeController extends Controller
{
    public function index()
    {
        $certificates = CertificationType::where('is_visible',1)->get();
        $certificate_is_schorallable = count($certificates) > 4 ? true : false;
        $certificates = $certificates->chunk(4);

        $blogs = Blog::where('is_visible',1)->orderBy('id','desc')->limit(6)->get();

        return view('site.home',compact('certificates','certificate_is_schorallable','blogs'));
    }

    public function newsletter_subscribe(Request $request){
        $request->validate([
            'email' => 'required|email',
        ]);

        $NewsletterEmail = new NewsletterEmail();
        $NewsletterEmail->email = $request->email;
        $NewsletterEmail->save();

        return response()->json(['message' => 'Subscription successful']);
    }
}

