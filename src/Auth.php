<?php

namespace Saml;

use Closure;
use OneLogin\Saml2\Auth as BaseAuth;
use OneLogin\Saml2\Error;
use OneLogin\Saml2\ValidationError;

class Auth
{
    protected ?Closure $handleResponse = null;

    protected ?Closure $handleLogout = null;

    public static function initialize(?Closure $handleResponse = null, ?Closure $handleLogout = null): Auth
    {
        $auth = new self;

        $auth->handleResponse = $handleResponse;
        $auth->handleLogout = $handleLogout;

        return $auth;
    }

    public static function password(int $length = 8): string
    {
        $bytes = random_bytes($length);
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_+-=';

        $password = '';
        for ($i = 0; $i < $length; $i++) {
            $password .= $chars[ord($bytes[$i]) % strlen($chars)];
        }

        return $password;
    }

    /**
     * @throws Error
     */
    public function login(bool $shouldLogin = true): void
    {
        if (! $shouldLogin) {
            return;
        }

        $this->auth()->login();
    }

    /**
     * @throws Error
     */
    public function logout(bool $shouldLogout = true): void
    {
        if (! $shouldLogout) {
            return;
        }

        $auth = $this->auth();

        $nameId = $auth->getNameId();
        $attributes = $auth->getAttributes();

        $auth->logout();

        if ($this->handleLogout) {
            ($this->handleLogout)($nameId, $attributes);
        }
    }

    public function metadata(): string
    {
        return $this->auth()->getSettings()->getSPMetadata();
    }

    /**
     * @throws ValidationError
     * @throws Error
     */
    public function processResponse(): void
    {
        $auth = $this->auth();
        $auth->processResponse();

        $nameId = $auth->getNameId();
        $attributes = $auth->getAttributes();

        if (! $auth->isAuthenticated()) {
            return;
        }

        if ($this->handleResponse) {
            ($this->handleResponse)($nameId, $attributes);
        }
    }

    /**
     * @throws Error
     */
    private function auth(): BaseAuth
    {
        return new BaseAuth(Config::settings());
    }
}