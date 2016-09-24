<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BentosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BentosTable Test Case
 */
class BentosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\BentosTable
     */
    public $Bentos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.bentos',
        'app.bento_menus',
        'app.menus',
        'app.stages'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Bentos') ? [] : ['className' => 'App\Model\Table\BentosTable'];
        $this->Bentos = TableRegistry::get('Bentos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Bentos);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
