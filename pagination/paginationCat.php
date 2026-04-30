<?php
  session_start();
  require_once('../admin/assets/func.php');
  $db = connect();

  $limit = 15;
  $c = ' id_category ="'.$_POST['cat'].'"';
  if($_POST['souscat'] == '0'){ $s = ''; }else{ $s = ' and id_sousCategory ="'. $_POST['souscat'].'"';}

  $d = mysqli_fetch_array(mysqli_query($db,"SELECT COUNT(*) AS total FROM  news where id < ".$_POST['pageNo']." and ".$c." ".$s." ")); 
  $total=$d['total'];



  $sql = "select * from news where id < ".$_POST['pageNo']." and ".$c." ".$s."  order by id desc limit ".$limit."";
  $query = mysqli_query($db,$sql);

  if(mysqli_num_rows($query) > 0){
    $output = "";
    while($row = mysqli_fetch_assoc($query)){
         $last_id = $row["id"];
         $url = cripter($row["id"],264).'-'.replace($row["titre"]).'.html';
        $date = HeureCh($row["date"]);
        $output .= "<article class='col-lg-4 col-md-4 col-sm-12 col-xs-12'>
        <div class='overlay card'>
            <div class='cover'>
                <div class='card-img-top'>
                    <a class='stretched-link' href='news/{$url}' title='{$row["titre"]}'>
                        <div class='ratio-medium'>
                            <img width='800' height='533'
                                src='assets/img/news/{$row["photo"]}'
                            class='img-fluid wp-post-image' alt='' loading='lazy'
                            srcset='assets/img/news/{$row["photo"]} 768w,
                            assets/img/news/{$row["photo"]} 100w,
                            assets/img/news/{$row["photo"]} 200w,
                            assets/img/news/{$row["photo"]} 300w,
                            assets/img/news/{$row["photo"]} 400w,
                            assets/img/news/{$row["photo"]} 500w,
                            assets/img/news/{$row["photo"]} 800w'
                            sizes='( max-width : 100px ) 100px ,( max-width : 200px )
                            200px ,( max-width : 300px ) 300px ,( max-width : 400px )
                            400px ,( max-width : 500px ) 500px ,800px'>
                        </div>
                    </a>
                </div>
                <div class='card-body'>
                    <div class='card-details'>
                        <div class='card-text'>
                            <span class='date-card'>
                                <small class='text-muted time'>
                                        {$date}
                                </small>
                            </span>
                        </div>
                        <h3 class='card-title'>
                                {$row["titre"]}
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </article>";
    }
    $output .="<div id='pagination' style='vertical-align: top;text-align: center;clear: both;'>
        <button  class='btn btn-outline-success ajaxbtn' data-id='{$last_id}'>المزيد</button>
    </div>";

    echo $output;
  }else{
      echo '';
  }

  mysqli_close($db);

?>