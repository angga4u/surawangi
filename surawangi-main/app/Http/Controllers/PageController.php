<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use App\Models\Banner;
use App\Models\Contact;
use App\Models\Staff;
use App\Settings\ProfileSettings;

class PageController extends Controller
{
    public function profile(ProfileSettings $profile)
    {
        $carousel = Banner::with('category')
            ->where('page_type', 'profile')
            ->get()
            ->map(function ($banner) {
                return [
                    'imgSrc' => asset("storage/$banner->thumbnail"),
                    'title' => $banner->title,
                    'description' => $banner->description,
                    'ctaUrl' => $banner->cta_url,
                    'ctaText' => $banner->cta_text,
                ];
            })
            ->toArray();

        $staffs = Staff::all();
        $achievements = Achievement::all();
        $contacts = Contact::all();

        return view('pages.profile', compact('carousel', 'profile', 'achievements', 'contacts', 'staffs'));
    }
}
