<?php

namespace App\Http\Controllers;

use App\Mail\ChannelDoctor;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;

class DoctorController extends Controller
{
    //
    private function getDoctors(){
        return Doctor::orderBy('name', 'asc')->get();
    }
    public function index(){
        $doctors = Doctor::orderBy('name', 'asc')->paginate(15);
        return view('doctor.index', compact('doctors'));
    }
    public function create(){
        return view('doctor.create');
    }
    public function store(Request $request){
        $attributes = $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'email' => ['required', 'email'],
            'speciality' => 'required',
            'phone' => ['required', 'min:10'],
        ]);
        Doctor::create($attributes);
        return redirect()->route('dashboard');
    }
    public function edit(Doctor $doctor){
        return view('doctor.edit', compact('doctor'));
    }
    public function update(Request $request, Doctor $doctor){
        $attributes = $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'email' => ['required', 'email'],
            'speciality' => 'required',
            'phone' => ['required', 'min:10'],
        ]);
        $doctor->update($attributes);
        return redirect()->route('dashboard');
    }
    public function destroy(Doctor $doctor){
        $doctor->delete();
        return redirect()->route('dashboard');
    }
    public function channel(){
        return view('doctor.channel', ['doctors' => $this->getDoctors()]);
    }
    public function submitChannel(){
        $attributes = request()->validate([
           'f_name' => 'required',
           'l_name' => 'required',
           'email' => ['required', 'email'],
           'phone' => ['required', 'min:10'],
            'doctor' => ['required', Rule::in($this->getDoctors()->pluck('id')->toArray())],
        ]);
        try {
            $doctor = Doctor::find($attributes['doctor']);
            Mail::to($doctor->email)
                ->cc(env('ADMIN_MAIL'))
                ->send(
                    new ChannelDoctor(
                        $attributes['f_name'],
                        $attributes['l_name'],
                        $attributes['email'],
                        $attributes['phone'],
                        $doctor->name,
                        $doctor->id,
                    )
                );
            return redirect()->back()->with('reply', 'Appointment submitted! We will get back you soon')->withInput();
        }
        catch (\Exception $exception){
            return redirect()->back()->with('reply', 'Error')->withInput();
        }
    }
    public function doctors(){
        $doctors = Doctor::orderBy('name', 'asc')->get();
        return view('doctor.doctors', compact('doctors'));
    }
}
