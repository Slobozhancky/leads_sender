<?php

function getStatuses()
{
    $apiUrl = 'https://crm.belmar.pro/api/v1/getstatuses';
    $token = 'ba67df6a-a17c-476f-8e95-bcdb75ed3958'; // Вкажіть ваш токен

    $data = [
        "date_from" => "2023-01-01 00:00:00", // Приклад дати з якої починати фільтрацію
        "date_to" => date("Y-m-d H:i:s"), // Поточна дата і час
        "page" => 0,
        "limit" => 10
    ];

    $ch = curl_init($apiUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'token: ' . $token,
        'Content-Type: application/json'
    ]);

    $response = curl_exec($ch);
    curl_close($ch);

    return json_decode($response, true);
}

$statuses = getStatuses();

$title = "Leads";
require_once VIEWS . "/leads.tpl.php";