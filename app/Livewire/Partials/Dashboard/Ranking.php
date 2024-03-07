<?php

namespace App\Livewire\Partials\Dashboard;

use Livewire\Attributes\Reactive;
use Livewire\Component;

class Ranking extends Component
{
    #[Reactive]
    public string $title;

    #[Reactive]
    public array $items;

    public function render()
    {
        return view('livewire.partials.dashboard.ranking');
    }
}
