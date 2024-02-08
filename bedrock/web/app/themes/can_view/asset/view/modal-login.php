<div class="modal micromodal-slide" id="modal-1" aria-hidden="true">
    <div class="modal__overlay" tabindex="-1" data-micromodal-close>
        <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
            <header class="modal__header">
                <h2 class="modal__title" id="modal-1-title">
                    Connexion
                </h2>
                <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
            </header>
            <form id="form_login" action="" method="post" novalidate>

                <div class="coolinput ">
                    <label for="mail" class="text">Identifiant ou Email</label>
                    <input type="text" id="mail" name="mail" class="input">
                    <span class="error" id="error_login"></span>
                </div>


                <div class="coolinput ">
                    <label for="password" class="text">Mot de passe</label>
                    <input type="password" id="password" name="password" class="input">
                    <span id="error_naiss"></span>
                </div>

                <div class="inline_form ">
                    <input type="submit" class="input" value="Envoyer">
                </div>

            </form>
        </div>
    </div>
</div>