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
                  <form action="" method="GET">
                     <div class="input-group">
                        <input name="keyword" type="search" class="form-control" placeholder="{{ trans('tags.form_control.input.search.placeholder') }}">
                        <div class="input-group-append">
                           <button class="btn btn-primary" type="submit">
                              <i class="fas fa-search"></i>
                           </button>
                        </div>
                     </div>
                  </form>

               </div>
               <div class="col-md-6">
                  <a href="#" class="btn btn-primary float-right" role="button">
                     {{ trans('tags.button.create.value') }}
                     <i class="fas fa-plus-square"></i>
                  </a>
               </div>
            </div>
         </div>
         <div class="card-body">
            <ul class="list-group list-group-flush">
               <!-- list tag -->
            </ul>
         </div>
      </div>
   </div>
</div>

@endsection