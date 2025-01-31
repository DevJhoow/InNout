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
    function set($key, $value)
    {
        $this->values[$key] = $value;
    }

    // pegar o valor do objeto pela chave 
    function get($key) 
    {
       return $this->values[$key];
    }

    // carregar os valores do array $values 
    function loadFromArray($arr)
    {
        if($arr) { // si exitir valor, insira dentro do array
            foreach($arr as $key => $value) {
                $this->set($key, $value);
            }
        }
    }



}
