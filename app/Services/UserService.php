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
        $updated = DB::table('users')->where('id','=', $id)->update(['roleId' => $newRoleId]);
        if($updated===0){
            return response()->json([
                'error' => "Неверен id пользователя:$id или id роли:$newRoleId",
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
