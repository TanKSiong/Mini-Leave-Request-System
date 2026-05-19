<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LeaveRequestController;

Route::get('/', function () {
    return redirect('/leave-requests');
});

Route::get('/leave-requests', [LeaveRequestController::class, 'index']);
Route::post('/leave-requests', [LeaveRequestController::class, 'store']);
Route::patch('/leave-requests/{leaveRequest}/status', [LeaveRequestController::class, 'updateStatus']);
