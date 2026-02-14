<?php

spl_autoload_register(function ($classe) {

    // Converte namespace em caminho
    $classe = str_replace('\\', '/', $classe);

    // Monta caminho absoluto correto
    $arquivo = __DIR__ . '/src/' . $classe . '.php';

    // Só carrega se existir
    if (file_exists($arquivo)) {
        require_once $arquivo;
    }
});
