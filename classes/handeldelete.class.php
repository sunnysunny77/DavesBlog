<?php
require_once "password.class.php";
/**
 * Handeldelete controlls the delete action
 *
 * @author Daniel Costello
 * @property private $model Holds the Deleteblogposts model
 * @property private $postID Holds get value for postID
 *
 */
class Handeldelete extends Password
{

    private $model;
    private $postID;

    public function __construct($postID, $model)
    {

        $this->model = $model;
        $this->postID = $postID;
    }

    public function HandeDeleteBlogPosts()
    {

        $result = $this->model->DeleteBlogPosts($this->postID);

        if ($result->errorInfo) {

           return $result->getMessage();
        }

        if ($result) {

          return 'Post deleted.';
        }
    }
}
