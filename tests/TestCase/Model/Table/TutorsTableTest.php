<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TutorsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TutorsTable Test Case
 */
class TutorsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TutorsTable
     */
    protected $Tutors;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Tutors',
        'app.Users',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Tutors') ? [] : ['className' => TutorsTable::class];
        $this->Tutors = $this->getTableLocator()->get('Tutors', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Tutors);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\TutorsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\TutorsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
