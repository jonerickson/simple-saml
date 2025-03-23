# Standalone SAML SP

### Initiate SSO Login

Redirect the user to the IdP's single sign-on URL.

```php
Auth::initialize()->login(
    shouldLogin: // true to force login, false to skip login if already authenticated
);
```

### Handle SAML Response (ACS)

Process the SAML response after the user is redirected back from the IdP after a login request.

```php
Auth::initialize(
    handleResponse: function (?string $nameId, ?array $attributes) {
        // Handle the SAMLResponse response
    }
)->processResponse();
```

### Initiate SSO Logout (SLO)

Redirect the user to the IdP's single logout URL.

```php
Auth::initialize()->logout(
    email: // The email of the user to logout
    shouldLogout: // true to force logout, false to skip logout if not authenticated
);
```

### Handle SAML Logout Response (SLO)

Respond to a logout request from the IdP.

```php
Auth::initialize(
    handleLogout: function () {
        // Log the user out locally
    }
)->processSlo();
```

### Exposing SP Metadata

```php
$metadata = Auth::initialize()->metadata();
```

### Generating X509 Key Pair

```bash
openssl req -x509 -sha256 -nodes -days 3065 -newkey rsa:2048 -keyout private.key -out public.crt
```