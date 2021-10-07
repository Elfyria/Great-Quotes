<?php
/**
 * Main cardloader function, called from within index.php.
 * Loops through array and sends each student entry through the helper function for display.
 * @PARAM &$quotesArray array reference to an associative array whose data will be displayed.
 **/
function cardLoader(array &$quotesArray) : void {
    $len = count($quotesArray);                                    //determine length
    for ($i = 0; $i < $len; $i++) {
        cardLoaderHelper($quotesArray[$i]);        //send current entry to helper
    }
}

/**
 * Echoes a card for a student. Card links to detail.php with $key as the query variable "id".
 * Card includes button for delete.php set up the same way as the detail link
 * @param array $quote
 */
function cardLoaderHelper(array &$quote) : void {
    $author = authHunter($quote[1]);
    echo '<a href="detail.php?id=', $quote[1] ,'" class=" w-100 text-decoration-none">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <!--placeholder for initials, to be intro\'d later-->
                        <img src="', $author[2] ,'" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <p class="card-text text-dark">',$quote[0],'</p>
                            <h5 class="card-title text-dark">', $author[0] ,' ',$author[1] , '</h5>
                        </div>
                    </div>
                </div>
            </div>
    </a>';

}

function authHunter(int $aID) {
    require_once("csv_util.php");
    $authRay = fileFetcher("./assets/csv/authors.csv");
    return $authRay[$aID];
}

/**
 * loops through the array of skills and outputs a skillbar for each one with appropriate values
 * @param &$skills array array of all skills for an individual
 **/
function skillBar(array &$skills) : void {
    $len = count($skills);
    for ($i = 0; $i < $len; $i++) {             //loop through skill array
        $skill = $skills[$i];                   //get current skill, put info into html
        echo '<div class="py-1">
                <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width:', $skill->{"value"}, '%; background-color:#3f43fd" aria-valuenow="',
        $skill->{"value"}, '" aria-valuemin="0" aria-valuemax="100">
                        <div class="progress-bar-title">', $skill->{"name"}, '</div>
                        <span class="progress-bar-number">', $skill->{"value"}, '%</span>
                    </div>
                </div>
              </div>';
    }
}

/**
 * echoes the age in years, months and days
 * @param $DoB string date of birth
 **/
function chronos(string $DoB) : void {
    $bDay = date_create($DoB);              //make date object for birthday
    $jetzt = date_create();                 //make date object for current date

    $time = date_diff($jetzt, $bDay);       //determine difference in date

    for ($i = 0; $i <= 3; $i++) {
        ananke($i, $time);                  //call helper function with loop var and interval
    }
}

/**
 * *  Echoes a line about age or how much time has passed
 *  Loop info:
 *     first loop calculates age,
 *     second loop shows years since birth (age but with makeup),
 *     third loop shows months since birth,
 *     fourth loop shows days since birth.
 *  named after greek titan's daughter (I think) because I had to commit to the bit
 * @param $thing int counter for loop
 * @param &$time DateInterval interval used for manipulation
 **/
function ananke(int $thing, DateInterval &$time) : void {
    $theLad = "";                   //var that specifies the format of the interval
    //string echoed after the var so there aren't just numbers with no explanation (e.g. 21, 4, 11)
    $theMad = "";
    switch ($thing) {
        case 3:
        {   //call 4
            $theLad = "%d";
            $theMad = "days";
            break;
        }
        case 2:
        {   //call 3
            $theLad = "%m";
            $theMad = "months";
            break;
        }
        case 1:
        {   //call 2
            $theLad = "%y";
            $theMad = "years";
            break;
        }
        default :
        {   //call 1
            $theLad = "%y";
            $theMad = "age";
        }
    }

    //put info int the list item, echo to document
    echo "<li class='media p-0 mb-0'>
                        <span class='w-25 text-black font-weight-normal'>" . $theMad . "</span>
                        <label class='media-body p-0 mb-0'>";
    echo $time->format($theLad);
    echo "               </label>
          </li>";

}
