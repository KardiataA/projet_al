<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $json = file_get_contents('../backend/data/users.json');
    $users = json_decode($json, true);

    $authenticated = false;
    foreach ($users as $user) {
        if ($user['email'] === $email && $user['password'] === $password) {
            $_SESSION['user'] = $user;
            $authenticated = true;
            break;
        }
    }

    if ($authenticated) {
        header('Location: dashboard.php');
        exit();
    } else {
        $_SESSION['message'] = "Identifiants incorrects. Veuillez réessayer.";
        header('Location: login.php');
        exit();
    }
} else {
    header('Location: login.php');
    exit();
}
?>
