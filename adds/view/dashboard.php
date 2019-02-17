<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>dashboard</title>
    <link rel="stylesheet" href="<?php echo $_GLOBALS['BASE_PATH']."css/reset.css";?>">
    <link rel="stylesheet" href="<?php echo $_GLOBALS['BASE_PATH']."css/dashboard.css";?>">
</head>

<body>

<header>
    <div id="greeting">Hello, <?php echo $_SESSION["user"]["username"] ?></div>
    <div id="logOut"><a href="<?php echo $_GLOBALS['BASE_PATH'];?>?page=users&action=logout">Log out</a></div>
</header>

<nav>
    <a href="<?php echo $_GLOBALS['BASE_PATH'];?>?page=adds&action=add">Add offer</a><br>

    <a href="<?php echo $_GLOBALS['BASE_PATH'];?>?page=adds&action=dashboard&p=1&sort=asc">Sort low to hight</a><br>
    <a href="<?php echo $_GLOBALS['BASE_PATH'];?>?page=adds&action=dashboard&p=1&sort=desc">Sort hight to low</a><br>
</nav>

<main>
    <table id="my-table" width="100%">
        <tr>
            <th>Text</th>
            <th>Price</th>
            <th>Image</th>
            <th>Change offer</th>
            <th>Delete offer</th>
        </tr>

        <?php for ($i = 0; $i < count($offers); $i++){
            ?>
            <tr id="<?php echo $offers[$i]["offer_id"]; ?>">
                <td><?php echo $offers[$i]["offer_text"] ?></td>
                <td><?php echo $offers[$i]["price"]; ?></td>
                <td><img width="40px" src="<?php echo $_GLOBALS['BASE_PATH'].UPLOADED.$offers[$i]["image_uri"]; ?>" alt=""></td>

                <?php
                if($_SESSION["user"]["user_id"] == $offers[$i]["user_id"]){ ?>
                    <td><a href="<?php echo $_GLOBALS['BASE_PATH']; ?>?page=adds&action=edit&id=<?php echo $offers[$i]["offer_id"]; ?>">Edit offer</a> </td>
                <?php }  else { ?>
                    <td>-</td>
                <?php } ?>

                <?php
                if($_SESSION["user"]["user_id"] == $offers[$i]["user_id"]){ ?>
                    <td><button onclick="deleteOffer(<?php echo $offers[$i]["offer_id"]; ?>)">Delete</button> </td>
                <?php }  else { ?>
                    <td>-</td>
                <?php } ?>


            </tr>
        <?php } ?>
    </table>
</main>


<div id="pagination">
    <?php
    $numbPages = ceil($allOffers / 5);
    for ($i = 1; $i <= $numbPages; $i++){
        echo '<a href="'.$_GLOBALS['BASE_PATH'].'?page=adds&action=dashboard&p='.$i.'&sort='.$sort.'">' . $i . '</a> ';
    }
    ?>
</div>

<div id="pager"></div>

<footer>

</footer>

<script>

    function deleteOffer(offer_id) {
        fetch("<?php echo $_GLOBALS['BASE_PATH']."?page=adds&action=delete";?>",{
            method: "POST",
            headers: {'Content-type': 'application/x-www-form-urlencoded'},
            body: "id=" + offer_id
        })
            .then(function (response) {
                return response.json();
            })
            .then(function (myJson) {
                document.getElementById(offer_id).outerHTML = "";
            })
            .catch(function (e) {
                alert(e.message);
            })
    }

</script>

</body>
</html>

