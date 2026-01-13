const inp = document.querySelectorAll("input, textarea");
inp.forEach(function (vari) {
  vari.addEventListener("input", function () {
    let idSource = this.id;
    let cible = document.getElementById("p-" + idSource);
    cible.textContent = this.value;
  });
});

function ajouterExperience() {
  let ent = document.getElementById("entreprise").value;
  let pos = document.getElementById("poste").value;
  let deb = document.getElementById("dateDebut").value;
  let fin = document.getElementById("dateFin").value;
  let desc = document.getElementById("descPoste").value;

  let idUnique = Date.now();

  var myDiv = document.createElement("div");
  myDiv.id = `form-${idUnique}`;
  myDiv.innerHTML = `
<div class="experience-item" style="border: 1px solid #ccc; padding: 10px; margin-bottom: 10px;">
        <strong>${pos}</strong> chez <span>${ent}</span> (${deb} - ${fin})
        <p>${desc}</p>
        
        <input type="hidden" name="entreprise[]" value="${ent}">
        <input type="hidden" name="poste[]" value="${pos}">
        <input type="hidden" name="dateDebut[]" value="${deb}">
        <input type="hidden" name="dateFin[]" value="${fin}">
        <input type="hidden" name="descPoste[]" value="${desc}">

        <button type="button" onclick="document.getElementById('form-${idUnique}').remove(); document.getElementById('prev-${idUnique}').remove();">
        Supprimer
    </button>
         </div>`;

  document.getElementById("liste-experience").appendChild(myDiv);

  document.getElementById("entreprise").value = "";
  document.getElementById("poste").value = "";
  document.getElementById("dateDebut").value = "";
  document.getElementById("dateFin").value = "";
  document.getElementById("descPoste").value = "";

  var prevDiv = document.createElement("div");
  prevDiv.id = `prev-${idUnique}`;
  prevDiv.innerHTML = `
    <div class="cv-experience-block">
        <h4>${pos} - ${ent}</h4>
        <small>${deb} à ${fin}</small>
        <p>${desc}</p>
    </div>
`;

  document.getElementById("prev-experience-liste").appendChild(prevDiv);
};

function ajouterFormation() {
  let eco = document.getElementById("ecole").value;
  let dip = document.getElementById("diplome").value;
  let deba = document.getElementById("anneeDebut").value;
  let fina = document.getElementById("anneeFin").value;

  
  let idUnique = Date.now();

  var myDiv = document.createElement("div");
  myDiv.id = `form-${idUnique}`;
  myDiv.innerHTML = `
<div class="formation-item" style="border: 1px solid #ccc; padding: 10px; margin-bottom: 10px;">
        <strong>${dip}</strong> chez <span>${eco}</span> (${deba} - ${fina})
        
        <input type="hidden" name="ecole[]" value="${eco}">
        <input type="hidden" name="diplome[]" value="${dip}">
        <input type="hidden" name="anneeDebut[]" value="${deba}">
        <input type="hidden" name="anneeFin[]" value="${fina}">

        <button type="button" onclick="document.getElementById('form-${idUnique}').remove(); document.getElementById('prev-${idUnique}').remove();">
        Supprimer
    </button>
         </div>`;

         document.getElementById("liste-formation").appendChild(myDiv);

         document.getElementById("ecole").value = "";
  document.getElementById("diplome").value = "";
  document.getElementById("anneeDebut").value = "";
  document.getElementById("anneeFin").value = "";

  var prevDiv = document.createElement("div");
  prevDiv.id = `prev-${idUnique}`;
  prevDiv.innerHTML = `
    <div class="cv-experience-block">
        <h4>${dip} - ${eco}</h4>
        <small>${deba} à ${fina}</small>
    </div>
`;

document.getElementById("prev-formation-liste").appendChild(prevDiv);
};

function competenceMaj(){
    const prev = document.getElementById("prev-competence");
    prev.innerHTML = "";
    const check = document.querySelectorAll('input[name="competence[]"]:checked');

    check.forEach(box => {
        const comp = box.value;
        const icon = box.nextElementSibling.className;

        const badge = document.createElement("span");
        badge.className = "competence-badge";
        badge.innerHTML = `<i class="${icon}"></i> ${comp}`;

        prev.appendChild(badge);
    });
};