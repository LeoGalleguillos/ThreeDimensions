<?php
namespace LeoGalleguillos\ThreeDimensionsTest\Model\Entity;

use LeoGalleguillos\ThreeDimensions\Model\Entity as ThreeDimensionsEntity;
use LeoGalleguillos\ThreeDimensionsTest\TableTestCase;
use Zend\Db\Adapter\Adapter;
use PHPUnit\Framework\TestCase;

class MannequinTest extends TestCase
{
    protected function setUp()
    {
        $this->mannequinEntity = new ThreeDimensionsEntity\Mannequin();
    }

    public function testInitialize()
    {
        $this->assertInstanceOf(
            ThreeDimensionsEntity\Mannequin::class,
            $this->mannequinEntity
        );
    }
}
