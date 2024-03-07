<?php

namespace App\UseCases\Auth;

use Illuminate\Support\Facades\Auth;

class LoginUseCase
{
    public function handle(array $credencials): bool
    {
        return Auth::attempt($credencials);
    }
}
