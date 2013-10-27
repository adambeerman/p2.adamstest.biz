<?php if(isset($error)): ?>
    <div class='error'>
        Cannot submit empty post!
    </div>
<?php endif; ?>

<form method='POST' action='/posts/p_add'>

    <div class="row-fluid">
        <div class = "span8">
            <textarea name='content' id='content' rows="1"></textarea>
        </div>
        <div class = "span4">
            <button type='submit' value='Post'><i class = "icon-pencil"></i>Post!</button>
        </div>
    </div>


</form>