<!DOCTYPE html>
<html lang="fr">
  <?php include('../includes/nav.php')?>
    <div class="tm-hero d-flex justify-content-center align-items-center" id="tm-video-container">
        <video autoplay muted loop id="tm-video">
            <source src="../video/140807-776043760_small.mp4" type="video/mp4">
        </video>  
        <i id="tm-video-control-button" class="fas fa-pause"></i>
        <form class="d-flex position-absolute tm-search-form">
            <input class="form-control tm-search-input" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success tm-search-btn" type="submit">
                <i class="fas fa-search"></i>
            </button>
        </form>
    </div>

    <div class="container-fluid tm-container-content tm-mt-60">
        <div class="row mb-4">
            <h2 class="col-6 tm-text-primary">
            All books
            </h2>
            <div class="col-6 d-flex justify-content-end align-items-center">
                <form action="" class="tm-text-primary">
                    Page <input type="text" value="1" size="1" class="tm-input-paging tm-text-primary"> of 180
                </form>
            </div>
        </div>
        <div class="row tm-mb-90 tm-gallery">
            <div class="card">
                <div class="image"><span class="text">This is a chair.</span></div>
                  <span class="title">Cool Chair</span>
                  <span class="price">$100</span>
                </div>
                <div class="card">
                    <div class="image"><span class="text">This is a chair.</span></div>
                      <span class="title">Cool Chair</span>
                      <span class="price">$100</span>
                    </div>
                    <div class="card">
                        <div class="image"><span class="text">This is a chair.</span></div>
                          <span class="title">Cool Chair</span>
                          <span class="price">$100</span>
                        </div>
                        <div class="card">
                            <div class="image"><span class="text">This is a chair.</span></div>
                              <span class="title">Cool Chair</span>
                              <span class="price">$100</span>
                            </div>
                            <div class="card">
                                <div class="image"><span class="text">This is a chair.</span></div>
                                  <span class="title">Cool Chair</span>
                                  <span class="price">$100</span>
                                </div>
                                <div class="card">
                                    <div class="image"><span class="text">This is a chair.</span></div>
                                      <span class="title">Cool Chair</span>
                                      <span class="price">$100</span>
                                    </div>
                                    <div class="card">
                                        <div class="image"><span class="text">This is a chair.</span></div>
                                          <span class="title">Cool Chair</span>
                                          <span class="price">$100</span>
                                        </div>
                                        <div class="card">
                                            <div class="image"><span class="text">This is a chair.</span></div>
                                              <span class="title">Cool Chair</span>
                                              <span class="price">$100</span>
                                            </div>
                                            <div class="card">
                                                <div class="image"><span class="text">This is a chair.</span></div>
                                                  <span class="title">Cool Chair</span>
                                                  <span class="price">$100</span>
                                                </div>         
        </div> 
        <div class="row tm-mb-90">
            <div class="col-12 d-flex justify-content-between align-items-center tm-paging-col">
                <a href="javascript:void(0);" class="btn btn-primary tm-btn-prev mb-2 disabled">Previous</a>
                <div class="tm-paging d-flex">
                    <a href="javascript:void(0);" class="active tm-paging-link">1</a>
                    <a href="javascript:void(0);" class="tm-paging-link">2</a>
                    <a href="javascript:void(0);" class="tm-paging-link">3</a>
                    <a href="javascript:void(0);" class="tm-paging-link">4</a>
                </div>
                <a href="javascript:void(0);" class="btn btn-primary tm-btn-next">Next Page</a>
            </div>            
        </div>
    </div>

    <?php include('../includes/footer.php')?>
    <script src="../js/plugins.js"></script>
    <script>
        $(window).on("load", function() {
            $('body').addClass('loaded');
        });

        $(function(){

            function setVideoSize() {
                const vidWidth = 1280;
                const vidHeight = 720;
                const maxVidHeight = 400;
                let windowWidth = window.innerWidth;
                let newVidWidth = windowWidth;
                let newVidHeight = windowWidth * vidHeight / vidWidth;
                let marginLeft = 0;
                let marginTop = 0;
            
                if (newVidHeight < maxVidHeight) {
                    newVidHeight = maxVidHeight;
                    newVidWidth = newVidHeight * vidWidth / vidHeight;
                }
            
                if(newVidWidth > windowWidth) {
                    marginLeft = -((newVidWidth - windowWidth) / 2);
                }
            
                if(newVidHeight > maxVidHeight) {
                    marginTop = -((newVidHeight - $('#tm-video-container').height()) / 2);
                }
            
                const tmVideo = $('#tm-video');
            
                tmVideo.css('width', newVidWidth);
                tmVideo.css('height', newVidHeight);
                tmVideo.css('margin-left', marginLeft);
                tmVideo.css('margin-top', marginTop);
            }

            setVideoSize();

            let timeout;
            window.onresize = function () {
                clearTimeout(timeout);
                timeout = setTimeout(setVideoSize, 100);
            };

            const btn = $("#tm-video-control-button");

            btn.on("click", function (e) {
                const video = document.getElementById("tm-video");
                $(this).removeClass();

                if (video.paused) {
                    video.play();
                    $(this).addClass("fas fa-pause");
                } else {
                    video.pause();
                    $(this).addClass("fas fa-play");
                }
            });
        });
    </script>
</body>
</html>