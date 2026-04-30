<script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/lazyImages/fancyLazyImages.js"></script>
    <script src="assets/vendor/sticky-kit/dist/sticky-kit.min.js"></script>
    <script src="assets/vendor/smoothscroll-for-websites/SmoothScroll.js"></script>
    <script src="assets/js/theme.js"></script>
<?php  if((curPageName()=='index.php')||(curPageName()=='./')) { ?>

    <script src='assets/js/jquery-3.3.1.min.js'></script>
    <script type="text/javascript" src="assets/js/PrayTimes.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.js'></script>
    <script src='https://www.jqueryscript.net/demo/Responsive-jQuery-News-Ticker-Plugin-with-Bootstrap-3-Bootstrap-News-Box/scripts/jquery.bootstrap.newsbox.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/0.6.11/js/min/perfect-scrollbar.jquery.min.js'></script>
    <script src="assets/js/custom.js"></script>
    <script type="text/javascript">
	
	var date = new Date(); // today
	var times = prayTimes.getTimes(date, [33.5731086730957, -7.589843273162842], +1);
	var list = ['Fajr', 'Sunrise', 'Dhuhr', 'Asr', 'Maghrib', 'Isha'];

	var html = '<table class="table">';
	for(var i in list)	{
        if(list[i]=='Fajr'){
          var  a = 'الفجر';
        }else if(list[i]=='Sunrise'){
            var a = 'الشروق';
        }else if(list[i]=='Dhuhr'){
            var a = 'الظهر';
        }else if(list[i]=='Asr'){
            var a = 'العصر';
        }else if(list[i]=='Maghrib'){
            var a = 'المغرب';
        }else if(list[i]=='Isha'){
            var a = 'العشاء';
        }
		html += '<tr class="tr"><td class="time-label">'+ a + '</td>';
		html += '<td class="time">'+ times[list[i].toLowerCase()]+ '</td></tr>';
	}
	html += '</table>';
	document.getElementById('tb').innerHTML = html;


    jQuery(function(){
        jQuery("#method").on('change', function(){
        var user = $(this).val();

        
        if(user =='1'){
            var lt = 33.5731086730957;
            var ln = -7.589843273162842;
        }else if(user =='2'){
            var lt = 34.686668395996094;
            var ln = -1.9113889932632449;
        }else if(user =='3'){
            var lt = 0;
            var ln = 0;
        }else if(user =='4'){
            var lt = 0;
            var ln = 0;
        }else if(user =='5'){
            var lt = 34.91666793823242;
            var ln = -2.316667079925537;
        }else if(user =='6'){
            var lt = 34.398372650146484;
            var ln = -2.893502712249756;
        }else if(user =='7'){
            var lt = 35.16666793823242;
            var ln = -2.933332920074463;
        }else if(user =='8'){
            var lt = 35.29227828979492;
            var ln = -2.9380972385406494;
        }else if(user =='9'){
            var lt = 0;
            var ln = 0;
        }else if(user =='10'){
            var lt = 35.25;
            var ln = -3.9333329200744633;
        }else if(user =='11'){
            var lt = 0;
            var ln = 0;
        }else if(user =='12'){
            var lt = 34.21666717529297;
            var ln = -4.016666889190674;
        }else if(user =='13'){
            var lt = 0;
            var ln = 0;
        }else if(user =='14'){
            var lt = 0;
            var ln = 0;
        }else if(user =='15'){
            var lt = 0;
            var ln = 0;
        }else if(user =='16'){
            var lt = 0;
            var ln = 0;
        }else if(user =='17'){
            var lt = 0;
            var ln = 0;
        }else if(user =='18'){
            var lt = 34.535831451416016;
            var ln = -4.639999866485596;
        }else if(user =='19'){
            var lt = 0;
            var ln = 0;
        }else if(user =='20'){
            var lt = 32.68000030517578;
            var ln = -4.730000019073486;
        }else if(user =='21'){
            var lt = 33.83052444458008;
            var ln = -4.835315227508545;
        }else if(user =='22'){
            var lt = 0;
            var ln = 0;
        }else if(user =='23'){
            var lt = 34.03333282470703;
            var ln = -5;
        }else if(user =='24'){
            var lt = 0;
            var ln = 0;
        }else if(user =='25'){
            var lt = 0;
            var ln = 0;
        }else if(user =='26'){
            var lt = 0;
            var ln = 0;
        }else if(user =='27'){
            var lt = 33.44166564941406;
            var ln = -5.224721908569336;
        }else if(user =='28'){
            var lt = 0;
            var ln = 0;
        }else if(user =='29'){
            var lt = 35.88938903808594;
            var ln = -5.321345329284668;
        }else if(user =='30'){
            var lt = 35.56666564941406;
            var ln = -5.366666793823242;
        }else if(user =='31'){
            var lt = 33.692779541015625;
            var ln = -5.371110916137695;
        }else if(user =='32'){
            var lt = 0;
            var ln = 0;
        }else if(user =='33'){
            var lt = 33.89500045776367;
            var ln = -5.554721832275391;
        }else if(user =='34'){
            var lt = 0;
            var ln = 0;
        }else if(user =='35'){
            var lt = 32.93944549560547;
            var ln = -5.667500019073486;
        }else if(user =='36'){
            var lt = 0;
            var ln = 0;
        }else if(user =='37'){
            var lt = 35.759464263916016;
            var ln = -5.833954334259033;
        }else if(user =='38'){
            var lt = 30.330556869506836;
            var ln = -5.8380560874938965;
        }else if(user =='39'){
            var lt = 0;
            var ln = 0;
        }else if(user =='40'){
            var lt = 0;
            var ln = 0;
        }else if(user =='41'){
            var lt = 34.26229476928711;
            var ln = -5.923974990844727;
        }else if(user =='42'){
            var lt = 0;
            var ln = 0;
        }else if(user =='43'){
            var lt = 35.46666717529297;
            var ln = -6.033332824707031;
        }else if(user =='44'){
            var lt = 33.81666564941406;
            var ln = -6.066667079925537;
        }else if(user =='45'){
            var lt = 0;
            var ln = 0;
        }else if(user =='46'){
            var lt = 35.18333435058594;
            var ln = -6.150000095367432;
        }else if(user =='47'){
            var lt = 32.599998474121094;
            var ln = -6.266666889190674;
        }else if(user =='48'){
            var lt = 0;
            var ln = 0;
        }else if(user =='49'){
            var lt = 33.89548110961914;
            var ln = -6.320714950561523;
        }else if(user =='50'){
            var lt = 32.33944320678711;
            var ln = -6.360833168029785;
        }else if(user =='51'){
            var lt = 32.85015106201172;
            var ln = -6.577518463134766;
        }else if(user =='52'){
            var lt = 0;
            var ln = 0;
        }else if(user =='53'){
            var lt = 34.25;
            var ln = -6.5833330154418945;
        }else if(user =='54'){
            var lt = 33.97159194946289;
            var ln = -6.849812984466553;
        }else if(user =='55'){
            var lt = 32.886024475097656;
            var ln = -6.920865535736084;
        }else if(user =='56'){
            var lt = 0;
            var ln = 0;
        }else if(user =='57'){
            var lt = 0;
            var ln = 0;
        }else if(user =='58'){
            var lt = 0;
            var ln = 0;
        }else if(user =='59'){
            var lt = 33.78972244262695;
            var ln = -7.15749979019165;
        }else if(user =='60'){
            var lt = 0;
            var ln = 0;
        }else if(user =='61'){
            var lt = 33.683509826660156;
            var ln = -7.384854793548584;
        }else if(user =='62'){
            var lt = 0;
            var ln = 0;
        }else if(user =='63'){
            var lt = 33.266666412353516;
            var ln = -7.5833330154418945;
        }else if(user =='64'){
            var lt = 33;
            var ln = -7.616700172424316;
        }else if(user =='65'){
            var lt = 0;
            var ln = 0;
        }else if(user =='66'){
            var lt = 0;
            var ln = 0;
        }else if(user =='67'){
            var lt = 31.6299991607666;
            var ln = -8.008889198303223;
        }else if(user =='68'){
            var lt = 33.287776947021484;
            var ln = -8.342222213745117;
        }else if(user =='69'){
            var lt = 33.233333587646484;
            var ln = -8.5;
        }else if(user =='70'){
            var lt = 32.25;
            var ln = -8.533332824707031;
        }else if(user =='71'){
            var lt = 30.466943740844727;
            var ln = -8.880000114440918;
        }else if(user =='72'){
            var lt = 0;
            var ln = 0;
        }else if(user =='73'){
            var lt = 32.30081558227539;
            var ln = -9.227203369140623;
        }else if(user =='74'){
            var lt = 30.42775535583496;
            var ln = -9.59810733795166;
        }else if(user =='75'){
            var lt = 29.69339179992676;
            var ln = -9.732156753540039;
        }else if(user =='76'){
            var lt = 31.50849342346191;
            var ln = -9.759504318237305;
        }else if(user =='77'){
            var lt = 28.983333587646484;
            var ln = -10.06666660308838;
        }else if(user =='78'){
            var lt = 29.38333320617676;
            var ln = -10.166666984558105;
        }else if(user =='79'){
            var lt = 28.43804168701172;
            var ln = -11.098737716674805;
        }else if(user =='80'){
            var lt = 0;
            var ln = 0;
        }else if(user =='81'){
            var lt = 0;
            var ln = 0;
        }else if(user =='82'){
            var lt = 0;
            var ln = 0;
        }else if(user =='83'){
            var lt = 0;
            var ln = 0;
        }else if(user =='84'){
            var lt = 0;
            var ln = 0;
        }else if(user =='85'){
            var lt = 0;
            var ln = 0;
        }else if(user =='86'){
            var lt = 0;
            var ln = 0;
        }

        var date = new Date(); // today
        var times = prayTimes.getTimes(date, [lt, ln], +1);
        var list = ['Fajr', 'Sunrise', 'Dhuhr', 'Asr', 'Maghrib', 'Isha'];

        var html = '<table class="table">';
        for(var i in list)	{
            if(list[i]=='Fajr'){
            var  a = 'الفجر';
            }else if(list[i]=='Sunrise'){
                var a = 'الشروق';
            }else if(list[i]=='Dhuhr'){
                var a = 'الظهر';
            }else if(list[i]=='Asr'){
                var a = 'العصر';
            }else if(list[i]=='Maghrib'){
                var a = 'المغرب';
            }else if(list[i]=='Isha'){
                var a = 'العشاء';
            }
            html += '<tr class="tr"><td class="time-label">'+ a + '</td>';
            html += '<td class="time">'+ times[list[i].toLowerCase()]+ '</td></tr>';
        }
        html += '</table>';
        document.getElementById('tb').innerHTML = html;
        
        })
        
    });

</script>
<?php  } ?>
    <script type="text/javascript">
        jQuery(function () {
            document.querySelector('#switchh').addEventListener('click', () => {
                document.documentElement.classList.toggle('theme-light');
                document.querySelector('#switchh').classList.toggle('active');
                if(document.documentElement.classList.contains('theme-light')){
                localStorage.setItem('dark-mode', 'true');
                setTheme('theme-light');
                jQuery("#imgD").attr("src","assets/img/logo.gif");
                jQuery("#imgM").attr("src","assets/img/logo.gif");
                } else {
                setTheme('theme-dark');
                localStorage.setItem('dark-mode', 'false');
                jQuery("#imgD").attr("src","assets/img/logof.gif");
                jQuery("#imgM").attr("src","assets/img/logof.gif");
                }
            });
            if(localStorage.getItem('dark-mode') === 'true'){
                setTheme('theme-light');
                document.querySelector('#switchh').classList.add('active');
                localStorage.setItem('dark-mode', 'true');
                jQuery("#imgD").attr("src","assets/img/logo.gif");
                jQuery("#imgM").attr("src","assets/img/logo.gif");
            } else {
                setTheme('theme-dark');
                document.querySelector('#switchh').classList.remove('active');
                localStorage.setItem('dark-mode', 'false');
                jQuery("#imgD").attr("src","assets/img/logof.gif");
                jQuery("#imgM").attr("src","assets/img/logof.gif");
            }
            function setTheme(themeName)
            {
                localStorage.setItem('theme',themeName);
                document.documentElement.className=themeName;
            }
        });

       
    </script>
   
<?php  if((curPageName()=='news.php')||(curPageName()=='author.php')||(curPageName()=='opinion.php')||(curPageName()=='opinions.php')||(curPageName()=='cat.php')||(curPageName()=='videos.php')||(curPageName()=='video.php')||(curPageName()=='infographics.php')||(curPageName()=='gallery.php')||(curPageName()=='dialogues.php')||(curPageName()=='reportages.php')||(curPageName()=='article.php')||(curPageName()=='more.php')||(curPageName()=='press.php')||(curPageName()=='pubvideo.php')||(curPageName()=='pub.php')) { ?>
    <script src="assets/js/jquery-1.8.3.min.js"></script>
    <script src="assets/responsiveslides/responsiveslides.min.js"></script>
    <script>
        jQuery.noConflict();
        (function( $ ) {
        $(function() {
            jQuery("#sliderInfographics").responsiveSlides({
                auto: true,
                pager: true,
                minSlides: 3,
                maxSlides: 3,
            });
        });
        })(jQuery);

        $(document).ready(function($) {
		    $('.tab_content').hide();
            $('.tab_content:first').show();
	        $('.tabs-menu li:first').addClass('active');
		    $('.tabs-menu li').click(function(event){
			    $('.tabs-menu li').removeClass('active')
			    $(this).addClass('active');
                $('.tab_content').hide();
                var selectTab = $(this).find('a').attr("href");
                $(selectTab).fadeIn();
            });
        });
    </script>
<?php  } ?>