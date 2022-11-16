@extends('layouts.dashboard')

@section('title')
    Detail Inbox
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('detail-inbox', $inbox) }}
@endsection

@section('content')
    <!-- content -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <!-- Name -->
                    <h3 class="my-1">
                        {{ $inbox->name }}
                    </h3>
                    <!-- Message -->
                    <p class="text-justify text-primary">
                        <strong>
                            <a class="badge badge-primary" href="https://mail.google.com/mail/u/0/#inbox?compose=new"
                                target="_blank">
                                {{ $inbox->email }}
                            </a>
                        </strong>
                    </p>
                    <!-- Message -->
                    <p class="text-justify">
                        {{ $inbox->message }}
                    </p>
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('dashboard.inbox') }}" class="btn btn-primary mx-1" role="button">
                            {{ trans('inbox.button.back.value') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
