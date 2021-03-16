<?php

function addClient($pdo, $name, $email, $cd, $tel, $password, $genre) {

    $queryInsert = "INSERT INTO clients(nom_client, email_client, postal_code, phone_number, password_client, genre_client, role_client) VALUES (:nom_client,:email_client,:postal_code,:phone_number,:password_client,:genre_client,:role_client)";

        $reqPrep = $pdo->prepare($queryInsert);
        $reqPrep->execute(
            [
                'nom_client' => $name,
                'email_client' => $email,
                'postal_code' => $cd,
                'phone_number' => $tel,
                'password_client' => $password,
                'genre_client' => $genre,
                'role_client' => 0
            ]
        );
};


function checkFlashMessage() {

    if(isset($_SESSION['flash_message']) && !empty($_SESSION['flash_message'])) {
        echo $_SESSION['flash_message'];
        $_SESSION['flash_message'] = "";
        }
};

function checkEmail($email, $pdo) : bool {

    $result = $pdo->prepare("SELECT * FROM clients WHERE email_client = ?");

    $result->execute([$email]);

    $user = $result->fetch();

    if($user) {
        return true;
    }
    return false;
};

function redirectRole() {

    if(isset($_SESSION['role']) && !empty($_SESSION['role'])) {
        
        if($_SESSION['role'] == 1) {
         header("location: admin.php");
        } else {
         header("location: profil.php");
        }
        header("location: index.php");
    }
}