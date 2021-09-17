<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\QualificationTypesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\QualificationTypesTable Test Case
 */
class QualificationTypesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\QualificationTypesTable
     */
    protected $QualificationTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.QualificationTypes',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('QualificationTypes') ? [] : ['className' => QualificationTypesTable::class];
        $this->QualificationTypes = $this->getTableLocator()->get('QualificationTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->QualificationTypes);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\QualificationTypesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
