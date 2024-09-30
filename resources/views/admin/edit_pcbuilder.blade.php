<div class="modal-dialog" role="document">
    <div class="modal-content">
            <div class="modal-header">
                    <h5 class="modal-title">Edit PC Builder </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
        <div class="modal-body">
            <div class="container-fluid">
                
                <form action="{{ route('admin.update-build-pc') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="">{{__('admin.Category')}}</label>
                        <input type="hidden" name="id" value="{{ $data->id }}">
                        <select name="category_id" id="" class="form-control">
                            <option value="">{{__('admin.Select')}}</option>
                            @foreach ($allCategories as $category)
                                <option value="{{ $category->id }}" {{ $category->id == $data->category_id ? 'selected' : '' }} >{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="">{{__('Serial')}}</label>
                        <input type="text" class="form-control" value="{{ $data->serial }}" name="serial" placeholder="serial">
                    </div>
                    
                    <div class="form-group">
                        <input type="checkbox" {{ ($data->is_required == '1' ? 'checked' : '') }} id="is_required" name="is_required" placeholder="Is Required" />
                        <label for="is_required" style="padding-left: 3px;">{{__('Is Required')}}</label>
                    </div>

                    <button class="btn btn-primary" type="submit">{{__('admin.Save')}}</button>
                </form>
            </div>
        </div>

    </div>
</div>