<?php


use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\Communication\CommunicationController;
use App\Http\Controllers\Communication\phonebook\PhonebookController;
use App\Http\Controllers\Communication\Whatsapp\GroupsContoller;
use App\Http\Controllers\Communication\Whatsapp\MessagesController;
use App\Http\Controllers\Communication\Whatsapp\MessagesReceiveController;
use App\Http\Controllers\Communication\Whatsapp\SendWhatsappMessagesController;
use App\Http\Controllers\Communication\Whatsapp\WhatsappController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Gpt\GptSessionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoUserController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\SponteContollers\SponteClassesController;
use App\Http\Controllers\SponteContollers\SponteEmployeesController;
use App\Http\Controllers\SponteContollers\SponteResponsiblesController;
use App\Http\Controllers\SponteContollers\SponteStudentsController;
use App\Http\Controllers\Verificar\SessionsController;
use App\Http\Controllers\WebhookController;
use http\Url;
use Illuminate\Support\Facades\Route;

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
Route::group(['middleware' => 'access.level:0'], function () {

//    if (env('APP_ENV') === 'production') {
//        URL::forceSchema('https');
//    }

    Route::get('/dashboard', [DashboardController::class, 'create'])->name('dashboard');

    Route::get('/communication', [CommunicationController::class, 'index'])->name('communication');
    Route::get('/phonebook-options', [PhonebookController::class, 'index'])->name('phonebook-options');
    Route::post('/update-student/{id}', [PhonebookController::class, 'update'])->name('update-student');


    Route::get('/groups-message', [GroupsContoller::class, 'index'])->name('groups-message');
    Route::get('/edit-groups-message/{id}', [GroupsContoller::class, 'edit'])->name('edit-groups-message');
    Route::post('/update-groups-message/{id}', [GroupsContoller::class, 'update'])->name('update-groups-message');

    Route::get('/edit-message/{id}', [MessagesController::class, 'edit'])->name('edit-message');
    Route::post('/update-message/{id}', [MessagesController::class, 'update'])->name('update-message');
    Route::get('/destroy-message/{id}', [MessagesController::class, 'destroy'])->name('destroy-message');

    Route::get('/new-message', [MessagesController::class, 'index'])->name('new-message');
    Route::post('/message-save', [MessagesController::class, 'store'])->name('message-save');
    Route::get('/create-message', [MessagesController::class, 'index'])->name('create-message');
    Route::post('/save-message', [MessagesController::class, 'saveMassage'])->name('save-message');

    Route::get('profile', function () {return view('profile');})->name('profile');
    Route::get('user-management', [InfoUserController::class, 'create'])->name('user-management');

    Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
    Route::get('/user-profile', [InfoUserController::class, 'create']);
    Route::post('/user-profile', [InfoUserController::class, 'store']);
    Route::get('/register', [RegisteredUserController::class, 'create']);
    Route::post('/register', [RegisteredUserController::class, 'store']);

    Route::get('/classes', [SponteClassesController::class, 'newSearch']);
    Route::get('/classes-store', [SponteClassesController::class, 'store']);
    Route::get('/employees', [SponteEmployeesController::class, 'newSearch']);
    Route::get('/employees-store', [SponteEmployeesController::class, 'store']);
    Route::get('/student', [SponteStudentsController::class, 'store']);
    Route::get('/responsibles', [SponteResponsiblesController::class, 'newSearch']);
    Route::get('/responsibles-store', [SponteResponsiblesController::class, 'store']);
    Route::get('/send-message', [SendWhatsappMessagesController::class, 'send']);

    Route::get('/gpt-service', [GptSessionController::class, 'index'])->name('gpt-service');
    Route::get('/gpt-check', [GptSessionController::class, 'check'])->name('gpt-check');

    Route::get('/groups-service', [WhatsappController::class, 'index'])->name('groups-service');
    Route::get('/groups-check', [WhatsappController::class, 'check'])->name('groups-check');



});

Route::group(['middleware' => 'access.level:1'], function () {

    Route::get('/groups-message', [GroupsContoller::class, 'index'])->name('groups-message');
    Route::get('/edit-groups-message/{id}', [GroupsContoller::class, 'edit'])->name('edit-groups-message');
    Route::post('/update-groups-message/{id}', [GroupsContoller::class, 'update'])->name('update-groups-message');

    Route::get('/edit-message/{id}', [MessagesController::class, 'edit'])->name('edit-message');
    Route::post('/update-message/{id}', [MessagesController::class, 'update'])->name('update-message');
    Route::get('/destroy-message/{id}', [MessagesController::class, 'destroy'])->name('destroy-message');

    Route::get('/new-message', [MessagesController::class, 'index'])->name('new-message');
    Route::post('/message-save', [MessagesController::class, 'store'])->name('message-save');
    Route::get('/create-message', [MessagesController::class, 'index'])->name('create-message');
    Route::post('/save-message', [MessagesController::class, 'saveMassage'])->name('save-message');

    Route::get('/whatsapp-options', [WhatsappController::class, 'index'])->name('whatsapp-options');
    Route::get('/whatsapp-create', [WhatsappController::class, 'create'])->name('whatsapp-create');
    Route::get('/whatsapp-check', [WhatsappController::class, 'check'])->name('whatsapp-check');

    Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'create'])->name('dashboard');
    Route::get('/send-message', [SendWhatsappMessagesController::class, 'send']);

});

Route::get('/', [HomeController::class, 'home']);

Route::group(['middleware' => 'guest'], function () {
    Route::get('/', [HomeController::class, 'home']);
    Route::get('/login', [SessionsController::class, 'create'])->name('login');
    Route::post('/session', [SessionsController::class, 'store'])->name('session');
    Route::get('/login/forgot-password', [ResetController::class, 'create']);
    Route::post('/forgot-password', [ResetController::class, 'sendEmail']);
    Route::get('/reset-password/{token}', [ResetController::class, 'resetPass'])->name('password.reset');
    Route::post('/reset-password', [ChangePasswordController::class, 'changePassword'])->name('password.update');

});

Route::post('/webhook', [WebhookController::class ,'webhookHandler']);

Route::group(['middleware' => 'auth'], function () {
    //EXCLUIR
});
