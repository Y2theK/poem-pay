<?php

namespace App\Services;

use App\Models\User;
use App\Models\Wallet;
use App\Helpers\UUIDGenerater;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserService{
    public function store(array $data){
        DB::beginTransaction();
        try {
            $user = User::create($data);

            Wallet::firstOrCreate(
                [
                    'user_id' => $user->id
                ],
                [
                    'account_number' => UUIDGenerater::accountNumber(),
                    'amount' => 0
                ]
            );

            DB::commit();
            return $user;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
    public function update(User $user,array $data){
        DB::beginTransaction();
        try {
           $user->update($data);

            Wallet::firstOrCreate(
                [
                    'user_id' => $user->id
                ],
                [
                    'account_number' => UUIDGenerater::accountNumber(),
                    'amount' => 0
                ]
            );

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
    public function delete(User $user){
        $user->wallet()->delete();
        return $user->delete();
    }
}