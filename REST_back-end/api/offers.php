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
               // Itt a $_GET az nem a GET POST PUT meg feleloje hanem egy PHP fuggveny ami valtozokat ker el nev alapjan a HTTP keresbol. Az eredeti peldaban midnenutt ezt hasznaltak.
               // A PUT-ban meg a DELETE-ben sem irtak $_DELETE-t meg $_PUT-ot.....
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
                $owner=intval($_POST["owner"]);
                $from=intval($_POST["from"]);
                $to=intval($_POST["to"]);
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
    // a fuggvenynek, metodusnak nevezzuk akarhogy, mar atadod az $id valtozot. Tok felesleges es nem is helyes a $_GET["id"] hasnzalni mert mar atadjuk a fuggvenyhivaskor.active
  if ($_GET["id"] == 1) {
      // ez jo otlet, lehetne mashogy is de jo otlet.
      if (preg_match("/[^0-9-]/",$_GET['id'] )) {
          die ("invalid ID should be number");
      }
    // teljes felreertelmezese a dolgoknak. A $_GET["id"] egy konkret ertek ad vissza amit egyenlove akarsz tenni masvalamivel.
    // ide valamilyen valtozot kell tenned es azt inicializalni valamilyen ertekkel. 
      $_GET["id"] = $array = ["owner" => "mfdz",
          "from" => "Musberg",
          "to" => "Stuttgart"];
      foreach ($array as $x => $x_value){
          echo "ID_one: " . $x ." : " . $x_value;
          echo "<br>";
      }

      var_dump(
          $array,
          json_encode($array)
      );

  }elseif ($_GET["id"] == 2){
// lasd elozo kommentem
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




      var_dump(
          $array_two,
          json_encode($array_two)
      );

    exit();

    }else{
      echo "invalid ID ";
  }

}




//HTTP POST METHODS
//a 30. sorban parameterekkel van meghivva a fuggveny. Ez itt egy parameterek nelkuli fuggveny implementacio. ebben a formaban sosem lesz meghivva.
function insert_offers()
{
    // lasd a get offers($id)=nel levo kommentemet. a jo megoldas az hogy atadjuk a fuggvenynek a parametereket es azokat hasznaljuk

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
    if ($_GET["id"] == 6 ){
        $id = array(
            array("id" =>"6","owner" =>"Oliver","from" =>"Szeged","to" =>"Pest"),
            array("id" =>"7","owner" =>"mike","from" =>"kecskemet","to" =>"kerekdomb"),
            array("id" =>"6","owner" =>"Oliver","from" =>"Szeged","to" =>"Pest"),
            array("id" =>"6","owner" =>"Oliver","from" =>"Szeged","to" =>"Pest"),

        );

        echo $id[0][0].": ID: ".$id[0][1].", sold: ".$id[0][2].".<br>";
        echo $id[1][0].": ID: ".$id[1][1].", sold: ".$id[1][2].".<br>";
        echo $id[2][0].": ID: ".$id[2][1].", sold: ".$id[2][2].".<br>";
        echo $id[3][0].": ID: ".$id[3][1].", sold: ".$id[3][2].".<br>";






    }




}

//HTTP DELETE METHODS

function delete_offers($id)
{

}