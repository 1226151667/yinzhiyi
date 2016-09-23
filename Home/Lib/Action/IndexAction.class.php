<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {
	public function checkIp(){
		$tmpuser = M("tmpuser");
		$ip = $this->getIp();
		$rs = $tmpuser->where("ip='{$ip}' and state=1")->find();
		if($rs){
			$this->success("你访问的页面去偷懒了",U("Index/fail"));
			exit;
		}
	}
	public function checkLogin(){
		if(isset($_SESSION['empUserId']) || isset($_SESSION['userId'])){
			$this->success("亲，你已经登录了，如需换个账号登录，请注销再试",U("Index/index"));
			exit;
		}
	}
	public function checkPower(){
		if(isset($_SESSION['tmpUserId'])){
			$this->success("亲，只有登录才能看哦！",U("Index/land"));
			exit;
		}
	}
	public function checkCookie(){
		if(isset($_COOKIE['userId'])){
			$_SESSION['userId'] = $_COOKIE['userId'];
			// $this->redirect(U("Index/index"));
		} 
		if(isset($_COOKIE['empUserId'])){
			$_SESSION['empUserId'] = $_COOKIE['empUserId'];	
			// $this->redirect(U("Index/index"));
		}
	}
    public function land(){
    	$this->checkIp();
    	$this->checkCookie();
    	$this->checkLogin();
		$user = M('user');
		$empuser = M('empuser');
		if($_POST){
			$uname = $this->_post('uname');
			$pwd = $this->_post('pwd');
			if($uname=='' || $pwd==''){
				$this->error("输入都不能为空");
			}
			$userInfo = $user->where('`uname`="'.$uname.'"')->find();
			$empuserInfo = $empuser->where('`uname`="'.$uname.'"')->find();
			if($userInfo || $empuserInfo){
				if($userInfo){
					if($userInfo['pwd']==md5($pwd)){
						if($userInfo['state']==1){
							$this->error("不好意思，你的账号可能因为某些原因被禁止登陆了，如需解禁，请联系QQ 12639368",U("Index/index"),5);
						}
						$_SESSION['userId'] = $userInfo['id'];
						if(isset($_POST['psw'])){
							setcookie("userId",$userInfo['id'],time()+3600*24*365,"./Home");
						}
						$this->success('登录成功',U('Index/index'));
						exit;
					}else{
						$this->error('密码错误');
					}
				}
				if($empuserInfo){
					if($empuserInfo['pwd']==md5($pwd)){
						$_SESSION['empUserId'] = $empuserInfo['id'];
						if(isset($_POST['psw'])){
							setcookie("empUserId",$empuserInfo['id'],time()+3600*24*365,"./Home");
						}
						$this->success('登录成功',U('Index/index'));
						exit;
					}else{
						$this->error('密码错误');
					}
				}
			}else{
				$this->error('用户名不存在');
			}			
		}
		$this->display();
    }
	public function enroll(){
		$this->checkIp();
		$this->checkLogin();
		if($_POST){
			$obj = M('user');
			$uname = trim($this->_post('uname'));
			$nickName = trim($this->_post('nickName'));
			$pwd1 = trim($this->_post('pwd1'));
			$pwd2 = trim($this->_post('pwd2'));
			$qq = trim($this->_post('qq'));
			$phone = trim($this->_post('phone'));
			$ip = $this->getIp();
			if($uname=='' || $nickName=='' || $pwd1=='' || $pwd2=='' || $qq=='' || $phone==''){
				$this->error('输入不能有空');
			}
			if($pwd1!=$pwd2){
				$this->error('两次输入的密码不一致');
			}
			$rs = $obj->where('`uname`="'.$uname.'"')->find();
			if($rs){
				$this->error('用户名已存在');
			}
			$pwd = md5($pwd1);
			$data = array(
				'uname' => "{$uname}",
				'nickName' => "{$nickName}",
				'pwd' => "{$pwd}",
				'qq' => "{$qq}",
				'phone' => "{$phone}",
				'tm' => date("Y-m-d H:i:s"),
				'ip' => "{$ip}",
				'rankId' =>2
			);
			$rs = $obj->add($data);
			if($rs){
				$this->success("注册成功",U("Index/land"));
				exit;
			}else{
				$this->error('注册失败');
			}
		}
		$this->display();
    }
	public function index(){
		$this->checkIp();
		$this->checkCookie();
		$subject = M("subject");
		$gGao = M("announcement");
		$tmpUser = M("tmpuser");
		$empUser = M("empuser");
		$user = M("user");
		$baseinfo = M("baseinfo");
		$system = M("system");
		$chat = M("chat");
		$loginRecord = M("loginrecord");
		$column = M("column");
		$yy = M("yy");
		//获取用户ID和用户类型
		if($_SESSION['userId']){
			$userId = $_SESSION['userId'];
			$userType = 1;
		}
		if($_SESSION['tmpUserId']){
			$userId = $_SESSION['tmpUserId'];
			$userType = 0;
		}
		if($_SESSION['empUserId']){
			$userId = $_SESSION['empUserId'];
			$userType = 2;
		}
		//修改老师
		if(isset($_GET['lsId'])){
			$empUser->where("isSay=1")->save(array("isSay"=>0));
			$empUser->where("id=".$_GET['lsId'])->save(array("isSay"=>1));
			exit;
		}
		// $this->assign("onlineUser",$onLineUser);
		//注销登录
		if(isset($_GET['logout'])){
			if($_GET['logout'] == 'ok'){
				if(isset($_SESSION['userId'])){
					if(isset($_COOKIE['userId'])){
						echo 1;
						setcookie("userId","",time()-1,"./Home");
						var_dump($_COOKIE);
					}
					unset($_SESSION['userId']);	
				}
				if(isset($_SESSION['empUserId'])){
					if(isset($_COOKIE['empUserId'])){
						echo 2;
						setcookie("empUserId","",time()-1,"./Home");
					}
					unset($_SESSION['empUserId']);	
				}
				header("location:U('Index/index')");
			}
		}
		//修改密码
		if(isset($_GET['editPwd'])){
			if($_GET['editPwd'] == 'ok'){
				$old = trim($_GET['oldPwd']);
				$new1 = trim($_GET['newPwd1']);
				$new2 = trim($_GET['newPwd2']);
				if($old=='' || $new1=='' || $new2==''){
					printf(1);//"所有选项都是必填项"
					exit;
				}
				if($new1 != $new2){
					printf(2);//"新密码两次输入不一致"
					exit;
				}
				if($new1 == $old){
					printf(3);//"新密码与旧密码一致"
					exit;
				}
				$old = md5($old);
				if(isset($_SESSION['userId'])){
					$userFind = $user->where("id=".$_SESSION['userId']." and pwd='".$old."'")->find();
					if($userFind){
						$editPwd = array();
						$editPwd['pwd'] = md5($new1);
						$rs = $user->where("id=".$_SESSION['userId'])->save($editPwd);
						if($rs){
							unset($_SESSION['userId']);
							printf(0);
							exit;
						}else{
							printf(4);//"修改密码失败"
							exit;
						}
					}else{
						printf(5);//"旧密码错误"
						exit;
					}
				}
				if(isset($_SESSION['empUserId'])){
					$empUserFind = $empUser->where("id=".$_SESSION['empUserId']." and pwd='".$old."'")->find();
					if($empUserFind){
						$editPwd = array();
						$editPwd['pwd'] = md5($new1);
						$rs = $empUser->where("id=".$_SESSION['empUserId'])->save($editPwd);
						if($rs){
							unset($_SESSION['empUserId']);
							printf(0);
							exit;
						}else{
							printf(4);//"修改密码失败"
							exit;
						}
					}else{
						printf(5);//"旧密码错误"
						exit;
					}
				}
			}
		}
		//修改个人资料
		if(isset($_POST['editOwnInfo'])){
			if($_POST['editOwnInfo']=='ok'){
				$ownInfoData['nickName'] = trim($this->_post("nickName"));
				$ownInfoData['sex'] = trim($this->_post("sex"));
				$ownInfoData['qq'] = trim($this->_post("qq"));
				$ownInfoData['email'] = trim($this->_post("email"));
				if($ownInfoData['nickName']==''){
					printf(1);
					exit;
				}
				if(isset($_SESSION['empUserId'])){
					$rs = $empUser->where("id=".$_SESSION['empUserId'])->save($ownInfoData);	
				}
				if(isset($_SESSION['userId'])){
					$rs = $user->where("id=".$_SESSION['userId'])->save($ownInfoData);	
				}
				if($rs===false){
					printf(2);
					exit;	
				}else{
					printf(0);
					exit;
				}
			}
		}	
		//发送聊天信息
		if(isset($_POST['content']) && isset($_POST['toUserId']) && isset($_POST['toUserType'])){
			$data['content'] = $_POST['content'];
			$data['toUserId'] = $_POST['toUserId'];
			$data['toUserType'] = $_POST['toUserType'];
			$data['userId'] = $userId;
			$data['userType'] = $userType;
			$data['tm'] = date('Y-m-d H:i:s');
			$chat->add($data);
			// $chatList = $chat->order("t0.id")->field("t0.*,(case userType when 0 then '__PUBLIC__/images/User14.png' when 2 then (select r.aFilePath from empuser e left join rank r on r.id=e.rankId where t0.userId=e.id) else (select r.aFilePath from user u left join rank r on r.id=u.rankId where t0.userId=u.id) end) as userPic,(case toUserType when 0 then '__PUBLIC__/images/User14.png' when 2 then (select r.aFilePath from empuser e left join rank r on r.id=e.rankId where t0.toUserId=e.id) when 1 then (select r.aFilePath from user u left join rank r on r.id=u.rankId where t0.toUserId=u.id) else '' end) as toUserPic,(case userType when 0 then (select t.uname from tmpuser t where t0.userId=t.id) when 2 then (select e.nickName from empuser e where t0.userId=e.id) else (select u.nickName from user u where t0.userId=u.id) end) as userName,(case toUserType when 0 then (select t.uname from tmpuser t where t0.toUserId=t.id) when 2 then (select e.nickName from empuser e where t0.toUserId=e.id) when 1 then (select u.nickName from user u where t0.toUserId=u.id) else '' end) as toUserName")
			// 	->alias("t0")->select();
			// printf(json_encode($chatList));
			exit;
		}
		//实时更新聊天记录
		if(isset($_GET['refresh'])){
			if($_GET['refresh']=='ok'){
				$loginData["endTm"] = date("Y-m-d H:i:s"); 
				$loginRecord->alias("t0,(select id from loginrecord where userId={$userId} and type={$userType} order by id desc limit 1) b")->where("t0.id=b.id")->setField($loginData);
				$chatMaxId = $_GET['chatMaxId'];
				if($chatMaxId==null){
					$chatList = $chat->order("t0.id")->field("t0.*,(case userType when 0 then '/yinzhiyi/Home/Public/images/User14.png' when 2 then (select r.aFilePath from empuser e left join rank r on r.id=e.rankId where t0.userId=e.id) else (select r.aFilePath from user u left join rank r on r.id=u.rankId where t0.userId=u.id) end) as userPic,(case toUserType when 0 then '/yinzhiyi/Home/Public/images/User14.png' when 2 then (select r.aFilePath from empuser e left join rank r on r.id=e.rankId where t0.toUserId=e.id) when 1 then (select r.aFilePath from user u left join rank r on r.id=u.rankId where t0.toUserId=u.id) else '' end) as toUserPic,(case userType when 0 then (select t.uname from tmpuser t where t0.userId=t.id) when 2 then (select e.nickName from empuser e where t0.userId=e.id) else (select u.nickName from user u where t0.userId=u.id) end) as userName,(case toUserType when 0 then (select t.uname from tmpuser t where t0.toUserId=t.id) when 2 then (select e.nickName from empuser e where t0.toUserId=e.id) when 1 then (select u.nickName from user u where t0.toUserId=u.id) else '' end) as toUserName")
						->alias("t0")->select();
				}else{
					$chatList = $chat->order("t0.id")->where("t0.id>".$chatMaxId)->field("t0.*,(case userType when 0 then '/yinzhiyi/Home/Public/images/User14.png' when 2 then (select r.aFilePath from empuser e left join rank r on r.id=e.rankId where t0.userId=e.id) else (select r.aFilePath from user u left join rank r on r.id=u.rankId where t0.userId=u.id) end) as userPic,(case toUserType when 0 then '/yinzhiyi/Home/Public/images/User14.png' when 2 then (select r.aFilePath from empuser e left join rank r on r.id=e.rankId where t0.toUserId=e.id) when 1 then (select r.aFilePath from user u left join rank r on r.id=u.rankId where t0.toUserId=u.id) else '' end) as toUserPic,(case userType when 0 then (select t.uname from tmpuser t where t0.userId=t.id) when 2 then (select e.nickName from empuser e where t0.userId=e.id) else (select u.nickName from user u where t0.userId=u.id) end) as userName,(case toUserType when 0 then (select t.uname from tmpuser t where t0.toUserId=t.id) when 2 then (select e.nickName from empuser e where t0.toUserId=e.id) when 1 then (select u.nickName from user u where t0.toUserId=u.id) else '' end) as toUserName")->alias("t0")->select();
				}
				printf(json_encode($chatList));
				exit;
			}
		}

		//在线用户
		if(isset($_GET['onlineUser'])){
			if($_GET['onlineUser']=="ok"){
				$now = date("Y-m-d H:i:s",strtotime("-3 second"));
				$onLineUser = $loginRecord->alias("t0")->field("(case type when 0 then '/yinzhiyi/Home/Public/images/User14.png' when 2 then (select r.aFilePath from empuser e left join rank r on r.id=e.rankId where t0.userId=e.id) else (select r.aFilePath from user u left join rank r on r.id=u.rankId where t0.userId=u.id) end) as userPic,(case type when 0 then (select t.uname from tmpuser t where t0.userId=t.id) when 2 then (select e.nickName from empuser e where t0.userId=e.id) else (select u.nickName from user u where t0.userId=u.id) end) as userName")->where("t0.endTm>'{$now}'")->select();
				foreach ($onLineUser as $k1=>$v1) {
					foreach ($onLineUser as $k2=>$v2) {
						if($v1==$v2 && $k1!=$k2){
							unset($onLineUser[$k2]);
						}
					}
				}
				printf(json_encode($onLineUser));
				exit;
			}
		}

		//网站基础设置
		$baseInfoA = array(        //默认设置
				"title" => "富升财经",
				"key" => "富升财经直播室，原油、现货、贵金属投资，名师专业指导",
				"description" => "富升财经直播室，原油、现货、贵金属投资,有名师专家一对一指导，轻松投资理财",
				"onlineCnt" => "2403",
				"qq" => '["1226151667","1163023145"]'
			);
		$baseInfo = $baseinfo->where("page='index'")->find();
		if(!$baseInfo){
			$baseInfo = $baseInfoA;	
		}else{
			$qqTmp0 = str_replace("，", ",", $baseInfo['qq']);
			$qqTmp1 = explode(",",$qqTmp0);
			$baseInfo['qq'] = json_encode($qqTmp1);
		}
		$this->assign("baseInfo",$baseInfo);
		//游客
		$data = array();
		$tmpData = array();
		// $TmpUser = array();
		$ip = $this->getIp();
		$tmpUserInfo = $tmpUser->where("ip='".$ip."'")->find();
		if($tmpUserInfo){
			$data['type'] = 0;
			$data['userId'] = $tmpUserInfo['id'];
			$data['endTm'] = $data['tm'] = date("Y-m-d H:i:s");
			$_SESSION['tmpUserId'] = $tmpUserInfo['id'];
			$this->assign("tmpUserInfo",$tmpUserInfo);
		}else{
			$tmpData['uname'] = "游客_".rand(100000,999999);
			$tmpData['ip'] = $ip;
			$tmpData['tm'] = date("Y-m-d H:i:s");
			$tmpData['lastLoginTm'] = date("Y-m-d H:i:s");
			$id = $tmpUser->add($tmpData);
			if($id){
				$_SESSION['tmpUserId'] = $id;
				$data['type'] = 0;
				$data['userId'] = $id;
				$data['endTm'] = $data['tm'] = date("Y-m-d H:i:s");
				$_SESSION['tmpUserId'] = $id;
				$this->assign("tmpUserInfo",$tmpData);
			}
		}
		//会员
		if(isset($_SESSION['userId'])){
			$userInfo = $user->field("t0.*,r.name as rankName,r.aFilePath as pic,eu.nickName as empNickName")->alias("t0")->where("t0.id=".$_SESSION['userId'])->join(array("rank r on r.id=t0.rankId","empuser eu on eu.id=t0.empUserId"))->find();
			if(!$userInfo){
				unset($_SESSION['userId']);
				$tmpUserInfo = $tmpUser->where("ip=".$ip)->find();
				if(!$tmpUserInfo){
					$tmpData['uname'] = "游客_".rand(100000,999999);
					$tmpData['ip'] = $ip;
					$tmpData['tm'] = date("Y-m-d H:i:s");
					$tmpData['lastLoginTm'] = date("Y-m-d H:i:s");
					$id = $tmpUser->add($tmpData);
					if($id){
						$_SESSION['tmpUserId'] = $id;
						$data['type'] = 0;
						$data['userId'] = $id;
						$data['endTm'] = $data['tm'] = date("Y-m-d H:i:s");
						$this->assign("tmpUserInfo",$tmpData);
					}
				}else{
					$_SESSION['tmpUserId'] = $tmpUserInfo['id'];
					$data['type'] = 0;
					$data['userId'] = $tmpUserInfo['id'];
					$data['endTm'] = $data['tm'] = date("Y-m-d H:i:s");
					$this->assign("tmpUserInfo",$tmpUserInfo);
				} 
			}else{
				unset($_SESSION['tmpUserId']);
				$data['type'] = 1;
				$data['userId'] = $_SESSION['userId'];
				$data['endTm'] = $data['tm'] = date("Y-m-d H:i:s");
				$this->assign("userInfo",$userInfo);		
			}
		}
		//管理员
		if(isset($_SESSION['empUserId'])){
			unset($_SESSION['tmpUserId']);
			$empUserInfo = $empUser->alias("t0")->field("t0.*,r.name as rankName,r.aFilePath as pic")->where("t0.id=".$_SESSION['empUserId'])->join("rank r on r.id=t0.rankId")->find();
			$data['type'] = 2;
			$data['userId'] = $_SESSION['empUserId'];
			$data['endTm'] = $data['tm'] = date("Y-m-d H:i:s");
			if($empUserInfo['rankName']=='老师'){
				$empUserInfo['ls']='yes';
			}
			$this->assign("empUserInfo",$empUserInfo);	
		}
		//个人信息
		if(isset($_GET['ownInfo'])){
			if($_GET['ownInfo']=='ok'){
				if(isset($_SESSION['userId'])){
					$ownInfo = $userInfo;	
				}
				if(isset($_SESSION['empUserId'])){
					$ownInfo = $empUserInfo;	
				}
				printf(json_encode($ownInfo));
				exit;
			}
		}
		//聊天室
		$chatList = $chat->order("t0.id")->field("t0.*,(case userType when 0 then '__PUBLIC__/images/User14.png' when 2 then (select r.aFilePath from empuser e left join rank r on r.id=e.rankId where t0.userId=e.id) else (select r.aFilePath from user u left join rank r on r.id=u.rankId where t0.userId=u.id) end) as userPic,(case toUserType when 0 then '__PUBLIC__/images/User14.png' when 2 then (select r.aFilePath from empuser e left join rank r on r.id=e.rankId where t0.toUserId=e.id) when 1 then (select r.aFilePath from user u left join rank r on r.id=u.rankId where t0.toUserId=u.id) else '' end) as toUserPic,(case userType when 0 then (select t.uname from tmpuser t where t0.userId=t.id) when 2 then (select e.nickName from empuser e where t0.userId=e.id) else (select u.nickName from user u where t0.userId=u.id) end) as userName,(case toUserType when 0 then (select t.uname from tmpuser t where t0.toUserId=t.id) when 2 then (select e.nickName from empuser e where t0.toUserId=e.id) when 1 then (select u.nickName from user u where t0.toUserId=u.id) else '' end) as toUserName")
				->alias("t0")->select();
		$this->assign('chatList',$chatList);
		//登录记录
		$lastTm = $loginRecord->field("endTm")->order("id desc")->where("userId={$userId} and type={$userType}")->find();
		$time1 = strtotime($lastTm['endTm']);
		if(($time1+5)<time()){
			$loginRecord->add($data);	
		}
		//yy号
		$yyH = $yy->find();
		//老师列表
		$lsList = $empUser->where("r.name like '%老师%'")->field("t0.id,t0.nickName,t0.isSay")->join("left join rank r on r.id=t0.rankId")->alias("t0")->select();
		//课程表
		$subjectList = $subject->select();
		//公告
		$gGaoList = $gGao->find();
		//系统消息
		$sysList = $system->where("isOnlined=1")->select();
		//栏目
		$colList = $column->select();
		//清除今天之前的聊天记录
		$now = date("Y-m-d 00:00:00");
		$chat->where("tm<'{$now}'")->delete();

		$this->assign("colList",$colList);
		$this->assign("sysList",$sysList);
		$this->assign("lsList",$lsList);
		$this->assign("yyH",$yyH);
		$this->assign("subjectList",$subjectList);
		$this->assign("gGaoList",$gGaoList);
		$this->display();
    }
	public function index_1(){
		$this->checkIp();
		$this->checkCookie();
		$this->checkPower();
		$baseinfo=M("baseinfo");
		$logo = __PUBLIC__."/logo.png";
		$banner = __PUBLIC__."/banner.png";
		//网站基础设置
		$baseInfoA = array(        //默认设置
				"title" => "富升财经",
				"key" => "富升财经直播室，原油、现货、贵金属投资，名师专业指导",
				"description" => "富升财经直播室，原油、现货、贵金属投资,有名师专家一对一指导，轻松投资理财",
				"logo" => $logo,
				"banner" => $banner
			);
		$logo = $baseinfo->field("logo")->where("page='index'")->find();
		$baseInfo=$baseinfo->where("page='index_1'")->find();
		if(!$baseInfo){
			$baseInfo = $baseInfoA;	
		}else{
			$baseInfo['banner'] = $baseInfo['logo'];
			$baseInfo['logo'] = $logo['logo'];
		}
		$this->assign("baseInfo",$baseInfo);
		$this->display();
    }
	public function index_j(){
		$this->checkIp();
		$this->checkCookie();
		$this->checkPower();
		$obj = M("say");
		$empuser = M("empuser");
		$baseinfo=M("baseinfo");
		$where = "";
		$logo = __PUBLIC__."/logo.png";
		$banner = __PUBLIC__."/banner.png";
		//网站基础设置
		$baseInfoA = array(        //默认设置
				"title" => "富升财经",
				"key" => "富升财经直播室，原油、现货、贵金属投资，名师专业指导",
				"description" => "富升财经直播室，原油、现货、贵金属投资,有名师专家一对一指导，轻松投资理财",
				"logo" => $logo,
				"banner" => $banner
			);
		$logo = $baseinfo->field("logo")->where("page='index'")->find();
		$baseInfo=$baseinfo->where("page='index_j'")->find();
		if(!$baseInfo){
			$baseInfo = $baseInfoA;	
		}else{
			$baseInfo['banner'] = $baseInfo['logo'];
			$baseInfo['logo'] = $logo['logo'];
		}
		$this->assign("baseInfo",$baseInfo);
		//添加
		if($_POST){
			$data = array();
			$data['type'] = trim($this->_post("type"));
			$data['cWei'] = trim($this->_post("cWei"));
			$data['good'] = trim($this->_post("good"));
			$data['openPrice'] = trim($this->_post("openPrice"));
			$data['endPrice'] = trim($this->_post("endPrice"));
			$data['sucPrice'] = trim($this->_post("sucPrice"));
			$data['openTm'] = date("Y-m-d H:i:s");
			if(isset($_SESSION['empUserId'])){
				$data['userId'] = $_SESSION['empUserId'];
				$empUserInfo = $empuser->where("id={$data['userId']}")->field("rankId")->find();
				$data['userType'] = $empUserInfo['rankId'];
			}
			if(in_array("",$data)){
				$this->error("输入不能为空",U("Index/index_j"));
			}else{
				$rs = $obj->add($data);
				if($rs){
					$this->success("添加成功",U("Index/index_j"));exit;
				}else{
					$this->error("添加失败",U("Index/index_j"));	
				}
			}
		}
		import('ORG.Util.Page');// 导入分页类
		$num = isset($_GET['num'])?$_GET['num']:10;
        $p = isset($_GET['p'])?$_GET['p']:1;
        $count = $obj->where($where)->count();// 查询满足要求的总记录数 $map表示查询条件
        $Page = new Page($count,$num);// 实例化分页类 传入总记录数
        $show = $Page->show();// 分页显示输出
        $list = $obj->where($where)->order('t0.id desc')->field("t0.*,r.name as userType,e.nickName")->alias("t0")->join(array("left join rank r on r.id=t0.userType","left join empuser e on e.id=t0.userId"))->limit(($p-1)*$num,$num)->select();
        $this->assign('page',$show);// 赋值分页输出
		$this->assign("list",$list);
		$this->display();
    }
	public function index_c(){
		$this->checkIp();
		$this->checkCookie();
		$this->checkPower();
		$baseinfo=M("baseinfo");
		$logo = __PUBLIC__."/logo.png";
		$banner = __PUBLIC__."/banner.png";
		//网站基础设置
		$baseInfoA = array(        //默认设置
				"title" => "富升财经",
				"key" => "富升财经直播室，原油、现货、贵金属投资，名师专业指导",
				"description" => "富升财经直播室，原油、现货、贵金属投资,有名师专家一对一指导，轻松投资理财",
				"logo" => $logo,
				"banner" => $banner
			);
		$logo = $baseinfo->field("logo")->where("page='index'")->find();
		$baseInfo=$baseinfo->where("page='index_c'")->find();
		if(!$baseInfo){
			$baseInfo = $baseInfoA;	
		}else{
			$baseInfo['banner'] = $baseInfo['logo'];
			$baseInfo['logo'] = $logo['logo'];
		}
		$this->assign("baseInfo",$baseInfo);
		$this->display();
    }
    public function fail(){
    	$this->display();
    }
    public function getIp(){
    	if(!empty($_SERVER['HTTP_CLIENT_IP'])){
    		$ip = $_SERVER['HTTP_CLIENT_IP'];
    	}else if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
    		$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    	}else if(!empty($_SERVER['REMOTE_ADDR'])){
			$ip = $_SERVER['REMOTE_ADDR'];
		}else{
			$ip = '';
		}
		return $ip;
    }

    //测试阶段，未成功，目前不能用
    public function getAdd(){
    	$ch = curl_init();
    	$url = 'http://apis.baidu.com/apistore/iplookupservice/iplookup?ip=211.161.248.74';
    	$header = array(
    			'apikey:210f17519f91984ac4c4a5545cfcb54e',
    		);
    	//添加apikey到header
    	curl_setopt($ch, CURLOPT_HTTPHEADER , $header);
    	curl_setopt($ch, CURLOPT_RETURNTRANSFER , 1);
    	//执行HTTP请求
    	curl_setopt($ch, CURLOPT_URL, $url);
    	$res = curl_exec($ch);
    	$a = json_decode($res);
    	$Add = array();
    	$Add['pro'] = $a->retData->province;
    	$Add['city'] = $a->retData->city;
    	$Add['area'] = $a->retData->district;
    	return $Add;
    }
}