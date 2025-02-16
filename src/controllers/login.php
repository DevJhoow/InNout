<?php

loadModel('Login'); //trouxemos o a classe login para usarmos o metodo 

$exception = null ; 

if(count($_POST) > 0) {
    $login = new Login($_POST);
// dentro desse post vai estar os valores que o usuario inserir

    try {
        $user = $login->checkLogin(); // vai chegar o que o usuario inseriu, que estao armazenados no $_POST
        echo "Usuario $user->name logado ";
    } catch(AppException $e) { // erro
        $exception = $e;
    }
}

loadView('login', $_POST + ['exception' => $exception]);