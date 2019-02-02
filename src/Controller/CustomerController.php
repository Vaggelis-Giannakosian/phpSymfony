<?php
/**
 * Created by PhpStorm.
 * User: lostre
 * Date: 2/2/2019
 * Time: 2:57 μμ
 */

namespace App\Controller;



use App\Entity\Account;
use App\Entity\User;
use http\Env\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CustomerController extends AbstractController
{
    /**
     * @Route("/customers/{name}", name="customers" , defaults={"name"="Vag"})
     * @param $name
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function customers($name )
    {
        return $this->render('customers.html.twig', [
            'controller_name' => 'CustomerController',
            'name'=> $name,
            'lovely_variable'=>'ONly love',
        ]);
    }


}