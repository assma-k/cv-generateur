<?php
require "vendor/autoload.php";
use Dompdf\Dompdf;

$nom = htmlspecialchars($_POST["nom"]);
$prenom = htmlspecialchars($_POST["prenom"]);
$email = htmlspecialchars($_POST["email"]);
$postev = htmlspecialchars($_POST["postev"]);
$numero = htmlspecialchars($_POST["numero"]);
$profil = htmlspecialchars($_POST["profil"]);

$entreprise = $_POST["entreprise"];
$poste = $_POST["poste"];
$dateDebut = $_POST["dateDebut"];
$dateFin = $_POST["dateFin"];
$descPoste = $_POST["descposte"];

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
        body { font-family: 'Helvetica', sans-serif; font-size: 13px; color: #333; }
        .header { text-align: center; border-bottom: 2px solid #333; padding-bottom: 10px; margin-bottom: 20px; }
        h1 { margin: 0; text-transform: uppercase; color: #000; }
        h2 { background-color: #eee; padding: 5px; font-size: 16px; border-left: 5px solid #333; }
        .section { margin-bottom: 15px; }
        .item { margin-bottom: 10px; }
        .date { font-style: italic; color: #666; }
        .badge { display: inline-block; background: #333; color: #fff; padding: 3px 8px; margin: 2px; border-radius: 3px; font-size: 11px; }
    </style>
</head>
<body>
    <div class="header">
        <h1>$prenom $nom</h1>
        <p><strong>$postev</strong></p>
        <p>$email | $numero</p>
    </div>

    <div class="section">
        <h2>Profil</h2>
        <p>$profil</p>
    </div>
EOD;

$html .= '<div class="section"><h2>Expériences Professionnelles</h2>';
foreach ($entreprise as $index => $ent) {
    if (!empty($ent)) {
        $html .= '<div class="item">';
        $html .= '<strong>' . htmlspecialchars($ent) . '</strong> - ' . htmlspecialchars($poste[$index]);
        $html .= '<br><span class="date">' . htmlspecialchars($dateDebut[$index]) . ' à ' . htmlspecialchars($dateFin[$index]) . '</span>';
        $html .= '<p>' . nl2br(htmlspecialchars($descPoste[$index])) . '</p>';
        $html .= '</div>';
    }
}
$html .= '</div>';

$html .= '<div class="section"><h2>Formations</h2>';
foreach ($ecole as $index => $eco) {
    if (!empty($eco)) {
        $html .= '<div class="item">';
        $html .= '<strong>' . htmlspecialchars($eco) . '</strong> - ' . htmlspecialchars($diplome[$index]);
        $html .= '<br><span class="date">' . htmlspecialchars($anneeDebut[$index]) . ' à ' . htmlspecialchars($anneeFin[$index]) . '</span>';
        $html .= '</div>';
    }
}
$html .= '</div>';

$html .= '<div class="section"><h2>Compétences Techniques</h2>';
if (!empty($competence)) {
    foreach ($competence as $comp) {
        $html .= '<span class="badge">' . htmlspecialchars($comp) . '</span> ';
    }
}
$html .= '</div>';

// 5. AJOUT DES LANGUES
$html .= '<div class="section"><h2>Langues</h2>';
foreach ($langues as $index => $lang) {
    if (!empty($lang)) {
        $html .= '<div>' . htmlspecialchars($lang) . ' : <em>' . htmlspecialchars($niveau[$index]) . '</em></div>';
    }
}
$html .= '</div>';

$html .= '</body></html>';