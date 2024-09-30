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
    left: 24px;
    top: 57px;
    color: red;
    font-size: 40px;
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
                <div class="col-lg-12">
                    {!! $product_video !!}
                </div>
            </div>
            
        </div>
      </div>
      </div>
  </div>