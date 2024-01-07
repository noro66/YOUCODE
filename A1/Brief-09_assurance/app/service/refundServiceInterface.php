<?php
interface RefundServiceInterface{

    public function addRefund(Refund $Refund);
    public function ShowRefund();
    public function editingRefund($id);
    public function UpdateRefund(Refund $Refund,$id);
    public function DeleteRefund($id);

}
?>