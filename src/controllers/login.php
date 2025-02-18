<?php

loadModel('Login'); //trouxemos o a classe login para usarmos o metodo 
session_start();
$exception = null ; 

if(count($_POST) > 0) {
    $login = new Login($_POST);
// dentro desse post vai estar os valores que o usuario inserir

    try {
        $user = $login->checkLogin(); // vai chegar o que o usuario inseriu, que estao armazenados no $_POST
        $_SESSION['user'] = $user;
        header("Location: day_records.php");
    } catch(AppException $e) { // erro
        $exception = $e;
    }
}

//depois de fazer toda a logica renderixe o login da pasta views 
loadView('login', $_POST + ['exception' => $exception]);