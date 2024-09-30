@extends('admin.master_layout')
@section('title')
<title>PC Build</title>
@endsection
@section('admin-content')
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
            
            <div class="section-header">
                <h1>PC Build Category</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active">
                        <a href="{{ route('admin.dashboard') }}">{{__('admin.Dashboard')}}</a>
                    </div>
                    <div class="breadcrumb-item">PC Build</div>
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
                                                <th>{{__('admin.Name')}}</th>
                                              <th>Serial</th>
                                                <th>{{__('admin.Action')}}</th>
                                              </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($pcBuilders as $index => $pcbuild)
                                                <tr>
                                                    
                                                  	@if(!empty($pcbuild->category))
                                                    <td>{{ $pcbuild->category->name }}</td>
                                                    @elseif($pcbuild->sub_category)
                                                    <td>{{ $pcbuild->sub_category->name }}</td>
                                                    @else
                                                    <td></td>
                                                    @endif
                                                    
                                                  	<td>{{$pcbuild->serial}} </td>
                                                    <td>
                                                         <a href="{{ route('admin.edit_pcbuilders',[$pcbuild->id]) }}" class="btn btn-primary btn-sm edit_pcbuild"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                                        <a href="javascript:;" data-toggle="modal" data-target="#deleteModal" class="btn btn-danger btn-sm" onclick="deleteData({{ $pcbuild->id }})"><i class="fa fa-trash" aria-hidden="true"></i></a>
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
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                    <div class="modal-header">
                            <h5 class="modal-title">Build PC </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        
                        <form action="{{ route('admin.store-build-pc') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="">{{__('admin.Category')}}</label>
                                <select name="category_id" id="" class="form-control">
                                    <option value="">{{__('admin.Select')}}</option>
                                    @foreach ($allCategories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="">{{__('Serial')}}</label>
                                <input type="text" class="form-control" name="serial" placeholder="serial">
                            </div>
                            
                            <div class="form-group">
                                <input type="checkbox" id="is_required" name="is_required" placeholder="Is Required" />
                                <label for="is_required" style="padding-left: 3px;">{{__('Is Required')}}</label>
                            </div>

                            <button class="btn btn-primary" type="submit">{{__('admin.Save')}}</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
      </div>
      
      <div class="modal fade" id="edit_pcbuild" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
          
      </div>   
      
     
      

<script>
    function deleteData(id){
        $("#deleteForm").attr("action",'{{ url("admin/destroy-pc-build/") }}'+"/"+id)
    }
    
    $(document).on('click', 'a.edit_pcbuild', function(e){
        e.preventDefault();
        let url = $(this).attr('href');
        let method = 'GET';
        
        $.ajax({
            url : url,
            method : method,
            data : {},
            success : function (res) {
                if(res.success) {
                    $('div#edit_pcbuild').html(res.edit_data).modal('show');
                }
            }
        });
    });
    
</script>

@endsection
