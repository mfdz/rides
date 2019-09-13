<?php

global $offers_id;
$offers_id =  array(
    array(
        "id" => "1",
        "owner" => "mfdz",
        "from" => "Musberg",
        "to" => "Stuttgart",
    ),
    array(
        "id" => "2",
        "owner" => "mfdz",
        "from" => "Stuttgart",
        "to" => "Musberg",
    ),
    array(
        "id" => "3",
        "owner" => "Roland",
        "from" => "Kecskemet",
        "to" => "Szeged",
    )
);
/*
function global_array_function()
{
    $offers_id = " ";

    // Using for and foreach in nested form
    $keys = array_keys($offers_id);

    for($i = 0; $i < count($offers_id); $i++) {

        echo $keys[$i] . "{<br>";

        foreach($offers_id[$keys[$i]] as $key => $value) {

            echo $key . " : " . $value . "<br>";

        }

        echo "}<br>";

    }
    echo "JSON Object: " . json_encode($offers_id, JSON_FORCE_OBJECT). "<br>";

   echo " <br>" ."simple array: :".  print_r($offers_id) . "<br>";

}

*/



$request_method=$_SERVER["REQUEST_METHOD"];

switch($request_method)
	{
	case 'GET':

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


                    insert_offers();

            break;

    case 'PUT':

                $id=intval($_GET["id"]);
                $owner = intval($_POST['owner']);
                $from = intval($_POST['from']);
                $to = intval($_POST['to']);

                update_offers($id);
            break;

    case 'DELETE':

                $id=intval($_GET["id"]);
                delete_offers($id);
            break;

            default:

                header("HTTP/1.0 405 Method Not Allowed");
			break;
	}

// HTTP GET METHODS

function get_offers($id)
{
// Task:   //have to iterate through the array and look at the Id
            // working progress

  if ($id != 0) {
      if (preg_match("/[^0-9-]/",$id )) {
          die ("invalid ID should be number");
      }

      $response_arr ="";
      $ids = array_keys($response_arr);

      if($id == 1) {
          for ($i = 0; $i < count($response_arr); $i++) {

              echo $ids[$i] . "{<br>";

              foreach ($response_arr[$ids[$i]] as $ids => $value) {

                  echo $ids . " : " . $value . "<br>";

              }

              echo "}<br>";

          }

      }

      exit();

    }else{
      echo global_array_function();





  }

}


function insert_offers()
{

        global $offers_id;



        $offers_id = $offers_id["id"];
        $offers_owner = $offers_id["owner"];
        $offers_from = $offers_id["from"];;
        $offers_to = $offers_id["to"];



        echo "ID: " . $offers_id . "<br />";
        echo "owner: " . $offers_owner . "<br />";
        echo "from: " . $offers_from . "<br />";
        echo "to: " . $offers_to. "<br />";


        exit();


}


//HTTP PUT METHODS

function update_offers($id)
{


    $id = $_POST['id'];
    $offers_owner = $_POST['owner'];
    $offers_from = $_POST['from'];
    $offers_to = $_POST['to'];

    echo "ID: " . $id . "<br />";
    echo "owner: " . $offers_owner . "<br />";
    echo "from: " . $offers_from . "<br />";
    echo "to: " . $offers_to. "<br />";






}

//HTTP DELETE METHODS

function delete_offers($id)
{

   // global $offers_id;




}