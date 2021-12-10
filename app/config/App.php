<?php

namespace App\config;

class App
{
    static function Config(){
        $url='http://'.$_SERVER["HTTP_HOST"].'/';
        $version='2'.'.0'.rand(20,40).'.'.rand(0,20);
        define('PATH_SITE', $url);
        define('VERSION', $version);
        define("MODE", $_ENV['MODE']);
        define("DB_HOST", $_ENV['DB_HOST']);
        define("DB_USER", $_ENV['DB_USER']);
        define("DB_PASSWORD", $_ENV['DB_PASSWORD']);
        define("DB_NAME", $_ENV['DB_NAME']);

        if(MODE=="production"){
            define('PATH_WS', $_ENV['PATH_WS_PRODUCTION']);
        }else{
            define('PATH_WS', $_ENV['PATH_WS_DEVELOPMENT']);
        }
    }
}
