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
                        @foreach($settings as $setting)
                        <th>{{$setting->name}}</th>
                        @endforeach
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($user_list as $user)
                      <tr>
                        <th>{{$loop->index+1}}</th>
                        @foreach($settings as $setting)
                          @if($setting->name == 'user.name')
                          <th>{{$user->name}}</th>
                          @endif
                          @if($setting->name == 'user.email')
                          <th>{{$user->email}}</th>
                          @endif
                          @if($setting->name == 'company.name')
                          <th>{{$user->company->name}}</th>
                          @endif
                          @if($setting->name == 'company.tel')
                          <th>{{$user->company->tel}}</th>
                          @endif
                        @endforeach
                      </tr>
                      @endforeach
                    </tbody>
                    </table>
                    <div class="pull-right clearfix">
                      <a href="{{ route('origin.setting') }}"><button type="submit" class="btn btn-success">Setting</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
