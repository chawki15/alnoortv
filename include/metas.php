<?php
    if((curPageName()=='index.php')||(curPageName()=='./')):
        $title_doc = 'النور TV - جريدة إلكترونية مغربية';
        $desc_doc = '...موقع إخباري شامل متجدد على مدار الساعة، محتويات إلكترونية متنوعة، بودكاست، أخبار السياسة، المجتمع، الثقافة، الفن، والموضة';
        $keys_doc = 'بودكاست، أخبار السياسة، المجتمع، الثقافة، الفن، والموضة';
        $cano = '<link rel="canonical" href="https://www.alnoortv.ma/" />';
    elseif(curPageName()=='cat.php'):
        $title_doc = $nomcat.' - النور TV';
        $desc_doc = ''; 
        $keys_doc = '';	
    elseif(curPageName()=='news.php'):
        $title_doc = $titre.' - النور TV';
        $desc_doc = ''; 
        $keys_doc = '';	
        $img_doc='https://www.alnoortv.ma/assets/img/news/'. $photo;
        $url ='https://www.alnoortv.ma/news/'.$_GET['n'].'-'.replace($titre).'.html';
    elseif(curPageName()=='contact.php'):
        $title_doc = 'النور - اتصل بنا  TV - جريدة إلكترونية مغربية';
        $desc_doc = ''; 
        $keys_doc = '';	
    elseif(curPageName()=='videos.php'):
        $title_doc = $nomcat.' :: '.$nomsouscat.' - النور TV';
        $desc_doc = ''; 
        $keys_doc = '';	
    endif;
?>