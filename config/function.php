<?php

function addClient($pdo, $name, $email, $cd, $tel, $password, $genre) {

    $queryInsert = "INSERT INTO clients(nom_client, email_client, postal_code, phone_number, password_client, genre_client) VALUES (:nom_client,:email_client,:postal_code,:phone_number,:password_client,:genre_client)";

        $reqPrep = $pdo->prepare($queryInsert);
        $reqPrep->execute(
            [
                'nom_client' => $name,
                'email_client' => $email,
                'postal_code' => $cd,
                'phone_number' => $tel,
                'password_client' => $password,
                'genre_client' => $genre
            ]
        );
};
