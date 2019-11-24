<?php


namespace App\Controller;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TwigController extends AbstractController
{
    /**
     * @Route("/twig/templat/01")
     */
    public function twigfun01()
    {
        $res_list = array(
            'page_title' => 'twigfun01'
        );
        $temp_arr = [];

        for ($i = 1; $i <= 10; $i++) {
            array_push($temp_arr, $i);
        }
        $navigation = array("navigation" => $temp_arr);

        $res_data = array_merge($res_list, $navigation);
        $html = $this->render('twig01.html.twig', $res_data);
        
        return new Response($html);
    }

}