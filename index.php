<!DOCTYPE html>
<html>
    <head>
        <title>Contactez-moi</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
        <link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="css/style.css">
        <script src="js/script.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="divider"> </div>
            <div class="heading">
                <h2>Contactez-moi</h2>
            </div>
            <div class="row">
                <div class="col-lg-10 offset-1">
                    <form id="contact-form" method="post" action="" role="form">
                            <div class="row">

                                <div class="col-md-6">
                                    <label for="firstname">Prénom <span class="red">*</span></label>
                                    <input type="text"  id="firstname" name="firstname" class="form-control" placeholder="Votre prénom" value="">
                                    <p class="comment"></p>
                                </div>

                                <div class="col-md-6">
                                    <label for="name">Nom <span class="red">*</span></label>
                                    <input type="text"  id="name" name="name" class="form-control" placeholder="Votre nom" value="">
                                    <p class="comment"></p>
                                </div>

                                <div class="col-md-6">
                                    <label for="email">Email <span class="red">*</span></label>
                                    <input type="email"  id="email" name="email" class="form-control" placeholder="Votre email" value="">
                                    <p class="comment"></p>
                                </div>

                                <div class="col-md-6">
                                    <label for="phone">Téléphone</label>
                                    <input type="tel" id="phone" name="phone" class="form-control" placeholder="Votre numéro de téléphone" value="">
                                    <p class="comment"></p>
                                </div>

                                <div class="col-md-12">
                                    <label for="message">Message <span class="red">*</span></label>
                                    <textarea id="message"  name="message" class="form-control" placeholder="Votre message" rows="4" value=""></textarea>
                                    <p class="comment"></p>
                                </div>

                                <div class="col-md-12">
                                    <p class="blue"><strong>* Ces informations sont requises</strong></p>
                                </div>

                                <div class="col-md-12">
                                    <input type="submit" class="button1" value="Envoyer">
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
