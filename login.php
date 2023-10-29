<?php
$dsn = 'mysql:dbname=Login_test;host=127.0.0.1';
$user = 'admin';
$password = 'admin4321';

$sql = 'SELECT email, username
FROM utenti
WHERE id = :id';

try{
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sth = $pdo->prepare($sql);

    $sth->bindValue(':id', 2, PDO::PARAM_INT);
    $sth->execute();
    $result = $sth->fetchAll();
    $username = $result[0][1];
    $email = $result[0][0];

    //var_dump($result);
    printf("l'email associata all'utente %s è: %s", $username, $email);

} catch (PDOException $e){
    printf("Connessione fallita: %s\n", $e->getMessage());
    exit(1);
}



