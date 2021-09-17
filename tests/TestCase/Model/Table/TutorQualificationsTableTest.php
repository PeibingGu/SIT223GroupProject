<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TutorQualificationsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TutorQualificationsTable Test Case
 */
class TutorQualificationsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TutorQualificationsTable
     */
    protected $TutorQualifications;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.TutorQualifications',
        'app.Tutors',
        'app.QualificationTypes',
        'app.Universities',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('TutorQualifications') ? [] : ['className' => TutorQualificationsTable::class];
        $this->TutorQualifications = $this->getTableLocator()->get('TutorQualifications', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->TutorQualifications);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\TutorQualificationsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\TutorQualificationsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
