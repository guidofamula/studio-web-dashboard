@extends('layouts.dashboard')

@section('title')
    {{ trans('users.title.index') }}
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('dashboard-users') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            {{-- Form search --}}
                            <form action="" method="GET">
                                <div class="input-group">
                                    <input name="keyword" value="{{ request()->get('keyword') }}" type="search" class="form-control" placeholder="">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('users.create') }}" class="btn btn-primary float-right" role="button">
                                {{ trans('users.button.create.value') }}
                                <i class="fas fa-plus-square"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- list users -->
                        @include('users._users-list')
                    </div>
                </div>
                @if ($users->hasPages())
                    <div class="card-footer">
                        {{ $users->links('vendor.pagination.bootstrap-5') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@push('js-internal')
   <script>
      $(document).ready(function() {
         // Event for delete user
         $("form[role='alert']").submit(function(e) {
            e.preventDefault();
            Swal.fire({
               title: "{{ trans('users.alert.delete.title') }}",
               text: $(this).attr('alert-text'),
               icon: 'warning',
               allowOutsideClick: false,
               showCancelButton: true,
               cancelButtonText: "{{ trans('users.button.cancel.value') }}",
               reverseButtons: true,
               confirmButtonText: "{{ trans('users.button.delete.value') }}",
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
