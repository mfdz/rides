<?php

$request_method=$_SERVER["REQUEST_METHOD"];

switch($request_method)
	{
	case 'GET':
			// Retrive Offers
			if(!empty($_GET["id"]))
			{

				$id=intval($_GET["id"]);


				get_offers($id);
			}
			else
			{
				get_offers();
			}
			break;

    case 'POST':
               // Itt a $_GET az nem a GET POST PUT meg feleloje hanem egy PHP fuggveny ami valtozokat ker el nev alapjan a HTTP keresbol. Az eredeti peldaban midnenutt ezt hasznaltak.
               // A PUT-ban meg a DELETE-ben sem irtak $_DELETE-t meg $_PUT-ot.....

                    insert_offers();

            break;

    case 'PUT':
                // Update Offers
                $id=intval($_GET["id"]);
                update_offers($id);
            break;

    case 'DELETE':
                // Delete Offers
                $id=intval($_GET["id"]);
                delete_offers($id);
            break;

            default:
			// Invalid Request Method
			header("HTTP/1.0 405 Method Not Allowed");
			break;
	}

// HTTP GET METHODS

function get_offers($id)
{
//    global $rides_array;
//    if (is_numeric($id)) {
//        for ($i = 0; $i < count($rides_array); $i++){
//            $ride = $rides_array[$i];
//            // var_dump($rides_array[$i]);
//            if($ride["id"] ==$id){
//                return $ride;
//            }
//
//        }
//        return "no ride for given id:" . $id;
//
//    }



}




//HTTP POST METHODS
//a 30. sorban parameterekkel van meghivva a fuggveny. Ez itt egy parameterek nelkuli fuggveny implementacio. ebben a formaban sosem lesz meghivva.
function insert_offers()
{

        $offers_id = $_POST['id'];
        $offers_owner = $_POST['owner'];
        $offers_from = $_POST['from'];
        $offers_to = $_POST['to'];

        echo "ID: " . $offers_id . "<br />";
        echo "owner: " . $offers_owner . "<br />";
        echo "from: " . $offers_from . "<br />";
        echo "to: " . $offers_to. "<br />";


        exit();


}


//HTTP PUT METHODS

function update_offers($id)
{





}

//HTTP DELETE METHODS

function delete_offers($id)
{

}