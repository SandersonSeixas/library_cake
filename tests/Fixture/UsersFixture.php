<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UsersFixture
 */
class UsersFixture extends TestFixture
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
                'name' => 'Lorem ipsum dolor sit amet',
                'username' => 'Lorem ipsum dolor sit amet',
                'email' => 'Lorem ipsum dolor sit amet',
                'password' => 'Lorem ipsum dolor sit amet',
                'role' => 'Lorem ipsum dolor sit amet',
                'email_verified' => 1,
                'email_token' => 'Lorem ipsum dolor sit amet',
                'email_token_expires' => '2025-08-22 21:59:25',
                'created' => '2025-08-22 21:59:25',
                'modified' => '2025-08-22 21:59:25',
            ],
        ];
        parent::init();
    }
}
