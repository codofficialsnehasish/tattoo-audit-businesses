@extends('layouts.app')
@section('title','Dashboard')
@section('content')

<div class="section-body">
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center">
            <div class="header-action">
                <h1 class="page-title">Dashboard</h1>
                <ol class="breadcrumb page-breadcrumb">
                    <li class="breadcrumb-item"><a href="#">{{ config('app.name', 'Laravel') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                </ol>
            </div>
            <ul class="nav nav-tabs page-header-tab">
                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#admin-Dashboard">Dashboard</a></li>
                {{-- <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#admin-Activity">Activity</a></li> --}}
            </ul>
        </div>
    </div>
</div>

@if(Auth::user()->hasRole('Super Admin'))
<div class="section-body mt-4">
    <div class="container-fluid">
        <div class="row clearfix row-deck">
            <div class="col-6 col-md-4 col-xl-3">
                <div class="card">
                    <div class="card-body ribbon">
                        <a href="{{ route('auditors.index') }}" class="my_sort_cut text-muted">
                            <i class="fa fa-black-tie"></i>
                            <span>Auditors</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-4 col-xl-3">
                <div class="card">
                    <div class="card-body ribbon">
                        <a href="{{ route('users.index') }}" class="my_sort_cut text-muted">
                            <i class="fa fa-users"></i>
                            <span>Users</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-4 col-xl-3">
                <div class="card">
                    <div class="card-body ribbon">
                        <a href="{{ route('audit.index') }}" class="my_sort_cut text-muted">
                            <i class="fa fa-list"></i>
                            <span>Pending Audit</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-4 col-xl-3">
                <div class="card">
                    <div class="card-body ribbon">
                        <a href="{{ route('audit.index') }}" class="my_sort_cut text-muted">
                            <i class="fa fa-check"></i>
                            <span>Completed Audit</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-content">
            <div class="tab-pane fade show active" id="admin-Dashboard" role="tabpanel">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Today Audit Enquiry List</h3>
                                <div class="card-options">
                                    <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                                    <a href="#" class="card-options-fullscreen" data-toggle="card-fullscreen"><i class="fe fe-maximize"></i></a>
                                    <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped mb-0 text-nowrap">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Name</th>
                                                <th>Auditor</th>
                                                <th>Date Of Audit</th>
                                                <th>Status</th>
                                                <th>Location</th>
                                                <th>Created At</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($enquiry_list as $enquiry)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $enquiry->user?->name }}</td>
                                                <td>{{ $enquiry->auditor?->name }}</td>
                                                <td>{{ format_datetime($enquiry->audit_date) }}</td>
                                                <td>
                                                    <span class="tag tag-success">{{ $enquiry->status }}</span>
                                                </td>
                                                <td>{{ $enquiry->user?->business?->business_address }}</td>
                                                <td>{{ format_datetime($enquiry->created_at) }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>  
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Start main footer -->
@endif

@if(Auth::user()->hasRole('Auditor'))
<div class="section-body mt-4">
    <div class="container-fluid">
        <div class="row clearfix row-deck">
            <div class="col-6 col-md-4 col-xl-4">
                <div class="card">
                    <div class="card-body ribbon">
                        <a href="{{ route('audit.index') }}" class="my_sort_cut text-muted">
                            <i class="fa fa-list"></i>
                            <span>Audit Assigned</span>
                            <span>{{ $audit_assigned }}</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-4 col-xl-4">
                <div class="card">
                    <div class="card-body ribbon">
                        <a href="{{ route('audit.index') }}" class="my_sort_cut text-muted">
                            <i class="fa fa-check"></i>
                            <span>Audit Completed</span>
                            <span>{{ $audit_completed }}</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-4 col-xl-4">
                <div class="card">
                    <div class="card-body ribbon">
                        <a href="{{ route('auditor.wallet.transactions') }}" class="my_sort_cut text-muted">
                            <i class="fa fa-money"></i>
                            <span>Wallet Amount</span>
                            <span>₹ {{ $wallet_amount }}</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-content">
            <div class="tab-pane fade show active" id="admin-Dashboard" role="tabpanel">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Today Audit List</h3>
                                <div class="card-options">
                                    <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                                    <a href="#" class="card-options-fullscreen" data-toggle="card-fullscreen"><i class="fe fe-maximize"></i></a>
                                    <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped mb-0 text-nowrap">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Name</th>
                                                <th>Auditor</th>
                                                <th>Date Of Audit</th>
                                                <th>Status</th>
                                                <th>Location</th>
                                                <th>Created At</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($today_audit_list as $today_audit)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $today_audit->user?->name }}</td>
                                                <td>{{ $today_audit->auditor?->name }}</td>
                                                <td>{{ format_datetime($today_audit->audit_date) }}</td>
                                                <td>
                                                    <span class="tag tag-success">{{ $today_audit->status }}</span>
                                                </td>
                                                <td>{{ $today_audit->user?->business?->business_address }}</td>
                                                <td>{{ format_datetime($today_audit->created_at) }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>  
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-content">
            <div class="tab-pane fade show active" id="admin-Dashboard" role="tabpanel">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Newly Assigned Audit List</h3>
                                <div class="card-options">
                                    <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                                    <a href="#" class="card-options-fullscreen" data-toggle="card-fullscreen"><i class="fe fe-maximize"></i></a>
                                    <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped mb-0 text-nowrap">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Name</th>
                                                <th>Auditor</th>
                                                <th>Date Of Audit</th>
                                                <th>Status</th>
                                                <th>Location</th>
                                                <th>Created At</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($enquiry_list as $today_audit)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $today_audit->user?->name }}</td>
                                                <td>{{ $today_audit->auditor?->name }}</td>
                                                <td>{{ format_datetime($today_audit->audit_date) }}</td>
                                                <td>
                                                    <span class="tag tag-success">{{ $today_audit->status }}</span>
                                                </td>
                                                <td>{{ $today_audit->user?->business?->business_address }}</td>
                                                <td>{{ format_datetime($today_audit->created_at) }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>  
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Start main footer -->
@endif

@if(Auth::user()->hasRole('User'))
<div class="section-body mt-4">
    <div class="container-fluid">
        <div class="row clearfix row-deck">
            <div class="col-6 col-md-4 col-xl-4">
                <div class="card">
                    <div class="card-body ribbon">
                        <a href="{{ route('audit.index') }}" class="my_sort_cut text-muted">
                            <i class="fa fa-list"></i>
                            <span>Total Enquiry</span>
                            <span>{{ $total_enquiry }}</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Start main footer -->
@endif

@endsection
