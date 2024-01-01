<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);



require_once  "../service/articleService.php";


$articleService  = new ArticleService ();

if (isset($_POST['action']) && $_POST["action"] == "view") {
    $id = $_POST['clientId'];
    $output = '';
    $data = $articleService->ShowArticle($id);

    if (!empty($data)) {
        $output .= '<table class="table table-striped table-sm table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th class="text-center">ID</th>
                                <th class="text-center">Title</th>
                                <th class="text-center">Content</th>
                                <th class="text-center">Date</th>
                                <th class="text-center">Client ID</th>
                                <th class="text-center">Insurer ID</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>';

        foreach ($data as $row) {
            $output .= '<tr class="text-center text-secondary">
                    <td>' . $row->getId() . '</td>
                    <td>' . $row->getTitle() . '</td>
                    <td>' . $row->getContent() . '</td>
                    <td>' . $row->getDate() . '</td>
                    <td>' . $row->getClient_id() . '</td>
                    <td>' . $row->getInsurer_id() . '</td>
                    <td>
                        <a href="#" title="View Details" class="text-success infoBtn" id="' . $row->getId() . '"><i style="font-size:24px" class="fa">&#xf06e; </i></a>&nbsp;&nbsp;
                        <a href="#" title="Edit" class="text-success editBtn" data-bs-toggle="modal" data-bs-target="#editModal" id="' . $row->getId() . '"><i style="font-size:24px" class="fa text-primary">&#xf044;</i></a>
                        <a href="#" title="Delete" class="text-success delBtn" id="' . $row->getId() . '"><i class="material-icons text-danger"  >&#xe92b;</i></a>
                        <a type="button" href="articlesview.php?id=' . $row->getId() . '" class="btn btn-success">Show Claims</a>
                    </td>
                </tr>';
        }

        $output .= '</tbody></table>';
        echo $output;
    } else {
        echo '<h3 class="text-center text-secondary mt-5">:( No articles present in the database!</h3>';
    }
}



if (isset($_POST['action']) && $_POST['action'] == "insert") {
    
    $title = $_POST["title"];
    $content = $_POST["content"];
    $date = $_POST["date"];
    $client_id = $_POST["client_id"];
    $insurer_id = $_POST["insurer_id"];

    $article = new Article(null, $title, $content, $date, $client_id, $insurer_id);

    $articleService->addArticle($article);
}


if (isset($_POST['edit_id'])) {
    $id = $_POST['edit_id'];
    $row = $articleService ->getArticleById($id);
    
    echo json_encode($row);
}

if (isset($_POST['action']) && $_POST['action'] == "update") {
    $id = $_POST['id'];
    $title = $_POST["title"];
    $content = $_POST["content"];
    $date = $_POST["date"];
    $client_id = $_POST["client_id"];
    $insurer_id = $_POST["insurer_id"];

    $article = new Article(null, $title, $content, $date, $client_id, $insurer_id);

    $articleService->updateArticle($article, $id);
}


if (isset($_POST['del_id'])) {
    $id = $_POST['del_id'];

    $articleService ->DeleteArticle($id);
}

if (isset($_POST['info_id'])) {

    $id = $_POST['info_id'];
    $row = $articleService ->getArticleById($id);
    echo json_encode($row);
}