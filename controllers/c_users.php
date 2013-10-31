<?php
class users_controller extends base_controller {

    public function __construct() {
        parent::__construct();

        // Prove to myself tha the __construct() function was called
        // echo "users_controller construct called<br><br>";
    }

    public function index() {

    }

    public function signup($error = NULL) {

        # Setup view
        $this->template->content = View::instance('v_users_signup');
        $this->template->title   = "Sign Up";

        # Pass data to the view
        $this->template->content->error = $error;

        # Render template
        echo $this->template;

    }

    public function p_signup() {

        # Validate that the user has entered a valid login name
        $at_sign = strpos($_POST['email'], '@');
        if($at_sign === false) {
            Router::redirect('/users/signup/1');
        }

        # if the email has already been created, then alert the person signing up
        $email = $_POST['email'];
        $q = "SELECT created FROM users WHERE email = '".$email."'";
        $emailexists = DB::instance(DB_NAME)->select_field($q);

        if(isset($emailexists)){
            Router::redirect('/users/signup/2');
        }

        if(strlen($_POST['first_name'])<1){
            Router::redirect('/users/signup/3');
        }

        if(strlen($_POST['password'])<6) {
            Router::redirect('/users/signup/4');
        }


        # Store time stamp data from user
        $_POST['created']  = Time::now();
        $_POST['modified'] = Time::now();

        # Encrypt the password
        $_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);

        # Create an encrypted token via their email address and a random string
        $_POST['token'] = sha1(TOKEN_SALT.$_POST['email'].Utils::generate_random_string());

        # Insert this user into the database
        $user_id = DB::instance(DB_NAME)->insert('users', $_POST);

        # For now, just confirm they've signed up -
        # You should eventually make a proper View for this
        # [TO DO!!!]
        //echo 'You\'re signed up';

        // Redirect to login page?
        Router::redirect('/users/login');

        // Dump the $_POST data to see what was submitted
        // print_r($_POST);

    }

    public function login($error = NULL) {

        # Setup view
        $this->template->content = View::instance('v_users_login');
        $this->template->title   = "Login";

        # Pass data to the view
        $this->template->content->error = $error;

        # Render template
        echo $this->template;
    }

    public function p_login() {

        # Sanitize the user entered data
        $_POST = DB::instance(DB_NAME)->sanitize($_POST);

        # Hash submitted password so we can compare it against one in the db
        $_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);

        # Search the db for this email and password
        # Retrieve the token if it's available

        $q = 'SELECT token
            FROM users
            WHERE email = "'.$_POST['email'].'"
            AND password = "'.$_POST['password'].'"';

        /*echo "q is <br>";
        echo $q;
        echo "<br>";*/

        $token = DB::instance(DB_NAME)->select_field($q);
        /*echo "Display the token <br>";
        echo $token;
        echo "<br><br>";*/

        # If we didn't find a matching token in the database, it means login failed
        if(!$token) {

            # Send them back to the login page
            Router::redirect("/users/login/1");

            # But if we did, login succeeded!
        } else {

            /*
            Store this token in a cookie using setcookie()
            */
            setcookie("token", $token, strtotime('+1 year'), '/', false);

            /*echo "LOGIN SUCCESSFUL <br />";
            echo "Display the token <br />";
            echo $_COOKIE["token"];*/

            //Debug
            /*echo "Cookie results";
            echo '<pre>';
            print_r($_COOKIE);
            echo '</pre>';*/

            # Send them to the main page - or wherever you want them to go
            Router::redirect('/');

        }

    }

    public function logout() {
        # Generate and save a new token for next login
        $new_token = sha1(TOKEN_SALT.$this->user->email.Utils::generate_random_string());

        # Create the data array we'll use with the update method
        # In this case, we're only updating one field, so our array only has one entry
        $data = Array("token" => $new_token);

        # Do the update
        DB::instance(DB_NAME)->update("users", $data, "WHERE token = '".$this->user->token."'");

        # Delete their token cookie by setting it to a date in the past - effectively logging them out
        setcookie("token", "", strtotime('-1 year'), '/');

        setcookie("just_logged_out", TRUE);

        # Send them back to the main index.
        Router::redirect("/");
    }

    public function profile($user_name = NULL) {

        # Create a new View instance
        # Do *not* include .php with the view name

        # Setup view
        $this->template->content = View::instance('v_users_profile');
        $this->template->title   = $this->user->first_name." ".$this->user->last_name;
        # $this->template->avatar = $this->user->avatar;

        # Render template
        echo $this->template;

    }

    public function p_upload($user_name = NULL) {

        echo "<pre>";
        print_r($_FILES);
        echo "<pre>";

        # Upload the image to the file structure
        Upload::upload($_FILES, "/uploads/avatars/", array("jpg", "jpeg", "gif", "png"), $this->user->user_id);

        //IS THIS WHERE I WOULD RESIZE THE IMAGE? HOW!!!
        AVATAR_PATH.$this->user->user_id.jpg->resize(200,200);
        #$this->image->resize(200,200);

        # array to update the user's avatar destination
        $data = Array("avatar" => $this->user->user_id.".jpg");

        # Update the users table with the user_id
        DB::instance(DB_NAME)->update_row("users", $data, "WHERE user_id = '".$this->user->user_id."'");
        Router::redirect('/users/profile');

    }

    public function display_image($avatar = NULL){

        // Because of autoloading, we don't have to include image
        //require(APP_PATH.'/libraries/Image.php');

        /*
        Instantiate an Image object using the "new" keyword
        Whatever params we use when instantiating are passed to __construct
        */
        $imageObj = new Image('/uploads/avatars/<?=$avatar?>');

        /*
        Call the resize method on this object using the object operator (single arrow ->)
        which is used to access methods and properties of an object
        */
        $imageObj->resize(100,210);

        # Display the resized image
        $imageObj->display();

    }

} # end of the class