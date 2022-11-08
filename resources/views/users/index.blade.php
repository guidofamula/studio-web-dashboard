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
                                    <input name="keyword" value="" type="search" class="form-control" placeholder="">
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
                <div class="card-footer">
                    <!-- Todo:paginate -->
                </div>
            </div>
        </div>
    </div>
@endsection