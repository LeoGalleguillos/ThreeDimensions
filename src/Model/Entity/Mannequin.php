<?php
namespace LeoGalleguillos\ThreeDimensions\Model\Entity;

use DateTime;
use LeoGalleguillos\ThreeDimensions\Model\Entity as ThreeDimensionsEntity;

class Mannequin extends ThreeDimensionsEntity\Entity
{
    protected $userId;

    public function getUserId() : int
    {
        return $this->userId;
    }

    public function setUserId(int $userId) : ThreeDimensionsEntity\Mannequin
    {
        $this->userId = $userId;
        return $this;
    }
}
