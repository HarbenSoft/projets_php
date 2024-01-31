
<?php


$servername = "localhost";
$username = "root";
$password = "";

try {
  $conn = new PDO("mysql:host=$servername;dbname=loc_immobiliere", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "select * from mesInvites Limit 2,5 ";
  $result = $conn->query($sql);

  if($result->rowCount() > 0){
  ?>
    <table style='border: solid 1px black;'>
    <tr><th>Id</th><th>Firstname</th><th>Lastname</th></tr>
   <?php
  while ($rows = $result->fetch()) { ?>
      <tr>
         <td><?php echo $rows['id']; ?></td>
         <td><?php echo $rows['firstname']; ?></td>
         <td><?php echo $rows['lastname']; ?></td>
       </tr>
     <?php 
      } ?>
    </table>
  <?php
  } else{ 
    echo " Aucun enregistrement n'a été trouvé.";}
  
  } catch(PDOException $e) {
    echo "Error: $sql." . $e->getMessage();
  }
    unset($pdo); // Déconnecter

?>

<?php

/*

############## CREATE DATABASE #############################
try {
  $conn = new PDO("mysql:host=localhost", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "CREATE DATABASE myDBPDO";
  // use exec() because no results are returned
  $conn->exec($sql);
  echo "Database created successfully<br>";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}
################################################################
*/

  /*
  ############ CREATE TABLE ###########################
  $sql = "CREATE TABLE mesInvites (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  firstname VARCHAR(30) NOT NULL,
  lastname VARCHAR(30) NOT NULL,
  email VARCHAR(50),
  reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
  )";

  // use exec() because no results are returned
  $conn->exec($sql);
  echo "table mesInvites created successfully";
  ########################################################################

  */

/*
  ############ INSERTION D'UN ENREGISTREMENT ###########################
$sql = "INSERT INTO mesInvites (firstname, lastname, email)
  VALUES ('benhar', 'khalid', 'benharkh@example.com')";
  // use exec() because no results are returned
  $conn->exec($sql);
  echo "New record created successfully";
########################################################################
*/

/*
############ Obtenir l'ID du dernier enregistrement inséré  #############
$last_id = $conn->lastInsertId();
echo "New record created successfully. Last inserted ID is: " . $last_id;
########################################################################
*/

/*
############ insertion de multiple enregistrements #############

    // begin the transaction
    $conn->beginTransaction();
    // our SQL statements
    $conn->exec("INSERT INTO mesInvites (firstname, lastname, email)
    VALUES ('sanhaj', 'samir', 'sanh@example.com')");
    $conn->exec("INSERT INTO mesInvites (firstname, lastname, email)
    VALUES ('Mary', 'Moe', 'mary@example.com')");
    $conn->exec("INSERT INTO mesInvites (firstname, lastname, email)
    VALUES ('Julie', 'Dooley', 'julie@example.com')");
  
    // commit the transaction
    $conn->commit();
    echo "New records created successfully";
########################################################################
*/

/*

################ prepare sql and bind parameters ##########################

$stmt = $conn->prepare("INSERT INTO mesInvites (firstname, lastname, email)
VALUES (:firstname, :lastname, :email)");
$stmt->bindParam(':firstname', $firstname);
$stmt->bindParam(':lastname', $lastname);
$stmt->bindParam(':email', $email);

// insert a row
$firstname = "azizi";
$lastname = "Doe";
$email = "john@example.com";
$stmt->execute();

// insert another row
$firstname = "Rochdi";
$lastname = "Moe";
$email = "mary@example.com";
$stmt->execute();

// insert another row
$firstname = "jamali";
$lastname = "Dooley";
$email = "julie@example.com";
$stmt->execute();

//ou bien
// prepare sql and bind parameters
$stmt = $conn->prepare("INSERT INTO mesInvites (firstname, lastname, email) VALUES (?,?,?)");

// insert a row
$firstname = "bob";
$lastname = "marly";
$email = "bob@example.com";
$stmt->execute([$firstname,$lastname,$email]);

########################################################################
*/

/*
####################Sélection de données ####################
$sql = "SELECT id, firstname, lastname FROM mesInvites";
//where : $sql = "SELECT id, firstname, lastname FROM mesInvites WHERE lastname='Dooley'";
// ORDERBY : "SELECT id, firstname, lastname FROM mesInvites ORDERBY lastname";
// delete : $sql = "DELETE FROM mesInvites WHERE id=10";
// update : $sql = "UPDATE mesInvites set lastname='hassan' WHERE id=2";

$result = $conn->query($sql);
if($result->rowCount() > 0){
?>
  <table style='border: solid 1px black;'>
  <tr><th>Id</th><th>Firstname</th><th>Lastname</th></tr>
 <?php
while ($rows = $result->fetch()) { ?>
    <tr>
       <td><?php echo $rows['id']; ?></td>
       <td><?php echo $rows['firstname']; ?></td>
       <td><?php echo $rows['lastname']; ?></td>
     </tr>
   <?php 
    } ?>
  </table>
<?php
} else{ 
  echo " Aucun enregistrement n'a été trouvé.";}

} catch(PDOException $e) {
  echo "Error: $sql." . $e->getMessage();}

unset($result); 
unset($pdo); // Déconnecter
############################################################
*/
?>