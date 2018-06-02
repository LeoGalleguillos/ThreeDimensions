<?php
namespace LeoGalleguillos\ThreeDimensions\Model\Service\Ground;

use Generator;
use LeoGalleguillos\ThreeDimensions\Model\Factory as ThreeDimensionsFactory;
use LeoGalleguillos\ThreeDimensions\Model\Table as ThreeDimensionsTable;

class Grounds
{
    public function __construct(
        ThreeDimensionsFactory\Ground $groundFactory,
        ThreeDimensionsTable\Ground $groundTable
    ) {
        $this->groundFactory = $groundFactory;
        $this->groundTable   = $groundTable;
    }

    public function getGrounds() : Generator
    {
        foreach ($this->groundTable->select() as $array) {
            yield $this->groundFactory->buildFromArray($array);
        }
    }
}
