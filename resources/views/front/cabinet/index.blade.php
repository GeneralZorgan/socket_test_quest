@extends('layouts.cabinet')

@section('content')
    <div class="container-sm py-5">
        <div class="row">
            <div class="col-8">
                @include('front.cabinet.parts.notification_form')
            </div>
            <div class="col-4">
                @include('front.cabinet.parts.notifications_list')
            </div>
        </div>
    </div>
@endsection
