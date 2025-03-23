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
    public function logout(string $email, bool $shouldLogout = true): void
    {
        if (! $shouldLogout) {
            return;
        }

        $auth = $this->auth();
        $nameId = $auth->getNameId();
        $attributes = $auth->getAttributes();

        $auth->logout(
            nameId: $email,
            nameIdFormat: $auth->getSettings()->getSPData()['NameIDFormat'],
        );

        if ($this->handleLogout) {
            ($this->handleLogout)($nameId, $attributes);
        }
    }

    /**
     * @throws Error
     */
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
    public function processSlo(): void
    {
        $this->auth()->processSLO();

        if ($this->handleLogout) {
            ($this->handleLogout)();
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