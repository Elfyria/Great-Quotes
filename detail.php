<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require_once("csv_util.php");
    require_once("functions.php");
    if (!count($_GET)) {
        die("No entry provided.<br><br><a href='index.php'>Return to main page</a>");
    }

    $theOne = huntMan($_GET["id"], true);


    if (!($theOne instanceof stdClass)) {
        die("User with ID \"".$_GET["id"]."\" not found.<br><br><a href='index.php'>Return to main page</a>");
    }
    ?>

    <!-- https://www.bootdey.com/snippets/view/team-user-resume#html -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>ASE 230 - <?= $theOne->{"name"} ?></title>

    <!--import jquery-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>

    <!--import bootstrap javascript-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>

    <!--import bootstrap css-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!--import something???-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css"
          integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous"/>

    <!--import bootstrap icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/detail.css"/>
</head>

<body class="mt-0">
<nav class="mt-0 p-0 navbar sticky-top bg-dark container-fluid d-flex flex-nowrap">
    <!--title-->
    <h2 class="text-light ml-2 ml-lg-4 text-wrap w-auto">
        <a href="./index.php" class="bi bi-house-fill text-light"></a>
        ASE 230 - <span class="text-muted"><?= $theOne->{"name"} ?></span>
    </h2>
    <!--shape on right of navbar-->
    <div class="btn-group mr-3 d-flex flex-column flex-md-row">
        <a class="btn btn-dark" href='modify.php?id=<?= $theOne->{"key"} ?>'>
            <span class="bi bi-pencil-fill"></span><br>
            Modify
        </a>
        <!-- So this setup doesn't look great, but it looks a lot better than the alternative imo -->
        <a class="btn btn-dark" href='delete.php?id=<?= $theOne->{"key"} ?>'>
            <span class="bi bi-trash-fill"></span><br>
            Delete
        </a>
    </div>
</nav>
<div class="container mt-4">
    <div class="row">
        <div class="col-lg-5 col-md-6">
            <div class="mb-2">
                <img class="w-100" src="<?= $theOne->{"img"} ?>"
                     alt="bink">
            </div>
            <div class="mb-2 d-flex">
                <h4 class="font-weight-normal"><?= $theOne->{"name"} ?></h4>
                <div class="social d-flex ml-auto">
                    <p class="pr-2 font-weight-normal">Follow on:</p>
                    <a href="<?= $theOne->{"facebook"} ?>" class="text-muted mr-1">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="<?= $theOne->{"twitter"} ?>" class="text-muted mr-1">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="<?= $theOne->{"instagram"} ?>" class="text-muted mr-1">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="<?= $theOne->{"linkedIn"} ?>" class="text-muted">
                        <i class="fab fa-linkedin"></i>
                    </a>
                </div>
            </div>
            <div class="mb-2">
                <ul class="list-unstyled">
                    <li class="media">
                        <span class="w-25 text-black font-weight-normal">Dream profession:</span>

                        <label class="media-body"><?= $theOne->{"dProfession"} ?></label>
                    </li>
                    <li class="media">
                        <span class="w-25 text-black font-weight-normal">Dream company: </span>
                        <label class="media-body"><?= $theOne->{"dCompany"} ?></label>
                    </li>
                    <li class="media">
                        <span class="w-25 text-black font-weight-normal">Email: </span>
                        <label class="media-body"><?= $theOne->{"email"} ?></label>
                    </li>
                    <?php chronos($theOne->{"DOB"}); ?>
                </ul>
            </div>
        </div>
        <div class="col-lg-7 col-md-6 pl-xl-3">
            <h5 class="font-weight-normal">Short intro</h5>
            <p><?= $theOne->{"intro"} ?></p>
            <div class="my-2 bg-light p-2">
                <p class="blockquote mb-0"><?= $theOne->{"quote"} ?></p>
            </div>
            <div class="mb-2 mt-2 pt-1">
                <h5 class="font-weight-normal">Top skills</h5>
            </div>
            <?php
            skillbar($theOne->{"skills"});
            ?>
            <h5 class="font-weight-normal">Fun fact</h5>
            <p><?= $theOne->{"funfact"} ?></p>
        </div>
    </div>
</div>
</body>

</html>