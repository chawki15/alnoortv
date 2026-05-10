function uploadStoryFile(inputId, hiddenId, progressId, kind) {
  var fileInput = document.getElementById(inputId);
  if (!fileInput || !fileInput.files || !fileInput.files[0]) {
    return;
  }

  var formData = new FormData();
  var fieldName = kind === 'thumb' ? 'thumbFile' : 'mediaFile';
  formData.append('kind', kind);
  formData.append(fieldName, fileInput.files[0]);

  $('#' + progressId).show();
  $.ajax({
    url: 'assets/story/upload.php',
    type: 'POST',
    data: formData,
    processData: false,
    contentType: false,
    xhr: function () {
      var xhr = $.ajaxSettings.xhr();
      if (xhr.upload) {
        xhr.upload.addEventListener('progress', function (event) {
          if (event.lengthComputable) {
            var percent = Math.ceil((event.loaded / event.total) * 100);
            $('#' + progressId + ' .progress-bar, #' + progressId + ' .progress-bar2').css('width', percent + '%');
            $('#' + progressId + ' .status, #' + progressId + ' .status2').text(percent + '%');
          }
        }, false);
      }
      return xhr;
    },
    success: function (data) {
      $('#' + hiddenId).val($.trim(data));
    },
    complete: function () {
      $('#' + progressId).hide();
    }
  });
}

function readStoryVideo() {
  uploadStoryFile('mediaFile', 'storyMedia', 'progress-wrp', 'media');
}

function readStoryThumb() {
  uploadStoryFile('thumbFile', 'storyThumb', 'progress-wrp2', 'thumb');
}

$(document).ready(function () {
  $('body').on('submit', '#story', function (e) {
    e.preventDefault();
    $.ajax({
      type: 'POST',
      url: 'assets/check/story.php',
      data: $(this).serialize(),
      success: function (data) {
        $('#checkTitleStory').hide();
        $('#checkStoryMedia').hide();
        $('#checkStoryThumb').hide();
        var parts = data.split(new RegExp('[ ,;]+', 'g'));
        for (var i = 0; i < parts.length; i++) {
          if (parts[i] === 'et') {
            $('#titleStory').css({ border: '2px solid #DA2128' });
            $('#checkTitleStory').html('من فضلك ادخل عنوان الستوري').css({ color: '#FF4961' }).fadeIn('slow');
          }
          if (parts[i] === 'media') {
            $('#checkStoryMedia').html('من فضلك ارفع فيديو عمودي').css({ color: '#FF4961' }).fadeIn('slow');
          }
          if (parts[i] === 'thumb') {
            $('#checkStoryThumb').html('من فضلك ارفع الصورة المصغرة').css({ color: '#FF4961' }).fadeIn('slow');
          }
          if (parts[i] === 'addStory') {
            Swal.fire({ icon: 'success', title: 'تم حفض البيانات بنجاح', showConfirmButton: false, timer: 2000 }).then(function () {
              window.location = './afficherStories.php';
            });
          }
        }
      }
    });
    return false;
  });

  $('#titleStory').focus(function () {
    $(this).css({ border: '1px solid #b6bbc1' });
  });
});