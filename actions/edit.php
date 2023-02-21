<?php
    session_start();
    include("./dbconnect.php");
    extract($_POST);

    $qry = mysqli_query($conn , "SELECT * FROM clients where id = '$clientId'");
    while($row = $qry -> fetch_assoc()):
?>

<div id="message">

</div>

<div class="btns-container">
    <button id="edit">Edit Client</button>
    <button id="delete">Delete Client</button>
</div>

<form action="./actions/submit.php" method="POST" class="edit-form form">
    <h3>Edit Client Information</h3>
    <input type="hidden" name="id" value="<?php echo $clientId ?>">
    <p>Name: <input type="name" name="name" value="<?php echo $row['name'] ?>"></p>
    <p>Email: <input type="email" name="email" value="<?php echo $row['email'] ?>"></p>
    <p>Number: <input type="text" name="number" value="<?php echo $row['number'] ?>"></p>
    <button type="submit">UPDATE INFO</button>
</form>

<form action="./actions/delete.php" method="POST" class="delete-form form">
    <h3>Delete Client</h3>
    <input type="hidden" name="id" value="<?php echo $clientId ?>">
    <button type="submit">DELETE</button>
</form>

<?php endwhile;?>


<script>
    $("#edit").click(function(){
        $(".delete-form").hide("");
        $(".edit-form").show("");
    });

    $("#delete").click(function(){
        $(".edit-form").hide("");
        $(".delete-form").show("");
    });


    $(".edit-form").submit(function(e){
        e.preventDefault();
        $.ajax({
            url: './actions/submit.php',
            method: 'POST',
            data: $(this).serialize(),
            error:err=>{
                console.log(err)
            }, 
            success: function(data){
                $(".edit-form").hide("");
                $(".btns-container").hide();
                setTimeout(function(){$("#message").text("Successfully updated data");},1000);
                setTimeout(function(){$(".modal").hide("")},2000);
                setTimeout(function(){location.reload()},3000);               
            }
        });
    });

    $(".delete-form").submit(function(e){
        e.preventDefault();
        $.ajax({
            url: './actions/delete.php',
            method: 'POST',
            data: $(this).serialize(),
            error:err=>{
                console.log(err)
            }, 
            success: function(data){
                $(".delete-form").hide("");
                $(".btns-container").hide();
                setTimeout(function(){$("#message").text("Successfully deleted client");},1000);
                setTimeout(function(){$(".modal").hide("")},2000);
                setTimeout(function(){location.reload()},3000);  
            }
        });
    });
</script>