<style>
    .related_video iframe {
        height: 100px;
        width: 100px;
    }
    
    .related_video .thumbnail {
        width: 80px !important;
        height: 60px !important;
    }
    
    #pro_vid iframe {
        height: 550px;
        width: 100%;
    }
    
    #frame_data i {
        position: relative;
        left: 70px;
        top: 10px;
        color: red;
        font-size: 40px
    }
    
</style>

<div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Product Video</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-10" id="pro_vid">
                    {!! $product_video !!}
                </div>
                <div class="col-lg-2 related_video">
                    <h6><strong style="font-size: 15px;border-bottom: 1px solid #000;">Related Video</strong></h6>
                    @foreach($relatedProducts as $rel_video)
                     <h6>{{ $rel_video->name }}</h6>
                       <a href="#" id="frame_data" data-frame="{{ $rel_video->video_link }}">
                          <i class="fa fa-youtube-play"></i>  <img class="thumbnail img-thumbnail" src="{{asset('uploads/custom-images/'.$rel_video->thumb_image)}}" alt="">
                       </a>    
                    @endforeach
                </div>
            </div>
            
        </div>
      </div>
      </div>
  </div>
  
  <script>
        $(document).on('click', 'a#frame_data',function(e){
            e.preventDefault();
            var product_video = document.getElementById("pro_vid");
            var frame_video = $(this).data('frame');
            $('div#pro_vid').html(frame_video);
        });  
  </script>