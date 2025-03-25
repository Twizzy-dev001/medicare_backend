<?php

namespace App\Http\Controllers;
use App\Models\Role;
use App\Http\Controllers\Controller;
// use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Types\Relations\Role as RelationsRole;

class RolesController extends Controller
{
  public function index(){
    try{
        $roles =Role::all();

      if($roles->count()>0){
        return response()->json([$roles]);}
     else{
     return "No Role Was Found!";
        }
    }catch(\Exception $e){
        return response()->json(["Error"=>"Error Fetching Role"],500);
    }
 }
   public function createRole(Request $request){
    $validated = $request -> validate ([
        'name' => 'required|string|max:255|unique:roles',
        "slug"=> 'required|string|max:255|unique:roles',
        'description' => 'nullable|string|max:1000',

    ]);

    try{
        $role =Role::create($validated);

        if($role){
            return response()->json (["Created Role Successfully", $role], 201);
        }
        else{
            return "No Role Was Created";
        }
    }
    catch(\Exception $e){
        return response()->json(["Error"=>"Error Creating a Role"],500);
    }
   }
   public function getRole($id){

        $role = Role::findorFail($id);
        if($role->count()>0){
            return response()->json ([$role], 200);
            }
            else{
                return  "No Role Was Found for ID: `$id`";
        }

   }
    public function updateRole (Request $request, $id){
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:roles',
            'slug' => 'required|string|max:255|unique:roles',
            'description' => 'nullable|string|max:1000|',
            ]);
            $role = Role::findorFail($id);//role means role that is to be updated
            if($role) {
                $role->name = $request->name;
                $role->slug = $request->slug;
                $role->description = $request->description;


            try {
                $role = $role->save();
                if($role) {
          return response()->json([ $role], 200);
                    }
             else {
                 return "Role was not Updated ";
                 }
                }
             catch (\Exception $e) {
                 return response()->json(
                     ["Error Updating Role", `$e`], 401);
                     }
                     }
                    }


        public function deleteRole($id){
            $role = Role::findorFail($id);

                if($role){
                $role = Role::destroy($id);
                try{
                if($role){
                    $role = Role::destroy($id);
                return  'Role Deleted Successfully';
                }
                else{
                    return "Role Was not deleted";
                }
                }
                catch(\Exception $e){
                    return response()->json(["Error"=>"Error Deleting Role"],500);
                }
        }
   }
}
