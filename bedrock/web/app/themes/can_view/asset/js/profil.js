const boutonProfil = document.querySelector('.btn_profil');
const boutonFormation = document.querySelector('.btn_formation');
const boutonLoisirs = document.querySelector('.btn_loisirs');
const boutonHardskills = document.querySelector('.btn_hardskills');
const boutonSoftskills = document.querySelector('.btn_softskills');

const infosProfil = document.querySelector('.infos_modulable .profil');
const infosFormation = document.querySelector('.infos_modulable .formation');
const infosLoisirs = document.querySelector('.infos_modulable .loisirs');
const infosHardskills = document.querySelector('.infos_modulable .hardskills');
const infosSoftskills = document.querySelector('.infos_modulable .softskills');

boutonProfil.addEventListener('click', function (evt){
    infosProfil.style.display = 'block';
    infosFormation.style.display = 'none';
    infosLoisirs.style.display = 'none';
    infosHardskills.style.display = 'none';
    infosSoftskills.style.display = 'none';
});

boutonFormation.addEventListener('click', function (evt){
    infosProfil.style.display = 'none';
    infosFormation.style.display = 'block';
    infosLoisirs.style.display = 'none';
    infosHardskills.style.display = 'none';
    infosSoftskills.style.display = 'none';
});

boutonLoisirs.addEventListener('click', function (evt){
    infosProfil.style.display = 'none';
    infosFormation.style.display = 'none';
    infosLoisirs.style.display = 'block';
    infosHardskills.style.display = 'none';
    infosSoftskills.style.display = 'none';
});

boutonHardskills.addEventListener('click', function (evt){
    infosProfil.style.display = 'none';
    infosFormation.style.display = 'none';
    infosLoisirs.style.display = 'none';
    infosHardskills.style.display = 'block';
    infosSoftskills.style.display = 'none';
});

boutonSoftskills.addEventListener('click', function (evt){
    infosProfil.style.display = 'none';
    infosFormation.style.display = 'none';
    infosLoisirs.style.display = 'none';
    infosHardskills.style.display = 'none';
    infosSoftskills.style.display = 'block';
})