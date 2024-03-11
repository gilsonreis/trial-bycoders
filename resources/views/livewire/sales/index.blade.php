<div id="sales-page">
    <div class="d-flex justify-content-between align-items-center page-title">
        <h3>List Sales</h3>
        <div class="sales-date">
            <label for="search_date_from">
                From: <input type="date" value="" class="form-control"
                             name="search_date_from" id="search_date_from" wire:model.blur="form.dateFrom"
                >
            </label>
            <label for="search_date_to">
                To: <input type="date" value="" class="form-control"
                           name="search_date_to" id="search_date_to" wire:model.blur="form.dateTo"
                ></label>
        </div>
    </div>
    <hr>
    <div class="filter-container d-flex justify-content-between align-items-center mb-3">
        <label for="brand_id">
            <select class="form-select" name="brand_id" id="brand_id" wire:change="filterModels"
                    wire:model.change="form.brandId">
                <option value="">Choose a brand car</option>
                @foreach($brands as $brand)
                    <option value="{{ $brand['id'] }}">{{ $brand['name'] }}</option>
                @endforeach
            </select>
        </label>
        <label for="model_id">
            <select class="form-select" name="model_id" id="model_id"
                    wire:model.change="form.modelId">
                <option value="">Choose a model car</option>
                @foreach($models as $model)
                    <option value="{{ $model['id'] }}">{{ $model['name'] }}</option>
                @endforeach
            </select>
        </label>
        <label for="seller_id">
            <select class="form-select" name="seller_id" id="seller_id"
                    wire:model.change="form.sellerId">
                <option value="">Choose a Seller</option>
                @foreach($sellers as $seller)
                    <option value="{{ $seller['id'] }}">{{ $seller['name'] }}</option>
                @endforeach
            </select>
        </label>
        <label for="customer_id">
            <select class="form-select" name="customer_id" id="customer_id"
                    wire:model.change="form.customerId">
                <option value="">Choose a customer</option>
                @foreach($customers as $customer)
                    <option value="{{ $customer['id'] }}">{{ $customer['name'] }}</option>
                @endforeach
            </select>
        </label>
        <label for="status">
            <select class="form-select" name="status" id="status"
                    wire:model.change="form.status">
                <option value="">Status</option>
                <option value="canceled">Canceled</option>
                <option value="completed">Completed</option>
                <option value="in_progress">In Progress</option>
            </select>
        </label>
    </div>
    <div class="table-responsive mt-4">
        <table class="table table-hover">
            <thead>
            <tr>
                <th class="bg-secondary-subtle">ID</th>
                <th class="bg-secondary-subtle">Customer</th>
                <th class="bg-secondary-subtle">Seller</th>
                <th class="bg-secondary-subtle">Car Brand</th>
                <th class="bg-secondary-subtle">Car Model</th>
                <th class="bg-secondary-subtle">Price</th>
                <th class="bg-secondary-subtle">Status</th>
                <th class="bg-secondary-subtle">Date</th>
            </tr>
            </thead>
            <tbody>
            @forelse($sales as $sale)
                <tr class="">
                    <td>{{ $sale->id }}</td>
                    <td>{{ $sale->customer }}</td>
                    <td>{{ $sale->seller }}</td>
                    <td>{{ $sale->brand }}</td>
                    <td>{{ $sale->model }}</td>
                    <td class="text-center">$ {{ number_format($sale->price, 2, ".", ",") }}</td>
                    <td class="text-center sale-status-{{ $sale->status }}">
                        {{ \App\Enum\Sales\SalesStatusEnum::formatValue($sale->status) }}
                    </td>
                    <td class="text-center">{{ $sale->created_at->format('Y-m-d') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="8">No sales found!</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
    <hr>
    <div class="container-pagination d-flex justify-content-between align-items-center">
        <div class="">
            <p class="pagination-sumary">Mostrando de {{ (($sales?->perPage()) * ($sales?->currentPage() - 1)) + 1 }}
                até
                {{ ($sales?->currentPage() === $sales?->lastPage()) ? $sales?->total() : $sales?->perPage() * $sales?->currentPage() }}
                de {{ $sales?->total() }} registros.
            </p>
        </div>
        <div class="">
            {{ $sales?->links() }}
        </div>

    </div>
</div>
