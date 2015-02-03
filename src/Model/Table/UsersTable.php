<?php
/**
 * Created by PhpStorm.
 * User: David Yell <neon1024@gmail.com>
 * Date: 03/02/15
 * Time: 14:15
 */

namespace App\Model\Table;

use Cake\ORM\Table;

class UsersTable extends Table
{
    public function initialize(array $config)
    {
        $this->table('users');
        $this->displayField('username');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');
    }
}