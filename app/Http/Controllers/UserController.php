<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Company;
use App\Group;
use App\Role;
use App\Department;
use Validator;
use Illuminate\Support\Facades\Input;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_list = User::with('role','group','department','company')->get();
        $groups = Group::all();
        $roles = Role::all();
        $departments = Department::all();
        $param = [
          'user_list' => $user_list,
          'groups' => $groups,
          'roles' => $roles,
          'departments' => $departments,
        ];
        return view('user.list',$param);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $companies = Company::all();
      $groups = Group::all();
      $roles = Role::all();
      $departments = Department::all();
      $param = [
        'companies' => $companies,
        'groups' => $groups,
        'roles' => $roles,
        'departments' => $departments,
      ];
      return view('user.create',$param);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $validator = Validator::make($request->all(),
          [
              'name'                  => 'required|max:255|unique:users',
              'firstname'            => 'required',
              'lastname'             => 'required',
              'email'                 => 'required|email|max:255|unique:users',
              'password'                  => 'required',
              'company'                  => 'required',
              'department'                  => 'required',
              'group'                  => 'required',
              'role'                  => 'required'
          ]
        );

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        } else {

            $user =  User::create([
                'name'              => $request->input('name'),
                'firstname'        => $request->input('firstname'),
                'lastname'         => $request->input('lastname'),
                'email'             => $request->input('email'),
                'password'             => bcrypt($request->input('email')),
                'company_id'             => $request->input('company'),
                'department_id'             => $request->input('department'),
                'group_id'             => $request->input('group'),
                'role_id'             => $request->input('role'),
            ]);
            $user->save();
        }

        return redirect('user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = User::with('company','role','group','department')->find($id);
        $groups = Group::all();
        $companies = Company::all();
        $roles = Role::all();
        $departments = Department::all();
        $param = [
          'companies' => $companies,
          'user' => $user,
          'groups' => $groups,
          'roles' => $roles,
          'departments' => $departments,
        ];
        return view('user.edit',$param);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validator = Validator::make($request->all(),
            [
                'firstname'            => 'required',
                'lastname'             => 'required',
                'company_id'                  => 'required',
                'department_id'                  => 'required',
                'group_id'                  => 'required',
                'role_id'                  => 'required'
            ]
          );

          if ($validator->fails()) {
              $this->throwValidationException(
                  $request, $validator
              );
          } else {
              $input = Input::only('name', 'firstname', 'lastname', 'email','company_id', 'department_id', 'group_id', 'role_id');

              $user = User::find($id);
              $user->fill($input);
              $password = $request->input('password');
              if($password != '')
                $user->password = bcrypt($password);

              $user->save();
          }

          return redirect('user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect('user');
    }
}
