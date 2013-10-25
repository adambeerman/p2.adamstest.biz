<?php

class posts_controller extends base_controller {

    public function __construct() {
        parent::__construct();

        // Prove to myself tha the __construct() function was called
        // echo "users_controller construct called<br><br>";

        # Make sure user is logged in if they want to use anything in this controller
        if(!$this->user) {
            die("Members only. <a href='/users/login'>Login</a>");
        }
    }

    public function index() {

        # Set up the View
        $this->template->content = View::instance('v_posts_index');
        $this->template->title   = "Posts";

        # Build the query
        $q = "SELECT
              posts.* ,
              users.first_name,
              users.last_name
            FROM posts
            INNER JOIN users ON posts.user_id = users.user_id
            ORDER BY modified DESC";

        # Run the query
        $posts = DB::instance(DB_NAME)->select_rows($q);

        # Pass data to the View
        $this->template->content->posts = $posts;

        # Render the View
        echo $this->template;

    }

    public function add() {

        # Setup view
        $this->template->content = View::instance('v_posts_add');
        $this->template->title   = "New Post";

        # Render template
        echo $this->template;

    }

    public function p_add() {

        # Associate this post with this user
        $_POST['user_id']  = $this->user->user_id;

        # Unix timestamp of when this post was created / modified
        $_POST['created']  = Time::now();
        $_POST['modified'] = Time::now();

        # Insert
        # Note we didn't have to sanitize any of the $_POST data because we're using the insert method which does it for us
        DB::instance(DB_NAME)->insert('posts', $_POST);

        # Send user to their list of personal posts
        Router::redirect('/posts/personal');

    }

    public function personal() {

        ## Display only posts that match the current user

        # Same structure as the view of all posts
        # Set up the View
        $this->template->content = View::instance('v_posts_index');
        $this->template->title   = "Your Posts";

        # Build the query (NEED TO IMPROVE THIS QUERY!)
        $q = "SELECT posts.*
                FROM posts
                WHERE user_id = ".$this->user->user_id.
                " ORDER BY modified DESC";

        # Run the query
        $posts = DB::instance(DB_NAME)->select_rows($q);

        # Pass data to the View
        $this->template->content->posts = $posts;

        # Render the View
        echo $this->template;
    }

    public function edit() {


    }

    public function delete_post(){

    }

    public function users(){

        ## Display a list of users who we can follow and unfollow

        # Same structure as the view of all posts
        # Set up the View
        $this->template->content = View::instance("v_posts_users");
        $this->template->title   = "Users";

        # Generate query of all users
        $q = "SELECT *
                FROM users";

        $users = DB::instance(DB_NAME)->select_rows($q);

        #Pass users to the views


        # Generate query of all the relationships
        # ... where the current user is the follower
        $q = "SELECT *
            FROM users_users
            WHERE user_id = ".$this->user->user_id;

        # Establish the "relationships" variable, indexed to user_id_followed
        $connections = DB::instance(DB_NAME)->select_array($q,'user_id_followed');

        # Pass users and relationships to the views
        $this->template->content->users         = $users;
        $this->template->content->connections   = $connections;

        # Render the view
        echo $this->template;
    }

    public function follow($user_id_followed) {



    }

    public function unfollow($user_id_followed) {

    }
}