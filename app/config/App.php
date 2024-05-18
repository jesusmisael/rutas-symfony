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
        define("MAIL_HOST", $_ENV['MAIL_HOST']);
        define("MAIL_USER", $_ENV['MAIL_USERNAME']);
        define("MAIL_PASSWORD", $_ENV['MAIL_PASSWORD']);
        define("MAIL_PORT", $_ENV['MAIL_PORT']);

        if(MODE=="production"){
            define('PATH_WS', $_ENV['PATH_WS_PRODUCTION']);
        }else{
            define('PATH_WS', $_ENV['PATH_WS_DEVELOPMENT']);
        }
    }
}
