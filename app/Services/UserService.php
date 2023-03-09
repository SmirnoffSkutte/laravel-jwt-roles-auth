<?php

namespace App\Services;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserService
{
    public static function deleteUser(int $id)
    {
        $deleted = DB::table('users')->where('id', '=', $id)->delete();
        if($deleted===0){
            return response()->json([
                'error' => "Пользователя с айди $id не найдено",
            ],404);
        }
        return $deleted;
    }

    public static function updateUserRole(int $id,int $newRoleId)
    {
        $isRole=DB::table('roles')->find($newRoleId);
        if(!$isRole){
            return response()->json([
                'error' => "Роли с таким id:$newRoleId не существует",
            ],404);
        }
        $updated = DB::table('users')->where('id','=', $id)->update(['roleId' => $newRoleId]);
        if($updated===0){
            return response()->json([
                'error' => "Пользователя с таким id:$id не существует",
            ],404);
        }
        return $updated;
    }

    public static function getOneUser(int $id)
    {
        $data=DB::table('users')->find($id);
        if(!$data){
            return response()->json([
                'error' => "Пользователя с айди $id не найдено",
            ],404);
        }
        return $data;
    }

    public static function getAllUsers()
    {
        return DB::table('users')->get();
    }
}
