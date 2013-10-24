<?php foreach($posts as $post): ?>

    <article>

        <?php if($post['first_name']): ?> <h3><?=$post['first_name']?> <?=$post['last_name']?>:</h3>
        <?php endif;?>

        <p><?=$post['content']?></p>


        <time datetime="<?=Time::display($post['created'],'Y-m-d G:i')?>" class = "faded">
            <?=Time::display($post['created'])?>
        </time>


    </article>

<?php endforeach; ?>