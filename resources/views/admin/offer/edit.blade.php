<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Offer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <div class="modal-body">
            <div class="container-fluid">
                <form action="{{ route('admin.offers.update',[$offer->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="form-group">
                        <label for="">{{__('Name')}}</label>
                        <input type="text" class="form-control" name="name" value="{{ $offer->name }}" placeholder="Name">
                    </div>
                    
                    <div class="form-group">
                        <label for="">{{__('Image')}}</label>
                        <input type="file" class="form-control" name="image">
                    </div>

                    <button class="btn btn-primary" type="submit">{{__('Update')}}</button>
                </form>
            </div>
        </div>

    </div>
</div>