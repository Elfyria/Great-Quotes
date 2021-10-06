<?php

/**
 * retrieves a file from a specific address, decodes it into an array
 * @param string $address file address for destination csv file
 * @return array array
 */
function fileFetcher(string $address) : array {
    $csv_src = file_get_contents($address);
    $csv_rows = str_getcsv($csv_src, "\n");

    for ($i = 0; $i < count($csv_rows); $i++) {
        $csv_rows[$i] =  str_getcsv($csv_rows[$i], "|");
    }
    return $csv_rows;
}

/**
 * Duplicates a random entry, pushes it to the end of the array and saves the array to the source json file.
 * String for file path is static.
 * @param string $quote the quote you want to add
 * @param string $author the ID of the author
 * @param string $address the address of the file to which the quote is appeneded
 */
function makeMan(string $quote, string $author, string $address) : void {
    $finalQuote = '\n'.$quote.'|'.$author;
    file_put_contents($address, $finalQuote, FILE_APPEND);
}

/**
 * Hunts for a user with a key equal to an input selector or returns -1. Returns either its index or the user itself.
 * @PARAM $selector string the key of the user you're looking to find
 * @PARAM $mode bool Switch var for the return value. If true, returns the user. If false, returns the index.
 * @return mixed returns reference to an array or index if found, if not, returns -1
 **/
function huntMan(string $selector) {
    $csvMan = fileFetcher("./assets/csv/quotes.csv");       //get the array
    $authMan = fileFetcher("./assets/csv/authors.csv");       //get the array
    if ($selector >= count($csvMan) || $selector < 0) {
        die("invalid selector");
    }

    $theLad = $csvMan[$selector];
    array_push($theLad, $authMan[$theLad[1]]);

    return $theLad;
}

/**
 * Saves an array into a file, no return
 * @param $phpMan array
 * @param string $quotes file path to a file which must already exist.
 * @return void
 */
function saveMan(array &$phpMan, string $quotes) : void {
    if (file_exists($quotes)) {                                                   //ensure file exists
        //this is where input validation for the array would take place
        file_put_contents($phpMan, $quotes);                            //put to file
    } else {
        echo "File \"".$quotes."\" not found.";                                   //if file doesn't exist...
        die();                                                                      //die
    }
}

/**
 * Deletes the entry of the user associated with the input ID.
 * @param $id string ID representing a key for a user in the database (e.g. DG1).
 */
function thanosMan(string $id) : void {
    $rayMan = fileFetcher("quotes.csv");               //fetch array of users
    for($i = 0; $i < count($rayMan); $i++) {                                //loop through the array until...
        if($rayMan[$i]->{'key'} == $id){                                    //...the key that matches the id is found
            /*
             * This is the best I can find in terms of deleting an element from the array. The closest alternative was
             * array_unset, but this causes issues with index references
             */
            $preMan = array_slice($rayMan,0, $i);                     //slice part of array before removed user
            $newMan = array_splice($rayMan, $i + 1);            //splice element out of array, leaving latter half
            $rayMan = array_merge($preMan, $newMan);                        //merge together into full array
            saveMan($rayMan, "quotes.csv");   //send new array to saveMan to be saved
            break;
        }
    }
}

/**
 * Selects an element from the database, changes its name, saves it back into the database
 * @param string $id ID representing a key for a user in a database (e.g. DG1)
 */
function modMan(string $id) : void {
    $theClass = fileFetcher("quotes.csv");            //get the class array
    $theSubject = huntMan($id, false);                               //get the user index
    if ($theSubject == -1) {                                                // if file doesn't exist
        echo "Entry \"".$id."\" not found.";                                //let user know,
        die();                                                              //then kill them
    } else {                                                                //otherwise, proceed normally
        $theClass[$theSubject]->{"name"} = "Pablo Diego José Francisco de Paula Juan Nepomuceno María de los Remedios Cipriano de la Santísima Trinidad Ruiz y Picasso";
        //push celebrity name ^
        saveMan($theClass, "quotes.csv");    //save to csv
    }
}