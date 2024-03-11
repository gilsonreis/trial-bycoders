<?php

namespace App\Livewire\Sales;

use App\Livewire\Forms\Sales\SearchForm;
use App\UseCases\CarBrands\ListCarBrandsToDropdownUseCase;
use App\UseCases\CarModels\ListCarModelsToDropdownUseCase;
use App\UseCases\Sales\ListAllSalesUseCase;
use App\UseCases\Users\ListAllCustomersUseCase;
use App\UseCases\Users\ListAllSellersUseCase;
use DateInterval;
use DateTime;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Title("Sales")]
class Index extends Component
{
    use WithPagination;

    public SearchForm $form;

    public ?array $customers;
    public ?array $sellers;
    public ?array $brands;
    public ?array $models;

    public function mount(
        ListAllCustomersUseCase $listAllCustomersUseCase,
        ListAllSellersUseCase $listAllSellersUseCase,
        ListCarBrandsToDropdownUseCase $listCarBrandsToDropdownUseCase,
        ListCarModelsToDropdownUseCase $listCarModelsToDropdownUseCase,
        ListAllSalesUseCase $listAllSalesUseCase
    )
    {
        $this->customers = $listAllCustomersUseCase->handle();
        $this->sellers = $listAllSellersUseCase->handle();
        $this->brands = $listCarBrandsToDropdownUseCase->handle();
        $this->models = $listCarModelsToDropdownUseCase->handle();

        $this->form->brandId = null;
        $thirtyDaysAgo = new DateInterval('P30D');
        $this->form->dateFrom = (new DateTime())->sub($thirtyDaysAgo)->format('Y-m-d');
        $this->form->dateTo = (new DateTime())->format("Y-m-d");
    }

    public function filterModels(ListCarModelsToDropdownUseCase $listCarModelsToDropdownUseCase)
    {
        $this->form->modelId = "";
        $brandId = empty($this->form->brandId) ? null : $this->form->brandId;
        $this->models = $listCarModelsToDropdownUseCase->handle($brandId);
        $this->resetPage();
    }

    public function render(ListAllSalesUseCase $listAllSalesUseCase)
    {
        $sales = $listAllSalesUseCase->handle(
            $this->form->dateFrom,
            $this->form->dateTo,
            $this->form->brandId,
            $this->form->modelId,
            $this->form->sellerId,
            $this->form->customerId,
            $this->form->status
        );

        return view('livewire.sales.index', ['sales' => $sales]);
    }
}
