@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-xs-6">
                <h2>TimeLine</h2>
                {!! $timelinemicroposts->render() !!}
                @if (count($timelinemicroposts) > 0)
                    @include('microposts.microposts', ['microposts' => $timelinemicroposts])
                @endif
            </div>
            <div class="col-xs-6">
                <h2>FavoritePosts</h2>
                {!! $favoritemicroposts->render() !!}
                @if (count($favoritemicroposts) > 0)
                    @include('microposts.microposts', ['microposts' => $favoritemicroposts])
                @endif
            </div>
        </div>
@endsection