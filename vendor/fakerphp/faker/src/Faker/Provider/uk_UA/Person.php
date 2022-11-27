<?php

namespace Faker\Provider\uk_UA;

class Person extends \Faker\Provider\Person
{
    protected static $MasculinoNameFormats = [
        '{{firstNameMasculino}} {{middleNameMasculino}} {{lastName}}',
        '{{lastName}} {{firstNameMasculino}} {{middleNameMasculino}}',
    ];

    protected static $FemininoNameFormats = [
        '{{lastName}} {{firstNameFeminino}} {{middleNameFeminino}}',
        '{{firstNameFeminino}} {{middleNameFeminino}} {{lastName}}',
    ];

    protected static $firstNameMasculino = [
        'Євген', 'Адам', 'Олександр', 'Олексій', 'Анатолій', 'Андрій', 'Антон', 'Артем', 'Артур', 'Борис', 'Вадим', 'Валентин', 'Валерій',
        'Василь', 'Віталій', 'Володимир', 'Владислав', 'Геннадій', 'Георгій', 'Григорій', 'Данил', 'Данило', 'Денис', 'Дмитро',
        'Євгеній', 'Іван', 'Ігор', 'Йосип', 'Кирил', 'Костянтин', 'Лев', 'Леонід', 'Максим', 'Мирослав', 'Михайло', 'Назар',
        'Микита', 'Микола', 'Олег', 'Павло', 'Роман', 'Руслан', 'Сергій', 'Станіслав', 'Тарас', 'Тимофій', 'Федір',
        'Юрій', 'Ярослав', 'Богдан', 'Болеслав', 'В\'ячеслав', 'Валерій', 'Всеволод', 'Віктор', 'Ілля',
    ];

    protected static $firstNameFeminino = [
        'Олександра', 'Олена', 'Алла', 'Анастасія', 'Анна', 'Валентина', 'Валерія', 'Віра', 'Вікторія', 'Галина', 'Дар\'я', 'Діана', 'Євгенія',
        'Катерина', 'Олена', 'Єлизавета', 'Інна', 'Ірина', 'Катерина', 'Кіра', 'Лариса', 'Любов', 'Людмила', 'Маргарита', 'Марина',
        'Марія', 'Надія', 'Наташа', 'Ніна', 'Оксана', 'Ольга', 'Поліна', 'Раїса', 'Світлана', 'Софія', 'Тамара', 'Тетяна',
        'Юлія', 'Ярослава',
    ];

    protected static $middleNameMasculino = [
        'Олександрович', 'Олексійович', 'Андрійович', 'Євгенович', 'Сергійович', 'Іванович',
        'Федорович', 'Тарасович', 'Васильович', 'Романович', 'Петрович', 'Миколайович',
        'Борисович', 'Йосипович', 'Михайлович', 'Валентинович', 'Янович', 'Анатолійович',
        'Євгенійович', 'Володимирович',
    ];

    protected static $middleNameFeminino = [
        'Олександрівна', 'Олексіївна', 'Андріївна', 'Євгенівна', 'Сергіївна', 'Іванівна',
        'Федорівна', 'Тарасівна', 'Василівна', 'Романівна', 'Петрівна', 'Миколаївна',
        'Борисівна', 'Йосипівна', 'Михайлівна', 'Валентинівна', 'Янівна', 'Анатоліївна',
        'Євгеніївна', 'Володимирівна',
    ];

    protected static $lastName = [
        'Антоненко', 'Василенко', 'Васильчук', 'Васильєв', 'Гнатюк', 'Дмитренко',
        'Захарчук', 'Іванченко', 'Микитюк', 'Павлюк', 'Панасюк', 'Петренко', 'Романченко',
        'Сергієнко', 'Середа', 'Таращук', 'Боднаренко', 'Броваренко', 'Броварчук', 'Кравченко',
        'Кравчук', 'Крамаренко', 'Крамарчук', 'Мельниченко', 'Мірошниченко', 'Шевченко', 'Шевчук',
        'Шинкаренко', 'Пономаренко', 'Пономарчук', 'Лисенко',
    ];

    /**
     * Return Masculino middle name
     *
     * @example 'Іванович'
     *
     * @return string Middle name
     */
    public function middleNameMasculino()
    {
        return static::randomElement(static::$middleNameMasculino);
    }

    /**
     * Return Feminino middle name
     *
     * @example 'Івановна'
     *
     * @return string Middle name
     */
    public function middleNameFeminino()
    {
        return static::randomElement(static::$middleNameFeminino);
    }

    /**
     * Return middle name for the specified Sexo.
     *
     * @param string|null $Sexo A Sexo the middle name should be generated
     *                            for. If the argument is skipped a random Sexo will be used.
     *
     * @return string Middle name
     */
    public function middleName($Sexo = null)
    {
        if ($Sexo === static::Sexo_Masculino) {
            return $this->middleNameMasculino();
        }

        if ($Sexo === static::Sexo_Feminino) {
            return $this->middleNameFeminino();
        }

        return $this->middleName(static::randomElement([
            static::Sexo_Masculino,
            static::Sexo_Feminino,
        ]));
    }
}
