<?php
namespace App\Model\Table;

use ArrayObject;
use Cake\Event\Event;
use Cake\ORM\Entity;
use Cake\ORM\Table;
use Cake\Validation\Validator;


/**
 * Innings Model
 */
class InningsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('innings');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');

        $this->belongsTo('Matches', [
            'foreignKey' => 'match_id',
        ]);
        $this->belongsTo('Teams', [
            'foreignKey' => 'team_id',
        ]);
        $this->hasMany('Batsmen', [
            'foreignKey' => 'innings_id',
            'dependent' => true,
            'cascadeCallbacks' => false
        ]);
        $this->hasMany('Bowlers', [
            'foreignKey' => 'innings_id',
            'dependent' => true,
            'cascadeCallbacks' => false
        ]);
        $this->hasMany('Wickets', [
            'foreignKey' => 'innings_id',
            'dependent' => true,
            'cascadeCallbacks' => false
        ]);
        $this->belongsTo('InningsTypes');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator
     * @return \Cake\Validation\Validator
     */
//	public function validationDefault(Validator $validator) {
//		$validator
//			->add('id', 'valid', ['rule' => 'uuid'])
//			->allowEmpty('id', 'create')
//			->add('match_id', 'valid', ['rule' => 'uuid'])
//			->requirePresence('match_id', 'create')
//			->notEmpty('match_id')
//			->add('player_id', 'valid', ['rule' => 'uuid'])
//			->requirePresence('player_id', 'create')
//			->notEmpty('player_id')
//			->add('team_id', 'valid', ['rule' => 'uuid'])
//			->requirePresence('team_id', 'create')
//			->notEmpty('team_id');
//
//		return $validator;
//	}

    /**
     * Strip out any empty wickets before we save
     *
     * @param Event $event
     * @param Entity $entity
     * @param ArrayObject $options
     * @return bool
     */
    public function beforeSave(Event $event, Entity &$entity, ArrayObject $options)
    {
        if ($entity->has('wickets')) {
            foreach ($entity->wickets as $k => $wicket) {
                if (empty($wicket->get('took_wicket_player_id')) && empty($wicket->get('bowler_player_id'))) {
                    unset($entity->wickets[$k]);
                }
            }
        }

        return true;
    }
}
