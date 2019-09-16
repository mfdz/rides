<?php

global $offers_id;

$offers_id = [
    ["id" => 1,"owner" => "mfdz","from" => "Musberg","to" => "Stuttgart"],
    ["id" => 2,"owner" => "mfdz","from" => "Musberg","to" => "Stuttgart"],
    ["id" => 3,"owner" => "roland","from" => "Kecskemet","to" => "Szeged"],
    ["id" => 4,"owner" => "nandor","from" => "Budapest","to" => "Pecs"],
];

$arrayObject = new ArrayObject($offers_id);

function print_offersArray($arrayObject){

    echo "<pre>";

    $keys = array_keys((array)$arrayObject);
    for($i = 0;$i < count($arrayObject);$i++){
        echo $keys[$i] . "\n";
        foreach($arrayObject[$keys[$i]] as $key => $value) {
            echo $key . " : " . $value . "\n";
        }
        echo "\n";
    }

    echo "</pre>";
}



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

    global $arrayObject;

  if ($id > 0) {
      if (preg_match("/[^0-9-]/",$id )) {
          die ("invalid ID should be number");
      }

          function searchForId($id, $arrayObject)
          {
              foreach ($arrayObject as $key => $val) {
                  if ($val['id'] == $id) {
                      return $key;
                  }
              }

              return $id;


          }
      switch ($id){
          case 1:
              $id = searchForId('1', $arrayObject);
              var_dump(json_encode($arrayObject[0]));
              break;
          case 2:
              $id = searchForId('2', $arrayObject);
              var_dump(json_encode($arrayObject[1]));
              break;
          case 3:
              $id = searchForId('3', $arrayObject);
              var_dump(json_encode($arrayObject[2]));
              break;
          case 4:
              $id = searchForId('4', $arrayObject);
              var_dump(json_encode($arrayObject[3]));
              break;
          default:

              echo "<pre>";
              $keys = array_keys((array)$arrayObject);
              for($i = 0;$i < count($arrayObject);$i++){
                  echo $keys[$i] . "\n";
                  foreach($arrayObject[$keys[$i]] as $key => $value) {
                      echo $key . " : " . $value . "\n";
                  }
                  echo "\n";
              }
              echo "</pre>";


      }




      exit();

    }else{
        get_offers();

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