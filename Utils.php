<?php
function js_str($s)
{
    return '"' . addcslashes($s, "\0..\37\"\\") . '"';
}

function js_array($array)
{
    $temp = array_map('js_str', $array);
    return '[' . implode(',', $temp) . ']';
}

function getListaPaginada($lista, $quantPorPag)
{
    $sizeList = (is_array($lista) ? sizeof($lista) : 0);
    if ($sizeList > 0) {
        return array_chunk($lista, $quantPorPag);
    } else return ['erro' => true, 'mensagem' => 'A lista n«ªo pode ser paginada!'];
}