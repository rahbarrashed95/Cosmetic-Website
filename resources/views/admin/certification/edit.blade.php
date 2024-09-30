<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
            <div class="modal-header">
                    <h5 class="modal-title">Edit Certificate</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
        <div class="modal-body">
            <div class="container-fluid">
                
                <form action="{{ route('admin.certification.update',[$certification->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="form-group">
                                <label for="">{{__('Title')}}</label>
                        <input type="text" class="form-control" name="title" placeholder="Title" value="{{ $certification->title }}">
                    </div>
                    
                    <div class="form-group">
                        <label for="">{{__('Image')}}</label>
                        <input type="file" class="form-control" name="thumb_image">
                    </div>
                    
                   
                    <button class="btn btn-primary" type="submit">{{__('admin.Save')}}</button>
                </form>
            </div>
        </div>

    </div>
</div>