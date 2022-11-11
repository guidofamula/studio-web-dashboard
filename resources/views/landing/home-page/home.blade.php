@extends('layouts.landing')

@section('title')
	Hallo
@endsection

@section('content')
{{-- Hero section start --}}
@include('landing.home-page.partials.hero')
{{-- Hero section end --}}

{{-- About section start --}}
@include('landing.home-page.partials.about')
{{-- About section end --}}

{{-- Portfolio section start --}}
@include('landing.home-page.partials.portfolio')
{{-- Portfolio section end --}}

{{-- Clients section start --}}
@include('landing.home-page.partials.clients')
{{-- Clients section end --}}

{{-- Posts section start --}}
@include('landing.home-page.partials.posts')
{{-- Posts section end --}}

{{-- Contact section start --}}
@include('landing.home-page.partials.contact')
{{-- Contact section end --}}

@endsection