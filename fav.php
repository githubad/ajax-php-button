<?php session_start();
if(!isset($_SESSION['fave'])) { $_SESSION['fave'] = []; }

        function is_ajax_request() {
        if(isset($_SERVER["HTTP_X_REQUESTED_WITH"]) && $_SERVER["HTTP_X_REQUESTED_WITH"] == "XMLHttpRequest") {
           return true;
         }
        }

        if(!is_ajax_request()) { exit(); }

        $raw_id = isset($_POST['id']) ? $_POST['id'] : '';

        if(preg_match("/blog-post-(\d+)/", $raw_id , $matches)) {
          $id = $matches[1];

          if(!in_array($id, $_SESSION['fave'])) {
            $_SESSION['fave'][] = $id;
          }
             echo "true";
        } else {
          echo "false";
        }

 ?>
