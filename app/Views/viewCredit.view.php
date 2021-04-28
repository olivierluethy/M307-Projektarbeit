<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Verleih Ansicht</title>
</head>
<body>

<style>
*{
    font-family: Arial;
}
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
td a, a:visited{
    color: hsl(197, 0%, 23%);
    text-decoration: none;
}
td a:hover{
    text-decoration: underline;
    cursor: pointer;
}
button{
    padding: 20px;
    margin: 4px 0px;
    color: white;
    background-color: hsl(197, 100%, 23%);
    text-decoration: none;
    box-shadow: 2px 3px 5px gray;
    transition: 0.3s;
    border-radius: 8px;
    border: none;
}
button:hover{
    background-color: hsl(197, 100%, 33%);
}
</style>

    <h1>Verleihdaten</h1>

    <table>
        
        <tr> 
            <th>Name</th> 
            <th>Email</th> 
            <th>Telefon</th>
            <th>Abgeschlossen</th>
            <th>Bearbeiten</th> 
        </tr>

        <?php foreach ($credits as $credit): ?>
            <tr>
                <td><?= $credit['Name'] ?></td>
                <td><?= $credit['Email'] ?></td>
                <td><?= $credit['Telefon'] ?></td>
                <td><input type="checkbox"/></td>
                <td><a href="update?id=<?= $credit['PersonID'] ?>">Verleih bearbeiten</a></td>
            </tr>
        <?php endforeach; ?>

    </table>

    <a href="create"><button>Verleih hinzufügen</button></a>

</body>
</html>