<script src="assets/vendors/js/vendors.min.js" type="text/javascript"></script>
<script src="assets/js/core/app-menu.js" type="text/javascript"></script>
<script src="assets/js/core/app.js" type="text/javascript"></script>
<?php if ((curPageName() == 'addInfographic.php')) { ?>
  <script src='assets/jquery-3.3.1.min.js'></script>
  <script src="assets/infographics/script.js"></script>
  <script src="assets/jquery-2.2.4.min.js"></script>
  <script src="assets/config.js" type="text/javascript"></script>
  <script src="assets/bootstrap-maxlength.js"></script>
  <script type="text/JavaScript">
    $(function () {
        $("#titleInfographic").maxlength();
        });
  </script>
<?php }
if ((curPageName() == 'addStory.php')) { ?>
  <script src="assets/jquery-2.2.4.min.js"></script>
  <script src="assets/story/script.js"></script>
<?php }
if ((curPageName() == 'addVideo.php') || (curPageName() == 'modVideo.php')) { ?>
  <script src='assets/jquery-3.3.1.min.js'></script>
  <script src="assets/vendors/js/ckeditor/ckeditor.js"></script>
  <script src="assets/video/script.js"></script>
  <script src="assets/jquery-2.2.4.min.js"></script>
  <script src="assets/config.js" type="text/javascript"></script>
  <script src="assets/bootstrap-maxlength.js"></script>
  <script type="text/JavaScript">
    $(function () {
        $("#titleVideo").maxlength();
    });
</script>
<?php }
if ((curPageName() == 'addNews.php') || (curPageName() == 'modNews.php')) { ?>
  <script src='assets/jquery-3.3.1.min.js'></script>
  <script src="assets/vendors/js/ckeditor/ckeditor.js"></script>
  <script src="assets/news/script.js"></script>
  <script src="assets/jquery-2.2.4.min.js"></script>
  <script src="assets/config.js" type="text/javascript"></script>
  <script src="assets/bootstrap-maxlength.js"></script>
  <script type="text/JavaScript">
    $(function () {
        $("#titleNews").maxlength();
        });
      </script>
<?php }
if ((curPageName() == 'addOpinions.php') || (curPageName() == 'modOpinion.php')) { ?>
  <script src='assets/jquery-3.3.1.min.js'></script>
  <script src="assets/vendors/js/ckeditor/ckeditor.js"></script>
  <script src="assets/writers/script.js"></script>
  <script src="assets/jquery-2.2.4.min.js"></script>
  <script src="assets/config.js" type="text/javascript"></script>
<?php }
if ((curPageName() == 'addSousCat.php') || (curPageName() == 'modSouscat.php') || (curPageName() == 'addCat.php') || (curPageName() == 'modCat.php') || (curPageName() == 'seo.php') || (curPageName() == 'addUser.php')) { ?>
  <script src="assets/jquery-2.2.4.min.js"></script>
  <script src="assets/config.js" type="text/javascript"></script>
<?php }
if ((curPageName() == 'addWriter.php') || (curPageName() == 'modWriter.php')) { ?>
  <script src="assets/writers/script.js"></script>
  <script src="assets/jquery-2.2.4.min.js"></script>
  <script src="assets/config.js" type="text/javascript"></script>
<?php }
if ((curPageName() == 'afficherCat.php') || (curPageName() == 'afficherSousCat.php') || (curPageName() == 'afficherNews.php')
  || (curPageName() == 'afficherWriter.php') || (curPageName() == 'afficherOpinions.php') || (curPageName() == 'afficherVideos.php') || (curPageName() == 'afficherInfographic.php') || (curPageName() == 'afficherStories.php')
) { ?>
  <link rel="stylesheet" type="text/css" href="assets/vendors/css/tables/datatable/datatables.min.css">
  <script src="assets/vendors/js/tables/datatable/datatables.min.js" type="text/javascript"></script>
  <script>
    $(document).ready(function() {
      var isAfficherNews = "<?php echo curPageName(); ?>" === "afficherNews.php";
      $('#list').dataTable({
        "order": [],
        "pageLength": isAfficherNews ? 100 : 200,
        "paging": !isAfficherNews
      });
    });
  </script>
  <script src="assets/config.js" type="text/javascript"></script>
<?php } ?>