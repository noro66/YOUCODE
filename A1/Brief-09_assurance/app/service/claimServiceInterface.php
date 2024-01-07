<?php
interface ClaimServiceInterface{

    public function addClaim(Claim $claim);
    public function ShowClaim();
    public function editingClaim($id);
    public function UpdateClaim(Claim $claim,$id);
    public function DeleteClaim($id);

}
?>