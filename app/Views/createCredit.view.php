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
            <input type="text" name="name" id="name" require><br><br>

            <label for="email">Email:</label>
            <input type="email" name="email" id="email" require><br><br>

            <label for="telefon">Telefon:</label>
            <input type="text" name="telefon" id="telefon"><br><br>
        </fieldset>
        <fieldset>
            <legend>Verleih Daten</legend>
            <label for="raten">Anzahl Raten:</label>
            <input type="text" name="raten" id="raten" require><br><br>

            <label for="creditPackage">Kredit Paket:</label>
            <input type="text" name="creditPackage" id="creditPackage" require>
        </fieldset>
        <button type="submit" name="form-submit">Kreditverleih erfassen</button>
    </form>
    <p id="errorList"></p>
    <script>
        // Clientside Validierung
        var creditPackages = "";

        window.addEventListener("load", function() {

            document.querySelector('form').addEventListener('submit', function(evt) {

                var errors = false;
                var warnings = document.querySelectorAll(".warning");
                if (warnings != null) {
                    warnings.forEach(element => {
                        element.remove();
                    });
                }


                if (document.querySelector('#name') != null) {
                    if (document.querySelector('#name').value.trim() === '') {
                        document.querySelector('#name').insertAdjacentHTML("afterend", "<label class=\"warning\"> Bitte gib einen Namen ein</label>");
                        errors = true;
                    }
                }

                if (document.querySelector('#email') != null) {
                    if (document.querySelector('#email').value.trim() === '' || !document.querySelector('#email').value.trim().includes("@")) {
                        document.querySelector('#email').insertAdjacentHTML("afterend", "<label class=\"warning\"> Bitte gib eine gültige Email ein.</label>");
                        errors = true;
                    }
                }

                if (document.querySelector('#telefon') != null) {
                    if (document.querySelector('#telefon').value.trim() === '') {
                        document.querySelector('#telefon').insertAdjacentHTML("afterend", "<label class=\"warning\"> Bitte gib eine gültige Telefonnummer ein.</label>");
                        errors = true;
                    }
                }

                if (document.querySelector('#raten') != null) {
                    if (document.querySelector('#raten').value.trim() === '') {
                        document.querySelector('#raten').insertAdjacentHTML("afterend", "<label class=\"warning\"> Bitte gib eine gültige Rate ein.</label>");
                        errors = true;
                    }
                }

                if (document.querySelector('#creditPackage') != null) {
                    if (document.querySelector('#creditPackage').value.trim() === '') {
                        document.querySelector('#creditPackage').insertAdjacentHTML("afterend", "<label class=\"warning\"> Bitte gib ein gültiges Kredit Paket ein.</label>");
                        errors = true;
                    }
                }

                if (errors) {
                    evt.preventDefault();
                }

            });
        });
    </script>
    <script src="../../public/js/clientSideValidation"></script>
</body>

</html>