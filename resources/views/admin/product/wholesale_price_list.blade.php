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
    
    @media print {
        /* Hide the sidebar when printing */
        .main-sidebar {
            display: none !important;
        }
        .section-header {
            display: none !important;
        }
        .cat_section {
            display: none !important;
        }
        .main-footer {
            display: none !important;
        }
        /* Adjust the main content area to take full width */
        .main-content {
            width: 100% !important;
            margin-left: 0 !important;
        }
    }
    
    .top-area {
        /*display: flex;*/
        justify-content: center;
        text-align: center;
        margin: 20px 0;
    }

    
</style>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>{{__('admin.Products')}}</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{__('admin.Dashboard')}}</a></div>
              <div class="breadcrumb-item">{{__('Whoesale Price List')}}</div>
            </div>
          </div>

          <div class="section-body">
                <div class="row cat_section">
                    <div class="col-md-3">
                        <select name="category" class="form-control select2" id="category">
                            <option value="">{{__('admin.Select Category')}}</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button id="printTable" class="btn btn-primary">{{__('Print')}}</button>
                </div>  
                
                <div class="top-area">
        <div class="logo">
            <a href="https://www.startech.com.bd/">
                <img src="{{ asset(siteInfo()->logo) }}" alt="Star Tech Ltd " style="width: 26%;">
            </a>
        </div>
        <div class="company-info">
            <h1>Total Point Of Sale Solution</h1>
            <div class="address">
                <p style="margin-bottom: 0px;"><strong>Phone: </strong>{{ footerInfo()->phone }}, <strong>Email:</strong>{{ footerInfo()->email }}</p>
                <a href="https://dotmaxbd.com/">www.dotmaxbd.com</a>
                <p class="web">{{ footerInfo()->address }}</p>
            </div>
            <h1 style="width: 30%;margin: 0 auto;border: 1px solid #000;padding: 10px;">Price List</h1>
        </div>
    </div>
                
            <div class="row mt-4">
                <div class="col">
                  <div class="card">
                    <div class="card-body">
                      <div class="table-responsive table-invoice">
                        <table class="table table-bordered" id="">
                            <thead>
                                <tr>
                                    <th width="30%">{{__('Name')}}</th>
                                    <th width="10%">{{__('Model')}}</th>
                                    <th width="15%">{{__('MRP')}}</th>
                                    <th width="15%">{{__('Dealer Price')}}</th>
                                    <th width="15%">{{__('Image')}}</th>
                                  </tr>
                            </thead>
                            <tbody id="wholesale_data">
                                
                            </tbody>
                        </table>
                      </div>
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
        
    });
</script>

      
      
<script>
  
    
    $(document).on('change', '#category', function() {
        
        let category_id = $(this).val();
        let url = "{{ route('admin.retrive_wholesale_price',':category_id') }}";
        url = url.replace(':category_id', category_id);
        let method = 'GET';
        
        $.ajax({
            url    : url,
            method : method,
            data   :{},
            success : function(res){
                if(res.success){
                    $('tbody#wholesale_data').html(res.retrieve_price);
                }
            }
        });
        
    });
   
    $(document).on('change', '#category', function() {
        let category_id = $(this).val();
        let url = "{{ route('admin.retrive_wholesale_price',':category_id') }}";
        url = url.replace(':category_id', category_id);
        let method = 'GET';
        
        $.ajax({
            url    : url,
            method : method,
            data   :{},
            success : function(res){
                if(res.success){
                    $('tbody#wholesale_data').html(res.retrieve_price);
                }
            }
        });
    });

    // Print Functionality
    // $('#printTable').on('click', function() {
    //     // Create a new window for printing
    //     var printWindow = window.open('', '', 'height=600,width=800');
    //     printWindow.document.write('<html><head><title>{{__('Wholesale Price List')}}</title>');
    //     printWindow.document.write('<link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css" />'); // Link to your CSS for styling
    //     printWindow.document.write('</head><body >');
    //     printWindow.document.write('<h1>{{__('Wholesale Price List')}}</h1>'); // Add a title to the print page
    //     printWindow.document.write(document.getElementById('wholesale_data').outerHTML);
    //     printWindow.document.write('</body></html>');
    //     printWindow.document.close();
    //     printWindow.print();
    // });
    
    $('#printTable').on('click', function() {
        window.print();
    });

    
</script>
@endsection
