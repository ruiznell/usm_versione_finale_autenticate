<?php 
//use sarassoroberto\usm\entity\User;
use sarassoroberto\usm\model\UserModel;
use sarassoroberto\usm\validator\bootstrap\ValidationFormHelper;
//use sarassoroberto\usm\validator\UserValidation;

require "./__autoload.php";

/** $action rappresenta l'indirizzo a cui verranno inviati i dati del form */

session_start();

$title = "Login";
$action = './login_user.php';
$submit = 'Accedi';

if($_SERVER['REQUEST_METHOD']==='GET'){
    
    /** Il form viene compilato "vuoto" */
   
    list($email,$loginClass,$loginClassMessage,$loginMessage) = ValidationFormHelper::getDefault();
   
    list($password,$loginClass,$loginClassMessage,$loginMessage) = ValidationFormHelper::getDefault();   
}

if ($_SERVER['REQUEST_METHOD']==='POST') {

    $email = $_POST['email'];
    $password = $_POST['password'];
    $userModel = new UserModel();
    $isValid = $userModel->autenticate($email, $password);

    
    if ($isValid) {
        $_SESSION['isLoged'] = true;
       

        $_SESSION['username'] = $email;
        header('location: ./list_users.php');
    }else{
        $loginClass = "is-invalid";
        $loginClassMessage="invalid-feedback";
        $loginMessage = "Email o Password errata.";
    }
   
}

include 'src/view/login_user_view.php';
?>
