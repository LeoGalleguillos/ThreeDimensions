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
        $mannequinEntity->setCreated(new DateTime($array['created']))
                        ->setMannequinId($array['mannequin_id'])
                        ->setRotateX($array['rotate_x'])
                        ->setRotateY($array['rotate_y'])
                        ->setRotateZ($array['rotate_z'])
                        ->setTranslateOriginX($array['translate_origin_x'])
                        ->setTranslateOriginY($array['translate_origin_y'])
                        ->setTranslateOriginZ($array['translate_origin_z'])
                        ->setTranslateX($array['translate_x'])
                        ->setTranslateY($array['translate_y'])
                        ->setTranslateZ($array['translate_z'])
                        ->setUserId($array['user_id']);

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
    ) : ThreeDimensionsEntity\Mannequin {
        return $this->buildFromArray(
            $this->mannequinTable->selectWhereUserId($userId)
        );
    }
}
