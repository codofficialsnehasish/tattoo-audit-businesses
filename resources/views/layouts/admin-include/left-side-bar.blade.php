<div id="left-sidebar" class="sidebar">
    <h5 class="brand-name">{{ config('app.name', 'Laravel') }}<a href="javascript:void(0)" class="menu_option float-right"><i class="icon-grid font-16" data-toggle="tooltip" data-placement="left" title="Grid & List Toggle"></i></a></h5>
    <ul class="nav nav-tabs">
        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#menu-uni">Admin</a></li>
        {{-- <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#menu-admin">Admin</a></li> --}}
    </ul>
    <div class="tab-content mt-3">
        <div class="tab-pane fade show active" id="menu-uni" role="tabpanel">
            <nav class="sidebar-nav">
                <ul class="metismenu">
                    <li class="active"><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>
                    
                    @canany(['Permission Show', 'Role Show'])
                    <li>
                        <a href="javascript:;">
                            <i class="fa fa-lock"></i><span>Roles Permissions</span>
                        </a>
                        <ul>
                            @can('Role Show')
                            <li><a href="{{ route('roles') }}">Roles</a></li>
                            @endcan
                            @can('Permission Show')
                            <li><a href="{{ route('permission') }}">Permission</a></li>
                            @endcan
                        </ul>
                    </li>
                    @endcanany

                    {{-- @can('Auditor Show')
                    <li><a href="{{ route('auditors.index') }}"><i class="fa fa-black-tie"></i><span>Auditors</span></a></li>
                    @endcan

                    @can('Users Show')
                    <li><a href="{{ route('users.index') }}"><i class="fa fa-users"></i><span>Users</span></a></li>
                    @endcan --}}

                    @canany(['Auditor Show', 'Users Show', 'System User Show'])
                    <li>
                        <a href="javascript:;">
                            <i class="fa fa-users"></i><span>Users</span>
                        </a>
                        <ul>
                            @can('Auditor Show')
                            <li><a href="{{ route('auditors.index') }}">Auditors</a></li>
                            @endcan
                            @can('Users Show')
                            <li><a href="{{ route('users.index') }}">Business Users</a></li>
                            @endcan
                            @can('System User Show')
                            <li><a href="{{ route('system-user.index') }}">System Users</a></li>
                            @endcan
                        </ul>
                    </li>
                    @endcanany

                    @can('Audit Show')
                    <li><a href="{{ route('audit.index') }}"><i class="fa fa-file"></i><span>Audit Enquiry</span></a></li>
                    @endcan

                    @canany(['Certification Type Show', 'Business Category Show', 'Checklist Categorie Show'])
                    <li>
                        <a href="javascript:;">
                            <i class="fa fa-database"></i><span>Master Data</span>
                        </a>
                        <ul>
                            @can('Business Category Show')
                            <li><a href="{{ route('business-category.index') }}">Business Category</a></li>
                            @endcan
                            @can('Certification Type Show')
                            <li><a href="{{ route('certification-type.index') }}">Certification Type</a></li>
                            @endcan
                            @can('Checklist Categorie Show')
                            <li><a href="{{ route('checklist-categorie.index') }}">Checklist Categories</a></li>
                            @endcan
                        </ul>
                    </li>
                    @endcanany

                    @canany(['Blog Show', 'Blog Category Show'])
                    <li>
                        <a href="javascript:;">
                            <i class="fa fa-align-left"></i><span>Blogs</span>
                        </a>
                        <ul>
                            @can('Blog Category Show')
                            <li><a href="{{ route('blog-category.index') }}">Blog Category</a></li>
                            @endcan
                            @can('Blog Show')
                            <li><a href="{{ route('blog.index') }}">Blog</a></li>
                            @endcan
                        </ul>
                    </li>
                    @endcanany


                    @canany(['Lead Show'])
                    <li>
                        <a href="javascript:;">
                            <i class="fa fa-envelope"></i><span>Leades</span>
                        </a>
                        <ul>
                            @can('Lead Show')
                            <li><a href="{{ route('lead.index') }}">All Leades</a></li>
                            @endcan
                            @can('Lead Show')
                            <li><a href="{{ route('leads.new-leades') }}">New Leades</a></li>
                            @endcan
                        </ul>
                    </li>
                    @endcanany
                    
                    @canany(['Cource Show', 'Exams Show'])
                    <li>
                        <a href="javascript:;">
                            <i class="fa fa-align-left"></i><span>Cource & Exam</span>
                        </a>
                        <ul>
                            @can('Cource Show')
                            <li><a href="{{ route('cource.index') }}">Cource</a></li>
                            @endcan
                            @can('Exam Show')
                            <li><a href="{{ route('blog.index') }}">Exams</a></li>
                            @endcan
                        </ul>
                    </li>
                    @endcanany

                    {{-- for auditor wallet transaction --}}
                    @if(Auth::user()->hasRole('Auditor'))
                    <li>
                        <a href="javascript:;">
                            <i class="fa fa-money"></i><span>Wallet</span>
                        </a>
                        <ul>
                            <li><a href="{{ route('auditor.wallet.transactions') }}">Transaction</a></li>
                        </ul>
                    </li>
                    @endif

                </ul>
            </nav>
        </div>
    </div>
</div>