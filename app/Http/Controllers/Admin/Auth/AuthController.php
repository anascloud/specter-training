<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminLoginRequest;
use App\Repositories\Admin\Auth\AdminAuthRepositoryInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function __construct(
        private readonly AdminAuthRepositoryInterface $authRepository
    ) {}

    public function redirectToSignin(): RedirectResponse
    {
        return redirect()->route('admin.signin');
    }

    public function show(): View|RedirectResponse
    {
        if (auth()->check()) {
            return redirect()->route('admin.dashboard');
        }

        return view('backend.pages.auth.signin', [
            'title' => 'Sign In',
        ]);
    }

    public function authenticate(AdminLoginRequest $request): RedirectResponse
    {
        if (auth()->check()) {
            return redirect()->route('admin.dashboard');
        }

        $remember = $request->boolean('remember');

        if ($this->authRepository->attempt($request->validated(), $remember)) {
            $request->session()->regenerate();

            return redirect()->intended(route('admin.dashboard'));
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request): RedirectResponse
    {
        $this->authRepository->logout($request);

        return redirect()->route('admin.signin');
    }
}
