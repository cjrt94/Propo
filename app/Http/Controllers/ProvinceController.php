<?php

namespace Propo\Http\Controllers;

use Illuminate\Http\Request;
use Propo\Department;

class ProvinceController extends Controller
{
    public function getProvinces(Department $department) {

        return $department->provinces()->get();

    }
}
