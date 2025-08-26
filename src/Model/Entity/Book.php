<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Book Entity
 *
 * @property int $id
 * @property string $original_title
 * @property string $portuguese_title
 * @property string $authors
 * @property int $year
 * @property string $link
 * @property string|null $cover
 * @property string|null $synopsis
 * @property int $user_id
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Responsibility[] $responsibilities
 */
class Book extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'original_title' => true,
        'portuguese_title' => true,
        'authors' => true,
        'year' => true,
        'link' => true,
        'cover' => true,
        'synopsis' => true,
        'user_id' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'responsibilities' => true,
    ];
}
