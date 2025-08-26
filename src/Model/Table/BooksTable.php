<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Books Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\ResponsibilitiesTable&\Cake\ORM\Association\HasMany $Responsibilities
 *
 * @method \App\Model\Entity\Book newEmptyEntity()
 * @method \App\Model\Entity\Book newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Book> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Book get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Book findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Book patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Book> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Book|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Book saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Book>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Book>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Book>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Book> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Book>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Book>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Book>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Book> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class BooksTable extends Table
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

        $this->setTable('books');
        $this->setDisplayField('original_title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

/**        $this->addBehavior('Josegonzalez/Upload.Upload', [
	    'cover' => [
		'fields' => [
    	    	    'dir' => 'cover_dir',
        	    'size' => 'cover_size',
            	    'type' => 'cover_type'
		],
               'nameCallback' => function ($data, $settings) {
		    return time() . '_' . $data['name'];
                },
		'keepFilesOnDelete' => false
    	    ]
	]);
*/
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Responsibilities', [
            'foreignKey' => 'book_id',
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
            ->scalar('original_title')
            ->maxLength('original_title', 255)
            ->requirePresence('original_title', 'create')
            ->notEmptyString('original_title');

        $validator
            ->scalar('portuguese_title')
            ->maxLength('portuguese_title', 255)
            ->requirePresence('portuguese_title', 'create')
            ->notEmptyString('portuguese_title');

        $validator
            ->scalar('authors')
            ->maxLength('authors', 255)
            ->requirePresence('authors', 'create')
            ->notEmptyString('authors');

        $validator
            ->integer('year')
            ->requirePresence('year', 'create')
            ->notEmptyString('year');

        $validator
            ->scalar('link')
            ->maxLength('link', 500)
            ->requirePresence('link', 'create')
            ->notEmptyString('link');

        $validator
            ->scalar('cover')
            ->maxLength('cover', 255)
            ->allowEmptyString('cover');

        $validator
            ->scalar('synopsis')
            ->allowEmptyString('synopsis');

        $validator
            ->nonNegativeInteger('user_id')
            ->notEmptyString('user_id');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'), ['errorField' => 'user_id']);

        return $rules;
    }
    //.........................................
    public function isOwnedBy($bookId, $userId)
    {
	return $this->exists(['id' => $bookId, 'user_id' => $userId]);
    }
}
