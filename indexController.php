<?php
    $formError = array();   //déclation du tableau d'erreurs
    $civilityList = array('Monsieur' => 'Mr','Madame' => 'Mme');
    $regexName = '/^([A-Z]?[a-zÀ-ÖØ-öø-ÿ]+)([- ]{1}[A-Z]?[a-zÀ-ÖØ-öø-ÿ]+)*$/' ;
    //request = traiter les formulaire en get et post
    //si le formulaire est validé
    if (isset($_POST['filesForm'])) {
        //si civilité n'est pas vide et que civilityr ce trouve dans le tableau
        if (!empty($_POST['civility'])) {
            if (in_array($_POST['civility'], $civilityList)) {
                $civility = htmlspecialchars($_POST['civility']);
            }else {
                $formError['civility'] = 'Une erreur est survenue';
            }
        }else {
            $formError['civility'] = 'veuillez sélectionner une civilitée';
        }

        if (!empty($_POST['firstname'])) {
            //si firstname n'est pas vide et que firstname corespond a la regex
            if (preg_match($regexName, $_POST['firstname'])) {
                $firstname = htmlspecialchars($_POST['firstname']);
            }else {
                $formError['firstname'] = 'Le prenom ne doit pas contenir de chiffre ou caractère spéciaux';
            }
        }else {
            $formError['firstname'] = 'veuillez saisr un prénom';
        }

        if (!empty($_POST['lastname'])) {
            //si lastname n'est pas vide et que lastname corespond a la regex
            if (preg_match($regexName, $_POST['lastname'])) {
                $lastname = htmlspecialchars($_POST['lastname']);
            }else {
                $formError['lastname'] = 'Le nom ne doit pas contenir de chiffre ou caractère spéciaux';
            }
        }else {
            $formError['lastname'] = 'veuillez saisir un nom';
        }

        if (!empty($_FILES['sendFile'])) {
            if (isset($_FILES['sendFile'])) {
                $infosfichier = pathinfo($_FILES['sendFile']['name']); // recupere le nom du fichier
                $extension_upload = $infosfichier['extension']; // recuperer l'extention du fichier
                $sendFile = 'Vous avez envoyer ' . $_FILES['sendFile']['name'] . ' Il s\'agit d\'un fichier .' . $extension_upload;
            }
        }else {
            $formError['lastname'] = 'veuillez envoyer un fichier';
        }
    }
?>