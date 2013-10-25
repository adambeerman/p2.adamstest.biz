<?php foreach($posts as $post): ?>

    <article>

        <?php if($post['first_name']): ?> <h3><?=$post['first_name']?> <?=$post['last_name']?>:</h3>
        <?php endif;?>

        <p><?=$post['content']?></p>

        <blockquote>
            <time datetime="<?=Time::display($post['created'],'Y-m-d G:i')?>" class = "faded" style = "text-align: right">
                <?=Time::display($post['created'])?>
            </time>
        </blockquote>

    </article>

<?php endforeach; ?>