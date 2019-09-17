<?php

class Ride{
    private $id;
    private $owner;
    private $from;
    private $to;

    function __construct($id,$owner,$from,$to){
        $this->id = $id;
        $this->owner = $owner;
        $this->from = $from;
        $this->to = $to;
    }
}

//
//$rides_array = [
//    ["id" => 16,"owner" => "mfdz","from" => "Musberg","to" => "Stuttgart"],
//    ["id" => 24,"owner" => "mfdz","from" => "Musberg","to" => "Stuttgart"],
//    ["id" => 39,"owner" => "roland","from" => "Kecskemet","to" => "Szeged"],
//    ["id" => 46,"owner" => "nandor","from" => "Budapest","to" => "Pecs"]
//];

//$arrayObject = new ArrayObject($rides_array);

$request_method=$_SERVER["REQUEST_METHOD"];

switch($request_method)
	{
	case 'GET':

			if(!empty($_GET["id"]))
			{
				$id = intval((int)$_GET["id"]);
				$response = getRide($id);
			}else{
				$response = getAllRides();
			}
			echo json_encode($response);
			break;

    case 'POST':

            if(empty($_POST["id"]) || empty($_POST["owner"]) || empty($_POST["from"]) || empty($_POST["to"]) ){
                    echo "missing parameter";
            }else{

                $ride = new Ride($_POST["id"],$_POST["owner"],$_POST["from"],$_POST["to"]);
                insert_ride($ride);
            }

            break;

    case 'PUT':
        //echo 'PUT';

//                $id=intval($_GET["id"]);
//                $owner = intval($_POST['owner']);
//                $from = intval($_POST['from']);
//                $to = intval($_POST['to']);
//
//                update_rides($id);
            break;

    case 'DELETE':
        echo 'DELETE';

//                $id=intval($_GET["id"]);
//                delete_rides($id);
//            break;
//
//
//
//
			break;

    default:

             header("HTTP/1.0 405 Method Not Allowed");
	}
//
//// HTTP GET METHODS
//
//
//
//

function loadRides(){
    $rides = file_get_contents('rides.json');
    return json_decode($rides);

}

function saveRides($rides){
    $jsonData = json_encode($rides);
    file_put_contents('rides.json', $jsonData);
}

function getRide($id)
{
     $rides_array = loadRides();
  if (is_numeric($id)) {
      for ($i = 0; $i < count($rides_array); $i++){
            $ride = $rides_array[$i];
         // var_dump($rides_array[$i]);
          if($ride["id"] ==$id){
              return $ride;
          }

      }
      return "no ride for given id:" . $id;

    }





}

function getAllrides(){

     $rides_array = loadRides();

    return $rides_array;
}


function insert_ride($ride)
{

  // $assocRide =json_decode(json_encode($ride));
    $rides_array = loadRides();

    array_push($rides_array,(array)$ride);
    saveRides($rides_array);



}


//HTTP PUT METHODS

//function update_rides($id)
//{
//
//
//
//
//
//}
//

//HTTP DELETE METHODS

function delete_rides($id)
{
    global $rides_array;

    if (is_numeric($id)) {
        for ($i = 0; $i < count($rides_array); $i++){
            $ride = $rides_array[$i];
            // var_dump($rides_array[$i]);
            if($ride["id"] == $id){
                return $ride;
            }

        }
        return "no ride for given id:" . $id;

    }








}