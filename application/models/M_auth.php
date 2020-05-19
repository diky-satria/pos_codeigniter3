<?php 

	class M_auth extends CI_Model{

		public function get_user($username){
			return $this->db->get_where('user', ['username' => $username])->row();
		}

		public function lupa_password(){

			$token = base64_encode(random_bytes(32));
			$email = $this->input->post('email');

			$user_token = [
				'email' => $email,
				'token' => $token,
				'date_created' => time()
			];
			$this->_sendmail($token, 'forgot');
			$this->db->insert('user_token', $user_token);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
										  Email berhasil dikirim, silahkan klik link yang dikirim ke email anda
										</div>');
			redirect('auth/lupa_password');
		}

		public function _sendmail($token, $type){
			$config = [
				'protocol'  => 'smtp',
				'smtp_host' => 'ssl://smtp.googlemail.com',
				'smtp_user' => 'dikysr1234567@gmail.com',
				'smtp_pass' => 'dikyayufadya',
				'smtp_port' => 465,
				'mailtype'  => 'html',
				'charset'   => 'utf-8',
				'newline'   => "\r\n"
			];

			$this->email->initialize($config);

			$this->email->from('dikysr1234567@gmail.com', 'Poin Of Sale');
			$this->email->to($this->input->post('email'));

			if($type == 'forgot'){

				$this->email->subject('Reset password');
				$this->email->message('Silahkan klik link ini untuk reset password : <a href="'.base_url().'auth/reset?email='.$this->input->post('email').'&token='.urlencode($token).'">RESET PASSWORD</a>');

			}

			if($this->email->send()){
				return true;
			}else{
				echo $this->email->print_debugger();
			}

		}

	}

 ?>