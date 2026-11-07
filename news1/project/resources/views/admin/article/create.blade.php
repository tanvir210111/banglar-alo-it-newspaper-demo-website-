@extends('layouts.admin')

@section('content')

<div class="content-area">
    <div class="mr-breadcrumb">
        <div class="row">
            <div class="col-lg-12">
                <h4 class="heading">{{ __('Add Articles') }}</h4>
                <ul class="links">
                    <li>
                        <a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }} </a>
                    </li>
                    <li>
                        <a href="{{ route('categories.index') }}">{{ __('Articles') }}</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    @include('includes.admin.form-both')
    <div class="gocover" style="background: url({{asset('assets/images/'.$gs->admin_loader)}}) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>
    <form id="geniusformdata2" action="{{ route('article.store')}}" method="POST" enctype="multipart/form-data">
           {{csrf_field()}}
    <input type="hidden" name="is_pending">
    <input type="hidden" name="post_type">
    <div class="row">
        <div class="col-lg-8">
            <div class="add-product-content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product-description">
                            <div class="body-area">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __('Language') }} *</h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <select name="language_id" id="article_language_id">
                                            <option value="">{{__('Please Select a Language')}}</option>
                                            @foreach ($languages as $language)
                                                <option value="{{$language->id}}">{{$language->language}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="left-area">
                                                <h4 class="heading">{{ __('Title') }} *</h4>
                                                <p class="sub-heading">{{ __('(In Any Language)') }}</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <input type="text" class="input-field" name="title"
                                                placeholder="{{ __('Title') }}" id="title" autocomplete="off">
                                        </div>
                                    </div>
        
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="left-area">
                                                <h4 class="heading">{{ __('Slug') }} *</h4>
                                                <p class="sub-heading">{{ __('In English') }}</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <input type="text" class="input-field" id="slug" name="slug"
                                                placeholder="{{ __('Slug') }}" value="">
                                                <p id="slugCheck"></p>
                                        </div>
                                    </div>


{{-- 🔹 Division --}}
                            <div class="row mt-3">
                                <div class="col-lg-12">
                                    <div class="left-area">
                                        <h4 class="heading">{{ __('Division') }} *</h4>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <select name="division_id" id="division_id" class="input-field">
                                        <option value="">{{ __('Select Division') }}</option>
                                        @foreach ($divisions as $division)
                                            <option value="{{ $division->id }}">{{ $division->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            {{-- 🔹 District --}}
                            <div class="row mt-3">
                                <div class="col-lg-12">
                                    <div class="left-area">
                                        <h4 class="heading">{{ __('District') }} *</h4>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <select name="district_id" id="district_id" class="input-field">
                                        <option value="">{{ __('Select District') }}</option>
                                    </select>
                                </div>
                            </div>

                            {{-- 🔹 Upazila --}}
                            <div class="row mt-3">
                                <div class="col-lg-12">
                                    <div class="left-area">
                                        <h4 class="heading">{{ __('Upazila') }} *</h4>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <select name="upazila_id" id="upazila_id" class="input-field">
                                        <option value="">{{ __('Select Upazila') }}</option>
                                    </select>
                                </div>
                            </div>


                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="left-area">
                                                <h4 class="heading">{{ __('Meta Keyword') }} *</h4>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <textarea class="input-field textarea" name="meta_tag" placeholder="{{__('Keyword meta tag')}}"></textarea>
                                        </div>
                                    </div>
									
									
									
									
									
									
									                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="left-area">
                                                <h4 class="heading">Images Caption *</h4>
                                                <p class="sub-heading">{{ __('(In Any Language)') }}</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <input type="text" class="input-field" name="images_caption"
                                                placeholder="{{ __('Images Cpation') }}" id="images_caption" autocomplete="off">
                                        </div>
                                    </div>
									
									
									
									
									
									
									
									                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="left-area">
                                                <h4 class="heading">{{ __('Short Description') }} *</h4>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <textarea class="input-field textarea" name="short_description" placeholder="{{__('Short Details')}}"></textarea>
                                        </div>
                                    </div>
									

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="left-area">
                                                <h4 class="heading">
                                                    {{__('Description')}} *
                                                </h4>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 description">
                                            <textarea class="nic-edit" name="description" placeholder="{{__('Description')}}" id="description"></textarea> 
                                        </div>
                                      </div>
                                    <br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
           <div class="row">
               <div class="col-lg-12">
                <div class="add-product-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="product-description">
                                <div class="body-area">
                                    <div class="row">
                                        <div class="col-lg-12">
                                          <div class="left-area">
                                              <h4 class="heading">{{__('Current Featured Image')}} *</h4>
                                          </div>
                                        </div>
                                        <div class="col-lg-12">
                                          <div class="img-upload custom-image-upload">
                                              <div id="image-preview" class="img-preview" style="background: url({{ asset('assets/admin/images/upload.png') }});">
                                                <label for="image-upload" class="img-label" id="image-label"><i class="icofont-upload-alt"></i>{{__('Upload')}}</label>
                                                  <input type="file" name="image_big" class="img-upload" id="image-upload">
                                              </div>
                                                <p class="text">{{__('Prefered Size: (600x600) or Square Sized Image')}}</p>
                                          </div>
                        
                                        </div>
                                    </div>



                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               </div>
           </div>
           <div class="row mt-4 categoryDiv" style="display:none;">
                <div class="col-lg-12">
                    <div class="add-product-content">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="product-description">
                                    <div class="body-area">

                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="left-area">
                                                    <h4 class="heading">{{ __('Category') }} *</h4>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <select name="category_id" id="article_parent_id">
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="left-area">
                                                    <h4 class="heading">{{ __('Sub Category') }} *</h4>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <select name="subcategories_id" id="subcategory_id">
                                                <option value="">{{__('Please add a subcategory(if any)')}}</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
           </div>

           <div class="row mt-4">
                <div class="col-lg-12">
                    <div class="add-product-content">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="product-description">
                                    <div class="body-area">  

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="left-area">
                                                    <h4 class="heading">{{ __('Add to Feature') }} *</h4>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                            <div class="custom-control custom-radio d-inline-block mr-5">
                                                <input type="radio" class="custom-control-input" id="is_feature1"  name="is_feature" value="1">
                                                <label class="custom-control-label" for="is_feature1">{{__('Yes')}}</label>
                                            </div>   
                                            <div class="custom-control custom-radio d-inline-block">
                                                <input type="radio" class="custom-control-input" id="is_feature2"  name="is_feature" value="0" checked>
                                                <label class="custom-control-label" for="is_feature2">{{__('No')}}</label>
                                            </div>   
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="left-area">
                                                    <h4 class="heading">{{ __('Add to Slider') }} *</h4>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">

                                            <div class="custom-control custom-radio d-inline-block mr-5">
                                                <input type="radio" class="custom-control-input" id="is_slider"  name="is_slider" value="1">
                                                <label class="custom-control-label" for="is_slider">{{__('Yes')}}</label>
                                            </div>  
                                            <div class="custom-control custom-radio d-inline-block mr-5">
                                                <input type="radio" class="custom-control-input" id="is_slider2"  name="is_slider" value="0" checked>
                                                <label class="custom-control-label" for="is_slider2">{{__('No')}}</label>
                                            </div>  

                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="left-area">
                                                    <h4 class="heading">{{ __('Slider Right Post') }} *</h4>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">

                                            <div class="custom-control custom-radio d-inline-block mr-5">
                                                <input type="radio" class="custom-control-input" id="slider_right"  name="slider_right" value="1">
                                                <label class="custom-control-label" for="slider_right">{{__('Yes')}}</label>
                                            </div>  

                                            <div class="custom-control custom-radio d-inline-block mr-5">
                                                <input type="radio" class="custom-control-input" id="slider_right2"  name="slider_right" value="0" checked>
                                                <label class="custom-control-label" for="slider_right2">{{__('No')}}</label>
                                            </div>  

                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="left-area">
                                                    <h4 class="heading">{{ __('Add to Trending News') }} *</h4>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">

                                                <div class="custom-control custom-radio d-inline-block mr-5">
                                                    <input type="radio" class="custom-control-input" id="is_trending" name="is_trending" value="1">
                                                    <label class="custom-control-label" for="is_trending">{{__('Yes')}}</label>
                                                </div>  

                                                <div class="custom-control custom-radio d-inline-block mr-5">
                                                    <input type="radio" class="custom-control-input" id="is_trending2" name="is_trending" value="0" checked>
                                                    <label class="custom-control-label" for="is_trending2">{{__('No')}}</label>
                                                </div>  

                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
           </div>
             
           <div class="row mt-4">
                <div class="col-lg-12">
                    <div class="add-product-content">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="product-description">
                                    <div class="body-area">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="left-area">
                                                    <h4 class="heading">{{ __('Schedule Post') }} *</h4>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <input type="checkbox" class="schedule" name="schedule_post" value="1">
                                            </div>
                                        </div>

                                        <div class="row datepick" style="display:none;">
                                            <div class="col-lg-12">
                                                <div class="left-area">
                                                    <h4 class="heading"></h4>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <input id="from" class="input-field" type="text" name="schedule_post_date" autocomplete="off" placeholder="{{__('Start Date')}}" required="" value="">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-12">
                                                
                                            </div>
                                            <div class="col-lg-12">
                                                <input type="submit" data-draft="1" class="btn btn-warning submit-btn1 saveAsDraft" value="Save as Drafts">
                                                <input type="submit" data-draft="0" class="btn btn-success submit-btn1 addPost" value="Add Post">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
           </div>  
        </div>
    </div>
</form>
</div>

<div class="modal fade-scale" id="setgallery" tabindex="-1" role="dialog" aria-labelledby="setgallery" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered  modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">{{ __('Image Gallery') }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="top-area">
                <div class="row">
                    <div class="col-sm-6 text-right">
                        <div class="upload-img-btn">
                            <label id="article_gallery"><i class="icofont-upload-alt"></i>{{ __('Upload File') }}</label>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <a href="javascript:;" class="upload-done" data-dismiss="modal"> <i class="fas fa-check"></i> {{ __('Done') }}</a>
                    </div>
                    <div class="col-sm-12 text-center">( <small>{{ __('You can upload multiple Images.') }}</small> )</div>
                </div>
            </div>
            <div class="gallery-images">
                <div class="selected-image">
                    <div class="row">


                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection


@section('scripts')
<script src="{{asset('assets/admin/js/page.js')}}"></script>
<script src="{{asset('assets/admin/js/articleCreate.js')}}"></script>
<script src="{{asset('assets/admin/js/tagify.js')}}"></script>
<script>
    $('.tags').tagify();
</script>

<script>
$(document).ready(function() {

    // 🔹 যখন ভাষা নির্বাচন করা হবে
    $('#article_language_id').on('change', function() {
        var lang_id = $(this).val();
        if(lang_id) {
            $.ajax({
                url: '/admin/get-divisions/' + lang_id,
                type: 'GET',
                success: function(data) {
                    $('#division_id').html(data);
                    $('#district_id').html('<option value="">Select District</option>');
                    $('#upazila_id').html('<option value="">Select Upazila</option>');
                }
            });
        } else {
            $('#division_id').html('<option value="">Select Division</option>');
            $('#district_id').html('<option value="">Select District</option>');
            $('#upazila_id').html('<option value="">Select Upazila</option>');
        }
    });

    // 🔹 Division অনুযায়ী District লোড
    $('#division_id').on('change', function() {
        var division_id = $(this).val();
        if(division_id) {
            $.ajax({
                url: '/admin/get-districts/' + division_id,
                type: 'GET',
                success: function(data) {
                    $('#district_id').html(data);
                    $('#upazila_id').html('<option value="">Select Upazila</option>');
                }
            });
        }
    });

    // 🔹 District অনুযায়ী Upazila লোড
    $('#district_id').on('change', function() {
        var district_id = $(this).val();
        if(district_id) {
            $.ajax({
                url: '/admin/get-upazilas/' + district_id,
                type: 'GET',
                success: function(data) {
                    $('#upazila_id').html(data);
                }
            });
        }
    });

});
</script>

@endsection
