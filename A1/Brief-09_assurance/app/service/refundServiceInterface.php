<?php
interface RefundServiceInterface{

    public function addPrime(Prime $Prime);
    public function ShowPrime();
    public function editingPrime($id);
    public function UpdatePrime(Prime $Prime,$id);
    public function DeletePrime($id);

}
?>