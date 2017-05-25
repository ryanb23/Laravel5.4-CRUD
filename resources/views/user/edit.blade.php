@extends('layouts.app')

@section('content')
<div class="container" id="user-contrller">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">User Create</div>

                <div class="panel-body">
                  {!! Form::open(['route' => ['user.update',$user->id], 'class' => 'form-group', 'method' => 'PATCH'] ) !!}
                    {{ csrf_field() }}
                    <div class="form-group">
                      <label for="name">Username</label>
                      <input type="text" class="form-control" name="name" id="name" value="{{$user->name}}" readonly>
                    </div>
                    <div class="form-group">
                      <label for="firstname">First Name</label>
                      <input type="text" class="form-control" name="firstname" id="firstname" value="{{$user->firstname}}" required>
                    </div>
                    <div class="form-group">
                      <label for="firstname">Last Name</label>
                      <input type="text" class="form-control" name="lastname" id="lastname" value="{{$user->lastname}}" required>
                    </div>
                    <div class="form-group">
                      <label for="firstname">Email</label>
                      <input type="email" class="form-control" name="email" id="email" value="{{$user->email}}" readonly>
                    </div>
                    <div class="form-group">
                      <label for="firstname">Password</label>
                      <input type="password" class="form-control" name="password" id="password"  value="">
                    </div>
                    <div class="form-group">
                      <label for="company">Company</label>
                      <select class="form-control" id="company" name="company_id">
                        @foreach($companies as $company)
                        <option @if($user->company_id == $company->id) selected @endif value="{{$company->id}}">{{$company->name}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="department">Department</label>
                      <select class="form-control" id="department" name="department_id">
                        @foreach($departments as $department)
                        <option @if($user->department_id == $department->id) selected @endif value="{{$department->id}}">{{$department->name}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="group">Group</label>
                      <select class="form-control" id="group" name="group_id">
                        @foreach($groups as $group)
                        <option @if($user->group_id == $group->id) selected @endif value="{{$group->id}}">{{$group->name}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="Role">Role</label>
                      <select class="form-control" id="role" name="role_id">
                        @foreach($roles as $role)
                        <option @if($user->role_id == $role->id) selected @endif value="{{$role->id}}">{{$role->name}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group clearfix">
                      <button type="submit" id="submit" class="btn btn-primary pull-right">Edit</button>
                      <a class="pull-left" href="{{ route('user.index')}}"><button type="button" class="btn btn-warning">Back</button></a>
                    </div>
                  {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
