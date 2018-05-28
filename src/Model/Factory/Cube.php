<?php
namespace LeoGalleguillos\ThreeDimensions\Model\Factory;

use DateTime;
use LeoGalleguillos\ThreeDimensions\Model\Entity as ThreeDimensionsEntity;
use LeoGalleguillos\ThreeDimensions\Model\Table as ThreeDimensionsTable;

class ThreeDimensions
{
    /**
     * Construct
     *
     * @param ThreeDimensionsTable\ThreeDimensions $cubeTable
     */
    public function __construct(
        ThreeDimensionsTable\ThreeDimensions $cubeTable
    ) {
        $this->cubeTable = $cubeTable;
    }

    /**
     * Build from array.
     *
     * @param array $array
     * @return ThreeDimensionsEntity\ThreeDimensions
     */
    public function buildFromArray(
        array $array
    ) : ThreeDimensionsEntity\ThreeDimensions {
        $cubeEntity = new ThreeDimensionsEntity\ThreeDimensions();
        $cubeEntity->setCreated(new DateTime($array['created']))
                       ->setThreeDimensionsId($array['cube_id'])
                       ->setSubject($array['subject'])
                       ->setViews($array['views']);

        if (!empty($array['message'])) {
            $cubeEntity->setMessage($array['message']);
        }

        return $cubeEntity;
    }

    /**
     * Build from cube ID.
     *
     * @param int $cubeId
     * @return ThreeDimensionsEntity\ThreeDimensions
     */
    public function buildFromThreeDimensionsId(
        int $cubeId
    ) : ThreeDimensionsEntity\ThreeDimensions {
        return $this->buildFromArray(
            $this->cubeTable->selectWhereThreeDimensionsId($cubeId)
        );
    }
}
