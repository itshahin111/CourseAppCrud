<?php 

namespace App\Http\Controllers;

use App\Models\Training;
use App\Models\Employee;
use Illuminate\Http\Request;

class TrainingController extends Controller
{
    public function index()
    {
        $trainings = Training::with('employee')->latest()->paginate(5);
        return view('trainings.index', compact('trainings'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function edit(Training $training)
    {
        $employees = Employee::all(); // To populate the dropdown of employees
        return view('trainings.edit', compact('training', 'employees'));
    }

    public function update(Request $request, Training $training)
    {
        $request->validate([
            'employee_id' => 'required',
            'training_name' => 'required',
            'instructor_name' => 'required',
        ]);

        $training->update($request->all());

        return redirect()->route('trainings.index')
            ->with('success', 'Training updated successfully.');
    }

    // Other CRUD methods (index, create, store, etc.)

    public function destroy(Training $training)
    {
        $training->delete();
        return redirect()->back()
            ->with('success', 'Training deleted successfully.');
    }
}
