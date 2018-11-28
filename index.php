<?php session_start();
var_dump($_SESSION);
   // $_SESSION['fave'] = [];
if(!isset($_SESSION['fave'])) {
   $_SESSION['fave'] = [];
}


function is_fav($id) {
  if(in_array($id, $_SESSION['fave'])){
    return true;
  }
}
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <p><?php

     echo join(", ", $_SESSION['fave']); ?>
</p>

    <div id="blog-post-101" class="blog-post">
      <h3>Blog Post 101</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
      </p>
      <button class="favorite-button"  <?php if(is_fav(101)){echo "style=\"background-color:red;color:white;\"";} ?>>Favourite</button>
    </div>

        <div id="blog-post-102" class="blog-post">
          <h3>Blog Post 102</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
          </p>
          <button class="favorite-button"  <?php if(is_fav(102)){echo "style=\"background-color:red;color:white;\"";} ?>>Favourite</button>
        </div>



            <div id="blog-post-103" class="blog-post">
              <h3>Blog Post 103</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
              </p>
              <button class="favorite-button"  <?php if(is_fav(103)){echo "style=\"background-color:red;color:white;\"";} ?>>Favourite</button>
            </div>


                <div id="blog-post-104" class="blog-post">
                  <h3>Blog Post 104</h3>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                  </p>
                  <button class="favorite-button"  <?php if(is_fav(104)){echo "style=\"background-color:red;color:white;\"";} ?>>Favourite</button>
                </div>

    <script type="text/javascript">
    function favourite() {

      let parent = this.parentElement;
      let json_upload = "id=" + parent.id;
      fetch('fav.php',
        {
        method:"POST",
        headers: {
          "Content-type":"application/x-www-form-urlencoded",
          "X-REQUESTED-WITH" : "XMLHttpRequest"
        },
        body: json_upload,
        credentials: 'same-origin' })
      .then(response => response.text() )
    .then(data => {
      if(data == "true") {
        parent.classList.add("favourite");
        // this.style.setProperty('background-color', 'red');
        this.style.cssText = "background-color:red; color:white;";
        }
      console.log(data);
     });
    }
    const ajaxButton = document.querySelectorAll('.favorite-button');
    ajaxButton.forEach(e => e.addEventListener('click', favourite));
    </script>
  </body>
</html>
