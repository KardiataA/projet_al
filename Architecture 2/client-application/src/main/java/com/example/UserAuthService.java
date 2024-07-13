package com.example;

public class UserAuthService {
    public static UserAuth authenticate(String username, String password) {
        // Exemple fictif, remplacer par un appel réel au service web
        if ("admin".equals(username) && "password".equals(password)) {
            return new UserAuth(username);
        }
        return null;
    }
}
