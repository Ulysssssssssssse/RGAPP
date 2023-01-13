<?php

$con = mysqli_connect("localhost", "root", "", "isepbike");

if(!$con){
    echo "Connection failled" . mysqli_connect_error();
}


if(isset($_POST['input'])){
    $input = htmlspecialchars($_POST['input']);
    $query = "SELECT * FROM utilisateurs WHERE pseudo LIKE '{$input}%' OR idUtilisateur LIKE '{$input}%' OR email LIKE '{$input}%' ";
    $result = mysqli_query($con, $query);

    if(mysqli_num_rows($result) > 0){?>

        <table> 
            <thead>
                <tr>
                    <th> Id </th>
                    <th> Pseudo </th>
                    <th> Email </th>
                    <th> Date d'inscription </th>
                </tr>
            </thead>

            <tbody>
                <?php 
                while($row = mysqli_fetch_assoc($result)){

                    $id = $row['idUtilisateur'];
                    $pseudo = $row['pseudo'];
                    $email = $row['email'];
                    $date_inscription = $row['dateInscription'];

                    ?>

                    <tr>
                        <td><?php echo $id;?></td>
                        <td><?php echo $pseudo;?></td>
                        <td><?php echo $email;?></td>
                        <td><?php echo $date_inscription;?></td>
                    </tr>

                <?php 
                }
                ?>
            </tbody>
        </table>

    <?php 
    } else {
        echo "<h6> </h6>";
    }
}

?>


