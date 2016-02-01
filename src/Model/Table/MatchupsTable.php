<?php
namespace App\Model\Table;

use App\Model\Entity\Matchup;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Matchups Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Decks
 */
class MatchupsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('matchups');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Decks', [
            'foreignKey' => 'deck_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Opponents', [
            'className' => 'Decks',
            'foreignKey' => 'deck_id1',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');

        $validator
            ->add('deck_id1', 'valid', ['rule' => 'numeric'])
            ->requirePresence('deck_id1', 'create')
            ->notEmpty('deck_id1');

        $validator
            ->add('victorious', 'valid', ['rule' => 'boolean'])
            ->requirePresence('victorious', 'create')
            ->notEmpty('victorious');

        $validator
            ->allowEmpty('observation');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['deck_id'], 'Decks'));
        return $rules;
    }
}
