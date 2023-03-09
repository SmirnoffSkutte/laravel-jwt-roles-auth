<?php

namespace App\Services;
use App\Models\Role;
use Illuminate\Support\Facades\DB;

class RoleService
{
    public static function createRole(string $name)
    {
        $newRole=new Role();
        $newRole->name=$name;
        $newRole->save();
    }

    public static function deleteRole(int $id)
    {
        $deleted = DB::table('roles')->where('id', '=', $id)->delete();
        if($deleted===0){
            return response()->json([
                'error' => "Роли с айди $id не найдено",
            ],404);
        }
        return $deleted;
    }

    public static function updateRole(int $id,string $newName)
    {
        $updated = DB::table('roles')->where('id','=', $id)->update(['name' => $newName]);
        if($updated===0){
            return response()->json([
                'error' => "Роли с айди $id не найдено",
            ],404);
        }
        return $updated;
    }

    public static function getOneRole(int $id)
    {
         $data=DB::table('roles')->find($id);
         if (!$data){
             return response()->json([
                 'error' => "Роли с айди $id не найдено",
             ],404);
         }
         return $data;
    }

    public static function getAllRoles()
    {
        return DB::table('roles')->get();
    }
}
