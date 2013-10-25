<?php
/**
 * Created by JetBrains PhpStorm.
 * User: adam
 * Date: 10/20/13
 * Time: 11:10 AM
 * To change this template use File | Settings | File Templates.
 */

class practice_controller extends base_controller {

    public function __construct() {
        parent::__construct();

        // Prove to myself tha the __construct() function was called
        // echo "users_controller construct called<br><br>";
    }

    public function practice($testword = NULL) {
        echo strtoupper($testword);

    }
}