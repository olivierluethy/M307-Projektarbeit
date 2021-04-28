<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Verleih Ansicht</title>
</head>
<body>
    <!-- <fieldset>
        <legend>Personal Daten</legend>
        <label for="Name">Name:</label>
        <input type="text" name="name"><br><br>

        <label for="email">Email:</label>
        <input type="text" name="email"><br><br>

        <label for="telefon">Telefon:</label>
        <input type="text" name="telefon"><br><br>
    </fieldset>
    <fieldset>
        <legend>Verleih Daten</legend>
        <label for="raten">Anzahl Raten:</label>
        <input type="text" name="raten"><br><br>
        
        <label for="creditPackage">Kredit Paket:</label>
        <input type="text" name="creditPackage"><br><br>
    </fieldset> -->

<style>
table {
    width:100%;
}
table, th, td {
border: 1px solid black;
border-collapse: collapse;
}
th, td {
padding: 15px;
text-align: left;
}
tr:first-child{
    background-color: #f2f2f2;
}
button{
background-color: #4CAF50;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 0px;
  cursor: pointer;
}
</style>

<h1>Kreditverleihe</h1>

<?php
echo "
<table>
<tr> 
    <th>PersonID</th> 
    <th>Email</th> 
    <th>Name</th> 
    <th>Telefon</th>
    <th>Abgeschlossen</th>
    <th>Bearbeiten</th> 
</tr>";
?>

<?php foreach ($credits as $credit): ?>
<tr>
    <td><?= $credit['PersonID'] ?> </td>
    <td><?= $credit['Email'] ?></td>
    <td><?= $credit['Name'] ?></td>
    <td><?= $credit['Telefon'] ?></td>
    <td><input type="checkbox"/></td>
    <td><a href="update?id=<?= $credit['PersonID'] ?>">bearbeiten</a></td>
    </tr>
    <?php endforeach; ?>
</table>

<a href="create"><button>Verleih hinzufügen</button></a>

    
         
   
</body>
</html>