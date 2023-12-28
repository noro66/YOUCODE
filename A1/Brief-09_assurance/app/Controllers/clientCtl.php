<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


require_once __DIR__ . '/../service/clientServicesInterface.php';

require_once  __DIR__ . "/../service/clientService.php";


$clientService = new ClientServices();

if (isset($_POST['action']) && $_POST["action"] == "view") {
    $output = '';
    $data = $clientService->ShowClient();

    if (!empty($data)) {
        $output .= '<table class="table table-striped table-sm table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th class="text-center">ID</th>
                                <th class="text-center">First Name</th>
                                <th class="text-center">Last Name</th>
                                <th class="text-center">Address</th>
                                <th class="text-center">Phone Number</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>';

        foreach ($data as $row) {
            $output .= '<tr class="text-center text-secondary">
                    <td>' . $row->getId() . '</td>
                    <td>' . $row->getUsername() . '</td>
                    <td>' . $row->getLast_name() . '</td>
                    <td>' . $row->getAdress() . '</td>
                    <td>' . $row->getPhone() . '</td>
                    <td>
                        <a href="#" title="View Details" class="text-success infoBtn" id="' . $row->getId() . '"><i style="font-size:24px" class="fa">&#xf06e; </i></a>&nbsp;&nbsp;
                        <a href="#" title="Edit" class="text-success editBtn" data-bs-toggle="modal" data-bs-target="#editModal" id="' . $row->getId() . '"><i style="font-size:24px" class="fa text-primary">&#xf044;</i></a>
                        <a href="#" title="Delete" class="text-success delBtn" id="' . $row->getId() . '"><i class="material-icons text-danger"  >&#xe92b;</i></a>
                    </td>
                </tr>';
        }

        $output .= '</tbody></table>';
        echo $output;
    } else {
        echo '<h3 class="text-center text-secondary mt-5">:( No users present in the database!</h3>';
    }
}


if (isset($_POST['action']) && $_POST['action'] == "insert") {
    
    $fname = $_POST["firstName"];
    $lname = $_POST["lastName"];
    $adress = $_POST["adress"];
    $phone = $_POST["phoneNumber"];
    $client = new Client($fname, $lname, $adress, $phone);

    $clientService->addClient($client);
}

if (isset($_POST['edit_id'])) {
    $id = $_POST['edit_id'];
    $row = $clientService->getUserById($id);
    echo json_encode($row);
}

if (isset($_POST['action']) && $_POST['action'] == "update") {
    $id = $_POST['id'];
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $adress = $_POST["adress"];
    $phone = $_POST["phoneNumber"];
    $client = new Client($fname, $lname, $adress, $phone);

    $clientService->UpdateClient($client,$id);
}

if (isset($_POST['del_id'])) {
    $id = $_POST['del_id'];

    $clientService->DeleteClient($id);
}

if (isset($_POST['info_id'])) {

    $id = $_POST['info_id'];
    $row = $clientService->getUserById($id);
    echo json_encode($row);
}