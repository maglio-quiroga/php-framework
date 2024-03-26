<?php

use librerias\Route;

Route::get('/',function(){
    echo "hola desde la main page";
});

Route::get('/otro',function(){
    echo "hola desde la otro pagina";
});

Route::dispatch();

?>