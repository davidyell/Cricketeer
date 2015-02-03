<?php
namespace App\Model\Table;

use ArrayObject;
use Cake\Event\Event;
use Cake\ORM\Entity;
use Cake\ORM\Query;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Batsmen Model
 */
class BatsmenTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('batsmen');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');

        $this->belongsTo('Players', [
            'foreignKey' => 'player_id',
        ]);
        $this->belongsTo('Innings', [
            'foreignKey' => 'innings_id',
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
            ->add('id', 'valid', ['rule' => 'uuid'])
            ->allowEmpty('id', 'create')

            ->add('player_id', 'valid', ['rule' => 'uuid'])
            ->requirePresence('player_id', 'create')
            ->notEmpty('player_id')

            ->add('runs', 'valid', ['rule' => 'numeric'])
            ->add('runs', 'valid', ['rule' => 'naturalNumber'])
            ->requirePresence('runs', 'create')
            ->notEmpty('runs')

            ->add('balls', 'valid', ['rule' => 'numeric'])
            ->add('balls', 'valid', ['rule' => 'naturalNumber'])
            ->requirePresence('balls', 'create')
            ->notEmpty('balls')

            ->add('fours', 'valid', ['rule' => 'numeric'])
            ->add('fours', 'valid', ['rule' => ['naturalNumber', true]])
            ->requirePresence('fours', 'create')
            ->notEmpty('fours')

            ->add('sixes', 'valid', ['rule' => 'numeric'])
            ->add('sixes', 'valid', ['rule' => ['naturalNumber', true]])
            ->requirePresence('sixes', 'create')
            ->notEmpty('sixes');

        return $validator;
    }

    /**
     * @param Event $event
     * @param Entity $entity
     * @param ArrayObject $options
     * @return boolean
     */
    public function beforeSave(Event $event, Entity $entity, ArrayObject $options)
    {
        $entity->set('strike_rate', $this->strikeRate($entity->runs, $entity->balls));
        return true;
    }

    /**
     * Find a list of the Top batsmen
     *
     * @param Query $query
     * @param array $options
     * @return $this
     */
    public function findTopBatters(Query $query, array $options)
    {
        return $query->contain([
            'Players',
            'Innings' => [
                'Matches' => [
                    'Formats',
                    'Venues'
                ]
            ]
        ])
        ->order(['runs' => 'DESC', 'strike_rate' => 'DESC']);
    }

    /**
     * Work out the batsmen strike rate
     *
     * @param $runs Number of runs scored
     * @param $balls Number of balls faced
     * @return float
     */
    public function strikeRate($runs, $balls)
    {
        if ($balls > 0) {
            return (float)number_format(($runs / $balls) * 100, 2);
        }

        return (float)0.0;
    }
}
