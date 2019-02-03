<?php
/**
 * Created by PhpStorm.
 * User: lostre
 * Date: 3/2/2019
 * Time: 11:26 πμ
 */

namespace App\Service;


interface AccountService
{
        public function saveAccount($account,$entityManager);
}