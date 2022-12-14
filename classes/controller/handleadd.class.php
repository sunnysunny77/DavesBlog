<?php
/**
 * Handleadd controlls the add action
 *
 * @author Daniel Costello
 * @property private $model Holds the Blogposts model
 * @property private $post Holds the $_POST object
 *
 */
class Handleadd
{

    private $model;
    private $post;

    public function __construct($model)
    {

        $this->model = $model;
        $this->post = $_POST;
    }

    public function AddBlogPosts()
    {

        $_POST = array_map('stripslashes', $this->post);

        extract($_POST);

        if ($postTitle == '') {
            $error[] = 'Please enter the title.';
        }

        if ($postDesc == '') {
            $error[] = 'Please enter the description.';
        }

        if ($postCont == '') {
            $error[] = 'Please enter the content.';
        }

        if (isset($error)) {

            return $error;
        }

        if (!isset($error)) {

            $result = $this->model->SetAddBlogPosts($postTitle, $postDesc, $postCont);

            if (isset($result->errorInfo)) {

                return header("Location: ./?error=" . $result->getMessage());
            }

            if (isset($result)) {

                return header("Location: ./?output=Post added.");
            }
        }
    }
}
