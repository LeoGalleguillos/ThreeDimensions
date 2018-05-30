<?php
namespace LeoGalleguillos\ThreeDimensions\Model\Entity;

use DateTime;
use LeoGalleguillos\ThreeDimensions\Model\Entity as ThreeDimensionsEntity;

class Entity
{
    protected $created;
    protected $rotateX;
    protected $rotateY;
    protected $rotateZ;
    protected $translateX;
    protected $translateY;
    protected $translateZ;
    protected $updated;

    public function getCreated() : DateTime
    {
        return $this->created;
    }

    public function getUpdated() : DateTime
    {
        return $this->updated;
    }

    public function setCreated(DateTime $created) : ThreeDimensionsEntity\Entity
    {
        $this->created = $created;
        return $this;
    }

    public function setRotateX(float $rotateX) : ThreeDimensionsEntity\Entity
    {
        $this->rotateX = $rotateX;
        return $this;
    }

    public function setRotateY(float $rotateY) : ThreeDimensionsEntity\Entity
    {
        $this->rotateY = $rotateY;
        return $this;
    }

    public function setRotateZ(float $rotateZ) : ThreeDimensionsEntity\Entity
    {
        $this->rotateZ = $rotateZ;
        return $this;
    }

    public function setTranslateX(float $translateX) : ThreeDimensionsEntity\Entity
    {
        $this->translateX = $translateX;
        return $this;
    }

    public function setTranslateY(float $translateY) : ThreeDimensionsEntity\Entity
    {
        $this->translateY = $translateY;
        return $this;
    }

    public function setTranslateZ(float $translateZ) : ThreeDimensionsEntity\Entity
    {
        $this->translateZ = $translateZ;
        return $this;
    }

    public function setUpdated(DateTime $created) : ThreeDimensionsEntity\Entity
    {
        $this->updated = $updated;
        return $this;
    }
}
