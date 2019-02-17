<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>change</title>
    <link rel="stylesheet" href="<?php echo $_GLOBALS['BASE_PATH']."css/reset.css";?>">
    <link rel="stylesheet" href="<?php echo $_GLOBALS['BASE_PATH']."css/form.css";?>">
</head>
<body>
<form action="<?php echo $_GLOBALS['BASE_PATH']."?page=adds&action=edit&id=".$id; ?>" method="post" enctype="multipart/form-data">
    <table id="form">
        <tr>
            <th>Text</th>
            <td><input type="text" name="text" required placeholder="<?php echo $offerInfo["offer_text"];  ?> "></td>
        </tr>

        <tr>
            <th>Price</th>
            <td><input type="number" name="price" required placeholder="<?php echo $offerInfo["price"];  ?> "></td>
        </tr>
        <tr>
            <th>Image</th>
            <td><input type="file" name="image"></td>
        </tr>
        <tr>
            <th></th>
            <td colspan="2"><input value="Change" type="submit" name="edit"></td>
        </tr>
    </table>
</body>
</html>