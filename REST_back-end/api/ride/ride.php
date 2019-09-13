<?php
function global_array_function()
{
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

  if ($id != 0) {

      if (preg_match("/[^0-9-]/",$id )) {
          die ("invalid ID should be number");
      }

      $response=global_array_function();










      // Using for and foreach in nested form




      exit();

    }else{
      echo global_array_function();

     // echo print_r( get_offers(global_array_function()));




  }

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