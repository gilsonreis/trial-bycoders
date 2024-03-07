<div class="text-bg-light rounded rounded-1 p-3">
    <h5>{{ $title }}</h5>
    <ul class="list-group">
    @foreach($items as $model)
        <li class="list-group-item d-flex justify-content-between">
            <span>
                {{ $model->name }}
            </span>
            <span>
                {{ $model->total }}
            </span>
        </li>
    @endforeach
    </ul>
</div>
