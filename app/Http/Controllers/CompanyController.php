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

class CompanyController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      $company_list = Company::all();
      $param = [
        'company_list' => $company_list
      ];
      return view('company.list',$param);
  }

  public function create($value='')
  {
      $param = [
      ];
      return view('company.create',$param);
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
            'name'                  => 'required|max:255|unique:companies',
        ]
      );

      if ($validator->fails()) {
          $this->throwValidationException(
              $request, $validator
          );
      } else {

          $user =  Company::create([
              'name'              => $request->input('name'),
              'addr'        => $request->input('addr'),
              'tel'         => $request->input('tel'),
          ]);
          $user->save();
      }

      return redirect('company');
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
      $company = Company::find($id);
      $param = [
        'company' => $company,
      ];
      return view('company.edit',$param);
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
              'name'            => 'required|max:255|unique:companies',
          ]
        );

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        } else {
            $input = Input::only('name', 'addr', 'tel');
            $company = Company::find($id);
            $company->fill($input);
            $company->save();
        }

        return redirect('company');
  }
  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
      Company::find($id)->delete();
      return redirect('company');
  }
}
