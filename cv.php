<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Génerateur de CV</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>

<body>
    <div class="container-fluid p-0">
        <div class="row g-0">
            <div class="col-lg-6 vh-100">
                <form>
                    <fieldset>
                        <h2>informations général</h2>
                        <input type="text" id="nom" placeholder="nom" required />
                        <input type="text" id="prenom" placeholder="prenom" required />
                        <input type="email" id="email" placeholder="email" required />
                        <input type="text" id="poste" placeholder="poste visé" />
                        <input type="tel" id="numero" placeholder="06 00 00 00 00" />
                        <textarea id="profil" rows="4" cols="50" required>mon profil</textarea>
                    </fieldset>
                    <fieldset>
                        <h2>expérience</h2>
                        <div id="liste-esperience"></div>
                        <input type="text" id="entreprise" placeholder="entreprise" />
                        <input type="text" id="poste" placeholder="intituler du poste" />
                        <input type="number" id="dateDebut" placeholder="2020" min="1900" max="2026" />
                        <input type="number" id="dateFin" placeholder="2025" min="1900" max="2026" />
                        <textarea id="descPoste" rows="3" cols="50">description du poste</textarea>
                        <button type="button" id="add-xp" onclick="ajouterExperience()">Ajouter</button>
                    </fieldset>
                    <fieldset>
                        <h2>Formations</h2>
                        <div id="liste-formation"></div>
                        <input type="text" id="ecole" placeholder="ecole" required />
                        <input type="text" id="diplome" placeholder="diplome" required />
                        <input type="number" id="anneeDebut" min="1900" placeholder="2020" required />
                        <input type="number" id="anneeFin" min="1900" placeholder="2023" required />
                        <button type="button">Ajouter</button>
                    </fieldset>
                    <fieldset>
                        <h2>Competence</h2>
                        <label class="checkbox">
                            <input type="checkbox" name="competence[]" value="HTML" onchange="competenceMaj()">
                            <i class="fa-brands fa-html5"></i>
                            <span>HTML/CSS</span>
                        </label>
                        <label class="checkbox">
                            <input type="checkbox" name="competence[]" value="JS" onchange="competenceMaj()">
                            <i class="fa-brands fa-js"></i>
                            <span>JS</span>
                        </label>
                        <label class="checkbox">
                            <input type="checkbox" name="competence[]" value="PHP" onchange="competenceMaj()">
                            <i class="fa-brands fa-php"></i>
                            <span>PHP</span>
                        </label>
                        <label class="checkbox">
                            <input type="checkbox" name="competence[]" value="git" onchange="competenceMaj()">
                            <i class="fa-brands fa-git-alt"></i>
                            <span>git</span>
                        </label>
                        <label class="checkbox">
                            <input type="checkbox" name="competence[]" value="python" onchange="competenceMaj()">
                            <i class="fa-brands fa-python"></i>
                            <span>python</span>
                        </label>
                        <label class="checkbox">
                            <input type="checkbox" name="competence[]" value="SQL" onchange="competenceMaj()">
                            <i class="fa-solid fa-database"></i>
                            <span>SQL</span>
                        </label>
                    </fieldset>
                    <fieldset>
                        <h2>Langues</h2>
                        <input type="text" id="langues" placeholder="langues">
                        <select name="niveau" id="niveau-select">
                            <option value="">niveau</option>
                            <option value="debutant">debutant</option>
                            <option value="intermédiaire">intermédiaire</option>
                            <option value="anvancé">anvancé</option>
                            <option value="courant">courant</option>
                        </select>
                        <button type="button">Ajouter</button>
                    </fieldset>
                    <fieldset>
                        <h2>Centres d'interêt</h2>
                        <input type="text" id="interet" placeholder="loisir">
                        <input type="text" id="interet" placeholder="loisir">
                    </fieldset>

                </form>
            </div>
            <div class="col-lg-6 vh-100">
                <div>
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
            </div>
        </div>
    </div>
    <script src="script.js"></script>
</body>

</html>