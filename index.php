<?php
  include("database.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TO DO LIST</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/4e07701ab0.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/e88a0fc458.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://kit.fontawesome.com/e88a0fc458.css" crossorigin="anonymous">
</head>
<body>
        <h1 class="main-heading">TO DO LIST</h1>
        <div class="container">
          <form action="action.php" method="post">
            <div class="input-container">
                <input type="text" name="inputbox" id="inputbox" placeholder="ENTER YOUR TASK">
                <button type="submit" name="add" id="add">ADD</button>
            </div>
        
            <ul class="list">

             <?php 
                $itemList = get_items();
                while($row=$itemList->fetch_assoc())
                {
             ?>
                
                <li class="item">
                    <p><?php echo $row["item"];?></p>
                    <div class ="icon-container">
                        <button type="submit" name="checked" id="check" value="<?php echo $row["id"];?>"><i class="fas fa-check-circle"></i></button>
                        <button type="submit" name="deleted" id="delete" value="<?php echo $row["id"];?>"><i class="fa-solid fa-trash"></i></button>
                    </div>
                </li>
                
              <?php } ?>
           </ul> 
           
          <hr>

          <ul class="list">

             <?php
                $itemList=get_items_checked();
                while($row=$itemList->fetch_assoc())
                    {
              ?>
              <li class="item fade">
                   <p class="deleted-text"><span><?php echo $row["item"]; ?></span></p>
                   <div class="icon-container">
                        <button type="submit" name="checked" id="check"><i class="fas fa-check-circle hidden"></i></button>
                        <button type="submit" name="deleted" id="delete" value="<?php echo $row["id"]; ?>"><i class="fa-solid fa-trash"></i></button>
                   </div>
              </li>
              <?php } ?>
           </ul>
          </form>
        </div>
</body>
</html>


