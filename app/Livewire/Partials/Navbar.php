<?php

namespace App\Livewire\Partials;

use Livewire\Component;

class Navbar extends Component
{
    public string $page = '';

    public function mount($page)
    {
        $this->page = $page;
    }

    public function render()
    {
        return view('livewire.partials.navbar');
    }
}
