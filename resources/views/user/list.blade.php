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
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Department</th>
                        <th>Group</th>
                        <th>Role</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($user_list as $user)
                      <tr>
                        <th>{{$loop->index+1}}</th>
                        <th>{{$user->firstname}}</th>
                        <th>{{$user->lastname}}</th>
                        <th>{{$user->email}}</th>
                        <th>{{$user->department->name}}</th>
                        <th>{{$user->group->name}}</th>
                        <th>{{$user->role->name}}</th>
                        <th class="clearfix">
                          <a href="{{ route('user.edit', $user->id) }}"><button type="button" class="btn btn-primary btn-sm pull-left" style="margin-right:10px">Edit</button></a>
                          {!! Form::open(['route' => ['user.destroy',$user->id], 'class' => 'form-group pull-left delete-form', 'method' => 'DELETE'] ) !!}
                          <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                          {!! Form::close() !!}
                        </th>
                      </tr>
                      @endforeach
                    </tbody>
                    </table>
                    <div class="pull-right clearfix">
                      <a href="{{ route('user.create') }}"><button type="button" id="new-user" class="btn btn-primary">Create</button></a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
