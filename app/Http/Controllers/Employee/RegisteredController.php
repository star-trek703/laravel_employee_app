<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('employees.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.Employee::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'dob' => ['required'],
            'doj' => ['required'],
            'gender' => ['required'],
            'designation' => ['required'],
            'manager' => ['required'],
            'picture' => ['required', 'image'],
        ]);

        $picture_path = $request->file('picture')->store('img');

        $employee = Employee::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'dob' => $request->dob,
            'doj' => $request->doj,
            'gender' => $request->gender,
            'designation' => $request->designation,
            'manager' => $request->manager,
            'picture' => $picture_path,
        ]);

        Auth::login($employee);

        return redirect()->route('employees.dashboard');
    }
}
