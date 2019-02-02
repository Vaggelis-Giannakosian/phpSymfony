<?php

namespace App\Controller;


use App\Entity\Account;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
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
    /**
     * @Route("/save", name="save")
     */
    public function save(){
        $entityManager = $this->getDoctrine()->getManager();
        $account = new Account();
        $account->setUsername('asdfsdaf');
        $account->setPassword('asdfdsf');

         $user = $this->findUserbyName('vagos');
        $account->setUser($user);
        $entityManager->persist($account);
        $entityManager->flush();

        return new Response('Saved a user with the id of '.$user->getId());
    }
    public function findUser ($id){
        $user = $this->getDoctrine()
            ->getRepository(User::class)
            ->findBy($id);
        return $user;
    }

    public function findUserbyName($name){
        $repository = $this->getDoctrine()->getRepository(User::class);
        $user = $repository->findOneBy(['name' => $name]);

        return $user;
    }


}
