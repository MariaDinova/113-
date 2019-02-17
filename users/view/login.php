<html>
<head>
    <link rel="stylesheet" href="/113/users/view/css/loginRegister.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#form").show(1500);

        });
    </script>
</head>

<body>

<header></header>

<main>

    <form action="<?php echo $_GLOBALS['BASE_PATH']."?page=users&action=login"?>" method="post" id="form" style="display: none">

        <label for="username">Username: </label>
        <input type="text" name="username" id="username"> <br>

        <label for="password">Password: </label>
        <input type="password" name="password" id="password"> <br>

        <input type="submit" name="login" value="Log in" id="logButton"><br>

        <a href="?page=users&action=create">Register now</a>

    </form>

</main>


<footer></footer>

</body>

</html>
