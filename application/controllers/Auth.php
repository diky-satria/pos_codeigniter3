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

	}

 ?>