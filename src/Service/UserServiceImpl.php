<?php
/**
 * Created by PhpStorm.
 * User: lostre
 * Date: 3/2/2019
 * Time: 11:26 πμ
 */

namespace App\Service;



class UserServiceImpl  implements UserService
{

    public function createUser($user,$entityManager)
    {

         $entityManager -> persist($user);
         $entityManager->flush();
    }

    public function findUserByUsername($name, $repository)
    {

        $user = $repository->findOneBy(['name' => $name]);

        return $user;
    }

}