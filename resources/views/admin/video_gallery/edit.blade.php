<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
            <div class="modal-header">
                    <h5 class="modal-title">Edit Video Gallery</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
        <div class="modal-body">
            <div class="container-fluid">
                
                <form action="{{ route('admin.video-gallery.update',[$video_gallery->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="form-group">
                        <label for="">{{__('Video Url')}}</label>
                        <input type="text" class="form-control" name="video_url" value="{{ $video_gallery->video_url }}" placeholder="Video Url">
                    </div>
                    
                    <div class="form-group">
                        <label for="">{{__('Thumb Image')}}</label>
                        <input type="file" class="form-control" name="thumb_img">
                    </div>

                    <button class="btn btn-primary" type="submit">{{__('admin.Save')}}</button>
                </form>
            </div>
        </div>

    </div>
</div>