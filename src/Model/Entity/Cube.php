<?php
namespace LeoGalleguillos\ThreeDimensions\Model\Entity;

use DateTime;
use LeoGalleguillos\Entity\Model\Entity as EntityEntity;
use LeoGalleguillos\ThreeDimensions\Model\Entity as ThreeDimensionsEntity;

class ThreeDimensions
{
    protected $userId;
    protected $created;
    protected $subject;
    protected $message;
    protected $views;

    public function getCreated() : DateTime
    {
        return $this->created;
    }

    public function getMessage() : string
    {
        return $this->message;
    }

    public function getSubject() : string
    {
        return $this->subject;
    }

    public function getUserId() : int
    {
        return $this->userId;
    }

    public function getViews() : int
    {
        return $this->views;
    }

    public function setCreated(DateTime $created) : ThreeDimensionsEntity\ThreeDimensions
    {
        $this->created = $created;
        return $this;
    }

    public function setSubject(string $subject) : ThreeDimensionsEntity\ThreeDimensions
    {
        $this->subject = $subject;
        return $this;
    }

    public function setMessage(string $message) : ThreeDimensionsEntity\ThreeDimensions
    {
        $this->message = $message;
        return $this;
    }

    public function setUserId(int $userId) : ThreeDimensionsEntity\ThreeDimensions
    {
        $this->userId = $userId;
        return $this;
    }

    public function setViews(int $views) : ThreeDimensionsEntity\ThreeDimensions
    {
        $this->views = $views;
        return $this;
    }
}
