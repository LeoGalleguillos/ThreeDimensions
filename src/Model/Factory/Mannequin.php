<?php
namespace LeoGalleguillos\ThreeDimensions\Model\Factory;

use DateTime;
use LeoGalleguillos\ThreeDimensions\Model\Entity as ThreeDimensionsEntity;
use LeoGalleguillos\ThreeDimensions\Model\Table as ThreeDimensionsTable;

class Mannequin
{
    /**
     * Construct
     *
     * @param ThreeDimensionsTable\ThreeDimensions $cubeTable
     */
    public function __construct(
        ThreeDimensionsTable\Mannequin $mannequinTable
    ) {
        $this->mannequinTable = $mannequinTable;
    }

    /**
     * Build from array.
     *
     * @param array $array
     * @return ThreeDimensionsEntity\Mannequin
     */
    public function buildFromArray(
        array $array
    ) : ThreeDimensionsEntity\Mannequin {
        $mannequinEntity = new ThreeDimensionsEntity\Mannequin();
        $mannequinEntity->setCreated(new DateTime($array['created']));

        return $mannequinEntity;
    }

    /**
     * Build from user ID.
     *
     * @param int $userId
     * @return ThreeDimensionsEntity\Mannequin
     */
    public function buildFromUserId(
        int $userId
    ) : ThreeDimensionsEntity\ThreeDimensions {
        return $this->buildFromArray(
            $this->mannequinTable->selectWhereUserId($userId)
        );
    }
}
