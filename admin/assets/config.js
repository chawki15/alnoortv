function showSuccessMessage(title, onClose) {
  if (window.Swal && typeof Swal.fire === 'function') {
    Swal.fire({ icon: "success", title: title, showConfirmButton: false, timer: 2000 }).then(() => { if (onClose) onClose(); });
  } else if (window.swal && typeof swal.fire === 'function') {
    swal.fire({ icon: "success", title: title, showConfirmButton: false, timer: 2000 }).then(() => { if (onClose) onClose(); });
  } else {
    if (onClose) onClose();
  }
}

function showResponseDebug(text, ok) {
  var box = document.getElementById("newsServerResponse");
  if (!box) {
    box = document.createElement("div");
    box.id = "newsServerResponse";
    box.style.marginTop = "10px";
    box.style.padding = "8px 12px";
    box.style.borderRadius = "4px";
    var form = document.getElementById("news");
    if (form) form.prepend(box);
  }
  box.style.display = "block";
  box.style.background = ok ? "#e8f7ec" : "#fdecec";
  box.style.color = ok ? "#0f5132" : "#842029";
  box.style.border = ok ? "1px solid #badbcc" : "1px solid #f5c2c7";
  box.textContent = text;
}

function showErrorMessage(title, text) {
  if (window.Swal && typeof Swal.fire === 'function') {
    Swal.fire({ icon: "error", title: title, text: text });
  } else if (window.swal && typeof swal.fire === 'function') {
    swal.fire({ icon: "error", title: title, text: text });
  } else {
  }
}

$(document).ready(function () {
  $("body").on('submit', '#login', function(e){
    e.preventDefault();
    $.ajax({
      type: 'POST',
      url: 'assets/check/login.php', 
      data: $(this).serialize(),
      success:function(data)
      {
        $('#checkMail').css({display: "none"});
        $('#checkPsw').css({display: "none"});
        $('#checkPsd').css({display: "none"});
        var regSeparator = new RegExp('[ ,;]+','g');
        var myString = data;
        var each = myString.split(regSeparator);
        for(var e = 0 ; e < each.length; e++)
        {
          if (each[e] == "em"){
            $('#email').css({border:"2px solid #DA2128"});
            $('#checkMail').html('من فضلك ادخل بريدك الالكتروني');
            $('#checkMail').css({color:"#FF4961"});
            $('#checkMail').fadeIn("slow"); 
          }else if(each[e] == "ve"){
            $('#email').css({border:"2px solid #DA2128"});
            $('#checkMail').html('الرجاء إدخال عنوان بريد إلكتروني صحيح');
            $('#checkMail').css({color:"#FF4961"});
            $('#checkMail').fadeIn("slow"); 
          }
    
          if (each[e] == "ps"){
            $('#psw').css({border:"2px solid #DA2128"});
            $('#checkPsw').html('من فضلك ادخل كلمة المرور');
            $('#checkPsw').css({color:"#FF4961"});
            $('#checkPsw').fadeIn("slow"); 
          }
    
          if(each[e] == "p1") { window.location = './index.php'; }
          
          if(each[e] == "p2"){
            $('#checkPsd').html('هذا الحساب غير موجود');
            $('#checkPsd').css({color:"#FF4961"});
            $('#checkPsd').fadeIn("slow");
          }
        }
      }
    });
    return false;
  });

  $("body").on('submit', '#user', function(e){
    e.preventDefault();
    $.ajax({
      type: 'POST',
      url: 'assets/check/login.php', 
      data: $(this).serialize(),
      success:function(data)
      {
        $('#checkMail').css({display: "none"});
        $('#checkNam').css({display: "none"});
        $('#checkPassword').css({display: "none"});
        var regSeparator = new RegExp('[ ,;]+','g');
        var myString = data;
        var each = myString.split(regSeparator);
        for(var e = 0 ; e < each.length; e++)
        {
          if (each[e] == "en"){
            $('#nom').css({border:"2px solid #DA2128"});
            $('#checkNam').html('من فضلك ادخل الاسم');
            $('#checkNam').css({color:"#FF4961"});
            $('#checkNam').fadeIn("slow"); 
          }else if(each[e] == "vn"){
            $('#nom').css({border:"2px solid #DA2128"});
            $('#checkNam').html('الرجاء إدخال الاسم بالعربية');
            $('#checkNam').css({color:"#FF4961"});
            $('#checkNam').fadeIn("slow"); 
          }

          if (each[e] == "em"){
            $('#mail').css({border:"2px solid #DA2128"});
            $('#checkMail').html('من فضلك ادخل البريد الالكتروني');
            $('#checkMail').css({color:"#FF4961"});
            $('#checkMail').fadeIn("slow"); 
          }else if(each[e] == "ve"){
            $('#mail').css({border:"2px solid #DA2128"});
            $('#checkMail').html('الرجاء إدخال عنوان بريد إلكتروني صحيح');
            $('#checkMail').css({color:"#FF4961"});
            $('#checkMail').fadeIn("slow"); 
          }
    
          if (each[e] == "ps"){
            $('#psw').css({border:"2px solid #DA2128"});
            $('#checkPassword').html('من فضلك ادخل كلمة المرور');
            $('#checkPassword').css({color:"#FF4961"});
            $('#checkPassword').fadeIn("slow"); 
          }
    
          if (each[e] == "addUser") {
            Swal.fire({
              icon: "success",
              title: "تم حفض البيانات بنجاح",
              showConfirmButton: false,
              timer: 2000,
            }).then((result) => {
              window.location = "./";
            });
          }

        }
      }
    });
    return false;
  });

  $("body").on('submit', '#cat', function(e){
    e.preventDefault();
    $.ajax({
      type: "POST",
      url: "assets/check/cat.php",
      data: $(this).serialize(),
      success: function (data) {
        $("#checkCat").css({ display: "none" });
        var regSeparator = new RegExp("[ ,;]+", "g");
        var myString = data;
        var each = myString.split(regSeparator);
        for (var e = 0; e < each.length; e++) {
          if (each[e] == "ec") {
            $("#category").css({ border: "2px solid #DA2128" });
            $("#checkCat").html("من فضلك ادخل اسم الفئة");
            $("#checkCat").css({ color: "#FF4961" });
            $("#checkCat").fadeIn("slow");
          } else if (each[e] == "vc") {
            $("#category").css({ border: "2px solid #DA2128" });
            $("#checkCat").html("الرجاء إدخال اسم الفئة بالعربية");
            $("#checkCat").css({ color: "#FF4961" });
            $("#checkCat").fadeIn("slow");
          }

          if (each[e] == "addcat") {
            Swal.fire({
              icon: "success",
              title: "تم حفض البيانات بنجاح",
              showConfirmButton: false,
              timer: 2000,
            }).then((result) => {
              window.location = "./afficherCat.php";
            });
          }

          if (each[e] == "modcat") {
            Swal.fire({
              icon: "success",
              title: "تم تعديل البيانات بنجاح",
              showConfirmButton: false,
              timer: 2000,
            }).then((result) => {
              window.location = "./afficherCat.php";
            });
          }
        }
      },
    });
    return false;
  });

  $("body").on('submit', '#sousCat', function(e){
    e.preventDefault();
    $.ajax({
      type: "POST",
      url: "assets/check/souscat.php",
      data: $(this).serialize(),
      success: function (data) {
        $("#checkSelectCat").css({ display: "none" });
        $("#checkSousCat").css({ display: "none" });
        var regSeparator = new RegExp("[ ,;]+", "g");
        var myString = data;
        var each = myString.split(regSeparator);
        for (var e = 0; e < each.length; e++) {
          if (each[e] == "ec") {
            $("#sousCategory").css({ border: "2px solid #DA2128" });
            $("#checkSousCat").html("من فضلك ادخل اسم الفئة");
            $("#checkSousCat").css({ color: "#FF4961" });
            $("#checkSousCat").fadeIn("slow");
          } else if (each[e] == "vc") {
            $("#sousCategory").css({ border: "2px solid #DA2128" });
            $("#checkSousCat").html("الرجاء إدخال اسم الفئة بالعربية");
            $("#checkSousCat").css({ color: "#FF4961" });
            $("#checkSousCat").fadeIn("slow");
          }

          if (each[e] == "cl") {
            $("#selectCategory").css({ border: "2px solid #DA2128" });
            $("#checkSelectCat").html("من فضلك اختر اسم الفئة");
            $("#checkSelectCat").css({ color: "#FF4961" });
            $("#checkSelectCat").fadeIn("slow");
          }

          if (each[e] == "addSouscat") {
            Swal.fire({
              icon: "success",
              title: "تم حفض البيانات بنجاح",
              showConfirmButton: false,
              timer: 2000,
            }).then((result) => {
              window.location = "./afficherSousCat.php";
            });
          }

          if (each[e] == "modSouscat") {
            Swal.fire({
              icon: "success",
              title: "تم تعديل البيانات بنجاح",
              showConfirmButton: false,
              timer: 2000,
            }).then((result) => {
              window.location = "./afficherSousCat.php";
            });
          }
        }
      },
    });
    return false;
  });

  $("body").on('submit', '#video', function(e){
    e.preventDefault();
    $.ajax({
      type: "POST",
      url: "assets/check/video.php",
      data: $(this).serialize(),
      success: function (data) {
        $("#checkTitleVideo").css({ display: "none" });
        $("#checkUrlVideo").css({ display: "none" });
        $("#checkSelectCat").css({ display: "none" });
        var regSeparator = new RegExp("[ ,;]+", "g");
        var myString = data;
        var each = myString.split(regSeparator);
        for (var e = 0; e < each.length; e++) {
          if (each[e] == "cl") {
            $("#selectCategory").css({ border: "2px solid #DA2128" });
            $("#checkSelectCat").html("من فضلك اختر اسم الفئة");
            $("#checkSelectCat").css({ color: "#FF4961" });
            $("#checkSelectCat").fadeIn("slow");
          } else if (each[e] == "n2") {
            $("#selectCategory").css({ border: "2px solid #CACFE7" });
          }

          if (each[e] == "et") {
            $("#titleVideo").css({ border: "2px solid #DA2128" });
            $("#checkTitleVideo").html("من فضلك ادخل عنوان الفيديو");
            $("#checkTitleVideo").css({ color: "#FF4961" });
            $("#checkTitleVideo").fadeIn("slow");
          } else if (each[e] == "vt") {
            $("#titleVideo").css({ border: "2px solid #DA2128" });
            $("#checkTitleVideo").html("الرجاء إدخال عنوان الفيديو بالعربية");
            $("#checkTitleVideo").css({ color: "#FF4961" });
            $("#checkTitleVideo").fadeIn("slow");
          }

          if (each[e] == "eu") {
            $("#utlVideo").css({ border: "2px solid #DA2128" });
            $("#checkUrlVideo").html("من فضلك ادخل عنوان اليوتوب");
            $("#checkUrlVideo").css({ color: "#FF4961" });
            $("#checkUrlVideo").fadeIn("slow");
          } else if (each[e] == "vu") {
            $("#utlVideo").css({ border: "2px solid #DA2128" });
            $("#checkUrlVideo").html("الرجاء إدخال عنوان اليوتوب صحيح");
            $("#checkUrlVideo").css({ color: "#FF4961" });
            $("#checkUrlVideo").fadeIn("slow");
          }

          if (each[e] == "addVideo") {
            Swal.fire({
              icon: "success",
              title: "تم حفض البيانات بنجاح",
              showConfirmButton: false,
              timer: 2000,
            }).then((result) => {
              window.location = "./afficherVideos.php";
            });
          }

          if (each[e] == "modVideo") {
            Swal.fire({
              icon: "success",
              title: "تم تعديل البيانات بنجاح",
              showConfirmButton: false,
              timer: 2000,
            }).then((result) => {
              window.location = "./afficherVideos.php";
            });
          }

        }
      },
    });
    return false;
  });

  $("#list").on('click', '.delete-video', function(){
    var id = $(this).data("id");
    swal
      .fire({
        title: "هل أنت واثق؟",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "نعم ، احذفها",
        cancelButtonText: 'لا ، إلغاء'
      })
      .then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            url: "assets/check/video.php",
            type: "POST",
            data: { id: id, act: "deleteVideo" },
            success: function (response) {
              swal.fire(
                "تم الحذف"
              );
              window.location = "./afficherVideos.php";
            },
          });
        }
      });
  });

  $("body").on('submit', '#news', function(e){
    e.preventDefault();
    if (window.CKEDITOR && CKEDITOR.instances) {
      ["desc2", "desc3", "desc4", "desc5", "desc6"].forEach(function (id) {
        if (CKEDITOR.instances[id] && typeof CKEDITOR.instances[id].updateElement === "function") {
          try {
            CKEDITOR.instances[id].updateElement();
          } catch (err) {
            showResponseDebug("CKEDITOR sync error in " + id + ": " + err.message, false);
          }
        }
      });
    }
    $.ajax({
      type: "POST",
      url: "assets/check/news.php",
      data: $(this).serialize(),
      success: function (data) {
        var rawResponse = (data === undefined || data === null) ? "" : String(data);
        showResponseDebug("RAW: " + rawResponse, true);
        $("#checkSelectCat").css({ display: "none" });
        $("#checkTitleNews").css({ display: "none" });
        $("#checkPhotoNews").css({ display: "none" });
        $("#checkAuteur").css({ display: "none" });

        for (let i = 2; i < 7; i++) {
          $("#checkDescription" + i).css({ display: "none" });
          $("#checkDescphoto" + i).css({ display: "none" });
          $("#checkPhotoNews" + i).css({ display: "none" });
        }
        
        var regSeparator = new RegExp("[ ,;]+", "g");
        var myString = rawResponse.trim();
        var each = myString.split(regSeparator);
        var hasKnownResponse = false;
        for (var e = 0; e < each.length; e++) {
          if (each[e] == "cl") {
            hasKnownResponse = true;
            $("#selectCategory").css({ border: "2px solid #DA2128" });
            $("#checkSelectCat").html("من فضلك اختر اسم الفئة");
            $("#checkSelectCat").css({ color: "#FF4961" });
            $("#checkSelectCat").fadeIn("slow");
          } else if (each[e] == "n2") {
            $("#selectCategory").css({ border: "2px solid #CACFE7" });
          }

          if (each[e] == "enwph") {
            hasKnownResponse = true;
            $("#checkPhotoNews").html("الرجاء تحميل الصور");
            $("#checkPhotoNews").css({ color: "#FF4961" });
            $("#checkPhotoNews").fadeIn("slow");
          }

          if (each[e] == "enw") {
            hasKnownResponse = true;
            $("#titleNews").css({ border: "2px solid #DA2128" });
            $("#checkTitleNews").html("من فضلك ادخل عنوان الخبر");
            $("#checkTitleNews").css({ color: "#FF4961" });
            $("#checkTitleNews").fadeIn("slow");
          } else if (each[e] == "vnw") {
            hasKnownResponse = true;
            $("#titleNews").css({ border: "2px solid #DA2128" });
            $("#checkTitleNews").html("الرجاء إدخال عنوان الخبر بالعربية");
            $("#checkTitleNews").css({ color: "#FF4961" });
            $("#checkTitleNews").fadeIn("slow");
          } else if(each[e] == "vns"){
            $("#titleNews").css({ border: "2px solid #DA2128" });
            $("#checkTitleNews").html("الرجاء إدخال 41 حرفًا كحد أقصى");
            $("#checkTitleNews").css({ color: "#FF4961" });
            $("#checkTitleNews").fadeIn("slow");
          }

          if (each[e] == "eAuteur") {
            hasKnownResponse = true;
            $("#auteur").css({ border: "2px solid #DA2128" });
            $("#checkAuteur").html("من فضلك ادخل صاحب الخبر أو المصدر");
            $("#checkAuteur").css({ color: "#FF4961" });
            $("#checkAuteur").fadeIn("slow");
          } else if (each[e] == "vAuteur") {
            hasKnownResponse = true;
            $("#auteur").css({ border: "2px solid #DA2128" });
            $("#checkAuteur").html("الرجاء إدخال صاحب الخبر أو المصدر بالعربية");
            $("#checkAuteur").css({ color: "#FF4961" });
            $("#checkAuteur").fadeIn("slow");
          }

          for (let i = 2; i < 7; i++) {
            if (each[e] == "edes" + i) {
              hasKnownResponse = true;
              $("#desc" + i).css({ border: "2px solid #DA2128" });
              $("#checkDescription" + i).html("من فضلك ادخل نص الخبر");
              $("#checkDescription" + i).css({ color: "#FF4961" });
              $("#checkDescription" + i).fadeIn("slow");
            } else if (each[e] == "vdes" + i) {
              hasKnownResponse = true;
              $("#desc" + i).css({ border: "2px solid #DA2128" });
              $("#checkDescription" + i).html("الرجاء إدخال  نص الخبر بالعربية");
              $("#checkDescription" + i).css({ color: "#FF4961" });
              $("#checkDescription" + i).fadeIn("slow");
            }
            if (each[e] == "dscphoto" + i) {
              hasKnownResponse = true;
              $("#descphoto" + i).css({ border: "2px solid #DA2128" });
              $("#checkDescphoto" + i).html("الرجاء إدخال وصف الصورة بالعربية");
              $("#checkDescphoto" + i).css({ color: "#FF4961" });
              $("#checkDescphoto" + i).fadeIn("slow");
            }
            if (each[e] == "photonw" + i) {
              hasKnownResponse = true;
              $("#checkPhotoNews" + i).html("الرجاء تحميل الصور");
              $("#checkPhotoNews" + i).css({ color: "#FF4961" });
              $("#checkPhotoNews" + i).fadeIn("slow");
            }
          }

          if (each[e] == "addNews") {
             hasKnownResponse = true;
showResponseDebug("تم حفظ الخبر بنجاح", true);
showSuccessMessage("تم حفض البيانات بنجاح", function(){ window.location = "./afficherNews.php"; });
          }

          if (each[e] == "server_error") {
            hasKnownResponse = true;
            showErrorMessage("خطأ في الخادم", "تعذر حفظ الخبر. تحقق من سجل الأخطاء (error_log).");
          }

          if (each[e] == "modNews") {
             hasKnownResponse = true;
showResponseDebug("تم تعديل الخبر بنجاح", true);
showSuccessMessage("تم تعديل البيانات بنجاح", function(){ window.location = "./afficherNews.php"; });
          }
        }

        if (!hasKnownResponse) {
          showResponseDebug(myString !== "" ? myString : "تعذر حفظ الخبر، تحقق من الحقول المطلوبة.", false);
          showErrorMessage("حدث خطأ غير متوقع", myString !== "" ? myString : "تعذر حفظ الخبر، تحقق من الحقول المطلوبة.");
        }
      },
      error: function (xhr) {
        showResponseDebug(xhr && xhr.responseText ? xhr.responseText : "فشل إرسال الطلب إلى الخادم", false);
        showErrorMessage("خطأ في الاتصال", xhr && xhr.responseText ? xhr.responseText : "فشل إرسال الطلب إلى الخادم");
      },
    });
    return false;
  });

  $("#list").on('click', '.delete-news', function(){
    var id = $(this).data("id");
    swal
      .fire({
        title: "هل أنت واثق؟",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "نعم ، احذفها!",
        cancelButtonText: 'لا ، إلغاء'
      })
      .then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            url: "assets/check/video.php",
            type: "POST",
            data: { id: id, act: "deleteVideo" },
            success: function (response) {
              swal.fire(
                "تم الحذف"
              );
              window.location = "./afficherVideos.php";
            },
          });
        }
      });
  });

  $("body").on('submit', '#writers', function(e){
    e.preventDefault();
    $.ajax({
      type: "POST",
      url: "assets/check/opinions.php",
      data: $(this).serialize(),
      success: function (data) {
        $("#checkNom").css({ display: "none" });
        $("#checkPhoto").css({ display: "none" });
        var regSeparator = new RegExp("[ ,;]+", "g");
        var myString = data;
        var each = myString.split(regSeparator);
        for (var e = 0; e < each.length; e++) {
          if (each[e] == "en") {
            $("#nom").css({ border: "2px solid #DA2128" });
            $("#checkNom").html("من فضلك ادخل اسم الكاتب");
            $("#checkNom").css({ color: "#FF4961" });
            $("#checkNom").fadeIn("slow");
          } else if (each[e] == "vn") {
            $("#nom").css({ border: "2px solid #DA2128" });
            $("#checkNom").html("الرجاء إدخال اسم الكاتب بالعربية");
            $("#checkNom").css({ color: "#FF4961" });
            $("#checkNom").fadeIn("slow");
          }

          if (each[e] == "ph") {
            $("#checkPhoto").html("الرجاء تحميل الصور");
            $("#checkPhoto").css({ color: "#FF4961" });
            $("#checkPhoto").fadeIn("slow");
          }

          if (each[e] == "addWriter") {
            Swal.fire({
              icon: "success",
              title: "تم حفض البيانات بنجاح",
              showConfirmButton: false,
              timer: 2000,
            }).then((result) => {
              window.location = "./afficherWriter.php";
            });
          }

          if (each[e] == "modWriter") {
            Swal.fire({
              icon: "success",
              title: "تم تعديل البيانات بنجاح",
              showConfirmButton: false,
              timer: 2000,
            }).then((result) => {
              window.location = "./afficherWriter.php";
            });
          }
        }
      },
    });
    return false;
  });

  $("#list").on('click', '.delete-writers', function(){
    var id = $(this).data("id");
    swal
      .fire({
        title: "هل أنت واثق؟",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "نعم ، احذفها!",
        cancelButtonText: 'لا ، إلغاء'
      })
      .then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            url: "assets/check/opinions.php",
            type: "POST",
            data: { id: id, act: "deleteWriter" },
            success: function (response) {
              swal.fire(
                "تم الحذف"
              );
              window.location = "./afficherWriter.php";
            },
          });
        }
      });
  });

  $("body").on('submit', '#opinions', function(e){
    e.preventDefault();
    $.ajax({
      type: "POST",
      url: "assets/check/opinions.php",
      data: $(this).serialize(),
      success: function (data) {
        $("#checkNom").css({ display: "none" });
        $("#checkTitle").css({ display: "none" });
        $("#checkDescription").css({ display: "none" });
        var regSeparator = new RegExp("[ ,;]+", "g");
        var myString = data;
        var each = myString.split(regSeparator);
        for (var e = 0; e < each.length; e++) {

          if (each[e] == "et") {
            $("#title").css({ border: "2px solid #DA2128" });
            $("#checkTitle").html("من فضلك ادخل عنوان المقال");
            $("#checkTitle").css({ color: "#FF4961" });
            $("#checkTitle").fadeIn("slow");
          } else if (each[e] == "vt") {
            $("#title").css({ border: "2px solid #DA2128" });
            $("#checkTitle").html("الرجاء إدخال عنوان المقال بالعربية");
            $("#checkTitle").css({ color: "#FF4961" });
            $("#checkTitle").fadeIn("slow");
          }

          
          if (each[e] == "cl") {
            $("#selectNom").css({ border: "2px solid #DA2128" });
            $("#checkNom").html("من فضلك اختر  اسم الكاتب");
            $("#checkNom").css({ color: "#FF4961" });
            $("#checkNom").fadeIn("slow");
          }

          if (each[e] == "ed") {
            $("#desc").css({ border: "2px solid #DA2128" });
            $("#checkDescription").html("من فضلك ادخل الموضوع");
            $("#checkDescription").css({ color: "#FF4961" });
            $("#checkDescription").fadeIn("slow");
          } else if (each[e] == "vd") {
            $("#desc").css({ border: "2px solid #DA2128" });
            $("#checkDescription").html("الرجاء إدخال الموضوع بالعربية");
            $("#checkDescription").css({ color: "#FF4961" });
            $("#checkDescription").fadeIn("slow");
          }

          if (each[e] == "addOpinions") {
            Swal.fire({
              icon: "success",
              title: "تم حفض البيانات بنجاح",
              showConfirmButton: false,
              timer: 2000,
            }).then((result) => {
              window.location = "./afficherOpinions.php";
            });
          }

          if (each[e] == "modOpinions") {
            Swal.fire({
              icon: "success",
              title: "تم تعديل البيانات بنجاح",
              showConfirmButton: false,
              timer: 2000,
            }).then((result) => {
              window.location = "./afficherOpinions.php";
            });
          }
        }
      },
    });
    return false;
  });

  $(".delete-opinion").on("click", function (e) {
    e.preventDefault();
    var id = $(this).data("id");
    swal
      .fire({
        title: "هل أنت واثق؟",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "نعم ، احذفها!",
        cancelButtonText: 'لا ، إلغاء'
      })
      .then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            url: "assets/check/opinions.php",
            type: "POST",
            data: { id: id, act: "deleteOpinions" },
            success: function (response) {
              swal.fire(
                "تم الحذف"
              );
              window.location = "./afficherOpinions.php";
            },
          });
        }
      });
  });

  $("body").on('submit', '#infographics', function(e){
    e.preventDefault();
    $.ajax({
      type: "POST",
      url: "assets/check/infographics.php",
      data: $(this).serialize(),
      success: function (data) {
        $("#checkTitleInfographic").css({ display: "none" });
        $("#checkPhotoInfographic").css({ display: "none" });
        $("#checkPhotoInfographic2").css({ display: "none" });
        $("#checkPhoto").css({ display: "none" });
        var regSeparator = new RegExp("[ ,;]+", "g");
        var myString = data;
        var each = myString.split(regSeparator);
        for (var e = 0; e < each.length; e++) {
          if (each[e] == "en") {
            $("#titleInfographic").css({ border: "2px solid #DA2128" });
            $("#checkTitleInfographic").html("من فضلك ادخل اسم الفئة");
            $("#checkTitleInfographic").css({ color: "#FF4961" });
            $("#checkTitleInfographic").fadeIn("slow");
          } else if (each[e] == "vn") {
            $("#titleInfographic").css({ border: "2px solid #DA2128" });
            $("#checkTitleInfographic").html("الرجاء إدخال اسم الفئة بالعربية");
            $("#checkTitleInfographic").css({ color: "#FF4961" });
            $("#checkTitleInfographic").fadeIn("slow");
          }

          if (each[e] == "ph") {
            $("#checkPhotoInfographic").html("الرجاء تحميل الصور");
            $("#checkPhotoInfographic").css({ color: "#FF4961" });
            $("#checkPhotoInfographic").fadeIn("slow");
          }

          if (each[e] == "ph2") {
            $("#checkPhotoInfographic2").html("الرجاء تحميل الصور");
            $("#checkPhotoInfographic2").css({ color: "#FF4961" });
            $("#checkPhotoInfographic2").fadeIn("slow");
          }

          if (each[e] == "addInfographic") {
            Swal.fire({
              icon: "success",
              title: "تم حفض البيانات بنجاح",
              showConfirmButton: false,
              timer: 2000,
            }).then((result) => {
              window.location = "./afficherInfographic.php";
            });
          }

          if (each[e] == "modInfographic") {
            Swal.fire({
              icon: "success",
              title: "تم تعديل البيانات بنجاح",
              showConfirmButton: false,
              timer: 2000,
            }).then((result) => {
              window.location = "./afficherInfographic.php";
            });
          }
        }
      },
    });
    return false;
  });

  $("#list").on('click', '.delete-info', function(){
    var id = $(this).data("id");
    swal
      .fire({
        title: "هل أنت واثق؟",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "نعم ، احذفها!",
        cancelButtonText: 'لا ، إلغاء'
      })
      .then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            url: "assets/check/infographics.php",
            type: "POST",
            data: { id: id, act: "deleteInfographics" },
            success: function (response) {
              swal.fire(
                "تم الحذف"
              );
              window.location = "./afficherInfographic.php";
            },
          });
        }
      });
  });

  $("body").on('submit', '#seo', function(e){
    e.preventDefault();
    $.ajax({
      type: "POST",
      url: "assets/check/seo.php",
      data: $(this).serialize(),
      success: function (data) {
        $("#checkDescriptionSeo").css({ display: "none" });
        $("#checkKeyWordSeo").css({ display: "none" });
        
        var regSeparator = new RegExp("[ ,;]+", "g");
        var myString = data;
        var each = myString.split(regSeparator);
        for (var e = 0; e < each.length; e++) {

          if (each[e] == "key") {
            $("#keyWordSeo").css({ border: "2px solid #DA2128" });
            $("#checkKeyWordSeo").html("الرجاء إدخال الكلمات الدلالية");
            $("#checkKeyWordSeo").css({ color: "#FF4961" });
            $("#checkKeyWordSeo").fadeIn("slow");
          }

          if (each[e] == "des") {
            $("#descSeo").css({ border: "2px solid #DA2128" });
            $("#checkDescriptionSeo").html("من فضلك ادخل الوصف");
            $("#checkDescriptionSeo").css({ color: "#FF4961" });
            $("#checkDescriptionSeo").fadeIn("slow");
          } else if (each[e] == "vdes") {
            $("#descSeo").css({ border: "2px solid #DA2128" });
            $("#checkDescriptionSeo").html("الرجاء إدخال عنوان الوصف بالعربية");
            $("#checkDescriptionSeo").css({ color: "#FF4961" });
            $("#checkDescriptionSeo").fadeIn("slow");
          }
          if (each[e] == "addSeo") {
            Swal.fire({
              icon: "success",
              title: "تم حفض البيانات بنجاح",
              showConfirmButton: false,
              timer: 2000,
            }).then((result) => {
              window.location = each[2];
            });
          }
        }
      },
    });
    return false;
  });

  $("#utlVideo").focus(function () {
    $(this).css({ border: "1px solid #b6bbc1" });
  });

  $("#titleVideo").focus(function () {
    $(this).css({ border: "1px solid #b6bbc1" });
  });

  $("#sousCategory").focus(function () {
    $(this).css({ border: "1px solid #b6bbc1" });
  });

  $("#selectNom").focus(function () {
    $(this).css({ border: "1px solid #b6bbc1" });
  });

  $("#selectCategory").focus(function () {
    $(this).css({ border: "1px solid #b6bbc1" });
  });
  
});
