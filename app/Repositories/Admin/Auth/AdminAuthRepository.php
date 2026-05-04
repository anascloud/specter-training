<?php

namespace App\Repositories\Admin\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthRepository implements AdminAuthRepositoryInterface
{
    public function attempt(array $credentials, bool $remember = false): bool
    {
        return Auth::attempt($credentials, $remember);
    }

    public function logout(Request $request): void
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
    }
}
