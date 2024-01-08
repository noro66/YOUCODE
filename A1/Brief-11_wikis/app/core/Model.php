<?php

trait Model
{
    use Database;

    protected $limit = '5';
    protected $offset = '0';
    protected $order_type = "DESC";
    // protected $order_by = "id";

    public function fitch_All()
    {
        $sql = "SELECT * FROM $this->table ORDER BY $this->order_by  $this->order_type";
        return $this->query($sql);
    }

    public function where($data, $not = [])
    {
        $keys = array_keys($data);
        $keys_not = array_keys($not);

        $sql = "SELECT * FROM $this->table WHERE ";

        foreach ($keys as $key) {
            $sql .= "$key = :$key AND ";
        }
        foreach ($keys_not as $key) {
            $sql .= "$key != :$key AND ";
        }
        $sql = rtrim($sql, " AND ");

        $sql .= " ORDER BY $this->order_by $this->order_type LIMIT $this->limit OFFSET $this->offset";
        $data = array_merge($data, $not);

        return $this->query($sql, $data);
    }

    public function first($data, $not = [])
    {
        $keys = array_keys($data);
        $keys_not = array_keys($not);

        $sql = "SELECT * FROM $this->table WHERE ";

        foreach ($keys as $key) {
            $sql .= "$key = :$key AND ";
        }
        foreach ($keys_not as $key) {
            $sql .= "$key != :$key AND ";
        }
        $sql = rtrim($sql, " AND ");

        $sql .= " LIMIT $this->limit OFFSET $this->offset";
        $data = array_merge($data, $not);
        $result = $this->query($sql, $data);
        if ($result)
            return $result[0];
        return false;
    }

    public function insert($data)
    {
        if (!empty($this->columns)) {
            foreach ($data as $key => $value) {
                if (!in_array($key, $this->columns)) {
                    unset($data[$key]);
                }
            }
        }
        $keys = array_keys($data);
        $strk = implode(', ', $keys);
        $strv = implode(', :', $keys);

        $sql = "INSERT INTO $this->table ( $strk) VALUES ( :$strv) ";
        $this->query($sql, $data);
    }

    public function update($id, $data, $id_column = "id")
    {
        if (!empty($this->columns)) {
            foreach ($data as $key => $value) {
                if (!in_array($key, $this->columns)) {
                    unset($data[$key]);
                }
            }
        }
        $data[$id_column] = $id;
        $keys = array_keys($data);

        $sql = "UPDATE $this->table SET ";

        foreach ($keys as $key) {
            $sql .= "$key = :$key, ";
        }

        $sql = rtrim($sql, ", ");

        $sql .= " WHERE $id_column = :$id_column";


        echo $sql;
        show($data);

        $query = $this->query($sql, $data);
        if ($query)
            return true;
        return false;
    }

    public function delete($id, $id_column = 'id')
    {
        $data[$id_column] = $id;
        $sql = "DELETE FROM $this->table WHERE $id_column = :$id_column";

        $this->query($sql, $data);
    }
}
