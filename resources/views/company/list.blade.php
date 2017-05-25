@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">User List</div>

                <div class="panel-body">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Company name</th>
                        <th>Address</th>
                        <th>Tel</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($company_list as $company)
                      <tr>
                        <th>{{$loop->index+1}}</th>
                        <th>{{$company->name}}</th>
                        <th>{{$company->addr}}</th>
                        <th>{{$company->tel}}</th>
                        <th class="clearfix">
                          <a href="{{ route('company.edit', $company->id) }}"><button type="button" class="btn btn-primary btn-sm pull-left" style="margin-right:10px">Edit</button></a>
                          {!! Form::open(['route' => ['company.destroy',$company->id], 'class' => 'form-group pull-left delete-form', 'method' => 'DELETE'] ) !!}
                          <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                          {!! Form::close() !!}
                        </th>
                      </tr>
                      @endforeach
                    </tbody>
                    </table>
                    <div class="pull-right clearfix">
                      <a href="{{ route('company.create') }}"><button type="button" class="btn btn-primary">Add</button></a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
