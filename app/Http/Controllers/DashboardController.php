<?php

namespace App\Http\Controllers;
use App\Models\OrganizationModel;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
       public function showDashboard($subdomain){
        $organization=OrganizationModel::BySubdomain($subdomain)->firstOrFail();
        return view('dashboard',compact('organization'));
       }
}
