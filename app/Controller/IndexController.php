<?php

namespace App\Controller;

use App\Helper\General;
use App\Model\PruebaModel;
use Symfony\Component\Config\Definition\Exception\Exception;
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

    public function ejemploGET($variable1, $variable2){
        $html = General::render_template(['ejemplo/get.php',compact('variable1','variable2')]);
        return new Response($html);
    }

    public function ejemploPOST(){
        //Ejemplo de depurador en lugar de var_dump, echo, print_r, etc
        dd($_POST);
        $variable1 = $_POST["variable1"];
        $variable2 = $_POST["variable2"];

        if(1!=1){
            $modelEjemplo = new PruebaModel();
            $modelEjemplo->Ejemplo();
        }else{
            //Ejemplo de Exception
            throw new Exception("Error", 500);
        }

        $html = General::render_template(['ejemplo/post.php',compact('variable1','variable2')]);
        return new Response($html);
    }
}
