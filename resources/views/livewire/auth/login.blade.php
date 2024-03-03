<form wire:submit="login" class="form-login">
    <img class="img-fluid" src="{{ \Illuminate\Support\Facades\Vite::asset('resources/images/logo-sales-board.png') }}" alt="">
    <hr>
    <h5 class="text-center">Enter your email and password to access the dashboard.</h5>
    @error('auth_failed')
    <div class="alert alert-danger text-center mt-2">{{ $message }}</div>
    @enderror
    <div class="form-group">
        <label for="email"><strong>E-mail</strong></label>
        <input type="text" name="email" id="email" class="form-control form-control-lg" wire:model.lazy="form.email">
        @error('form.email') <span class="error">{{ $message }}</span> @enderror
    </div>
    <div class="form-group mt-3">
        <label for="password"><strong>Password</strong></label>
        <input type="text" name="password" id="password" class="form-control form-control-lg" wire:model.lazy="form.password">
        @error('form.password') <span class="error">{{ $message }}</span> @enderror
    </div>
    <hr>
    <button class="btn btn-primary btn-lg w-100" type="submit">Sign in</button>
</form>
