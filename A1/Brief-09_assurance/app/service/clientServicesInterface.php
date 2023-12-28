<?php
interface ClientServicesInterface{

    public function addClient(Client $client);
    public function DeleteClient($id);
    public function getUserById($id);
    public function UpdateClient(Client $client,$id);
    public function ShowClient();
    public function  totalRowcount();

}
?>