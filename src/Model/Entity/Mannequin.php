<?php
namespace LeoGalleguillos\ThreeDimensions\Model\Entity;

use DateTime;
use LeoGalleguillos\Entity\Model\Entity as EntityEntity;
use LeoGalleguillos\ThreeDimensions\Model\Entity as ThreeDimensionsEntity;

class Mannequin
{
    protected $userId;
    protected $created;
    protected $updated;

    public function getCreated() : DateTime
    {
        return $this->created;
    }

    public function getUpdated() : DateTime
    {
        return $this->updated;
    }

    public function getUserId() : int
    {
        return $this->userId;
    }

    public function setCreated(DateTime $created) : ThreeDimensionsEntity\Mannequin
    {
        $this->created = $created;
        return $this;
    }

    public function setUserId(int $userId) : ThreeDimensionsEntity\Mannequin
    {
        $this->userId = $userId;
        return $this;
    }

    public function setUpdated(DateTime $created) : ThreeDimensionsEntity\Mannequin
    {
        $this->updated = $updated;
        return $this;
    }
}
