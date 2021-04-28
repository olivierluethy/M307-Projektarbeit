<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Verleih Erfassung</title>
</head>
<body>
<form action="create" method="post">
        <fieldset>
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
            <input type="text" name="creditPackage">
        </fieldset>
        <button type="submit" name="form-submit">Kreditverleih erfassen</button>

    </form>
</body>
</html>