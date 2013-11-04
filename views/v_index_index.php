<h1>

<?php if($user): ?>
    Welcome to <?=APP_NAME?>, <?=$user->first_name?>
<?php else: ?>
    Welcome to <?=APP_NAME?>!
<?php endif; ?>

</h1>

<h4>
    <?=APP_NAME?> is a micro-blog that allows you to make posts and follow your friends!
    <br><br>
    +1 Features include:
    <ul>
        <li>Editing Posts</li>
        <li>Deleting Posts</li>
        <li>Uploading a Profile Photo</li>
    </ul>

    <br><br>
    Revenge is a dish best served cold. But <?=APP_NAME?> is hot! We're glad you could join us.
</h4>

