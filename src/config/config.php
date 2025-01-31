<?php

// definir o sistema com o horario padrao de Brasilia 
date_default_timezone_set('America/Sao_Paulo');
//Define a localidade para exibição de datas e textos no formato brasileiro
setlocale(LC_TIME, 'pt-br', 'pt_BR.utf-8', 'portuguese');

//PASTAS
define('MODEL_PATH', realpath(dirname(__FILE__). '/../models'));

// meu BD esta neste caminho agora 
require_once(realpath(dirname(__FILE__) . '/database.php'));