<?php

$connect = mysqli_connect("localhost", "root", "", "db-leads");

function aboard($code = 404): void
{
    http_response_code($code);
    require_once VIEWS . "/errors/{$code}.tpl.php";
    die();
}

function addlead()
{
    $errors = '';

    $firstName = isset($_POST["firstName"]) ? trim($_POST["firstName"]) : "";
    $lastName = isset($_POST["lastName"]) ? trim($_POST["lastName"]) : "";
    $phone = isset($_POST["phone"]) ? trim($_POST["phone"]) : "";
    $email = isset($_POST["email"]) ? trim($_POST["email"]) : "";
    $landingUrl = $_SERVER['HTTP_REFERER'];
    $ip = $_SERVER['REMOTE_ADDR'];

    if (empty($firstName) || empty($lastName) || empty($phone) || empty($email) || empty($landingUrl) || empty($ip)) {
        $errors = "Потрібно заповнити всі поля";
    }

    if (!empty($errors)) {
        $_SESSION["error"] = $errors;
        header('Location: /');
        exit;
    }

    $data = [
        "firstName" => $firstName,
        "lastName" => $lastName,
        "phone" => $phone,
        "email" => $email,
        "countryCode" => "GB",
        "language" => "en",
        "password" => "qwerty12",
        "box_id" => 28,
        "offer_id" => 5,
        "landingUrl" => $landingUrl,
        "ip" => $ip
    ];

    $url = "https://crm.belmar.pro/api/v1/addlead";
    $token = "ba67df6a-a17c-476f-8e95-bcdb75ed3958";

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ["token: $token", "Content-Type: application/json"]);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    $response = curl_exec($ch);

    if ($response === false) {
        echo "Помилка виконання запиту: " . curl_error($ch);
    } else {
        $responseData = json_decode($response, true);
        if (isset($responseData["status"]) && $responseData["status"] === true) {

            echo "<div class='alert alert-primary' role='alert'>
                    Лід успішно додано. ID:  . {$responseData['id']}
                </div>";
        } else {
            echo "<div class='alert alert-danger' role='alert'>
                    Помилка при додаванні ліда:  . {$responseData["error"]}
                </div>";
        }
    }

    curl_close($ch);
}