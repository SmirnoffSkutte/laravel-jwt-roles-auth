<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function updateUserRole(int $userId,int $newRoleId)
    {
        return UserService::updateUserRole($userId,$newRoleId);
    }

    public function deleteUser(int $userId)
    {
        return UserService::deleteUser($userId);
    }

    public function getUser(int $userId)
    {
        return UserService::getOneUser($userId);
    }

    public function getAllUsers()
    {
        return UserService::getAllUsers();
    }
}
