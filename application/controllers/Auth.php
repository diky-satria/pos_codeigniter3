<?php 

	class Auth extends CI_Controller{

		public function index(){
			if($this->session->userdata('username')){
				redirect('petugas');
			}
			$data['judul'] = 'login';
			$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[6]',
				[ 'min_length' => 'Username minimal 6 karakter' ]);
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]',
				[ 'min_length' => 'Password minimal 6 karakter' ]);
			if($this->form_validation->run() == FALSE){
				$this->load->view('templates/auth_header', $data);
				$this->load->view('auth/index');
				$this->load->view('templates/auth_footer');	
			}else{
				$username = $this->input->post('username');
				$password = $this->input->post('password');
				$user = $this->M_auth->get_user($username);
				if($user){
					if(password_verify($password, $user->password)){
						$data = [
							'nama_user' => $user->nama_user,
							'email_user' => $user->email_user,
							'username' => $user->username,
							'role_user' => $user->role_user
						];
						$this->session->set_userdata($data);
						if($this->session->userdata('role_user') == 1){
							redirect('admin');
						}else{
							redirect('petugas?kode='. kode_random(10));
						}
					}else{
						$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
															  Password salah
															</div>');
						redirect('auth');
					}
				}else{
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
															  Username tidak terdaftar
															</div>');
					redirect('auth');
				}
			}
		}

		public function logout(){
			$this->session->unset_userdata('nama_user');
			$this->session->unset_userdata('email_user');
			$this->session->unset_userdata('username');
			$this->session->unset_userdata('role_user');
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
															 Anda telah keluar
															</div>');
			redirect('auth');
		}

		public function lupa_password(){
			if($this->session->userdata('username')){
				redirect('petugas');
			}
			$data['judul'] = 'lupa password';
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', [
					'valid_email' => 'Email tidak valid'
				]);
			if($this->form_validation->run() == FALSE){
				$this->load->view('templates/auth_header', $data);
				$this->load->view('auth/lupa_password');
				$this->load->view('templates/auth_footer');
			}else{
				$email = $this->input->post('email');
				$user = $this->db->get_where('user', ['email_user' => $email])->row_array();
				if($user){
					$this->session->set_userdata('reset_email', $email);
					$this->M_auth->lupa_password();
				}else{
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
										  Email tidak terdaftar
										</div>');
					redirect('auth/lupa_password');
				}
			}
		}

		public function reset(){
			$email = $this->input->get('email');
			$token = $this->input->get('token');
			$user = $this->db->get_where('user', ['email_user' => $email])->row_array();
			if($user){
				$user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
				if($user_token){
					$this->session->set_userdata('reset_email', $email);
					$this->reset_password();
				}else{
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
										  token error
										</div>');
					redirect('auth');
				}
			}else{
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
										  email error
										</div>');
				redirect('auth');
			}
		}

		public function reset_password(){
			if(!$this->session->userdata('reset_email')){
				redirect('auth');
			}
			$data['title'] = 'reset password';
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]', [
					'min_length' => 'Password minimal 6 karakter'
				]);
			$this->form_validation->set_rules('konfirmasi_password', 'Konfirmasi password', 'trim|required|matches[password]', [
					'matches' => 'Konfirmasi password salah'
				]);
			if($this->form_validation->run() == FALSE){
				$this->load->view('templates/auth_header', $data);
				$this->load->view('auth/reset_password');
				$this->load->view('templates/auth_footer');	
			}else{

				$password = $this->input->post('password');
				$konfirmasi_password = password_hash($this->input->post('konfirmasi_password'), PASSWORD_DEFAULT);
				$email = $this->session->userdata('reset_email');

				$this->db->set('password', $konfirmasi_password);
				$this->db->where('email_user', $email);
				$this->db->update('user');

				$this->db->delete('user_token', ['email' => $email]);
				$this->session->unset_userdata('reset_email');

				$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
										  Reset password berhasil, silahkan login
										</div>');
				redirect('auth');
			}
		}
	}

 ?>