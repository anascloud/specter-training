<?php

namespace App\Repositories\Admin\Auth;

use Illuminate\Http\Request;

interface AdminAuthRepositoryInterface
{
    public function attempt(array $credentials, bool $remember = false): bool;

    public function logout(Request $request): void;
}
