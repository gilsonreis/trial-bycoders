<div>
    <h3>User Profile</h3>
    <hr>
    <form wire:submit="saveProfileInfo" novalidate>
        <fieldset>
            <legend class="mt-3">Personal Info</legend>
            <div class="row">
                <div class="mb-3 col-md-5 @error('form.name')group-error @enderror">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" wire:model.lazy="form.name">
                    @error('form.name') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="mb-3 col-md-5 @error('form.email')group-error @enderror">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" wire:model.lazy="form.email">
                    @error('form.email') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="mb-3 col-md-2 @error('form.phone')group-error @enderror">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="tel" class="form-control" id="phone" name="phone" wire:model.lazy="form.phone">
                    @error('form.phone') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

            </div>
        </fieldset>

        <fieldset>
            <legend class="mt-3">Address</legend>
            <div class="row">
                <div class="mb-3 col-md-9 @error('form.address')group-error @enderror">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" id="address" name="address" wire:model.lazy="form.address">
                    @error('form.address') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="mb-3 col-md-3 @error('form.number')group-error @enderror">
                    <label for="number" class="form-label">Number</label>
                    <input type="text" class="form-control" id="number" name="number" wire:model.lazy="form.number">
                    @error('form.number') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="row">
                <div class="mb-3 col-md-10 @error('form.city')group-error @enderror">
                    <label for="city" class="form-label">City</label>
                    <input type="text" class="form-control" id="city" name="city" wire:model.lazy="form.city">
                    @error('form.city') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="mb-3 col-md-2 @error('form.state')group-error @enderror">
                    <label for="state" class="form-label">State</label>
                    <input type="text" class="form-control" id="state" name="state" wire:model.lazy="form.state">
                    @error('form.state') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
        </fieldset>
        <div class="d-flex justify-content-end border-top border-1">
            <button type="submit" class="btn btn-primary mt-3 px-4"><i class="bi bi-floppy2"></i> Save</button>
        </div>
    </form>
</div>
