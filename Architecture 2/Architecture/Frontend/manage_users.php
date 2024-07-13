<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Gérer les utilisateurs - Site d'actualité</title>
</head>
<body>
    <header>
        <h1>Gérer les utilisateurs</h1>
    </header>
    <main>
        <?php
        session_start();
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
            header('Location: login.php');
            exit();
        }

        $json = file_get_contents('../backend/data/users.json');
        $users = json_decode($json, true);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $role = $_POST['role'];

            $new_user = [
                'name' => $name,
                'email' => $email,
                'password' => $password,
                'role' => $role,
            ];

            $users[] = $new_user;
            file_put_contents('../backend/data/users.json', json_encode($users));
            header('Location: manage_users.php');
            exit();
        }

        if (isset($_GET['delete'])) {
            $email = $_GET['delete'];
            $users = array_filter($users, function($user) use ($email) {
                return $user['email'] != $email;
            });
            file_put_contents('../backend/data/users.json', json_encode($users));
            header('Location: manage_users.php');
            exit();
        }

        echo "<h2>Utilisateurs</h2>";
        echo "<ul>";
        foreach ($users as $user) {
            echo "<li>{$user['name']} ({$user['role']}) - <a href='manage_users.php?delete={$user['email']}' class='button delete'>Supprimer</a></li>";
        }
        echo "</ul>";
        ?>
        <h2>Ajouter un nouvel utilisateur</h2>
        <form action="manage_users.php" method="POST">
            <label for="name">Nom</label>
            <input type="text" id="name" name="name" required>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
            <label for="password">Mot de passe</label>
            <input type="password" id="password" name="password" required>
            <label for="role">Rôle</label>
            <select id="role" name="role" required>
                <option value="visitor">Visiteur</option>
                <option value="editor">Éditeur</option>
                <option value="admin">Administrateur</option>
            </select>
            <button type="submit" class="button">Ajouter</button>
        </form>
        <a href="dashboard.php" class="button">Retour au tableau de bord</a>
    </main>
    <footer>
        <p>&copy; 2024 Site d'actualité</p>
    </footer>
    <script src="js/script.js"></script>
</body>
</html>
