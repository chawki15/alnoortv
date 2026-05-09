<?php
$siteName = 'النور TV';
$siteUrl = 'https://www.alnoortv.ma/';
$defaultImage = $siteUrl . 'assets/img/logoo.gif';
$requestPath = strtok($_SERVER['REQUEST_URI'] ?? '/', '?') ?: '/';
$canonical_url = $requestPath === '/' ? $siteUrl : $siteUrl . ltrim($requestPath, '/');
$robots_doc = 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1';
$og_type = 'website';
$img_doc = $defaultImage;
$url = $canonical_url;
$keys_doc = 'النور TV، أخبار المغرب، أخبار عاجلة، سياسة، اقتصاد، مجتمع، رياضة، فيديو، ثقافة، صحة، سياحة';

if ((curPageName() == 'index.php') || (curPageName() == './')):
    $title_doc = 'النور TV | آخر أخبار المغرب والعالم على مدار الساعة';
    $desc_doc = 'النور TV جريدة إلكترونية مغربية تقدم آخر أخبار المغرب والعالم على مدار الساعة: سياسة، اقتصاد، مجتمع، رياضة، ثقافة، صحة، فيديو وتحليلات.';
    $canonical_url = $siteUrl;
    $url = $canonical_url;
elseif (curPageName() == 'cat.php'):
    $title_doc = $nomcat . ' - النور TV';
    $desc_doc = 'آخر أخبار ' . $nomcat . ' على النور TV، تغطية متجددة وتحليلات ومتابعات لأبرز المستجدات.';
    $keys_doc = $nomcat . '، النور TV، أخبار المغرب، أخبار عاجلة';
elseif (curPageName() == 'news.php'):
    $title_doc = $titre . ' - النور TV';
    $desc_doc = trim(strip_tags($des1));
    $desc_doc = $desc_doc !== '' ? mb_substr($desc_doc, 0, 160, 'UTF-8') : $titre;
    $keys_doc = $titre . '، ' . $nomcat . '، النور TV';
    $img_doc = $siteUrl . 'assets/img/news/' . $photo;
    $url = $siteUrl . 'news/' . $_GET['n'] . '-' . replace($titre) . '.html';
    $canonical_url = $url;
    $og_type = 'article';
elseif (curPageName() == 'contact.php'):
    $title_doc = 'اتصل بنا - النور TV';
    $desc_doc = 'تواصلوا مع فريق النور TV لإرسال ملاحظاتكم، اقتراحاتكم، وطلباتكم المتعلقة بالموقع والخدمات الإعلامية.';
    $keys_doc = 'اتصل بنا، النور TV، تواصل';
elseif (curPageName() == 'videos.php'):
    $title_doc = trim($nomcat . ' :: ' . $nomsouscat, ' ::') . ' - النور TV';
    $desc_doc = 'شاهد أحدث فيديوهات النور TV وتقاريرها المصورة وحواراتها وبرامجها المتجددة.';
    $keys_doc = 'فيديو، النور TV، تقارير، حوارات، برامج';
endif;
?>