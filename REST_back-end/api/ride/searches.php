<?php

$request_method=$_SERVER["REQUEST_METHOD"];

switch($request_method)
{
    case 'GET':
        // Retrive Products
        if(!empty($_GET["id"]))
        {
            $id=intval($_GET["id"]);

            get_searches($id);
        }
        else
        {
            get_searches();
        }
        break;

    case 'POST':
        // Insert Product
        insert_searches();
        break;

    case 'PUT':
        // Update Product
        $id=intval($_GET["id"]);
        update_searches($id);
        break;

    case 'DELETE':
        // Delete Product
        $id=intval($_GET["id"]);
        delete_searches($id);
        break;

    default:
        // Invalid Request Method
        header("HTTP/1.0 405 Method Not Allowed");
        break;
}

// HTTP GET METHODS

function get_searches(){

}


//HTTP POST METHODS
function insert_searches()
{

}


//HTTP PUT METHODS

function update_searches($id)
{

}

//HTTP DELETE METHODS

function delete_searches($id)
{

}
