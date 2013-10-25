<h2>Sign Up</h2>

<?php if(isset($email_error)): ?>
    <div class='error'>
        Sign up failed. Please verify that you supplied an appropriate e-mail address.
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