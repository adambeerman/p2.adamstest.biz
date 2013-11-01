<?php if(!isset($user)): ?>
    <h1>No user specified</h1>
<? endif; ?>

<br>

<?php if(isset($error)): ?>
    <div class = "error">
        Error uploading image.
    </div>
<? endif; ?>

<div>
    <div class = "row-fluid">
        <div class = "span4">
            <?php
            //Display user photo!
            echo "<img src = '".AVATAR_PATH.$user->photo."' alt = 'User Photo'>";
            //echo "<br>";
            //echo "avatar";
            //echo "<img src = '".$user->avatar."' alt = 'User Photo'";
            ?>

            <!-- Allow user to upload a new photo if they do not want the default -->
            <!-- Needs logic to determine whether they need to be asked to update profile -->

            <form method='POST' enctype="multipart/form-data" action='/users/p_upload/'>

                <input type='file' name='avatar'>
                <br>
                <input type='submit'>

            </form>

        </div>
        <div class = "span8">
            <?php if(isset($user)): ?>
                Welcome, <?=$user->first_name?>!
            <?php endif; ?>
            <!-- display the user's own posts on their profile page -->
            <div>
                <?=$personalPosts;?>
            </div>
        </div>
    </div>

</div>




