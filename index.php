<!doctype html>
<html lang="en">

<head>
    <?php
    require_once("functions.php");
    require_once("csv_util.php");
    ?>

    <!-- https://www.bootdey.com/snippets/view/single-advisor-profile#html -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--import bootstrap css-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!--import something idk-->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>

    <!--import bootstrap icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <!--import slimmer jquery-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prompt&display=swap" rel="stylesheet">

    <!--import bootstrap javascript-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>

    <style>
        .single_advisor_profile:hover .bi-slash-lg {
            -webkit-transition-duration: 500ms;
            transition-duration: 500ms;
            color: #FFFFFF;
        }

        .single_advisor_profile .bi-slash-lg {
            -webkit-transition-duration: 500ms;
            transition-duration: 500ms;
        }

        .single_advisor_profile:hover ul {
            -webkit-transition-duration: 500ms;
            transition-duration: 500ms;
            color: #FFFFFF;
        }

        .single_advisor_profile ul {
            -webkit-transition-duration: 500ms;
            transition-duration: 500ms;
        }

        #createButton {
            right: 5%;
            bottom: 5%;
            width: 3rem;
            height: 3rem;
            z-index: 5;
            border-color: #070a57;
            color: #070a57;
            transition: all 0.25s ease-in-out;
            -webkit-transition: all 0.25s ease-in-out;
            -moz-transition: all 0.25s ease-in-out;
        }

        #createButton:hover {
            width: 7rem;
            background-color: #070a57;
            color: white;
            transition: all 0.25s ease-in-out;
            -webkit-transition: all 0.25s ease-in-out;
            -moz-transition: all 0.25s ease-in-out;
        }

        #createButton:hover::after {
            content: "create";
        }
    </style>
    <title>Directory of Great Quotes</title>

</head>

<body class="mt-0 bg-light">
<!--bring in shrinker for header-->
<a href="./index.php" class="text-decoration-none">
    <nav class="mt-0 p-0 navbar sticky-top container-fluid d-flex flex-nowrap bg-dark">
        <!--title-->
        <h2 class="text-light ml-2 ml-lg-4 text-wrap w-50 display-3" style="font-family: Prompt">
            Great Quotes
        </h2>
        <!--shape on right of navbar-->
    </nav>

</a>
<div class="container">
    <!-- holds cards -->
    <div class="row mt-5 w-75">
        <?php
        //card loader
        $quotesArray = fileFetcher("./assets/csv/quotes.csv");
        cardLoader($quotesArray);
        ?>
    </div>
    <!-- button for create -->
    <a href="create.php">
        <button class="btn btn-outline-dark rounded-pill text-center text-nowrap
        position-fixed rounded-circle ratio-1x1 bi-keyboard fs-5 overflow-hidden" id="createButton">
        </button>
    </a>
</div>
</body>


</html>