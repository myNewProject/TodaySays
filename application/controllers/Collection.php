<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Collection extends MY_Controller {
	public function index() {
		redirect('/Collection/saying');
	}

	public function saying() {
		$this->load->view('header');
		$this->load->model('Collection_model');
		$qResult = $this->Collection_model->getMax();
		$max = $qResult->max;
		$index = mt_rand(1, $max);
//		$index = 1;

		$this->getEachPage($index);

		$this->load->view('footer');
	}

	private function getEachPage($index) {
		$qResult = $this->getCollection($index);	// Says 불러오기
		$say = $qResult[0]->say;
		$trans = $qResult[0]->trans;
		if (!is_null($qResult[0]->say_by)) 
			$by = $qResult[0]->say_by;
		$this->load->view('saying', array('say'=>$say, 'trans'=>$trans, 'by'=>$by, 'index'=>$index));

		$this->getComments($index);	// Comment 불러오기
		$this->load->view('write_comment');
	}

	private function getCollection($index) {
		return $this->Collection_model->get($index);
	}

	private function getComments($index) {
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
	}

	public function likeComment() {
		$this->load->model('Comments_model');
		$this->Comments_model->likeComment($this->input->post('index'));
	}

	public function addComment($index, $re_id) {
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
