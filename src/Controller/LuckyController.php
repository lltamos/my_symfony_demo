<?php


namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class LuckyController extends AbstractController
{
    /**
     * @Route("/lucky/number")
     */
    public function numberAction()
    {
        
        $number = rand(0, 100);

        return new Response(
            '<html><body>Lucky number: ' . $number . '</body></html>'
        );
    }

    /**
     * @Route("/api/lucky/number")
     */
    public function apiNumberAction()
    {
        
        $data = array(
            'lucky_number' => rand(0, 100),
        );

        return new Response(
            json_encode($data),
            200,
            array('Content-Type' => 'application/json')
        );
    }

    /**
     * @Route("/api/json/Lucky/number")
     */
    public function apiJsonNumberAction()
    {
        $data = array(
            'lucky_number' => rand(0, 100),
        );

        // calls json_encode and sets the Content-Type header
        // 自动调用json_encode并设置Content-Type头
        return new JsonResponse($data);
    }

    /**
     * @Route("/Lucky/number/{count}")
     */
    public function numberCountAction($count)
    {

        $numbers = array();
        for ($i = 0; $i < $count; $i++) {
            $numbers[] = rand(0, 100);
        }
        $numbersList = implode(', ', $numbers);

        return new Response(
            '<html><body>Lucky numbers: ' . $numbersList . '</body></html>'
        );
    }

    /**
     * @Route("/templating/Lucky/number/{count}")
     * @param $count
     * @return Response
     */
    public function templatingNumberAction($count)
    {

        $numbers = array();
        for ($i = 0; $i < $count; $i++) {
            $numbers[] = rand(0, 100);
        }


        $numbersList = implode(', ', $numbers);
        $html = $this->render(
            'number.html.twig',    array('luckyNumberList' => $numbersList)
        );

        return new Response($html);
    }
}