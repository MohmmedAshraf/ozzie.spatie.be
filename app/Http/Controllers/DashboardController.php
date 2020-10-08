<?php

namespace App\Http\Controllers;

use App\Projects;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    public function show()
    {
        $hacktoberfest = (bool) Carbon::now()->isSameMonth(Carbon::parse('October'));

        return view('dashboard', [
            'projects' => (new Projects)->all()->filter->debtScore(),
            'hacktoberfest' => $hacktoberfest,
        ]);
    }
}
