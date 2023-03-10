<?php
    require "functions.php";

    session_start();

    if (!empty($_SESSION["login"])){
        $userid = $_SESSION["login"];
        $owner = querying("SELECT username_ FROM spaceship WHERE id = '$userid'")[0]["username_"];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BLACKHOLE</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <style>
        .header input{
            width: 100px;
            margin: 5px;
        }
        .update{
            color:crimson; 
            font-style:italic; 
            font-size:14px;
        }
    </style>
</head>

<body>
    <div class="header">
        <?php if (isset($owner)): ?>
            <a href="spaceship/"><input type="submit" value="<?=$owner?>"></a><br>
            <a href="spaceship/login.php?action=logout"><input type="submit" value="Logout"></a>
        <?php else: ?>
            <a href="spaceship/login.php?from=blackhole"><input type="submit" value="Login"></a>
        <?php endif ?>
    </div><br>

    <div class="card">
        <h2>Find files in Blackhole</h2>
        <form action="result/" method="post">
            <table>
                <tr>
                    <td>Codename</td>
                    <td><input type="text" name="codename" required></td>
                </tr>
                <tr>
                    <td>Sector</td>
                    <td><input type="text" name="sector" required></td>
                </tr>
            </table>
            <input type="submit" name="action" value="Find!">
        </form>
    </div><br><br>
    
    <div class="card">
        <h2>Drop files into a Blackhole</h2>
        <form action="result/" method="post" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>file</td>
                    <td><input type="file" name="file" required></td>
                </tr>
                <tr>
                    <td>Codename</td>
                    <td><input type="text" name="codename" required></td>
                </tr>
            </table>
            <input type="submit" name="action" value="Drop!">
        </form>
    </div><br><br><br>

    <a href="traceline/?comment=leave"><input type="submit" value="Leave a Comment!"></a>
    <br>
    <p class="update">*update on Thursday, february 2, 2023 at 12.15 (GMT+07.00)</p>

    <br><br><br><br><br><br><br><br>

    <div class="footer">
        <script async defer src="https://buttons.github.io/buttons.js"></script>
        <table>
            <tr><td><a href="https://buymeacoffee.com/vanila" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/default-orange.png" alt="Buy Me A Coffee" height="41" width="174"></a></td></tr>
            <tr><td><a class="github-button" href="https://github.com/saandhikaa" data-size="large" aria-label="Follow @saandhikaa on GitHub">Follow @saandhikaa</a></td></tr>
        </table>

        <p class="copyright">Copyright 2023 - <?= $server ?> - All Rights Reserved</p>
    </div>
</body>
</html>
