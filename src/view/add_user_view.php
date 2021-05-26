
    <?php include './src/view/head.php' ?> 
    <?php include './src/view/header.php' ?>
 
    
    <div class="container">
        <!-- <form action="add_user_form.php" method="POST"> -->
        <form class="mt-4" action="<?= $action ?>" method="POST">
            <div class="form-group">
               <label for="">Nome</label>
               <!-- is-invalid  -->
               <input value="<?= $firstName ?>" 
                      class="form-control <?= $firstNameClass ?>"  
                      name="firstName"  
                      type="text">

               <div class="<?= $firstNameClassMessage ?>">
                  <?= $firstNameMessage ?>
               </div> 
            </div>

            <div class="form-group">
               <label for="">Cognome</label>
               <!-- is-invalid  -->
               <input
                value="<?= $lastName ?>" 
                class="form-control <?= $lastNameClass ?>"  
                name="lastName"  
                type="text">
               <div class="<?= $lastNameClassMessage ?>">
                  <?= $lastNameMessage ?>
               </div> 
            </div>


            <div class="form-group">
               <label for="">email</label>
               <!-- is-invalid  -->
               <input
                value="<?= $email ?>" 
                class="form-control <?= $emailClass ?>"  
                name="email"  
                type="text">
               <div class="<?= $emailClassMessage ?>">
                  <?= $emailMessage ?>
               </div> 
            </div>


             <div class="form-group">
                <label for="">data di nascita</label>
                <input class="form-control <?= $birthdayClass ?>" value="<?= $birthday ?>" name="birthday" type="date">
                <div class="<?= $birthdayClassMessage ?>">
                  <?= $birthdayMessage ?>
               </div> 
             </div>

             <div class="form-group">
               <label for="">password</label>
               <!-- is-invalid  -->
               <input
                value="<?= $password ?>" 
                class="form-control <?= $passwordClass ?>"  
                name="password"  
                type="text">
               <div class="<?= $passwordClassMessage ?>">
                  <?= $passwordMessage ?>
               </div> 
            </div>
           
            <div class="form-group mt-3">
                  <label for="interesse">Seleziona un interesse:</label>

                  <select name="interesse" id="interesse">

                  <?php
                  function Conectar(){
                     $conn = null;
                     $host = 'localhost';
                     $db = 'usm_finale';
                     $user = 'root';
                     $pwd = '';

                     try {
                        $conn = new PDO('mysql:host='.$host.';db_name= ' .$db, $user, $pwd);
                        
                    } catch (\PDOException $e) {
                        // TODO: togliere echo
                        echo $e->getMessage();
                    }
                      return $conn;
                  }

                  $con = Conectar();
                  $sql = "SELECT interesseId, nome FROM interesse";
                  $stmt = $con->prepare($sql);
                  $result = $stmt-> execute();
                  $rows= $stmt->fetchAll(\PDO::FETCH_OBJ);
                  foreach ($rows as $row) {
                     ?>
                     <option value="<?php print($row->interesseId); ?>"><?php print ($row->nome); ?></option>

                  <?php   
                  }
                  ?> 
                  </select>
            </div>

            <!-- quando gli utenti vengono creati non hanno ancora un id, quindi non ha bisogno del campo nascosto -->
             <?php if(isset($userId)) { ?>
               <!-- invece quando sono in modifica di un utente 
               <div class="form-group mt-4 p-4 border border-danger">
               <label class="text-danger">
                  Questo campo è visibile motivi didattici in realtà dovrebbe essere un <b>input[type=hidden]</b> <br> 
                  serve a inviare via POST, il valore dello <b>userId</b> dell'istanza di User da aggiornare sul database<br>
               </label>
               <label class="d-block text-bold">id dell'utente che sto modificando</label>-->
               <input type="hidden" name="userId" value="<?= $userId ?>" class="form-control">
             </div>

             <?php } ?>
             
             <button class="btn btn-primary mt-3" type="submit"><?= $submit ?></button>
        </form>
    </div>
    
</body>
</html>