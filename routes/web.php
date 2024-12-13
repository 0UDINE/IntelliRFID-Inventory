<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProduitController;
use App\Exports\StockReportExport;
use App\Http\Controllers\RapportController;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\EtiquetteRFIDController;
use Illuminate\Support\Facades\Http;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::resource('produits', ProduitController::class);
Route::delete('/produits/{id}', [ProduitController::class, 'destroy'])->name('produits.destroy');


//route for exporting data in CSV format
Route::get('/export-stock', function () {
    return Excel::download(new StockReportExport, 'stock_report.csv');
})->name('export-stock');

//route for exporting data in PDF format
Route::get('/export-stock-pdf', [RapportController::class, 'exportPDF'])->name('export-stock-pdf');

//route for exporting modification_loggs in PDF format
Route::get('/generate-modifications-report', [RapportController::class, 'generateModifReport'])->name('generate-modifications-pdf');

//routes pour simulation du RFID technologie
//generation(creation) d'un RFID code
// Route to display the form and handle the simulation
Route::get('/simulate-scan', [ProduitController::class, 'search'])->name('simulate.scan');
// Route to handle the RFID scan simulation (POST request)
Route::post('/simulate-scan', [EtiquetteRFIDController::class, 'simulateScan'])->name('simulate.scan.submit');


