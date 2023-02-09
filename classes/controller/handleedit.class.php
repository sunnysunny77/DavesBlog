<?php
/**
 * Handleedit controlls the edit action
 *
 * @author Daniel Costello
 * @property private $model Holds the Blogposts model
 * @property private $post Holds the $_POST object
 *
 */
class Handleedit
{

    private $model;
    private $post;

    public function __construct($model)
    {

        $this->model = $model;
        $this->post = $_POST;
    }

    public function EditBlogPosts()
    {

        $_POST = array_map('stripslashes', $this->post);

        extract($_POST);

        if ($postID == '') {
            $error[] = 'This post is missing a valid id!.';
        }

        if ($postTitle == '') {
            $error[] = 'Please enter the title.';
        }

        if ($postDesc == '') {
            $error[] = 'Please enter the description.';
        }

        if ($postCont == '') {
            $error[] = 'Please enter the content.';
        }

        $uploadbool = is_uploaded_file($_FILES["upload"]["tmp_name"]) ? true : null;;

        if (isset($uploadbool)) {

            $uploadfile = $_FILES["upload"]["tmp_name"];
            $uploadname = $_FILES["upload"]["name"];
            $uploadtype = $_FILES["upload"]["type"];
            $uploaddata = file_get_contents($uploadfile);
        } 

        if (isset($error)) {

            return $error;
        }

        if (!isset($error)) {

            if (isset($uploadbool)) {

                $result = $this->model->SetEditBlogPostsImage($postTitle, $postDesc, $postCont, $postID, $uploadtype, $uploadname, $uploaddata);
            } else {

                $result = $this->model->SetEditBlogPosts($postTitle, $postDesc, $postCont, $postID);
            }

            if (isset($result->errorInfo)) {

                return header("Location: ./?error=" . $result->getMessage());
            }

            if (isset($result)) {

                return header("Location: ./?output=Post updated.");
            }
        }
    }
}
