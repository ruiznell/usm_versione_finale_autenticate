<?php
require './__autoload.php';
use sarassoroberto\usm\config\local\AppConfig;
use sarassoroberto\usm\model\DB;

$conn = DB::serverConnectionWithoutDatabase();
$dbname = AppConfig::DB_NAME;

$sql1 = "DROP DATABASE if exists $dbname;
        CREATE database if not exists $dbname; 
        use $dbname;


 
        CREATE table if not exists Interesse (
        interesseId int(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
        nome varchar(255) NOT NULL
        )";

$conn->exec($sql1);


$sqlToInsertInteresseQuery1 = "INSERT INTO Interesse (interesseId, nome) VALUES (1, 'Nessuno');
                        INSERT INTO Interesse (interesseId, nome) VALUES (2, 'Leggere');
                        INSERT INTO Interesse (interesseId, nome) VALUES (3, 'Cinema');
                        INSERT INTO Interesse (interesseId, nome) VALUES (4, 'Cucina');
                        INSERT INTO Interesse (interesseId, nome) VALUES (5, 'Sport');
                        INSERT INTO Interesse (interesseId, nome) VALUES (6, 'Ballo');";

$conn->exec($sqlToInsertInteresseQuery1);

$sql2 = "use $dbname;

        CREATE table if not exists User (
            userId int(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
            firstName varchar(255) NOT NULL,
            lastName varchar(255)  NOT NULL,
            email varchar(255) NOT NULL,
            birthday DATE,
            password varchar(255) NOT NULL,
            CONSTRAINT UC_User UNIQUE (email)
        )";



$conn->exec($sql2);



$sqlToInsertUserQuery2 = "INSERT INTO User (userId, firstName, lastName, email, birthday, password) VALUES (1, 'Adamo', 'ROSSI', 'adamo.rossi@email.com', '2002-06-12', 'password');
                            INSERT INTO User (userId, firstName, lastName, email, birthday, password) VALUES (2, 'Mario', 'FERRARI', 'mario.ferrari@email.com', '2001-06-12', 'password');
                            INSERT INTO User (userId, firstName, lastName, email, birthday, password) VALUES (3, 'Luigi', 'RUSSO', 'luigi.russo@email.com', '2007-08-06', 'password');
                            INSERT INTO User (userId, firstName, lastName, email, birthday, password) VALUES (4, 'Achille', 'BIANCHI', 'achille.bianchi@email.com', '2006-03-14', 'password');
                            INSERT INTO User (userId, firstName, lastName, email, birthday, password) VALUES (5, 'Adriano', 'ROMANO', 'adriano.romano@email.com', '2005-01-16', 'password');
                            INSERT INTO User (userId, firstName, lastName, email, birthday, password) VALUES (6, 'Gianni', 'ROSSI', 'gianni.rossi@email.com', '2005-04-22', 'password');
                            INSERT INTO User (userId, firstName, lastName, email, birthday, password) VALUES (7, 'Giuliano', 'FERRARI', 'giuliano.ferrari@email.com', '2007-07-16', 'password');
                            INSERT INTO User (userId, firstName, lastName, email, birthday, password) VALUES (8, 'Giusto', 'RUSSO', 'giusto.russo@email.com', '2001-03-28', 'password');
                            INSERT INTO User (userId, firstName, lastName, email, birthday, password) VALUES (9, 'Livio', 'BIANCHI', 'livio.bianchi@email.com', '2003-01-19', 'password');
                            INSERT INTO User (userId, firstName, lastName, email, birthday, password) VALUES (10, 'Paolo', 'ROMANO', 'paolo.romano@email.com', '2001-09-28', 'password');
                            INSERT INTO User (userId, firstName, lastName, email, birthday, password) VALUES (11, 'Onorato', 'ROSSI', 'onorato.rossi@email.com', '2005-06-29', 'password');
                            INSERT INTO User (userId, firstName, lastName, email, birthday, password) VALUES (12, 'Silvio', 'FERRARI', 'silvio.ferrari@email.com', '2005-04-11', 'password');
                            INSERT INTO User (userId, firstName, lastName, email, birthday, password) VALUES (13, 'Tancredi', 'RUSSO', 'tancredi.russo@email.com', '2000-07-30', 'password');
                            INSERT INTO User (userId, firstName, lastName, email, birthday, password) VALUES (14, 'Valter', 'BIANCHI', 'valter.bianchi@email.com', '2000-06-10', 'password');
                            INSERT INTO User (userId, firstName, lastName, email, birthday, password) VALUES (15, 'Zeno', 'ROMANO', 'zeno.romano@email.com', '2001-07-21', 'password');
                            INSERT INTO User (userId, firstName, lastName, email, birthday, password) VALUES (16, 'Adamo', 'ROSSI', 'a.rossi@email.com', '2007-07-18', 'password');
                            INSERT INTO User (userId, firstName, lastName, email, birthday, password) VALUES (17, 'Mario', 'FERRARI', 'm.ferrari@email.com', '2000-08-15', 'password');
                            INSERT INTO User (userId, firstName, lastName, email, birthday, password) VALUES (18, 'Luigi', 'RUSSO', 'l.russo@email.com', '2003-10-15', 'password');
                            INSERT INTO User (userId, firstName, lastName, email, birthday, password) VALUES (19, 'Achille', 'BIANCHI', 'a.bianchi@email.com', '2000-05-08', 'password');
                            INSERT INTO User (userId, firstName, lastName, email, birthday, password) VALUES (20, 'Adriano', 'ROMANO', 'a.romano@email.com', '2007-04-23', 'password');"; 


$conn->exec($sqlToInsertUserQuery1);

$sql2 = "use $dbname;
        CREATE table if not exists Interesse (
            interesseId int(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
            nome varchar(255) NOT NULL
        )";

$conn->exec($sql2);


$sqlToInsertInteresseQuery2 = "INSERT INTO Interesse (interesseId, nome) VALUES (1, 'Nessuno');
                        INSERT INTO Interesse (interesseId, nome) VALUES (2, 'Leggere');
                        INSERT INTO Interesse (interesseId, nome) VALUES (3, 'Cinema');
                        INSERT INTO Interesse (interesseId, nome) VALUES (4, 'Cucina');
                        INSERT INTO Interesse (interesseId, nome) VALUES (5, 'Sport');
                        INSERT INTO Interesse (interesseId, nome) VALUES (6, 'Ballo');";

$conn->exec($sqlToInsertInteresseQuery2);

$sql3 = "use $dbname;
        CREATE table if not exists User_Interesse (
            userId int(10) NOT NULL,
            interesseId int(10) NOT NULL,
            FOREIGN KEY (userId) REFERENCES User(userId),
            FOREIGN KEY (interesseId) REFERENCES Interesse(interesseId),
            CONSTRAINT UC_User_Interesse UNIQUE (userId,interesseId)

        )";


$conn->exec($sql3);


