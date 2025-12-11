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

            $sql = "SELECT * FROM user_accounts";
            $retrieved = $connection->query($sql);
        ?>

        <div class="container" style="margin-top: 70px">
            <h1> Youtube accounts management system </h1>
        
            <div style="display:flex; justify-content: flex-end; margin-top: 40px;">
                <button data-bs-toggle="modal" data-bs-target="#accountModal" class="btn btn-success">Add account </button>
            </div>

            <table class="table" style="margin-top: 20px;">
                <thead>
                    <tr>
                        <th>Email</th>
                        <th>Last Name</th>
                        <th>First Name</th>
                        <th>Address</th>
                        <th>Action</th>

                    <tr>
                </thead>
                
                <tbody>

                    <?php while($data = $retrieved->fetch_assoc()): ?>
                        <tr>
                            <td> <?=htmlspecialchars($data['email']) ?> </td>
                            <td> <?=htmlspecialchars($data['last_name']) ?> </td>
                            <td> <?=htmlspecialchars($data['first_name']) ?> </td>
                            <td> <?=htmlspecialchars($data['address']) ?> </td>
                            <td> 
                                <a href="edit_screen.php?account_id=<?=htmlspecialchars($data['account_id']) ?>" class="btn btn-primary"> <i class="fas fa-edit"></i> </a>
                                <button class="btn btn-danger" onclick="deletePop(<?=htmlspecialchars($data['account_id']) ?>)"><i class="fa-solid fa-trash"></i></button> 
                            </td>
                        
                        </tr>


                    <?php endwhile?>
                
                </tbody>
            </table> 
        </div>


        <div class="modal fade" id="accountModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4>Add account</h4>
                        <button class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">
                        <form action="functions/add_accounts.php"method="POST">

                            <label for="">Email</label>
                            <input type="email" name="email" class="form-control" required >

                            <label for="" style="margin-top: 20px;">Last Name</label>
                            <input type="text" name="lastname" class="form-control" required >

                            <label for="" style="margin-top: 20px;">First Name</label>
                            <input type="text" name="firstname" class="form-control" required >

                            <label for="" style="margin-top: 20px;">address</label>
                            <input type="text" name="address" class="form-control" required >
                            
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">Add</button>
                            </div>
                            

                        </form>
                    </div>

                </div>

            </div>

        </div>
            





        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

<script>
    function deletePop(id){
        swal.fire({
            title: "Are you sure?",
            text: "The linked channels will also be deleted.",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Delete"
            
        
            
        }).then((result)=>{
            if(result.isConfirmed){
                window.location.href = "functions/delete_accounts.php?id=" + id;

            }
        });
    }




</script>

</html>