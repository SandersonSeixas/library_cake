<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ResponsibilitiesFixture
 */
class ResponsibilitiesFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'book_id' => 1,
                'user_id' => 1,
                'action' => 'Lorem ipsum dolor sit amet',
                'changes' => '',
                'created' => '2025-08-22 00:17:13',
            ],
        ];
        parent::init();
    }
}
