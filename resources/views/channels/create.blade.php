@extends('layouts.app')

@section('content')
            <div class="panel panel-default">
                <div class="panel-heading">Create new channel</div>

                <div class="panel-body">
                    <form action="{{ route('channels.store') }}" method="post">

                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="title">Channel's title</label>
                            <input type="text" class="form-control" name="title">
                        </div>
                        <div class="form-group text-center">
                            <input type="submit" class="btn btn-success" value="Store channel">
                        </div>
                    </form>
                </div>
            </div>
@endsection
