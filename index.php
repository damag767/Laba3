<?php 
    require_once 'bd_connect.php';

    /*if(isset($_POST['name'])){
        echo $_POST['name'];
    }*/

    if(isset($_POST['name'])){
        $name = $_POST['name'];
        $sql= "create table $name (id integer not null auto_increment primary key, comments varchar(127))";
        mysqli_query($connect,$sql);
        //header("Location: index.php");
    }    

    $sql= " SHOW TABLES FROM laba3_bd";
    $result = mysqli_query($connect,$sql);

    /*while ($row = mysqli_fetch_array($result)) {
        echo "\n\r{$row[0]}";
    }*/
?>
<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>каналы</title>
        <!-- Только CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    </head>
    <font size="5" color="black" face="Comic Sans MS">
    <h1 align="center">Каналы</h1>
    <?php       
    
    while ($row = mysqli_fetch_array($result)) {
        ?>
        <form align="center"   action="Pg.php" method="post">
            <tr>
                <td><?= $row[0] ?></td>
                <input type = "text" name = "name" value = "<?=$row[0]?>" hidden />
                <td><button type="submit" onclick=header("Location: Pg.php")>открыть</button></td>
            </tr>
        </form>
        <?php
    }              
    ?>

    <form align="center" action="index.php" method="post">
        
        <input type="text" name="name">
        <button type="submit" >Добавить</button>
    </form>
    </font>
</html>