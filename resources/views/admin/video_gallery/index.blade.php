@extends('admin.master_layout')
@section('title')
<title>Video Gallery</title>
@endsection
@section('admin-content')
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
            
            <div class="section-header">
                <h1>Video Gallery</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active">
                        <a href="{{ route('admin.dashboard') }}">{{__('admin.Dashboard')}}</a>
                    </div>
                    <div class="breadcrumb-item">Video Gallery</div>
                </div>
            </div>

            <div class="section-body">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modelId">
                   <i class="fa fa-plus" aria-hidden="true"></i> Add New
                  </button>
                <div class="row mt-4">
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                            <div class="card-body">
                                <div class="table-responsive table-invoice">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Image</th>
                                               
                                                <th>{{__('admin.Action')}}</th>
                                              </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($video_galleries as $index => $video_gallery)
                                                <tr>
                                                    <td> 
                                                        <img class="rounded-circle" src="{{ asset($video_gallery->thumb_img) }}" alt="" width="100px" height="100px">
                                                    </td>
                                                    <td>
                                                         <a href="{{ route('admin.video-gallery.edit', [$video_gallery->id]) }}" class="btn btn-primary btn-sm edit_video_gallery"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                                        <a href="javascript:;" data-toggle="modal" data-target="#deleteModal" class="btn btn-danger btn-sm" onclick="deleteData({{ $video_gallery->id }})"><i class="fa fa-trash" aria-hidden="true"></i></a>
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
            </div>
        </section>
      </div>

      <!-- Modal -->
      <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog  modal-lg" role="document">
            <div class="modal-content">
                    <div class="modal-header">
                            <h5 class="modal-title">Create Video Gallery</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        
                        <form action="{{ route('admin.video-gallery.store') }}" method="POST" enctype="multipart/form-data">

                            @csrf
                            
                            <div class="form-group">
                                <label for="">{{__('Video Url')}}</label>
                                <input type="text" class="form-control" name="video_url" placeholder="Video Url">
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
      </div>
      
      <div class="modal fade" id="edit_video_gallery" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
          
      </div>   
      
     
      

<script>
    
    function deleteData(id) {
        var url = '{{ route("admin.video-gallery.destroy", ":id") }}';
        url = url.replace(':id', id);
        $("#deleteForm").attr("action", url);
    }
    
    $(document).on('click', 'a.edit_video_gallery', function(e){
        
        e.preventDefault();
        let url = $(this).attr('href');
        let method = 'GET';
       
        $.ajax({
            url : url,
            method : method,
            data : {},
            success : function (res) {
                if(res.success) {
                    $('div#edit_video_gallery').html(res.video_gallery_data).modal('show');
                }
            }
        });
    });
    
    $(document).on('change','select#type_id',function(){
        let type_id = $(this).val();
        let url = "{{ route('admin.get_series',':type_id') }}";
        url = url.replace(':type_id', type_id);
        let method = 'GET';
        
        $.ajax({
            url    : url,
            method : method,
            data   : {},
            success : function(res){
                if(res.success){
                    $('select#series_id').html(res.series_data);
                }
            }
        });
    });
    
</script>

@endsection