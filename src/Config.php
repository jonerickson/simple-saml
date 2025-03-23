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
                'x509cert' => '',
                'certFingerprint' => '',
                'certFingerprintAlgorithm' => 'sha1'
            ]
        ];
    }
}