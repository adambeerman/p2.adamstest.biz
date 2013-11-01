<?php if(isset($user)): ?>
    <?=$user->first_name?>'s Profile
<?php else: ?>
    <h1>No user specified</h1>
<? endif; ?>

<br>

<?php if(isset($error)): ?>
    <div class = "error">
        Error uploading image.
    </div>
<? endif; ?>

<div>

    <?php
        echo "photo";
        echo "<img src = '".AVATAR_PATH.$user->photo."' alt = 'User Photo'>";
        echo "<br>";
        echo "avatar";
        echo "<img src = '".$user->avatar."' alt = 'User Photo'";
    ?>
</div>

    <!-- Allow user to upload a new photo if they do not want the default -->
    <form method='POST' enctype="multipart/form-data" action='/users/p_upload/'>

        <input type='file' name='avatar'>
        <br>
        <input type='submit'>

    </form>


