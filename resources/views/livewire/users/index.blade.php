<div>
    <div class="d-flex justify-content-between page-title">
        <h3>List Users</h3>
        <a href="" class="btn btn-primary"> <i class="bi bi-plus-circle"></i> Add User</a>
    </div>
    <hr>
    <div class="filter-container d-flex align-items-center mb-3">
        <label for="search" class="me-2">Search</label>
        <input type="text" class="shadow-none search border border-1 p-1 rounded-2" id="search" wire:model.live="search">
    </div>
    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th class="bg-secondary-subtle">ID</th>
                <th class="bg-secondary-subtle">Name</th>
                <th class="bg-secondary-subtle">E-mail</th>
                <th class="bg-secondary-subtle">Phone</th>
                <th class="bg-secondary-subtle">City</th>
                <th class="bg-secondary-subtle">State</th>
                <th class="bg-secondary-subtle"></th>
            </tr>
            </thead>
            <tbody>
            @forelse($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->userInfo->phone }}</td>
                    <td>{{ $user->userInfo->city }}</td>
                    <td>{{ $user->userInfo->state }}</td>
                    <td></td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">There no one user here!</td>
                </tr>
            @endforelse

            </tbody>
        </table>
    </div>
    <hr>
    <div class="container-pagination d-flex justify-content-between">
        <div class="">
            <p class="pagination-sumary">Mostrando de {{ (($users->perPage()) * ($users->currentPage() - 1)) + 1 }}
                até
                {{ ($users->currentPage() === $users->lastPage()) ? $users->total() : $users->perPage() * $users->currentPage() }}
                de {{ $users->total() }} registros.
            </p>
        </div>
        <div class="">
            {{ $users->links() }}
        </div>

    </div>
</div>
