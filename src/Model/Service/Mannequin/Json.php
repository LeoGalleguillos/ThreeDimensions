<?php
namespace LeoGalleguillos\ThreeDimensions\Model\Service\Mannequin;

class Json
{
    public function getJsonString(
        ThreeDimensionsEntity\Mannequin $mannequinEntity
    ) {
        return json_encode($mannequinEntity);
    }
}
