<?php

namespace App\Livewire\Frontend;

use App\Models\Cms;
use Livewire\Component;

class Page extends Component
{
    public $slug;

    public function mount($slug = null)
    {
        $this->slug = $slug;
    }

    public function render()
    {
        $page = Cms::where('slug', $this->slug)->first();
        if (empty($page)){
            abort(404);
        }
        return view('livewire.frontend.page')
            ->layout(FRONTEND_LAYOUT,[
                'seoTitle' => $page->seo_title,
            ]);
    }
}
