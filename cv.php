<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Génerateur de CV</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

</head>

<body>
    <div class="container-fluid p-0">
        <div class="row g-0">
            <div class="col-lg-6 vh-100">
                <form action="export.php" method="post" enctype="multipart/form-data">
                    <fieldset>
                        <h2>informations général</h2>
                        <input type="file" id="photo" name="photo-cv" class="input-group rounded p-2"/>
                        <input type="text" id="nom" name="nom" placeholder="nom" required class="input-group rounded p-2 m-3 w-75" />
                        <input type="text" id="prenom" name="prenom" placeholder="prenom" required class="input-group rounded p-2 m-3 w-75" />
                        <input type="email" id="email" name="email" placeholder="email" required class="input-group rounded p-2 m-3 w-75" />
                        <input type="text" id="posteV" name="posteV" placeholder="poste visé" class="input-group rounded p-2 m-3 w-75" />
                        <input type="tel" id="numero" name="numero" placeholder="06 00 00 00 00" class="input-group rounded p-2 m-3 w-75" />
                        <textarea id="profil" name="profil" rows="4" cols="50" required>mon profil</textarea>
                    </fieldset>
                    <fieldset>
                        <h2>expérience</h2>
                        <div id="liste-esperience"></div>
                        <input type="text" id="entreprise" name="entreprise[]" placeholder="entreprise"class="input-group rounded p-2 m-3 w-75" />
                        <input type="text" id="poste" name="poste[]" placeholder="intituler du poste" class="input-group rounded p-2 m-3 w-75" />
                        <input type="number" id="dateDebut" name="dateDebut[]" placeholder="2020" min="1900" max="2026" class="input-group rounded p-2 m-3 w-75" />
                        <input type="number" id="dateFin" name="dateFin[]" placeholder="2025" min="1900" max="2026" class="input-group rounded p-2 m-3 w-75" />
                        <textarea id="descPoste" name="descPoste[]" rows="3" cols="50">description du poste</textarea>
                        <button type="button" id="add-xp" onclick="ajouterExperience()">Ajouter</button>
                    </fieldset>
                    <fieldset>
                        <h2>Formations</h2>
                        <div id="liste-formation"></div>
                        <input type="text" id="ecole" name="ecole[]" placeholder="ecole" required class="input-group rounded p-2 m-3 w-75" />
                        <input type="text" id="diplome" name="diplome[]" placeholder="diplome" required class="input-group rounded p-2 m-3 w-75" />
                        <input type="number" id="anneeDebut" name="anneeDebut[]" min="1900" placeholder="2020" required class="input-group rounded p-2 m-3 w-75" />
                        <input type="number" id="anneeFin" name="anneeFin[]" min="1900" placeholder="2023" required class="input-group rounded p-2 m-3 w-75" />
                        <button type="button">Ajouter</button>
                    </fieldset>
                    <fieldset>
                        <h2>Competence</h2>
                        <label class="checkbox">
                            <input type="checkbox" name="competence[]" value="HTML" onchange="competenceMaj()">
                            <img src="./ressources/icons8-html-5-50.png">
                            <span>HTML/CSS</span>
                        </label>
                        <label class="checkbox">
                            <input type="checkbox" name="competence[]" value="JS" onchange="competenceMaj()">
                            <img src="./ressources/icons8-javascript-50.png">
                            <span>JS</span>
                        </label>
                        <label class="checkbox">
                            <input type="checkbox" name="competence[]" value="PHP" onchange="competenceMaj()">
                            <img src="./ressources/icons8-logo-php-50.png">
                            <span>PHP</span>
                        </label>
                        <label class="checkbox">
                            <input type="checkbox" name="competence[]" value="git" onchange="competenceMaj()">
                            <img src="./ressources/icons8-git-50.png">
                            <span>git</span>
                        </label>
                        <label class="checkbox">
                            <input type="checkbox" name="competence[]" value="python" onchange="competenceMaj()">
                            <img src="./ressources/icons8-python-50.png">
                            <span>python</span>
                        </label>
                        <label class="checkbox">
                            <input type="checkbox" name="competence[]" value="SQL" onchange="competenceMaj()">
                            <img src="./ressources/icons8-sql-50.png">
                            <span>SQL</span>
                        </label>
                    </fieldset>
                    <fieldset>
                        <h2>Langues</h2>
                        <div id="listes-langues">
                        <input type="text" id="langues" name="langues[]" placeholder="langues" class="input-group rounded p-2 m-3 w-75" >
                        <select name="niveau[]" id="niveau-select">
                    
                            <option value="">niveau</option>
                            <option value="debutant">debutant</option>
                            <option value="intermédiaire">intermédiaire</option>
                            <option value="anvancé">anvancé</option>
                            <option value="courant">courant</option>
                        </select>
                        <button type="button" onclick="languesP()">Ajouter</button>
                        </div>
                    </fieldset>
                    <fieldset>
                        <h2>Centres d'interêt</h2>
                        <input type="text" id="interet" name="interet1" placeholder="loisir">
                        <input type="text" id="interet" name="interet2" placeholder="loisir">
                    </fieldset>
                    <button type="submit">Enregistrer / Créer le CV</button>
                </form>
            </div>
            <div class="col-lg-6 vh-100">
                <div>
                    <img id="prev-photo"/>
                    <h2 id="p-nom"></h2>
                    <h2 id="p-prenom"></h2>
                    <h3 id="p-poste"></h3>
                    <p class="p-email"></p>
                    <p id="p-numero"></p>
                    <p id="p-profils"></p>
                </div>
                <div>
                    <h2>Experiences</h2>
                    <div id="prev-esperience-liste"></div>
                </div>
                <div>
                    <h2>Formations</h2>
                    <div id="prev-formation-liste"></div>
                </div>
                <div>
                    <h2>Competences</h2>
                <div id="prev-competence"></div>
                </div>
                <div>
                    <h2>Langues</h2>
                    <div id="prev-langues"></div>
                </div>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
</body>

</html>