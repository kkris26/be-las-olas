<?php

namespace App\Filament\Pages\Auth;

use Filament\Facades\Filament;
use Filament\Forms\Components\Component;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Http\Responses\Auth\Contracts\LoginResponse;
use Filament\Models\Contracts\FilamentUser;
use Filament\Notifications\Notification;
use Filament\Pages\Auth\Login as BaseLogin;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;

class Login extends BaseLogin
{
    /**
     * Maximum login attempts before lockout.
     */
    private const MAX_ATTEMPTS = 3;

    /**
     * Lockout duration in seconds (10 minutes).
     */
    private const LOCKOUT_SECONDS = 600;

    public function getHeading(): string|\Illuminate\Contracts\Support\Htmlable
    {
        return 'PT. LAS OLAS INDONESIA';
    }

    public function mount(): void
    {
        if (Filament::auth()->check()) {
            redirect()->intended(Filament::getUrl());
        }

        $this->form->fill();
    }

    public function authenticate(): ?LoginResponse
    {
        $data = $this->form->getState();
        $username = $data['username'] ?? '';

        // ── Rate Limit Keys ─────────────────────────────────────────
        // Key 1: per username + IP (protects specific account)
        $userKey = 'login:' . mb_strtolower($username) . '|' . request()->ip();
        // Key 2: per IP only (blocks brute-force across different usernames)
        $ipKey = 'login-ip:' . request()->ip();

        // ── Check if currently locked out ──────────────────────────
        $lockedByUser = RateLimiter::tooManyAttempts($userKey, self::MAX_ATTEMPTS);
        $lockedByIp   = RateLimiter::tooManyAttempts($ipKey, self::MAX_ATTEMPTS);

        if ($lockedByUser || $lockedByIp) {
            $seconds = max(
                $lockedByUser ? RateLimiter::availableIn($userKey) : 0,
                $lockedByIp   ? RateLimiter::availableIn($ipKey)   : 0,
            );
            $minutes = ceil($seconds / 60);

            Notification::make()
                ->danger()
                ->title('Account temporarily locked')
                ->body("Too many failed login attempts. Please try again in {$minutes} minutes.")
                ->persistent()
                ->send();

            return null;
        }

        // ── Attempt authentication ─────────────────────────────────
        if (! Filament::auth()->attempt($this->getCredentialsFromFormData($data), $data['remember'] ?? false)) {
            // Record failed attempt on BOTH keys
            RateLimiter::hit($userKey, self::LOCKOUT_SECONDS);
            RateLimiter::hit($ipKey, self::LOCKOUT_SECONDS);

            $remainingUser = RateLimiter::remaining($userKey, self::MAX_ATTEMPTS);
            $remainingIp   = RateLimiter::remaining($ipKey, self::MAX_ATTEMPTS);
            $remaining     = min($remainingUser, $remainingIp);

            if ($remaining > 0) {
                Notification::make()
                    ->warning()
                    ->title('Login failed')
                    ->body("Remaining attempts: {$remaining} before account is locked for 10 minutes.")
                    ->send();
            }

            $this->throwFailureValidationException();
        }

        // ── Successful login ────────────────────────────────────────
        $user = Filament::auth()->user();

        if (
            ($user instanceof FilamentUser) &&
            (! $user->canAccessPanel(Filament::getCurrentPanel()))
        ) {
            Filament::auth()->logout();
            $this->throwFailureValidationException();
        }

        // Clear both rate limiters on successful login
        RateLimiter::clear($userKey);
        RateLimiter::clear($ipKey);

        session()->regenerate();

        return app(LoginResponse::class);
    }

    protected function getForms(): array
    {
        return [
            'form' => $this->form(
                $this->makeForm()
                    ->schema([
                        $this->getUsernameFormComponent(),
                        $this->getPasswordFormComponent(),
                        $this->getRememberFormComponent(),
                    ])
                    ->statePath('data'),
            ),
        ];
    }

    public function form(Form $form): Form
    {
        return $form;
    }

    protected function getUsernameFormComponent(): Component
    {
        return TextInput::make('username')
            ->label('Username')
            ->required()
            ->autocomplete()
            ->autofocus()
            ->extraInputAttributes(['tabindex' => 1]);
    }

    protected function getCredentialsFromFormData(array $data): array
    {
        return [
            'username' => $data['username'],
            'password' => $data['password'],
        ];
    }

    protected function throwFailureValidationException(): never
    {
        throw ValidationException::withMessages([
            'data.username' => __('filament-panels::pages/auth/login.messages.failed'),
        ]);
    }
}
