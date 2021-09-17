<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TutorSpecialisationsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TutorSpecialisationsTable Test Case
 */
class TutorSpecialisationsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TutorSpecialisationsTable
     */
    protected $TutorSpecialisations;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.TutorSpecialisations',
        'app.Tutors',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('TutorSpecialisations') ? [] : ['className' => TutorSpecialisationsTable::class];
        $this->TutorSpecialisations = $this->getTableLocator()->get('TutorSpecialisations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->TutorSpecialisations);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\TutorSpecialisationsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\TutorSpecialisationsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
