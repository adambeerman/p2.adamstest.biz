<h2>Log In</h2>
<form method='POST' action='/users/p_login'>

    Email<br>
    <label>
        <input type='text' name='email' placeholder="e-mail">
    </label>
    <br>

    Password<br>
    <input type='password' name='password' placeholder="password">
    <br>

    <?php if(isset($error)): ?>
        <div class='error'>
            Login failed. Please double check your email and password.
        </div>
        <br>
    <?php endif; ?>

    <input type='submit' value='Log in'>

</form>