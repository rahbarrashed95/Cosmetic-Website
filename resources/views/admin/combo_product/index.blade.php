@extends('admin.master_layout')
@section('title')
<title>{{__('admin.Products')}}</title>
@endsection
@section('admin-content')

<style>
    .select2-container--default .select2-selection--single .select2-selection__rendered {
        line-height: 22px !important;
    }
    nav {
        float: right;
    }
    
    .form-check {
        position: relative;
        display: block;
        padding-left: 1.25rem;
        top: -15px;
    }
    
</style>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>{{__('Combo Products')}}</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{__('admin.Dashboard')}}</a></div>
              <div class="breadcrumb-item">{{__('admin.Products')}}</div>
            </div>
          </div>

          <div class="section-body">
              
            <div class="row">
                <div class="col-md-4">
                    <a href="{{ route('admin.combo-product.create') }}" class="btn btn-primary">{{__('admin.Add New')}}</a>
                    <a href="{{ route('admin.deleteAllProduct')}}" class="btn btn-danger multi_product_delete">Delete All</a>
                </div>
                
                <div class="col-md-8">
                              <form class="form-inline" action="" style="float: right;">
                                <div class="form-group">
                                  <label class="sr-only" for="email">Enter Search String:</label>
                                  <input type="text" class="form-control" id="email" placeholder="Enter Search String"  name="q">
                                </div>
                                <button type="submit" class="btn btn-primary ml-3">Search</button>
                              </form>
                          </div>
                </div>  
            
            <div class="row mt-4 retrive_table">
                <div class="col">
                  <div class="card">
                    <div class="card-body">
                      <div class="table-responsive table-invoice">
                        <table class="table table-bordered" id="">
                            <thead>
                                <tr>
                                    <th style="width: 2%;">
                                    <div class="form-check">
                                      <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input check_all" value="">
                                      </label>
                                    </div>
                                    </th>
                                    <th style="width: 10%;">{{__('admin.Action')}}</th>
                                    <th style="width: 30%;">{{__('admin.Name')}}</th>
                                    <th style="width: 10%;">{{__('admin.Price')}}</th>
                                    <th width="6%">{{__('admin.Photo')}}</th>
                                  </tr>
                            </thead>
                            <tbody>
                                @foreach ($combo_products as $index => $product)
                                    <tr>
                                        <td>
                                        <input type="checkbox" class="product_checkbox" value="{{ $product->id}}">
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.combo-product.edit',$product->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit" aria-hidden="true"></i></a> &nbsp;
                                            <a href="javascript:;" data-toggle="modal" data-target="#deleteModal" class="btn btn-danger btn-sm" onclick="deleteData({{ $product->id }})"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                        </td>
                                        <td><a target="_blank" href="{{ route('front.product.single_product',[$product->slug]) }}">{{ $product->name }}</a>@if($product->product_status)<span class="badge badge-info">Pre-Order</span> @endif</td>
                                        <td>{{ $product->price }}</td>
                                        <td> 
                                            <img class="rounded-circle" src="{{ asset($product->image) }}" alt="" width="100px" height="100px">
                                        </td>
                                        
                                        
                                    </tr>
                                  @endforeach
                            </tbody>
                        </table>
                      </div>
                      <p>{!! urldecode(str_replace("/?","?",$combo_products->appends(Request::all())->render())) !!}</p>
                    </div>
                  </div>
                </div>
          </div>
        </section>
      </div>

      <!-- Modal -->
      <div class="modal fade" id="canNotDeleteModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                        <div class="modal-body">
                            {{__('admin.You can not delete this product. Because there are one or more order has been created in this product.')}}
                        </div>

                  <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">{{__('admin.Close')}}</button>
                  </div>
              </div>
          </div>
      </div>
      
<!-- Add the following script at the end of your HTML file -->
<script>
    $(document).ready(function () {
        // Use a class selector for the priority input fields
        $('.priority-input').on('change', function () {
            var productId = $(this).data('product-id');
            var priorityValue = $(this).val();

            $.ajax({
                url: '/admin/update-priority/' + productId,
                type: 'POST',
                data: {
                    priority: priorityValue,
                    _token: '{{ csrf_token() }}'
                },
                success: function (response) {
                    console.log(response);
                    console.log(productId, priorityValue);
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                    // Handle error, if needed
                }
            });
        });
    });
</script>

      
      
<script>

    function deleteData(id) {
        var url = '{{ route("admin.combo-product.destroy", ":id") }}';
        url = url.replace(':id', id);
        $("#deleteForm").attr("action", url);
    }
    
    function changeProductStatus(id){
        var isDemo = "{{ env('APP_MODE') }}"
        if(isDemo == 'DEMO'){
            toastr.error('This Is Demo Version. You Can Not Change Anything');
            return;
        }
        
        $.ajax({
            type:"put",
            data: { _token : '{{ csrf_token() }}' },
            url:"{{url('/admin/product-status/')}}"+"/"+id,
            success:function(response){
                toastr.success(response)
            },
            error:function(err){
                console.log(err);

            }
        })
    }
    
    function changeStatus(id){
        var isDemo = "{{ env('APP_MODE') }}"
        if(isDemo == 'DEMO'){
            toastr.error('This Is Demo Version. You Can Not Change Anything');
            return;
        }
        
        $.ajax({
            type:"put",
            data: { _token : '{{ csrf_token() }}' },
            url:"{{url('/admin/product-status-change/')}}"+"/"+id,
            success:function(response){
                toastr.success(response)
            },
            error:function(err){
                console.log(err);

            }
        })
    }
    
    $(".check_all").on('change',function(){
      $(".product_checkbox").prop('checked',$(this).is(":checked"));
    }); 
    
    $(document).on('click', 'a.recomm_update', function(e){
        e.preventDefault();
        var url = $(this).attr('href');
        var product = $('input.checkbox:checked').map(function(){
          return $(this).val();
        });
        var product_ids=product.get();
        
        if(product_ids.length ==0){
            toastr.error('Please Select A Product First !');
            return ;
        }
        
        $.ajax({
           type:'GET',
           url:url,
           data:{product_ids},
           success:function(res){
               if(res.status==true){
                toastr.success(res.msg);
                window.location.reload();
                
            }else if(res.status==false){
                toastr.error(res.msg);
            }
           }
        });
    
    });
    
    $(document).on('click', 'a.multi_product_delete', function(e){
        e.preventDefault();
        var url = $(this).attr('href');

        var product = $('input.product_checkbox:checked').map(function(){
          return $(this).val();
        });
        var product_ids=product.get();

        if(product_ids.length ==0){
            toastr.error('Please Select A Product First !');
            return ;
        }

        $.ajax({
           type:'GET',
           url:url,
           data:{product_ids},
           success:function(res){
               if(res.status==true){
                toastr.success(res.msg);
                window.location.reload();

            }else if(res.status==false){
                toastr.error(res.msg);
            }
           }
        });

    });
    
    $(document).on('change', '#category', function() {
        
        let category_id = $(this).val();
        let url = "{{ route("admin.cat_wise_product") }}"+'?category_id='+category_id;
        window.location.href = url;
        
        // var url = '{{ route("admin.cat_wise_product") }}';
        // $.ajax({
        //   type:'GET',
        //   url:url,
        //   data:{cat_id},
        //   success:function(res){
        //       if(res.status==true){
        //         $('.retrive_table').html(res.html);   
        //     }else if(res.status==false){
        //         toastr.error(res.msg);
        //     }
        //   }
        // });
    });
    
</script>
@endsection
