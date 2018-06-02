<?php
namespace LeoGalleguillos\ThreeDimensionsTest\Model\Table;

use Exception;
use Generator;
use LeoGalleguillos\ThreeDimensions\Model\Table as ThreeDimensionsTable;
use LeoGalleguillos\ThreeDimensionsTest\TableTestCase;
use Zend\Db\Adapter\Adapter;
use PHPUnit\Framework\TestCase;

class GroundTest extends TableTestCase
{
    /**
     * @var string
     */
    protected $sqlPath;

    protected function setUp()
    {
        parent::setUp();
        $this->sqlPath = $_SERVER['PWD'] . '/sql/leogalle_test/ground/';

        $configArray     = require($_SERVER['PWD'] . '/config/autoload/local.php');
        $configArray     = $configArray['db']['adapters']['leogalle_test'];
        $this->adapter   = new Adapter($configArray);

        $this->groundTable = new ThreeDimensionsTable\Ground($this->adapter);

        $this->setForeignKeyChecks0();
        $this->dropTable();
        $this->createTable();
        $this->setForeignKeyChecks1();
    }

    protected function dropTable()
    {
        $sql = file_get_contents($this->sqlPath . 'drop.sql');
        $result = $this->adapter->query($sql)->execute();
    }

    protected function createTable()
    {
        $sql = file_get_contents($this->sqlPath . 'create.sql');
        $result = $this->adapter->query($sql)->execute();
    }

    public function testInitialize()
    {
        $this->assertInstanceOf(
            ThreeDimensionsTable\Ground::class,
            $this->groundTable
        );
    }
}
