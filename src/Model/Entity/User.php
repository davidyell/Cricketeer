<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;

/**
 * User Entity.
 */
class User extends Entity
{
    protected function _setPassword($password)
    {
        return (new DefaultPasswordHasher())->hash($password);
    }
}
