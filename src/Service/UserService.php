<?php
/**
 * Created by PhpStorm.
 * User: lostre
 * Date: 3/2/2019
 * Time: 11:25 πμ
 */

namespace App\Service;


interface UserService
{

    public function createUser($user,$entityManager);

    public function findUserByUsername($name,$repository);

}