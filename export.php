<?php

use Dompdf\Dompdf;
use Dompdf\Options;

require "vendor/autoload.php";
ini_set('memory_limit', '256M');

if (isset($_FILES['photo'])) {
    $error_code = $_FILES['photo']['error'];

    if ($error_code === UPLOAD_ERR_OK) {
        $c_image = $_FILES['photo']['name'];
        $c_image_tmp = $_FILES['photo']['tmp_name'];
        $image_dir =  __DIR__ .  "/upload/$c_image";
        if (move_uploaded_file($c_image_tmp, $image_dir)) {
            echo "Succès !";
        } else {
            echo "Erreur lors du déplacement du fichier. Vérifiez le dossier 'upload'.";
        }
    } else {
        echo "Code d'erreur d'upload : " . $error_code;
    }
} else {
    echo "Aucun fichier reçu. Vérifiez l'attribut enctype du formulaire.";
}



$nom = isset($_POST["nom"]) ? htmlspecialchars($_POST["nom"]) : "";
$prenom = isset($_POST["prenom"]) ? htmlspecialchars($_POST["prenom"]) : "";
$email = isset($_POST["email"]) ? htmlspecialchars($_POST["email"]) : "";
$postev = isset($_POST["posteV"]) ? htmlspecialchars($_POST["posteV"]) : "";
$numero = isset($_POST["numero"]) ? htmlspecialchars($_POST["numero"]) : "";
$profil = isset($_POST["profil"]) ? htmlspecialchars($_POST["profil"]) : "";

$entreprise = isset($_POST["entreprise"]) ? $_POST["entreprise"] : [];
$poste = isset($_POST["poste"]) ? $_POST["poste"] : [];
$dateDebut = isset($_POST["dateDebut"]) ? $_POST["dateDebut"] : [];
$dateFin = isset($_POST["dateFin"]) ? $_POST["dateFin"] : [];
$descPoste = isset($_POST["descPoste"]) ? $_POST["descPoste"] : [];

$ecole = isset($_POST["ecole"]) ? $_POST["ecole"] : [];
$diplome = isset($_POST["diplome"]) ? $_POST["diplome"] : [];
$anneeDebut = isset($_POST["anneeDebut"]) ? $_POST["anneeDebut"] : [];
$anneeFin = isset($_POST["anneeFin"]) ? $_POST["anneeFin"] : [];

$competence = isset($_POST["competence"]) ? $_POST["competence"] : [];
$langues = isset($_POST["langues"]) ? $_POST["langues"] : [];
$niveau = isset($_POST["niveau"]) ? $_POST["niveau"] : [];

$interet1 = isset($_POST["interet1"]) ? htmlspecialchars($_POST["interet1"]) : "";
$interet2 = isset($_POST["interet2"]) ? htmlspecialchars($_POST["interet2"]) : "";

$path = __DIR__ . '/upload/' . $c_image;

// 2. On vérifie si le fichier existe vraiment avant de continuer
if (file_exists($path)) {
    $type = pathinfo($path, PATHINFO_EXTENSION);
    $data = file_get_contents($path);
    $base64 = base64_encode($data);
    // On nettoie tout caractère parasite et on force le type
    $src = 'data:image/jpeg;base64,' . trim($base64);

    $html = '<img src="' . $src . '" width="200" />';
} else {
    die("L'image n'a pas été trouvée à cet endroit : " . $path);
}

$html = <<<EOD
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: 'Helvetica', sans-serif; font-size: 13px; color: #333; margin: 0; padding: 0; }
        .cv-container { width: 90%; margin: 20px auto; text-align: center; }

        .p-photo { width: 120px; height: 120px; border-radius: 50%; object-fit: cover; margin-bottom: 15px; }
        
        .header h2 { margin: 5px 0; color: #000; font-size: 22px; }
        .header p { margin: 2px 0; color: #555; }
        .poste-vise { color: #333; font-size: 18px; margin: 10px 0; }

        #p-profil { 
            width: 75%; 
            margin: 15px auto; 
            text-align: center; 
            white-space: pre-wrap; 
            word-wrap: break-word;
            line-height: 1.4;
        }

        .separator { 
            border: none; 
            border-bottom: 1px solid #000; 
            width: 80%; 
            margin: 15px auto; 
        }

        h3 { text-transform: uppercase; font-size: 16px; margin-top: 20px; }
        .text-start-block { text-align: left; width: 80%; margin: 0 auto; margin-bottom: 10px; }

        .comp-container { text-align: center; margin-top: 10px; }
        .comp-item { 
            display: inline-block; 
            width: 80px; 
            text-align: center; 
            vertical-align: top; 
            margin: 5px; 
        }
        .comp-item strong { display: block; font-size: 10px; margin-bottom: 5px; }
        .comp-item img { width: 50px; height: 50px; display: block; margin: 0 auto; }

        .date { font-style: italic; color: #777; font-size: 11px; }
    </style>
</head>
<body>
    <div class="cv-container">
        <div class="header">
         $html 
            <h1>$prenom $nom</h1>
            <p><strong>$postev</strong></p>
            <p>$email | $numero</p>
        </div>

        <div id="p-profil">$profil</div>
        
        <div class="separator"></div>

        <div class="section">
            <h3>Expériences</h3>
            <div class="text-start-block">
EOD;

foreach ($entreprise as $index => $ent) {
    if (!empty($ent)) {
        $html .= '<div style="margin-bottom:15px;">';
        $html .= '<strong>' . htmlspecialchars($ent) . '</strong> - ' . htmlspecialchars($poste[$index] ?? '');
        $html .= '<br><span class="date">' . htmlspecialchars($dateDebut[$index] ?? '') . ' à ' . htmlspecialchars($dateFin[$index] ?? '') . '</span>';
        $html .= '<p style="margin-top:5px;">' . nl2br(htmlspecialchars($descPoste[$index] ?? '')) . '</p>';
        $html .= '</div>';
    }
}

$html .= '</div></div>';

$html .= '<div class="separator"></div>';

$html .= '<div class="section"><h3>Formations</h3><div class="text-start-block">';
foreach ($ecole as $index => $esc) {
    if (!empty($esc)) {
        $html .= '<div style="margin-bottom:15px;">';
        $html .= '<strong>' . htmlspecialchars($diplome[$index] ?? '') . '</strong> - ' . htmlspecialchars($esc);
        $html .= '<br><span class="date">' . htmlspecialchars($anneeDebut[$index] ?? '') . ' à ' . htmlspecialchars($anneeFin[$index] ?? '') . '</span>';
        $html .= '</div>';
    }
}
$html .= '</div></div>';

$html .= '<div class="separator"></div>';

$html .= '<div class="section"><h3>Compétences</h3><div class="comp-container">';
if (!empty($competence)) {
    foreach ($competence as $comp) {
        $imgName = strtolower(trim($comp));

        if ($imgName == "html" || $imgName == "html/css") {
            $imgName = "html-5";
        } elseif ($imgName == "js") {
            $imgName = "javascript";
        }

        $imgPath = __DIR__ . '/ressources/icons8-' . $imgName . '-50.png';

        $html .= '<div class="comp-item">';
        $html .= '<strong>' . htmlspecialchars($comp) . '</strong>';

        if (file_exists($imgPath)) {
            $dataImg = file_get_contents($imgPath);
            $base64Img = 'data:image/png;base64,' . base64_encode($dataImg);
            $html .= '<img src="' . $base64Img . '">';
        }
        $html .= '</div>';
    }
}
$html .= '</div></div>';

$html .= '<div class="separator"></div>';

$html .= '<div class="section"><h3>Langues</h3><div class="text-start-block">';
foreach ($langues as $index => $lang) {
    if (!empty($lang)) {
        $html .= '<div><strong>' . htmlspecialchars($lang) . '</strong> : ' . htmlspecialchars($niveau[$index] ?? '') . '</div>';
    }
}
$html .= '</div></div>';

$html .= '<div class="separator"></div>';

$html .= '<div class="section"><h3>Centres d\'intérêt</h3><div class="text-start-block">';
if (!empty($interet1)) $html .= '<div>• ' . htmlspecialchars($interet1) . '</div>';
if (!empty($interet2)) $html .= '<div>• ' . htmlspecialchars($interet2) . '</div>';
$html .= '</div></div>';

$html .= '</div></body></html>';

ob_clean();
$options = new Options();
$options->set('isRemoteEnabled', true);
$options->set('isHtml5ParserEnabled', true);
$options->set('chroot', __DIR__);
$dompfd = new Dompdf($options);
$dompfd->loadHtml($html);
$dompfd->setPaper("A4", "portrait");
$dompfd->render();
$dompfd->stream("mon_cv.pdf", ["Attachment" => false]);
