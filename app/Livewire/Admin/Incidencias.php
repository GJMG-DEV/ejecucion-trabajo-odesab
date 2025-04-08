<?php

namespace App\Livewire\Admin;

use Illuminate\View\View;
use Livewire\Component;

class Incidencias extends Component
{
    public function render():View
    {
        return view('livewire.admin.incidencias')->layout('maestra');
    }
}
