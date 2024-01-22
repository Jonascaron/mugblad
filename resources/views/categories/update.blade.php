@extends('layouts.app')

@section('content')
<div>
    <div>
        <form action="/category/store" method="post">
            @csrf
            <div class="input-group">
                <input type="title" name="title" id="title" placeholder="{{ __('title') }}">
            </div>
            <div class="input-group">
                <button type="submit">{{ __('submit') }}</button>
            </div>
        </form>
    </div>
</div>
@endsection