<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\FeatureController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\EducationController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\ExperienceController;
use App\Http\Controllers\Admin\PricingController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\ContactDetailsController;
use App\Http\Controllers\Admin\MasterControlController;
use App\Http\Controllers\Web\HomepageController;
use App\Http\Controllers\Auth\ForgetPasswordController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::post('adminAuth',[LoginController::class,'authAdmin']);
Route::get('/',[HomepageController::class,'index']);
Route::get('/portfolio-details/{id}',[HomepageController::class,'portfolioView']);
Route::post('contactUs',[ContactController::class,'index']);
Route::post('portfolioData',[PortfolioController::class,'portfolioData']);

//user forget password
Route::get('forget-password', [ForgetPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgetPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
Route::get('reset-password/{token}', [ForgetPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgetPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

//Admin ROUTES STARTS
Route::group(['middleware'=>['IsAdmin']],function()
{
    Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard');

    //SLIDER ROUTES 
    Route::get('slider/create',[SliderController::class,'index']);
    Route::post('slider/add',[SliderController::class,'add']);

    //FEATURES ROUTES 
    Route::get('feature/create',[FeatureController::class,'index']);
    Route::post('feature/add',[FeatureController::class,'add']);
    Route::get('feature/view',[FeatureController::class,'view']);
    Route::get('feature/view-in-details/{id}',[FeatureController::class,'viewDetails']);
    Route::get('feature/edit/{id}',[FeatureController::class,'edit']);
    Route::post('feature/update/{id}',[FeatureController::class,'update']);
    Route::get('feature/delete/{id}',[FeatureController::class,'destroy']);

    //PORTFOLIO ROUTES 
    Route::get('portfolio/create',[PortfolioController::class,'index']);
    Route::post('portfolio/add',[PortfolioController::class,'add']);
    Route::get('portfolio/view',[PortfolioController::class,'view']);
    Route::get('portfolio/view-in-details/{id}',[PortfolioController::class,'viewDetails']);
    Route::get('portfolio/edit/{id}',[PortfolioController::class,'edit']);
    Route::post('portfolio/update/{id}',[PortfolioController::class,'update']);
    Route::get('portfolio/delete/{id}',[PortfolioController::class,'destroy']);
    Route::get('portfolio/status/{id}',[PortfolioController::class,'status']);

    //EDUCATION ROUTES 
    Route::get('education/create',[EducationController::class,'index']);
    Route::post('education/add',[EducationController::class,'add']);
    Route::get('education/view',[EducationController::class,'view']);
    Route::get('education/view-in-details/{id}',[EducationController::class,'viewDetails']);
    Route::get('education/edit/{id}',[EducationController::class,'edit']);
    Route::post('education/update/{id}',[EducationController::class,'update']);
    Route::get('education/delete/{id}',[EducationController::class,'destroy']);

    //SKILL ROUTES 
    Route::get('skill/create',[SkillController::class,'index']);
    Route::post('skill/add',[SkillController::class,'add']);
    Route::get('skill/view',[SkillController::class,'view']);
    Route::get('skill/edit/{id}',[SkillController::class,'edit']);
    Route::post('skill/update/{id}',[SkillController::class,'update']);
    Route::get('skill/delete/{id}',[SkillController::class,'destroy']);

    //EXPERIENCE ROUTES 
    Route::get('experience/create',[ExperienceController::class,'index']);
    Route::post('experience/add',[ExperienceController::class,'add']);
    Route::get('experience/view',[ExperienceController::class,'view']);
    Route::get('experience/view-in-details/{id}',[ExperienceController::class,'viewDetails']);
    Route::get('experience/edit/{id}',[ExperienceController::class,'edit']);
    Route::post('experience/update/{id}',[ExperienceController::class,'update']);
    Route::get('experience/delete/{id}',[ExperienceController::class,'destroy']);

    //PRICING ROUTES 
    Route::get('pricing/create',[PricingController::class,'index']);
    Route::post('pricing/add',[PricingController::class,'add']);
    Route::get('pricing/view',[PricingController::class,'view']);
    Route::get('pricing/view-in-details/{id}',[PricingController::class,'viewDetails']);
    Route::get('pricing/edit/{id}',[PricingController::class,'edit']);
    Route::post('pricing/update/{id}',[PricingController::class,'update']);
    Route::get('pricing/delete/{id}',[PricingController::class,'destroy']);

    //CONTACT DETAILS ROUTES 
    Route::get('contact-detail/create',[ContactDetailsController::class,'index']);
    Route::post('contact-detail/add',[ContactDetailsController::class,'add']);
    Route::get('contact-detail/view',[ContactDetailsController::class,'view']);
    Route::get('contact-detail/view-in-details/{id}',[ContactDetailsController::class,'viewDetails']);
    Route::get('contact-detail/edit/{id}',[ContactDetailsController::class,'edit']);
    Route::post('contact-detail/update/{id}',[ContactDetailsController::class,'update']);
    Route::get('contact-detail/delete/{id}',[ContactDetailsController::class,'destroy']);

    //MASTER CONTROL ROUTES 
    Route::get('master-control/view',[MasterControlController::class,'index']);
    Route::post('master-control/add',[MasterControlController::class,'add']);

    //CONTACT US ROUTES 
    Route::get('contact-us/view',[ContactController::class,'view']);
    Route::get('contact-us/view-in-details/{id}',[ContactController::class,'viewDetails']);
    Route::get('contact-us/delete/{id}',[ContactController::class,'destroy']);

    //AUTH ROUTES
    Route::get('logout',[LoginController::class,'logout']);
    Route::get('/my-profile',[LoginController::class,'myProfile']);
    Route::post('/profileUpdate',[LoginController::class,'profileUpdate']);
    Route::get('/change-password',[LoginController::class,'changePassword']);
    Route::Post('/changePassword',[LoginController::class,'updatePassword']);
});
//Admin ROUTES ENDS


//Start - login
Route::group(['middleware'=>['IsNotLogin']],function()
{
    Route::get('/login',[LoginController::class,'login']);
});
//Start - login
