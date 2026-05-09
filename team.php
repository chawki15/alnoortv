<?php include('req.php'); ?>
<style>
    .title-head:before {
        content: '';
        width: 50px;
        border-top: 2px solid var(--primaryToOr);
        right: 0;
        position: absolute;
        z-index: 12;
        bottom: 0;
        left: var(--left);
    }
    .title-head:after {
        content: '';
        width: 100%;
        border-top: 2px solid var(--borderColor);
        right: 0;
        position: absolute;
        bottom: 0;
    }
    .title-head {
        width: 100%;
        margin: 0 0 15px;
        padding: 5px 0 10px;
    }
    .title-head .lsa-widget-title {
        font-family: 'kfarnaz';
        color: var(--titre);
        font-size: 2.4rem;
        z-index: 1;
        position: relative;
        width: auto;
        display: inline-block;
        margin: 0;
        line-height: 1.5;
    }
    .page-content p {
        color: var(--titre);
        margin-bottom: 10px;
    }
</style>
<body class="bg-repeat font-family">
    <div class="wrapper">
        <?php include('include/header.php'); ?>
        <main id="content">
            <div class="container">
                <div class="row">
                    <div class="title-head">
                        <h1 class="lsa-widget-title">
                            فريق العمل </h1>
                    </div>
                    <div class="page-content" style="padding:0;
    line-height:2;font-size: 1rem;font-family: 'DroidKufiRegular';text-align:center">
                        <P><strong> مدير النشر : </strong></p>
                        <p> الدكتور أناس شوقي </P>
                        <P><strong>مديرة التحرير :</strong></p>
                        <p> فاطمة الزهراء صامت</P>
                        <P><strong>سكرتير التحرير :</strong></p>
                        <p> وهيبة لكحل</P>
                        <P><strong>هيئة التحرير :</strong></p>
                        <p> محمد الزعيم <br /> محمد طلول <br /> خولة آزنيزيني <br /> عتيقة البوعيشي <br />دعاء تاشفين
                            <br />حسناء مصدق
                            <br />رضى جراف
                        </P>
                        <P><strong>المدير التقني :</strong></p>
                        <p> محمد شوقي</P>
                        <P><strong>الفريق التقني :</strong></p>
                        <p> أيوب علالي <br /> إلياس أيت إعزة</P>
                        <br />
                    </div>
        </main>
        <?php include('include/footer.php') ?>
    </div>
    <a class="material-scrolltop back-top btn btn-light border position-fixed r-1 b-1" href="#"><i
            class="fa fa-arrow-up"></i></a>
    <?php include('include/script.php') ?>
</body>
</html>