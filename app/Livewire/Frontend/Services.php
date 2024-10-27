<?php

namespace App\Livewire\Frontend;

use App\Models\SingleService;
use Livewire\Component;

class Services extends Component
{
    public $search;
    public function render()
    {
        $services = SingleService::where('status', STATUS_ENABLED);
        if (!empty($this->search)) {
            $servicesWithSearch = clone $services;
            $servicesWithSearch = $servicesWithSearch->where('name', 'LIKE', "%{$this->search}%")->orderByDesc('is_other_site')->orderByDesc('id')->get();
            if ($servicesWithSearch->isNotEmpty()) {
                $services = $servicesWithSearch;
            } else {
                $services = $services->where('is_other_site', 1)->orderByDesc('id')->get();
            }
        } else {
            $services = $services->orderByDesc('is_other_site')->orderByDesc('id')->get();
        }
        return view('livewire.frontend.services')
            ->layout('frontend.layouts.app',['seoTitle' => 'Services'])
            ->with([
                'services' => $services
            ]);
    }
}
