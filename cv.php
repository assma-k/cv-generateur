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
                        <h2 class="m-3">informations général</h2>
                        <input type="file" id="photo" name="photo-cv" class="form-control rounded p-2 w-75 m-3"/>
                        <input type="text" id="nom" name="nom" placeholder="nom" required class="form-control rounded p-2 m-3 w-75" />
                        <input type="text" id="prenom" name="prenom" placeholder="prenom" required class="form-control rounded p-2 m-3 w-75" />
                        <input type="email" id="email" name="email" placeholder="email" class="form-control rounded p-2 m-3 w-75" />
                        <input type="text" id="posteV" name="posteV" placeholder="poste visé" class="form-control rounded p-2 m-3 w-75" />
                        <input type="tel" id="numero" name="numero" placeholder="06 00 00 00 00" class="form-control rounded p-2 m-3 w-75" />
                        <textarea id="profil" name="profil" rows="4" cols="50" required class="form-control rounded p-2 m-3 w-75" placeholder="mon profil"></textarea>
                    </fieldset>
                    <fieldset>
                        <h2>expérience</h2>
                        <div id="liste-experience"></div>
                        <input type="text" id="entreprise" name="entreprise[]" placeholder="entreprise"class="form-control rounded p-2 m-3 w-75" />
                        <input type="text" id="poste" name="poste[]" placeholder="intituler du poste" class="form-control rounded p-2 m-3 w-75" />
                        <input type="number" id="dateDebut" name="dateDebut[]" placeholder="2020" min="1900" max="2026" class="form-control rounded p-2 m-3 w-75" />
                        <input type="number" id="dateFin" name="dateFin[]" placeholder="2025" min="1900" max="2026" class="form-control rounded p-2 m-3 w-75" />
                        <textarea id="descPoste" name="descPoste[]" rows="3" cols="50" class="form-control rounded p-2 m-3 w-75">description du poste</textarea>
                        <button type="button" id="add-xp" onclick="ajouterExperience()" class="btn btn-outline-dark m-3 text-center w-50">Ajouter</button>
                    </fieldset>
                    <fieldset>
                        <h2>Formations</h2>
                        <div id="liste-formation"></div>
                        <input type="text" id="ecole" name="ecole[]" placeholder="ecole" class="form-control rounded p-2 m-3 w-75" />
                        <input type="text" id="diplome" name="diplome[]" placeholder="diplome" class="form-control rounded p-2 m-3 w-75" />
                        <input type="number" id="anneeDebut" name="anneeDebut[]" min="1900" placeholder="2020"  class="form-control rounded p-2 m-3 w-75" />
                        <input type="number" id="anneeFin" name="anneeFin[]" min="1900" placeholder="2023"  class="form-control rounded p-2 m-3 w-75" />
                        <button type="button" onclick="ajouterFormation()">Ajouter</button>
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
                        <input type="text" id="langues" name="langues[]" placeholder="langues" class="form-control rounded p-2 m-3 w-75" >
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
                        <input type="text" id="interet1" name="interet1" placeholder="loisir">
                        <input type="text" id="interet2" name="interet2" placeholder="loisir">
                    </fieldset>
                    <button type="submit">Enregistrer / Créer le CV</button>
                </form>
            </div>
            <div class="col-lg-6 vh-100">
                <div>
                    <img id="p-photo"/>
                    <div class="clearfix">
                    <h2 id="p-nom" class="float-start me-3"></h2>
                    <h2 id="p-prenom" class="float-start"></h2>
                    </div>
                    <p><span id="p-email"></span> | <span id="p-numero"></span></p>
                    <h4 id="p-posteV"></h4>
                    <p id="p-profil"></p>
                </div>
                <div>
                    <h3>Experiences</h3>
                    <div id="prev-experience-liste"></div>
                </div>
                <div>
                    <h3>Formations</h3>
                    <div id="prev-formation-liste"></div>
                </div>
                <div>
                    <h3>Competences</h3>
                <div id="prev-competence"></div>
                </div>
                <div>
                    <h3>Langues</h3>
                    <div id="prev-langues"></div>
                </div>
                <div>
                    <h3>centre d'interêt</h3>
                    <div id="p-interet1"></div>
                    <div id="p-interet2"></div>
                </div>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
</body>

</html>