<?php

namespace App\Http\Controllers\Backend\Information;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WebsiteInformationController extends Controller
{

	public function index()
	{

		return view('backend.information.index');

	}

	public function edit($slug)
	{
		$model = findInformation($slug);

		return view('backend.information.edit', compact('model'));
	}

	public function update(Request $request, $slug)
	{

		$model = findInformation($slug)->update(['value' => $request['value']]);

		return redirect()->back()->withFhashSuccess('Success');

	}

}
