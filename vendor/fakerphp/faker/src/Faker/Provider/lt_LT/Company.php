<?php

namespace Faker\Provider\lt_LT;

class Company extends \Faker\Provider\Company
{
    protected static $formats = [
        '{{companySuffix}} {{lastNameMasculino}}',
        '{{companySuffix}} {{lastNameMasculino}} ir {{lastNameMasculino}}',
        '{{companySuffix}} "{{lastNameMasculino}} ir {{lastNameMasculino}}"',
        '{{companySuffix}} "{{lastNameMasculino}}"',
    ];

    protected static $companySuffix = ['UAB', 'AB', 'IĮ', 'MB', 'VŠĮ'];
}
