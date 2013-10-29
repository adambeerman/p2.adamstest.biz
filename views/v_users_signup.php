<h2>Sign Up</h2>

<?php if(isset($error)): ?>
    <div class = 'error' >
    <?php

    //Display different error codes for different login issues

    switch($error) {
        case 1: echo "Please enter a valid e-mail address";
            break;
        case 2: echo "E-mail address already exists!";
            break;
        default: echo "Login issues. We're working on it!";
            break;
    }?>
    </div>



<?php endif; ?>

<form method='POST' action='/users/p_signup'>

    Name<br>
    <input type='text' name='first_name' placeholder="First">
    <input type='text' name='last_name' placeholder="Last">
    <br><br>

Email<br>
    <input type='text' name='email' placeholder="e-mail address">
    <br><br>

Password<br>
    <input type='password' name='password' placeholder="password">
    <br><br>

    <input type='submit' value='Sign up'>

</form>