<?php

namespace App\Services;

use App\Models\AdminUser;

class StaffService{
    public function store(array $data){
        return AdminUser::create($data);
    }

    public function update(AdminUser $staff,array $data){
        return $staff->update($data);

    }
    public function delete(AdminUser $staff){
        $staff->delete();
    }
}