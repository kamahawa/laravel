<?php

namespace App\Http\Controllers;

use App\Models\ActUser;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {

    }

    public function homePage(){
        $query = new ActUser();
        $manageid[0] = array(
            'name'=>'Web',
            'manageid'=>0
        );
        $manageid[1] = array(
            'name'=>'Bus',
            'manageid'=>1
        );
        $manageid[2] = array(
            'name'=>'Parent',
            'manageid'=>2
        );
        $array = json_decode(json_encode($manageid));
        return view("user.userHomepage")->with([
            'user' => $query->selectAllUser(),
            'manageid' => $array
        ]);
    }

    public function insertData(Request $request){
        $post= $request->all();
        $query = new ActUser();
        $result = $query->selectUserId();
        $max = max($result);

        $date = date('Ymd');
        $array= json_decode(json_encode($max), true);
        $a = substr($array['UserID'],8);
        $b = $a+1;
        $c = "$b";
        if(0<=$b && $b<=9)
        {
            $final = $date."000".$c;
        }else if(10<=$b && $b<=99)
        {
            $final = $date."00".$c;
        }else if(100<=$b && $b<=999)
        {
            $final = $date."0".$c;
        }else{
            $final = $date.$c;
        }
        if(count($result)>0) {
            $data = array(
                'UserID'=>$final,
                'UserCode'=>$final,
                'UserName'=>$post['txtUserName'],
                'UserNameKana'=>$post['txtUserNameKana'],
                'UserPhoneNumber'=>$post['txtUserPhone'],
                'UserEncryptedPassword'=>md5($post['txtPassword']),
                'MobileEmail'=>$post['txtEmail'],
                'UserPCMail'=>$post['txtPcmail'],
                'ManageId'=>$_POST['manageid'],
                'Deleted'=>0
            );
        }else {
            $data = array(
                'UserID'=>$date."0000",
                'UserCode'=>$date."0000",
                'UserName'=>$post['txtUserName'],
                'UserNameKana'=>$post['txtUserNameKana'],
                'UserPhoneNumber'=>$post['txtUserPhone'],
                'UserEncryptedPassword'=>md5($post['txtPassword']),
                'MobileEmail'=>$post['txtEmail'],
                'UserPCMail'=>$post['txtPcmail'],
                'ManageId'=>$_POST['manageid'],
                'Deleted'=>0
            );
        }
        if($post['txtUserName']!= null)
        {
            $query->insert($data);
        }
        return redirect('user');
    }

    public function showUpdatePage($id){
        $query = new ActUser();
        $manageid[0] = array(
            'name'=>'Web',
            'manageid'=>0
        );
        $manageid[1] = array(
            'name'=>'Bus',
            'manageid'=>1
        );
        $manageid[2] = array(
            'name'=>'Parent',
            'manageid'=>2
        );
        $array = json_decode(json_encode($manageid));
        return view('user.userUpdate')->with([
            'user' => $query->selectUserById($id),
            'manageid' => $array
        ]);
    }

    public function updateData(Request $request){
        $post= $request->all();
        $query = new ActUser();
        $result = $query->selectUserById($post['id']);
        $array= json_decode(json_encode($result), true);
        if($post['txtPassword'] == $array['UserEncryptedPassword'])
        {
            $data = array(
                'UserName'=>$post['txtUserName'],
                'UserNameKana'=>$post['txtUserNameKana'],
                'UserPhoneNumber'=>$post['txtUserPhone'],
                'UserEncryptedPassword'=>$post['txtPassword'],
                'MobileEmail'=>$post['txtEmail'],
                'UserPCMail'=>$post['txtPcmail'],
                'ManageId'=>$_POST['manageid'],
            );
        }else {
            $data = array(
                'UserName' => $post['txtUserName'],
                'UserNameKana' => $post['txtUserNameKana'],
                'UserPhoneNumber' => $post['txtUserPhone'],
                'UserEncryptedPassword' => md5($post['txtPassword']),
                'MobileEmail' => $post['txtEmail'],
                'UserPCMail' => $post['txtPcmail'],
                'ManageId' => $_POST['manageid'],
            );
        }
        $query->updateUser($post['id'],$data);
        return redirect("user");
    }

    public function deleteData($id){
        $query = new ActUser();
        $data = Array(
            'Deleted'=>1,
        );
        $query->updateUser($id,$data);
        return redirect("user");
    }
}
