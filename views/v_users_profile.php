<?php if(isset($user)): ?>
    <?=$user->first_name?>'s Profile
<?php else: ?>
    <h1>No user specified</h1>
<? endif; ?>

<br>
<div style = "width: 200px; height: 200px">


    <?php
        // Want to display the 'example.gif' profile photo if nothing is uploaded
        #$profilePhoto = open_image(APP_PATH.$user->avatar);

        /*$im = open_image($user->avatar);

        // Set the content type header - in this case image/jpeg
        header('Content-Type: image/gif');

        // Output the image
        imagegif($im);

        // Free up memory
        imagedestroy($im);*/

        echo "<img src = '".$user->avatar."'>";

    ?>
</div>

    <!-- Allow user to upload a new photo if they do not want the default -->

    <form method='POST' enctype="multipart/form-data" action='/users/p_upload/'>

        <input type='file' name='avatar' placeholder="Change?">
        <br>
        <input type='submit'>

    </form>


