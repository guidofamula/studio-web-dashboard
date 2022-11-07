@extends('layouts.dashboard')

@section('title')
	{{ trans('roles.title.index') }}
@endsection

@section('breadcrumbs')
	{{ Breadcrumbs::render('dashboard-roles') }}
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
                  <form action="{{ route('roles.index') }}" method="GET">
                     <div class="input-group">
                        <input name="keyword" value="{{ request()->get('keyword') }}" type="search" class="form-control" placeholder="{{ trans('roles.form_control.input.search.placeholder') }}">
                        <div class="input-group-append">
                           <button class="btn btn-primary" type="submit">
                              <i class="fas fa-search"></i>
                           </button>
                        </div>
                     </div>
                  </form>
               </div>
               <div class="col-md-6">
                  {{-- Add new role --}}
                  <a href="{{ route('roles.create') }}" class="btn btn-primary float-right" role="button">
                     {{ trans('roles.button.create.value') }}
                     <i class="fas fa-plus-square"></i>
                  </a>
               </div>
            </div>
         </div>
         <div class="card-body">
            <ul class="list-group list-group-flush">
               <!-- list role -->
               @forelse ($roles as $role)
               	<li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center pr-0">
	               <label class="mt-auto mb-auto">
	                  <!-- Role name -->
	                  {{ $role->name }}
	                  </label>
	                  <div>
	                  	<!-- detail -->
								<a href="{{ route('roles.show', ['role' => $role]) }}" class="btn btn-sm btn-primary"
								   role="button">
								   <i class="fas fa-eye"></i>
								</a>
	                     <!-- edit -->
	                     <a href="{{ route('roles.edit', ['role' => $role]) }}" class="btn btn-sm btn-info" role="button">
	                        <i class="fas fa-edit"></i>
	                     </a>
	                     <!-- delete -->
                        <form class="d-inline" role="alert"
                            alert-text="{{ trans('roles.alert.delete.message.confirm', ['name' => $role->name]) }}"
                            action="{{ route('roles.destroy', ['role' => $role]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                              <button type="submit" class="btn btn-sm btn-danger">
                                <i class="fas fa-trash"></i>
                              </button>
                         </form>
	                  </div>
	               </li>
               @empty
               	{{-- empty expr --}}
               	<p>
               		<strong>
                        @if (request()->get('keyword'))
                  			{{ trans('roles.label.no_data.search', ['keyword' => request()->get('keyword') ]) }}
                        @else
                           {{ trans('roles.label.no_data.fetch') }}
                        @endif
               		</strong>
               	</p>
               @endforelse
                  
                     <!-- list role -->
            </ul>
         </div>
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
               title: "{{ trans('roles.alert.delete.title') }}",
               text: $(this).attr('alert-text'),
               icon: 'warning',
               allowOutsideClick: false,
               showCancelButton: true,
               cancelButtonText: "{{ trans('roles.button.cancel.value') }}",
               reverseButtons: true,
               confirmButtonText: "{{ trans('roles.button.delete.value') }}",
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