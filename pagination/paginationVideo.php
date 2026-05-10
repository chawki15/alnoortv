<?php
  session_start();
  require_once('../admin/assets/func.php');
  $pdo = connect_pdo();
  $limit = 15;
  $pageNo = isset($_POST['pageNo']) ? (int)$_POST['pageNo'] : 0;
  $cat = isset($_POST['cat']) ? (int)$_POST['cat'] : 0;
  $souscat = isset($_POST['souscat']) ? (int)$_POST['souscat'] : 0;
  $sousCategorySql = '';
  $params = [
    ':pageNo' => $pageNo,
    ':cat' => $cat,
  ];

  if ($souscat !== 0) {
    $sousCategorySql = ' AND id_sousCategory = :souscat';
    $params[':souscat'] = $souscat;
 }
  $stmt = $pdo->prepare("SELECT * FROM news WHERE id < :pageNo AND id_category = :cat{$sousCategorySql} ORDER BY id DESC LIMIT {$limit}");
  $stmt->execute($params);
  $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

  if (count($rows) > 0) {
    $output = "";
    foreach ($rows as $row) {
      $last_id = $row["id"];
      $url = cripter($row["id"], 264) . '-' . replace($row["titre"]) . '.html';
      $date = HeureCh($row["date"]);
      $output .= "<article class='col-lg-4 col-md-4 col-sm-12 col-xs-12'>
        <div class='overlay card'>
            <div class='cover'>
                <div class='card-img-top'>
                    <a class='stretched-link' href='video/{$url}' title='{$row["titre"]}'>
                        <div class='ratio-medium'>
                            <img width='800' height='533'
                                src='assets/img/videos/{$row["photo"]}'
                            class='img-fluid wp-post-image' alt='' loading='lazy'
                            srcset='assets/img/videos/{$row["photo"]} 768w,
                            assets/img/videos/{$row["photo"]} 100w,
                            assets/img/videos/{$row["photo"]} 200w,
                            assets/img/videos/{$row["photo"]} 300w,
                            assets/img/videos/{$row["photo"]} 400w,
                            assets/img/videos/{$row["photo"]} 500w,
                            assets/img/videos/{$row["photo"]} 800w'
                            sizes='( max-width : 100px ) 100px ,( max-width : 200px )
                            200px ,( max-width : 300px ) 300px ,( max-width : 400px )
                            400px ,( max-width : 500px ) 500px ,800px'>
                            <div class='post-type-icon'>
                                <span class='fa-stack-sea'>
                                    <i class='fas fa-play fa-stack-1x text-primary'></i>
                                </span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class='card-body'>
                    <div class='card-details'>
                        <div class='card-text'>
                            <span class='date-card'>
                                <small class='text-muted time'>{$date}</small>
                            </span>
                        </div>
                        <h3 class='card-title'>{$row["titre"]}</h3>
                    </div>
                </div>
            </div>
        </div>
    </article>";
    }
    $output .= "<div id='pagination' style='vertical-align: top;text-align: center;clear: both;'>
        <button class='btn btn-outline-success ajaxbtn' data-id='{$last_id}'>المزيد</button>
    </div>";
    echo $output;
  } else {
      echo '';
  }
?>