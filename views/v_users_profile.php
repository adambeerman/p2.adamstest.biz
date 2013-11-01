<?php if(!isset($user)): ?>
    <h1>No user specified</h1>
<?php endif; ?>

<br>

<?php if(isset($error)): ?>
    <div class = "error">
        Error uploading image.
    </div>
<?php endif; ?>

<div>
    <div class = "row-fluid">
        <div class = "span4">
            <?php
            //Display user photo!
            echo "<br><br>";
            echo "<img src = '".AVATAR_PATH.$user->photo."' alt = 'User Photo'";

            ?>

            <!-- Allow user to upload a new photo if they do not want the default -->
            <!-- Needs logic to determine whether they need to be asked to update profile -->

            <form method='POST' enctype="multipart/form-data" action='/users/p_upload/'>

                <div class = "upload_file_container faded">
                    Change Profile Photo?
                    <input type='file' name='avatar'>
                    <input type='submit'>
                </div>



            </form>

        </div>
        <div class = "span7">
            <?php if(isset($user)): ?>
                <h3><?=$user->first_name?> <?=$user->last_name?></h3>
            <?php endif; ?>
            <!-- display the user's own posts on their profile page -->
            <div>
                <br>
                <?php if(isset($posts)): ?>
                    <?php foreach($posts as $post): ?>

                        <article>
                            <!-- Give the option to delete if this was your post -->
                            <div class = "row-fluid">
                                <div class = "span8" >
                                    <blockquote>
                                        <?=$post['content']?>
                                    </blockquote>
                                </div>
                                <div class = "span2">

                                </div>
                                <div class = "span1 edit_post" >
                                    <a href = '/posts/edit_post/<?=$post['post_id']?>' ><i class="icon-edit"></i></a>
                                </div>
                                <div class = "span1 delete_post" >
                                    <a href = '/posts/delete_post/<?=$post['post_id']?>' ><i class="icon-remove"></i></a>
                                </div>
                            </div>

                            <div class = "faded" style = "text-align: right">
                                <time datetime="<?=Time::display($post['modified'],'m/d/y g:i A')?>" >
                                    <?=Time::display($post['modified'], 'm/d/y g:i A')?>
                                </time>
                            </div>
                        </article>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>

</div>




