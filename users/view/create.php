<html>
<head>
    <link rel="stylesheet" href="<?PHP echo $_GLOBALS['BASE_PATH']; ?>/users/view/css/loginRegister.css">

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

    <form action="<?PHP echo $_GLOBALS['BASE_PATH']; ?>?page=users&action=create" method="post" id="form" style="display: none">

        <label for="username">Username: </label>
        <input type="text" name="username" id="username"> <br>

        <label for="password">Password: </label>
        <input type="password" name="password" id="password"> <br>

        <input type="submit" name="create" value="Register now" id="logButton"><br>

        <a href="?page=users&action=login">Log in</a>

    </form>

</main>


<footer></footer>

</body>

</html>
