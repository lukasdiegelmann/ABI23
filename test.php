<?php
    include "ticker.php";
?>


<html>
    <?php
        $result = readTicker(1, 2);
        echo "test";
        foreach($result as $row) {
              echo $row['id'];
        }
    ?>
</html>
