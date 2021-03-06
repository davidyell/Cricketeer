<?php
namespace App\Model\Table;

use ArrayObject;
use Cake\Event\Event;
use Cake\ORM\Query;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Squads Model
 */
class SquadsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('squads');
        $this->displayField('player_id');
        $this->primaryKey(['player_id', 'team_id']);

        $this->belongsTo('Players', [
            'foreignKey' => 'player_id',
        ]);
        $this->belongsTo('Teams', [
            'foreignKey' => 'team_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->add('player_id', 'valid', ['rule' => 'uuid'])
            ->allowEmpty('player_id', 'create')
            ->add('team_id', 'valid', ['rule' => 'uuid'])
            ->allowEmpty('team_id', 'create');

        return $validator;
    }

    /**
     * Set the default ordering for the Squads so that they always appear in batting order
     *
     * @param Event $event
     * @param Query $query
     * @param ArrayObject $options
     * @param boolean $primary
     * @return $this
     */
    public function beforeFind(Event $event, Query $query, ArrayObject $options, $primary)
    {
        return $query->order(['position' => 'ASC']);
    }
}
