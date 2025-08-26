<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Responsibilities Model
 *
 * @property \App\Model\Table\BooksTable&\Cake\ORM\Association\BelongsTo $Books
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Responsibility newEmptyEntity()
 * @method \App\Model\Entity\Responsibility newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Responsibility> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Responsibility get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Responsibility findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Responsibility patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Responsibility> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Responsibility|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Responsibility saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Responsibility>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Responsibility>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Responsibility>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Responsibility> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Responsibility>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Responsibility>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Responsibility>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Responsibility> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ResponsibilitiesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('responsibilities');
        $this->setDisplayField('action');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Books', [
            'foreignKey' => 'book_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->nonNegativeInteger('book_id')
            ->notEmptyString('book_id');

        $validator
            ->nonNegativeInteger('user_id')
            ->notEmptyString('user_id');

        $validator
            ->scalar('action')
            ->requirePresence('action', 'create')
            ->notEmptyString('action');

        $validator
            ->allowEmptyString('changes');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['book_id'], 'Books'), ['errorField' => 'book_id']);
        $rules->add($rules->existsIn(['user_id'], 'Users'), ['errorField' => 'user_id']);

        return $rules;
    }
}
