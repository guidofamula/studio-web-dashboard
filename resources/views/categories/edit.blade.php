@extends('layouts.dashboard')

@section('title')
	{{ trans('categories.title.edit') }}
@endsection

@section('breadcrumbs')
	{{ Breadcrumbs::render('edit-category-title', $category) }}
@endsection

@section('content')
	<div class="row">
    <div class="col-md-12">
       <div class="card">
          <div class="card-body">
             <form action="{{ route('categories.update', ['category' => $category]) }}" method="POST" enctype="multipart/form-data">
               @method('PUT')
               @csrf
                <!-- title -->
                <div class="form-group">
                   <label for="input_category_title" class="font-weight-bold">
                      {{ trans('categories.form_control.input.title.label') }}
                   </label>
                   <input id="input_category_title" value="{{ old('title', $category->title) }}" name="title" type="text" class="form-control @error('title') is-invalid @enderror" placeholder="{{ trans('categories.form_control.input.title.placeholder') }}" />
                   @error('title')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                   @enderror
                </div>
                <!-- slug -->
                <div class="form-group">
                   <label for="input_category_slug" class="font-weight-bold">
                      {{ trans('categories.form_control.input.slug.label') }}
                   </label>
                   <input id="input_category_slug" value="{{ old('slug', $category->slug) }}" name="slug" type="text" class="form-control @error('slug') is-invalid @enderror" placeholder="{{ trans('categories.form_control.input.slug.placeholder') }}" readonly />
                   @error('slug')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                   @enderror
                </div>
                <!-- thumbnail -->
                <div class="form-group">
                   <label for="input_category_thumbnail" class="font-weight-bold">
                      {{ trans('categories.form_control.input.thumbnail.label') }}
                   </label>
                   <div class="input-group">
                      <div class="input-group-prepend">
                         <button id="button_category_thumbnail" data-preview="holder" data-input="input_category_thumbnail" class="btn btn-primary" type="button">
                            {{ trans('categories.button.browse.value') }}
                         </button>
                      </div>
                      <input id="input_category_thumbnail" name="thumbnail" value="{{ old('thumbnail', asset($category->thumbnail)) }}" type="text" class="form-control @error('thumbnail') is-invalid @enderror" placeholder="{{ trans('categories.form_control.input.thumbnail.placeholder') }}"
                         readonly />
                         @error('thumbnail')
                           <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                           </span>
                        @enderror
                   </div>
                </div>
                {{-- Data Preview thumbnail --}}
                <div id="holder">
                   
                </div>
                <!-- description -->
                <div class="form-group">
                   <label for="input_category_description" class="font-weight-bold">
                      {{ trans('categories.form_control.textarea.description.label') }}
                   </label>
                   <textarea id="input_category_description" name="description" class="form-control @error('description') is-invalid @enderror" rows="3" placeholder="{{ trans('categories.form_control.textarea.description.placeholder') }}">{{ old('description', $category->description) }}</textarea>
                   @error('description')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                   @enderror
                </div>
                <div class="float-right">
                	<a class="btn btn-warning px-4" href="{{ route('categories.index') }}">
                		{{ trans('categories.button.back.value') }}
                	</a>
                	<button type="submit" class="btn btn-primary px-4">
                		{{ trans('categories.button.edit.value') }}
                	</button>
                </div>                
             </form>
          </div>
       </div>
    </div>
 </div>

@endsection

@push('css-external')
   <link rel="stylesheet" href="{{ asset('vendor/select2/css/select2.min.css') }}">
   <link rel="stylesheet" href="{{ asset('vendor/select2/css/select2-bootstrap4.min.css') }}">
@endpush

@push('js-external')
   <script src="{{ asset('vendor/select2/js/select2.min.js') }}"></script>
   <script src="{{ asset('vendor/select2/js/i18n/' . app()->getLocale() . '.js') }}"></script>
   {{-- JS for file manager --}}
   <script src="{{ asset('vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
@endpush

@push('js-internal')
   <script>
   $(function() {
      // Script untuk perolehan slug
      function generateSlug(value){
           return value.trim()
            .toLowerCase()
            .replace(/[^a-z\d-]/gi, '-')
            .replace(/-+/g, '-').replace(/^-|-$/g, "");
      } 
      
      // event untuk input title categoty agar otomatis slug
      $('#input_category_title').change(function() {
         let title = $(this).val();
         // instance input title dan select parent category
         let category = $('#select_category').val() ?? "";
         // Lakukan kombinasi title dan parent category
         $('#input_category_slug').val(generateSlug(title + " " + category));
      });

      // Event thumbnail
      $('#button_category_thumbnail').filemanager('image');


   });
   </script>
@endpush