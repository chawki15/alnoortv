<?php include('req.php') ?>

<body class="rtl home boxed font-family hfeed">
    <div class="wrapper">
        <?php include('include/header.php') ?>
        <div class="container">
            <main class="page-container">
                <div class="row">
                    <div class="col-12 col-sm-10 col-md-8 mx-auto">
                        <div class="mb-4 text-center">
                            <h1 class="h2-md" style="line-height: 2.1;">غير موجود</h1>
                            <p>غير موجود حاول البحث من فضلك</p>
                        </div>
                        <div class="post-content">
                            <div class="mx-auto mb-4">
                                <form method="get" id="searchform" action="https://demo.bootstrap.news/rtl/"
                                    role="search" abineguid="361856B0AA5F4C7B8A6FB6879B6CDCF5">
                                    <div class="input-group">
                                        <input class="field form-control" id="s" name="s" type="text"
                                            placeholder="بحث …" value="">
                                        <span class="input-group-append">
                                            <input class="submit btn btn-primary" id="searchsubmit" name="submit"
                                                type="submit" value="بحث">
                                        </span>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <?php include('include/footer.php') ?>
    </div>
    <a class="material-scrolltop back-top btn btn-light border position-fixed r-1 b-1" href="#"><i
            class="fa fa-arrow-up"></i></a>
    <?php include('include/script.php') ?>
</body>

</html>