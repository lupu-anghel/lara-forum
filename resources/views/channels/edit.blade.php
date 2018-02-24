@extends('layouts.app')

@section('content')
            <div class="panel panel-default">
                <div class="panel-heading">Edit channel: {{ $channel->title }}</div>

                <div class="panel-body">
                    <form action="{{ route('channels.update', ['channel' => $channel->id]) }}" method="post">

                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="form-group">
                            <label for="title">Channel's title</label>
                            <input type="text" class="form-control" name="title" value="{{ $channel->title }}">
                        </div>
                        <div class="form-group text-center">
                            <input type="submit" class="btn btn-success" value="Update channel">
                        </div>
                    </form>
                </div>
            </div>
@endsection
