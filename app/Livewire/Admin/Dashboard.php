<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Illuminate\View\View;
class Dashboard extends Component
{
    public function render(): View
    {
        return view('livewire.admin.dashboard')->layout('maestra');
    }
}
