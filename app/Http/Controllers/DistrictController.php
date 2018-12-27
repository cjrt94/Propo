<?php

namespace Propo\Http\Controllers;

use Illuminate\Http\Request;
use Propo\Province;

class DistrictController extends Controller
{
   public function getDistricts(Province $province)  {
       return $province->districts()->get();
   }
}
