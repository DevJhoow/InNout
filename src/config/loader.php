<?php

// metodos para chamar os arquivos da pasta model

function loadModel($modelName) {
    require_once(MODEL_PATH . "/{$modelName}.php");
}

// carrega o arquivo e mais um parametro para o arquivo que for inserido 
function loadView($viewName, $params = []) {

    if(count($params) > 0 ) {
        foreach ($params as $key => $value) {
            if(strlen($key) > 0) {
                ${$key} = $value ; 
            }
        }
    }

    require_once(VIEW_PATH . "/{$viewName}.php");
}

function loadTemplateView($viewName, $params = []) {

    if(count($params) > 0 ) {
        foreach ($params as $key => $value) {
            if(strlen($key) > 0) {
                ${$key} = $value ; 
            }
        }
    }

    require_once(TEMPLATE_PATH . "/header.php");
    require_once(TEMPLATE_PATH . "/left.php");
    require_once(VIEW_PATH . "/{$viewName}.php");
    require_once(TEMPLATE_PATH . "/footer.php");
}