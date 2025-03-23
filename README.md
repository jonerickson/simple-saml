# Standalone SAML SP

### Initiate SSO Login

```php
Auth::initialize()->login(
    shouldLogin: // true to force login, false to skip login if already authenticated
);
```

### Handle SAML Response (ACS)

```php
Auth::initialize(
    handleResponse: function (?string $nameId, ?array $attributes) {
        // Handle the SAMLResponse response
    }
)->processResponse();
```

### Handle SSO Logout (SLO)

```php
Auth::initialize()->logout(
    shouldLogout: // true to force logout, false to skip logout if not authenticated
);
```

### Exposing SP Metadata

```php
$metadata = Auth::initialize()->metadata();
```