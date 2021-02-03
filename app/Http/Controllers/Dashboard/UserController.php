<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function data_table_server_side()
    {
        $data = User::where('id','!=',Auth::user()->id)->get();
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('name', function ($data){
                return $data->first_name." ".$data->last_name;
            })
            ->addColumn('action', function ($data) {
                $funsi_delete="deleteData($data->id,'$data->name')";
                $button = [
                    '<a data-original-title="Edit" href="'.route("dashboard.user.update", ['id'=>$data->id]).'"
                        class="btn btn-sm btn-warning m-1" data-toggle="tooltip" data-placement="top">
                        <i class="fas fa-edit"></i>
                    </a>',
                    '<button onClick="'.$funsi_delete.'" data-original-title="Delete"
                        class="btn btn-sm btn-danger m-1" data-toggle="tooltip" data-placement="top">
                        <i class="fas fa-trash"></i>
                    </button>',
                ];
                return implode("",$button);
            })
            ->rawColumns(['id','action','name'])
            ->make(true);
    }

    public function index()
    {
        return view('app.dashboard.user.index');
    }

    public function create()
    {
        $data = [
            'edit'  => false
        ];
        return view('app.dashboard.user.form', $data);
    }

    public function show($id)
    {
        $data = [
            'edit'  => true,
            'user'  => User::findOrFail($id)
        ];
        return view('app.dashboard.user.form', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'unique:users',
            'profile_picture' => 'mimes:jpeg,png,jpg,gif|max:5052',
        ]);
        $extension = $request->profile_picture->extension();
        $filename = Str::random(10).".".$extension;
        $request->profile_picture->storeAs('/public/upload/user', $filename);
        $user = User::create([
            'first_name'        => $request->first_name,
            'last_name'         => $request->last_name,
            'email'             => $request->email,
            'profile_picture'   => $filename,
            'password'          => Hash::make("123456"),
        ]);
        if($user){
            return redirect(route('dashboard.user'))->with('message', [
                'status'    => 'success',
                'message'   => 'New User has been saved!!'
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        if($request->profile_picture!=null){
            $extension = $request->profile_picture->extension();
            $filename = Str::random(10).".".$extension;
            $request->profile_picture->storeAs('/public/upload/user', $filename);
            $user->profile_picture=$filename;
        }
        if($user->save()){
            return redirect(route('dashboard.user'))->with('message', [
                'status'    => 'success',
                'message'   => 'User '.$request->first_name.' has been updated!!'
            ]);
        }
    }

    public function delete(Request $request){
        if(User::findOrFail($request->id)->delete()){
            return response()->json([
                'message'   => "success"
            ],200);
        }else{
            return response()->json([
                'message'   => "something error"
            ],400);
        }
    }
}
