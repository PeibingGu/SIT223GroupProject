<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\HobbiesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\HobbiesTable Test Case
 */
class HobbiesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\HobbiesTable
     */
    protected $Hobbies;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Hobbies',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Hobbies') ? [] : ['className' => HobbiesTable::class];
        $this->Hobbies = $this->getTableLocator()->get('Hobbies', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Hobbies);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\HobbiesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
