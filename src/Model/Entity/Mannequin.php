<?php
namespace LeoGalleguillos\ThreeDimensions\Model\Entity;

use DateTime;
use JsonSerializable;
use LeoGalleguillos\ThreeDimensions\Model\Entity as ThreeDimensionsEntity;

class Mannequin extends ThreeDimensionsEntity\Entity implements JsonSerializable
{
    protected $mannequinId;
    protected $userId;

    public function getMannequinId() : int
    {
        return $this->mannequinId;
    }

    public function getUserId() : int
    {
        return $this->userId;
    }

    public function jsonSerialize()
    {
		$array = [];
		foreach ($this as $key => $value) {
			$array[$key] = $value;
		}
		return $array;
    }

    public function setMannequinId(int $mannequinId) : ThreeDimensionsEntity\Mannequin
    {
        $this->mannequinId = $mannequinId;
        return $this;
    }

    public function setUserId(int $userId) : ThreeDimensionsEntity\Mannequin
    {
        $this->userId = $userId;
        return $this;
    }
}
