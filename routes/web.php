<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\{
    RoleController,
    PermissionController,
    AuditorsController,
    BusinessCategoryController,
    CertificationTypeController,
    UserController,
    AuditController,
    Dashboard,
    BlogCategoryController,
    BlogController,
    LeadController,
    SystemUserController,
    AuditorWalletTransactions,
    ChecklistCategorieController,
    ChecklistItemController,
    CourseController,
    CourseContentController,
};

use App\Http\Controllers\Site\{
    HomeController,
    RegistrationController,
    ContactUsController,
    WebBlogController,
    WebCertificateController,
    SiteCourseController,
    LessonController,
};


Route::get('/',[HomeController::class,'index'])->name('home');
Route::post('/newsletter-subscribe',[HomeController::class,'newsletter_subscribe'])->name('newsletter-subscribe');

Route::get('/about', function () {
    return view('site.about');
})->name('about');

Route::get('/certification',[WebCertificateController::class,'index'])->name('certificate');

Route::get('/blogs',[WebBlogController::class,'index'])->name('blogs');
Route::get('/blogs/{slug?}',[WebBlogController::class,'blog_details'])->name('blogs.details');

Route::get('/course',[SiteCourseController::class,'index'])->name('course');
Route::get('/course/details/{slug?}',[SiteCourseController::class,'course_details'])->name('course-details');

Route::get('/learn/{course_slug?}', [LessonController::class, 'learningPage'])->name('course.learn');


Route::get('registration',[RegistrationController::class,'registration'])->name('registration');
Route::post('registration',[RegistrationController::class,'register_user'])->name('register-user');

Route::get('contact',[ContactUsController::class,'index'])->name('contact');
Route::post('contact',[ContactUsController::class,'store'])->name('contact.store');

// Route::get('/', function () {
//     return redirect()->route('login');
// });


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard',[Dashboard::class,'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::controller(RoleController::class)->group(function () {
        Route::prefix('role')->group(function () {
            Route::get("/",'roles')->name('roles');
            Route::post("/create-role",'create_role')->name('role.create');
            Route::post("{roleId?}/update-role",'update_role')->name('role.update');
            Route::delete("/{roleId}/destroy-role",'destroy_role')->name('role.destroy');
            Route::get("/{roleId}/add-permission-to-role",'addPermissionToRole')->name('role.addPermissionToRole');
            Route::post("/{roleId}/give-permissions",'givePermissionToRole')->name('role.give-permissions');
        });
    });

    Route::controller(PermissionController::class)->group(function () {
        Route::prefix('permission')->group(function () {
            Route::get("/",'permission')->name('permission');
            Route::post("/create-permission",'create_permission')->name('permission.create');
            Route::post("{permissionId?}/update-permission",'update_permission')->name('permission.update');
            Route::delete("/{permissionId}/destroy-permission",'destroy_permission')->name('permission.destroy');
        });
    });

    Route::resource('auditors', AuditorsController::class);
    Route::get('auditors/{id}/id-card', [AuditorsController::class,'id_card'])->name('auditor.id-card');
    
    Route::resource('users', UserController::class);
    Route::resource('audit', AuditController::class);
    Route::get('audit/{id}/rollback-audit',[AuditController::class,'rollback_assign_audit'])->name('audit.rollback-assign');
    Route::post('audit/update-audit-status',[AuditController::class,'update_audit_status'])->name('audit.update-status');
    Route::get('audit/{id}/audit-report',[AuditController::class,'audit_report'])->name('audit.audit-report');
    Route::post('audit/{id}/upload-audit-report',[AuditController::class,'upload_audit_report'])->name('audit.upload-audit-report');
    Route::get('audit/{id}/audit-report-edit',[AuditController::class,'audit_report_edit'])->name('audit.audit-report-edit');
    Route::put('audit/{id}/update-upload-audit-report',[AuditController::class,'update_upload_audit_report'])->name('audit.update-upload-audit-report');
    Route::delete('audit/{id}/{fileId}/delete-audit-file',[AuditController::class,'delete_audit_file'])->name('audit.delete-audit-file');
    Route::delete('audit/{id}/delete-audit-report',[AuditController::class,'delete_audit_report'])->name('audit.delete-audit-report');
    Route::get('audit/{id}/approved-audit-report',[AuditController::class,'approved_audit_report'])->name('audit.approved-audit-report');
    Route::post('audit/get-specialization-auditors',[AuditController::class,'get_specialization_auditors'])->name('audit.get-specialization-auditors');
    

    Route::resource('business-category', BusinessCategoryController::class);
    Route::resource('certification-type', CertificationTypeController::class);
    Route::resource('checklist-categorie', ChecklistCategorieController::class);
    Route::resource('checklist-item', ChecklistItemController::class);

    Route::resource('blog-category', BlogCategoryController::class);
    Route::resource('blog', BlogController::class);

    Route::resource('lead', LeadController::class);
    Route::get('lead/new/leades',[LeadController::class, 'new_leades'])->name('leads.new-leades');
    Route::get('lead/import/leades',[LeadController::class, 'import_lead_page'])->name('leads.lead-import');
    Route::post('lead/import/leades/post',[LeadController::class, 'lead_import'])->name('leads.lead-import-post');
    
    Route::post('lead/add-followup-status',[LeadController::class, 'add_followup_status'])->name('leads.add-followup-status');

    Route::resource('system-user', SystemUserController::class);

    Route::get('auditor/wallet/transactions',[AuditorWalletTransactions::class,'transactions'])->name('auditor.wallet.transactions');

    Route::resource('cource', CourseController::class);

    Route::controller(CourseContentController::class)->group(function () {
        Route::prefix('cource-content')->name('cource-content.')->group(function () {
            Route::get("/{cource_id?}",'index')->name('index');
            Route::get("/{cource_id?}/create",'create')->name('create');
            Route::post("/store",'store')->name('store');
            Route::get("/{cource_id?}/{id}/edit",'edit')->name('edit');
            Route::put("/{id}/update",'update')->name('update');
            Route::delete("/{routeId}/delete",'destroy')->name('destroy');
            Route::post("/{routeId}/sort",'sort')->name('sort');
        });
    });
});

require __DIR__.'/auth.php';
