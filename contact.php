<?php
$name = $prenom = $email = $adress = $tel = $message = "";
$nameErreur = $prenomErreur = $emailErreur = $adressErreur = $telErreur = $messageErreur = "";
$formcomplet = false;
$emailTo = "webdevbadassbb@gmail.com";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = verifInput($_POST["name"]);
    $prenom = verifInput($_POST["prenom"]);
    $email = verifInput($_POST["email"]);
    $adress = verifInput($_POST["adress"]);
    $tel = verifInput($_POST["tel"]);
    $message = verifInput($_POST["message"]);
    $formcomplet = true;
    $emailText = "";

    if (empty($name)) {
        $nameErreur = "Quel est ton nom ?";
        $formcomplet = false;
    } else
        $emailText .= "name: $name\n";

    if (empty($prenom)) {
        $prenomErreur = "Quel est ton prénom ?";
        $formcomplet = false;
    } else
        $emailText .= "prenom: $prenom\n";

    if (empty($email)) {
        $emailErreur = "Quel est ton adresse email ?";
        $formcomplet = false;
    } elseif (!verifEmail($email)) {
        $emailErreur = "Renseigne une adresse email valid !";
        $formcomplet = false;
    } else
        $emailText .= "email: $email\n";

    if (empty($adress)) {
        $adressErreur = "Quel est ton adresse postal ?";
        $formcomplet = false;
    } else
        $emailText .= "adress: $adress\n";

    if (empty($tel)) {
        $telErreur = "Quel est ton adresse postal ?";
        $formcomplet = false;
    } elseif (!verifTel($tel)) {
        $telErreur = "rentre un numéro de téléphone valid ?";
        $formcomplet = false;
    } else
        $emailText .= "tel: $tel\n";

    if (empty($message)) {
        $messageErreur = "Quel est ton message ?";
        $formcomplet = false;
    } else
        $emailText .= "message: $message\n";
    if ($formcomplet) {
        $headers = "From: $name $prenom <$email>\r\nReply-To: $email";
        mail($emailTo, "un message de votre site fitsport84", $emailText, $headers); // Envoi de l'email
        $name = $prenom = $email = $adress = $tel = $message = "";
    }
}
function verifTel($var)
{
    return preg_match("/^[0-9 ]*$/", $var);
}
function verifEmail($var)
{
    return filter_var($var, FILTER_VALIDATE_EMAIL);
}

function verifInput($var)
{
    $var = trim($var);
    $var = stripslashes($var);
    $var = htmlspecialchars($var);

    return ($var);
}

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>MSM</title>
</head>

<body>
    <header>

        <!-- NAV BAR -->
        <nav class="container-fluid col-sm-12 col-md-12 col-lg-12 p-0 m-0" id="Navbar">
            <div class="navbar navbar-expand-lg navbar-light">
                <img class="logo_navbar" src="assets/img/Logo/fitsport84 petite taille.png" alt="">
                <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" id="link4" aria-current="page" href="index.html">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="link1" href="about.html">About US</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="link2" href="abonnement.html">Abonnement</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="link3" href="galerie.html">Galerie</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" id="linkAct" href="contact.html">Contact</a>
                        </li>

                        <!--ICONE FACEBOOK-->
                        <li class="icone_reseau">
                            <a href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" color="grey" class="bi bi-facebook" viewBox="0 0 16 16">
                                    <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                                </svg>
                            </a>
                        </li>

                        <!--ICONE INSTAGRAM-->
                        <li class="icone_reseau">
                            <a href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" color="grey" class="bi bi-instagram" viewBox="0 0 16 16">
                                    <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
                                </svg>
                            </a>
                        </li>

                        <!--ICONE PINTEREST-->
                        <li class="icone_reseau">
                            <a href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" color="grey" class="bi bi-pinterest" viewBox="0 0 16 16">
                                    <path d="M8 0a8 8 0 0 0-2.915 15.452c-.07-.633-.134-1.606.027-2.297.146-.625.938-3.977.938-3.977s-.239-.479-.239-1.187c0-1.113.645-1.943 1.448-1.943.682 0 1.012.512 1.012 1.127 0 .686-.437 1.712-.663 2.663-.188.796.4 1.446 1.185 1.446 1.422 0 2.515-1.5 2.515-3.664 0-1.915-1.377-3.254-3.342-3.254-2.276 0-3.612 1.707-3.612 3.471 0 .688.265 1.425.595 1.826a.24.24 0 0 1 .056.23c-.061.252-.196.796-.222.907-.035.146-.116.177-.268.107-1-.465-1.624-1.926-1.624-3.1 0-2.523 1.834-4.84 5.286-4.84 2.775 0 4.932 1.977 4.932 4.62 0 2.757-1.739 4.976-4.151 4.976-.811 0-1.573-.421-1.834-.919l-.498 1.902c-.181.695-.669 1.566-.995 2.097A8 8 0 1 0 8 0z" />
                                </svg>
                            </a>
                        </li>

                        <!--ICONE TWITTER-->
                        <li class="icone_reseau">
                            <a href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" color="grey" class="bi bi-twitter" viewBox="0 0 16 16">
                                    <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z" />
                                </svg>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


    </header>
    <!--Section: Contact v.2-->
    <section class="container-fluid d-block h-100 m-0 p-2" id="contcontact">
        <div class="row">
            <div class="col-3"></div>
            <!--Section heading-->
            <div class="col-6 d-block">
                <h2 class="text-center w-responsive mx-auto">Contactez-nous</h2>
                <!--Section description-->
                <p class="text-center w-responsive mx-auto">
                    Avez-vous une question? N'hésitez pas à la poser ! Quelqu'un reviendra vers vous d'ici 24 à 48
                    Heures .
                </p>
            </div>
            <div class="col-3"></div>
        </div>

        <div class="row">
            <div class="col-3"></div>
            <form class="col-6 justify-content-center" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" id="contact">
                <div class="mb-3">
                    <label for="name" class="form-label">Nom</label>
                    <input type="text" class="form-control" id="name" placeholder="Votre nom" name="name" value="<?php echo $name; ?>">
                    <p class="comments"><?php echo $nameErreur ?></p>
                </div>
                <div class="mb-3">
                    <label for="prenom" class="form-label">Prenom</label>
                    <input type="text" class="form-control" id="prenom" placeholder="Votre prenom" name="prenom" value="<?php echo $prenom; ?>">
                    <p class="comments"><?php echo $prenomErreur ?></p>
                </div>
                <div class="mb-3 mt-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter une adresse email" name="email" value="<?php echo $email; ?>">
                    <p class="comments"><?php echo $emailErreur ?></p>
                </div>
                <div class="mb-3">
                    <label for="adress" class="form-label">Votre adresse</label>
                    <input type="text" class="form-control" id="adress" placeholder="votre adresse" name="adress" value="<?php echo $adress; ?>">
                    <p class="comments"><?php echo $adressErreur ?></p>
                </div>
                <div class="mb-3">
                    <label for="tel" class="form-label">Numéro de téléphone</label>
                    <input type="tel" class="form-control" id="tel" placeholder="Votre numéro de téléphone" name="tel" value="<?php echo $tel; ?>">
                    <p class="comments"><?php echo $telErreur ?></p>
                </div>
                <div class="mb-3">
                    <label for="message">Commentaire</label>
                    <textarea type="message" class="form-control" rows="5" id="message" name="message"><?php echo $message; ?></textarea>
                    <p class="comments"><?php echo $messageErreur ?></p>
                </div>


                <input type="submit" value="envoyer" class="btn" id="btnsub">



            </form>
            <p id="erreur"></p>
            <div class="col-3"></div>
        </div>

        <div class="row">
            <div class="col-3"></div>
            <div class="col-6 d-flex justify-content-center">
                <ul class="list-unstyled mb-0 text-center">
                    <li>
                        <p>Fitsport84, Le Pontet 84000 Avignon</p>
                        <p>+ 12 42 24 14 58</p>
                        <p>contact@MSM.com</p>
                    </li>
                </ul>
            </div>
            <div class="col-3"></div>
        </div>
    </section>
    <!-- FOOTER-->
    <footer>
        <div class="container-fluid" id="cont-footer">
            <div class="row justify-content-around">
                <div class="col-sm-8 col-md-8 col-lg-8 d-flex justify-content-around">
                    <a href="#">privacy policy</a>
                    <a href="#">Cookie policy</a>
                    <a href="#">Contact</a>

                    <p>| 2022 © MSM-GROUP ™ MSM</p>
                </div>

                <!--ICONE FACEBOOK-->
                <div class="col-sm-4 col-md-4 col-lg-4 d-flex justify-content-around">
                    <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" color="grey" class="bi bi-facebook" viewBox="0 0 16 16">
                            <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                        </svg>
                    </a>


                    <!--ICONE INSTAGRAM-->

                    <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" color="grey" class="bi bi-instagram" viewBox="0 0 16 16">
                            <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
                        </svg>
                    </a>


                    <!--ICONE PINTEREST-->

                    <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" color="grey" class="bi bi-pinterest" viewBox="0 0 16 16">
                            <path d="M8 0a8 8 0 0 0-2.915 15.452c-.07-.633-.134-1.606.027-2.297.146-.625.938-3.977.938-3.977s-.239-.479-.239-1.187c0-1.113.645-1.943 1.448-1.943.682 0 1.012.512 1.012 1.127 0 .686-.437 1.712-.663 2.663-.188.796.4 1.446 1.185 1.446 1.422 0 2.515-1.5 2.515-3.664 0-1.915-1.377-3.254-3.342-3.254-2.276 0-3.612 1.707-3.612 3.471 0 .688.265 1.425.595 1.826a.24.24 0 0 1 .056.23c-.061.252-.196.796-.222.907-.035.146-.116.177-.268.107-1-.465-1.624-1.926-1.624-3.1 0-2.523 1.834-4.84 5.286-4.84 2.775 0 4.932 1.977 4.932 4.62 0 2.757-1.739 4.976-4.151 4.976-.811 0-1.573-.421-1.834-.919l-.498 1.902c-.181.695-.669 1.566-.995 2.097A8 8 0 1 0 8 0z" />
                        </svg>
                    </a>


                    <!--ICONE TWITTER = ligne 737-->

                    <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" color="grey" class="bi bi-twitter" viewBox="0 0 16 16">
                            <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z" />
                        </svg>
                    </a>
                </div>
            </div>
    </footer>

    <!-- Popper / JS -->
    <!-- poppers && JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="#"></script>
</body>

</html>