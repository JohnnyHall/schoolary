<?php

namespace Faker\Provider\lt_LT;

class Internet extends \Faker\Provider\Internet
{
    protected static $userNameFormats = [
        '{{lastNameMasculino}}.{{firstNameMasculino}}',
        '{{lastNameFeminino}}.{{firstNameFeminino}}',
        '{{firstNameMasculino}}##',
        '{{firstNameFeminino}}##',
        '?{{lastNameFeminino}}',
        '?{{lastNameMasculino}}',
    ];

    protected static $freeEmailDomain = ['gmail.com', 'yahoo.com', 'hotmail.com'];
    protected static $tld = ['com', 'com', 'net', 'org', 'lt', 'lt', 'lt', 'lt', 'lt'];
}
