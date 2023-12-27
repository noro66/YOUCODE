<?php
interface ArticleServiceInterface{

    public function addArticle(Article $article);
    public function DeleteArticle($id);
    public function editingArticle($id);
    public function UpdateArticle(Article $article,$id);
    public function ShowArticle();

}
?>