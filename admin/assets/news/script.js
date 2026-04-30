function readURL() {
  var oFile2 = document.getElementById("1").files[0];
  var rFilter2 = /^(image\/jpeg|image\/jpg|image\/png)$/i;
  var FileSize = oFile2.size / 1024 / 1024;

  if (FileSize > 4.5) {
    $("#desc-1").css("display", "flex");
    $("#taille1").css("display", "block");
    return;
  }

  if (!rFilter2.test(oFile2.type)) {
    $("#desc-1").css("display", "flex");
    $("#wn1").css("display", "block");
    return;
  }
  $("#desc-1").css("display", "none");
  $("#progress-wrp").css("display", "block");
  $("#wn1").css("display", "none");
  $("#taille1").css("display", "none");
  $("#whiteMax1").css("display","none");

  var reader = new FileReader();
  reader.onload = function (e) {
    var image = new Image();
    image.src = e.target.result;
    image.onload = function () {
      var height = this.height;
      var width = this.width;
      if (width < 599 || height < 299 || height > width) {
        $("#desc-1").css("display", "flex");
        $("#whiteMax1").css("display", "block");
        document.getElementById("progress-wrp").style.display = "none";
        return;
      }
      $(".image-1").css("background-image", "url(" + e.target.result + ")");
      var form = document.getElementById("news");
      var progress_bar_id = "#progress-wrp";
      $.ajax({
        url: "assets/news/img.php",
        type: "POST",
        enctype: "multipart/form-data",
        data: new FormData(form),
        processData: false,
        contentType: false,
        cache: false,
        xhr: function () {
          var xhr = $.ajaxSettings.xhr();
          if (xhr.upload) {
            xhr.upload.addEventListener(
              "progress",
              function (event) {
                var percent = 0;
                var position = event.loaded || event.position;
                var total = event.total;
                if (event.lengthComputable) {
                  percent = Math.ceil((position / total) * 100);
                }
                $(progress_bar_id + " .progress-bar").css(
                  "width",
                  +percent + "%"
                );
                $(progress_bar_id + " .status").text(percent + "%");
              },
              false
            );
          }
          return xhr;
        },
        beforeSend: function () {
          document.getElementById("progress-wrp").style.display = "block";
        },
        success: function (data) {
          $("#close-1").html(
            '<span><i class="fa fa-trash-o" aria-hidden="true"></i></span>'
          );
          var regSeparator = new RegExp("[ ,;]+", "g");
          var myString = data;
          var each = myString.split(regSeparator);
          $("input#photoNews").val(each[0]);
        },
        complete: function (data) {
          $("#progress-wrp").hide();
          document.getElementById("progress-wrp").style.display = "none";
        },
      });
    };
  };
  reader.readAsDataURL(oFile2);
}

function readURL2() {
  var oFile2 = document.getElementById("2").files[0];
  var rFilter2 = /^(image\/jpeg|image\/jpg|image\/png)$/i;
  var FileSize = oFile2.size / 1024 / 1024;

  if (FileSize > 4.5) {
    $("#desc-2").css("display", "flex");
    $("#taille2").css("display", "block");
    return;
  }

  if (!rFilter2.test(oFile2.type)) {
    $("#desc-2").css("display", "flex");
    $("#wn2").css("display", "block");
    return;
  }
  $("#desc-2").css("display", "none");
  $("#progress-wrp2").css("display", "block");
  $("#wn2").css("display", "none");
  $("#taille2").css("display", "none");
  var reader = new FileReader();
  reader.onload = function (e) {
    var image = new Image();
    image.src = e.target.result;
    image.onload = function () {
      $(".image-2").css("background-image", "url(" + e.target.result + ")");
      var form = document.getElementById("news");
      var progress_bar_id = "#progress-wrp2";
      $.ajax({
        url: "assets/news/img1.php",
        type: "POST",
        enctype: "multipart/form-data",
        data: new FormData(form),
        processData: false,
        contentType: false,
        cache: false,
        xhr: function () {
          var xhr = $.ajaxSettings.xhr();
          if (xhr.upload) {
            xhr.upload.addEventListener(
              "progress",
              function (event) {
                var percent = 0;
                var position = event.loaded || event.position;
                var total = event.total;
                if (event.lengthComputable) {
                  percent = Math.ceil((position / total) * 100);
                }
                $(progress_bar_id + " .progress-bar2").css(
                  "width",
                  +percent + "%"
                );
                $(progress_bar_id + " .status2").text(percent + "%");
              },
              false
            );
          }
          return xhr;
        },
        beforeSend: function () {
          document.getElementById("progress-wrp2").style.display = "block";
        },
        success: function (data) {
          $("#close-2").html(
            '<span><i class="fa fa-trash-o" aria-hidden="true"></i></span>'
          );
          var regSeparator = new RegExp("[ ,;]+", "g");
          var myString = data;
          var each = myString.split(regSeparator);
          $("input#photoNews2").val(each[0]);
        },
        complete: function (data) {
          $("#progress-wrp2").hide();
          document.getElementById("progress-wrp2").style.display = "none";
        },
      });
    };
  };
  reader.readAsDataURL(oFile2);
}

function readURL3() {
  var oFile3 = document.getElementById("3").files[0];
  var rFilter3 = /^(image\/jpeg|image\/jpg|image\/png)$/i;
  var FileSize = oFile3.size / 1024 / 1024;

  if (FileSize > 4.5) {
    $("#desc-3").css("display", "flex");
    $("#taille3").css("display", "block");
    return;
  }
  if (!rFilter3.test(oFile3.type)) {
    $("#desc-3").css("display", "flex");
    $("#wn3").css("display", "block");
    return;
  }
  $("#desc-3").css("display", "none");
  $("#progress-wrp3").css("display", "block");
  $("#wn3").css("display", "none");
  $("#taille3").css("display", "none");
  var reader = new FileReader();
  reader.onload = function (e) {
    var image = new Image();
    image.src = e.target.result;
    image.onload = function () {
      $(".image-3").css("background-image", "url(" + e.target.result + ")");
      var form = document.getElementById("news");
      var progress_bar_id = "#progress-wrp3";
      $.ajax({
        url: "assets/news/img2.php",
        type: "POST",
        enctype: "multipart/form-data",
        data: new FormData(form),
        processData: false,
        contentType: false,
        cache: false,
        xhr: function () {
          var xhr = $.ajaxSettings.xhr();
          if (xhr.upload) {
            xhr.upload.addEventListener(
              "progress",
              function (event) {
                var percent = 0;
                var position = event.loaded || event.position;
                var total = event.total;
                if (event.lengthComputable) {
                  percent = Math.ceil((position / total) * 100);
                }
                $(progress_bar_id + " .progress-bar3").css(
                  "width",
                  +percent + "%"
                );
                $(progress_bar_id + " .status3").text(percent + "%");
              },
              false
            );
          }
          return xhr;
        },
        beforeSend: function () {
          document.getElementById("progress-wrp3").style.display = "block";
        },
        success: function (data) {
          $("#close-3").html(
            '<span><i class="fa fa-trash-o" aria-hidden="true"></i></span>'
          );
          var regSeparator = new RegExp("[ ,;]+", "g");
          var myString = data;
          var each = myString.split(regSeparator);
          $("input#photoNews3").val(each[0]);
        },
        complete: function (data) {
          $("#progress-wrp3").hide();
          document.getElementById("progress-wrp3").style.display = "none";
        },
      });
    };
  };
  reader.readAsDataURL(oFile3);
}

function readURL4() {
  var oFile4 = document.getElementById("4").files[0];
  var rFilter4 = /^(image\/jpeg|image\/jpg|image\/png)$/i;
  var FileSize = oFile4.size / 1024 / 1024;

  if (FileSize > 4.5) {
    $("#desc-4").css("display", "flex");
    $("#taille4").css("display", "block");
    return;
  }
  if (!rFilter4.test(oFile4.type)) {
    $("#desc-4").css("display", "flex");
    $("#wn4").css("display", "block");
    return;
  }
  $("#desc-4").css("display", "none");
  $("#progress-wrp4").css("display", "block");
  $("#wn4").css("display", "none");
  $("#taille4").css("display", "none");
  var reader = new FileReader();
  reader.onload = function (e) {
    var image = new Image();
    image.src = e.target.result;
    image.onload = function () {
      $(".image-4").css("background-image", "url(" + e.target.result + ")");
      var form = document.getElementById("news");
      var progress_bar_id = "#progress-wrp4";
      $.ajax({
        url: "assets/news/img4.php",
        type: "POST",
        enctype: "multipart/form-data",
        data: new FormData(form),
        processData: false,
        contentType: false,
        cache: false,
        xhr: function () {
          var xhr = $.ajaxSettings.xhr();
          if (xhr.upload) {
            xhr.upload.addEventListener(
              "progress",
              function (event) {
                var percent = 0;
                var position = event.loaded || event.position;
                var total = event.total;
                if (event.lengthComputable) {
                  percent = Math.ceil((position / total) * 100);
                }
                $(progress_bar_id + " .progress-bar4").css(
                  "width",
                  +percent + "%"
                );
                $(progress_bar_id + " .status4").text(percent + "%");
              },
              false
            );
          }
          return xhr;
        },
        beforeSend: function () {
          document.getElementById("progress-wrp4").style.display = "block";
        },
        success: function (data) {
          $("#close-4").html(
            '<span><i class="fa fa-trash-o" aria-hidden="true"></i></span>'
          );
          var regSeparator = new RegExp("[ ,;]+", "g");
          var myString = data;
          var each = myString.split(regSeparator);
          $("input#photoNews4").val(each[0]);
        },
        complete: function (data) {
          $("#progress-wrp4").hide();
          document.getElementById("progress-wrp4").style.display = "none";
        },
      });
    };
  };
  reader.readAsDataURL(oFile4);
}

function readURL5() {
  var oFile5 = document.getElementById("5").files[0];
  var rFilter5 = /^(image\/jpeg|image\/jpg|image\/png)$/i;
  var FileSize = oFile5.size / 1024 / 1024;

  if (FileSize > 4.5) {
    $("#desc-5").css("display", "flex");
    $("#taille5").css("display", "block");
    return;
  }
  if (!rFilter5.test(oFile5.type)) {
    $("#desc-5").css("display", "flex");
    $("#wn5").css("display", "block");
    return;
  }
  $("#desc-5").css("display", "none");
  $("#progress-wrp5").css("display", "block");
  $("#wn5").css("display", "none");
  $("#taille5").css("display", "none");
  var reader = new FileReader();
  reader.onload = function (e) {
    var image = new Image();
    image.src = e.target.result;
    image.onload = function () {
      $(".image-5").css("background-image", "url(" + e.target.result + ")");
      var form = document.getElementById("news");
      var progress_bar_id = "#progress-wrp5";
      $.ajax({
        url: "assets/news/img5.php",
        type: "POST",
        enctype: "multipart/form-data",
        data: new FormData(form),
        processData: false,
        contentType: false,
        cache: false,
        xhr: function () {
          var xhr = $.ajaxSettings.xhr();
          if (xhr.upload) {
            xhr.upload.addEventListener(
              "progress",
              function (event) {
                var percent = 0;
                var position = event.loaded || event.position;
                var total = event.total;
                if (event.lengthComputable) {
                  percent = Math.ceil((position / total) * 100);
                }
                $(progress_bar_id + " .progress-bar5").css(
                  "width",
                  +percent + "%"
                );
                $(progress_bar_id + " .status5").text(percent + "%");
              },
              false
            );
          }
          return xhr;
        },
        beforeSend: function () {
          document.getElementById("progress-wrp5").style.display = "block";
        },
        success: function (data) {
          $("#close-5").html(
            '<span><i class="fa fa-trash-o" aria-hidden="true"></i></span>'
          );
          var regSeparator = new RegExp("[ ,;]+", "g");
          var myString = data;
          var each = myString.split(regSeparator);
          $("input#photoNews5").val(each[0]);
        },
        complete: function (data) {
          $("#progress-wrp5").hide();
          document.getElementById("progress-wrp5").style.display = "none";
        },
      });
    };
  };
  reader.readAsDataURL(oFile5);
}

function readURL6() {
  var oFile6 = document.getElementById("6").files[0];
  var rFilter6 = /^(image\/jpeg|image\/jpg|image\/png)$/i;
  var FileSize = oFile6.size / 1024 / 1024;

  if (FileSize > 4.5) {
    $("#desc-6").css("display", "flex");
    $("#taille6").css("display", "block");
    return;
  }
  if (!rFilter6.test(oFile6.type)) {
    $("#desc-6").css("display", "flex");
    $("#wn6").css("display", "block");
    return;
  }
  $("#desc-6").css("display", "none");
  $("#progress-wrp6").css("display", "block");
  $("#wn6").css("display", "none");
  $("#taille6").css("display", "none");
  var reader = new FileReader();
  reader.onload = function (e) {
    var image = new Image();
    image.src = e.target.result;
    image.onload = function () {
      $(".image-6").css("background-image", "url(" + e.target.result + ")");
      var form = document.getElementById("news");
      var progress_bar_id = "#progress-wrp6";
      $.ajax({
        url: "assets/news/img6.php",
        type: "POST",
        enctype: "multipart/form-data",
        data: new FormData(form),
        processData: false,
        contentType: false,
        cache: false,
        xhr: function () {
          var xhr = $.ajaxSettings.xhr();
          if (xhr.upload) {
            xhr.upload.addEventListener(
              "progress",
              function (event) {
                var percent = 0;
                var position = event.loaded || event.position;
                var total = event.total;
                if (event.lengthComputable) {
                  percent = Math.ceil((position / total) * 100);
                }
                $(progress_bar_id + " .progress-bar6").css(
                  "width",
                  +percent + "%"
                );
                $(progress_bar_id + " .status6").text(percent + "%");
              },
              false
            );
          }
          return xhr;
        },
        beforeSend: function () {
          document.getElementById("progress-wrp6").style.display = "block";
        },
        success: function (data) {
          $("#close-6").html(
            '<span><i class="fa fa-trash-o" aria-hidden="true"></i></span>'
          );
          var regSeparator = new RegExp("[ ,;]+", "g");
          var myString = data;
          var each = myString.split(regSeparator);
          $("input#photoNews6").val(each[0]);
        },
        complete: function (data) {
          $("#progress-wrp").hide();
          document.getElementById("progress-wrp6").style.display = "none";
        },
      });
    };
  };
  reader.readAsDataURL(oFile6);
}

function app() {
  $("#desc-1").css("display", "flex");
  $("#close-1").html("");
  $("input#photoNews").val("");
  $(".image-1").css("background-image", 'url("")');
}

function app2() {
  $("#desc-2").css("display", "flex");
  $("#close-2").html("");
  $("input#photoNews2").val("");
  $(".image-2").css("background-image", 'url("")');
}

function app3() {
  $("#desc-3").css("display", "flex");
  $("#close-3").html("");
  $("input#photoNews3").val("");
  $(".image-3").css("background-image", 'url("")');
}

function app4() {
  $("#desc-4").css("display", "flex");
  $("#close-4").html("");
  $("input#photoNews4").val("");
  $(".image-4").css("background-image", 'url("")');
}

function app5() {
  $("#desc-5").css("display", "flex");
  $("#close-5").html("");
  $("input#photoNews5").val("");
  $(".image-5").css("background-image", 'url("")');
}

function app6() {
  $("#desc-6").css("display", "flex");
  $("#close-6").html("");
  $("input#photoNews6").val("");
  $(".image-6").css("background-image", 'url("")');
}

$(".afficher .close").html(
  '<span><i class="fa fa-trash-o" aria-hidden="true"></i></span>'
);

CKEDITOR.replace("desc6", {
  language: "ar",
  toolbarGroups: [
    { name: "document", groups: ["mode", "document", "doctools"] },
    { name: "basicstyles", groups: ["basicstyles", "cleanup"] },
    {
      name: "paragraph",
      groups: ["list", "indent", "blocks", "align", "bidi", "paragraph"],
    },
    { name: "clipboard", groups: ["clipboard", "undo"] },
    {
      name: "editing",
      groups: ["find", "selection", "spellchecker", "editing"],
    },
    { name: "forms", groups: ["forms"] },
    { name: "links", groups: ["links"] },
    { name: "insert", groups: ["insert"] },
    { name: "styles", groups: ["styles"] },
    { name: "colors", groups: ["colors"] },
    { name: "tools", groups: ["tools"] },
    { name: "others", groups: ["others"] },
    { name: "about", groups: ["about"] },
  ],
  removeButtons:
    "About,Source,Print,Preview,ExportPdf,NewPage,Save,Templates,PasteText,Find,Replace,SelectAll,Scayt,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,CopyFormatting,RemoveFormat,Blockquote,CreateDiv,BidiLtr,BidiRtl,Anchor,Image,Flash,Table,HorizontalRule,Smiley,SpecialChar,PageBreak,Iframe,Maximize,ShowBlocks",
});

CKEDITOR.replace("desc2", {
  language: "ar",
  toolbarGroups: [
    { name: "document", groups: ["mode", "document", "doctools"] },
    { name: "basicstyles", groups: ["basicstyles", "cleanup"] },
    {
      name: "paragraph",
      groups: ["list", "indent", "blocks", "align", "bidi", "paragraph"],
    },
    { name: "clipboard", groups: ["clipboard", "undo"] },
    {
      name: "editing",
      groups: ["find", "selection", "spellchecker", "editing"],
    },
    { name: "forms", groups: ["forms"] },
    { name: "links", groups: ["links"] },
    { name: "insert", groups: ["insert"] },
    { name: "styles", groups: ["styles"] },
    { name: "colors", groups: ["colors"] },
    { name: "tools", groups: ["tools"] },
    { name: "others", groups: ["others"] },
    { name: "about", groups: ["about"] },
  ],
  removeButtons:
    "About,Source,Print,Preview,ExportPdf,NewPage,Save,Templates,PasteText,Find,Replace,SelectAll,Scayt,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,CopyFormatting,RemoveFormat,Blockquote,CreateDiv,BidiLtr,BidiRtl,Anchor,Image,Flash,Table,HorizontalRule,Smiley,SpecialChar,PageBreak,Iframe,Maximize,ShowBlocks",
});

CKEDITOR.replace("desc3", {
  language: "ar",
  toolbarGroups: [
    { name: "document", groups: ["mode", "document", "doctools"] },
    { name: "basicstyles", groups: ["basicstyles", "cleanup"] },
    {
      name: "paragraph",
      groups: ["list", "indent", "blocks", "align", "bidi", "paragraph"],
    },
    { name: "clipboard", groups: ["clipboard", "undo"] },
    {
      name: "editing",
      groups: ["find", "selection", "spellchecker", "editing"],
    },
    { name: "forms", groups: ["forms"] },
    { name: "links", groups: ["links"] },
    { name: "insert", groups: ["insert"] },
    { name: "styles", groups: ["styles"] },
    { name: "colors", groups: ["colors"] },
    { name: "tools", groups: ["tools"] },
    { name: "others", groups: ["others"] },
    { name: "about", groups: ["about"] },
  ],
  removeButtons:
    "About,Source,Print,Preview,ExportPdf,NewPage,Save,Templates,PasteText,Find,Replace,SelectAll,Scayt,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,CopyFormatting,RemoveFormat,Blockquote,CreateDiv,BidiLtr,BidiRtl,Anchor,Image,Flash,Table,HorizontalRule,Smiley,SpecialChar,PageBreak,Iframe,Maximize,ShowBlocks",
});

CKEDITOR.replace("desc4", {
  language: "ar",
  toolbarGroups: [
    { name: "document", groups: ["mode", "document", "doctools"] },
    { name: "basicstyles", groups: ["basicstyles", "cleanup"] },
    {
      name: "paragraph",
      groups: ["list", "indent", "blocks", "align", "bidi", "paragraph"],
    },
    { name: "clipboard", groups: ["clipboard", "undo"] },
    {
      name: "editing",
      groups: ["find", "selection", "spellchecker", "editing"],
    },
    { name: "forms", groups: ["forms"] },
    { name: "links", groups: ["links"] },
    { name: "insert", groups: ["insert"] },
    { name: "styles", groups: ["styles"] },
    { name: "colors", groups: ["colors"] },
    { name: "tools", groups: ["tools"] },
    { name: "others", groups: ["others"] },
    { name: "about", groups: ["about"] },
  ],
  removeButtons:
    "About,Source,Print,Preview,ExportPdf,NewPage,Save,Templates,PasteText,Find,Replace,SelectAll,Scayt,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,CopyFormatting,RemoveFormat,Blockquote,CreateDiv,BidiLtr,BidiRtl,Anchor,Image,Flash,Table,HorizontalRule,Smiley,SpecialChar,PageBreak,Iframe,Maximize,ShowBlocks",
});

CKEDITOR.replace("desc5", {
  language: "ar",
  toolbarGroups: [
    { name: "document", groups: ["mode", "document", "doctools"] },
    { name: "basicstyles", groups: ["basicstyles", "cleanup"] },
    {
      name: "paragraph",
      groups: ["list", "indent", "blocks", "align", "bidi", "paragraph"],
    },
    { name: "clipboard", groups: ["clipboard", "undo"] },
    {
      name: "editing",
      groups: ["find", "selection", "spellchecker", "editing"],
    },
    { name: "forms", groups: ["forms"] },
    { name: "links", groups: ["links"] },
    { name: "insert", groups: ["insert"] },
    { name: "styles", groups: ["styles"] },
    { name: "colors", groups: ["colors"] },
    { name: "tools", groups: ["tools"] },
    { name: "others", groups: ["others"] },
    { name: "about", groups: ["about"] },
  ],
  removeButtons:
    "About,Source,Print,Preview,ExportPdf,NewPage,Save,Templates,PasteText,Find,Replace,SelectAll,Scayt,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,CopyFormatting,RemoveFormat,Blockquote,CreateDiv,BidiLtr,BidiRtl,Anchor,Image,Flash,Table,HorizontalRule,Smiley,SpecialChar,PageBreak,Iframe,Maximize,ShowBlocks",
});
