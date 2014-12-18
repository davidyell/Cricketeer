<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 18/12/14
 * Time: 09:38
 */

namespace App\Model\Table;

use Cake\ORM\Table;

class BowlingStylesTable extends Table {

    public function initialize(array $config)
    {
        $this->table('bowling_styles');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Players', [
            'foreignKey' => 'bowling_style_id',
        ]);
    }

}