<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TimesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TimesTable Test Case
 */
class TimesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TimesTable
     */
    protected $Times;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Times',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Times') ? [] : ['className' => TimesTable::class];
        $this->Times = $this->getTableLocator()->get('Times', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Times);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\TimesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
