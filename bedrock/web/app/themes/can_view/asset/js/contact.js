const forminscritpion = document.querySelector('#inscritpion');
const error_prenom = document.querySelector('#error_prenom')
const error_mail = document.querySelector('#error_mail')
const error_username = document.querySelector('#error_username')
const error_password = document.querySelector('#error_password')
const submit = forminscritpion.querySelector('input[type=submit]');
const success = document.querySelector('#success');
let params = new FormData();

forminscritpion.addEventListener('submit', function (evt) {
    evt.preventDefault();
    submit.disabled = true;
    params = new FormData(forminscritpion);
    params.append('action', 'get_contact_form')
    // const inputSubject = document.querySelector('#subject')
    // params.append('subject', inputSubject.value)
    getFormContact();
});


async function getFormContact() {
    let response = await fetch(MYSCRIPT.ajaxUrl, {
        method: 'post',
        body: params
    });
    let data = await response.json();
    console.log(data);
    submit.disabled = false;
    error_subject.innerText = '';
    error_message.innerText = '';
    error_mail.innerText = '';

    if (data.success) {
        formcontact.remove()
        success.innerText = 'Bravo michel'
    } else {
        if (data.errors.subject != null) {
            error_subject.innerText = data.errors.subject
        }
        if (data.errors.mail != null) {
            error_mail.innerText = data.errors.mail
        }
        if (data.errors.message != null) {
            error_message.innerText = data.errors.message
        }
    }
}