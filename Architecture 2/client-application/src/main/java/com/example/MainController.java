package com.example;

import javafx.fxml.FXML;
import javafx.scene.control.Alert;
import javafx.scene.control.TextField;

public class MainController {
    @FXML
    private TextField usernameField;

    @FXML
    private TextField passwordField;

    @FXML
    private void handleLoginButtonAction() {
        String username = usernameField.getText();
        String password = passwordField.getText();

        try {
            UserAuth auth = UserAuthService.authenticate(username, password);
            if (auth != null) {
                showAlert(Alert.AlertType.INFORMATION, "Login Successful", "Welcome, " + auth.getUsername());
            } else {
                showAlert(Alert.AlertType.ERROR, "Login Failed", "Invalid credentials");
            }
        } catch (Exception e) {
            e.printStackTrace();
            showAlert(Alert.AlertType.ERROR, "Login Failed", "An error occurred while trying to authenticate");
        }
    }

    private void showAlert(Alert.AlertType alertType, String title, String message) {
        Alert alert = new Alert(alertType);
        alert.setTitle(title);
        alert.setContentText(message);
        alert.showAndWait();
    }
}
