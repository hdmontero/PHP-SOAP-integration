<?php 
namespace Helpers;

require_once('core.php');
customFileLoad('/config/database.php');

class ConnectionHelper {

    public $connection;

    public static function getConnection(){
        $connection = mysqli_connect(
            DATABASE_HOST,
            DATABASE_USER,
            DATABASE_PASSWORD,
            DATABASE_DATABASE_NAME
        );

        if (mysqli_connect_errno()) {
            return false; // maybe a more descriptive message??            
        }

        return $connection;
    }
}