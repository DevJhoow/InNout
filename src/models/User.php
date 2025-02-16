<?php

class User extends Model {

    // AQUI ATRIBUIMOS AS ESPECIFICAÇOES DOS ATRIBULTOS (tabela e colunas)
    protected static $tableName = 'users';
    protected static $columns = [
        'id',
        'name',
        'password',
        'start_date',
        'end_date',
        'is_admin',
    ];
}