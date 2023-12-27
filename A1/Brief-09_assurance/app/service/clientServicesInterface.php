<?php
interface ClientServicesInterface{

    public function addClient(Client $client);
    public function DeleteClient($id);
    public function editingClient($id);
    public function UpdateClient(Client $client,$id);
    public function ShowClient();
    public function  ShowfiltredClient($id);

}
?>