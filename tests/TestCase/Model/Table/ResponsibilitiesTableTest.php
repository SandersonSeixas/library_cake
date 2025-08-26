<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ResponsibilitiesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ResponsibilitiesTable Test Case
 */
class ResponsibilitiesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ResponsibilitiesTable
     */
    protected $Responsibilities;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Responsibilities',
        'app.Books',
        'app.Users',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Responsibilities') ? [] : ['className' => ResponsibilitiesTable::class];
        $this->Responsibilities = $this->getTableLocator()->get('Responsibilities', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Responsibilities);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @link \App\Model\Table\ResponsibilitiesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @link \App\Model\Table\ResponsibilitiesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
