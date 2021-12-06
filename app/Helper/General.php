<?php

namespace App\Helper;

use Symfony\Component\HttpFoundation\Response;

class General
{
    static function render_template($path, $args)
    {
        if($args!=""){
            if(is_array($args)) {
                extract($args);
            } else {
                return new Response('Ha pasado un parametro diferente a un array', 500);
            }
        }
        ob_start();
        require VIEW_PATH . $path;
        return ob_get_clean();
    }
}
