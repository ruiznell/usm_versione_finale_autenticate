<?php
namespace sarassoroberto\usm\entity; 

class UserInteresse {

    private $userId;
    private $interesseId;
    
    public function __construct($userId,$interesseId) {

        $this->userId = $userId;
        $this->interesseId = $interesseId;

    /**
     * Get the value of userId
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set the value of userId
     *
     * @return  self
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get the value of interesseId
     */
    public function getInteresseId()
    {
        return $this->interesseId;
    }

    /**
     * Set the value of interesseId
     *
     * @return  self
     */
    public function setInteresseId($interesseId)
    {
        $this->interesseId = $interesseId;

        return $this;
    }
    }