<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 18/12/14
 * Time: 09:38
 */

namespace App\Model\Table;

use Cake\ORM\Table;

class BattingStylesTable extends Table {

    public function initialize(array $config)
    {
        $this->table('batting_styles');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Players', [
            'foreignKey' => 'batting_style_id',
        ]);
    }

}