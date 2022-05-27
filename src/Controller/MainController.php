<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="main_home")
     */
    public function home(): Response
    {
        return $this->render('main/home.html.twig', [
            "title"=>"Home"
        ]);
    }

    /**
     * @Route("/about",name="main_about")
     */
    public function detail():Response
    {
        return $this->render("main/about.html.twig",[
            "title"=>"About Us",
            "datas"=>json_decode(file_get_contents("../src/datas/team.json"),true)
        ]);
    }
}
