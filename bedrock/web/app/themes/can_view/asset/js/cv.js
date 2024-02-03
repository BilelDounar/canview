//langues
document.addEventListener('DOMContentLoaded', function () {
    var searchInputLangues = document.querySelector('#searchInputLangues');
    var boxDataLangues = document.querySelector('#boxDataLangues');
    var addLanguesButton = document.querySelector('#addLangues');

    var languesStorage = JSON.parse(localStorage.getItem('langues')) || [];
    languesStorage.forEach(function (langue) {
        ajouterLangue(langue);
    });

    addLanguesButton.addEventListener('click', function () {
        var nouvelleLangue = searchInputLangues.value;

        ajouterLangue(nouvelleLangue);

        languesStorage.push(nouvelleLangue);
        localStorage.setItem('langues', JSON.stringify(languesStorage));

        searchInputLangues.value = '';
    });

    function ajouterLangue(langue) {
        var selectLangues = document.querySelector('#searchInputLangues');

        var nouvelleOption = document.createElement('option');
        nouvelleOption.value = langue;
        nouvelleOption.text = langue;


        var nouvelleLangueDiv = document.createElement('div');
        nouvelleLangueDiv.className = 'box_info_added';
        nouvelleLangueDiv.innerHTML = '<span>' + langue + '</span>' +
            '<div><hr class="dashed_hr"><a href="#" class="trashButton" data-langue="' + langue + '"><i class="fa-solid fa-trash-can"></i></a></div>';

        boxDataLangues.appendChild(nouvelleLangueDiv);

        var trashButton = nouvelleLangueDiv.querySelector('.trashButton');
        trashButton.addEventListener('click', function (e) {
            e.preventDefault();
            supprimerLangue(langue);
        });
    }

    function supprimerLangue(langue) {
        var elementsLangue = document.querySelectorAll('.box_info_added');
        elementsLangue.forEach(function (element) {
            if (element.querySelector('span').textContent === langue) {
                element.remove();
            }
        });

        languesStorage = languesStorage.filter(function (lang) {
            return lang !== langue;
        });
        localStorage.setItem('langues', JSON.stringify(languesStorage));
    }
});

//compétences
document.addEventListener('DOMContentLoaded', function () {
    var searchInputCompetences = document.querySelector('#searchInputCompetences');
    var boxDataCompetences = document.querySelector('#boxDataCompetences');
    var addCompetencesButton = document.querySelector('#addCompetences');

    var competencesStorage = JSON.parse(localStorage.getItem('competences')) || [];
    competencesStorage.forEach(function (competence) {
        ajouterCompetence(competence);
    });

    addCompetencesButton.addEventListener('click', function () {
        var nouvelleCompetence = searchInputCompetences.value;
        ajouterCompetence(nouvelleCompetence);
        competencesStorage.push(nouvelleCompetence);
        localStorage.setItem('competences', JSON.stringify(competencesStorage));
        searchInputCompetences.value = '';
    });

    function ajouterCompetence(competence) {
        var selectCompetences = document.querySelector('#searchInputCompetences');
        var nouvelleOption = document.createElement('option');
        nouvelleOption.value = competence;
        nouvelleOption.text = competence;

        var nouvelleCompetenceDiv = document.createElement('div');
        nouvelleCompetenceDiv.className = 'box_info_added';
        nouvelleCompetenceDiv.innerHTML = '<span>' + competence + '</span>' +
            '<div><hr class="dashed_hr"><a href="#" class="trashButton" data-competence="' + competence + '"><i class="fa-solid fa-trash-can"></i></a></div>';

        boxDataCompetences.appendChild(nouvelleCompetenceDiv);

        var trashButton = nouvelleCompetenceDiv.querySelector('.trashButton');
        trashButton.addEventListener('click', function (e) {
            e.preventDefault();
            supprimerCompetence(competence);
        });
    }

    function supprimerCompetence(competence) {
        var elementsCompetence = document.querySelectorAll('.box_info_added');
        elementsCompetence.forEach(function (element) {
            if (element.querySelector('span').textContent === competence) {
                element.remove();
            }
        });

        competencesStorage = competencesStorage.filter(function (comp) {
            return comp !== competence;
        });
        localStorage.setItem('competences', JSON.stringify(competencesStorage));
    }
});

//hard skills
document.addEventListener('DOMContentLoaded', function () {
    var searchInputCompetencesHard = document.querySelector('#searchInputCompetencesHard');
    var boxDataCompetencesHard = document.querySelector('#boxDataCompetencesHard');
    var addCompetencesHardButton = document.querySelector('#addCompetencesHard');

    var competencesHardStorage = JSON.parse(localStorage.getItem('competencesHard')) || [];
    competencesHardStorage.forEach(function (competenceHard) {
        ajouterCompetenceHard(competenceHard);
    });

    addCompetencesHardButton.addEventListener('click', function () {
        var nouvelleCompetenceHard = searchInputCompetencesHard.value;
        ajouterCompetenceHard(nouvelleCompetenceHard);
        competencesHardStorage.push(nouvelleCompetenceHard);
        localStorage.setItem('competencesHard', JSON.stringify(competencesHardStorage));
        searchInputCompetencesHard.value = '';
    });

    function ajouterCompetenceHard(competenceHard) {
        var selectCompetencesHard = document.querySelector('#searchInputCompetencesHard');
        var nouvelleOption = document.createElement('option');
        nouvelleOption.value = competenceHard;
        nouvelleOption.text = competenceHard;

        var nouvelleCompetenceHardDiv = document.createElement('div');
        nouvelleCompetenceHardDiv.className = 'box_info_added';
        nouvelleCompetenceHardDiv.innerHTML = '<span>' + competenceHard + '</span>' +
            '<div><hr class="dashed_hr"><a href="#" class="trashButton" data-competence-hard="' + competenceHard + '"><i class="fa-solid fa-trash-can"></i></a></div>';

        boxDataCompetencesHard.appendChild(nouvelleCompetenceHardDiv);

        var trashButton = nouvelleCompetenceHardDiv.querySelector('.trashButton');
        trashButton.addEventListener('click', function (e) {
            e.preventDefault();
            supprimerCompetenceHard(competenceHard);
        });
    }

    function supprimerCompetenceHard(competenceHard) {
        var elementsCompetenceHard = document.querySelectorAll('.box_info_added');
        elementsCompetenceHard.forEach(function (element) {
            if (element.querySelector('span').textContent === competenceHard) {
                element.remove();
            }
        });

        competencesHardStorage = competencesHardStorage.filter(function (compHard) {
            return compHard !== competenceHard;
        });
        localStorage.setItem('competencesHard', JSON.stringify(competencesHardStorage));
    }
});

//experiences
document.addEventListener('DOMContentLoaded', function () {
    var searchInputExperiences = document.querySelector('#searchInputExperiences');
    var boxDataExperiences = document.querySelector('#boxDataExperiences');
    var addExperiencesButton = document.querySelector('#addExperiences');

    var experiencesStorage = JSON.parse(localStorage.getItem('experiences')) || [];
    experiencesStorage.forEach(function (experience) {
        ajouterExperience(experience);
    });

    addExperiencesButton.addEventListener('click', function () {
        var nouvelleExperience = searchInputExperiences.value;
        ajouterExperience(nouvelleExperience);
        experiencesStorage.push(nouvelleExperience);
        localStorage.setItem('experiences', JSON.stringify(experiencesStorage));
        searchInputExperiences.value = '';
    });

    function ajouterExperience(experience) {
        var nouvelleExperienceDiv = document.createElement('div');
        nouvelleExperienceDiv.className = 'box_info_added';
        nouvelleExperienceDiv.innerHTML = '<span>' + experience + '</span>' +
            '<div><hr class="dashed_hr"><a href="#" class="trashButton" data-experience="' + experience + '"><i class="fa-solid fa-trash-can"></i></a></div>';

        boxDataExperiences.appendChild(nouvelleExperienceDiv);

        var trashButton = nouvelleExperienceDiv.querySelector('.trashButton');
        trashButton.addEventListener('click', function (e) {
            e.preventDefault();
            supprimerExperience(experience);
        });
    }

    function supprimerExperience(experience) {
        var elementsExperience = document.querySelectorAll('.box_info_added');
        elementsExperience.forEach(function (element) {
            if (element.querySelector('span').textContent === experience) {
                element.remove();
            }
        });

        experiencesStorage = experiencesStorage.filter(function (exp) {
            return exp !== experience;
        });
        localStorage.setItem('experiences', JSON.stringify(experiencesStorage));
    }
});

//formations
document.addEventListener('DOMContentLoaded', function () {
    var searchInputFormations = document.querySelector('#searchInputFormations');
    var boxDataFormations = document.querySelector('#boxDataFormations');
    var addFormationsButton = document.querySelector('#addFormations');

    var formationsStorage = JSON.parse(localStorage.getItem('formations')) || [];
    formationsStorage.forEach(function (formation) {
        ajouterFormation(formation);
    });

    addFormationsButton.addEventListener('click', function () {
        var nouvelleFormation = searchInputFormations.value;
        ajouterFormation(nouvelleFormation);
        formationsStorage.push(nouvelleFormation);
        localStorage.setItem('formations', JSON.stringify(formationsStorage));
        searchInputFormations.value = '';
    });

    function ajouterFormation(formation) {
        var nouvelleFormationDiv = document.createElement('div');
        nouvelleFormationDiv.className = 'box_info_added';
        nouvelleFormationDiv.innerHTML = '<span>' + formation + '</span>' +
            '<div><hr class="dashed_hr"><a href="#" class="trashButton" data-formation="' + formation + '"><i class="fa-solid fa-trash-can"></i></a></div>';

        boxDataFormations.appendChild(nouvelleFormationDiv);

        var trashButton = nouvelleFormationDiv.querySelector('.trashButton');
        trashButton.addEventListener('click', function (e) {
            e.preventDefault();
            supprimerFormation(formation);
        });
    }

    function supprimerFormation(formation) {
        var elementsFormation = document.querySelectorAll('.box_info_added');
        elementsFormation.forEach(function (element) {
            if (element.querySelector('span').textContent === formation) {
                element.remove();
            }
        });

        formationsStorage = formationsStorage.filter(function (form) {
            return form !== formation;
        });
        localStorage.setItem('formations', JSON.stringify(formationsStorage));
    }
});

//loisirs
document.addEventListener('DOMContentLoaded', function () {
    var searchInputLoisirs = document.querySelector('#searchInputLoisirs');
    var boxDataLoisirs = document.querySelector('#boxDataLoisirs');
    var addLoisirsButton = document.querySelector('#addLoisirs');

    var loisirsStorage = JSON.parse(localStorage.getItem('loisirs')) || [];
    loisirsStorage.forEach(function (loisir) {
        ajouterLoisir(loisir);
    });

    addLoisirsButton.addEventListener('click', function () {
        var nouveauLoisir = searchInputLoisirs.value;
        ajouterLoisir(nouveauLoisir);
        loisirsStorage.push(nouveauLoisir);
        localStorage.setItem('loisirs', JSON.stringify(loisirsStorage));
        searchInputLoisirs.value = '';
    });

    function ajouterLoisir(loisir) {
        var nouveauLoisirDiv = document.createElement('div');
        nouveauLoisirDiv.className = 'box_info_added';
        nouveauLoisirDiv.innerHTML = '<span>' + loisir + '</span>' +
            '<div><hr class="dashed_hr"><a href="#" class="trashButton" data-loisir="' + loisir + '"><i class="fa-solid fa-trash-can"></i></a></div>';

        boxDataLoisirs.appendChild(nouveauLoisirDiv);

        var trashButton = nouveauLoisirDiv.querySelector('.trashButton');
        trashButton.addEventListener('click', function (e) {
            e.preventDefault();
            supprimerLoisir(loisir);
        });
    }

    function supprimerLoisir(loisir) {
        var elementsLoisir = document.querySelectorAll('.box_info_added');
        elementsLoisir.forEach(function (element) {
            if (element.querySelector('span').textContent === loisir) {
                element.remove();
            }
        });

        loisirsStorage = loisirsStorage.filter(function (lois) {
            return lois !== loisir;
        });
        localStorage.setItem('loisirs', JSON.stringify(loisirsStorage));
    }
});


//ajax
document.addEventListener('DOMContentLoaded', function () {
    const formcv = document.querySelector('#formcv');
    const error_tel = document.querySelector('#error_tel');
    const error_naiss = document.querySelector('#error_naiss');
    const error_adresse = document.querySelector('#error_adresse');
    const error_code = document.querySelector('#error_code');
    const error_photo = document.querySelector('#error_photo');
    const error_ville = document.querySelector('#error_ville');
    const submitcv = formcv.querySelector('input[type=submit]');
    let params = new FormData();

    formcv.addEventListener('submit', function (evt) {
        evt.preventDefault();
        submitcv.disabled = true;
        params = new FormData(formcv);
        params.append('action', 'get_CV_form');
        getFormCV();
    });

    async function getFormCV() {
        let response = await fetch(MYSCRIPT.ajaxUrl, {
            method: 'post',
            body: params
        });
        let data = await response.json();
        console.log(data);
        submitcv.disabled = false;
        error_tel.innerText = '';
        error_naiss.innerText = '';
        error_adresse.innerText = '';
        error_code.innerText = '';
        error_ville.innerText = '';
        error_photo.innerText = '';

        if (data.success) {

        } else {
            if (data.errors.tel != null) {
                error_tel.innerText = data.errors.tel;
            }
            if (data.errors.naiss != null) {
                error_naiss.innerText = data.errors.naiss;
            }
            if (data.errors.adresse != null) {
                error_adresse.innerText = data.errors.adresse;
            }
            if (data.errors.code != null) {
                error_code.innerText = data.errors.code;
            }
            if (data.errors.ville != null) {
                error_ville.innerText = data.errors.ville;
            }
            if (data.errors.photo != null) {
                error_photo.innerText = data.errors.photo;
            }
        }
    }
});
