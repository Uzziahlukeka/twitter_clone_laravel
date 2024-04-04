@extends('layout.layout')

    @section('content')
    {{-- section doit avoir le mme nom que le yield car il dit de prendre tout son code et le place dans le yield  --}}

        <div class="row">
            <div class="col-3">
            @include('shared.left-sidebar')
            </div>
            <div class="col-6">
                @include('shared.success-message')
                <hr>

                <div class="mt-3">
                    @include('shared.idea-card')
                </div>

                <div class="mt-3">
                </div>
            </div>
            <div class="col-3">
            @include('shared.search-bar')
            @include('shared.follow-box')
        </div>

        @endsection
