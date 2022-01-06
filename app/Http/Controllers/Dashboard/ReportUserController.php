<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use App\Models\ReportProduct;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;


class ReportUserController extends Controller
{

    public function index(): view
    {
        $users = User::has('reports_user')->with('account')->withCount('reports_user')
        ->orderByDesc('reports_user_count')->get();
        return view('dashboard.report.user.index' , compact( 'users'));
    }

    public function show($id): view
    {
        $reportUser = User::with('account' , 'reports_user.reporter' , 'reports_user.reporter.account')
        ->findOrFail($id);
        return view('dashboard.report.user.show' , compact( 'reportUser'));
    }

}
