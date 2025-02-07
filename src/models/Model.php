<?php

class Model {

    // INSERIMOS OS ATRIBULTOS 
    protected static $tableName = '';
    protected static $columns = '';

    // array para inserirmo os objetos 
    protected $values = [];

    function __construct($arr)
    {
        $this->loadFromArray($arr);
    }

    // inserir chave e valor dentro doa arrau $values 
    function __set($key, $value)
    {
        $this->values[$key] = $value;
    }

    // pegar o valor do objeto pela chave 
    function __get($key) 
    {
       return $this->values[$key];
    }

    // carregar os valores do array $values 
    function loadFromArray($arr)
    {
        if($arr) { // si exitir valor, insira dentro do array
            foreach($arr as $key => $value) {
                $this->$key = $value;
            }
        }
    }

    // retotnar usuarios da classe User , inserilos dentro de um array 
    public static function get($filters = [], $columns)
    {
        $objects = [];
        $result = static::getSResultSetFromSelect($filters, $columns);

        if($result) {
            $class = get_called_class();
            while($row = $result->fetch_assoc()) {
                array_push($objects, new $class($row));
            }
        }
        return $objects;
    }

    //COMANDO SELECT 
    public static function getSResultSetFromSelect($filters = [], $columns = '*')
    {
        $sql = " SELECT $columns FROM "
            . static::$tableName 
            . static::getFilters($filters);
        $result = Database::getResultFromQuery($sql);

        if($result->num_rows === 0 ) {
            return null;
        }else {
            return $result;
        }
    }

    // formata o filtro 
    private static function getFilters($filters)
    {
        $sql = '';
        if(count($filters) > 0) {
            $sql .= " WHERE 1 = 1 ";
            foreach($filters as $column => $value) {
                $sql .= " AND $column = " . static::getFormatedValue($value);
            }
        }
        return $sql ; 
    }

    //formatar valor da coluna , somente string 
    private static function getFormatedValue($value)
    {
        if(is_null($value)) {
            return "null";
        } elseif(gettype($value) === 'string') {
            return " '$value' ";
        } else {
            return $value;
        }
    }

}
