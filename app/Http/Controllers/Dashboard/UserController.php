<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function data_table_server_side()
    {
        if(request()->status==null){
            $data = User::get();
        }else{
            $data = User::where('status', request()->status)->get();
        }
        return Datatables::of($data)
            ->addColumn('id', function ($data){
                return '<div class="custom-checkbox custom-control">
                            <input type="checkbox" data-checkboxes="mygroup" name="id[]" value="'.$data->id.'" class="custom-control-input" id="checkbox-'.$data->id.'">
                            <label for="checkbox-'.$data->id.'" class="custom-control-label">&nbsp;</label>
                        </div>';
            })
            ->addColumn('author', function ($data){
                $user = $data->user()->first();
                if ($user) {
                    return $user->first_name." ".$user->last_name;
                }else{
                    return "Admin";
                }

            })
            ->addColumn('status', function ($data){
                if($data->status=="published"){
                    $status = '<div class="badge badge-primary">Published</div>';
                }else if($data->status=="draft"){
                    $status = '<div class="badge badge-warning">Draft</div>';
                }else{
                    $status = '<div class="badge badge-secondary">Archived</div>';
                }
                return $status;
            })
            ->addColumn('created_at', function ($data){
                return date("d F Y H:i:s", strtotime($data->created_at));
            })
            ->addColumn('updated_at', function ($data){
                return date("d F Y H:i:s", strtotime($data->updated_at));
            })
            ->addColumn('action', function ($data) {
                $funsi_delete="deleteData($data->id,'$data->name')";
                $button = [
                    '<a data-original-title="Edit" href="'.route("dashboard.blog.update", ['id'=>$data->id]).'"
                        class="btn btn-sm btn-warning m-1" data-toggle="tooltip" data-placement="top">
                        <i class="fas fa-edit"></i>
                    </a>',
                    '<div class="dropdown d-inline">
                        <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item has-icon" href="#"><i class="far fa-clock"></i> Draft</a>
                            <a class="dropdown-item has-icon" href="#"><i class="far fa-file"></i> Publish</a>
                            <a class="dropdown-item has-icon" href="#"><i class="fas fa-archive"></i> Archive</a>
                            <a class="dropdown-item has-icon" onClick="'.$funsi_delete.'" href="#"><i class="fas fa-trash"></i> Delete</a>
                        </div>
                    </div>',
                ];
                return implode("",$button);
            })
            ->rawColumns(['id','action','author','status','created_at','updated_at'])
            ->make(true);
    }

    public function count_data()
    {
        return response()->json([
            'all' => User::get()->count(),
            'draft' => User::where('status','draft')->count(),
            'published' => User::where('status','published')->count(),
            'archived' => User::where('status','archived')->count(),
        ], 200);
    }

    public function index()
    {
        return view('app.dashboard.blog.index');
    }

    public function create()
    {
        $data = [
            'edit'  => false
        ];
        return view('app.dashboard.blog.form', $data);
    }

    public function show($id)
    {
        $data = [
            'edit'  => true,
            'blog'  => User::find($id)->first()
        ];
        return view('app.dashboard.blog.form', $data);
    }

    public function store(Request $request)
    {
        $blog = User::create([
            'user_id'   => Auth::guard('dashboard')->user()->id,
            'title'     => $request->title,
            'tags'      => $request->tags,
            'slug'      => Str::slug($request->title),
            'content'   => $request->content,
        ]);
        if($blog){
            return redirect(route('dashboard.blog'))->with('message', [
                'status'    => 'success',
                'message'   => 'New User has been saved!!'
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        $package                = User::findOrFail($id);
        $package->title         = $request->title;
        $package->tags          = $request->tags;
        $package->slug          = Str::slug($request->title);
        $package->content       = $request->content;

        if($package->save()){
            return redirect(route('dashboard.blog'))->with('message', [
                'status'    => 'success',
                'message'   => 'User '.$request->title.' has been updated!!'
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

    public function update_selected(Request $request)
    {

    }

    public function delete_selected(Request $request)
    {

    }
}
