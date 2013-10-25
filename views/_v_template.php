<!DOCTYPE html>
<html>
<head>
	<title><?php if(isset($title)) echo $title; ?></title>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

    <!-- Common CSS/JSS -->
    <link rel="stylesheet" href="/css/bootstrap.css" type="text/css">
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

        <!-- placeholder to be able to capitalize the app name on the home page -->
        <?php $placeholder = APP_NAME ?>
        <a href='/'><span id = "logo"><?php echo strtoupper($placeholder); ?></span></a>
        <br>

        <!-- Menu for users who are logged in -->
        <?php if($user): ?>

            <a href='/users/profile'>[ Your Profile ]</a>
            <a href='/posts/add'>[ New Post ]</a>
            <a href='/posts/personal'> [ Your Posts ]</a>
            <a href='/posts/index'>[ All Posts ]</a>
            <a href='/posts/users'>[ All Users ]</a>
            <a href='/posts/following'>[ Friends' Posts ]</a>
            <a href='/users/logout'>[ Logout ]</a>

            <!-- Menu options for users who are not logged in -->
        <?php else: ?>

            <a href='/users/signup'>[ Sign up ]</a>
            <a href='/users/login'>[ Log in ]</a>

        <?php endif; ?>

    </div>
    <div style = "background-color: lightgoldenrodyellow">



        <div id = "main_content">
            <?php if(isset($content)) echo $content; ?>
        </div>

        <?php if(isset($client_files_body)) echo $client_files_body; ?>
    </div>
    <div style = "background-color: yellow; border-top: 1px black solid; height: 50px; color: black">
        <div id = "tagline">
            <br>
            ~
            <?php if(isset($title)) echo $title; else echo APP_TAGLINE?>
            ~
        </div>
    </div>

</body>
</html>