<?php

namespace App\Http\Controllers;

use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{

    public function index()
    {
        $educations = Education::all();
        return view('educations.index', compact('educations'));
    }


    public function create()
    {
        return view('educations.create');
    }

    public function store(Request $request)
    {

        $input = $request->all();

        if($request->institute_logo != null){
            $input['institute_logo'] = time(). $_FILES["institute_logo"]["name"];
        }

        $save = Education::create($input);

        if($request->institute_logo != null){
            $source= $_FILES['institute_logo']['tmp_name'];
            @mkdir("resources/education");
            $destination="resources/education/".$input['institute_logo'];
            $saveimage = move_uploaded_file($source,$destination);
        }

        return redirect()->route('education.index')
                         ->with('success', 'Education created successfully.');
    }


    public function edit($id)
    {
        $education = Education::find($id);
        return view('educations.edit', compact('education'));
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();

        if($request->institute_logo != null){
            $input['institute_logo'] = time(). $_FILES["institute_logo"]["name"];
        }

        $save = Education::find($id)->update($input);

        if($request->institute_logo != null){
            $source= $_FILES['institute_logo']['tmp_name'];
            @mkdir("resources/education");
            $destination="resources/education/".$input['institute_logo'];
            $saveimage = move_uploaded_file($source,$destination);
        }

        return redirect()->route('education.index')
                         ->with('success', 'Education updated successfully.');
    }

    public function destroy($id)
    {
        $education = Education::find($id);
        $delete = $education->delete();

        return redirect()->route('education.index')
                         ->with('success', 'Education deleted successfully.');
    }

}
