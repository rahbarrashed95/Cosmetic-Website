<div class="card">
          <div class="card-heading">
             <h4>Track Your Order</h4>
          </div>
          <div class="card-body bio-graph-info">
              <div class="row">
                  <form action="{{ route('front.findTrack') }}" method="POST" enctype="multipart/form-data" id="findTrack">
                      @csrf
                    <div class="mb-3 row">
                        
                        <div class="col-md-6">
                            <label for="staticEmail" class="col-form-label">Enter Your Order Id</label>
                            <div class="">
                                <input type="text" class="form-control" name="order_id" value="">
                            </div>
                        </div>
                       
                        <div class="col-12">
                            <button type="submit" style="margin-top: 20px;background: #b9b9b9;color: #fff;" class="btn ">Submit</button>
                        </div>
                    </div>
                </form> 
              </div>
          </div>
      </div>
      
      <script>
          $(document).on('submit', 'form#findTrack', function(e){
      	e.preventDefault();
        let url = $(this).attr('action');
        let method = $(this).attr('method');
        let formData = new FormData(this);
        
        $.ajax({
          type:method,
          url:url,
          data:formData,
          processData: false, 
          contentType: false, 
          success: function(res)
          {
            if(res.status)
            {
                $('div.profile-info').html(res.track_order);
            }
            else{
                toastr.error(res.msg);
            }
          },
          error: function(response)
          {
            $.each(response.responseJSON.errors, function(name, error){
              $(document).find('[name='+name+']').closest('div').after('<span class="error text-danger">'+error+'</span>');
              toastr.error(error);
            });
          }
        });
  });
      </script>