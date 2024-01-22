@extends('layouts.app')

@section('content')
<div>
    <div>
        @foreach ($categories as $category)
            <div>
                <p>{{$category->title}}</p>
            </div>
        @endforeach
    </div>
</div>
@endsection