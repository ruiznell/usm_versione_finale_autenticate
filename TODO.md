
  # Validazione TASK-1
  - [ ] completare la validazione del **User**
      - [ ] lastName
      - [ ] email 
      - [ ] valore predefinito per la data   
  
  # Model TASK-2
  - [ ] Finire il Model
    - a.[x] **UserModel::readAll()** (elenco di tutti gli utenti)

  > FIX: argomenti di User nel costruttore
  > too few arguments to function sarassoroberto\usm\entity\User::__construct(), 0 passed and exactly 4 expected 
  > UserModel.php on line 49
  > TO FIXED SEE: https://phpdelusions.net/pdo/objects#parameters

    $result = $stm->fetchAll(PDO::FETCH_CLASS,User::class); // UserFactory
      NOTA: 
    - [x] **User::delete($user_id)** (cancellazione di un utente)

  > NOTE: Come faccio a sapere se ho veramente cancellato qualcosa ?
  > https://www.php.net/manual/en/pdostatement.rowcount.php

    - [x] **UserModel::readOne($user_id)** (dati di un solo utente) 
  
  > FIX: argomenti di User nel costruttore (vedi sopra)
  
    - [ ] **User::update(User $user)** update (modifica)

 # Pagina con elenco utenti TASK-3
  PAGINE (controller)
  - a.[x] Elenco degli utenti **list_user.php**
  
  
  
  
  --------------------------------------------------
  
  qualcuno a premuto aggiungi
     - [ ] creo un istanza User
     - [ ] Effettuo la validazione è sanificazione dei valori dell'istanza di User
     - [ ] se tutto è ok salvo l'utente --> si va a una pagina di conferma
                 [ ] Istanza del model uso il metodo create 
     - [ ] se non è tutto ok rimango sul form e segnalo gli errori

     per ogni errore / campo
     *firstName "Mario" *lastName vuoto
     rimango nel form
     *firstName "MArio" *lasName 
      Risultato della validazione
                           - messaggio "campo obbligatorio"
      isValid = true       - isValid = false 
                           - code
      valore 
      ''
      "Mario"              - ''


      -----------------------------------------------------------------------
      - Aggiungere la paswoord
        - [ ] Aggiungere attributo password nel database
        - [ ] Aggiungere campo password nel form
        - [ ] Aggiungere proprietà password alla classe User 

        - Impostare la mail come chiave unica nella tabella degli utenti 
        - how to set unique key in mysql

      
      <!--- Quando crei un nuovo utente si cripta la password-->

      - [ ] Implementare la schermata di logIn
         - [ ]  
         - [ ] **login_user.php** controller
         - [ ] form dove inserisco email/username e password
         - [ ] Implementare nello userModel il metodo autenticate() **UserModel::autenticate($username,     $password):?User** (esto significa que restituye null o utente)
         - [ ] Se l'utente esiste accedo allìelenco degli utenti

