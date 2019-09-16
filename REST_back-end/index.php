
<html>
    <body>
<h2>Implement basic REST back-end</h2>

<p>The GET Method </p>

<form action = "api/offers.php" method = "GET">
    ID: <input type = "text" name = "id" />
    <input type = "submit" />
</form>


<p>The POST Method </p>
<form action = "api/offers.php" method = "POST">
    ID: <input type = "text" name = "id" />
    Owner: <input type = "text" name = "owner" />
    From: <input type = "text" name = "from" />
    To: <input type = "text" name = "to" />
    <input type = "submit" />
</form>





<p>The PUT Method </p>

<form action = "api/ride.php" method = "GET">
    ID: <input type = "text" name = "id" />
    Owner: <input type = "text" name = "owner" />
    From: <input type = "text" name = "from" />
    To: <input type = "text" name = "to" />
    <input type = "submit" />
</form>
    </body>
</html>




<?php
//
//$offers_id = [
//    ["id" => 1,"owner" => "mfdz","from" => "Musberg","to" => "Stuttgart"],
//    ["id" => 2,"owner" => "mfdz","from" => "Musberg","to" => "Stuttgart"],
//    ["id" => 3,"owner" => "roland","from" => "Kecskemet","to" => "Szeged"],
//    ["id" => 4,"owner" => "nandor","from" => "Budapest","to" => "Pecs"],
//];
//
//
//
//
//
//echo "<pre>";
////var_dump(json_encode($offers_id[0]));
////var_dump(json_encode($offers_id[1]));
////var_dump(json_encode($offers_id[2]));
////var_dump($offers_id);
//$keys = array_keys($offers_id);
//for($i = 0;$i < count($offers_id);$i++){
//    echo $keys[$i] . "\n";
//    foreach($offers_id[$keys[$i]] as $key => $value) {
//        echo $key . " : " . $value . "\n";
//    }
//    echo "\n";
//}
//echo "</pre>";
////
////string(57) "{"id":1,"owner":"mfdz","from":"Musberg","to":"Stuttgart"}"
////expectedRide1 = json.dumps( { "id": 1, "owner": "mfdz", "from": "Musberg", "to": "Stuttgart" } )
////var_dump($number_arr[0]["gyumolcsok"][1], $number_arr[0]["zoldsegek"][2],$number_arr[0]["szamitogepek"][1]);
////
//
//
