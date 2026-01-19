<?php
require "vendor/autoload.php";
use Dompdf\Options;
use Dompdf\Dompdf;
$options = new Options();

$options->set('isRemoteEnabled', true); 
$options->set('isHtml5ParserEnabled', true);
$options->set('chroot', __DIR__);

$photo = "";

if (isset($_FILES['photo']) && $_FILES['photo']['error'] === 0) {
    $uploaddir = 'uploads/';
    if (!is_dir($uploaddir)) { mkdir($uploaddir, 0777, true); }
    
    $filename = time() . '_' . $_FILES['photo']['name'];
    $uploadfile = $uploaddir . $filename;

    if (move_uploaded_file($_FILES['photo']['tmp_name'], $uploadfile)) {
        $type = pathinfo($uploadfile, PATHINFO_EXTENSION);
        $data = file_get_contents($uploadfile);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
        $photo = '<img src="' . $base64 . '" class="p-photo" style="width:120px; height:120px; border-radius:50%;">';
    }
}


$nom = htmlspecialchars($_POST["nom"]);
$prenom = htmlspecialchars($_POST["prenom"]);
$email = htmlspecialchars($_POST["email"]);
$postev = htmlspecialchars($_POST["posteV"]);
$numero = htmlspecialchars($_POST["numero"]);
$profil = htmlspecialchars($_POST["profil"]);

$entreprise = $_POST["entreprise"];
$poste = $_POST["poste"];
$dateDebut = $_POST["dateDebut"];
$dateFin = $_POST["dateFin"];
$descPoste = $_POST["descPoste"];

$ecole = $_POST["ecole"];
$diplome = $_POST["diplome"];
$anneeDebut = $_POST["anneeDebut"];
$anneeFin = $_POST["anneeFin"];

$competence = $_POST["competence"];

$langues = $_POST["langues"];
$niveau = $_POST["niveau"];

$interet1 = htmlspecialchars($_POST["interet1"]);
$interet2 = htmlspecialchars($_POST["interet2"]);

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
            $photo
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
        $html .= '<strong>' . htmlspecialchars($ent) . '</strong> - ' . htmlspecialchars($poste[$index]);
        $html .= '<br><span class="date">' . htmlspecialchars($dateDebut[$index]) . ' à ' . htmlspecialchars($dateFin[$index]) . '</span>';
        $html .= '<p style="margin-top:5px;">' . nl2br(htmlspecialchars($descPoste[$index])) . '</p>';
        $html .= '</div>';
    }
}

$html .= '</div><div class="separator"></div></div>';

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
        } else { 
        }
        $html .= '</div>';
    }
}
        $html .= '</div>';
    

$html .= '</div><div class="separator"></div></div>';

$html .= '<div class="section"><h3>Langues</h3><div class="text-start-block">';
foreach ($langues as $index => $lang) {
    if (!empty($lang)) {
        $html .= '<div><strong>' . htmlspecialchars($lang) . '</strong> : ' . htmlspecialchars($niveau[$index]) . '</div>';
    }
}
$html .= '</div><div class="separator"></div></div>';

$html .= '      </td>
                    <td style="width: 50%; vertical-align: top;">
                        <h3>Centres d\'intérêt</h3>';
if (!empty($interet1)) $html .= '<div>• ' . $interet1 . '</div>';
if (!empty($interet2)) $html .= '<div>• ' . $interet2 . '</div>';
$html .= '      </td>
                </tr>
            </table>
        </div>';

$html .= '</div></body></html>';


$dompfd = new Dompdf($options);
$dompfd -> loadHtml($html);
$dompfd -> setPaper("A4", "portrait");
$dompfd -> render();

ob_end_clean(); 

$dompfd->stream("mon_cv.pdf", ["Attachment" => false]);
exit();

