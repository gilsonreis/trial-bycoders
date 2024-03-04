<div>
    <h3>Create new user</h3>
    <hr>
    <form action="" novalidate wire:submit="saveNewUser">
        <div class="row">
            <div class="mb-3 col-md-6 @error('form.name')group-error @enderror">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" wire:model.lazy="form.name">
                @error('form.name') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="mb-3 col-md-6 @error('form.email')group-error @enderror">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" wire:model.lazy="form.email">
                @error('form.email') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="row">
            <div class="mb-3 col-md-6 @error('form.password')group-error @enderror">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" wire:model.lazy="form.password">
                @error('form.password') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="mb-3 col-md-6 @error('form.confirmPassword')group-error @enderror">
                <label for="confirmPassword" class="form-label">Confirm password</label>
                <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" wire:model.lazy="form.confirmPassword">
                @error('form.confirmPassword') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="d-flex justify-content-between border-top border-1">
            <a href="{{ route('users.index') }}" class="btn btn-outline-secondary  mt-3 px-4"><i class="bi bi-arrow-left"></i> Voltar</a>
            <button type="submit" class="btn btn-primary mt-3 px-4"><i class="bi bi-floppy2"></i> Save</button>
        </div>
    </form>
</div>
