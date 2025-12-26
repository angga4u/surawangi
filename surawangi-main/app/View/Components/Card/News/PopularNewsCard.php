<?php

namespace App\View\Components\Card\News;

use App\Models\Post;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PopularNewsCard extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public int|string $number, public Post $post)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card.news.popular-news-card');
    }
}
