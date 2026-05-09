<?php
require_once('admin/assets/func.php');
$pdo = connect_pdo();
$db = $pdo;
/* ========= Defaults ========= */
$titre = $photo = $auteur = $des1 = $des2 = $des3 = $des4 = $des5 = '';
$date = $nomcat = $nomsouscat = $souscat = $url = $photos = $des = '';
$cat = $writer = 0;
/* ========= n ========= */
if (isset($_GET['n'])) {
  $n = safeInt(decripter($_GET['n'], 264));
  if (!existsById($pdo, 'news', $n)) {
    redirectHomeAndExit();
  }
  $titre  = (string)getById($pdo, 'news', 'titre', $n);
  $photo  = (string)getById($pdo, 'news', 'photo', $n);
  $auteur = (string)getById($pdo, 'news', 'auteur', $n);
  $des1   = (string)getById($pdo, 'news', 'description', $n);
  $des2   = (string)getById($pdo, 'news', 'description2', $n);
  $des3   = (string)getById($pdo, 'news', 'description3', $n);
  $des4   = (string)getById($pdo, 'news', 'description4', $n);
  $des5   = (string)getById($pdo, 'news', 'description5', $n);
  $date   = (string)getById($pdo, 'news', 'date', $n);
  $cat    = safeInt(getById($pdo, 'news', 'id_category', $n));
  $nomcat = (string)getById($pdo, 'categories', 'name', $cat);
  incrementViews($pdo, $n);
}
/* ========= v ========= */
if (isset($_GET['v'])) {
  $v = safeInt(decripter($_GET['v'], 264));
  if (!existsById($pdo, 'news', $v)) {
    redirectHomeAndExit();
  }
  $titre  = (string)getById($pdo, 'news', 'titre', $v);
  $url    = (string)getById($pdo, 'news', 'urlVideo', $v);
  $auteur = (string)getById($pdo, 'news', 'auteur', $v);
  $des1   = (string)getById($pdo, 'news', 'description', $v);
  $date   = (string)getById($pdo, 'news', 'date', $v);
  $cat    = safeInt(getById($pdo, 'news', 'id_category', $v));
  $nomcat = (string)getById($pdo, 'categories', 'name', $cat);
  incrementViews($pdo, $v);
}
/* ========= c ========= */
if (isset($_GET['c'])) {
  $cat = safeInt($_GET['c']);
  $nomcat = (string)getById($pdo, 'categories', 'name', $cat);
  $nomsouscat = '';
  $souscat = '';
}
/* ========= cat ========= */
if (isset($_GET['cat'])) {
  $cat = safeInt($_GET['cat']);
  $nomcat = (string)getById($pdo, 'categories', 'name', $cat);
}
/* ========= s ========= */
if (isset($_GET['s'])) {
  $souscat = safeInt($_GET['s']);
  $nomsouscat = (string)getById($pdo, 'sous_categories', 'name', $souscat);
}
/* ========= i ========= */
if (isset($_GET['i'])) {
  $i = safeInt($_GET['i']);
  $titre  = (string)getById($pdo, 'caricature', 'titre', $i);
  $date   = (string)getById($pdo, 'caricature', 'date', $i);
  $photos = (string)getById($pdo, 'caricature', 'photos', $i);
}
/* ========= o ========= */
if (isset($_GET['o'])) {
  $o = safeInt(decripter($_GET['o'], 264));
  if (!existsById($pdo, 'opinion', $o)) {
    redirectHomeAndExit();
  }
  $titre  = (string)getById($pdo, 'opinion', 'titre', $o);
  $des    = (string)getById($pdo, 'opinion', 'description', $o);
  $date   = (string)getById($pdo, 'opinion', 'date', $o);
  $writer = safeInt(getById($pdo, 'opinion', 'id_writer', $o));
}
$host = $_SERVER['HTTP_HOST'] ?? '';
$isLocal =
  in_array($host, ['localhost', '127.0.0.1'], true) ||
  str_ends_with($host, '.test') ||
  str_ends_with($host, '.local');
$baseHref = $isLocal
  ? ('http://' . $host . '/alnoortv/')
  : 'https://www.alnoortv.ma/';
function seo_attr($value)
{
  return htmlspecialchars((string)$value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}
?>
<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
  <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
  <?php include_once('include/metas.php'); ?>
  <title>
    <?php echo seo_attr($title_doc); ?>
  </title>
  <meta name="description" content="<?php echo seo_attr($desc_doc); ?>">
  <meta name="keywords" content="<?php echo seo_attr($keys_doc); ?>">
  <meta name="robots" content="<?php echo seo_attr($robots_doc ?? 'index, follow'); ?>">
  <link rel="canonical" href="<?php echo seo_attr($canonical_url ?? $baseHref); ?>" />
  <meta property="og:locale" content="ar_MA" />
  <meta property="og:type" content="<?php echo seo_attr($og_type ?? 'website'); ?>" />
  <meta property="og:site_name" content="النور TV" />
  <meta property="og:title" content="<?php echo seo_attr($title_doc); ?>" />
  <meta property="og:description" content="<?php echo seo_attr($desc_doc); ?>" />
  <meta property="og:url" content="<?php echo seo_attr($canonical_url ?? $baseHref); ?>" />
  <meta property="og:image"
    content="<?php echo seo_attr($img_doc ?? 'https://www.alnoortv.ma/assets/img/logoo.gif'); ?>" />
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:title" content="<?php echo seo_attr($title_doc); ?>" />
  <meta name="twitter:description" content="<?php echo seo_attr($desc_doc); ?>" />
  <meta name="twitter:image"
    content="<?php echo seo_attr($img_doc ?? 'https://www.alnoortv.ma/assets/img/logoo.gif'); ?>" />
  <?php if ((curPageName() == 'index.php') || (curPageName() == './')) { ?>
  <script type="application/ld+json">
      <?php echo json_encode([
        '@context' => 'https://schema.org',
        '@type' => 'NewsMediaOrganization',
        'name' => 'النور TV',
        'alternateName' => 'Al Noor TV',
        'url' => 'https://www.alnoortv.ma/',
        'logo' => 'https://www.alnoortv.ma/assets/img/logoo.gif',
        'description' => $desc_doc,
        'inLanguage' => 'ar-MA',
      ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); ?>
    </script>
  <script type="application/ld+json">
      <?php echo json_encode([
        '@context' => 'https://schema.org',
        '@type' => 'WebSite',
        'name' => 'النور TV',
        'url' => 'https://www.alnoortv.ma/',
        'description' => $desc_doc,
        'inLanguage' => 'ar-MA',
      ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); ?>
    </script>
  <?php } ?>
  <base href="<?php echo seo_attr($baseHref); ?>" />
  <link rel="apple-touch-icon" sizes="57x57" href="assets/img/favicon/apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="assets/img/favicon/apple-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="assets/img/favicon/apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/favicon/apple-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="assets/img/favicon/apple-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="assets/img/favicon/apple-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="assets/img/favicon/apple-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="assets/img/favicon/apple-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicon/apple-icon-180x180.png">
  <link rel="icon" type="image/png" sizes="192x192" href="assets/img/favicon/android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon/favicon-16x16.png">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
  <meta name="theme-color" content="#ffffff">
  <!-- Fonts -->
  <style>
    @font-face {
      font-family: 'iconFont';
      src: url("assets/css/fonts/iconfont.woff") format("woff");
      font-weight: normal;
      font-style: normal;
      font-display: swap
    }
    @font-face {
      font-family: "Kalligraaf Arabic Light";
      font-weight: 300;
      font-style: normal;
      font-stretch: normal;
      font-display: swap;
      src: url("assets/css/fonts/Kalligraaf/Kalligraaf_Arabic_Light.ttf") format("truetype")
    }
    @font-face {
      font-family: "Kalligraaf Arabic Medium";
      font-weight: 500;
      font-style: normal;
      font-stretch: normal;
      font-display: swap;
      src: url("assets/css/fonts/Kalligraaf/Kalligraaf_Arabic_Medium.ttf") format("truetype")
    }
    @font-face {
      font-family: "Kalligraaf Arabic Semi Bold";
      font-weight: 700;
      font-style: normal;
      font-stretch: normal;
      font-display: swap;
      src: url("assets/css/fonts/Kalligraaf/Kalligraaf_Arabic_Bold.ttf") format("truetype")
    }
  </style>
  <link rel="preload" href="assets/css/fonts/iconfont.woff" as="font" type="font/woff" crossorigin>
  <link rel="preload" href="assets/css/fonts/Kalligraaf/Kalligraaf_Arabic_Light.ttf" as="font" type="font/ttf"
    crossorigin>
  <link rel="preload" href="assets/css/fonts/Kalligraaf/Kalligraaf_Arabic_Medium.ttf" as="font" type="font/ttf"
    crossorigin>
  <link rel="preload" href="assets/css/fonts/Kalligraaf/Kalligraaf_Arabic_Bold.ttf" as="font" type="font/ttf"
    crossorigin>
  <!-- Page CSS -->
  <?php if ((curPageName() == 'index.php') || (curPageName() == './')) { ?>
  <link rel="stylesheet" type="text/css" media="screen" href="assets/index.css" />
  <link rel="stylesheet" type="text/css" media="screen" href="assets/lazyImages/fancyLazyImages.css" />
  <?php } elseif (
    (curPageName() == 'news.php') ||
    (curPageName() == 'conditions.php') ||
    (curPageName() == 'chaine.php') ||
    (curPageName() == 'contact.php') ||
    (curPageName() == 'author.php') ||
    (curPageName() == 'opinion.php') ||
    (curPageName() == 'opinions.php') ||
    (curPageName() == 'cat.php') ||
    (curPageName() == 'videos.php') ||
    (curPageName() == 'video.php') ||
    (curPageName() == 'infographics.php') ||
    (curPageName() == 'regie.php') ||
    (curPageName() == 'persons.php')
  ) { ?>
  <link rel="stylesheet" type="text/css" media="screen" href="assets/cat.css" />
  <?php } elseif (curPageName() == 'infographic.php') { ?>
  <link rel="stylesheet" type="text/css" media="screen" href="assets/info.css" />
  <?php } ?>
  <meta name="google-site-verification" content="1ywWVdkOYCWPWm5cy6zHNgVre1IJraCiku6K2029HUU" />
  <?php if (
    (curPageName() == 'opinion.php') ||
    (curPageName() == 'video.php') ||
    (curPageName() == 'news.php') ||
    (curPageName() == 'article.php')
  ) { ?>
  <script
    src="https://platform-api.sharethis.com/js/sharethis.js#property=6028d5a5f8ce400012e81629&product=inline-share-buttons"
    async></script>
  <?php } ?>
  <style>
    .col-xs-12 {
      width: 100%
    }
    .col-xs-11 {
      width: 91.66666667%
    }
    .col-xs-10 {
      width: 83.33333333%
    }
    .col-xs-9 {
      width: 75%
    }
    .col-xs-8 {
      width: 66.66666667%
    }
    .col-xs-7 {
      width: 58.33333333%
    }
    .col-xs-6 {
      width: 50%
    }
    .col-xs-5 {
      width: 41.66666667%
    }
    .col-xs-4 {
      width: 33.33333333%
    }
    .col-xs-3 {
      width: 25%
    }
    .col-xs-2 {
      width: 16.66666667%
    }
    .col-xs-1 {
      width: 8.33333333%
    }
    .col-xs-pull-12 {
      right: 100%
    }
    .col-xs-pull-11 {
      right: 91.66666667%
    }
    .col-xs-pull-10 {
      right: 83.33333333%
    }
    .col-xs-pull-9 {
      right: 75%
    }
    .col-xs-pull-8 {
      right: 66.66666667%
    }
    .col-xs-pull-7 {
      right: 58.33333333%
    }
    .col-xs-pull-6 {
      right: 50%
    }
    .col-xs-pull-5 {
      right: 41.66666667%
    }
    .col-xs-pull-4 {
      right: 33.33333333%
    }
    .col-xs-pull-3 {
      right: 25%
    }
    .col-xs-pull-2 {
      right: 16.66666667%
    }
    .col-xs-pull-1 {
      right: 8.33333333%
    }
    .col-xs-pull-0 {
      right: auto
    }
    .col-xs-push-12 {
      left: 100%
    }
    .col-xs-push-11 {
      left: 91.66666667%
    }
    .col-xs-push-10 {
      left: 83.33333333%
    }
    .col-xs-push-9 {
      left: 75%
    }
    .col-xs-push-8 {
      left: 66.66666667%
    }
    .col-xs-push-7 {
      left: 58.33333333%
    }
    .col-xs-push-6 {
      left: 50%
    }
    .col-xs-push-5 {
      left: 41.66666667%
    }
    .col-xs-push-4 {
      left: 33.33333333%
    }
    .col-xs-push-3 {
      left: 25%
    }
    .col-xs-push-2 {
      left: 16.66666667%
    }
    .col-xs-push-1 {
      left: 8.33333333%
    }
    .col-xs-push-0 {
      left: auto
    }
    .col-xs-offset-12 {
      margin-left: 100%
    }
    .col-xs-offset-11 {
      margin-left: 91.66666667%
    }
    .col-xs-offset-10 {
      margin-left: 83.33333333%
    }
    .col-xs-offset-9 {
      margin-left: 75%
    }
    .col-xs-offset-8 {
      margin-left: 66.66666667%
    }
    .col-xs-offset-7 {
      margin-left: 58.33333333%
    }
    .col-xs-offset-6 {
      margin-left: 50%
    }
    .col-xs-offset-5 {
      margin-left: 41.66666667%
    }
    .col-xs-offset-4 {
      margin-left: 33.33333333%
    }
    .col-xs-offset-3 {
      margin-left: 25%
    }
    .col-xs-offset-2 {
      margin-left: 16.66666667%
    }
    .col-xs-offset-1 {
      margin-left: 8.33333333%
    }
    .col-xs-offset-0 {
      margin-left: 0
    }
    @media (min-width:768px) {
      .col-sm-1,
      .col-sm-10,
      .col-sm-11,
      .col-sm-12,
      .col-sm-2,
      .col-sm-3,
      .col-sm-4,
      .col-sm-5,
      .col-sm-6,
      .col-sm-7,
      .col-sm-8,
      .col-sm-9 {
        float: left
      }
      .col-sm-12 {
        width: 100%
      }
      .col-sm-11 {
        width: 91.66666667%
      }
      .col-sm-10 {
        width: 83.33333333%
      }
      .col-sm-9 {
        width: 75%
      }
      .col-sm-8 {
        width: 66.66666667%
      }
      .col-sm-7 {
        width: 58.33333333%
      }
      .col-sm-6 {
        width: 50%
      }
      .col-sm-5 {
        width: 41.66666667%
      }
      .col-sm-4 {
        width: 33.33333333%
      }
      .col-sm-3 {
        width: 25%
      }
      .col-sm-2 {
        width: 16.66666667%
      }
      .col-sm-1 {
        width: 8.33333333%
      }
      .col-sm-pull-12 {
        right: 100%
      }
      .col-sm-pull-11 {
        right: 91.66666667%
      }
      .col-sm-pull-10 {
        right: 83.33333333%
      }
      .col-sm-pull-9 {
        right: 75%
      }
      .col-sm-pull-8 {
        right: 66.66666667%
      }
      .col-sm-pull-7 {
        right: 58.33333333%
      }
      .col-sm-pull-6 {
        right: 50%
      }
      .col-sm-pull-5 {
        right: 41.66666667%
      }
      .col-sm-pull-4 {
        right: 33.33333333%
      }
      .col-sm-pull-3 {
        right: 25%
      }
      .col-sm-pull-2 {
        right: 16.66666667%
      }
      .col-sm-pull-1 {
        right: 8.33333333%
      }
      .col-sm-pull-0 {
        right: auto
      }
      .col-sm-push-12 {
        left: 100%
      }
      .col-sm-push-11 {
        left: 91.66666667%
      }
      .col-sm-push-10 {
        left: 83.33333333%
      }
      .col-sm-push-9 {
        left: 75%
      }
      .col-sm-push-8 {
        left: 66.66666667%
      }
      .col-sm-push-7 {
        left: 58.33333333%
      }
      .col-sm-push-6 {
        left: 50%
      }
      .col-sm-push-5 {
        left: 41.66666667%
      }
      .col-sm-push-4 {
        left: 33.33333333%
      }
      .col-sm-push-3 {
        left: 25%
      }
      .col-sm-push-2 {
        left: 16.66666667%
      }
      .col-sm-push-1 {
        left: 8.33333333%
      }
      .col-sm-push-0 {
        left: auto
      }
      .col-sm-offset-12 {
        margin-left: 100%
      }
      .col-sm-offset-11 {
        margin-left: 91.66666667%
      }
      .col-sm-offset-10 {
        margin-left: 83.33333333%
      }
      .col-sm-offset-9 {
        margin-left: 75%
      }
      .col-sm-offset-8 {
        margin-left: 66.66666667%
      }
      .col-sm-offset-7 {
        margin-left: 58.33333333%
      }
      .col-sm-offset-6 {
        margin-left: 50%
      }
      .col-sm-offset-5 {
        margin-left: 41.66666667%
      }
      .col-sm-offset-4 {
        margin-left: 33.33333333%
      }
      .col-sm-offset-3 {
        margin-left: 25%
      }
      .col-sm-offset-2 {
        margin-left: 16.66666667%
      }
      .col-sm-offset-1 {
        margin-left: 8.33333333%
      }
      .col-sm-offset-0 {
        margin-left: 0
      }
    }
    @media (min-width:992px) {
      .col-md-1,
      .col-md-10,
      .col-md-11,
      .col-md-12,
      .col-md-2,
      .col-md-3,
      .col-md-4,
      .col-md-5,
      .col-md-6,
      .col-md-7,
      .col-md-8,
      .col-md-9 {
        float: right
      }
      .col-md-12 {
        width: 100%
      }
      .col-md-11 {
        width: 91.66666667%
      }
      .col-md-10 {
        width: 83.33333333%
      }
      .col-md-9 {
        width: 75%
      }
      .col-md-8 {
        width: 66.66666667%
      }
      .col-md-7 {
        width: 58.33333333%
      }
      .col-md-6 {
        width: 50%
      }
      .col-md-5 {
        width: 41.66666667%
      }
      .col-md-4 {
        width: 33.33333333%
      }
      .col-md-3 {
        width: 25%
      }
      .col-md-2 {
        width: 16.66666667%
      }
      .col-md-1 {
        width: 8.33333333%
      }
      .col-md-pull-12 {
        right: 100%
      }
      .col-md-pull-11 {
        right: 91.66666667%
      }
      .col-md-pull-10 {
        right: 83.33333333%
      }
      .col-md-pull-9 {
        right: 75%
      }
      .col-md-pull-8 {
        right: 66.66666667%
      }
      .col-md-pull-7 {
        right: 58.33333333%
      }
      .col-md-pull-6 {
        right: 50%
      }
      .col-md-pull-5 {
        right: 41.66666667%
      }
      .col-md-pull-4 {
        right: 33.33333333%
      }
      .col-md-pull-3 {
        right: 25%
      }
      .col-md-pull-2 {
        right: 16.66666667%
      }
      .col-md-pull-1 {
        right: 8.33333333%
      }
      .col-md-pull-0 {
        right: auto
      }
      .col-md-push-12 {
        left: 100%
      }
      .col-md-push-11 {
        left: 91.66666667%
      }
      .col-md-push-10 {
        left: 83.33333333%
      }
      .col-md-push-9 {
        left: 75%
      }
      .col-md-push-8 {
        left: 66.66666667%
      }
      .col-md-push-7 {
        left: 58.33333333%
      }
      .col-md-push-6 {
        left: 50%
      }
      .col-md-push-5 {
        left: 41.66666667%
      }
      .col-md-push-4 {
        left: 33.33333333%
      }
      .col-md-push-3 {
        left: 25%
      }
      .col-md-push-2 {
        left: 16.66666667%
      }
      .col-md-push-1 {
        left: 8.33333333%
      }
      .col-md-push-0 {
        left: auto
      }
      .col-md-offset-12 {
        margin-left: 100%
      }
      .col-md-offset-11 {
        margin-left: 91.66666667%
      }
      .col-md-offset-10 {
        margin-left: 83.33333333%
      }
      .col-md-offset-9 {
        margin-left: 75%
      }
      .col-md-offset-8 {
        margin-left: 66.66666667%
      }
      .col-md-offset-7 {
        margin-left: 58.33333333%
      }
      .col-md-offset-6 {
        margin-left: 50%
      }
      .col-md-offset-5 {
        margin-left: 41.66666667%
      }
      .col-md-offset-4 {
        margin-left: 33.33333333%
      }
      .col-md-offset-3 {
        margin-left: 25%
      }
      .col-md-offset-2 {
        margin-left: 16.66666667%
      }
      .col-md-offset-1 {
        margin-left: 8.33333333%
      }
      .col-md-offset-0 {
        margin-left: 0
      }
    }
    @media (min-width:1200px) {
      .col-lg-1,
      .col-lg-10,
      .col-lg-11,
      .col-lg-12,
      .col-lg-2,
      .col-lg-3,
      .col-lg-4,
      .col-lg-5,
      .col-lg-6,
      .col-lg-7,
      .col-lg-8,
      .col-lg-9 {
        float: right
      }
      .col-lg-12 {
        width: 100%
      }
      .col-lg-11 {
        width: 91.66666667%
      }
      .col-lg-10 {
        width: 83.33333333%
      }
      .col-lg-9 {
        width: 75%
      }
      .col-lg-8 {
        width: 66.66666667%
      }
      .col-lg-7 {
        width: 58.33333333%
      }
      .col-lg-6 {
        width: 50%
      }
      .col-lg-5 {
        width: 41.66666667%
      }
      .col-lg-4 {
        width: 33.33333333%
      }
      .col-lg-3 {
        width: 25%
      }
      .col-lg-2 {
        width: 16.66666667%
      }
      .col-lg-1 {
        width: 8.33333333%
      }
      .col-lg-pull-12 {
        right: 100%
      }
      .col-lg-pull-11 {
        right: 91.66666667%
      }
      .col-lg-pull-10 {
        right: 83.33333333%
      }
      .col-lg-pull-9 {
        right: 75%
      }
      .col-lg-pull-8 {
        right: 66.66666667%
      }
      .col-lg-pull-7 {
        right: 58.33333333%
      }
      .col-lg-pull-6 {
        right: 50%
      }
      .col-lg-pull-5 {
        right: 41.66666667%
      }
      .col-lg-pull-4 {
        right: 33.33333333%
      }
      .col-lg-pull-3 {
        right: 25%
      }
      .col-lg-pull-2 {
        right: 16.66666667%
      }
      .col-lg-pull-1 {
        right: 8.33333333%
      }
      .col-lg-pull-0 {
        right: auto
      }
      .col-lg-push-12 {
        left: 100%
      }
      .col-lg-push-11 {
        left: 91.66666667%
      }
      .col-lg-push-10 {
        left: 83.33333333%
      }
      .col-lg-push-9 {
        left: 75%
      }
      .col-lg-push-8 {
        left: 66.66666667%
      }
      .col-lg-push-7 {
        left: 58.33333333%
      }
      .col-lg-push-6 {
        left: 50%
      }
      .col-lg-push-5 {
        left: 41.66666667%
      }
      .col-lg-push-4 {
        left: 33.33333333%
      }
      .col-lg-push-3 {
        left: 25%
      }
      .col-lg-push-2 {
        left: 16.66666667%
      }
      .col-lg-push-1 {
        left: 8.33333333%
      }
      .col-lg-push-0 {
        left: auto
      }
      .col-lg-offset-12 {
        margin-left: 100%
      }
      .col-lg-offset-11 {
        margin-left: 91.66666667%
      }
      .col-lg-offset-10 {
        margin-left: 83.33333333%
      }
      .col-lg-offset-9 {
        margin-left: 75%
      }
      .col-lg-offset-8 {
        margin-left: 66.66666667%
      }
      .col-lg-offset-7 {
        margin-left: 58.33333333%
      }
      .col-lg-offset-6 {
        margin-left: 50%
      }
      .col-lg-offset-5 {
        margin-left: 41.66666667%
      }
      .col-lg-offset-4 {
        margin-left: 33.33333333%
      }
      .col-lg-offset-3 {
        margin-left: 25%
      }
      .col-lg-offset-2 {
        margin-left: 16.66666667%
      }
      .col-lg-offset-1 {
        margin-left: 8.33333333%
      }
      .col-lg-offset-0 {
        margin-left: 0
      }
    }
    @media only screen and (min-width: 320px) and (max-width:768px) {
      .opinions .pic img {
        min-height: 100px;
      }
      .top-content li img {
        height: 110px;
      }
      .top-content .ttl,
      .top-content .caption {
        font-size: 1.2rem;
      }
      .opinions .ttl,
      .gallery li .ttl {
        font-size: 1.2rem;
      }
    }
    @media (max-width:767px) {
      .hidden-xs {
        display: none !important
      }
    }
    @media (min-width:768px) and (max-width:991px) {
      .hidden-sm {
        display: none !important
      }
    }
    @media (min-width:992px) and (max-width:1199px) {
      .hidden-md {
        display: none !important
      }
    }
    @media (min-width:1200px) {
      .hidden-lg {
        display: none !important
      }
    }
    .scrollbar::-webkit-scrollbar {
      background-color: #1b1b1b;
      width: 6px;
    }
    .hidden {
      display: none
    }
    .capttion {
      position: absolute;
      display: block;
      bottom: 0;
      left: 0;
      right: 0;
      padding: 15px;
      background: #000;
      background: rgba(0, 0, 0, .8);
      color: #fff;
    }
    .mgdate {
      margin-top: 3px;
    }
    .footer-dark .widget ul li .font-fr,
    .navbar-nav .nav-item .dropdown-menu .font-fr {
      font-family: 'Pervitina';
      font-size: smaller;
    }
    .breadcrumb .breadcrumb-item a {
      color: var(--cat);
      font-family: 'Kalligraaf Arabic Medium';
      font-weight: 500;
    }
    .breadcrumb .breadcrumb-item+.breadcrumb-item::before {
      padding-right: .5rem;
      padding-left: .5rem;
    }
    .breadcrumb-item+.breadcrumb-item::before {
      display: inline-block;
      padding-right: .5rem;
      color: var(--cat);
      content: "|";
    }
    .mobile-copyright p {
      color: #fff
    }
    .menu-footer {
      columns: 3;
      -webkit-columns: 3;
      -moz-columns: 3;
    }
    header.title,
    header.title-footer {
      position: relative;
      display: flex;
      align-items: center;
      justify-content: start;
      width: 100%;
      margin: 0px 0px 10px 0;
      padding-bottom: 12px;
      z-index: 1;
      color: #0C192F;
      font-size: 26px;
      font-weight: bold;
      text-transform: capitalize;
    }
    header.title a {
      color: var(--color-header);
      font-family: 'Kalligraaf Arabic Light';
    }
    header.title-footer a {
      color: #fff;
      font-family: 'Kalligraaf Arabic Light';
    }
    header.title:before,
    header.title-footer:before {
      right: 0;
    }
    header.title:before,
    header.title-footer:before {
      content: '';
      position: absolute;
      bottom: 0;
      width: 55px;
      height: 5px;
      background-color: #ffc107;
      z-index: 1;
      border-radius: 26px;
    }
    header.title:after,
    header.title-footer:after {
      margin-top: 10px;
      padding-right: 20px;
    }
    header.title:after,
    header.title-footer:after {
      content: '';
      background-image: url(https://al-ain.com/images/i-sprite.svg#angle-left);
      width: 35px;
      height: 25px;
    }
    .post-content p {
      margin: 1.1rem 0;
    }
    .single-inside,
    .page .main-content {
      width: 1024px;
    }
    .page-content {
      margin-top: 30px;
      width: 100%;
    }
    .main-content {
      padding-bottom: 30px;
    }
    .page-content p {
      margin-top: 0;
      margin-bottom: 1rem;
      font-size: 1.1rem;
      font-family: 'Kalligraaf Arabic Medium';
      line-height: 1.5;
    }
    .page-content strong {
      font-size: 1.4rem;
      font-family: 'Kalligraaf Arabic Semi Bold';
      line-height: 1.5;
      color: var(--fontcolor);
    }
    .single-inside {
      padding: 30px 0;
    }
  </style>
</head>