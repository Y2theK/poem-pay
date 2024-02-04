<?php

namespace App\Datatables\Contract;

use Illuminate\Database\Eloquent\Builder;

interface DatatableInterface{
    public function datatable(Builder $query);
}