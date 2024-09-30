@extends('admin.master_layout')
@section('title')
<title>{{__('Offer Product')}}</title>
@endsection
@section('admin-content')
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>{{__('Offer Product')}}</h1>

          </div>

        <div class="section-body">
            <div class="row mt-4">
                <div class="col">
                  <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.offer-products.store') }}" method="post">
                                @csrf

                                <div class="form-group">
                                    <label for="">{{__('Offer')}}</label>
                                    <select name="offer_id" id="offer_id" class="form-control select2">
                                        <option value="">{{__('Select Offer')}}</option>
                                            @foreach ($offers as $index => $offer)
                                            <option value="{{ $offer->id }}">{{ $offer->name }}</option>
                                            @endforeach
                                    </select>
                                </div>
                                
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="">{{__('Offer Product')}}</label>
                                            <select name="product_id" id="product_id" class="form-control select2">
                                                <option value="">{{__('admin.Select Product')}}</option>
                                                @foreach ($products as $index => $product)
                                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <button class="btn btn-primary" type="submit">{{__('admin.Save')}}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

          <div class="section-body">
            <div class="row mt-4">
                <div class="col">
                  <div class="card">
                    <div class="card-body">
                      <div class="table-responsive table-invoice">
                        <table class="table table-striped" id="dataTable">
                            <thead>
                                <tr>
                                    <th width="5%">{{__('admin.SN')}}</th>
                                    <th width="5%">{{__('Offer')}}</th>
                                    <th width="50%">{{__('admin.Product')}}</th>
                                    <th width="5%">{{__('admin.Action')}}</th>
                                  </tr>
                            </thead>
                            <tbody>
                                @foreach ($offer_products as $index => $op)
                                    <tr>
                                        <td>{{ ++$index }}</td>
                                        <td>{{ !empty($op->offer->name) ? $op->offer->name : '' }}</td>
                                        <td>{{ $op->product->name }}</td>
                                        <td>
                                            <a href="javascript:;" data-toggle="modal" data-target="#deleteModal" class="btn btn-danger btn-sm" onclick="deleteData({{ $op->id }})"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
          </div>
        </section>
      </div>

<script>
    
    function deleteData(id) {
        var url = '{{ route("admin.offer-products.destroy", ":id") }}';
        url = url.replace(':id', id);
        $("#deleteForm").attr("action", url);
    }


    function changeCamapaignProductStatus(id){
        var isDemo = "{{ env('APP_MODE') }}"
        if(isDemo == 'DEMO'){
            toastr.error('This Is Demo Version. You Can Not Change Anything');
            return;
        }
        $.ajax({
            type:"put",
            data: { _token : '{{ csrf_token() }}' },
            url:"{{url('/admin/flash-sale-product-status/')}}"+"/"+id,
            success:function(response){
                toastr.success(response)
            },
            error:function(err){
                console.log(err);

            }
        })
    }


</script>
@endsection
