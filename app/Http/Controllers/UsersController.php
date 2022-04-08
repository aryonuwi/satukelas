<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Users;

class UsersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->users = new Users();
    }

    function create(Request $req){

        $validate = Validator::make($req->all(),[
            "name"=>"required",
            "age"=>"required",
        ]);

        if ($validate->fails()) {
           return $this->responseFailed($validate->errors()->all());
        }

        $name = $req->input('name');
        $age = $req->input('age');

        $data = [
            'name'=>$name,
            'age'=>$age,
            'status'=>'1',
            'createdAt'=>date('Y-m-d H:i'),
            'createdAt'=>date('Y-m-d H:i')
        ];

        $respons = $this->users->insertDB($data);

        if(is_int($respons)){
            return $this->responseSuccess(['Id'=>$respons,'name'=>$name,'age'=>$age],'Success Created Topic','created');
        }else{
            return $this->responseFailed(['Created failed']);
        }
    }

    function update($id, Request $req){
        $validate = Validator::make($req->all(),[
            "name"=>"required",
            "age"=>"required",
        ]);
        if(!is_int($id)){
            return $this->responseFailed(['Id is failed']);
        }
        if ($validate->fails()) {
           return $this->responseFailed($validate->errors()->all());
        }
        $name = $req->input('name');
        $age = $req->input('age');
        $data = [
            'name'=>$name,
            'age'=>$age,
            'createdAt'=>date('Y-m-d H:i')
        ];
        $respons = $this->users->updateDB($data,$id);

        if(is_int($respons)){
            return $this->responseSuccess(['Id'=>$respons,'name'=>$name,'age'=>$age],'Success Created Topic','created');
        }else{
            return $this->responseFailed(['Created failed']);
        }
    }

    public function getUsers()
    {
        $datReturn = $this->users->getUsers();
        return $this->responseSuccess($datReturn);
    }

    public function getUser($id)
    {
        $datReturn = $this->users->getUser($id);
        if(!empty($datReturn)){
            return $this->responseSuccess($datReturn);
        }else{
            return $this->responseFailed(['Data tidak dapat di temukan'],'notfound');
        }
    }


    public function delete($id)
    {
        $datReturn = $this->users->getUser($id);

        if(empty($datReturn)){
            return $this->responseFailed([],'notfound');
        }
        $data = [
            'status'=>'0',
            'updatedAt'=>date('Y-m-d H:i')
        ];
        $respons = $this->users->updateDB($data,$id);

        if($respons){
            return $this->responseSuccess(['Id'=>$id,'title'=>$datReturn->name,'description'=>$datReturn->age],'Success Deleted Topic','deleted');
        }else{
            return $this->responseFailed(['deleted failed']);
        }
    }


    public function deletePermanent($id)
    {
        $datReturn = $this->users->getUser($id);

        if(empty($datReturn)){
            return $this->responseFailed([],'notfound');
        }

        $respons = $this->users->deletePermanet($id);

        if($respons){
            return $this->responseSuccess(['Id'=>$id,'title'=>$datReturn->name,'description'=>$datReturn->age],'Success Deleted Topic','deleted');
        }else{
            return $this->responseFailed(['deleted failed']);
        }
    }


}
