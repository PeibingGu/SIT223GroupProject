<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SpecialisationsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SpecialisationsTable Test Case
 */
class SpecialisationsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SpecialisationsTable
     */
    protected $Specialisations;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Specialisations',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Specialisations') ? [] : ['className' => SpecialisationsTable::class];
        $this->Specialisations = $this->getTableLocator()->get('Specialisations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Specialisations);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\SpecialisationsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
