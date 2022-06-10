<?php

/*
 * Function to redirect
 */

if (!function_exists("redirectTo")) {

    function redirectTo(string $url = null)
    {
        header('Location: ' . BASE_URL . $url);
        exit();
    }
}

/*
 * Function to set errors
 */

if (!function_exists("setError")) {

    function setError(string $message = null)
    {
        $_SESSION['errors'][] = $message;
    }
}

/*
 * Function to display errors
 */

if (!function_exists("displayErrors")) {

    function displayErrors()
    {
        if (!empty($_SESSION['errors'])) {
            foreach ($_SESSION['errors'] as $msg) {
                echo '<div class="alert alert-danger" role="alert">';
                echo $msg;
                echo '</div>';
            }
        }

        unset($_SESSION['errors']);
    }
}
