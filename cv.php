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
            
            <div class="col-12 col-lg-6 min-vh-100 bg-dark text-light p-4" data-bs-theme="dark">
                <div class="p-3 text-end">
    <button class="btn btn-outline-secondary" id="themeToggler" onclick="toggleMode()">
        <span id="themeIcon">🌙</span> Mode Sombre
    </button>
</div>
                <form action="export.php" method="post" enctype="multipart/form-data">
                    <fieldset>
                        <h2 class="ms-2 mt-3 mb-3">informations général</h2>
                        <input type="file" id="photo" name="photo-cv" class="form-control rounded p-2 w-75 ms-2 mt-3 mb-3" onchange="photoCv()"/>
                        <input type="text" id="nom" name="nom" placeholder="nom" required class="form-control rounded p-2 ms-2 mt-3 mb-3 w-75" />
                        <input type="text" id="prenom" name="prenom" placeholder="prenom" required class="form-control rounded p-2 ms-2 mt-3 mb-3 w-75" />
                        <input type="email" id="email" name="email" placeholder="email" class="form-control rounded p-2 ms-2 mt-3 mb-3 w-75" />
                        <input type="text" id="posteV" name="posteV" placeholder="poste visé" class="form-control rounded p-2 ms-2 mt-3 mb-3 w-75" />
                        <input type="tel" id="numero" name="numero" placeholder="06 00 00 00 00" class="form-control rounded p-2 ms-2 mt-3 mb-3 w-75" />
                        <textarea id="profil" name="profil" rows="4" cols="50" required class="form-control rounded p-2 ms-2 mt-3 mb-3 w-75" placeholder="mon profil"></textarea>
                    </fieldset>
                    <fieldset>
                        <h2 class="ms-2 mt-3 mb-3">expérience</h2>
                        <div id="liste-experience"></div>
                        <input type="text" id="entreprise" name="entreprise[]" placeholder="entreprise"class="form-control rounded p-2 ms-2 mt-3 mb-3 w-75" />
                        <input type="text" id="poste" name="poste[]" placeholder="intituler du poste" class="form-control rounded p-2 ms-2 mt-3 mb-3 w-75" />
                        <input type="number" id="dateDebut" name="dateDebut[]" placeholder="2020" min="1900" max="2026" class="form-control rounded p-2 ms-2 mt-3 mb-3 w-75" />
                        <input type="number" id="dateFin" name="dateFin[]" placeholder="2025" min="1900" max="2026" class="form-control rounded p-2 ms-2 mt-3 mb-3 w-75" />
                        <textarea id="descPoste" name="descPoste[]" rows="3" cols="50" class="form-control rounded p-2 ms-2 mt-3 mb-3 w-75" placeholder="description du poste"></textarea>
                        <button type="button" id="add-xp" onclick="ajouterExperience()" class="btn btn-outline-light ms-2 mt-3 mb-3 ms-5 w-50 rounded">Ajouter</button>
                    </fieldset>
                    <fieldset>
                        <h2 class="ms-2 mt-3 mb-3">Formations</h2>
                        <div id="liste-formation"></div>
                        <input type="text" id="ecole" name="ecole[]" placeholder="ecole" class="form-control rounded p-2 ms-2 mt-3 mb-3 w-75" />
                        <input type="text" id="diplome" name="diplome[]" placeholder="diplome" class="form-control rounded p-2 ms-2 mt-3 mb-3 w-75" />
                        <input type="number" id="anneeDebut" name="anneeDebut[]" min="1900" placeholder="2020"  class="form-control rounded p-2 ms-2 mt-3 mb-3 w-75" />
                        <input type="number" id="anneeFin" name="anneeFin[]" min="1900" placeholder="2023"  class="form-control rounded p-2 ms-2 mt-3 mb-3 w-75" />
                        <button type="button" onclick="ajouterFormation()" class="btn btn-outline-light ms-2 mt-3 mb-3 ms-5 w-50 rounded">Ajouter</button>
                    </fieldset>
                    <fieldset>
                        <h2 class="ms-2 mt-3 mb-3">Competence</h2>
                        <div class="d-flex flex-row gap-3">
                        <label class="checkbox d-flex flex-column-reverse align-items-center mb-4">
                            <input type="checkbox" name="competence[]" value="HTML" onchange="competenceMaj()">
                            <img src="./ressources/icons8-html-5-50.png">
                            <span>HTML/CSS</span>
                        </label>
                        <label class="checkbox d-flex flex-column-reverse align-items-center mb-4">
                            <input type="checkbox" name="competence[]" value="JS" onchange="competenceMaj()">
                            <img src="./ressources/icons8-javascript-50.png">
                            <span>JS</span>
                        </label>
                        <label class="checkbox d-flex flex-column-reverse align-items-center mb-4">
                            <input type="checkbox" name="competence[]" value="PHP" onchange="competenceMaj()">
                            <img src="./ressources/icons8-logo-php-50.png">
                            <span>PHP</span>
                        </label>
                        <label class="checkbox d-flex flex-column-reverse align-items-center mb-4">
                            <input type="checkbox" name="competence[]" value="git" onchange="competenceMaj()">
                            <img src="./ressources/icons8-git-50.png">
                            <span>git</span>
                        </label>
                        <label class="checkbox d-flex flex-column-reverse align-items-center mb-4">
                            <input type="checkbox" name="competence[]" value="python" onchange="competenceMaj()">
                            <img src="./ressources/icons8-python-50.png">
                            <span>python</span>
                        </label>
                        <label class="checkbox d-flex flex-column-reverse align-items-center mb-4">
                            <input type="checkbox" name="competence[]" value="SQL" onchange="competenceMaj()">
                            <img src="./ressources/icons8-sql-50.png">
                            <span>SQL</span>
                        </label>
                        </div>
                    </fieldset>
                    <fieldset>
                        <h2 class="ms-2 mt-3 mb-3">Langues</h2>
                        <div id="listes-langues">
                        <input type="text" id="langues" name="langues[]" placeholder="langues" class="form-control rounded p-2 ms-2 mt-3 mb-3 w-75" >
                        <select name="niveau[]" id="niveau-select">
                    
                            <option value="">niveau</option>
                            <option value="debutant">debutant</option>
                            <option value="intermédiaire">intermédiaire</option>
                            <option value="anvancé">anvancé</option>
                            <option value="courant">courant</option>
                        </select>
                        <button type="button" onclick="languesP()" class="btn btn-outline-light ms-2 mt-3 mb-3 ms-5 w-50 rounded">Ajouter</button>
                        </div>
                    </fieldset>
                    <fieldset>
                        <h2 class="ms-2 mt-3 mb-3">Centres d'interêt</h2>
                        <input type="text" id="interet1" name="interet1" placeholder="loisir">
                        <input type="text" id="interet2" name="interet2" placeholder="loisir">
                    </fieldset>
                    <button type="submit" class="btn btn-outline-light ms-2 mt-3 mb-3 ms-5 w-50 rounded">Enregistrer / Créer le CV</button>
                </form>
            </div>
            <div class="col-12 col-lg-6 min-vh-100 text-center">
                <div class="clearfix">
                    <img id="p-photo"/>
                    <div class="clearfix">
                    <h2><span id="p-nom" class="ms-3"></span>
                    <span id="p-prenom"></span></h2>
                    </div>
                    <p><span id="p-email"></span> | <span id="p-numero"></span></p>
                    <h4 id="p-posteV"></h4>
                    <p id="p-profil"></p>
                    <fieldset class="border border-bottom-1 border-dark w-75 mx-auto"></fieldset>
                </div>
                <div>
                    <h3>Experiences</h3>
                    <div id="prev-experience-liste"></div>
                    <fieldset class="border border-bottom-1 border-dark w-75 mx-auto"></fieldset>
                </div>
                <div>
                    <h3>Formations</h3>
                    <div id="prev-formation-liste"></div>
                    <fieldset class="border border-bottom-1 border-dark w-75 mx-auto"></fieldset>
                </div>
                <div>
                    <h3>Competences</h3>
                <div id="prev-competence"></div>
                <fieldset class="border border-bottom-1 border-dark w-75 mx-auto"></fieldset>
                </div>
                <div>
                    <h3>Langues</h3>
                    <div id="prev-langues"></div>
                    <fieldset class="border border-bottom-1 border-dark w-75 mx-auto"></fieldset>
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