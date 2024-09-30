@extends('admin.master_layout')
@section('title')
<title>{{__('admin.Products')}}</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />
@endsection
@section('admin-content')

        <style>
            .preview-image {
                width: 70px;
                padding: 10px;
                margin-right: 5px; /* Optional: Add margin between preview images */
            }
            .preview-image-container {
                display: inline-block;
                position: relative;
            }
            .close-icon {
                position: absolute;
                top: 5px;
                right: 5px;
                font-size: 16px;
                color: #000;
                cursor: pointer; /* Add cursor pointer */
            }
        </style>


      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>{{__('Edit Combo Product')}}</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{__('admin.Dashboard')}}</a></div>
              <div class="breadcrumb-item">{{__('Edit Combo Product')}}</div>
            </div>
          </div>

          <div class="section-body">
            <div class="row mt-4">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.combo-product.update',[$combo_product->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                
                                <div class="form-group col-4">
                                    <label>{{__('admin.Thumnail Image')}} <span class="text-danger">*</span></label>
                                    <input type="file" class="form-control-file"  name="thumb_image" onchange="previewThumnailImage(event)">
                                </div>
                                
                                <div class="form-group col-4">
                                    <label>{{__('admin.Name')}} <span class="text-danger">*</span><span class="text-danger" id="name_test"></span></label>
                                    <input type="text" id="name" class="form-control"  name="name" value="{{ $combo_product->name }}">
                                </div>
                                
                                <div class="form-group col-6">
                                    <label>{{__('admin.Slug')}} <span class="text-danger">*</span></label>
                                    <input type="text" id="slug" class="form-control"  name="slug" value="{{ $combo_product->slug }}">
                                </div>
                                
                                <div class="form-group col-4">
                                    <label>{{__('admin.Price')}} <span class="text-danger">*</span></label>
                                   <input type="text" class="form-control" name="price" value="{{ $combo_product->price }}">
                                </div>
                                
                                <div class="form-group col-2 d-none">
                                    <label>{{__('admin.Thumbnail Image Preview')}}</label>
                                    <div>
                                        <img id="preview-img" class="admin-img" src="{{ asset('uploads/website-images/preview.png') }}" alt="">
                                    </div>
                                </div>

                                <div class="form-group col-6 d-none">
                                    <label>{{__('admin.Slug')}} <span class="text-danger">*</span></label>
                                    <input type="text" id="slug" class="form-control"  name="slug" value="{{ old('slug') }}">
                                </div>
                                
                                <div class="form-group col-6">
                                    <label>Product Search Here</label>  
                                    <input type="text" id="search2"  class="form-control" placeholder="product search here">
                                  </div>
                                
                                <div class="form-group col-6">  
                                    <label>Product List</label>  
                                    <table class="table table-centered table-nowrap mb-0" id="product_table">
                                        <thead class="table-light">
                                            <tr>
                                                <th style="width: 7%;">Image</th>
                                                <th style="width: 20%;">Product</th>                                    
                                                <th style="width: 8%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-light" id="data">
                                            @foreach($product_array as $product)
                                                <tr>
                                                    <td><img src="{{ asset('uploads/product/thumb-small-image/'.$product->thumb_image) }}" height="50" width="50"/></td>
                                                    <td>{{ $product->name }}</td>
                                                    <input type="hidden" class="form-control product_id" name="product_id[]" value="{{ $product->id }}" required/>
                                                    <td>
                                                        <a href="#" class="remove btn btn-sm btn-danger"> <i class="fa fa-trash" aria-hidden="true"></i> </a>
                                                    </td>
                                                </tr>  
                                            @endforeach
                                        </tbody>
                                    </table> 
                                </div>
                                
                                <div class="form-group col-12">
                                    <label>{{__('admin.Short Description')}}</label>
                                    <textarea name="short_description" id="" cols="30" rows="5" class="summernote">{{ $combo_product->short_description }}</textarea>
                                </div>

                                <!--<div class="form-group col-12">-->
                                <!--    <label>{{__('admin.SEO Title')}}</label>-->
                                <!--   <input type="text" class="form-control" name="seo_title" value="{{ old('seo_title') }}">-->
                                <!--</div>-->
                                
                                <!--<div class="form-group col-12">-->
                                <!--    <label>{{__('Keywords')}} <span class="text-danger">*</span></label>-->
                                <!--   <input type="text" class="form-control tags" name="tags" value="{{ old('tags') }}">-->
                                <!--</div>-->

                                <!--<div class="form-group col-12">-->
                                <!--    <label>{{__('admin.SEO Description')}}</label>-->
                                <!--    <textarea name="seo_description" id="" cols="30" rows="10" class="form-control text-area-5">{{ old('seo_description') }}</textarea>-->
                                <!--</div>-->
                               
                                
                            </div>


                            <div class="row">
                                <div class="col-12">
                                    <button class="btn btn-primary">{{__('admin.Save')}}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                  </div>
                </div>
          </div>
        </section>
      </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script>

 var path2 = "{{ route('admin.addNewOrderProductadd') }}";
  const products=[];
  
  $( "#search2" ).autocomplete({
        selectFirst: false, //here
        minLength: 3,
        source: function( request, response ) {
          $.ajax({
            url: path2,
            type: 'GET',
            dataType: "json",
            data: {
               search: request.term
            },
            success: function( data ) {
                if (data.length ==0) {
                    toastr.error('Product Or Stock Not Found');
                }
                else if (data.length ==1) {
                    if(products.indexOf(data[0].id) ==-1){
                        landingProductEntry(data[0]);
                        products.push(data[0].id);
                    }
                    $('#search2').val('');
                }else if (data.length >1) {
                    response(data);
                }
            }
          });
        },
        select: function (event, ui) {
           if(products.indexOf(ui.item.id) ==-1){
                landingProductEntry(ui.item);
                products.push(ui.item.id);
            }
           $('#search2').val('');
           return false;
        }
      });

      function landingProductEntry(item)
      {
          $.ajax({
            url: '{{ route("admin.addNewComboProductEntryadd")}}',
            type: 'GET',
            dataType: "json",
            data: {id:item.id},
            success: function( res ) {
                if (res.html) {
                   $('tbody#data').append(res.html);
                    calculateSum();
                }
            }
          });
      }


$(document).on('blur', 'input[id="name"]', function(e){
    let name = $(this).val();
    var url = "{{ route('admin.test_slug') }}";
    $.ajax({
        url,
        type: 'GET',
        dataType: "json",
        data: {name},
        success: function(res){
          if(res.status)
          {
            //   toastr.error('Name Already Exists');
              $("input#slug").val('');
              $('span#name_test').text('একই নাম পূর্বে ব্যবহার হয়েছে। সামান্য পরিবর্তন করন।');
          } else {
              $('span#name_test').text('');
          }
        }
      
    });
    
  });


    (function($) {
        "use strict";
        var specification = true;
        $(document).ready(function () {
            $("#name").on("focusout",function(e){
                $("#slug").val(convertToSlug($(this).val()));
            })

            $("#category").on("change",function(){
                var categoryId = $("#category").val();
                if(categoryId){
                    $.ajax({
                        type:"get",
                        url:"{{url('/admin/subcategory-by-category/')}}"+"/"+categoryId,
                        success:function(response){
                            $("#sub_category").html(response.subCategories);
                            var response= "<option value=''>{{__('admin.Select Child Category')}}</option>";
                            $("#child_category").html(response);
                        },
                        error:function(err){
                            console.log(err);

                        }
                    })
                }else{
                    var response= "<option value=''>{{__('admin.Select Sub Category')}}</option>";
                    $("#sub_category").html(response);
                    var response= "<option value=''>{{__('admin.Select Child Category')}}</option>";
                    $("#child_category").html(response);
                }


            })

            $("#sub_category").on("change",function(){
                var SubCategoryId = $("#sub_category").val();
                if(SubCategoryId){
                    $.ajax({
                        type:"get",
                        url:"{{url('/admin/childcategory-by-subcategory/')}}"+"/"+SubCategoryId,
                        success:function(response){
                            $("#child_category").html(response.childCategories);
                        },
                        error:function(err){
                            console.log(err);

                        }
                    })
                }else{
                    var response= "<option value=''>{{__('admin.Select Child Category')}}</option>";
                    $("#child_category").html(response);
                }

            })

            $("#is_return").on('change',function(){
                var returnId = $("#is_return").val();
                if(returnId == 1){
                    $("#policy_box").removeClass('d-none');
                }else{
                    $("#policy_box").addClass('d-none');
                }

            })

            $("#addNewSpecificationRow").on('click',function(){
                var html = $("#hidden-specification-box").html();
                $("#specification-box").append(html);
            })

            $(document).on('click', '.deleteSpeceficationBtn', function () {
                $(this).closest('.delete-specification-row').remove();
            });


            $("#manageSpecificationBox").on("click",function(){
                if(specification){
                    specification = false;
                    $("#specification-box").addClass('d-none');
                }else{
                    specification = true;
                    $("#specification-box").removeClass('d-none');
                }


            })

        });
    })(jQuery);

    function convertToSlug(Text){
            return Text
                .toLowerCase()
                .replace(/[^\w ]+/g,'')
                .replace(/ +/g,'-');
    }

    function previewThumnailImage(event) {
        var reader = new FileReader();
        reader.onload = function(){
            var output = document.getElementById('preview-img');
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    };
    
    function previewProductImages(event) {
    var output = document.getElementById('preview-images');
    output.innerHTML = ''; // Clear previous previews

    for (var i = 0; i < event.target.files.length; i++) {
        (function (file) {
            var reader = new FileReader();
            reader.onload = function () {
                var imgContainer = document.createElement('div');
                imgContainer.className = 'preview-image-container';

                var img = document.createElement('img');
                img.src = reader.result;
                img.className = 'preview-image';
                img.style.width = '70px'; // Set the width
                img.style.padding = '10px'; // Add padding

                var closeButton = document.createElement('span');
                closeButton.className = 'close-icon';
                closeButton.innerHTML = '&times;'; // Unicode for 'times' (cross) symbol

                closeButton.onclick = function () {
                    imgContainer.remove(); // Remove the image container when close button is clicked
                };

                imgContainer.appendChild(img);
                imgContainer.appendChild(closeButton);
                output.appendChild(imgContainer);
            };

            reader.readAsDataURL(file);
        })(event.target.files[i]);
    }
}

     // add moore
      

        $(document).on('click', "a.remove",function(e) {
            var whichtr = $(this).closest("tr");
            whichtr.remove();
        });

        $(document).on('blur', "input[name='sell_price']", function () {
            let sell_price = $(this).val();
            $("input.variable_sell_price").val(sell_price);
        });

        $(document).on('blur', '.dicount_amount', function(){

            let discount_amount=$(this).val();
            let new_price=0;
            var price=$("input[name='sell_price']").val();
            var discount_type=$("select[name='discount_type']").val();
            if (discount_type=='percentage') {
                new_price= (price / 100) * discount_amount;
                new_price=price - new_price;
            }else{
                new_price= price - discount_amount;
            }
            $("input[name='after_discount']").val(new_price.toFixed(2));
            $(".variable_dis_price").val(new_price.toFixed(2));
            $(".variable_dis_price_extra").val(12);
            // $(".variable_dis_price_extra").val(new_price.toFixed(2));
        });

</script>


@endsection
