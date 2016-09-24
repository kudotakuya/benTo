<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BentoMenusTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BentoMenusTable Test Case
 */
class BentoMenusTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\BentoMenusTable
     */
    public $BentoMenus;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.bento_menus',
        'app.bentos',
        'app.menus'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('BentoMenus') ? [] : ['className' => 'App\Model\Table\BentoMenusTable'];
        $this->BentoMenus = TableRegistry::get('BentoMenus', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->BentoMenus);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
