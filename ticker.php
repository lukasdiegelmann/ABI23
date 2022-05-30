<?php
    function createTickerEntry($committee, $creator, $eventdate, $eventplace, $expiredate, $title, $content) {
        include "dbconnect.php";
        try {
            $createTickerEntry = $db->prepare("INSERT INTO ticker (committee, creator, eventdate, eventplace, expiredate, title, content) VALUES (:committee, :creator, :eventdate, :eventplace, :expiredate, :title, :content);");
            
            $createTickerEntry->bindParam(":committee", $committee);
            $createTickerEntry->bindParam(":creator", $creator);
            $createTickerEntry->bindParam(":eventdate", $eventdate);
            $createTickerEntry->bindParam(":eventplace", $eventplace);
            $createTickerEntry->bindParam(":expiredate", $expiredate);
            $createTickerEntry->bindParam(":title", $title);
            $createTickerEntry->bindParam(":content", $content);

            $createTickerEntry->execute();
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
        }
    function readTicker($from, $to) {   //z.B 1. bis 5. Eintrag, ausgehend vom neusten Element
        include "dbconnect.php";
        //echo "readticker called";
        $getLastInsertID = $db->prepare("SELECT id FROM ticker order by id desc LIMIT 1");
        $getLastInsertID->execute();

        $last_id = $getLastInsertID->fetch();
        //echo $last_id['id'];
        if($from == 0) $from = 1;   //input 0 is denied
        $startid = $last_id - $from - 1;
        $endid = $last_id - $to - 1;
        

        $getTickerEntries = $db->prepare("SELECT * FROM ticker WHERE ID BETWEEN :startid AND :endid;");
        $getTickerEntries->bindParam(":startid", $startid);
        $getTickerEntries->bindParam(":endid", $endid);
        $getTickerEntries->execute();
        $data = $getTickerEntries->fetchAll();
        return $data;

        /*foreach($result as $row) {
            echo $row['id'];
            echo $row['committee'];
            echo $row['creator'];
            echo $row['creationdate'];
            echo $row['eventdate'];
            echo $row['eventplace'];
            echo $row['expiredate'];
            echo $row['title'];
            echo $row['content'];
        }*/

    }
?>