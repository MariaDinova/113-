<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add offer</title>
    <link rel="stylesheet" href="<?php echo $_GLOBALS['BASE_PATH']."css/reset.css";?>">
    <link rel="stylesheet" href="<?php echo $_GLOBALS['BASE_PATH']."css/form.css";?>">
</head>
<body>

<form action="<?PHP echo $_GLOBALS['BASE_PATH']; ?>?page=adds&action=add" method="post" enctype="multipart/form-data">
    <table id="form">
        <tr>
            <th>Text</th>
            <td><input type="text" name="text" required></td>
        </tr>

        <tr>
            <th>Price</th>
            <td><input type="number" name="price" required></td>
        </tr>
        <tr>
            <th>Image</th>
            <td><input type="file" name="image" required></td>
        </tr>
        <tr>
            <th><a href="<?PHP echo $_GLOBALS['BASE_PATH']; ?>?page=adds&action=dashboard">Back</a></th>
            <td colspan="2"><input value="Add" type="submit" name="add"></td>
        </tr>
    </table>
</form>

</body>
</html>