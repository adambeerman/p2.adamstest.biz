<?php foreach($posts as $post): ?>

    <article>


        <?php if($post['first_name']): ?>
            <h3><?=$post['first_name']?> <?=$post['last_name']?>:</h3>
        <?php endif; ?>
        <!-- Give the option to delete if this was your post -->
        <?php if($post['user_id']==$user->user_id):?>
            <div class = "row-fluid">
                <div class = "span10" >
                    <blockquote>
                        <?=$post['content']?>
                    </blockquote>
                </div>
                <div class = "span1 edit_post" >
                    <a href = '/posts/edit_post/<?=$post['post_id']?>' ><i class="icon-edit"></i></a>
                </div>
                <div class = "span1 delete_post" >
                    <a href = '/posts/delete_post/<?=$post['post_id']?>' ><i class="icon-remove"></i></a>
                </div>
            </div>
        <?php else: ?>
            <blockquote class = "other_user">
                <?=$post['content']?>
            </blockquote>
        <?php endif; ?>

        <div class = "faded" style = "text-align: right">
            <time datetime="<?=Time::display($post['modified'],'m/d/y g:i A')?>" >
                <?=Time::display($post['modified'], 'm/d/y g:i A')?>
            </time>
        </div>

    </article>

<?php endforeach; ?>