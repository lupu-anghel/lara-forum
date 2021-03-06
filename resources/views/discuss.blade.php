@extends('layouts.app')

@section('content')
            <div class="panel panel-default">
                <div class="panel-heading">Create a new discussion</div>

                <div class="panel-body">
                    <form action="{{ route('discussion.store') }}" method="post">
                        
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="channel_id">Select a channel</label>
                            <select name="channel_id" id="channel_id" class="form-control">

                                @foreach($channels as $channel)
                                    <option value="{{ $channel->id }}">{{ $channel->title }}</option>
                                @endforeach

                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="title">Topic title</label>
                            <input type="text" name="title" value="{{ old('title') }}" class="form-control">
                        </div>
                        
                        <div class="form-group">
                            <label for="content">Ask a question</label>
                            <textarea name="content" id="content" cols="6" rows="6" class="form-control">{{ old('content') }}</textarea>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-succes pull-right" type="submit">Create discussion</button>
                        </div>
                    </form>
                </div>
            </div>
@endsection
