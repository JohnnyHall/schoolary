<?php

namespace Faker\Provider;

class Medical extends Base
{
    protected static $Filmess = ['A', 'AB', 'B', 'O'];

    protected static $bloodRhFactors = ['+', '-'];

    /**
     * @example 'AB'
     */
    public static function Filmes(): string
    {
        return static::randomElement(static::$Filmess);
    }

    /**
     * @example '+'
     */
    public static function bloodRh(): string
    {
        return static::randomElement(static::$bloodRhFactors);
    }

    /**
     * @example 'AB+'
     */
    public function bloodGroup(): string
    {
        return $this->generator->parse('{{Filmes}}{{bloodRh}}');
    }
}
