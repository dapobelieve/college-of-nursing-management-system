<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Studentapplicant;
use App\Models\Paymentapplicant;
use App\Models\Payment;
use App\Models\Admin;
use App\Models\Lecturer;
use App\Models\Student;
use App\Models\Post;
use Carbon\Carbon;
use DB;

class DashboardController extends Controller
{
    public function index()
    {
          $startDate = Carbon::today('GMT+1')->subDays(8)->startOfDay();
          $startMonth = Carbon::today('GMT+1')->subMonths(5)->startOfMonth();

        // Get counts grouped by date for the last 8 days (excluding today)
        $applicantsPerDay = Studentapplicant::selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->where('created_at', '>=', $startDate)
            ->groupBy(DB::raw('DATE(created_at)'))
            ->orderBy('date')
            ->pluck('count', 'date');
            
        $getPaymentPerMonth = Payment::selectRaw("DATE_FORMAT(created_at, '%Y-%m') as month, SUM(amount) as total")
                            ->where('created_at', '>=', $startMonth)
                            ->groupBy('month')
                            ->orderBy('month')
                            ->pluck('total', 'month');
            
        // Build counts for each of the past 8 days to ensure 0s for missing days
        $usersPerDayCounts = [];
        foreach($applicantsPerDay as $value){
            $usersPerDayCounts[] = $value;
        }
        $perDay = implode(',', $usersPerDayCounts);
        
        $paymentPerMonth=[];
        foreach($getPaymentPerMonth as $key => $value){
            $date = Carbon::createFromFormat('Y-m', $key);
            $monthName = $date->format('F');
            $paymentPerMonth[$monthName] = $value;
        }
        
        
        
        //dd(json_encode($paymentPerMonth));
          return view('admin.index', [
            'section' => 'dashboard',
            'users' => Studentapplicant::all(),
            'students' => Student::all(),
            'activeStudents' => $students =  Student::join('users', 'users.id', '=', 'students.user_id')->where('is_active', 'ACTIVE')->get(),
            'admins' => Admin::all(),
            'userstoday' => Studentapplicant::where('created_at', '>=', Carbon::today('GMT+1'))->where('created_at', '<', Carbon::today('GMT+1')->addDays(1)->startOfDay()),
            'pay_made' => Payment::orderByDesc('created_at')->limit(7)->get(),
            'pay_app' => Paymentapplicant::orderByDesc('created_at')->limit(7)->get(),
            'posts' => Post::all(),
            'usersperday' => $perDay.",",
            'paymentPerMonth' => json_encode($paymentPerMonth)
        ]);
    }
}
