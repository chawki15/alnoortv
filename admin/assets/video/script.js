function readURL() {
  var oFile2 = document.getElementById("1").files[0];
  var rFilter2 = /^(image\/webp|image\/jpeg|image\/jpg|image\/png)$/i;
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
  $("#whiteMax1").css("display", "none");
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
      var form = document.getElementById("video");
      var progress_bar_id = "#progress-wrp";
      $.ajax({
        url: "assets/video/img.php",
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
          $("input#photo").val(each[0]);
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

function app() {
  $("#desc-1").css("display", "flex");
  $("#close-1").html("");
  $("input#photo").val("");
  $(".image-1").css("background-image", 'url("")');
}

$(".afficher .close").html(
  '<span><i class="fa fa-trash-o" aria-hidden="true"></i></span>'
);


CKEDITOR.replace("desc", {
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
