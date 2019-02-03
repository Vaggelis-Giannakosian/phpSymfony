<?php

namespace App\Controller;
use App\Service\AccountServiceImpl;
use App\Service\UserServiceImpl;
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
        $user = new User();
        $user->setName('Vagelakos');
        $user->setPassword('tpt');
        $user->setEmail('sad@asde.as');
        $userService = new UserServiceImpl();
        $userService->createUser($user, $entityManager);
        return new Response('Saved a user with the id of '.$user->getId());

    }
    /**
     * @Route("/account", name="account")
     */
    public function saveAccount(){


        $entityManager = $this->getDoctrine()->getManager();
        $repository = $this->getDoctrine()->getRepository(User::class);
        $userService = new UserServiceImpl();
        $user= $userService->findUserByUsername('Vagelakos',$repository);

        $account = new Account();
        $account->setUsername('asdfsdaf');
        $account->setPassword('asdfdsf');
        $account->setUser($user);
        $accountService=new AccountServiceImpl();
        $accountService->saveAccount($account,$entityManager);
        return new Response('Saved a user with the id of '.$account->getId());
//        $user = $this->findUserbyName('vagos');

//        $entityManager->persist($account);
//        $entityManager->flush();
    }
    public function findUser ($id){
        $user = $this->getDoctrine()
            ->getRepository(User::class)
            ->findBy($id);
        return $user;
    }

//    public function findUserbyName($name){
//        $repository = $this->getDoctrine()->getRepository(User::class);
//        $user = $repository->findOneBy(['name' => $name]);
//
//        return $user;
//    }



}
