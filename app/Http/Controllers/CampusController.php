<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campus;

class CampusController extends Controller
{
    public function index() {
        $campuses = Campus::get();
        return view('campuses.index', compact('campuses'));
    }

    public function create() {
        return view('campuses.create');
    }

    public function store(Request $request) {
        // dd($request->all());
        $this->validation($request);

        $campus = new Campus();

        $campus = $this->prepareRecord($campus, $request);

        $campus->save();
        return redirect()->route('campuses.index')->with('message', 'College data stored successfully!');
    }

    public function edit($id) {
        $campus = Campus::find($id);
        return view('campuses.edit', compact('campus'));
    }

    public function update($id, Request $request) {
        $campus = Campus::find($id);

        $this->validation($request);

        $campus = $this->prepareRecord($campus, $request);

        $campus->update();
        return redirect()->route('campuses.index')->with('message', 'College data updated successfully!');
    }

    public function destroy($id) {
        $campus = Campus::find($id);
        $campus->delete();
        return redirect()->route('campuses.index')->with('message', 'College data deleted successfully!');
    }

    // public function delete_confirmation($id_to_delete) {
    //     return redirect()->route('campuses.index')->with(['delete_confirmation' => 'Are you sure you want to delete the college data?', 'id_to_delete' => $id_to_delete]);
    // }

    private function validation($request) {
        return $request->validate([
            'name'=> ['required', 'min:3', 'string'],
            'phone_number'=> ['required', 'digits:10', 'numeric'],
            'number_of_teachers'=> ['required', 'numeric'],
            'number_of_students'=> ['required', 'numeric'],
            'est_date'=> ['required', 'date'],
            'total_class'=> ['nullable', 'numeric'],
            'opening_hour'=> ['required', 'date_format:H:i'],
            'closing_hour'=> ['required', 'date_format:H:i'],
            'teachers_gender'=> ['required', 'in:male,female,other'],
        ]);
    }

    private function prepareRecord($campus, $request){
        $campus->name = $request->name;
        $campus->phone_number = $request->phone_number;
        $campus->number_of_teachers = $request->number_of_teachers;
        $campus->number_of_students = $request->number_of_students;
        $campus->est_date = $request->est_date;
        $campus->total_class = $request->total_class;
        $campus->opening_hour = $request->opening_hour;
        $campus->closing_hour = $request->closing_hour;
        $campus->teachers_gender = $request->teachers_gender;

        return $campus;
    }
}
