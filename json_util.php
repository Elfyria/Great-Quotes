<?php
/**
 * Gets a desired json file, decodes the file and returns it to a usable object in php.
 * If input matches no file, kills program.
 * @PARAM $jsonFile string the address of a json file. can be relative or not.
 * @RETURN array
 **/
function fileFetcher(string $jsonFile) : array {
    if (!file_exists($jsonFile)) {                                      //check if file exists
        $jsonMan = file_get_contents(".".$jsonFile);                        //fetch JSON file
        return json_decode($jsonMan);                                   //convert to php array and return
    } else {
        echo "No File Found matching the input string of " . $jsonFile; //if file doesn't exist...
        die();                                                          //...die.
    }
}

/**
 * Hunts for a user with a key equal to an input selector or returns -1. Returns either its index or the user itself.
 * @PARAM $selector string the key of the user you're looking to find
 * @PARAM $mode bool Switch var for the return value. If true, returns the user. If false, returns the index.
 * @return mixed returns reference to an array or index if found, if not, returns -1
 **/
function huntMan(string $selector, bool $mode) {
    $phpMan = fileFetcher("/assets/JSON/class.json");       //get the array
    $retMan = -1;                                                   //establish return var
    for ($i = 0; $i < count($phpMan); $i++) {                       //otherwise loop through array
        if (strcmp($phpMan[$i]->{'key'}, $selector) == 0) {         //if the current key matches the selector
            $retMan = ($mode == true)? $phpMan[$i] : $i;            //set retman as the entry for return
            break;
        }
    }

    return $retMan;
}

/**
 * Saves an array into a file, no return
 * @param $phpMan array
 * @param string $jsonFile file path to a file which must already exist.
 * @return void
 */
function saveMan(array &$phpMan, string $jsonFile) : void {
    if (file_exists($jsonFile)) {                                                   //ensure file exists
        //this is where input validation for the array would take place
        $jsonEncodedArray = json_encode($phpMan, JSON_PRETTY_PRINT);           //encode phpRay into JSON array
        file_put_contents($jsonFile, $jsonEncodedArray);                            //put to file
    } else {
        echo "File \"".$jsonFile."\" not found.";                                   //if file doesn't exist...
        die();                                                                      //die
    }
}

/**
 * Duplicates a random entry, pushes it to the end of the array and saves the array to the source json file.
 * String for file path is static.
 */
function makeMan() : void {
    $theClass = fileFetcher("/assets/JSON/class.json");             //get the class array
    $theSubject = clone ($theClass[rand(0, count($theClass) - 1)]);         //choose a rando
    $subKeyNum = substr($theSubject->{"key"}, 2);                     //get their number so the key isn't duped
    $subKeyLets = substr($theSubject->{"key"}, 0, 2);           //get their initials
    $theSubject -> {"key"} = $subKeyLets . ++$subKeyNum;                    //increment key
    array_push($theClass, $theSubject);                               //push new to array
    saveMan($theClass, "./assets/JSON/class.json");          //save to json
}

/**
 * Deletes the entry of the user associated with the input ID.
 * @param $id string ID representing a key for a user in the database (e.g. DG1).
 */
function thanosMan(string $id) : void {
    $rayMan = fileFetcher("/assets/JSON/class.json");               //fetch array of users
    for($i = 0; $i < count($rayMan); $i++) {                                //loop through the array until...
        if($rayMan[$i]->{'key'} == $id){                                    //...the key that matches the id is found
            /*
             * This is the best I can find in terms of deleting an element from the array. The closest alternative was
             * array_unset, but this causes issues with index references
             */
            $preMan = array_slice($rayMan,0, $i);                     //slice part of array before removed user
            $newMan = array_splice($rayMan, $i + 1);            //splice element out of array, leaving latter half
            $rayMan = array_merge($preMan, $newMan);                        //merge together into full array
            saveMan($rayMan, "./assets/JSON/class.json");   //send new array to saveMan to be saved
            break;
        }
    }
}

/**
 * Selects an element from the database, changes its name, saves it back into the database
 * @param string $id ID representing a key for a user in a database (e.g. DG1)
 */
function modMan(string $id) : void {
    $theClass = fileFetcher("/assets/JSON/class.json");            //get the class array
    $theSubject = huntMan($id, false);                               //get the user index
    if ($theSubject == -1) {                                                // if file doesn't exist
        echo "Entry \"".$id."\" not found.";                                //let user know,
        die();                                                              //then kill them
    } else {                                                                //otherwise, proceed normally
        $theClass[$theSubject]->{"name"} = "Pablo Diego José Francisco de Paula Juan Nepomuceno María de los Remedios Cipriano de la Santísima Trinidad Ruiz y Picasso";
        //push celebrity name ^
        saveMan($theClass, "./assets/json/class.json");    //save to json
    }
}