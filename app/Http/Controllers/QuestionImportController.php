<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Excel;
use App\Imports\QuestionImport;
use App\Imports\QuestionImport2;

class QuestionImportController extends Controller
{
    public function import_ques(Request $request)
    {
        // Validate the file
        $request->validate([
            'import_file' => 'required|file|mimes:xlsx,csv,txt', // Adjust the mimes based on your needs
        ]);

        // Import the file
        Excel::import(new QuestionImport, $request->file('import_file'));
        Excel::import(new QuestionImport2, $request->file('import_file'));

        // Redirect or return response
        return redirect()->back()
            ->with('success', 'Question imported successfully.');
    }
}
