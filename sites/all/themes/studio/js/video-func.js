/* =================================
     VIDEO BACKGROUND
  =================================== */
if ($('#home-style').val() && $('#home-style').val() == "video") {
  if (matchMedia('(min-width: 640px)').matches) {

     $(document).ready(function() {
      var path = $('#path-video').val();
       var filename = $('#video-name').val();
      var videobackground = new $.backgroundVideo($('body'), {
        "align": "centerXY",
        "width": 1280,
        "height": 720,
        "path": path+"/",
        "filename": filename,
        "types": ["mp4","ogg","webm"]
      });
    });

  }
}