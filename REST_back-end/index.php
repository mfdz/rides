
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




<!--
<p>The PUT Method </p>

<form action = "api/offers.php" method = "GET">
    ID: <input type = "text" name = "id" />
    Owner: <input type = "text" name = "owner" />
    From: <input type = "text" name = "from" />
    To: <input type = "text" name = "to" />
    <input type = "submit" />
</form>

    </body>
</html>
//>


<?php


$id = array(    "1" => "Roli",
                "2" => "Adam" ,
                "3" => "Peter",
                "4" => "Oliver"
                                );


echo"Array number 0:   {$id['1']}<br />";

var_dump($id);

