<?php 

$menus = [
    ['name' => 'Painel', 'route' => 'dashboard'],
    ['name' => 'Tabelas'],
    ['name' => 'Caegorias', 'route' => 'categoria.index', 'parent_id' => 2],
    ['name' => 'Linhas', 'route' => 'linhas.index', 'parent_id' => 2],
    ['name' => 'Competências', 'route' => 'competencias.index', 'parent_id' => 2],
    ['name' => 'Indicadores', 'route' => 'indicadores.index', 'parent_id' => 2],
    ['name' => 'Escala de Competências', 'route' => 'escalacompetencias.index', 'parent_id' => 2],
    ['name' => 'Escala de Resultados', 'route' => 'escalaresultados.index', 'parent_id' => 2],
    ['name' => 'Lotações', 'route' => 'lotacoes.index', 'parent_id' => 2],
    ['name' => 'Servidores', 'route' => 'servidores.index', 'parent_id' => 2],
    ['name' => 'Linhas & Lotações', 'route' => 'linhas.lotacoes', 'parent_id' => 2],
    ['name' => 'Lotações e Linhas', 'route' => 'lotacoes.linhas', 'parent_id' => 2],
];