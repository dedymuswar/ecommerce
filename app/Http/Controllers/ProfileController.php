<?php

namespace App\Http\Controllers;

use App\User;
use App\Profil;
use App\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Validator;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    // public function update(User $user, Post $post)
    // {
    //     return $user->id === $post->user_id
    //                 ? Response::allow()
    //                 : Response::deny('You do not own this post.');
    // }

    public function profil()
    {
        $users = User::findOrFail(Auth::user()->id);
        return view('web.page.user.profil', compact('users'));
    }

    public function alamat()
    {
        // dd($id);
        $user = Auth::user()->id;
        $profil = Profil::where('user_id', $user)->get();
        return view('web.page.user.alamat', compact('profil'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provinces = Province::all();
        return view('web.page.user.create', compact('provinces'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $this->validate(request(), [
            'penerima'  => 'required|max:30',
            'telepon'  => 'required|max:30',
            'provinsi'  => 'required|max:10',
            'kota'  => 'required|max:10',
            'kodePos' => 'required|max:10',
            'alamatLengkap' => 'required|max:300',
        ]);

        $profils = new Profil;
        $profils->user_id = auth()->user()->id;
        $profils->penerima = $request->input('penerima');
        $profils->telepon = $request->input('telepon');
        $profils->province_id = $request->input('provinsi');
        $profils->city_id = $request->input('kota');
        $profils->kodePos = $request->input('kodePos');
        $profils->alamatLengkap = $request->input('alamatLengkap');
        $profils->save();

        return redirect()->route('user.alamat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // dd($id);
        $profils = Profil::where('user_id', $id)->get();
        // dd($profils);
        $provinces = Province::all();
        return view('web.page.user.show', compact('profils', 'provinces'));
    }

    public function dinamis( Request $request)
    {
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');
        $data = DB::table('cities')->where('province_id', $value)->get();
        // dd($data);
        $output = '<option value=""> Select '.ucfirst($dependent).'</option>';
        foreach ($data as $row ) {
            $output .= '<option value="'.$row->id.'">' . $row->title . '</option>';
        }

        echo $output;
        // return view('');   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate(request(), [
            'penerima'  => 'required|max:30',
            'telepon'  => 'required|max:30',
            'provinsi'  => 'required|max:10',
            'kota'  => 'required|max:10',
            'kodePos' => 'required|max:10',
            'alamatLengkap' => 'required|max:300',
        ]);

        $profils = Profil::findOrFail($id);
        $profils->penerima = $request->input('penerima');
        $profils->telepon = $request->input('telepon');
        $profils->province_id = $request->input('provinsi');
        $profils->city_id = $request->input('kota');
        $profils->kodePos = $request->input('kodePos');
        $profils->alamatLengkap = $request->input('alamatLengkap');
        $profils->save();
        return redirect()->route('user.alamat');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
