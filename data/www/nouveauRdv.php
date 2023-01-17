<?php
include "core.php";
?>

<!DOCTYPE html>
<html>
    <meta charset="utf-8">
    <link href="style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/634d48256a.js" crossorigin="anonymous"></script>

    <header>
        <div class="en-tête">
            <img src="Logo ESEO png.png">
        </div>
    </header>

    <!-- IF NOT CONNECTED -->
    <body>
        <div class="container-sm">
            <h1>Nouveau Rendez-vous</h1>
            <form class="row needs-validation" novalidate>
                <div class="Sinput-group mb-3">
                    <a class="btn btn-secondary" href="rendezvous.php"><i class="fa-solid fa-arrow-left-long"></i> Retour aux rendez-vous</a>
                </div>

                <div class="input-group mb-3">
                    <label class="input-group-text" id="basic-addon1">Professeur</label>
                    <select class="form-select" aria-label="Default select example" required>
                        <option selected disabled value="">Selectionnez un professeur</option>
                        <option value="BEAUDOUX">M. BEAUDOUX</option>
                    </select>
                    <div class="invalid-feedback">
                        Vous devez d'abord selectionner votre professeur.
                    </div>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Date et heure</span>
                    <input id="dateheure" type="datetime-local" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" required>
                    <div class="invalid-feedback">
                        Ce professeur n'est pas disponible à ce moment, essayez une autre date ou une autre heure.
                    </div>
                </div>
            
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Durée du rendez-vous</span>
                    <select class="form-select" aria-label="Default select example" required>
                        <option selected disabled value="">Selectionnez une durée</option>
                        <option value="5">5m</option>
                        <option value="10">10m</option>
                        <option value="15">15m</option>
                        <option value="30">30m</option>
                        <option value="60">1h</option>
                        <option value="90">1h30</option>
                        <option value="120">2h</option>
                    </select>
                    <div class="invalid-feedback">
                        Vous devez selectionner une durée.
                    </div>
                </div>
                            
                <div class="input-group">
                    <span class="input-group-text">Description</span>
                    <textarea class="form-control" aria-label="With textarea" required></textarea>
                    <div class="invalid-feedback">
                        Vous devez entrer une description pour que le professeur sâche le motif du rendez-vous.
                    </div>
                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                    <label class="form-check-label" for="exampleCheck1">En cochant cette case, je m'engage à assister au rendez-vous.</label>
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
            <p class="sign"> Site réalisé par ADAMCZUK Etienne, AUCLAIR Arthur, BAFFOU Augustin
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
