<?php

Route::get('/', function () {
    return view('welcome');
});

// Show data table route
Route::get('all', 'HomeController@all');
//End of Show data table route

// Show and store image route
Route::get('add', 'ImageController@add');
Route::post('store', 'ImageController@store');
//End of Show and store image route

// Import Export route
Route::post('import', 'ExcelController@import')->name('import');
Route::get('export', 'ExcelController@export')->name('export');
Route::get('importExportView', 'ExcelController@importExportView');
//End of Import Export route

// Export pdf route
Route::get('list','PdfController@pdfview');
Route::get('pdf','PdfController@export_pdf');
// End of Export pdf route

// named Route
Route::get('view1', function()
{
  return view('view1');
})->name('one');

Route::get('view2', function()
{
  return view('view2');
})->name('two');

Route::get('view3', function()
{
  return view('view3');
})->name('three');
// End of Name Route
