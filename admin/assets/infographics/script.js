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
      if(height > width) {
        $("#desc-1").css("display", "flex");
        $("#whiteMax1").css("display", "block");
        document.getElementById("progress-wrp").style.display = "none";
        return;
      }
    $(".image-1").css("background-image", "url(" + e.target.result + ")");
    var form = document.getElementById("infographics");
    var progress_bar_id = "#progress-wrp";
    $.ajax({
      url: "assets/infographics/img.php",
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
        $("input#photoInfographic").val(each[0]);
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
  var FileSize2 = oFile2.size / 1024 / 1024;

  if (FileSize2 > 4.5) {
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
  $("#whiteMax2").css("display","none");
  var reader = new FileReader();
  reader.onload = function (e) {
    var image = new Image();
    image.src = e.target.result;
    image.onload = function () {
    $(".image-2").css("background-image", "url(" + e.target.result + ")");
    var form = document.getElementById("infographics");
    var progress_bar_id = "#progress-wrp2";
    $.ajax({
      url: "assets/infographics/img1.php",
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
        $("input#photoInfographic2").val(each[0]);
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
  var FileSize3 = oFile3.size / 1024 / 1024;

  if (FileSize3 > 4.5) {
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
  $("#whiteMax3").css("display","none");
  var reader = new FileReader();
  reader.onload = function (e) {
    var image = new Image();
    image.src = e.target.result;
    image.onload = function () {

    $(".image-3").css("background-image", "url(" + e.target.result + ")");
    var form = document.getElementById("infographics");
    var progress_bar_id = "#progress-wrp3";
    $.ajax({
      url: "assets/infographics/img2.php",
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
        $("input#photoInfographic3").val(each[0]);
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
  var FileSize4 = oFile4.size / 1024 / 1024;

  if (FileSize4 > 4.5) {
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
  $("#whiteMax4").css("display","none");
  var reader = new FileReader();
  reader.onload = function (e) {
    var image = new Image();
    image.src = e.target.result;
    image.onload = function () {
    $(".image-4").css("background-image", "url(" + e.target.result + ")");
    var form = document.getElementById("infographics");
    var progress_bar_id = "#progress-wrp4";
    $.ajax({
      url: "assets/infographics/img3.php",
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
        $("input#photoInfographic4").val(each[0]);
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
  var FileSize5 = oFile5.size / 1024 / 1024;

  if (FileSize5 > 4.5) {
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
  $("#whiteMax5").css("display","none");
  var reader = new FileReader();
  reader.onload = function (e) {
    var image = new Image();
    image.src = e.target.result;
    image.onload = function () {
    $(".image-5").css("background-image", "url(" + e.target.result + ")");
    var form = document.getElementById("infographics");
    var progress_bar_id = "#progress-wrp5";
    $.ajax({
      url: "assets/infographics/img4.php",
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
        $("input#photoInfographic5").val(each[0]);
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

// Enleve les images en cliquant pour supprimer
function app() {
  $("#desc-1").css("display", "flex");
  $("#close-1").html("");
  $("input#photoInfographic").val("");
  $(".image-1").css("background-image", 'url("")');
}

function app2() {
  $("#desc-2").css("display", "flex");
  $("#close-2").html("");
  $("input#photoInfographic2").val("");
  $(".image-2").css("background-image", 'url("")');
}

function app3() {
  $("#desc-3").css("display", "flex");
  $("#close-3").html("");
  $("input#photoInfographic3").val("");
  $(".image-3").css("background-image", 'url("")');
}

function app4() {
  $("#desc-4").css("display", "flex");
  $("#close-4").html("");
  $("input#photoInfographic4").val("");
  $(".image-4").css("background-image", 'url("")');
}

function app5() {
  $("#desc-5").css("display", "flex");
  $("#close-5").html("");
  $("input#photoInfographic5").val("");
  $(".image-5").css("background-image", 'url("")');
}

$(".afficher .close").html(
  '<span><i class="fa fa-trash-o" aria-hidden="true"></i></span>'
);
