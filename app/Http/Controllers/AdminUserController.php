<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserAddRequest;
use App\Role;
use App\Traits\StorageImageTrait;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use mysql_xdevapi\Exception;

class AdminUserController extends Controller
{
    use StorageImageTrait;
    private $user;
    private $role;

    /**
     * AdminUserController constructor.
     * @param $user
     */
    public function __construct(User $user ,Role $role)
    {
        $this->user = $user;
        $this->role = $role;
    }

    public function trangchu(){
        $users = $this->user->get();
        return view('admins.user.trangchu',compact('users'));
    }
    public function themmoi(){
        $roles = $this->role->all();
        return view('admins.user.themmoi',compact("roles"));
    }
    public function themmoi_gui(UserAddRequest $request){
        try {
            DB::beginTransaction();
            $dataUser=[
                'name' =>$request->name,
                'email' =>$request->email,
                'password'=>Hash::make($request->password)
            ];
            $dataUploadImage = $this->storageTraitUpload($request,'image','user');
            if(!empty($dataUploadImage)){
                $dataUser['image_path']=$dataUploadImage['file_path'];
                $dataUser['image_name']=$dataUploadImage['file_name'];
            }
            $users=$this->user->create($dataUser);
            /*dd($request->role_id);*/
            //them vào bang trung gian
            $roleIds = $request->role_id;
            /* foreach ($roleIds as $roleItem){
                 DB:table('role_user')->insert([
                     'role_id' => $roleItem,
                     'user_id' => $users->id
                 ]);
             }*/
            $users->roles()->attach($roleIds);
            DB::commit();
            session()->flash('success', 'Thêm mới thành công');
            return redirect()->route('users.trangchu');

        }catch(Exception $exception){
            DB::rollBack();
            Log::error('Messege : ' . $exception->getMessage() . 'line : ' . $exception->getLine());
        }
    }
    public function sua($id){
        $roles = $this->role->all();
        $users= $this->user->find($id);
        $rolesOfUser =$users->roles;
       /* dd($rolesOfUser);*/
        return view('admins.user.sua',compact("roles",'users','rolesOfUser'));
    }
    public function sua_gui(Request $request,$id){
        try {
            DB::beginTransaction();
            $dataUser=[
                'name' =>$request->name,
                'email' =>$request->email,
                'password'=>Hash::make($request->password)
            ];
            $dataUploadImage = $this->storageTraitUpload($request,'image','user');
            if(!empty($dataUploadImage)){
                $dataUser['image_path']=$dataUploadImage['file_path'];
                $dataUser['image_name']=$dataUploadImage['file_name'];
            }
            $this->user->find($id)->update($dataUser);
            $users=$this->user->find($id);
            /*dd($request->role_id);*/
            //them vào bang trung gian
            $roleIds = $request->role_id;
            /* foreach ($roleIds as $roleItem){
                 DB:table('role_user')->insert([
                     'role_id' => $roleItem,
                     'user_id' => $users->id
                 ]);
             }*/
            $users->roles()->sync($roleIds);
            DB::commit();
            session()->flash('success', 'Sửa Thành công');
            return redirect()->route('users.trangchu');

        }catch(Exception $exception){
            DB::rollBack();
            Log::error('Messege : ' . $exception->getMessage() . 'line : ' . $exception->getLine());
        }
    }
    public function xoa($id){
        try {
            $this->user->find($id)->delete();
            return response()->json([
                'code'=>200,
                'message'=>'success'
            ],200);

        }catch(Exception $exception){
            Log::error('Messege : ' . $exception->getMessage() . 'line : ' . $exception->getLine());
            return response()->json([
                'code'=>500,
                'message'=>'fail'
            ],500);
        }
    }
}
