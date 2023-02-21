<?php 
    session_start();
    include("./actions/dbconnect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"/>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/styles.css">
    <title>CRM</title>
</head>
<body>
    <header class="header">
        <div class="logo-container">
            <img src="" alt="Company Logo">
        </div>
        <div class="user-container">
            <button id="user"><i class="fa-solid fa-user"></i></button>
        </div>
    </header>
    <div class="modal">
        
    </div>
    <div class="content-container">
        <div>
            <button id="sidebar"><i class="fa-solid fa-bars"></i></button>
        </div>
        <div id="custom-content">
            <div id="clients">
                <table>
                    <h3>Clients</h3>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Number</th>
                        <th>Actions</th>
                    </tr>
                    <?php
                        $qry = mysqli_query($conn, 'SELECT * FROM clients');
                        while($row = $qry -> fetch_assoc()):
                    ?>
                    <tr>
                        <th><?php echo $row['name']?></th>
                        <th><?php echo $row['email']?></th>
                        <th><?php echo $row['number']?></th>
                        <form action="" class="editInfo">
                            <input type="hidden" name="clientId" class="clientID" value="<?php echo $row['id']?>">
                            <th><button type="submit" class="edit-btn">Edit</button></th>
                        </form>
                    </tr>
                    <?php endwhile;?>
                </table> 
            </div>
        </div>
    </div>
    <div class="sidebar-container">
    <h3>Managment</h3>
    <button id="close-btn"><i class="fa-solid fa-xmark"></i></button>
        <ul>
            <li><button class="trigger-btns" id="clients-trigger">Clients</button></li>
            <li><button class="trigger-btns">Other Links</button></li>
            <li><button class="trigger-btns">Other Links</button></li>
            <li><button class="trigger-btns">Other Links</button></li>
            <li><button class="trigger-btns">Other Links</button></li>
            <li><button class="trigger-btns">Other Links</button></li>
        </ul>
    </div>
    <script src="./js/app.js"></script>
</body>
</html>