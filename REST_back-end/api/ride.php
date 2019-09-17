<?php

//Ez a nev a valtozonak teljesen felrevezeto. Egyreszt ez a ride.php ergo offers itt furcsan nez ki. Masreszt nem az id-ket tarolod, hanem a konkret rideoklat.
//Altalanossagban: ertem hogy atmasoltad a kodot a masik file-bol de a valtozok, fuggvenyekket at kell nevezni. A jo kod beszedes es elmondja hogy mi tortenik
//Ezert kellenek jo valtozo es fuggvenynevek. A ride.php-ben offeres nevekkel talalkozni megteveszto.
$rides_array = [
    ["id" => 16,"owner" => "mfdz","from" => "Musberg","to" => "Stuttgart"],
    ["id" => 24,"owner" => "mfdz","from" => "Musberg","to" => "Stuttgart"],
    ["id" => 39,"owner" => "roland","from" => "Kecskemet","to" => "Szeged"],
    ["id" => 46,"owner" => "nandor","from" => "Budapest","to" => "Pecs"]
];

//$arrayObject = new ArrayObject($rides_array);

$request_method=$_SERVER["REQUEST_METHOD"];

switch($request_method)
	{
	case 'GET':



			if(!empty($_GET["id"]))
			{
                //echo $_GET["id"];
				$id = intval((int)$_GET["id"]);
				$response = getRide($id);

			}
			else
			{


				$response = getAllRides();

			}
			echo json_encode($response);

			break;

    case 'POST':
        echo 'POST';
//
//
//                insert_rides();
//
        break;

    case 'PUT':
        echo 'PUT';

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
//            default:
//
//                header("HTTP/1.0 405 Method Not Allowed");
			break;
	}
//
//// HTTP GET METHODS
//
//
//
//
function getRide($id)
{
    global $rides_array;
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

    global $rides_array;

    return $rides_array;
}
//
//
//
//
//
//function insert_rides()
//{
//
//    if(empty($_POST[""]))
//
//
//
//
//        exit();
//
//
//}
//
//
////HTTP PUT METHODS
//
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








}