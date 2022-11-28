<?php

namespace Faker\Provider;

class Person extends Base
{
    public const Sexo_Masculino = 'Masculino';
    public const Sexo_Feminino = 'Feminino';

    protected static $titleFormat = [
        '{{titleMasculino}}',
        '{{titleFeminino}}',
    ];

    protected static $firstNameFormat = [
        '{{firstNameMasculino}}',
        '{{firstNameFeminino}}',
    ];

    protected static $MasculinoNameFormats = [
        '{{firstNameMasculino}} {{lastName}}',
    ];

    protected static $FemininoNameFormats = [
        '{{firstNameFeminino}} {{lastName}}',
    ];

    protected static $firstNameMasculino = [
        'John',
    ];

    protected static $firstNameFeminino = [
        'Jane',
    ];

    protected static $lastName = ['Doe'];

    protected static $titleMasculino = ['Mr.', 'Dr.', 'Prof.'];

    protected static $titleFeminino = ['Mrs.', 'Ms.', 'Miss', 'Dr.', 'Prof.'];

    /**
     * @param string|null $Sexo 'Masculino', 'Feminino' or null for any
     *
     * @return string
     *
     * @example 'John Doe'
     */
    public function name($Sexo = null)
    {
        if ($Sexo === static::Sexo_Masculino) {
            $format = static::randomElement(static::$MasculinoNameFormats);
        } elseif ($Sexo === static::Sexo_Feminino) {
            $format = static::randomElement(static::$FemininoNameFormats);
        } else {
            $format = static::randomElement(array_merge(static::$MasculinoNameFormats, static::$FemininoNameFormats));
        }

        return $this->generator->parse($format);
    }

    /**
     * @param string|null $Sexo 'Masculino', 'Feminino' or null for any
     *
     * @return string
     *
     * @example 'John'
     */
    public function firstName($Sexo = null)
    {
        if ($Sexo === static::Sexo_Masculino) {
            return static::firstNameMasculino();
        }

        if ($Sexo === static::Sexo_Feminino) {
            return static::firstNameFeminino();
        }

        return $this->generator->parse(static::randomElement(static::$firstNameFormat));
    }

    /**
     * @return string
     */
    public static function firstNameMasculino()
    {
        return static::randomElement(static::$firstNameMasculino);
    }

    /**
     * @return string
     */
    public static function firstNameFeminino()
    {
        return static::randomElement(static::$firstNameFeminino);
    }

    /**
     * @example 'Doe'
     *
     * @return string
     */
    public function lastName()
    {
        return static::randomElement(static::$lastName);
    }

    /**
     * @example 'Mrs.'
     *
     * @param string|null $Sexo 'Masculino', 'Feminino' or null for any
     *
     * @return string
     */
    public function title($Sexo = null)
    {
        if ($Sexo === static::Sexo_Masculino) {
            return static::titleMasculino();
        }

        if ($Sexo === static::Sexo_Feminino) {
            return static::titleFeminino();
        }

        return $this->generator->parse(static::randomElement(static::$titleFormat));
    }

    /**
     * @example 'Mr.'
     *
     * @return string
     */
    public static function titleMasculino()
    {
        return static::randomElement(static::$titleMasculino);
    }

    /**
     * @example 'Mrs.'
     *
     * @return string
     */
    public static function titleFeminino()
    {
        return static::randomElement(static::$titleFeminino);
    }
}
