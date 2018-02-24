@extends('layouts.app')

@section('content')
            <div class="panel panel-default">
                <div class="panel-heading">Update your reply</div>

                <div class="panel-body">
                    <form action="{{ route('replies.update', ['id' => $reply->id]) }}" method="post">
                        
                        {{ csrf_field() }}
                        
                        <div class="form-group">
                            <label for="content">Edit reply below</label>
                            <textarea name="content" id="content" cols="6" rows="6" class="form-control">{{ $reply->content }}</textarea>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-succes pull-right" type="submit">Update reply</button>
                        </div>
                    </form>
                </div>
            </div>
@endsection
