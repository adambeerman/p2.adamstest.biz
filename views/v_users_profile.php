<?php if(isset($user)): ?>
    <img src = <?=$user->avatar?> >
    <?=$user->first_name?>'s Profile
<?php else: ?>
    <h1>No user specified</h1>
<? endif; ?>