<?php

namespace App\Livewire\Partials\Dashboard;

use Livewire\Attributes\Reactive;
use Livewire\Component;

class Counters extends Component
{
    #[Reactive]
    public string $title;

    #[Reactive]
    public string $value;

    public function render()
    {
        return view('livewire.partials.dashboard.counters');
    }
}
