<?php

function show_session()
{
    if (session()->has('sucesso')) {
        echo show_alert('success', session('sucesso'));
    }

    if (session()->has('erro')) {
        echo show_alert('danger', session('erro'));
    }
}

function show_alert($tipo, $mensagem)
{
    $alert = <<< alert

    <div class="alert alert-$tipo alert-dismissible fade show" role="alert">
        $mensagem
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    alert;

    return $alert;
}

function show_erros($erros = null)
{
    if (!is_null($erros)) {
        foreach ($erros as $erro) {
            echo show_alert('danger', $erro);
        }
    }
}

