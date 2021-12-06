<?php

namespace App\Controller;

use App\Helper\General;
use Symfony\Component\HttpFoundation\Response;

class IndexController
{
    public function index(){
        $html = General::render_template('index.php','');
        return new Response($html);
    }
}
