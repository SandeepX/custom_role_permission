<?php

namespace App\Http\Controllers;


use App\Models\User;

class PermissionController extends Controller
{
    public function Permission()
    {
        $user = new User();

        $user = User::query()->find(1);
       //dd($user->hasRole('user'));
//        dd($user->givePermissionsTo('create'));
//        dd($user->can('create'));
      //  $permissions = $user->roles()->first()->permissions()->get();
//        dd($permissions);
     //  dd( $user->hasPermissionTo($permissions[0]));
//        dd($user->hasPermissionThroughRole($permissions));

        return redirect()->back();
    }
}
