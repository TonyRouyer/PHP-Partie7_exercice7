<?php include 'indexController.php'; ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>partie 7 exercice 7</title>
        <style>
            form {
                display: flex;
                flex-direction: column;
                width: 50%;
                margin: 0 auto;
            }
            label, #sendFile {
                margin-top: 10px;
            }
            #firstname, #lastname {
                border: 0px;
                border-bottom: 1px Solid black;
            }
            #sendBtn {
                width: 10%;
                margin-top: 10px;
            }
        </style>
    </head>
    <body>
        <?php 
            if(isset($_REQUEST['filesForm']) && count($formError) == 0) { ?>
                        <p><?= 'bonjour ' . $civility . ' ' . $firstname . ' ' . $lastname ?></p>
                        <p><?= $sendFile ?></p>
            <?php }else { ?>
                <form action="index.php" method="POST" enctype="multipart/form-data">
                    <label for="civility"> Civilité :
                    <select name="civility" id="civilite">
                        <option value="Mr">Monsieur</option>
                        <option value="Mme">Madame</option>
                    </select>
                    </label>
                    <label for="firstname">Prénom : <input type="text" id="firstname" name="firstname" /></label>
                    <label for="lastname">Nom : <input type="text" id="lastname" name="lastname" /></label>
                    <input type="file" name="sendFile" id="sendFile" />
                    <input type="submit" id="sendBtn" name="filesForm" />
                </form>
        <?php  } ?>
    </body>
</html>