<?php
require_once('functions.php');
$config = include('secrets.php');

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = mysqli_connect(
    $config['db_host'],
    $config['db_username'],
    $config['db_pass'],
    $config['db_database']
) or die("Error " . mysqli_error($mysqli));

global $mysqli;

if (!empty($_POST)) {

    $jsonResponse = array(
        'error' => '',
        'msg' => '',
    );

    $formData = array(
        'email' => formCheck($_POST['email']),
        'phone' => formCheck($_POST['phone']),
        'player1_cezarid' => formCheck($_POST['player1_cezarid']),
        'player1_name' => formCheck($_POST['player1_name']),
        'player1_surname' => formCheck($_POST['player1_surname']),
        'player1_club' => formCheck($_POST['player1_club']),
        'player1_food_vege' => formCheck($_POST['player1_food_vege']),
        'player1_food_breakfast' => formCheck($_POST['player1_food_breakfast']),
        'player1_food_dinner' => formCheck($_POST['player1_food_dinner']),
        'player1_food_supper' => formCheck($_POST['player1_food_supper']),
        'player2_cezarid' => formCheck($_POST['player2_cezarid']),
        'player2_name' => formCheck($_POST['player2_name']),
        'player2_surname' => formCheck($_POST['player2_surname']),
        'player2_club' => formCheck($_POST['player2_club']),
        'player2_food_vege' => formCheck($_POST['player2_food_vege']),
        'player2_food_breakfast' => formCheck($_POST['player2_food_breakfast']),
        'player2_food_dinner' => formCheck($_POST['player2_food_dinner']),
        'player2_food_supper' => formCheck($_POST['player2_food_supper']),
        'hotel' => formCheck($_POST['hotel']),
        'hotel_room_type' => formCheck($_POST['hotel_room_type']),
        'restaurant' => formCheck($_POST['restaurant']),
        'parking' => formCheck($_POST['parking']),
        'information' => formCheck($_POST['information']),
    );

    // Check if option had been selected.
    if ($formData['player1_food_vege'] != NULL) {
        $formData['player1_food_vege'] = 1;
    };
    if ($formData['player2_food_vege'] != NULL) {
        $formData['player2_food_vege'] = 1;
    };


    $columns = implode(", ", array_keys($formData));
    $func = function ($value) {
        global $mysqli;
        return mysqli_real_escape_string($mysqli, $value);
    };
    $escaped_values = array_map($func, array_values($formData));
    $values = implode("','", $escaped_values);
    $values = "'$values'";
    $values = str_replace("''", 'NULL', $values);
    $sql = "INSERT INTO ($config['db_database']) ($columns) VALUES ($values)";

    $result = mysqli_query($mysqli, $sql);
    /*
    if ($result == true) {
        $jsonResponse['msg'] = 'Dziękujemy za rejestrację.';
    } else {
        $jsonResponse['msg'] = 'Wystąpił problem w trakcie zapisywania wniosku.';
    }

    echo json_encode($jsonResponse);

*/

?>
    <!DOCTYPE html>
    <html lang="pl">

    <head>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Formularz rejestracyjny - Memoriał im. Krzysztofa Krausego - Grand Prix Wielkopolski 2022</title>
    </head>

    <body>
        <div class="container">
            <div class="row text-center align-middle mx-auto">
                <h1 class="text-center mx-auto">Dziękujemy za rejestrację</h1>
            </div>
            <div class="row">
                <a class="rounded mx-auto d-block" href="/"><img class="rounded mx-auto d-block" src="/assets/baner.6252a309.jpg" /></a>
            </div>
        </div>
    </body>

    </html>
<?php

}

if (!empty($_GET)) {
    $pid = intval($_GET["pid"]);
    if ($pid > 0) {

        $sql = "SELECT PID, IMIE, NAZWISKO, KLUB FROM `cezar` WHERE PID=$pid";
        $result = mysqli_query($mysqli, $sql) or die("Error getting Cezar data" . mysqli_error($mysqli));

        $emparray = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $emparray[] = $row;
        }
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($emparray[0]);
    }
}

mysqli_close($mysqli);
