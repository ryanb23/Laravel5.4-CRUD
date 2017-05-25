@extends('layouts.app')

@section('content')
<div class="container" id="user-contrller">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">User Create</div>

                <div class="panel-body">
                  {!! Form::open(['route' => ['company.update',$company->id], 'class' => 'form-group', 'method' => 'PATCH'] ) !!}
                    {{ csrf_field() }}
                    <div class="form-group">
                      <label for="name">Company Name</label>
                      <input type="text" class="form-control" name="name" id="name" value="{{$company->name}}">
                    </div>
                    <div class="form-group">
                      <label for="addr">Address</label>
                      <input type="text" class="form-control" name="addr" id="addr" value="{{$company->addr}}">
                    </div>
                    <div class="form-group">
                      <label for="tel">Tel</label>
                      <input type="text" class="form-control" name="tel" id="tel" value="{{$company->tel}}">
                    </div>
                    <div class="form-group clearfix">
                      <button type="submit" id="submit" class="btn btn-primary pull-right">Edit</button>
                      <a class="pull-left" href="{{ route('company.index')}}"><button type="button" class="btn btn-primary">Back</button></a>
                    </div>
                  {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
