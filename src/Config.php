<?php

namespace Saml;

class Config
{
    public static function settings(): array
    {
        return [
            'enabled' => true,
            'strict' => false,
            'debug' => true,
            'sp' => [
                'entityId' => 'idctechops.com',
                'assertionConsumerService' => [
                    'url' => 'https://idctechops.test/acs.php',
                    'binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST',
                ],
                'singleLogoutService' => array (
                    'url' => 'https://idctechops.test/logout.php',
                    'binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Redirect',
                ),
                'NameIDFormat' => 'urn:oasis:names:tc:SAML:1.1:nameid-format:emailAddress'
            ],
            'idp' => [
                'entityId' => 'urn:idctechops.us.auth0.com`',
                'singleSignOnService' => [
                    'url' => 'https://idctechops.us.auth0.com/samlp/gMMoF7Repd1S60q5LUEz6e0olokWOlWE',
                    'binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST',
                ],
                'singleLogoutService' => [
                    'url' => 'https://idctechops.us.auth0.com/samlp/gMMoF7Repd1S60q5LUEz6e0olokWOlWE/logout',
                    'binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Redirect',
                ],
                'x509cert' => 'MIIDCTCCAfGgAwIBAgIJfm/8k5J1zzmBMA0GCSqGSIb3DQEBCwUAMCIxIDAeBgNVBAMTF2lkY3RlY2hvcHMudXMuYXV0aDAuY29tMB4XDTI1MDMyMzAyMTA0NVoXDTM4MTEzMDAyMTA0NVowIjEgMB4GA1UEAxMXaWRjdGVjaG9wcy51cy5hdXRoMC5jb20wggEiMA0GCSqGSIb3DQEBAQUAA4IBDwAwggEKAoIBAQChELbWTfEBFtCpAlq3BOmt1tURzWrtveaWxPPwVTXl8jEz9ip45qcDYgb56Ikgfz497gbhYIFL0cEDoJm2anEK4RqoPm/JS289l74R0xa79joJXu6EeroHAN4NSyVy7BIWK/2yLpFuXPbOFPeO5+yVgH+7CPI05hsl4WNuSohDvUwG/dNLkUIjGsR6vdVaURLvxC3dijAYWnEXMQzEgdXnBTwDPnb+pfcok6I6PJFQYmHE7ZRmg5hgOjPWj8PqWReHqo/BKyBA7JlIaAqMIfXBEiAtrYWchBQj/tRJ90D55ojp9ng5qweO7unHmfEnQ5O6bmBLUAEGXzImejfVuNq7AgMBAAGjQjBAMA8GA1UdEwEB/wQFMAMBAf8wHQYDVR0OBBYEFJqisKsXEQME02pnBeBqjX4Ma4cCMA4GA1UdDwEB/wQEAwIChDANBgkqhkiG9w0BAQsFAAOCAQEAhxIOBkw9VR0+7qzrnF5j2SjZV9BG62x8U/N8nwBOFLIt9mmbtZyrD0KLtD+iyubq0Gv4y2415HQN52O7YR7hBk1hiKvEfhAb+n6fRG4egynpcnS52k3lamwaMqEGUoUDGj+/mvcEoi+rssR4W5ypzFuX9o2gr+P9H6b9oueKGJDMUB5HvmoLM80Ri8Pg5eRz0XYPyeP5JJm1ThBYAOnDRE4pjC0TcTohW298rb+5mi+iawhB54EI6jH5BZb4iykjKFaNGyboCQZ1vzslksWycCHgQ0ut/7ItYka+GmPP3YXhvUJNoyZxnSBME8rUvjunlHYi4T3UoPExGorNocMqdg==',
                'certFingerprint' => 'E2:36:FB:57:CE:72:BC:11:51:4F:5C:07:61:F4:23:E6:8B:82:CD:B5',
                'certFingerprintAlgorithm' => 'sha1'
            ]
        ];
    }
}