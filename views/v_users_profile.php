<?php if(isset($user)): ?>
    <?=$user->first_name?>'s Profile
<?php else: ?>
    <h1>No user specified</h1>
<? endif; ?>