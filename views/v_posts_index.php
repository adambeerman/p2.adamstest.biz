<?php foreach($posts as $post): ?>

    <article>


        <?php if($post['first_name']): ?>
            <h3><?=$post['first_name']?> <?=$post['last_name']?>:</h3>
        <?php endif; ?>
        <!-- Give the option to delete if this was your post -->
        <?php if($post['user_id']==$user->user_id):?>
            <div class = "row-fluid">
                <div class = "span11" >
                    <?=$post['content']?>
                </div>
                <div class = "span1 delete_post" >
                    <a href = '/posts/delete_post/<?=$post['post_id']?>' ><i class="icon-remove-circle icon-white"></i></a>
                </div>
            </div>
        <?php else: ?>
            <?=$post['content']?>
        <?php endif; ?>

        <blockquote>
            <time datetime="<?=Time::display($post['created'],'Y-m-d G:i')?>" class = "faded" style = "text-align: right">
                <?=Time::display($post['created'])?>
            </time>
        </blockquote>

    </article>

<?php endforeach; ?>