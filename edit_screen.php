<?php

    include "database/connection.php"; 

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <?php include "code_snippets/cdn_codes.php"; ?>

</head>
<body>

    <?php

        $id = $_GET['account_id'];
        
        $sql = "SELECT * FROM user_accounts WHERE account_id = $id";

        $retrieved = $connection->query($sql);

        $data = $retrieved->fetch_assoc();

    ?>
    
    <div style="display: flex; justify-content: center; margin-top: 70px;">

        <div style="border: 1px solid black; padding: 40px; border-radius: 1                                                                                                                                                                                0px;"> 

            <h1>Edit User Accounts</h1>

            <form action="functions/edit_accounts.php" method="POST">

                <input type="hidden" name="id" value="<?=htmlspecialchars($data['account_id'])?>">

                <label for="">Email</label>
                <input type="email" name="email" class="form-control" value="<?=htmlspecialchars($data['email'])?>" required >

                <label for="" style="margin-top: 20px;">Last Name</label>
                <input type="text" name="lastname" class="form-control" value="<?=htmlspecialchars($data['last_name'])?>" required >

                <label for="" style="margin-top: 20px;">First Name</label>
                <input type="text" name="firstname" class="form-control" value="<?=htmlspecialchars($data['first_name'])?>" required >

                <label for="" style="margin-top: 20px;">address</label>
                <input type="text" name="address" class="form-control" value="<?=htmlspecialchars($data['address'])?>" required >

                <div style="margin-top: 30px"> 
                    <input type="submit" value="Save" class="btn btn-success form-control">                                                                                                                                                                                                                                                                                                                                                                                          
                </div>

            </form>

        </div>

        

    </div>

</body>
</html>