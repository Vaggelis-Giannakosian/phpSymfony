<?php
/**
 * Created by PhpStorm.
 * User: lostre
 * Date: 3/2/2019
 * Time: 11:26 πμ
 */

namespace App\Service;


class AccountServiceImpl implements AccountService
{

    public function saveAccount($account,$entityManager)
    {
        $entityManager -> persist($account);
        $entityManager->flush();

    }
}