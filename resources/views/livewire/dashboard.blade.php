<div wire:poll.10s.keep-alive>
    <div class="row bg-secondary-subtle pt-4 p-3 mt-2 m-4">
        <h3>Counters</h3>
        <hr>
        <div class="col-md-3">
            <livewire:partials.dashboard.counters title="Number of sales this month" :value="$qtySalesCurrentMonth"/>
        </div>
        <div class="col-md-3">
            <livewire:partials.dashboard.counters title="Total of sales this month"
                                                  :value="'$ ' . number_format($totalVelueSalesCurrentMonth, 2)"/>
        </div>
        <div class="col-md-3">
            <livewire:partials.dashboard.counters title="Number of sales today" :value="$qtySalesToday"/>
        </div>
        <div class="col-md-3">
            <livewire:partials.dashboard.counters title="Total of sales today"
                                                  :value="'$ ' . number_format($totalVelueSalesToday, 2)"/>
        </div>
    </div>
    <div class="row bg-secondary-subtle pt-4 p-3 mt-2 m-4">
        <h3>Rankings - <small class="sub-title-text-small">Current Month</small></h3>
        <hr>
        <div class="col-md-4">
            <livewire:partials.dashboard.ranking title="Top Sellers" :items="$rankingTopSellers"/>
        </div>
        <div class="col-md-4">
            <livewire:partials.dashboard.ranking title="Top Car Brands" :items="$rankingTopBrands"/>
        </div>
        <div class="col-md-4">
            <livewire:partials.dashboard.ranking title="Top Car Models" :items="$rankingTopModels"/>
        </div>
    </div>
    <div class="row bg-secondary-subtle pt-4 p-3 mt-2 m-4">
        <div class="chart-title d-flex justify-content-between align-items-center">
            <h3>Showing sales by day - <small class="sub-title-text-small">last {{ $chartDays }} days</small></h3>
            <label>
                <select name="chartDays" id="chartDays" wire:model.change="chartDays" class="form-select">
                    <option {{ $chartDays === "7" ? "selected='selected'" : "" }} value="7">Last 7 days</option>
                    <option {{ $chartDays === "30" ? "selected='selected'" : "" }} value="30">Last 30 days</option>
                    <option {{ $chartDays === "90" ? "selected='selected'" : "" }} value="90">Last 90 days</option>
                    <option {{ $chartDays === "180" ? "selected='selected'" : "" }} value="180">Last 180 days</option>
                </select>
            </label>
        </div>
        <div class="chart-body text-bg-light rounded rounded-2 mt-3">
            <livewire:livewire-column-chart
                key="{{ $chartsSalesByDay->reactiveKey() }}"
                :column-chart-model="$chartsSalesByDay"
            />
        </div>
    </div>
    <div class="row bg-secondary-subtle pt-4 p-3 mt-2 m-4">
        <div class="col-md-6">
            <div class="chart-body text-bg-light rounded rounded-2 pt-3">
                <livewire:livewire-pie-chart
                    key="{{ $chartSalesByModel->reactiveKey() }}"
                    :pie-chart-model="$chartSalesByModel"
                />
            </div>
        </div>
        <div class="col-md-6">
            <div class="chart-body text-bg-light rounded rounded-2 pt-3">
                <livewire:livewire-pie-chart
                    key="{{ $chartSalesByStatus->reactiveKey() }}"
                    :pie-chart-model="$chartSalesByStatus"
                />
            </div>
        </div>
    </div>
    <div class="row bg-secondary-subtle pt-4 p-3 mt-2 m-4">
        <div class="chart-title d-flex justify-content-between align-items-center">
            <h3>Showing sales last 12 months</h3>
            <label>
                <select name="sellerId" id="sellerId" wire:model.change="sellerId" class="form-select">
                    @foreach($allSellers as $seller)
                        <option value="{{ $seller['id'] }}">{{ $seller['name'] }}</option>
                    @endforeach
                </select>
            </label>
        </div>
        <div class="chart-body text-bg-light rounded rounded-2 mt-3">
            <livewire:livewire-line-chart
                key="{{ $chartSalesLast12Month->reactiveKey() }}"
                :line-chart-model="$chartSalesLast12Month"
            />
        </div>
    </div>
</div>
