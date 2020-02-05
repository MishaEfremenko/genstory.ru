<?php
    class DBwork{
        static function get_connect($host,$user,$pass,$db){
            $mysqli = new mysqli($server, $user, $pass, $db);
            $mysqli->set_charset("utf8");
            return $mysqli;
        }
        static function connect_get_customers($mysqli){
            $mysqli->real_query("SELECT * FROM `customers`");
            $res = $mysqli->use_result();
            $ar=[];
            while($ros=$res->fetch_assoc()){
                array_push($ar,$ros);
            }
            return $ar;
        }
        static function get_cat($mysqli){
            $mysqli->real_query("SELECT * FROM cat INNER JOIN states ON cat.name=states.category");
            $res = $mysqli->use_result();
            $ar=[];
            while($ros=$res->fetch_assoc()){
                if (isset($ar[$ros['name']]))
                    array_push($ar[$ros['name']],$ros);
                else
                    $ar[$ros['name']]=[$ros];
            }
            return $ar;
        }
        static function get_states($mysqli){
            $mysqli->real_query("SELECT * FROM `states`");
            $res = $mysqli->use_result();
            $ar=[];
            while($ros=$res->fetch_assoc()){
                array_push($ar,$ros);
            }
            return $ar;
        }
        static function get_state($mysqli,$state){
            $mysqli->real_query("SELECT * FROM `states` WHERE `url` LIKE '$state'");
            $res = $mysqli->use_result();
            $ros=$res->fetch_assoc();
            return $ros;
        }
    }
    function isMobile() { 
        return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
    }
?>