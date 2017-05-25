@extends('layouts.app')

@section('content')
<div class="container" id="user-contrller">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">User Create</div>

                <div class="panel-body">
                  {!! Form::open(['route' => 'user.store', 'class' => 'form-group', 'method' => 'POST'] ) !!}
                    {{ csrf_field() }}
                    <div class="form-group">
                      <label for="name">Username</label>
                      <input type="text" class="form-control" name="name" id="name" required>
                    </div>
                    <div class="form-group">
                      <label for="firstname">First Name</label>
                      <input type="text" class="form-control" name="firstname" id="firstname" required>
                    </div>
                    <div class="form-group">
                      <label for="firstname">Last Name</label>
                      <input type="text" class="form-control" name="lastname" id="lastname" required>
                    </div>
                    <div class="form-group">
                      <label for="firstname">Email</label>
                      <input type="email" class="form-control" name="email" id="email" required>
                    </div>
                    <div class="form-group">
                      <label for="firstname">Password</label>
                      <input type="password" class="form-control" name="password" id="password" required>
                    </div>
                    <div class="form-group">
                      <label for="company">Company</label>
                      <select class="form-control" id="company" name="company">
                        @foreach($companies as $company)
                        <option value="{{$company->id}}">{{$company->name}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="department">Department</label>
                      <select class="form-control" id="department" name="department">
                        @foreach($departments as $department)
                        <option value="{{$department->id}}">{{$department->name}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="group">Group</label>
                      <select class="form-control" id="group" name="group">
                        @foreach($groups as $group)
                        <option value="{{$group->id}}">{{$group->name}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="Role">Role</label>
                      <select class="form-control" id="role" name="role">
                        @foreach($roles as $role)
                        <option value="{{$role->id}}">{{$role->name}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group clearfix">
                      <button type="submit" id="submit" class="btn btn-primary pull-right">Register</button>
                      <a class="pull-left" href="{{ route('user.index')}}"><button type="button" class="btn btn-warning">Back</button></a>
                    </div>
                  {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
