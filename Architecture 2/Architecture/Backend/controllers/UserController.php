<?php
class UserController {
    private $usersFile = '../data/users.json';

    public function authenticate($email, $password) {
        $users = json_decode(file_get_contents($this->usersFile), true);
        foreach ($users as $user) {
            if ($user['email'] == $email && $user['password'] == $password) {
                return $user;
            }
        }
        return null;
    }
}
?>
