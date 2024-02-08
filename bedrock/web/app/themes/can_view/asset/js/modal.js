const connexion = document.querySelector('#connexion');

MicroModal.init();

connexion.addEventListener('click', (evt) =>{
    evt.preventDefault();
    MicroModal.show('modal-1'); // [1]
})

// MicroModal.close('modal-id'); // [2]

const formulaire = document.querySelector('#form_login');
const submit = document.querySelector('#submit_login');
const error_login = document.querySelector('#error_login');

let params = new FormData();

formulaire.addEventListener('submit', (evt) =>{
    evt.preventDefault();
    console.log('formulaire')
    // z
    params = new FormData(formulaire);
    params.append('action', 'get_connexion_data')
    getConnexionData();
})

// console.log(MYSCRIPT);
async function getConnexionData(){
    let response = await fetch( MYSCRIPT.ajaxUrl,{
        method: 'post',
        body: params
    });
    let data = await response.json();
    console.log(data);
    error_login.innerHTML='';
    if(data.success){
        document.location.href= MYSCRIPT.home;
    }else{
        if(data.errors.login != null){
            error_login.innerHTML=data.errors.login;
        }
    }
}

