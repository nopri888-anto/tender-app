<?php

namespace App\Http\Controllers\superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\DataCompany;
use App\Models\TenderModal;

class SuperAdminController extends Controller
{
    public function index()
    {
        return view('superadmin.index');
    }

    public function userApp()
    {
        $users = User::select('*')
            ->where(
                [
                    ['is_role', '!=', 3],
                ]

            )->get();
        return view('superadmin.user.index', compact('users'));
    }

    public function vendorApp()
    {
        $companys = DataCompany::all();
        return view('superadmin.vendor.index', compact('companys'));
    }

    public function tenderList()
    {
        $tenders = TenderModal::all();
        return view('superadmin.tender.index', compact('tenders'));
    }
}
