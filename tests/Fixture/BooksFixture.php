<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * BooksFixture
 */
class BooksFixture extends TestFixture
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
                'original_title' => 'Lorem ipsum dolor sit amet',
                'portuguese_title' => 'Lorem ipsum dolor sit amet',
                'authors' => 'Lorem ipsum dolor sit amet',
                'year' => 1,
                'link' => 'Lorem ipsum dolor sit amet',
                'cover' => 'Lorem ipsum dolor sit amet',
                'synopsis' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'user_id' => 1,
                'created' => '2025-08-22 00:16:32',
                'modified' => '2025-08-22 00:16:32',
            ],
        ];
        parent::init();
    }
}
