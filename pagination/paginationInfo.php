<?php
  require_once('../admin/assets/func.php');
  $db = connect();

  $limit = 15;
  if(isset($_POST['pageNo'])){
      $page = $_POST['pageNo'];
  }else{
      $page = 0;
  }

  $sql = "select * from caricature order by id desc limit {$page},$limit";
  $query = mysqli_query($db,$sql);

  if(mysqli_num_rows($query) > 0){
    $output = "";
    while($row = mysqli_fetch_assoc($query)){
        $last_id = $row["id"];
        $output .= "<article class='col-md-4'>
        <div class='card card-full hover-a'>
         <div class='ratio_251-141 image-wrapper'>
           <a href='infographic.php?i={$row["id"]}'>
             <img class='img-fluid lazy loaded' src='assets/img/infographics/{$row["photo"]}' alt='Image description'>
           </a>
         </div>
         <div class='card-body'>
           <h3 class='card-title h6'>
             <a href='infographic.php?i={$row["id"]}'>{$row["titre"]}</a>
           </h3>
         </div>
       </div>
     </article>";
    }
    $output .="<div id='pagination' style='vertical-align: top;text-align: center;clear: both;'>
        <button id='ajaxbtn' class='btn btn-outline-success' data-id='{$last_id}'>المزيد</button>
    </div>";

    echo $output;
  }else{
      echo '';
  }

  mysqli_close($db);

?>