<?php
require "db.php";

$db = new  Database();

if (isset($_POST['action']) && $_POST["action"] == "view") {
    $output = '';
    $data = $db->read();
    if ($db->totalRowcount() > 0) {
        $output .= '                    <table class="table table-striped table-sm table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th class="text-center">id</th>
                                <th class="text-center">Fist name</th>
                                <th class="text-center">Last Name</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Phone Number</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>';
        foreach ($data as $row) {
            $output .= '<tr class="text-center text-secondary">
                    <td>' . $row['id'] . '</td>
                    <td>' . $row['first_name'] . '</td>
                    <td>' . $row['last_name'] . '</td>
                    <td>' . $row['email'] . '</td>
                    <td>' . $row['phone'] . '</td>
                    <td>
                    <a href="#" title="Veiw Details" class="text-success infoBtn" id="' . $row['id'] . '"><i style="font-size:24px" class="fa">&#xf06e; </i></a>&nbsp;&nbsp;
                    <a href="#" title="EDITE" class="text-success editBtn" data-bs-toggle="modal" data-bs-target="#editModal" id="' . $row['id'] . '"><i style="font-size:24px" class="fa text-primary">&#xf044;</i></a>
                    <a href="#" title="DELETE" class="text-success delBtn" id="' . $row['id'] . '"><i class="material-icons text-danger"  >&#xe92b;</i></a>
                    </td>
                </tr>';
        }
        $output .= "</tbody>
                    </table>";
        echo $output;
    } else {
        echo '<h3 class="text-center text-secondary mt-5">:( No any user present in the database !</h3>';
    }
}

if (isset($_POST['action']) && $_POST['action'] == "insert") {
    $fname = $_POST["firstName"];
    $lname = $_POST["lastName"];
    $email = $_POST["email"];
    $phone = $_POST["phoneNumber"];
    $db->insert($fname, $lname, $email, $phone);
}

if (isset($_POST['edit_id'])) {
    $id = $_POST['edit_id'];
    // echo $id;
    $row = $db->getUserById($id);
    echo json_encode($row);
}

if (isset($_POST['action']) && $_POST['action'] == "update") {
    $id = $_POST['id'];
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $phone = $_POST["phoneNumber"];
    $db->update($id, $fname, $lname, $email, $phone);
}

if (isset($_POST['del_id'])) {
    $id = $_POST['del_id'];

    $db->delete($id);
}

if (isset($_POST['info_id'])) {

    $id = $_POST['info_id'];
    $row = $db->getUserById($id);
    echo json_encode($row);
}
