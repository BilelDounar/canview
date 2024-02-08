
document.addEventListener('DOMContentLoaded', function () {

    const forminscription = document.querySelector('#inscription_form');
    const error_prenom = document.querySelector('#error_prenom');
    const error_mail = document.querySelector('#error_mail');
    const error_nom = document.querySelector('#error_nom');
    const error_global = document.querySelector('#error_global');
    const submit = forminscription.querySelector('#button_inscription');
    const success = document.querySelector('#success');
    let params = new FormData();

    forminscription.addEventListener('submit', function (evt) {
        evt.preventDefault();
        submit.disabled = true;
        params = new FormData(forminscription);
        params.append('action', 'get_inscription_form');

        getFormInscription();
    });

    async function getFormInscription() {
        let response = await fetch(MYSCRIPT.ajaxUrl, {
            method: 'post',
            body: params
        });
        let data = await response.json();

        submit.disabled = false;
        error_prenom.innerText = '';
        error_nom.innerText = '';
        error_mail.innerText = '';
        error_password.innerText = '';
        error_global.innerText = '';

        if (data.success) {

            error_global.innerText = data.userCreationErrors;

            if (data.userCreationErrors == null) {

                const urlParams = new URLSearchParams(window.location.search);
                window.location.href = urlParams + '?signon=on';

                var premiere_etape = document.querySelector('.premiere_etape');
                var deuxieme_etape = document.querySelector('.deuxieme_etape');
                var loader_etape = document.querySelector('.loader_etape');

                premiere_etape.style.display = "none";

                setTimeout(() => {
                    loader_etape.style.display = "block";

                    setTimeout(() => {
                        loader_etape.style.display = "none";
                        deuxieme_etape.style.display = "block";
                    }, 1000);
                }, 100);

            }
        } else {
            if (data.errors.prenom != null) {
                error_prenom.innerText = data.errors.prenom;
            }
            if (data.errors.mail != null) {
                error_mail.innerText = data.errors.mail;
            }
            if (data.errors.nom != null) {
                error_nom.innerText = data.errors.nom;
            }
            if (data.errors.password != null) {
                error_password.innerText = data.errors.password;
            }
        }
    }
});

document.addEventListener('DOMContentLoaded', function () {
    const urlParams = new URLSearchParams(window.location.search);
    const signonParam = urlParams.get('signon');

    if (signonParam === 'on') {

        var premiere_etape = document.querySelector('.premiere_etape');
        var deuxieme_etape = document.querySelector('.deuxieme_etape');
        var loader_etape = document.querySelector('.loader_etape');

        premiere_etape.style.display = "none";

        setTimeout(() => {
            loader_etape.style.display = "block";

            setTimeout(() => {
                loader_etape.style.display = "none";
                deuxieme_etape.style.display = "block";
            }, 1000);
        }, 100);

    }
});
