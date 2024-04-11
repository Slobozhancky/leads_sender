<?php

// Перевірка, чи були надіслані дані методом POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Отримання та перевірка введених даних
    $errors = [];

    $firstName = isset($_POST["firstName"]) ? trim($_POST["firstName"]) : "";
    $lastName = isset($_POST["lastName"]) ? trim($_POST["lastName"]) : "";
    $phone = isset($_POST["phone"]) ? trim($_POST["phone"]) : "";
    $email = isset($_POST["email"]) ? trim($_POST["email"]) : "";
    $landingUrl = isset($_POST["landingUrl"]) ? trim($_POST["landingUrl"]) : "";
    $ip = isset($_POST["ip"]) ? trim($_POST["ip"]) : "";

    // Перевірка обов'язкових полів
    if (empty($firstName) || empty($lastName) || empty($phone) || empty($email) || empty($landingUrl) || empty($ip)) {
        $errors[] = "Всі поля повинні бути заповнені";
    }

    // Якщо є помилки, вивести їх та припинити виконання скрипта
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
        exit;
    }

    // Дані для відправлення на сервер
    $data = [
        "firstName" => $firstName,
        "lastName" => $lastName,
        "phone" => $phone,
        "email" => $email,
        "countryCode" => "GB",
        "box_id" => 28,
        "offer_id" => 5,
        "landingUrl" => $landingUrl,
        "ip" => $ip
    ];



    // Відправлення даних на сервер за допомогою cURL
    // $url = "https://crm.belmar.pro/api/v1/addlead";
    // $token = "ba67df6a-a17c-476f-8e95-bcdb75ed3958";

    // $ch = curl_init($url);
    // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    // curl_setopt($ch, CURLOPT_POST, true);
    // curl_setopt($ch, CURLOPT_HTTPHEADER, ["token: $token", "Content-Type: application/json"]);
    // curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    // $response = curl_exec($ch);

    // // Перевірка відповіді від сервера
    // if ($response === false) {
    //     echo "Помилка виконання запиту: " . curl_error($ch);
    // } else {
    //     $responseData = json_decode($response, true);
    //     if (isset($responseData["status"]) && $responseData["status"] === true) {
    //         echo "Лід успішно додано. ID: " . $responseData["id"];
    //     } else {
    //         echo "Помилка при додаванні ліда: " . $responseData["error"];
    //     }
    // }

    // // Завершення cURL-сеансу
    // curl_close($ch);
}

?>