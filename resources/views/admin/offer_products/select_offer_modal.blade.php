<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
            <div class="modal-header">
                    <h5 class="modal-title">Select Offer</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
        <div class="modal-body">
            <div class="container-fluid">
                
                <form action="{{ route('admin.offer-products.store') }}" method="POST">
                    @csrf
                   
                    <div class="form-group">
                        <label for="">{{__('Offer Name')}}</label>
                        <input type="hidden" class="form-control" name="product_id" value="{{ $product->id }}" placeholder="Name">
                        <select name="offer_id" id="" class="form-control">
                            <option value="">{{__('admin.Select')}}</option>
                            @foreach ($offers as $offer)
                                <option value="{{ $offer->id }}">{{ $offer->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button class="btn btn-primary" type="submit">{{__('admin.Save')}}</button>
                </form>
            </div>
        </div>

    </div>
</div>