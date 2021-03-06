<?php

namespace sarassoroberto\usm\validator;
use sarassoroberto\usm\entity\User;

class UserValidation {

    public const FIRST_NAME_ERROR_NONE_MSG = 'Il nome è ggiusto !!';
    public const FIRST_NAME_ERROR_REQUIRED_MSG = 'Il nome è obbligatorio';

    public const LAST_NAME_ERROR_NONE_MSG = 'Il cognome è ggiusto !!';
    public const LAST_NAME_ERROR_REQUIRED_MSG = 'Il cognome è obbligatorio';

    public const BIRTHDAY_ERROR_NONE_MSG = 'data corretta';
    public const BIRTHDAY_NONE_MSG = '';
    public const BIRTHDAY_ERROR_MSG = 'Data posteriore alla data corrente';
    
    public const EMAIL_ERROR_NONE_MSG = 'La mail è corretta';
    public const EMAIL_ERROR_REQUIRED_MSG = 'La mail è obbligatoria';
    public const EMAIL_ERROR_FORMAT_MSG = 'Scrivi una mail valida';

    public const PASSWORD_ERROR_REQUIRED_MSG = 'La password è obbligatoria';
    public const PASSWORD_ERROR_NONE_MSG = '';

    private $user;
    private $errors = [] ;// Array<ValidationResult>;
    private $isValid = true;

    public $firstNameResult;

    public function __construct(User $user) {
        $this->user = $user;
        $this->validate();
    }

    private function validate()
    {   
        //$this->firstNameResult =  $this->validateFirstName();
        $this->errors['firstName']  = $this->validateFirstName();
        $this->errors['lastName']  = $this->validateLastName();
        $this->errors['email']  = $this->validateEmail();
        $this->errors['birthday']  = $this->validateBirthday();
        $this->errors['password']  = $this->validatePassword();

    }

    public function getIsValid(){
        $this->isValid = true;
        foreach ($this->errors as $validationResult) {
            $this->isValid = $this->isValid && $validationResult->getIsValid();
        }
        return $this->isValid;
    }

    private function validateFirstName():?ValidationResult
    {
        $firstName = trim($this->user->getFirstName());

        if(empty($firstName)){
            $validationResult = new ValidationResult(self::FIRST_NAME_ERROR_REQUIRED_MSG,false,$firstName);
        } else {
            $validationResult = new ValidationResult(self::FIRST_NAME_ERROR_NONE_MSG,true,$firstName);
        };
        return $validationResult;
    }

    private function validateLastName():?ValidationResult
    {
        $lastName = trim($this->user->getLastName());

        if(empty($lastName)){
            $validationResult = new ValidationResult(self::LAST_NAME_ERROR_REQUIRED_MSG,false,$lastName);
        } else {
            $validationResult = new ValidationResult(self::LAST_NAME_ERROR_NONE_MSG,true,$lastName);
        };
        return $validationResult;
    }

    private function validateBirthday():?ValidationResult
    {
        $date = trim($this->user->getBirthday());
        if(empty($date)){
            // la mail non è obbligatoria quindi se è vuota restituico un messaggio positivo
            return new ValidationResult(self::BIRTHDAY_NONE_MSG, true, NULL);
        }else{
            if($this->validateDate($date)){
                return new ValidationResult(self::BIRTHDAY_ERROR_NONE_MSG, true, $date);
            }else{
                return new ValidationResult(self::BIRTHDAY_ERROR_FORMAT_MSG, true, $date);
            }
        }
     
    }


    private function validateEmail():?ValidationResult
    {
        
        
        $email = trim($this->user->getEmail());
        if(empty($email)){
            $validationResult = new ValidationResult(self::EMAIL_ERROR_REQUIRED_MSG,false,$email);

        }else if (true != filter_var($this->user->getEmail(),FILTER_VALIDATE_EMAIL)) {
            $validationResult = new ValidationResult(self::EMAIL_ERROR_FORMAT_MSG,false,$email);
        
        } else {
            $validationResult = new ValidationResult(self::EMAIL_ERROR_NONE_MSG,true,$email);
        };
        return $validationResult;
    }

    private function validatePassword():?ValidationResult
    {
        $password = trim($this->user->getPassword());

        if(empty($password)){
            $validationResult = new ValidationResult(self::PASSWORD_ERROR_REQUIRED_MSG,false,$password);
        } else {
            $validationResult = new ValidationResult(self::PASSWORD_ERROR_NONE_MSG,true,$password);
        };
        return $validationResult;
    }

    /**
     *  foreach($userValidation->getErrors() as $error ){
     *   echo "<li</li>"
     *  }
     * 
     */
    public function getErrors()
    {
        return $this->errors; 
    }

    /**
     * $userValidation->getError('lastName');
     * @var ValidationResult $errorKey Chiave associativa che contiene un ValidationResult corrispondente
     */
    public function getError($errorKey)
    {
        return $this->errors[$errorKey];
    }


    public function validateDate($date, $format = 'Y-m-d')
    {
        // fonte https://stackoverflow.com/questions/19271381/correctly-determine-if-date-string-is-a-valid-date-in-that-format/19271434

        $d = \DateTime::createFromFormat($format, $date);
        // The Y ( 4 digits year ) returns TRUE for any integer with any number of digits so changing the comparison from == to === fixes the issue.
        return ($d && $d->format($format) === $date);
    }
}