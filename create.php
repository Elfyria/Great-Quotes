<?php
require_once("json_util.php");
makeMan();
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <!-- https://www.bootdey.com/snippets/view/team-user-resume#html -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>ASE 230 - New Person</title>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css"
          integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/detail.css"/>
</head>

<body>
<div class="container text-center mb-5">
    <h1><a href="./index.php" class="bi bi-house-fill text-secondary mb-5"></a> ASE 230
        - New Entry
    </h1>

    <h2 class="text-dark">New User Created</h2>
    <span class="text-muted">I tried to be more creative, but nothing I could think of was cool</span>
    <script>
        setTimeout(function () {
            window.location = "index.php";
        } , 10000);
    </script>
    <small>You will be redirected shortly. Or just click the home button if you're impatient.</small>
</div>
</body>

</html>