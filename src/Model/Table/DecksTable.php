<?php
namespace App\Model\Table;

use App\Model\Entity\Deck;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Decks Model
 *
 * @property \Cake\ORM\Association\BelongsTo $DecksStyles
 * @property \Cake\ORM\Association\BelongsTo $Heroes
 * @property \Cake\ORM\Association\HasMany $Matchups
 */
class DecksTable extends Table
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

        $this->table('decks');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('DecksStyles', [
            'foreignKey' => 'decks_style_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Heroes', [
            'foreignKey' => 'hero_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Matchups', [
            'foreignKey' => 'deck_id'
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
            ->allowEmpty('name');

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
        $rules->add($rules->existsIn(['decks_style_id'], 'DecksStyles'));
        $rules->add($rules->existsIn(['hero_id'], 'Heroes'));
        return $rules;
    }
}
