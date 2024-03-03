<div>
    <h3>Change Password</h3>
    <hr>
    <form wire:submit="saveChangePassword" novalidate>
        <div class="row">
            <div class="mb-3 col-md-6 @error('form.password')group-error @enderror">
                <label for="password" class="form-label">New Password</label>
                <input type="password" class="form-control" id="password" name="password" wire:model.lazy="form.password">
                @error('form.password') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="mb-3 col-md-6 @error('form.confirmPassword')group-error @enderror">
                <label for="confirmPassword" class="form-label">Confirme new password</label>
                <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" wire:model.lazy="form.confirmPassword">
                @error('form.confirmPassword') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="d-flex justify-content-end border-top border-1">
            <button type="submit" class="btn btn-primary mt-3 px-4"><i class="bi bi-floppy2"></i> Save</button>
        </div>
    </form>
</div>
