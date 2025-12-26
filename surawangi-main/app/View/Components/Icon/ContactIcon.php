<?php

namespace App\View\Components\Icon;

use App\Models\Contact;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ContactIcon extends Component
{
    public string $icon;

    /**
     * Create a new component instance.
     */
    public function __construct(public Contact $contact)
    {
        $this->icon = $this->getIcon();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.icon.contact-icon');
    }

    protected function getIcon()
    {
        $icon = [
            'email' => 'bi-envelope',
            'phone' => 'bi-telephone',
            'address' => 'bi-geo',
        ];
        return $icon[$this->contact->platform];
    }
}
