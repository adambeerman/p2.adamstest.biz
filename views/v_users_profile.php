<?php if(isset($user)): ?>
    <h1><?=$user->first_name?>'s Profile</h1>
<?php else: ?>
    <h1>No user specified</h1>
<? endif; ?>