@extends('layouts.app')

@section('content')
            <div class="panel panel-default">
                <div class="panel-heading">Update discussion</div>

                <div class="panel-body">
                    <form action="{{ route('discussions.update', ['id' => $discussion->id]) }}" method="post">
                        
                        {{ csrf_field() }}
                        
                        <div class="form-group">
                            <label for="content">Edit your question</label>
                            <textarea name="content" id="content" cols="6" rows="6" class="form-control">{{ $discussion->content }}</textarea>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-succes pull-right" type="submit">Update discussion</button>
                        </div>
                    </form>
                </div>
            </div>
@endsection
