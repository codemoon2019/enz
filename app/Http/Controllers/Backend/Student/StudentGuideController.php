<?php

namespace App\Http\Controllers\Backend\Student;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use Storage;

class StudentGuideController extends Controller
{

	public function index()
	{
		return view('backend.studentGuide.index');
	}

	public function store(Request $request)
	{
		$file = $request['guide'];

		if ($file != null) {

            $file->storeAs('public/user_guide', 'Student-Guide.pdf');

        }

        cache()->clear();
        
        cache()->flush();

        return redirect()->back()->withFlashSuccess('Saved');

	}

	public function show($guide)
	{
		return response()->file(Storage::path('public/user_guide/Student-Guide.pdf'));
	}


	public function destroy($guide)
	{

		Storage::delete('public/user_guide/Student-Guide.pdf');

		return redirect()->back()->withFlashSuccess('Deleted!');

	}

}
