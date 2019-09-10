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
                insert_offers();
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
  if ($_GET["id"]) {

    $_GET["id"] = array("owner"=>"mfdz", "from"=>"Musberg", "to"=>"Stuttgart");
      $_GET["id"] = array("owner"=>"mfdz", "from"=>"Stuttgart", "to"=>"Musberg");

        echo "ID: " . $_GET['id'] ."<br />";
        echo "owner: " . $id['owner'] . "<br />";
        echo "from: " . $id['from'] . "<br />";
        echo "to: " . $id['to'] . "<br />";

         var_dump($id);


    exit();

    }

}




//HTTP POST METHODS
function insert_offers()
{

}


//HTTP PUT METHODS

function update_offers($id)
{

}

//HTTP DELETE METHODS

function delete_offers($id)
{

}