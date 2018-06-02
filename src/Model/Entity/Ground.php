<?php
namespace LeoGalleguillos\ThreeDimensions\Model\Entity;

use DateTime;
use JsonSerializable;
use LeoGalleguillos\ThreeDimensions\Model\Entity as ThreeDimensionsEntity;

class Ground extends ThreeDimensionsEntity\Entity implements JsonSerializable
{
    protected $groundId;

    public function getGroundId() : int
    {
        return $this->groundId;
    }

    public function jsonSerialize() : array
    {
		$array = [];
		foreach ($this as $key => $value) {
			$array[$key] = $value;
		}
		return $array;
    }

    public function setGroundId(int $groundId) : ThreeDimensionsEntity\Ground
    {
        $this->groundId = $groundId;
        return $this;
    }
}
