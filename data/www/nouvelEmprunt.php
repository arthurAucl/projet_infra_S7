<?php
include "core.php";
?>

<!DOCTYPE html>
<html>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <header>
        <div class="en-tête">
            <img src="Logo ESEO png.png">
        </div>
    </header>

    <!-- IF NOT CONNECTED -->
    <body>
        <div class="container">
            <h1>Nouvel emprunt</h1>
            <form class="row needs-validation" novalidate>
                <div class="Sinput-group mb-3">
                    <a class="btn btn-secondary" href="emprunt.php"><i class="fa-solid fa-arrow-left-long"></i> Retour aux emprunts</a>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Date d'emprunt</span>
                    <input id="date-debut" type="datetime-local" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" required>
                    <div class="invalid-feedback">
                        Vous devez selectionner une date d'emprunt.
                    </div>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Date de restitution</span>
                    <input id="date-fin" type="datetime-local" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" required>
                    <div class="invalid-feedback">
                        Vous devez selectionner une date de restitution.
                    </div>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Objet à emprunter</span>
                    <select class="form-select" aria-label="Default select example" required>
                        <option selected disabled value="">Selectionnez un object</option>
                        <option value="HDMI">Câble HDMI (5 en stock)</option>
                        <option value="USB">Clef USB (1 en stock)</option>
                        <option disabled value="">Crayon (0 en stock)</option>
                    </select>
                    <div class="invalid-feedback">
                        Vous devez selectionner un object.
                    </div>
                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                    <label class="form-check-label" for="exampleCheck1">En cochant cette case, je m'engage à rendre l'objet à la date selectionnée dans le même état que celui où je l'ai reçu.</label>
                    <div class="invalid-feedback">
                        Vous devez accepter cette condition.
                    </div>
                </div>

                <div class="input-group">
                    <button type="submit" class="btn btn-primary">Validation</button>
                </div>
                
            </form>
        </div>
    </body>

    <footer>
        <div class="bottom">
            <p class="sign"> Site réalisé par ADAMCZUK Etienne, AUCLAIR Arthur, BAFFOU Augustin,
                BAHLOUL Ismaïl, LHOMMEDET Constance, MIGNOT Sixtine
            </p>
        </div>
        <div class="rights">
            <p class="rights">® All rights reserved </p>
        </div>
    </footer>

    <script> (() => {
        'use strict'
      
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        const forms = document.querySelectorAll('.needs-validation')
      
        // Loop over them and prevent submission
        Array.from(forms).forEach(form => {
          form.addEventListener('submit', event => {
            if (!form.checkValidity()) {
              event.preventDefault()
              event.stopPropagation()
            }
      
            form.classList.add('was-validated')
          }, false)
        })
      })()
    </script>

</html>
