<?php foreach($users as $person):?>

    <div id = "users">

        <strong>
            <?php if (isset($person['last_name'])){ echo $person['first_name']." ".$person['last_name'];}
            else echo $person['first_name'];?>
        </strong>
        <span class = "pull-right faded">
            <?php echo "member since ".date('M d Y', $person['created']);?>
        </span>
        <br>

        <!-- Follow if not following or unfollow if followed -->
        <?php if(isset($connections[$person['user_id']])): ?>
            <span class = "faded">
                <a href = '/posts/unfollow/<?=$person['user_id']?>'>
                Unfollow
                </a>
            </span>
        <?php else: ?>
            <a href = '/posts/follow/<?=$person['user_id']?>'>
                Follow
            </a>
        <?php endif ?>


        <br>
    </div>



<?php endforeach; ?>