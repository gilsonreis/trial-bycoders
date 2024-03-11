<?php

namespace App\Livewire\Forms\Sales;

use Livewire\Attributes\Validate;
use Livewire\Form;

class SearchForm extends Form
{
    public ?string $dateFrom = null;
    public ?string $dateTo = null;
    public ?string $brandId = null;
    public ?string $modelId = null;
    public ?string $sellerId = null;
    public ?string $customerId = null;

    public ?string $status = null;

}

