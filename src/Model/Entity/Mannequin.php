<?php
namespace LeoGalleguillos\ThreeDimensions\Model\Entity;

use DateTime;
use LeoGalleguillos\ThreeDimensions\Model\Entity as ThreeDimensionsEntity;

class Mannequin extends ThreeDimensionsEntity\Entity
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
