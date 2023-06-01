<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\Auth\ForgotPasswordController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\ResetPasswordController;
use App\Http\Controllers\Admin\EmailTemplateController;
use App\Http\Controllers\Admin\GeneralSettingController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\RolePermissionController;
use App\Http\Controllers\Admin\ManageSectionController;
use App\Http\Controllers\Admin\PagesController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\LoginController as AuthLoginController;
use App\Http\Controllers\Auth\AuthForgotPasswordController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\Admin\LanguageController;


/* ADMIN_ROUTE_START*/

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        return redirect()->route('admin.login');
    });

    Route::get('login', [LoginController::class, 'loginPage'])->name('login');
    Route::post('login', [LoginController::class, 'login']);
    Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.reset');
    Route::post('password/reset', [ForgotPasswordController::class, 'sendResetCodeEmail']);
    Route::post('password/verify-code', [ForgotPasswordController::class, 'verifyCode'])->name('password.verify.code');
    Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset.form');
    Route::post('password/reset/change', [ResetPasswordController::class, 'reset'])->name('password.change');

    Route::middleware('admin')->group(function () {

        // Role Permission
        Route::resource('roles', RolePermissionController::class);
        Route::get('roles/get-sub-module/{id}', [RolePermissionController::class, 'getsubmodule'])->name('getsubmodule');

        //Admin User 
        Route::prefix('admin/user')->group(function () {
            Route::get('list', [AdminController::class, 'index'])->name('index');
            Route::get('create', [AdminController::class, 'create'])->name('create');
            Route::post('store', [AdminController::class, 'store'])->name('store');
            Route::get('edit/{id}', [AdminController::class, 'edit'])->name('edit');
            Route::post('update/{id}', [AdminController::class, 'update'])->name('update');
            Route::delete('delete/{id}', [AdminController::class, 'destroy'])->name('destroy');
        });

        Route::get('multiple-delete', [AdminController::class, 'multiple'])->name('multiple');
        // GENERAL_ROUTE
        Route::get('dashboard', [HomeController::class, 'dashboard'])->name('home');
        Route::get('logout', [LoginController::class, 'logout'])->name('logout');
        Route::get('profile', [AdminController::class, 'profile'])->name('profile');
        Route::post('profile', [AdminController::class, 'profileUpdate'])->name('profile.update');
        Route::post('change/password', [AdminController::class, 'changePassword'])->name('change.password');
        Route::get('general/setting', [GeneralSettingController::class, 'index'])->name('general.setting');
        Route::post('general/setting', [GeneralSettingController::class, 'generalSettingUpdate']);


        Route::get('language', [LanguageController::class, 'index'])->name('language');
        Route::post('language', [LanguageController::class, 'store']);
        Route::post('language/edit/{id}', [LanguageController::class, 'update'])->name('language.edit');
        Route::post('language/delete/{id}', [LanguageController::class, 'delete'])->name('language.delete');
        Route::get('language/translator/{lang}', [LanguageController::class, 'transalate'])->name('language.translator');

        Route::post('language/translator/{lang}', [LanguageController::class, 'transalateUpate']);
        Route::get('language/import', [LanguageController::class, 'import'])->name('language.import');
        Route::get('changeLang', [LanguageController::class, 'changeLang'])->name('changeLang');



        Route::get('general/analytics', [GeneralSettingController::class, 'analytics'])->name('general.analytics');
        Route::post('general/analytics', [GeneralSettingController::class, 'analyticsUpdate']);

        Route::get('subscribers', [HomeController::class, 'subscribers'])->name('subscribers');

        Route::get('database', [GeneralSettingController::class, 'databaseBackup'])->name('general.database');
        Route::get('cacheclear', [GeneralSettingController::class, 'cacheClear'])->name('general.cacheclear');


        Route::get('email/config', [EmailTemplateController::class, 'emailConfig'])->name('email.config');
        Route::post('email/config', [EmailTemplateController::class, 'emailConfigUpdate']);
        Route::get('email/templates', [EmailTemplateController::class, 'emailTemplates'])->name('email.templates');
        Route::get('email/templates/{template}', [EmailTemplateController::class, 'emailTemplatesEdit'])->name('email.templates.edit');
        Route::post('email/templates/{template}', [EmailTemplateController::class, 'emailTemplatesUpdate']);
        Route::get('pages', [PagesController::class, 'index'])->name('frontend.pages');
        Route::get('pages/create', [PagesController::class, 'pageCreate'])->name('frontend.pages.create');
        Route::post('pages/create', [PagesController::class, 'pageInsert']);
        Route::get('pages/edit/{page}', [PagesController::class, 'pageEdit'])->name('frontend.pages.edit');
        Route::post('pages/edit/{page}', [PagesController::class, 'pageUpdate']);
        Route::get('pages/search', [PagesController::class, 'index'])->name('frontend.search');
        Route::post('pages/delete/{page}', [PagesController::class, 'pageDelete'])->name('frontend.pages.delete');
        Route::get('manage/section', [ManageSectionController::class, 'index'])->name('frontend.section');
        Route::get('manage/section/{name}', [ManageSectionController::class, 'section'])->name('frontend.section.manage');
        Route::get('manage/section_test/{name}', [ManageSectionController::class, 'section_test'])->name('frontend.section_test.manage');
        Route::post('manage/section/{name}', [ManageSectionController::class, 'sectionContentUpdate']);
        Route::get('manage/element/{name}', [ManageSectionController::class, 'sectionElement'])->name('frontend.element');
        Route::get('manage/element/{name}/search', [ManageSectionController::class, 'section'])->name('frontend.element.search');
        Route::post('manage/element/{name}', [ManageSectionController::class, 'sectionElementCreate']);
        Route::get('edit/{name}/element/{element}', [ManageSectionController::class, 'editElement'])->name('frontend.element.edit');
        Route::post('edit/{name}/element/{element}', [ManageSectionController::class, 'updateElement']);
        Route::post('delete/{name}/element/{element}', [ManageSectionController::class, 'deleteElement'])->name('frontend.element.delete');
        Route::get('send-email', [HomeController::class, 'sendEmail'])->name('sendEmail');
        Route::post('send-email', [HomeController::class, 'sendgroupEmail'])->name('sendgroupEmail');
        Route::get('users', [HomeController::class, 'user'])->name('user');
        Route::get('users/details/{user}', [HomeController::class, 'userDetails'])->name('user.details');
        Route::post('users/mail/{user}', [HomeController::class, 'sendUserMail'])->name('user.mail');
        Route::get('/mark-as-read', [HomeController::class, 'markNotification'])->name('markNotification');
    });
});
/* ADMIN_ROUTE_END*/


/*AUTH USER ROUTE*/
Route::name('user.')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('login', [AuthLoginController::class, 'index'])->name('login');
        Route::post('login', [AuthLoginController::class, 'login'])->name('login');

        Route::get('auth/google', [AuthLoginController::class, 'redirectToGoogle']);
        Route::get('auth/google/callback', [AuthLoginController::class, 'handleGoogleCallback']);

        //Facebook login
        Route::get('auth/facebook', [AuthLoginController::class, 'redirectToFacebook']);
        Route::get('auth/facebook/callback', [AuthLoginController::class, 'handleFacebookCallback']);


        Route::get('register', [AuthLoginController::class, 'register'])->name('register');
        Route::post('register', [AuthLoginController::class, 'registerStore'])->name('register.store');

        Route::get('forgot/password', [AuthForgotPasswordController::class, 'index'])->name('forgot.password');
        Route::post('forgot/password', [AuthForgotPasswordController::class, 'sendVerification'])->name('forgot.password.send');
        Route::get('verify/code', [AuthForgotPasswordController::class, 'verify'])->name('auth.verify');
        Route::post('verify/code', [AuthForgotPasswordController::class, 'verifyCode'])->name('auth.verify.post');
        Route::get('reset/password', [AuthForgotPasswordController::class, 'reset'])->name('reset.password');
        Route::post('reset/password', [AuthForgotPasswordController::class, 'resetPassword']);
    });

    Route::middleware(['auth'])->group(function () {
        Route::get('dashboard', [UserController::class, 'dashboard'])->name('dashboard');
        Route::get('profile', [UserController::class, 'profile'])->name('profile');
        Route::post('profile', [UserController::class, 'profileUpdate'])->name('profileupdate');
        Route::post('change-password', [UserController::class, 'passwordUpdate'])->name('updatePassword');
        Route::get('sign-out', [AuthLoginController::class, 'signOut'])->name('signout');
    });
});

/* AUTH USER ROUTE END */


/* FRONTEND_HOME_BASIC_ROUTE_START */

Route::get('/', [SiteController::class, 'index'])->name('home');
Route::get('{pages}', [SiteController::class, 'page'])->name('pages');

/* FRONTEND_HOME-BASIC_ROUTE_END */