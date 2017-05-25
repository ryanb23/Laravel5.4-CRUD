@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Setting List</div>

                <div class="panel-body">
                  {!! Form::open(['route' => 'origin.update', 'class' => 'form-group', 'method' => 'POST'] ) !!}
                  {{ csrf_field() }}
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Slug</th>
                        <th>Order</th>
                        <th>Active</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($settings as $setting)
                      <tr>
                        <th>{{$loop->index+1}}</th>
                        <th>{{$setting->name}}</th>
                        <th><input type="text" name="order[]" value="{{$setting->order}}" required></th>
                        <th><input type="checkbox" name="active[]" value="{{$setting->id}}" @if($setting->active) checked @endif>
                          <input type="hidden" name="id[]" value="{{$setting->id}}">
                        </th>
                      </tr>
                      @endforeach
                    </tbody>
                    </table>
                    <div class="clearfix">
                      <a class="pull-left" href="{{ route('origin.index') }}"><button type="button" class="btn btn-warning">Back</button></a>
                      <button type="submit" class="btn btn-success pull-right">Update</button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
