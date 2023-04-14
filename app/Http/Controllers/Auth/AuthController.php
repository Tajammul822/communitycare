<?php


namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;
use App\Models\Question;
use App\Models\Answer;
use Hash;
use App\Models\FormSubmit;
use App\Models\ChwAssign;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        return view('auth.login');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function registration()
    {
        return view('auth.registration');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')
                ->withSuccess('You have Successfully loggedin');
        }

        return redirect("login")->withSuccess('Oppes! You have entered invalid credentials');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postRegistration(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $data = $request->all();
        $check = $this->create($data);

        return redirect("dashboard")->withSuccess('Great! You have Successfully loggedin');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function dashboard()
    {
        if (Auth::check()) {
            $userCount = User::count();
            $questionCount = Question::count();
            $answerCount = Answer::count();
            $form_submit = FormSubmit::latest()->limit(5)->get();
            $chw_users = User::where('access_level', 2)->get();
            $assigned_tasks = DB::table('users as u')
                ->JOIN('form_tasks as ft', 'u.id', '=', 'ft.user_id')
                ->select('*')
                ->where(['u.access_level' => 2])->get();
            return view('dashboard.dashboard', compact('userCount', 'questionCount', 'answerCount', 'form_submit', 'chw_users', 'assigned_tasks'));
        }

        return redirect("login")->withSuccess('Opps! You do not have access');
    }

    public function forms_assigned($id)
    {
        $assigned_forms = ChwAssign::where('user_id', $id)->get();
        return view('dashboard.chw_assigned.index', compact('assigned_forms'));
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function create(array $data)
    {
        return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function logout()
    {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }
}
