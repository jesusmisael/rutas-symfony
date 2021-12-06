<?php

namespace App\Controller;

use App\Helper\General;
use Symfony\Component\HttpFoundation\Response;

class IndexController
{
    public function index(){
        /*
         * $argumento1 = "Esto es un ejemplo de un valor que se envia a la vista"
         * $html = General::render_template(['index.php',[$argumento1]);
         * $html = General::render_template(['index.php']);
        */
        $html = General::render_template(['index.php']);
        return new Response($html);
    }
}
