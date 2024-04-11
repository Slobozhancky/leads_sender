<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--    тег <base> потрібен для того, щоб ми могли звертатись до наших стилів, по абсолютному шляху, тобто від самого кореня проекту-->
    <!-- <base href="<?php echo APP_PATH ?>"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/style.css">
    <title><?= $title ?></title>
</head>

<body>
    <?php

    if (!empty($error)) {
        echo "<div class='alert alert-danger' role='alert'>
                    Помилка при додаванні ліда:  . {$error}
                </div>";
    }

    ?>
    <div class="container">

        <header>
            <nav aria-label="breadcrumb ">
                <ol class="breadcrumb py-3">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="leads">Leads</a></li>
                </ol>
            </nav>
        </header>