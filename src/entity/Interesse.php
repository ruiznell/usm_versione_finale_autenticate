<?php
namespace sarassoroberto\usm\entity; 

class Interesse {
   
    private $interesseId;
    private $nome;

    public function __construct($nome) {
        $this->nome = $nome;
       
    }
    

    /**
     * Get the value of Nome
     */ 
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set the value of Nome
     *
     * @return  self
     */ 
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get the value of Interesse_Id
     */ 
    public function getInteresse_Id()
    {
        return $this->interesseId;
    }

    /**
     * Set the value of Interesse_Id
     *
     * @return  self
     */ 
    public function setInteresse_Id($interesseId)
    {
        $this->Interesse_Id = $interesseId;

        return $this;
    }
    }