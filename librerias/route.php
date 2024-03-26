<?php

namespace librerias;

class Route{

    private static $rutas = [];

    public static function get($url,$callback){
        $url = trim($url,"/");
        self::$rutas["GET"][$url] = $callback;
    }
    public static function post($url,$callback){
        $url = trim($url,"/");
        self::$rutas["POST"][$url] = $callback;
    }
    public static function dispatch(){
        $url = $_SERVER['REQUEST_URI'];
        $url = trim($url,"/");
        $metodo = $_SERVER['REQUEST_METHOD'];
        
        foreach(self::$rutas[$metodo] as $ruta => $callback){

            if($ruta == $url){
                $callback();
                return;
            }

        }
        echo "Error 404, pagina no encontrada";
    }
}