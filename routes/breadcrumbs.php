<?php


Breadcrumbs::for('home', function($trail){
    $trail->push('Home', route('welcome'));
});

Breadcrumbs::for('categories.index', function ($trail){
    $trail->parent('home');
    $trail->push('categories', route('categories.index'));
});

Breadcrumbs::for('categories.create', function ($trail){
    $trail->parent('categories.index');
    $trail->push('create', route('categories.create'));
});

Breadcrumbs::for('categories.edit', function ($trail){
    $trail->parent('categories.index');
    $trail->push('edit', route('categories.create'));
});

Breadcrumbs::for('products.index', function ($trail){
    $trail->parent('home');
    $trail->push('products', route('products.index'));
});

Breadcrumbs::for('products.create', function ($trail){
    $trail->parent('products.index');
    $trail->push('create');
});

Breadcrumbs::for('products.edit', function ($trail){
    $trail->parent('products.index');
    $trail->push('edit');
});

?>
