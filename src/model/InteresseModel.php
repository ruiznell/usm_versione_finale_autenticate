<?php
namespace sarassoroberto\usm\model;
use \PDO;
use sarassoroberto\usm\config\local\AppConfig;
use sarassoroberto\usm\entity\Interesse;
use sarassoroberto\usm\entity\User;

class InteresseModel
{

    private $conn;

    public function __construct()
    {
        try {
            $this->conn = new PDO('mysql:dbname='.AppConfig::DB_NAME.';host='.AppConfig::DB_HOST, AppConfig::DB_USER, AppConfig::DB_PASSWORD);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            // TODO: togliere echo
            echo $e->getMessage();
        }
    }

    // CRUD
    public function create(Interesse $interesse)
    {

        try {
            $pdostm = $this->conn->prepare('INSERT INTO Interesse (Nome) VALUES (:Nome;');

            $pdostm->bindValue(':Nome', $interesse->getNome(), PDO::PARAM_STR);
            
            

            $pdostm->execute();
        } catch (\PDOException $e) {
            // TODO: Evitare echo
            echo $e->getMessage();

        }
    }


    public function readAll()
    {
        $pdostm = $this->conn->prepare('SELECT * FROM Interesse;');
        $pdostm->execute();
        return $pdostm->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,Interesse::class,['']);
    }

    public function readOne($interesse_id)
    {
        try {
            $sql = "Select * from User where InteresseId=:interesse_id";
            $pdostm = $this->conn->prepare($sql);
            $pdostm->bindValue('InteresseId', $interesse_id, PDO::PARAM_INT);
            $pdostm->execute();
            $result = $pdostm->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,Interesse::class,['']);

            return count($result) === 0 ? null : $result[0];

        } catch (\Throwable $th) {
            
            echo "qualcosa è andato storto";
            echo " ". $th->getMessage();
            //throw $th;
        }
    }


    public function update($user)
    {
        $sql = "UPDATE Interesse set Nome=:Nome, 
                                
                                where InteresseId=:interesse_id;";
        $pdostm = $this->conn->prepare($sql);
        $pdostm->bindValue(':Nome', $user->getNome(), PDO::PARAM_STR);
        
        $pdostm->execute();

        if($pdostm->rowCount() === 0) {
            return false;
        } else if($pdostm->rowCount() === 1){
            return true;
        }
    }

    public function delete(int $interesse_id):bool
    {
        $sql = "delete from User where InteresseId=:interesse_id ";
        
        $pdostm = $this->conn->prepare($sql);
        $pdostm->bindValue(':interesse_id',$interesse_id,PDO::PARAM_INT);
        $pdostm->execute();

        
        if($pdostm->rowCount() === 0) {
            return false;
        } else if($pdostm->rowCount() === 1){
            return true;
        }

  
    }

}