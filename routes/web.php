<?php

use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\QuestionImportController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('master');
});

Route::get('/invoice/download', [InvoiceController::class, 'download'])->name('invoice.download');
Route::get('/excel/download', [InvoiceController::class, 'export'])->name('export.download');


// question import route

Route::get('/question/import/insert', [QuestionImportController::class,'insert'])->name('question.import.insert');
Route::post('/questionImport', [QuestionImportController::class,'import_ques'])->name('question.import');

