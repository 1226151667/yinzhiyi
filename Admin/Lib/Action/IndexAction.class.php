<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {
    public function upload(){
        import('ORG.Net.UploadFile');
        $upload = new UploadFile();// 实例化上传类
        $upload->maxSize  = 50*1024*1024 ;// 设置附件上传大小
        $upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->uploadReplace = true;                 //同名则替换
        $upload->saveRule = 'uniqid';       //设置上传头像命名规则(临时图片),修改了UploadFile上传类
        $upload->thumbRemoveOrigin = true;   //生成缩略图后是否删除原图 
        $upload->subType = 'date';    //子目录创建方式，默认为hash，可以设置为hash或者date 
        $upload->dateFormat = 'Ym';           //子目录方式为date的时候指定日期格式 
        $ymd = date("Ymd");
        $path = './Public/Uploads/'.$ymd;
        if(!is_dir($path)){
            mkdir($path,0777);
        }
        $upload->savePath =  $path.'/';// 设置附件上传目录
        if($upload->upload()){// 上传错误提示错误信息
            // $this->error($upload->getErrorMsg());
            $info =  $upload->getUploadFileInfo();
            return $info;
        }else{
            return 0;
        }
    }
    public function getFilePath(){
        $fileInfo = $this->upload();
        if($fileInfo!=0){
            $data['rFilePath'] = $fileInfo[0]['savepath'].$fileInfo[0]['savename'];
            $tmpFile1 = substr($data['rFilePath'],1);
            $data['aFilePath'] = __ROOT__.$tmpFile1;
            return $data;
        }
        return 0;
    }
    //登录验证
    public function checkLogin(){
        $empUser = M("empuser");
        $tmp = $_SESSION['empUserId']?$_SESSION['empUserId']:null;
        if($tmp==null){
            $this->success("亲，你还没有登录呢！",U("Index/login"));
            exit;
        }else{
            $info = $empUser->where("id={$tmp}")->find();
            return $info['uname'];
        }
    }
    //退出登录
    public function logout(){
        unset($_SESSION['empUserId']);
        $this->success("成功退出",U("Index/login"));
        exit;
    }
    public function login(){
        if($_POST){
            $empUser = M("empuser");
            $uname = trim($this->_post("uname"));
            $pwd = trim($this->_post("pwd"));
            if($uname=='' || $pwd==''){
                printf(json_encode(1));
                exit;
            }
            $pwd = md5($pwd);
            $rs = $empUser->where("uname='".$uname."'")->find();
            if($rs){
                if($rs['pwd']==$pwd){
                    $_SESSION['empUserId'] = $rs['id'];
                    printf(json_encode(0));
                    exit;
                }else{
                    printf(json_encode(2));
                    exit;
                }
            }else{
                printf(json_encode(3));
                exit;
            }
        }
		$this->display();
    }
    public function baseinfo(){
        //登录验证
        $uname = $this->checkLogin();
        $this->assign("uname",$uname);

        $obj = M("baseinfo");
        import('ORG.Util.Page');// 导入分页类
        $num = isset($_GET['num'])?$_GET['num']:20;
        $p = isset($_GET['p'])?$_GET['p']:1;
        //api--双击看详情
        if(isset($_GET['id'])){
            $row = $obj->where("id=".$_GET['id'])->find();
            printf(json_encode($row));
            exit;
        }
        //添加
        if($_POST){
            $data=array();
            $id = $this->_post("id");
            $data["title"] = trim($this->_post("title"));
            $data["key"] = trim($this->_post("key"));
            $data["description"] = trim($this->_post("description"));
            $data["qq"] = trim($this->_post("qq"));
            $data["page"] = trim($this->_post("page"));
            $data["onlineCnt"] = trim($this->_post("onlineCnt"));
            if($data["title"]=="" || $data["key"]=="" || $data['description']=="" || $data['page']==""){
                $this->error("所有带*号项都必填",U("Index/baseinfo"));
            }
            $tmpData = $this->getFilePath();
            if($tmpData!=0){
                $data['logo'] = $tmpData['aFilePath'];
                $data['logoR'] = $tmpData['rFilePath'];
            }
            $notice = "添加";
            if($id==""){
                $rs = $obj->add($data);   
            }else{
                if(isset($data['logo'])){
                    $oldInfo = $obj->where("id=".$id)->find();
                    unlink($oldInfo['rFilePath']);
                }
                $rs = $obj->where("id=".$id)->save($data);
                $notice = "修改";
            }
            if($rs===false){
                $this->error($notice."失败",U("Index/baseinfo"));
            }else{
                $this->success($notice."成功",U("Index/baseinfo"));
                exit;
            }
        }
        //删除
        if(isset($_GET['del'])){
            $idArr = explode(",",$_GET['del']);
            array_pop($idArr);
            $num = count($idArr);
            $err = 0;
            foreach($idArr as $k=>$v){
                $rs = $obj->where(" id=".$v)->delete();
                if($rs===false){
                    $err+=1;
                }  
            }
            $suc = $num-$err;
            $this->error($suc."条数据删除成功，".$err."条数据删除失败",U('Index/baseinfo'));
        }
        //模糊搜索
        // if(isset($_GET['name'])){
        //     $name = $_GET['name'];
        //     $where = " and title like '%".$name."%' ";
        // }
        $count = $obj->where($where)->count();// 查询满足要求的总记录数 $map表示查询条件
        $Page = new Page($count,$num);// 实例化分页类 传入总记录数
        $show = $Page->show();// 分页显示输出
        $list = $obj->where($where)->order('id desc')->limit(($p-1)*$num,$num)->select();
        $this->assign('list',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->display();
    }
    public function index(){
        //登录验证
        $uname = $this->checkLogin();
        $this->assign("uname",$uname);

        $user = M("user");
        $tmpuser = M("tmpuser");
        $loginRecord = M("loginrecord");
        $now = date('Y-m-d 00:00:00');
        $newUe = array();
        $newTe = array();
        $m = date("n");
        for($i=0;$i<$m;$i++){
            $tmS = date("Y-0".($i+1)."-01 00:00:00");
            $tmE = date("Y-0".($i+2)."-01 00:00:00");
            if(date('n')==11){
                $tmE = date("(Y+1)-01-01 00:00:00");
            }
            $newTe[$i] = intval($tmpuser->where("tm>'{$tmS}' and tm<'{$tmE}'")->count());
            $newUe[$i] = intval($user->where("tm>'{$tmS}' and tm<'{$tmE}'")->count());
        }
        //月增人数
        $newTe = json_encode($newTe);
        $newUe = json_encode($newUe);
        //总数
        $userCnt = $user->count();
        $tmpuserCnt = $tmpuser->count();
        //今日新增
        $tUCnt = $user->where("tm>'{$now}'")->count();
        $tTCnt = $tmpuser->where("tm>'{$now}'")->count();
        //在线总数
        $now1 = date("Y-m-d H:i:s",strtotime("-3 second"));
        $onLineUe = $loginRecord->field("userId")->where("type = 1 and endTm>'{$now1}'")->select();
        $onLineTe = $loginRecord->field("userId")->where("type = 0 and endTm>'{$now1}'")->select();
        foreach ($onLineUe as $k1=>$v1) {
            foreach ($onLineUe as $k2=>$v2) {
                if($v1==$v2 && $k1!=$k2){
                    unset($onLineUe[$k2]);
                }
            }
        }
        foreach ($onLineTe as $k1=>$v1) {
            foreach ($onLineTe as $k2=>$v2) {
                if($v1==$v2 && $k1!=$k2){
                    unset($onLineTe[$k2]);
                }
            }
        }
        $oUeCnt = count($onLineUe);
        $oTeCnt = count($onLineTe);
        $this->assign("oTeCnt",$oTeCnt);
        $this->assign("oUeCnt",$oUeCnt);
        $this->assign("newUe",$newUe);
        $this->assign("newTe",$newTe);
        $this->assign("userCnt",$userCnt);
        $this->assign("tmpuserCnt",$tmpuserCnt);
        $this->assign("tUCnt",$tUCnt);
        $this->assign("tTCnt",$tTCnt);
		$this->display();
    }
    public function ipBanTable(){
                //登录验证
        $uname = $this->checkLogin();
        $this->assign("uname",$uname);

		$ipBan = M("ipban");
        import('ORG.Util.Page');// 导入分页类
        $where = "";
        $num = isset($_GET['num'])?$_GET['num']:20;
        $p = isset($_GET['p'])?$_GET['p']:1;
        //api--双击看详情
        if(isset($_GET['id'])){
            $row = $ipBan->where("id=".$_GET['id'])->find();
            printf(json_encode($row));
            exit;
        }
        //添加
        if($_POST){
            $data=array();
            $id = $this->_post("id");
            $data["ip"] = trim($this->_post("ip"));
            $data["nickname"] = trim($this->_post("nickname"));
            $data["manageIp"] = trim($this->_post("manageIp"));
            $data["note"] = trim($this->_post("note"));
            $data["group"] = trim($this->_post("group"));
            $data["tm"] = date("Y-m-d H:i:s");
            if($data["ip"]=="" || $data["nickname"]=="" || $data["manageIp"]=="" || $data["group"]==""){
                $this->error("所有带*号项都必填",U("Index/ipBanTable"));
            }
            $row = $ipBan->where("ip='".$data["ip"]."'")->select();
            $count = count($row);
            $notice = "添加";
            if($id==""){         
                if($count>0){
                    $this->error("此ip已被屏蔽,不能重复操作",U("Index/ipBanTable"));   
                }
                $rs = $ipBan->add($data);   
            }else{            
                if($count>1){
                    $this->error("此ip已被屏蔽,不能重复操作",U("Index/ipBanTable"));   
                }
                $rs = $ipBan->where("id=".$id)->save($data);
                $notice = "修改";
            }
            if($rs){
                $this->success($notice."成功",U("Index/ipBanTable"));
                exit;
            }else{
                $this->error($notice."失败",U("Index/ipBanTable"));
            }
        }
        //删除
        if(isset($_GET['del'])){
            $idArr = explode(",",$_GET['del']);
            array_pop($idArr);
            $num = count($idArr);
            $err = 0;
            foreach($idArr as $k=>$v){
                $rs = $ipBan->where(" id=".$v)->delete();
                if($rs===false){
                    $err+=1;
                }  
            }
            $suc = $num-$err;
            $this->error($suc."条数据删除成功，".$err."条数据删除失败",U('Index/ipBanTable'));
        }
        //模糊搜索
        if(isset($_GET['name'])){
            $name = $_GET['name'];
            $where = " nickname like '%".$name."%' ";
        }
        $count = $ipBan->where($where)->count();// 查询满足要求的总记录数 $map表示查询条件
        $Page = new Page($count,$num);// 实例化分页类 传入总记录数
        $show = $Page->show();// 分页显示输出
        $list = $ipBan->where($where)->order('tm desc')->limit(($p-1)*$num,$num)->select();
        $this->assign('list',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->display();
        // $sql = $ipBane->getLastSql;
    }
    public function announcement(){
                //登录验证
        $uname = $this->checkLogin();
        $this->assign("uname",$uname);

        $obj = M("announcement");
        import('ORG.Util.Page');// 导入分页类
        $where = "";
        $num = isset($_GET['num'])?$_GET['num']:20;
        $p = isset($_GET['p'])?$_GET['p']:1;
        //api--双击看详情
        if(isset($_GET['id'])){
            $row = $obj->where("id=".$_GET['id'])->find();
            printf(json_encode($row));
            exit;
        }
        //添加
        if($_POST){
            $data=array();
            $id = $this->_post("id");
            $data["name"] = trim($this->_post("name"));
            $data["content"] = trim($this->_post("content"));
            $data["tm"] = date("Y-m-d H:i:s");
            if($data["content"]=="" || $data["name"]==""){
                $this->error("所有带*号项都必填",U("Index/announcement"));
            }
            $row = $obj->where("name='".$data["name"]."'")->select();
            $count = count($row);
            $notice = "添加";
            if($id==""){         
                if($count>0){
                    $this->error("此公告已存在",U("Index/announcement"));   
                }
                $rs = $obj->add($data);   
            }else{            
                if($count>1){
                    $this->error("此公告已存在",U("Index/announcement"));   
                }
                $rs = $obj->where("id=".$id)->save($data);
                $notice = "修改";
            }
            if($rs){
                $this->success($notice."成功",U("Index/announcement"));
                exit;
            }else{
                $this->error($notice."失败",U("Index/announcement"));
            }
        }
        //删除
        if(isset($_GET['del'])){
            $idArr = explode(",",$_GET['del']);
            array_pop($idArr);
            $num = count($idArr);
            $err = 0;
            foreach($idArr as $k=>$v){
                $rs = $obj->where(" id=".$v)->delete();
                if($rs===false){
                    $err+=1;
                }  
            }
            $suc = $num-$err;
            $this->error($suc."条数据删除成功，".$err."条数据删除失败",U('Index/announcement'));
        }
        //模糊搜索
        if(isset($_GET['name'])){
            $name = $_GET['name'];
            $where = " name like '%".$name."%' ";
        }
        $count = $obj->where($where)->count();// 查询满足要求的总记录数 $map表示查询条件
        $Page = new Page($count,$num);// 实例化分页类 传入总记录数
        $show = $Page->show();// 分页显示输出
        $list = $obj->where($where)->order('tm desc')->limit(($p-1)*$num,$num)->select();
        $this->assign('list',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->display();
        // $sql = $ipBane->getLastSql;
    }
    public function yy(){
                //登录验证
        $uname = $this->checkLogin();
        $this->assign("uname",$uname);

        $obj = M("yy");
        import('ORG.Util.Page');// 导入分页类
        $where = "";
        $num = isset($_GET['num'])?$_GET['num']:20;
        $p = isset($_GET['p'])?$_GET['p']:1;
        //api--双击看详情
        if(isset($_GET['id'])){
            $row = $obj->where("id=".$_GET['id'])->find();
            printf(json_encode($row));
            exit;
        }
        //添加
        if($_POST){
            $data=array();
            $id = $this->_post("id");
            $data["num"] = trim($this->_post("num"));
            if($data["num"]==""){
                $this->error("所有带*号项都必填",U("Index/yy"));
            }
            $row = $obj->select();
            $count = count($row);
            $notice = "添加";
            if($id==""){         
                if($count>0){
                    $this->error("只能添加一个YY房间",U("Index/yy"));   
                }else{
                    $rs = $obj->add($data);       
                }
            }else{            
                $rs = $obj->where("id=".$id)->save($data);
                $notice = "修改";
            }
            if($rs){
                $this->success($notice."成功",U("Index/yy"));
                exit;
            }else{
                $this->error($notice."失败",U("Index/yy"));
            }
        }
        // //删除
        // if(isset($_GET['del'])){
        //     $idArr = explode(",",$_GET['del']);
        //     array_pop($idArr);
        //     $num = count($idArr);
        //     $err = 0;
        //     foreach($idArr as $k=>$v){
        //         $rs = $obj->where(" id=".$v)->delete();
        //         if($rs===false){
        //             $err+=1;
        //         }  
        //     }
        //     $suc = $num-$err;
        //     $this->error($suc."条数据删除成功，".$err."条数据删除失败",U('Index/announcement'));
        // }
        // //模糊搜索
        // if(isset($_GET['name'])){
        //     $name = $_GET['name'];
        //     $where = " name like '%".$name."%' ";
        // }
        $count = $obj->where($where)->count();// 查询满足要求的总记录数 $map表示查询条件
        $Page = new Page($count,$num);// 实例化分页类 传入总记录数
        $show = $Page->show();// 分页显示输出
        $list = $obj->where($where)->limit(($p-1)*$num,$num)->select();
        $this->assign('list',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->display();
    }
    public function say(){
                //登录验证
        $uname = $this->checkLogin();
        $this->assign("uname",$uname);

        $obj = M("say");
        import('ORG.Util.Page');// 导入分页类
        $where = "";
        $num = isset($_GET['num'])?$_GET['num']:20;
        $p = isset($_GET['p'])?$_GET['p']:1;
        //api--双击看详情
        if(isset($_GET['id'])){
            $row = $obj->where("id=".$_GET['id'])->find();
            printf(json_encode($row));
            exit;
        }
        //添加
        if($_POST){
            $data=array();
            $id = $this->_post("id");
            $data["type"] = trim($this->_post("type"));
            $data["cWei"] = trim($this->_post("cWei"));
            $data["good"] = trim($this->_post("good"));
            $data["openPrice"] = trim($this->_post("openPrice"));
            $data["endPrice"] = trim($this->_post("endPrice"));
            $data["sucPrice"] = trim($this->_post("sucPrice"));
            $data["openTm"] = date("Y-m-d H:i:s");
            if($data["type"]=="" || $data["cWei"]=="" || $data["good"]=="" || $data["openPrice"]=="" || $data["endPrice"]=="" || $data["sucPrice"]==""){
                $this->error("所有带*号项都必填",U("Index/say"));
            }
            $notice = "添加";
            if($id==""){         
                $rs = $obj->add($data);   
            }else{            
                $rs = $obj->where("id=".$id)->save($data);
                $notice = "修改";
            }
            if($rs){
                $this->success($notice."成功",U("Index/say"));
                exit;
            }else{
                $this->error($notice."失败",U("Index/say"));
            }
        }
        //删除
        if(isset($_GET['del'])){
            $idArr = explode(",",$_GET['del']);
            array_pop($idArr);
            $num = count($idArr);
            $err = 0;
            foreach($idArr as $k=>$v){
                $rs = $obj->where(" id=".$v)->delete();
                if($rs===false){
                    $err+=1;
                }  
            }
            $suc = $num-$err;
            $this->error($suc."条数据删除成功，".$err."条数据删除失败",U('Index/say'));
        }
        // //模糊搜索
        // if(isset($_GET['name'])){
        //     $name = $_GET['name'];
        //     $where = " good like '%".$name."%' ";
        // }
        $count = $obj->where($where)->count();// 查询满足要求的总记录数 $map表示查询条件
        $Page = new Page($count,$num);// 实例化分页类 传入总记录数
        $show = $Page->show();// 分页显示输出
        $list = $obj->where($where)->order("id desc")->limit(($p-1)*$num,$num)->select();
        $this->assign('list',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->display();
        // $sql = $ipBane->getLastSql;
    }
    public function subjectTable(){
                //登录验证
        $uname = $this->checkLogin();
        $this->assign("uname",$uname);

        $subject = M('subject');
        $list = $subject->select();
        $this->assign('list',$list);
        //修改或添加数据
        if($_POST){
            $num = (count($_POST)-1)/8;
            $data = array();
            foreach ($_POST as $k=>$v) {
                preg_match('/time(.*?)/U', $k, $tmp);
                preg_match('/one(.*?)/U', $k, $tmp1);
                preg_match('/two(.*?)/U', $k, $tmp2);
                preg_match('/three(.*?)/U', $k, $tmp3);
                preg_match('/four(.*?)/U', $k, $tmp4);
                preg_match('/five(.*?)/U', $k, $tmp5);
                preg_match('/six(.*?)/U', $k, $tmp6);
                preg_match('/seven(.*?)/U', $k, $tmp7);
                if($tmp[1]){
                    $a = $tmp[1];
                    $data[$a]['time'] = $v;
                }
                if($tmp1[1]){
                    $data[$a]['one'] = $v;
                }
                if($tmp2[1]){
                    $data[$a]['two'] = $v;
                }
                if($tmp3[1]){
                    $data[$a]['three'] = $v;
                }
                if($tmp4[1]){
                    $data[$a]['four'] = $v;
                }
                if($tmp5[1]){
                    $data[$a]['five'] = $v;
                }
                if($tmp6[1]){
                    $data[$a]['six'] = $v;
                }
                if($tmp7[1]){
                    $data[$a]['seven'] = $v;
                }
            }
            $error = 0;
            foreach ($data as $key=>$value) {
                if(is_numeric($key)){
                     $rs = $subject->where("id=".$key)->save($value);
                }else{
                    $rs = $subject->add($value);
                }
                if($rs===false){
                    $error+=1;
                }
            }
            if($error==0){
                $this->success("课程表更新成功",U("Index/subjectTable"));
                exit;
            }else{
                $this->error("有".$error."条数据出现错误,请重新修改",U("Index/subjectTable"));
            }
        }
        //删除某一条数据
        if(!empty($_GET['delete'])){
            $id = $_GET['delete'];
            $rs = $subject->where("id=".$id)->delete();
            if($rs){
                $this->success("删除成功",U('Index/subjectTable'));
                exit;
            }else{
                $this->error("删除成功",U('Index/subjectTable'));
            }
        }
		$this->display();
    }
    public function systemTable(){
                //登录验证
        $uname = $this->checkLogin();
        $this->assign("uname",$uname);

        $obj = M("system");
        $pic = M("picture");
        import('ORG.Util.Page');// 导入分页类
        $where = "";
        $num = isset($_GET['num'])?$_GET['num']:20;
        $p = isset($_GET['p'])?$_GET['p']:1;
        //api--双击看详情
        if(isset($_GET['id'])){
            $row = $obj->where("id=".$_GET['id'])->find();
            printf(json_encode($row));
            exit;
        }
        //添加
        if($_POST){
            $data=array();
            $id = $this->_post("id");
            $data["name"] = trim($this->_post("name"));
            $data["desc"] = trim($this->_post("desc"));
            $data["cycle"] = trim($this->_post("cycle"));
            $data["isOnlined"] = trim($this->_post("isOnlined"));
            $data["tm"] = date("Y-m-d H:i:s");
            $fileInfo = $this->upload();
            if($fileInfo!=0){
                $data['rFilePath'] = $fileInfo[0]['savepath'].$fileInfo[0]['savename'];
                $tmpFile1 = substr($data['rFilePath'],1);
                $data['aFilePath'] = __ROOT__.$tmpFile1;
            }
            if(in_array("",$data)){
                $this->error("所有带*号项都必填",U("Index/systemTable"));
            }
            $row = $obj->where("name='".$data["name"]."'")->select();
            $notice = "添加";
            if($id==""){         
                if($row){
                    $this->error("此系统消息已存在",U("Index/systemTable"));   
                }
                $rs = $obj->add($data);   
            }else{            
                if($row && $row[0]['id']!=$id){
                    $this->error("此系统消息已存在",U("Index/systemTable"));   
                }
                if(isset($data['aFilePath'])){
                    $oldInfo = $obj->where("id=".$id)->find();
                    unlink($oldInfo['rFilePath']);
                }
                $rs = $obj->where("id=".$id)->save($data);
                $notice = "修改";
            }
            if($rs){
                $this->success($notice."成功",U("Index/systemTable"));
                exit;
            }else{
                $this->error($notice."失败",U("Index/systemTable"));
            }
        }
        //删除
        if(isset($_GET['del'])){
            $idArr = explode(",",$_GET['del']);
            array_pop($idArr);
            $num = count($idArr);
            $err = 0;
            foreach($idArr as $k=>$v){
                $rs = $obj->where(" id=".$v)->delete();
                $dInfo = $obj->find();
                $pic->where(" id=".$dInfo['picId'])->delete();
                if($rs===false){
                    $err+=1;
                }  
            }
            $suc = $num-$err;
            $this->error($suc."条数据删除成功，".$err."条数据删除失败",U('Index/systemTable'));
        }
        //模糊搜索
        if(isset($_GET['name'])){
            $name = $_GET['name'];
            $where = " name like '%".$name."%' ";
        }
        $count = $obj->where($where)->count();// 查询满足要求的总记录数 $map表示查询条件
        $Page = new Page($count,$num);// 实例化分页类 传入总记录数
        $show = $Page->show();// 分页显示输出
        $list = $obj->where($where)->order('tm desc')->limit(($p-1)*$num,$num)->select();
        $this->assign('list',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->display();
        // $sql = $ipBane->getLastSql;
    }
    public function user(){
                //登录验证
        $uname = $this->checkLogin();
        $this->assign("uname",$uname);

        $obj = M("user");
        $rank = M("rank");
        $empUser = M("empuser");
        import('ORG.Util.Page');// 导入分页类
        $num = isset($_GET['num'])?$_GET['num']:20;
        $p = isset($_GET['p'])?$_GET['p']:1;
        //api--双击看详情
        if(isset($_GET['id'])){
            $row = $obj->where("t0.id=".$_GET['id'])->field("t0.*,r.name as rankName,(select IFNULL(l.ip,0) from loginrecord l where l.type=1 and l.userId=t0.id order by l.id desc limit 1) as lastLoginIp,(select IFNULL(l.endTm,0) from loginrecord l where l.type=1 and l.userId=t0.id order by l.id desc limit 1) as lastLoginTm")
                ->alias("t0")->join(array("rank r on r.id=t0.rankId"))->find();
            printf(json_encode($row));
            exit;
        }
        //修改
        if($_POST){
            $data=array();
            $id = $this->_post("id");
            $data["rankId"] = trim($this->_post("rankId"));
            $data["empUserId"] = trim($this->_post("empUserId"));
            $data["state"] = trim($this->_post("state"));
            $notice = "修改";            
            $rs = $obj->where("id=".$id)->save($data);
            if($rs===false){
                $this->error($notice."失败",U("Index/user"));
            }else{
                $this->success($notice."成功",U("Index/user"));
                exit;
            }
        }
        //删除
        // if(isset($_GET['del'])){
        //     $idArr = explode(",",$_GET['del']);
        //     array_pop($idArr);
        //     $num = count($idArr);
        //     $err = 0;
        //     foreach($idArr as $k=>$v){
        //         $rs = $ipBan->where(" id=".$v)->delete();
        //         if($rs===false){
        //             $err+=1;
        //         }  
        //     }
        //     $suc = $num-$err;
        //     $this->error($suc."条数据删除成功，".$err."条数据删除失败",U('Index/user'));
        // }
        //模糊搜索
        if(isset($_GET['name'])){
            $name = $_GET['name'];
            $where = " t0.uname like '%".$name."%' or t0.nickName like '%".$name."%' ";
        }
        $count = $obj->where($where)->count();// 查询满足要求的总记录数 $map表示查询条件
        $Page = new Page($count,$num);// 实例化分页类 传入总记录数
        $show = $Page->show();// 分页显示输出
        $list = $obj->where($where)->order('t0.tm desc')->field("t0.*,emp.uname as empUserName,r.name as rankName,(select IFNULL(l.ip,0) from loginrecord l where l.type=1 and l.userId=t0.id order by l.id desc limit 1) as lastLoginIp,(select IFNULL(l.endTm,0) from loginrecord l where l.type=1 and l.userId=t0.id order by l.id desc limit 1) as lastLoginTm")->alias("t0")->join(array("rank r on r.id=t0.rankId","empuser emp on emp.id=t0.empUserId"))->limit(($p-1)*$num,$num)->select();
        $rankList = $rank->where("type=0")->select();
        $empUserList = $empUser->where("r.name like '%客服%'")->alias("t0")->field("t0.*,r.name as rankName")->join("rank r on r.id=t0.rankId")->select();
        $this->assign('rankList',$rankList);
        $this->assign('empUserList',$empUserList);
        $this->assign('list',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->display();
        // $sql = $ipBane->getLastSql;
    }
    public function userType(){
                //登录验证
        $uname = $this->checkLogin();
        $this->assign("uname",$uname);

        $obj = M("rank");
        import('ORG.Util.Page');// 导入分页类
        $where = "type=0";
        $num = isset($_GET['num'])?$_GET['num']:20;
        $p = isset($_GET['p'])?$_GET['p']:1;
        //api--双击看详情
        if(isset($_GET['id'])){
            $row = $obj->where("id=".$_GET['id'])->find();
            printf(json_encode($row));
            exit;
        }
        //添加
        if($_POST){
            $data=array();
            $id = $this->_post("id");
            $data["name"] = trim($this->_post("name"));
            $data["note"] = trim($this->_post("note"));
            $data["allowTm"] = trim($this->_post("allowTm"));
            $data["type"] = 0;
            $fileInfo = $this->upload();
            if($fileInfo!=0){
                $data['rFilePath'] = $fileInfo[0]['savepath'].$fileInfo[0]['savename'];
                $tmpFile1 = substr($data['rFilePath'],1);
                $data['aFilePath'] = __ROOT__.$tmpFile1;
            }
            if($data["note"]=="" || $data["name"]=="" || $data['allowTm']==""){
                $this->error("所有带*号项都必填",U("Index/userType"));
            }
            $row = $obj->where("type = 0 and name='".$data["name"]."'")->select();
            $notice = "添加";
            if($id==""){         
                if($row){
                    $this->error("此会员类型已存在",U("Index/userType"));   
                }
                $rs = $obj->add($data);   
            }else{            
                if($row && $row[0]['id']!=$id){
                    $this->error("此会员类型已存在",U("Index/userType"));   
                }
                if(isset($data['aFilePath'])){
                    $oldInfo = $obj->where("id=".$id)->find();
                    unlink($oldInfo['rFilePath']);
                }
                $rs = $obj->where("id=".$id)->save($data);
                $notice = "修改";
            }
            if($rs===false){
                $this->error($notice."失败",U("Index/userType"));
            }else{
                $this->success($notice."成功",U("Index/userType"));
                exit;
            }
        }
        //删除
        if(isset($_GET['del'])){
            $idArr = explode(",",$_GET['del']);
            array_pop($idArr);
            $num = count($idArr);
            $err = 0;
            foreach($idArr as $k=>$v){
                $rs = $obj->where(" id=".$v)->delete();
                if($rs===false){
                    $err+=1;
                }  
            }
            $suc = $num-$err;
            $this->error($suc."条数据删除成功，".$err."条数据删除失败",U('Index/userType'));
        }
        //模糊搜索
        if(isset($_GET['name'])){
            $name = $_GET['name'];
            $where .= " and name like '%".$name."%' ";
        }
        $count = $obj->where($where)->count();// 查询满足要求的总记录数 $map表示查询条件
        $Page = new Page($count,$num);// 实例化分页类 传入总记录数
        $show = $Page->show();// 分页显示输出
        $list = $obj->where($where)->order('id desc')->limit(($p-1)*$num,$num)->select();
        $this->assign('list',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->display();
        // $sql = $ipBane->getLastSql;
    }
    public function empUserType(){
                //登录验证
        $uname = $this->checkLogin();
        $this->assign("uname",$uname);

        $obj = M("rank");
        import('ORG.Util.Page');// 导入分页类
        $where = "type=1";
        $num = isset($_GET['num'])?$_GET['num']:20;
        $p = isset($_GET['p'])?$_GET['p']:1;
        //api--双击看详情
        if(isset($_GET['id'])){
            $row = $obj->where("id=".$_GET['id'])->find();
            printf(json_encode($row));
            exit;
        }
        //添加
        if($_POST){
            $data=array();
            $id = $this->_post("id");
            $data["name"] = trim($this->_post("name"));
            $data["note"] = trim($this->_post("note"));
            $data["type"] = 1;
            $fileInfo = $this->upload();
            if($fileInfo!=0){
                $data['rFilePath'] = $fileInfo[0]['savepath'].$fileInfo[0]['savename'];
                $tmpFile1 = substr($data['rFilePath'],1);
                $data['aFilePath'] = __ROOT__.$tmpFile1;
            }
            if($data["note"]=="" || $data["name"]==""){
                $this->error("所有带*号项都必填",U("Index/empUserType"));
            }
            $row = $obj->where("type = 1 and name='".$data["name"]."'")->select();
            $notice = "添加";
            if($id==""){         
                if($row){
                    $this->error("此管理员类型已存在",U("Index/empUserType"));   
                }
                $rs = $obj->add($data);   
            }else{            
                if($row && $row[0]['id']!=$id){
                    $this->error("此管理员类型已存在",U("Index/empUserType"));   
                }
                if(isset($data['aFilePath'])){
                    $oldInfo = $obj->where("id=".$id)->find();
                    unlink($oldInfo['rFilePath']);
                }
                $rs = $obj->where("id=".$id)->save($data);
                $notice = "修改";
            }
            if($rs===false){
                $this->error($notice."失败",U("Index/empUserType"));
            }else{
                $this->success($notice."成功",U("Index/empUserType"));
                exit;
            }
        }
        //删除
        if(isset($_GET['del'])){
            $idArr = explode(",",$_GET['del']);
            array_pop($idArr);
            $num = count($idArr);
            $err = 0;
            foreach($idArr as $k=>$v){
                $rs = $obj->where(" id=".$v)->delete();
                if($rs===false){
                    $err+=1;
                }  
            }
            $suc = $num-$err;
            $this->error($suc."条数据删除成功，".$err."条数据删除失败",U('Index/empUserType'));
        }
        //模糊搜索
        if(isset($_GET['name'])){
            $name = $_GET['name'];
            $where .= " and name like '%".$name."%' ";
        }
        $count = $obj->where($where)->count();// 查询满足要求的总记录数 $map表示查询条件
        $Page = new Page($count,$num);// 实例化分页类 传入总记录数
        $show = $Page->show();// 分页显示输出
        $list = $obj->where($where)->order('id desc')->limit(($p-1)*$num,$num)->select();
        $this->assign('list',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->display();
        // $sql = $ipBane->getLastSql;
    }
    public function empUser(){
                //登录验证
        $uname = $this->checkLogin();
        $this->assign("uname",$uname);

        $obj = M("empuser");
        $rank = M("rank");
        $where = "";
        import('ORG.Util.Page');// 导入分页类
        $num = isset($_GET['num'])?$_GET['num']:20;
        $p = isset($_GET['p'])?$_GET['p']:1;
        //api--双击看详情
        if(isset($_GET['id'])){
            $row = $obj->where("t0.id=".$_GET['id'])->field("t0.*,r.name as rankName")->alias("t0")->join("rank r on r.id=t0.rankId")->find();
            printf(json_encode($row));
            exit;
        }
        //添加
        if($_POST){
            $data=array();
            $id = $this->_post("id");
            $data["uname"] = trim($this->_post("uname"));
            $data["nickName"] = trim($this->_post("nickName"));
            $data["pwd1"] = trim($this->_post("pwd1"));
            $data["pwd2"] = trim($this->_post("pwd2"));
            $data["sex"] = trim($this->_post("sex"));
            $data["phone"] = trim($this->_post("phone"));
            $data["rankId"] = trim($this->_post("rankId"));
            if($data["uname"]=="" || $data["nickName"]==""){
                $this->error("所有带*号项都必填",U("Index/empUser"));
            }
            if($data['pwd1']!="" || $data['pwd2']!=""){
                if($data['pwd1']!=$data['pwd1']){
                    $this->error("两次输入的密码不一致",U("Index/empUser"));       
                }
            }
            $row = $obj->where("uname='".$data["uname"]."'")->select();
            $count = count($row);
            $notice = "添加";
            if($id==""){         
                if($count>0){
                    $this->error("此管理员已存在",U("Index/empUser"));   
                }
                if($data['pwd1']=="" && $data['pwd2']==""){
                    $this->error("所有带*号都是必填项",U("Index/empUser"));      
                }
                $data['tm'] = date('Y-m-d H:i:s');
                $data['pwd'] =md5($data['pwd1']);
                unset($data['pwd1']);
                unset($data['pwd2']);
                $rs = $obj->add($data);   
            }else{            
                if($count>1){
                    $this->error("此管理员已存在",U("Index/empUser"));   
                }
                $data['pwd'] = md5($data['pwd1']);
                if($data['pwd1']=="" && $data['pwd2']==""){
                    unset($data['pwd']);
                }
                unset($data['pwd1']);
                unset($data['pwd2']);
                $rs = $obj->where("id=".$id)->save($data);
                $notice = "修改";
            }
            if($rs===false){
                $this->error($notice."失败",U("Index/empUser"));
            }else{
                $this->success($notice."成功",U("Index/empUser"));
                exit;
            }
        }
        //删除
        if(isset($_GET['del'])){
            $idArr = explode(",",$_GET['del']);
            array_pop($idArr);
            $num = count($idArr);
            $err = 0;
            foreach($idArr as $k=>$v){
                $rs = $obj->where(" id=".$v)->delete();
                if($rs===false){
                    $err+=1;
                }  
            }
            $suc = $num-$err;
            $this->error($suc."条数据删除成功，".$err."条数据删除失败",U('Index/empUser'));
        }
        //模糊搜索
        if(isset($_GET['name'])){
            $name = $_GET['name'];
            $where = " uname like '%".$name."%' ";
        }
        $count = $obj->where($where)->count();// 查询满足要求的总记录数 $map表示查询条件
        $Page = new Page($count,$num);// 实例化分页类 传入总记录数
        $show = $Page->show();// 分页显示输出
        $list = $obj->where($where)->field("t0.*,r.name as rankName")->alias("t0")->join("rank r on r.id=t0.rankId")->order('tm desc')->limit(($p-1)*$num,$num)->select();
        $rankList = $rank->where("type=1")->select();
        $this->assign('list',$list);// 赋值数据集
        $this->assign('rankList',$rankList);
        $this->assign('page',$show);// 赋值分页输出
        $this->display();
        // $sql = $ipBane->getLastSql;
    }
    public function tmpuser(){
                //登录验证
        $uname = $this->checkLogin();
        $this->assign("uname",$uname);

        $obj = M("tmpuser");
        import('ORG.Util.Page');// 导入分页类
        $num = isset($_GET['num'])?$_GET['num']:20;
        $p = isset($_GET['p'])?$_GET['p']:1;
        //api--双击看详情
        if(isset($_GET['id'])){
            $row = $obj->where("t0.id=".$_GET['id'])->field("t0.*,(select IFNULL(l.endTm,0) from loginrecord l where l.type=0 and l.userId=t0.id order by l.id desc limit 1) as lastLoginTm")
                ->alias("t0")->find();
            printf(json_encode($row));
            exit;
        }
        //修改
        if($_POST){
            $data=array();
            $id = $this->_post("id");
            $data["state"] = trim($this->_post("state"));
            $notice = "修改";            
            $rs = $obj->where("id=".$id)->save($data);
            if($rs===false){
                $this->error($notice."失败",U("Index/tmpuser"));
            }else{
                $this->success($notice."成功",U("Index/tmpuser"));
                exit;
            }
        }
        //模糊搜索
        if(isset($_GET['name'])){
            $name = $_GET['name'];
            $where = " t0.uname like '%".$name."%' ";
        }
        $count = $obj->where($where)->count();// 查询满足要求的总记录数 $map表示查询条件
        $Page = new Page($count,$num);// 实例化分页类 传入总记录数
        $show = $Page->show();// 分页显示输出
        $list = $obj->where($where)->order('t0.tm desc')->field("t0.*,(select IFNULL(l.endTm,0) from loginrecord l where l.type=0 and l.userId=t0.id order by l.id desc limit 1) as lastLoginTm")->alias("t0")->limit(($p-1)*$num,$num)->select();
        $this->assign('list',$list);
        $this->assign('page',$show);
        $this->display();
    }
    public function column(){
        //登录验证
        $uname = $this->checkLogin();
        $this->assign("uname",$uname);
        $obj = M("column");
        import('ORG.Util.Page');// 导入分页类
        $num = isset($_GET['num'])?$_GET['num']:20;
        $p = isset($_GET['p'])?$_GET['p']:1;
        //api--双击看详情
        if(isset($_GET['id'])){
            $row = $obj->where("id=".$_GET['id'])->find();
            printf(json_encode($row));
            exit;
        }
        //添加
        if($_POST){
            $data=array();
            $id = $this->_post("id");
            $data["name"] = trim($this->_post("name"));
            if($data["name"]==""){
                $this->error("所有带*号项都必填",U("Index/column"));
            }
            $fileInfo = $this->upload();
            if($fileInfo!=0){
                $data['rFilePath'] = $fileInfo[0]['savepath'].$fileInfo[0]['savename'];
                $tmpFile1 = substr($data['rFilePath'],1);
                $data['aFilePath'] = __ROOT__.$tmpFile1;
            }
            $row = $obj->where("name='".$data["name"]."'")->select();
            $notice = "添加";
            if($id==""){         
                if($row){
                    $this->error("此栏目已存在",U("Index/column"));   
                }
                $rs = $obj->add($data);   
            }else{            
                if($row && $row[0]['id']!=$id){
                    $this->error("此栏目已存在",U("Index/column"));   
                }
                if(isset($data['aFilePath'])){
                    $oldInfo = $obj->where("id=".$id)->find();
                    unlink($oldInfo['rFilePath']);
                }
                $rs = $obj->where("id=".$id)->save($data);
                $notice = "修改";
            }
            if($rs===false){
                $this->error($notice."失败",U("Index/column"));
            }else{
                $this->success($notice."成功",U("Index/column"));
                exit;
            }
        }
        //删除
        if(isset($_GET['del'])){
            $idArr = explode(",",$_GET['del']);
            array_pop($idArr);
            $num = count($idArr);
            $err = 0;
            foreach($idArr as $k=>$v){
                $rs = $obj->where(" id=".$v)->delete();
                if($rs===false){
                    $err+=1;
                }  
            }
            $suc = $num-$err;
            $this->error($suc."条数据删除成功，".$err."条数据删除失败",U('Index/column'));
        }
        //模糊搜索
        if(isset($_GET['name'])){
            $name = $_GET['name'];
            $where = " name like '%".$name."%' ";
        }
        $count = $obj->where($where)->count();// 查询满足要求的总记录数 $map表示查询条件
        $Page = new Page($count,$num);// 实例化分页类 传入总记录数
        $show = $Page->show();// 分页显示输出
        $list = $obj->where($where)->order('id desc')->limit(($p-1)*$num,$num)->select();
        $this->assign('list',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->display();
    }
}