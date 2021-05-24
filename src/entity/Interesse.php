<?php
namespace sarassoroberto\usm\entity; 

class Interesse {
   
    private $InteresseId;
    private $Nome;

    public function __construct($Nome) {
        $this->Nome = $Nome;
       
    }
    

    /**
     * Get the value of InteresseId
     */ 
    public function getInteresseId()
    {
        return $this->InteresseId;
    }

    /**
     * Set the value of InteresseId
     *
     * @return  self
     */ 
    public function setInteresseId($InteresseId)
    {
        $this->InteresseId = $InteresseId;

        return $this;
    }

    /**
     * Get the value of Nome
     */ 
    public function getNome()
    {
        return $this->Nome;
    }

    /**
     * Set the value of Nome
     *
     * @return  self
     */ 
    public function setNome($Nome)
    {
        $this->Nome = $Nome;

        return $this;
    }
    }