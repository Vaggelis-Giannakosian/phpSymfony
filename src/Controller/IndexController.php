<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @Route("/", name="index")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(Request $request)
    {
        $name = $request->query->get('name','default Name');
        return $this->render('index.html.twig',
            [
            'controller_name' => 'IndexController',
                'lovely_variable'=>'Ta paparia mou einai kitrina',
                'name'=>$name
            ]
        );
    }
}
