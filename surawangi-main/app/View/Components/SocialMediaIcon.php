<?php

namespace App\View\Components;

use App\Models\SocialMedia;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SocialMediaIcon extends Component
{
    public string $className;
    public string $icon;

    /**
     * Create a new component instance.
     */
    public function __construct(public SocialMedia $social)
    {
        $this->className = $this->getClassName();
        $this->icon = $this->getIcon();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.social-media-icon');
    }

    protected function getClassName()
    {
        $classes = [
            'instagram' => '!bg-purple-500 !hover:bg-purple-600',
            'tiktok' => '!bg-slate-600 !hover:bg-slate-700',
            'twitter' => '!bg-slate-600 !hover:bg-slate-700',
            'facebook' => '!bg-blue-500 !hover:bg-blue-600',
            'youtube' => '!bg-red-500 !hover:bg-red-600'
        ];
        return $classes[$this->social->platform];
    }

    protected function getIcon()
    {
        $icon = [
            'instagram' => 'bi-instagram',
            'tiktok' => 'bi-tiktok',
            'twitter' => 'bi-twitter-x',
            'facebook' => 'bi-facebook',
            'youtube' => 'bi-youtube'
        ];
        return $icon[$this->social->platform];
    }
}
