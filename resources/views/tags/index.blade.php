@extends('layouts.dashboard')

@section('title')
	{{ trans('tags.title.index') }}
@endsection

@section('breadcrumbs')
	{{ Breadcrumbs::render('dashboard-tags') }}
@endsection

@section('content')
	<!-- section:content -->
<div class="row">
   <div class="col-md-12">
      <div class="card">
         <div class="card-header">
           <div class="row">
               <div class="col-md-6">
               	{{-- Form search --}}
                  <form action="{{ route('tags.index') }}" method="GET">
                     <div class="input-group">
                        <input name="keyword" type="search" value="{{ request()->get('keyword') }}" class="form-control" placeholder="{{ trans('tags.form_control.input.search.placeholder') }}">
                        <div class="input-group-append">
                           <button class="btn btn-primary" type="submit">
                              <i class="fas fa-search"></i>
                           </button>
                        </div>
                     </div>
                  </form>

               </div>
               <div class="col-md-6">
                  @can('tag_create')
                     <a href="{{ route('tags.create') }}" class="btn btn-primary float-right" role="button">
                        {{ trans('tags.button.create.value') }}
                        <i class="fas fa-plus-square"></i>
                     </a>
                  @endcan
               </div>
            </div>
         </div>
         <div class="card-body">
            <ul class="list-group list-group-flush">
               <!-- list tag -->
               @if (count($tags))
               	@include('tags._tag-list')
               @else
               <p>
               	<strong>
                     @if (request()->get('keyword'))
                  		{{ trans('tags.label.no_data.search', ['keyword' => request()->get('keyword')]) }}
                     @else
                        {{ trans('tags.label.no_data.fetch') }}
                     @endif
               	</strong>
               </p>
               @endif
            </ul>
         </div>
         @if ($tags->hasPages())
            <div class="card-footer">
               {{ $tags->links('vendor.pagination.bootstrap-5') }}
            </div>
         @endif
      </div>
   </div>
</div>

@endsection

@push('js-internal')
   <script>
      $(document).ready(function() {
         // Event for delete tag
         $("form[role='alert']").submit(function(e) {
            e.preventDefault();
            Swal.fire({
               title: "{{ trans('tags.alert.delete.title') }}",
               text: $(this).attr('alert-text'),
               icon: 'warning',
               allowOutsideClick: false,
               showCancelButton: true,
               cancelButtonText: "{{ trans('tags.button.cancel.value') }}",
               reverseButtons: true,
               confirmButtonText: "{{ trans('tags.button.delete.value') }}",
            }).then((result) => {
               if (result.isConfirmed) {
                  // todo: process of deleting categories
                  e.target.submit();
               }
            });
         });
      });
   </script>
@endpush