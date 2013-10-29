
<?php if(isset($error)): ?>
    <div class='error'>


        Login failed. Please double check your email and password.
    </div>
<?php endif; ?>

<h2>Log In</h2>
<form method='POST' action='/users/p_login'>

    Email<br>
    <input type='text' name='email' placeholder="e-mail">
    <br>

    Password<br>
    <input type='password' name='password' placeholder="password">
    <br>



    <input type='submit' value='Log in'>

</form>