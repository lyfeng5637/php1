<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;
use Input;

class UsersController extends Controller
{
    //允许的请求方式
    private static $method_type = array('get', 'post', 'put', 'delete');

    

    // public static function getRequest()
    // {
    //     //获取请求方式
    //     $method = strtolower($_SERVER['REQUEST_METHOD']);
    //     echo 1;
    //     echo '<br>';
    //     if (in_array($method, self::$method_type)) {
    //         //调用请求方式对应的方法
    //         $data_name = $method . 'Data';
    //         echo $data_name;
    //     	echo '<br>';
    //     	var_dump($_REQUEST);
    //         return self::$data_name($_REQUEST);
    //     }
    //     return false;
    // }

    //GET 获取数据
    public static function getData($user_id)
    {
    	
        // $user_id = (int)$request_data['user_id'];
        
         // return Users::select()->where('id',$user_id)->get();
         return Users::find($user_id);

    }

    //POST 新建数据
    public static function postData(Request $request)
    {
    	$request_data = $request->all();
    	
        if (!empty($request_data['name'])) {

            $data['name'] = $request_data['name'];
            $data['email'] = $request_data['email'];
            $insertId = Users::insertGetId($data);

            return $insertId;
        } else {
            return false;
        }
    }

    //PUT  修改
    public static function updateData(Request $request)
    {
    	$request_data = $request->all();
    	var_dump($request_data);die;
        $user_id = (int)$request_data['user_id'];
        if ($user_id == 0) {
            return false;
        }
        $data = array();
        if (!empty($request_data['name'])) {
        	$user = Users::find($user_id);
        	$user->name = $request_data['name'];
            
            $user->save();
        } else {
            return false;
        }
    }


    //DELETE 删除
    public static function deleteData($user_id)
    {
        if ($user_id == 0) {
            return false;
        }
        $user = Users::find($user_id);
        $user->delete();
        return 'ok';
    }
}
