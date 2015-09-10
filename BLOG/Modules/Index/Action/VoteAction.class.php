<?php 

class VoteAction extends Action {

	public function index(){
		$this->display();
	}

	public function addVote(){
		if($_POST){
			

			$data = array(
				'date' => date('Y-m-d H:i:s', time()),
				'ip' => get_client_ip(),
				'browse' => $_POST['Question1'],
				'video' => $_POST['Question3'],
				'error' => implode('*', $_POST['Question2']),
				'advise' => $_POST['advise']
			);

			if($id = M('vote')->add($data)){
				$data = array();
				foreach($_POST['Question2'] as $key => $val){
					$data[$key]['content'] = $val;
					$data[$key]['vote_id'] = $id;
				}
				M('vote_error')->addAll($data);
				$this->success('问卷填写成功,drawmad全体人员感谢你的参与 ', 'http://www.drawmad.com');
			}else{
				$this->error('保存失败');
			}
		}else{
			$this->error('不允许非法访问');
		}
	}
}