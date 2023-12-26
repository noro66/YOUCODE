<?php

try {
    $username = "root";
    $password = "";
    $pdo = new PDO('mysql:host=localhost;dbname=Assurence', $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);




    function getTable($pdo, $table, $para = "", $id = 0)
    {
        if ($para) {
            $sql = "SELECT * FROM $table WHERE $para  = $id;";

            $res = $pdo->query($sql);
            $result = $res->fetchAll(PDO::FETCH_ASSOC);
        } else {

            $sql = "SELECT * FROM $table;";

            $res = $pdo->query($sql);
            $result = $res->fetchAll(PDO::FETCH_ASSOC);
        }

        return $result;
    }


    function getClien($pdo, $id)
    {
        $sql = "SELECT client.* FROM client
            JOIN assurances_client ON client.id = assurances_client.client_id
            WHERE assurances_client.assurances_id = $id ;";

        $result = $pdo->query($sql);
        $res = $result->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    function insertClient($pdo, $claim, $client_id, $article_id)
    {
        // Use prepared statement to prevent SQL injection
        $sql = "INSERT INTO claim (claimName, client_id, article_id) VALUES (:claim, :client_id, :article_id)";

        try {
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':claim', $claim);
            $stmt->bindParam(':client_id', $client_id);
            $stmt->bindParam(':article_id', $article_id);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
} catch (PDOException $e) {
    echo  'Error! :  ' . $e->getMessage() . '<br/>';
}
