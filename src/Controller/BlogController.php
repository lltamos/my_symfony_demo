<?php


namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

class BlogController
{
    public function list()
    {
        
        $number = rand(0, 100);
        return new Response(
            '<html><body>Lucky number: ' . $number . '</body></html>'
        );
    }

}