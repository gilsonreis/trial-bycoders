<?php

namespace App\Http\Actions\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class LoginAction extends Controller
{
    public function __invoke(Request $request): View
    {
        return view ('auth.login');
    }
}
