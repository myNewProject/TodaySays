<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Collection extends MY_Controller {
	public function index() {
		redirect('/Collection/saying/0');
	}

	public function saying($index) {		/* 메인 */
		$this->load->view('header');
		$this->load->model('Collection_model');

		if ($index == 0) {
			$qResult = $this->Collection_model->getMax();
			$max = $qResult->max;
			$index = mt_rand(1, $max);
//			$index = 1;
		} 
		$this->getCollection($index, null);
		$this->getComments($index);

		$this->load->view('footer');
	}

	public function keepingSays() {		/* 담은 명언 불러오기 */
		if (!$this->session->userdata('is_login')) {
			$this->session->set_flashdata('message', '로그인이 필요한 서비스 입니다.');
			redirect('/Collection');
		}

		$this->load->view('header');
		$this->load->model('Userlike_model');

		// 담은 명언 모두 출력
		$qResult = $this->Userlike_model->getAll($this->session->userdata('userID'));
		foreach ($qResult as $result) {
			$each_url = "<span class='pull-right'><a href='".site_url('/Collection/saying')."/".$result->coll_id."'>댓글 보러가기</a> <span class='glyphicon glyphicon-expand'</span>";
			$this->getCollection($result->coll_id, $each_url);
		}

		$this->load->view('footer');
	}

	private function getCollection($index, $each_url) {	/* Says 불러오기 */
		$this->load->model('Collection_model');
		$qResult = $this->Collection_model->get($index);		// Says 불러오기
		$coll_id = $qResult[0]->id;
		$say = $qResult[0]->say;
		$trans = $qResult[0]->trans;
		if (!is_null($qResult[0]->say_by)) 
			$by = $qResult[0]->say_by;

		$keeping = 0;
		if ($this->session->userdata('is_login'))
			$keeping = $this->getKeepSays($this->session->userdata('userID'), $coll_id);

		$this->load->view('saying', array('coll_id'=>$coll_id, 'say'=>$say, 'trans'=>$trans, 'by'=>$by, 'index'=>$index, 'keeping'=>$keeping, 'each_url'=>$each_url));
	}

	private function getKeepSays($user_id, $coll_id) {		/* 담은 명언 확인 */
		$this->load->model('Userlike_model');

		return $this->Userlike_model->get($user_id, $coll_id);
	}

	private function getComments($index) {	/* Comment 불러오기 */
		$this->load->model('Comments_model');

		$resultCom = $this->Comments_model->getComments($index);
		$comments = array();

		foreach ($resultCom as $comment) {
			if ($comment->re_id === '0') {	// 대댓이 아닌경우
				if (!$reComments = $this->Comments_model->getRecomments($index, $comment->co_id)) { // 대댓있는지 확인
					//array_push($comments, $comment);
					$this->load->view('comments', array(
						'co_id'=>$comment->co_id,
						're_id'=>$comment->re_id,
						'nickname'=>$comment->nickname,
						'postdate'=>$comment->postdate,
						'comment'=>$comment->comment,
						'liker'=>$comment->liker
						));
				} else {
					$this->load->view('comments', array(
						'co_id'=>$comment->co_id,
						're_id'=>$comment->re_id,
						'nickname'=>$comment->nickname,
						'postdate'=>$comment->postdate,
						'comment'=>$comment->comment,
						'liker'=>$comment->liker
						));
					foreach ($reComments as $reComment) {
						$this->load->view('comments', array(
							'co_id'=>$reComment->co_id,
							're_id'=>$reComment->re_id,
							'nickname'=>$reComment->nickname,
							'postdate'=>$reComment->postdate,
							'comment'=>$reComment->comment,
							'liker'=>$reComment->liker
							));
					}
				}
			}
		}
		$this->load->view('write_comment');
	}

	public function keepSays() {		/* 명언 담기 기능 */
		$this->load->model('Userlike_model');
		$this->Userlike_model->put($this->session->userdata('userID'), $this->input->post('coll_id'));
		// ajax return 값
		echo "<button type='button' id='removeSays' class='btn btn-success' onclick='removeSays(".$this->input->post('coll_id').")'><span class='glyphicon glyphicon-ok'></span> 담겨있음</button>";
	}

	public function removeSays() {		/* 명언 빼기 기능 */
		$this->load->model('Userlike_model');
		$this->Userlike_model->del($this->session->userdata('userID'), $this->input->post('coll_id'));
		// ajax return 값
		echo "<button type='button' id='keepSays' class='btn btn-primary' onclick='keepSays(".$this->input->post('coll_id').")'><span class='glyphicon glyphicon-plus'></span> 담아두기</button>";
	}

	public function likeComment() {		/* 댓글 좋아요 기능 */
		$this->load->model('Comments_model');
		$result = $this->Comments_model->likeComment($this->input->post('index'));
		// ajax return 값
		echo "<button type='button' class='btn btn-primary comment-top' id='co_id".$this->input->post('index')."' onclick='likeComment(".$this->input->post('index').")'>좋아요 <span class='badge'>".$result->liker."</span></button>";
	}

	public function addComment($index, $re_id) {	/* Comment 추가 */
		if (!$this->session->userdata('is_login')){
			$this->session->set_flashdata('message', '세션이 만료되었습니다.');
		}

		if (!$re_id) $re_id = 0;
		$this->load->model('Comments_model');
		if (!$this->Comments_model->addComment(
			$index, 
			$re_id,
			$this->session->userdata('userID'), 
			$this->input->post('nickname'),
			$this->input->post('comment')
			)) {
			$this->session->set_flashdata('message', '등록 실패');
		} else {
			$this->session->set_flashdata('message', '코멘트가 등록되었습니다..');
		}
		redirect($returnURL ? $returnURL : site_url('/Collection'));
	}
}
