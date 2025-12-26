<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class NewsController extends Controller
{
    public static string $sessionKeyPrefix = 'viewed_post_';

    // =======================
    //  HALAMAN BERANDA
    // =======================
    public function index(Request $request)
    {
        $search = $request->input('search');

        $query = Post::query()
            ->news()
            ->orderByDesc('published_at')
            ->when($search, function (Builder $builder) use ($search) {
                $builder->where('title', 'LIKE', "%{$search}%");
            });

        if (!$search) {
            $query->limit(15);
        }

        $posts = $query->paginate(25);

        $carousel = Banner::with('category')
            ->where('page_type', 'home')
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

        return view('pages.home', compact('carousel', 'posts'));
    }

    // =======================
    //  HALAMAN DETAIL BERITA
    // =======================
    public function show(Category $category, string $slug)
    {
        // Ambil berita berdasarkan slug dan kategori
        $news = Post::with(['publisher', 'category'])
            ->news()
            ->where('slug', $slug)
            ->where('category_id', $category->id)
            ->firstOrFail();

        // Berita populer bulan ini
        $popularNews = Post::with('category')
            ->news()
            ->whereMonth('published_at', Carbon::now()->month)
            ->orderByDesc('views')
            ->limit(5)
            ->get();

        // Berita terkait kategori yang sama
        $relatedNews = Post::news()
            ->where('category_id', $category->id)
            ->where('id', '!=', $news->id)
            ->limit(5)
            ->get();

        // Hitung view hanya sekali per session
        $sessionKey = self::$sessionKeyPrefix . $news->id;
        if (!session()->has($sessionKey)) {
            $news->increment('views');
            session()->put($sessionKey, true);
        }

        return view('pages.news', compact('news', 'popularNews', 'relatedNews'));
    }

    // =======================
    //  HALAMAN PER KATEGORI
    // =======================
    public function category(Category $category)
    {
        $featuredPosts = $category->posts()
            ->news()
            ->orderByDesc('views')
            ->first();

        $popularPosts = Post::with('category')
            ->news()
            ->whereMonth('published_at', Carbon::now()->month)
            ->orderByDesc('views')
            ->limit(5)
            ->get();

        $posts = $category->posts()
            ->news()
            ->paginate(25);

        $carousel = Banner::with('category')
            ->where('page_type', 'category')
            ->whereHas('category', function ($query) use ($category) {
                $query->where('id', $category->id)
                      ->where('is_active', true);
            })
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

        return view('pages.category', compact('featuredPosts', 'popularPosts', 'category', 'carousel', 'posts'));
    }
}
