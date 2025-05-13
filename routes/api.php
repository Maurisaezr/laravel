<?php

// routes/api.php
use App\Http\Controllers\ArticuloController2;

Route::get('/articulos-preparados', [ArticuloController2::class, 'getArticulos']);
Route::post('/articulos-procedimiento', [ArticuloController2::class, 'createArticuloProcedure']);
