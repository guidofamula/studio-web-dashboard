@extends('layouts.dashboard')

@section('title')
    Inbox
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('dashboard-inbox') }}
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
                            <form action="{{ route('dashboard.inbox') }}" method="GET">
                                <div class="input-group">
                                    <input name="keyword" type="search" class="form-control"
                                        value="{{ request()->get('keyword') }}"
                                        placeholder="{{ trans('inbox.form_control.input.search.placeholder') }}">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        @if (count($inbox))
                            <!-- list category -->
                            @include('inbox._inbox-list')
                        @else
                            <p>
                                <strong>
                                    @if (request()->get('keyword'))
                                        {{ trans('inbox.label.no_data.search', ['keyword' => request()->get('keyword')]) }}
                                    @else
                                        {{ trans('inbox.label.no_data.fetch') }}
                                    @endif
                                </strong>
                            </p>
                        @endif
                    </ul>
                </div>
            </div>
            @if ($inbox->hasPages())
                <div class="card-footer">
                    {{ $inbox->links('vendor.pagination.bootstrap-5') }}
                </div>
            @endif
        </div>
    </div>

@endsection

@push('js-internal')
    <script>
        $(document).ready(function() {
            // Event delete inbox
            $("form[role='alert-delete']").submit(function(e) {
                e.preventDefault();
                Swal.fire({
                    title: $(this).attr('alert-title'),
                    text: $(this).attr('alert-text'),
                    icon: 'warning',
                    allowOutsideClick: false,
                    showCancelButton: true,
                    cancelButtonText: $(this).attr('alert-btn-cancel'),
                    reverseButtons: true,
                    confirmButtonText: $(this).attr('alert-btn-yes'),
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
