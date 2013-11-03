<h1>

<?php if($user): ?>
    Welcome to <?=APP_NAME?>, <?=$user->first_name?>
<?php else: ?>
    Welcome to <?=APP_NAME?>!
<?php endif; ?>

</h1>

<h4>
    <?=APP_NAME?> is a micro-blog that allows you to post your thoughts about the world!
    And of course, you can edit or delete them, too.
    See the other <?=APP_NAME?> users once you sign up, and choose whose posts you would like to follow.
    You can even add a profile picture!
    <br><br>
    Revenge is a dish best served cold. But <?=APP_NAME?> is hot! We're glad you could join us.
</h4>

