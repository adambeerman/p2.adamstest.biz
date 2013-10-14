<?php
class users_controller extends base_controller {

    public function __construct() {
        parent::__construct();
        echo "users_controller construct called<br><br>";
    }

    public function index() {
        echo "This is the index page";
    }

    public function signup() {
        echo "This is the signup page";
    }

    public function login() {
        echo "This is the login page";
    }

    public function logout() {
        echo "This is the logout page";
    }

    public function profile($user_name = NULL) {

        # Create a new View instance
        # Do *not* include .php with the view name
        $view = View::instance('v_users_profile');

        # Pass information to the view instance
        $view->user_name = $user_name;

        # Render View
        echo $view;
    }

} # end of the class