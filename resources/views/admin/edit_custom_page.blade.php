@extends('admin.master_layout')
@section('title')
<title>{{__('admin.Custom Page')}}</title>
@endsection
@section('admin-content')
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>{{__('admin.Edit Custom Page')}}</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{__('admin.Dashboard')}}</a></div>
              <div class="breadcrumb-item active"><a href="{{ route('admin.custom-page.index') }}">{{__('admin.Custom Page')}}</a></div>
              <div class="breadcrumb-item">{{__('admin.Edit Custom Page')}}</div>
            </div>
          </div>

          <div class="section-body">
            <a href="{{ route('admin.custom-page.index') }}" class="btn btn-primary"><i class="fas fa-list"></i> {{__('admin.Custom Page')}}</a>
            <div class="row mt-4">
                <div class="col">
                  <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.custom-page.update',$customPage->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="form-group col-12">
                                    <label>{{__('admin.Page Name')}} <span class="text-danger">*</span></label>
                                    <input type="text" id="page_name" class="form-control"  name="page_name" value="{{ $customPage->page_name }}">
                                </div>
                                
                                <div class="form-group col-12">
                                    <label>{{__('Page Type')}} <span class="text-danger">*</span></label>
                                    <select name="type" class="form-control select2">
                                        
                                        <option value="">{{__('Select Type')}}</option>
                                        <option value="about-pastel" {{ $customPage->type == 'about-pastel' ? 'selected' : '' }} >About Pastel Beauty</option>
                                        <option value="privacy-policy" {{ $customPage->type == 'privacy-policy' ? 'selected' : '' }}>Privacy Policy</option>
                                        <option value="support" {{ $customPage->type == 'support' ? 'selected' : '' }}>Support</option>
                                        
                                    </select>
                                </div>
                                
                                <div class="form-group col-12">
                                    <label>{{__('admin.Slug')}} <span class="text-danger">*</span></label>
                                    <input type="text" id="slug" class="form-control"  name="slug" value="{{ $customPage->slug }}">
                                </div>

                                <div class="form-group col-12">
                                    <label>{{__('admin.Description')}} <span class="text-danger">*</span></label>
                                    <textarea name="description" cols="30" rows="10" class="summernote">{{ $customPage->description }}</textarea>
                                </div>

                                <div class="form-group col-12">
                                    <label>{{__('admin.Status')}} <span class="text-danger">*</span></label>
                                    <select name="status" class="form-control">
                                        <option {{ $customPage->status == 1 ? 'selected' : '' }} value="1">{{__('admin.Active')}}</option>
                                        <option {{ $customPage->status == 0 ? 'selected' : '' }} value="0">{{__('admin.Inactive')}}</option>
                                    </select>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <button class="btn btn-primary">{{__('admin.Update')}}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                  </div>
                </div>
          </div>
        </section>
      </div>

<script>
        (function($) {
            "use strict";
            $(document).ready(function () {
                $("#page_name").on("focusout",function(e){
                    $("#slug").val(convertToSlug($(this).val()));

                })
            });
        })(jQuery);

        function convertToSlug(Text)
            {
                return Text
                    .toLowerCase()
                    .replace(/[^\w ]+/g,'')
                    .replace(/ +/g,'-');
            }
    </script>
@endsection
