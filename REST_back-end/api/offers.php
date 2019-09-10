<?php

$request_method=$_SERVER["REQUEST_METHOD"];

switch($request_method)
	{
	case 'GET':
			// Retrive Products
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
                // Insert Product
                if(!empty($_POST["id"] || $_POST["owner"] || $_POST["from"] || $_POST["to"])) {
                    $id=intval($_POST["id"]);
                    $owner=intval($_POST["owner"]);
                    $from=intval($_POST["from"]);
                    $to=intval($_POST["to"]);
                    insert_offers($id,$owner,$from,$to);
                }
            break;

    case 'PUT':
                // Update Product
                $id=intval($_GET["id"]);
                update_offers($id);
            break;

    case 'DELETE':
                // Delete Product
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
  if ($_GET["id"] == 1) {
      if (preg_match("/[^0-9-]/",$_GET['id'] )) {
          die ("invalid ID should be number");
      }

      $_GET["id"] = $array = ["owner" => "mfdz",
          "from" => "Musberg",
          "to" => "Stuttgart"];
      foreach ($array as $x => $x_value){
          echo "ID_one: " . $x ." : " . $x_value;
          echo "<br>";
      }
      print_r($array);

  }elseif ($_GET["id"] == 2){

      $_GET["id"] = $array_two = ["owner" => "mfdz",
          "from" => "Stuttgart",
          "to" => "Musberg"];
        /*
        echo "ID: " . $_GET['id'] ."<br />";
        echo "owner: " . $id_one['owner'] . "<br />";
        echo "from: " . $id_one['from'] . "<br />";
        echo "to: " . $id_one['to'] . "<br />";
        */

        foreach ($array_two as $x => $x_value){
            echo "ID_two: " . $x ." : " . $x_value;
            echo "<br>";
        }



      print_r($array_two);

    exit();

    }else{
      echo "invald ID ";
  }

}




//HTTP POST METHODS
function insert_offers()
{
    if( $_POST["id"] || $_POST["owner"] || $_POST["from"] || $_POST["to"]   ) {
        if (preg_match("/[^0-9-]/",$_POST['id'] )) {
            die ("invalid ID should be number");
        }

        echo "ID: " . $_POST['id'] . "<br />";
        echo "owner: " . $_POST['owner'] . "<br />";
        echo "from: " . $_POST['from'] . "<br />";
        echo "to: " . $_POST['to'] . "<br />";

        exit();
    }

}


//HTTP PUT METHODS

function update_offers($id)
{

}

//HTTP DELETE METHODS

function delete_offers($id)
{

}