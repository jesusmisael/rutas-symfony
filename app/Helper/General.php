<?php

namespace App\Helper;

use Symfony\Component\HttpFoundation\Response;

class General
{
    static function render_template(array $args)
    {
        if(isset($args[1]) && $args[1]!=""){
            if(is_array($args[1])) {
                $view = (object)$args[1];
            } else {
                return new Response('Ha pasado un parametro diferente a un array', 500);
            }
        }
        ob_start();
        require VIEW_PATH . $args[0];
        return ob_get_clean();
    }
}
