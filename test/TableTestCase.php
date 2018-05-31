<?php
namespace LeoGalleguillos\ThreeDimensionsTest;

use PHPUnit\Framework\TestCase;

class TableTestCase extends TestCase
{
    /**
     * @var string
     */
    protected $sqlDirectory;

    protected function setUp()
    {
        $this->sqlDirectory = $_SERVER['PWD'] . '/sql';
    }

    protected function setForeignKeyChecks0()
    {
        $sql = file_get_contents(
            $this->sqlDirectory . '/SetForeignKeyChecks0.sql'
        );

        $result = $this->adapter->query($sql)->execute();
    }

    protected function setForeignKeyChecks1()
    {
        $sql = file_get_contents(
            $this->sqlDirectory . '/SetForeignKeyChecks1.sql'
        );

        $result = $this->adapter->query($sql)->execute();
    }
}
