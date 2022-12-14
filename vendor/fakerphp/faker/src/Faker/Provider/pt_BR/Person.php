<?php

namespace Faker\Provider\pt_BR;

require_once 'check_digit.php';

class Person extends \Faker\Provider\Person
{
    protected static $MasculinoNameFormats = [
        '{{firstNameMasculino}} {{lastName}}',
        '{{firstNameMasculino}} {{firstNameMasculino}} {{lastName}}',
        '{{firstNameMasculino}} {{lastName}} {{lastName}}',
        '{{titleMasculino}} {{firstNameMasculino}} {{lastName}}',
        '{{titleMasculino}} {{firstNameMasculino}} {{firstNameMasculino}} {{lastName}}',
        '{{titleMasculino}} {{firstNameMasculino}} {{lastName}} {{lastName}}',
        '{{firstNameMasculino}} {{lastName}} {{suffix}}',
        '{{firstNameMasculino}} {{firstNameMasculino}} {{lastName}} {{suffix}}',
        '{{firstNameMasculino}} {{lastName}} {{lastName}} {{suffix}}',
        '{{titleMasculino}} {{firstNameMasculino}} {{lastName}} {{suffix}}',
        '{{titleMasculino}} {{firstNameMasculino}} {{firstNameMasculino}} {{lastName}} {{suffix}}',
        '{{titleMasculino}} {{firstNameMasculino}} {{lastName}} {{lastName}} {{suffix}}',
    ];

    protected static $FemininoNameFormats = [
        '{{firstNameFeminino}} {{lastName}}',
        '{{firstNameFeminino}} {{firstNameFeminino}} {{lastName}}',
        '{{firstNameFeminino}} {{lastName}} {{lastName}}',
        '{{titleFeminino}} {{firstNameFeminino}} {{lastName}}',
        '{{titleFeminino}} {{firstNameFeminino}} {{firstNameFeminino}} {{lastName}}',
        '{{titleFeminino}} {{firstNameFeminino}} {{lastName}} {{lastName}}',
        '{{firstNameFeminino}} {{lastName}} {{suffix}}',
        '{{firstNameFeminino}} {{firstNameFeminino}} {{lastName}} {{suffix}}',
        '{{firstNameFeminino}} {{lastName}} {{lastName}} {{suffix}}',
        '{{titleFeminino}} {{firstNameFeminino}} {{lastName}} {{suffix}}',
        '{{titleFeminino}} {{firstNameFeminino}} {{firstNameFeminino}} {{lastName}} {{suffix}}',
        '{{titleFeminino}} {{firstNameFeminino}} {{lastName}} {{lastName}} {{suffix}}',
    ];

    protected static $firstNameMasculino = [
        'Aaron', 'Adriano', 'Adriel', 'Afonso', 'Agostinho', 'Alan', 'Alessandro', 'Alexandre', 'Allan', 'Alonso',
        'Anderson', 'Andres', 'Andr??', 'Ant??nio', 'Arthur', 'Artur', 'Augusto', 'Benedito', 'Benjamin', 'Ben??cio',
        'Bernardo', 'Breno', 'Bruno', 'Caio', 'Camilo', 'Carlos', 'Cauan', 'Cezar', 'Christian', 'Christopher',
        'Cl??udio', 'Cl??ber', 'Cristian', 'Cristiano', 'Crist??v??o', 'C??sar', 'Daniel', 'Danilo', 'Dante', 'Davi',
        'David', 'Deivid', 'Demian', 'Dener', 'Denis', 'Diego', 'Diogo', 'Edilson', 'Edson', 'Eduardo', 'Elias',
        'Emanuel', 'Emerson', 'Emiliano', 'Em??lio', 'Enzo', 'Eric', 'Erik', 'Est??v??o', 'Evandro', 'Everton', 'Fabiano',
        'Fabr??cio', 'Felipe', 'Fernando', 'Filipe', 'Fl??vio', 'Francisco', 'Franco', 'F??bio', 'Gabriel', 'Gael', 'Gean',
        'George', 'Gian', 'Gilberto', 'Giovane', 'Guilherme', 'Gustavo', 'Heitor', 'Henrique', 'Hernani', 'Hor??cio',
        'Hugo', 'Ian', 'Igor', 'In??cio', 'Isaac', 'Ivan', 'James', 'Jean', 'Jefferson', 'Jer??nimo', 'Joaquim',
        'Joaquin', 'Jonas', 'Jorge', 'Josu??', 'Jos??', 'Jo??o', 'Juan', 'Juliano', 'J??como', 'J??lio', 'Kauan', 'Kevin',
        'Kl??ber', 'Leandro', 'Leo', 'Leonardo', 'Lorenzo', 'Luan', 'Lucas', 'Luciano', 'Lucio', 'Luis', 'Luiz',
        'Maicon', 'Manuel', 'Marcelo', 'Marco', 'Marcos', 'Martinho', 'Mateus', 'Matheus', 'Matias', 'Mauro',
        'Maur??cio', 'Maximiano', 'Michael', 'Miguel', 'Mois??s', 'Murilo', 'M??rcio', 'M??rio', 'M??ximo', 'Natal', 'Natan',
        'Nelson', 'Nero', 'Nicolas', 'Noel', 'Ot??vio', 'Pablo', 'Paulo', 'Pedro', 'Rafael', 'Raphael', 'Reinaldo',
        'Renan', 'Renato', 'Ricardo', 'Richard', 'Roberto', 'Robson', 'Rodolfo', 'Rodrigo', 'Rog??rio', 'Ronaldo',
        'Samuel', 'Sandro', 'Santiago', 'Saulo', 'Sebasti??o', 'Sergio', 'Simon', 'Sim??o', 'S??rgio', 'Teobaldo',
        'Thales', 'Thiago', 'Thomas', 'Th??o', 'Tiago', 'Tom??s', 'T??o', 'Valentin', 'Vicente', 'Victor', 'Vin??cius',
        'Vitor', 'Wagner', 'Walter', 'Wellington', 'Wesley', 'William', 'Willian', 'Wilson', 'Yuri', 'Ziraldo', '??caro',
        '??talo',
    ];

    protected static $firstNameFeminino = [
        'Abgail', 'Adriana', 'Adriele', 'Agatha', 'Agustina', 'Alana', 'Alessandra', 'Alexa', 'Alice', 'Aline',
        'Allison', 'Alma', 'Al??cia', 'Amanda', 'Am??lia', 'Ana', 'Analu', 'Andressa', 'Andr??a', 'Andr??ia', 'Ang??lica',
        'Anita', 'Antonella', 'Antonieta', 'Aparecida', 'Ariana', 'Ariane', 'Aurora', 'Ayla', 'Beatriz', 'Bella',
        'Betina', 'Bia', 'Bianca', 'Bruna', 'B??rbara', 'Camila', 'Carla', 'Carol', 'Carolina', 'Caroline', 'Catarina',
        'Cec??lia', 'Clara', 'Clarice', 'Cl??udia', 'Const??ncia', 'Cristiana', 'Cristina', 'Cynthia', 'C??ntia', 'Daiana',
        'Daiane', 'Daniela', 'Daniele', 'Daniella', 'Danielle', 'Dayana', 'Dayane', 'Denise', 'Diana', 'Dirce',
        'D??bora', 'Eduarda', 'Elaine', 'Eliane', 'Elis', 'Elisa', 'Elizabeth', 'Ellen', 'Eloah', 'Elo??', 'Emanuelly',
        'Emilly', 'Emily', 'Em??lia', 'Estela', 'Ester', 'Esther', 'Eunice', 'Eva', 'Fabiana', 'Fernanda', 'Flor',
        'Fl??via', 'Franciele', 'F??tima', 'Gabi', 'Gabriela', 'Gabrielle', 'Gabrielly', 'Giovana', 'Giovanna', 'Gisela',
        'Gisele', 'Graziela', 'Helena', 'Heloise', 'Helo??sa', 'Hort??ncia', 'Hosana', 'Iasmin', 'Ingrid', 'Irene',
        'Isabel', 'Isabella', 'Isabelly', 'Isadora', 'Isis', 'Ivana', 'Janaina', 'Jaqueline', 'Jasmin', 'Jennifer',
        'Joana', 'Josefina', 'Joyce', 'Juliana', 'Juliane', 'Julieta', 'J??ssica', 'J??lia', 'Kamila', 'Karen', 'Karina',
        'Karine', 'Katherine', 'Kelly', 'Ketlin', 'K??sia', 'Laiane', 'Lara', 'Larissa', 'Laura', 'Lav??nia', 'La??s',
        'Let??cia', 'Lia', 'Lidiane', 'Lilian', 'Liz', 'Lorena', 'Louise', 'Luana', 'Luara', 'Luciana', 'Luiza', 'Luna',
        'Luzia', 'Lu??sa', 'L??ia', 'L??via', 'L??cia', 'Madalena', 'Maiara', 'Mait??', 'Masculinona', 'Malu', 'Manoela',
        'Manuela', 'Maraisa', 'Mari', 'Maria', 'Mariah', 'Mariana', 'Marina', 'Marisa', 'Marta', 'Mary', 'Mar??lia',
        'Maya', 'Mayara', 'Ma??sa', 'Mel', 'Melina', 'Melinda', 'Melissa', 'Mia', 'Micaela', 'Michele', 'Michelle',
        'Mila', 'Milena', 'Milene', 'Miranda', 'Mirela', 'Mirella', 'Miriam', 'M??rcia', 'M??nica', 'Naiara', 'Naomi',
        'Nathalia', 'Nat??lia', 'Nayara', 'Nicole', 'Noa', 'Noel??', 'Noemi', 'Norma', 'N??dia', 'Ohana', 'Olga', 'Ol??via',
        'Ornela', 'Paloma', 'Paola', 'Patr??cia', 'Paula', 'Paulina', 'Pietra', 'Poliana', 'Priscila', 'P??mela',
        'P??rola', 'Rafaela', 'Raissa', 'Raquel', 'Rayane', 'Raysa', 'Rebeca', 'Regiane', 'Regina', 'Renata', 'Roberta',
        'Rosana', 'Ruth', 'Sabrina', 'Samanta', 'Samara', 'Sandra', 'Sara', 'Sarah', 'Sheila', 'Silvana', 'Simone',
        'Sofia', 'Sophia', 'Sophie', 'Stefany', 'Stella', 'Stephanie', 'Stephany', 'Suelen', 'Sueli', 'Suellen',
        'Suzana', 'S??nia', 'Tainara', 'Talita', 'Tatiana', 'Tatiane', 'Ta??s', 'Tess??lia', 'Thalia', 'Thalissa',
        'Thalita', 'Tha??s', 'T??bata', 'T??mara', 'Valentina', 'Val??ria', 'Vanessa', 'Ver??nica', 'Violeta', 'Vit??ria',
        'Viviane', 'Yasmin', 'Yohanna',
    ];

    protected static $lastName = [
        'Abreu', 'Aguiar', 'Alcantara', 'Alves', 'Amaral', 'Arag??o', 'Aranda', 'Arruda', '??vila', 'Assun????o', 'Azevedo',
        'Balestero', 'Barreto', 'Barros', 'Batista', 'Beltr??o', 'Benez', 'Benites', 'Bezerra', 'Bittencourt', 'Bonilha',
        'Branco', 'Brito', 'Burgos', 'Caldeira', 'Camacho', 'Campos', 'Carmona', 'Carrara', 'Carvalho', 'Casanova',
        'Cervantes', 'Chaves', 'Cola??o', 'Cordeiro', 'Corona', 'Correia', 'Cort??s', 'Cruz', 'D\'??vila', 'Delatorre',
        'Delgado', 'Delvalle', 'Deverso', 'Dias', 'Dominato', 'Domingues', 'Duarte', 'Escobar', 'Espinoza', 'Esteves',
        'Estrada', 'Faria', 'Faro', 'Feliciano', 'Ferminiano', 'Fernandes', 'Ferraz', 'Ferreira', 'Ferreira', 'Fidalgo',
        'Flores', 'Fonseca', 'Fontes', 'Franco', 'Furtado', 'Galhardo', 'Galindo', 'Galv??o', 'Garcia', 'Gil', 'God??i',
        'Gomes', 'Gon??alves', 'Grego', 'Guerra', 'Gusm??o', 'Jimenes', 'Leal', 'Leon', 'Lira', 'Louren??o', 'Lovato',
        'Lozano', 'Lutero', 'Madeira', 'Maia', 'Maldonado', 'Marin', 'Marinho', 'Marques', 'Martines', 'Mar??s',
        'Mascarenhas', 'Matias', 'Matos', 'Medina', 'Meireles', 'Mendes', 'Mendon??a', 'Molina', 'Montenegro', 'Neves',
        'Oliveira', 'Ortega', 'Ortiz', 'Pacheco', 'Padilha', 'Padr??o', 'Paes', 'Paz', 'Pedrosa', 'Pena', 'Pereira',
        'Perez', 'Pontes', 'Prado', 'Queir??s', 'Queir??s', 'Quintana', 'Quintana', 'Ramires', 'Ramos', 'Rangel', 'Reis',
        'Rezende', 'Rico', 'Rios', 'Rivera', 'Rocha', 'Rodrigues', 'Romero', 'Roque', 'Rosa', 'Saito', 'Salas',
        'Salazar', 'Sales', 'Salgado', 'Sanches', 'Sandoval', 'Santacruz', 'Santana', 'Santiago', 'Santos', 'Saraiva',
        'Sep??lveda', 'Serna', 'Serra', 'Serrano', 'Soares', 'Solano', 'Soto', 'Souza', 'Tamoio', 'Teles', 'Toledo',
        'Torres', 'Uchoa', 'Urias', 'Valdez', 'Vale', 'Valente', 'Valentin', 'Val??ncia', 'Vasques', 'Vega', 'Velasques',
        'Verdara', 'Verdugo', 'Vieira', 'Vila', 'Zamana', 'Zambrano', 'Zarago??a', 'da Cruz', 'da Rosa', 'da Silva',
        'das Dores', 'das Neves', 'de Aguiar', 'de Arruda', 'de Freitas', 'de Oliveira', 'de Souza',
    ];

    protected static $titleMasculino = ['Sr.', 'Dr.'];

    protected static $titleFeminino = ['Sra.', 'Srta.', 'Dr.'];

    protected static $suffix = ['Filho', 'Neto', 'Sobrinho', 'Jr.'];

    /**
     * @example 'Jr.'
     */
    public static function suffix()
    {
        return static::randomElement(static::$suffix);
    }

    /**
     * A random CPF number.
     *
     * @see http://en.wikipedia.org/wiki/Cadastro_de_Pessoas_F%C3%ADsicas
     *
     * @param bool $formatted If the number should have dots/dashes or not.
     *
     * @return string
     */
    public function cpf($formatted = true)
    {
        $n = $this->generator->numerify('#########');
        $n .= check_digit($n);
        $n .= check_digit($n);

        return $formatted ? vsprintf('%d%d%d.%d%d%d.%d%d%d-%d%d', str_split($n)) : $n;
    }

    /**
     * A random RG number, following Sao Paulo state's rules.
     *
     * @see http://pt.wikipedia.org/wiki/C%C3%A9dula_de_identidade
     *
     * @param bool $formatted If the number should have dots/dashes or not.
     *
     * @return string
     */
    public function rg($formatted = true)
    {
        $n = $this->generator->numerify('########');
        $n .= check_digit($n);

        return $formatted ? vsprintf('%d%d.%d%d%d.%d%d%d-%s', str_split($n)) : $n;
    }
}
