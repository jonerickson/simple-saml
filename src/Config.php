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
                'entityId' => 'yourwebsite.com',
                'assertionConsumerService' => [
                    'url' => 'https://yourwebsite.com/acs.php',
                    'binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST',
                ],
                'singleLogoutService' => array (
                    'url' => 'https://yourwebsite.com/logout.php',
                    'binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Redirect',
                ),
                'NameIDFormat' => 'urn:oasis:names:tc:SAML:1.1:nameid-format:emailAddress'
            ],
            'idp' => [
                'entityId' => 'urn:idctechops.us.auth0.com`',
                'singleSignOnService' => [
                    'url' => '',
                    'binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST',
                ],
                'singleLogoutService' => [
                    'url' => '',
                    'binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Redirect',
                ],
                'x509cert' => '',
                'certFingerprint' => '',
                'certFingerprintAlgorithm' => 'sha1'
            ]
        ];
    }
}