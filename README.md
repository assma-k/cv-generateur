# 📝 Générateur de CV Dynamique

## 📌 Présentation
Ce projet est une application web interactive permettant de concevoir un CV professionnel de A à Z. L'utilisateur remplit ses informations dans un formulaire dynamique et visualise instantanément le résultat final. Une fois la saisie terminée, un export PDF est généré via PHP.

---

## 🚀 Fonctionnalités Clés

### 1. Édition Dynamique (JavaScript)
* **Preview en temps réel** : Synchronisation immédiate entre la saisie et l'aperçu visuel.
* **Gestion des listes** : Ajout et suppression illimitée d'expériences, de formations et de langues sans rechargement de page.


### 2. Export Professionnel (PHP)
* **Traitement de données complexes** : Récupération des données via des tableaux PHP.
* **Génération PDF** : Utilisation de la bibliothèque **Dompdf** pour transformer le template HTML/CSS en document PDF prêt pour l'impression.



---

## 🛠️ Technologies utilisées
* **Frontend** : HTML, boostrap, JavaScript.
* **Backend** : PHP 8.x.
* **Moteur PDF** : Dompdf (via Composer).

---

## ⚙️ Installation et Utilisation
1.  Déposer le dossier du projet sur un serveur local (**XAMPP**, **WAMP** ou **MAMP**).
2.  Si le dossier `vendor` est absent, installer les dépendances avec :
    ```bash
    composer install
    ```
3.  Ouvrir le navigateur à l'adresse `localhost/votre-projet`.
4.  Remplir les champs et cliquer sur "Générer" pour obtenir le PDF.

---