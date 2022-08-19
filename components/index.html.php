<div id='wrapper'>
    <h1>Blog</h1>
    <hr />
    <?php

    if ($this->result->errorInfo) {

        echo '<h2>' . $this->result->getMessage() . '</h2>';
        ?>
        </div>
        <?php
        exit();
    }

    foreach ($this->result as $row) {

        echo '<div>';
        echo '<h1><a href="viewpost.php?action=single&id=' . $row['postID'] . '">' . $row['postTitle'] . '</a></h1>';
        echo '<p>Posted on ' . date('jS M Y H:i:s', strtotime($row['postDate'])) . '</p>';
        echo '<p>' . $row['postDesc'] . '</p>';
        echo '<p><a href="viewpost.php?action=single&id=' . $row['postID'] . '">Read More</a></p>';
        echo '</div>';
    }
    ?>
</div>