<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Audit;
use App\Models\User;
use App\Models\AuditReport;
use App\Models\CertificationType;
use App\Models\AuditTracking;
use App\Models\AuditorWallet;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Auth;

class Dashboard extends Controller
{
    public function index(){
        $enquiry_list = [];
        $today_audit_list = [];
        $audit_assigned = 0;
        $audit_completed = 0;
        $wallet_amount = 0;
        $total_enquiry = 0;
        if(Auth::user()->hasRole('Super Admin')){
            $enquiry_list = Audit::whereDate('created_at',date('Y-m-d'))->orderBy('id','desc')->get();
        }elseif(Auth::user()->hasRole('Auditor')){
            $today_audit_list = Audit::whereDate('audit_date',date('Y-m-d'))->where('auditor_id',Auth::id())->orderBy('id','asc')->get();
            $enquiry_list = Audit::whereDate('created_at',date('Y-m-d'))->where('auditor_id',Auth::id())->orderBy('id','desc')->get();
            $audit_completed = Audit::where('auditor_id',Auth::id())->where('status','Complete')->count();
            $audit_assigned = Audit::where('auditor_id',Auth::id())->where('status','!=','Complete')->count();
            $wallet_amount = AuditorWallet::where('auditor_id', Auth::id())->value('amount') ?? 0;
        }else{
            $total_enquiry = Audit::where('user_id',Auth::id())->count();
        }

        return view('dashboard',compact('enquiry_list','today_audit_list','audit_completed','audit_assigned','wallet_amount','total_enquiry'));
    }
}