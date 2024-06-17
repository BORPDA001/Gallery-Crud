<?php
require_once ("DB.php");
class Posts {
    protected  $conn;
    public function __construct() {
        $db = new Database();
        $this->conn = $db->connect();
    }
    public function createPost($data) {
        $user_id = $data['user_id'];
        $post_title = $data['post_title'];
        if($post_title=="" AND $user_id=="") {
            $_SESSION['msg'] = [
                "status" => "warning",
                "text" => "Post title or user id NULL!"
            ];
            header("location:http://localhost/blog/view/dashboard/posts/index.php");
        }
        $post_description = $data['post_description'];
        $post_image = $data['post_image'];
        $sql = "INSERT INTO posts (
                   created_at,
                   updated_at,
                   creator_id,
                   post_title,
                   post_description,
                   post_image
                   ) VALUES (
                             now(),
                             null,
                             '$user_id',
                             '$post_title',
                             '$post_description',
                             '$post_image'
                   )";
        $result = $this->conn->query($sql);
        if($result) {
            $_SESSION['msg'] = [
                "status" => "success",
                "text" => "Post successfully created!"
            ];
            header("location:http://localhost/blog/view/dashboard/posts/index.php");
        } else {
            $_SESSION['msg'] = [
                "status" => "fail",
                "text" => "Post was not created!"
            ];
            header("location:http:http://localhost/blog/view/dashboard/posts/index.php");
        }
    }
    public function getPosts($user_id) {

        if ($user_id!=="" AND  $user_id!==null){
            $sql_sort = " WHERE posts.creator_id = '$user_id' GROUP BY posts.id ORDER BY posts.created_at DESC";
        }else{
            $sql_sort = "  GROUP BY posts.id ORDER BY posts.created_at DESC";
        }
        $sql = "
        SELECT posts.*, COUNT(like_post.post_id) AS like_count FROM posts LEFT JOIN like_post ON posts.id = like_post.post_id $sql_sort;
        ";
        $result = $this->conn->query($sql);
        return json_encode($result->fetch_all(MYSQLI_ASSOC));
    }
    public function deletePost($user_id,$post_id) {
        if ($user_id!=="" AND  $user_id!==null){
            header('HTTP/1.1 400 Bad Request');
        }
        if ($post_id!=="" AND  $post_id!==null){
            header('HTTP/1.1 400 Bad Request');
        }
        $sql = "
            DELETE FROM posts WHERE id = '$post_id' AND creator_id = '$user_id'";
        $result = $this->conn->query($sql);
        if($result) {
            header('HTTP/1.1 200 Bad Request');
        } else {
            header('HTTP/1.1 400 Bad Request');
        }
    }

    public function likePost($user_id,$post_id)
    {
        if ($user_id == "" OR $user_id == null) {
            header('HTTP/1.1 400 Bad Request');
        }
        if ($post_id== "" OR $post_id == null) {
            header('HTTP/1.1 400 Bad Request');
        }

        $SQL_REVIEW_LIKE = "SELECT * FROM like_post WHERE creator_id= '$user_id' AND post_id = '$post_id'";
        $result = $this->conn->query($SQL_REVIEW_LIKE);
        if ($result->num_rows > 0) {
            $like_id = $result->fetch_assoc()["id"];
            $DELETE_LIKE = "DELETE FROM like_post WHERE id = '$like_id' AND creator_id = '$user_id' AND post_id = '$post_id'";
            $result_delete = $this->conn->query($DELETE_LIKE);
            if ($result_delete) {
                header('HTTP/1.1 200 OK');
            }
            else {
                header('HTTP/1.1 400 Bad Request');
            }
        } else {
            $SQL_INSERT_LIKE = "INSERT INTO like_post (creator_id,post_id,creaded_at) VALUES ('$user_id','$post_id',now())";
            $result_insert_like = $this->conn->query($SQL_INSERT_LIKE);
            if($result_insert_like) {
                header('HTTP/1.1 200 OK');
            } else {
                header('HTTP/1.1 400 Bad Request');
            }
        }
    }
    public function getMyWishListCount($user_id) {
        if ($user_id!=="" AND  $user_id!==null){
            $sql = "SELECT COUNT(id) as like_count FROM like_post WHERE  creator_id = '$user_id'";
            $result = $this->conn->query($sql);
            if($result) {
                return json_encode($result->fetch_all(MYSQLI_ASSOC));
            } else {
                header('HTTP/1.1 400 Bad Request');
            }
        }else{

        }

    }
    public function getMyWishList($user_id) {
        if ($user_id!=="" AND  $user_id!==null){
            $sql = "
                  SELECT posts.*,count(like_post.post_id) AS like_count FROM like_post LEFT JOIN posts ON posts.id = like_post.post_id WHERE like_post.creator_id = '$user_id' GROUP BY posts.id ORDER BY posts.created_at DESC;";
            $result = $this->conn->query($sql);
            return json_encode($result->fetch_all(MYSQLI_ASSOC));
            } else {
            }
        }



}
