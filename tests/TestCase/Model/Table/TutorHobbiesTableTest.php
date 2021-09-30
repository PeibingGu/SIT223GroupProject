<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TutorHobbiesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TutorHobbiesTable Test Case
 */
class TutorHobbiesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TutorHobbiesTable
     */
    protected $TutorHobbies;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.TutorHobbies',
        'app.Tutors',
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
        $config = $this->getTableLocator()->exists('TutorHobbies') ? [] : ['className' => TutorHobbiesTable::class];
        $this->TutorHobbies = $this->getTableLocator()->get('TutorHobbies', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->TutorHobbies);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\TutorHobbiesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\TutorHobbiesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
