<!DOCTYPE html>
<html>
<head>
	<title><?php if(isset($title)) echo $title; ?></title>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

    <!-- Common CSS/JSS -->
    <link rel="stylesheet" href="/css/main.css" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Lily+Script+One' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    <!-- Controller Specific CSS/JS -->
    <?php if(isset($client_files_head)) echo $client_files_head; ?>


	<!-- Controller Specific JS/CSS -->
	<?php if(isset($client_files_head)) echo $client_files_head; ?>
	
</head>

<body>

    <div id='menu'>


        <a href='/'><span class = "logo"><?php echo APP_NAME; ?></span></a>
        <br>

        <!-- Menu for users who are logged in -->
        <?php if($user): ?>

            <a href='/users/profile'>[ Profile ]</a>
            <a href='/posts/add'>[Jot Something]</a>
            <a href='/posts/index'>[Your Posts]</a>
            <a href='/users/logout'>[ Logout ]</a>

            <!-- Menu options for users who are not logged in -->
        <?php else: ?>

            <a href='/users/signup'>[ Sign up ]</a>
            <a href='/users/login'>[ Log in ]</a>

        <?php endif; ?>

    </div>

    <span class = "tagline"><?php echo APP_TAGLINE."<br>"; ?></span>

    <div id = "content">
        <?php if(isset($content)) echo $content; ?>
    </div>

    <?php if(isset($client_files_body)) echo $client_files_body; ?>

</body>
</html>