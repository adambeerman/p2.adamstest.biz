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

    public function practice() {

        echo APP_PATH.AVATAR_PATH;
        echo "<br>";
        echo AVATAR_PATH.$this->user->avatar;
        echo "<br>";
        echo $this->user->avatar;
        echo "<br>";

        echo APP_PATH."uploads/avatars/".$this->user->user_id.".jpg";
        echo "<br>";
        $imgObj = new Image(APP_PATH."uploads/avatars/".$this->user->user_id."jpg");
        $imgObj ->resize(200,200);
        echo $imgObj ->exists(TRUE);
        echo "<img src = '".$imgObj."'>";


        /*
        $imgObj = new Image(APP_PATH.AVATAR_PATH.jpg');
        $imgObj->resize(200, 200);
        echo "<img src = '".$imgObj."'>";*/
    }

    public function practice2() {
        #$avatar = new Image(APP_PATH."uploads/avatars/$this->user->avatar");

        echo APP_PATH.$this->user->avatar;
        $this->image = open_image(APP_PATH.$this->user->avatar);
        echo $this->image;

        echo "<br>";
        echo APP_PATH.$this->user->avatar;
        echo "<br>";
        echo realpath(dirname(__FILE__));

        $imgObj = new Image('Users/adam/Sites/p2.adamstest.biz/uploads/avatars/beatrix.jpg');
        $imgObj = resize(200,200);
        #echo $avatar;

        echo "<br> TEST COMPLETE";
        #$avatar->resize(200,200);
    }

}