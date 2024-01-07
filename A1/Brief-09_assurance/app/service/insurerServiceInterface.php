<?php
interface InsurerServiceinterface{

    public function addInsurer(Insurer $Insurer);
    public function DeleteInsurer($id);
    public function getInsurerById($id);
    public function UpdateInsurer(Insurer $Insurer,$id);
    public function ShowInsurer();

}
?>