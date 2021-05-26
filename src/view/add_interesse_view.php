<?php include './src/view/head.php' ?> 
<?php include './src/view/header.php' ?>
<?php include './src/view/user_log_view.php'?>

<div class="container">
<form class="mt-4" action="<?= $action ?>" method="POST">
            <div class="form-group">
               <label for="">Interesse</label>
               
               <input value="<?= $nome ?>" 
                      class="form-control <?= $nomeClass ?>"  
                      name="nome"  
                      type="text">

               <div class="<?= $nomeClassMessage ?>">
                  <?= $nomeMessage ?>
               </div> 

               <?php if(isset($interesseId)) { ?>
              
               <input type="hidden" name="interesseId" value="<?= $interesseId ?>" class="form-control">
               </input>

                <?php } ?>

                <button class="btn btn-success mt-3" type="submit"><?= $submit ?></button>
                
            </div>



</div>
