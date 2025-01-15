<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <script type="text/javascript" src="/js/script.js"></script>
</head>
<body>
    <form method="post" action="" id="FormEdition" style="display:none;" >
        <input type="hidden" name="iduser-a-editer" id="iduser-a-editer" value="">
        <div class="container-bloc">
            <div class="inscrip">
                <div class="content d-x-flex">
                    <label class="col-sm-1 col-form-label">Nom</label>
                    <div class="col">    
                        <input type="text" name="nom" id="form_nom">
                    </div>
                </div>
                <div class="content">
                    <label class="col-sm-1 col-form-label">Prénom</label>
                    <div class="col"> 
                        <input type="text" name="prenom" id="form_prenom">
                    </div>
                </div>
                <div class="content">
                    <label class="col-sm-1 col-form-label">Username</label>
                    <div class="col">
                        <input type="text" name="username" id="form_username">
                    </div> 
                </div>
                <div class="content">
                    <label class="col-sm-1 col-form-label">E-mail</label>
                    <div class="col">
                        <input type="email" name="email" id="form_email">
                    </div>
                </div>
                <div class="content-btn">
                    <input type="submit" value="Modifier" class="btn" onclick="btnUpdateUser(); return false;">
                    <button class="cancel btn">
                        <a href="/index.php">Annuler</a>
                    </button>
                </div>
            </div>
        </div>
    </form>
</body>
</html>