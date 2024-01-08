<?php

trait Database
{
    private function connect()
    {
        try {
            $dsn = "mysql:host=" . DBHOST . ";dbname=" . DBNAME;
            $pdo = new PDO($dsn, DBUSER, DBPASS);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            echo "Database connection error: " . $e->getMessage();
        }
    }

    protected function query($sql, $data = [])
    {
        try {
            $pdo = $this->connect();
            $stmt = $pdo->prepare($sql);

            foreach ($data as $key => $value) {
                $stmt->bindParam(':' . $key, $value);
            }

            $stmt->execute($data);

            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo "Query execution error: " . $e->getMessage();
        } finally {
            $pdo = null;
        }
    }

    protected function getRow($sql, $data = [])
    {
        try {
            $pdo = $this->connect();
            $stmt = $pdo->prepare($sql);

            foreach ($data as $key => $value) {
                $stmt->bindParam(':' . $key, $value);
            }

            $stmt->execute($data);

            return $stmt->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo "Query execution error: " . $e->getMessage();
        } finally {
            $pdo = null;
        }
    }
}
