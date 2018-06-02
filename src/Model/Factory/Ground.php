<?php
namespace LeoGalleguillos\ThreeDimensions\Model\Factory;

use DateTime;
use LeoGalleguillos\ThreeDimensions\Model\Entity as ThreeDimensionsEntity;
use LeoGalleguillos\ThreeDimensions\Model\Table as ThreeDimensionsTable;

class Ground
{
    /**
     * Construct
     *
     * @param ThreeDimensionsTable\ThreeDimensions $cubeTable
     */
    public function __construct(
        ThreeDimensionsTable\Ground $groundTable
    ) {
        $this->groundTable = $groundTable;
    }

    /**
     * Build from array.
     *
     * @param array $array
     * @return ThreeDimensionsEntity\Ground
     */
    public function buildFromArray(
        array $array
    ) : ThreeDimensionsEntity\Ground {
        $groundEntity = new ThreeDimensionsEntity\Ground();
        $groundEntity
            ->setBackgroundColorRgbR($array['background_color_rgb_r'])
            ->setBackgroundColorRgbG($array['background_color_rgb_g'])
            ->setBackgroundColorRgbB($array['background_color_rgb_b'])
            ->setCreated(new DateTime($array['created']))
            ->setGroundId($array['ground_id'])
            ->setRotateX($array['rotate_x'])
            ->setRotateY($array['rotate_y'])
            ->setRotateZ($array['rotate_z'])
            ->setTransformOriginX($array['transform_origin_x'])
            ->setTransformOriginY($array['transform_origin_y'])
            ->setTransformOriginZ($array['transform_origin_z'])
            ->setTranslateX($array['translate_x'])
            ->setTranslateY($array['translate_y'])
            ->setTranslateZ($array['translate_z']);

        return $groundEntity;
    }
}
