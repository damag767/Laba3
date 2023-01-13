<?php  session_start();

    require_once 'bd_connect.php';
    //$name = $_POST['name'];
    if(isset($_POST['name'])){
        $_SESSION["name"] = $_POST['name'];                
        //$sql= "DELETE FROM `ochered` WHERE `id` = $id";
        //mysqli_query($connect,$sql);       
    }
    //echo $_SESSION["name"],"\n\r";
    $name = $_SESSION["name"];
        //header("Location: Pg.php");
    if(isset($_POST['com'])){
        $com=$_POST['com'];
        $sql= "INSERT INTO `$name` (`comments`) VALUES ('$com')";
        mysqli_query($connect,$sql);
    }

    $ochered = mysqli_query($connect,"SELECT * FROM `$name` ORDER BY id");
    $ochered = mysqli_fetch_all($ochered);
        
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
    <h1><?= $name ?></h1>
    <table>
    <?php
    foreach($ochered as $item) {                        
        ?>        
            <tr>                
                <td><?= $item[1] ?></td>                
            </tr>        
        <?php
    }     
    ?>
    </table>

    <form action="Pg.php" method="post">        
        <input type="text" name="com">
        <button type="submit" >Написать</button>
    </form>
    <a href="index.php"> выйти </a>
    </font>
</html>