<?php 

	class Admin extends CI_Controller{

		public function __construct(){
			parent::__construct();
			if(!$this->session->userdata('username')){
				redirect('auth');
			}
			if($this->session->userdata('role_user') == 2){
				redirect('petugas');
			}
		}

		public function index(){
			$data['judul'] = 'dashboard';
			$data['count_petugas'] = $this->M_admin->count_petugas();
			$data['count_supplier'] = $this->M_admin->count_supplier();
			$data['count_barang'] = $this->M_admin->count_barang();
			$this->load->view('templates/user_header', $data);
			$this->load->view('templates/user_topbar');
			$this->load->view('templates/user_sidebar');
			$this->load->view('admin/index', $data);
			$this->load->view('templates/user_footer');
		}

		public function petugas(){
			$data['judul'] = 'petugas';
			$data['petugas'] = $this->M_admin->get_petugas();
			$this->load->view('templates/user_header', $data);
			$this->load->view('templates/user_topbar');
			$this->load->view('templates/user_sidebar');
			$this->load->view('admin/petugas', $data);
			$this->load->view('templates/user_footer');
		}

		public function tambah_petugas(){
			$data['judul'] = 'tambah petugas';
			$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[user.email_user]',
				[ 'is_unique' => 'Email sudah terdaftar' ]);
			$this->form_validation->set_rules('role', 'Role', 'trim|required');
			$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[6]|is_unique[user.username]',
				[ 'is_unique' => 'Email sudah terdaftar' ],
				[ 'min_length' => 'Username minimal 6 karakter']);
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]', 
				[ 'min_length' => 'Password minimal 6 karakter' ]);
			$this->form_validation->set_rules('konfirmasi_password', 'Konfirmasi Password', 'trim|required|matches[password]', [ 'matches' => 'Konfirmasi password salah' ]);
			if($this->form_validation->run() == FALSE){
				$this->load->view('templates/user_header', $data);
				$this->load->view('templates/user_topbar');
				$this->load->view('templates/user_sidebar');
				$this->load->view('admin/tambah_petugas');
				$this->load->view('templates/user_footer');	
			}else{
				$data = [
					'nama_user' => $this->input->post('nama'),
					'email_user' => $this->input->post('email'),
					'username' => $this->input->post('username'),
					'password' => password_hash($this->input->post('konfirmasi_password'), PASSWORD_DEFAULT),
					'role_user' => $this->input->post('role')
				];
				$this->M_admin->tambah_petugas($data);
				$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
															  Petugas berhasil ditambahkan
															</div>');
				redirect('admin/petugas');
			}
		}

		public function hapus_petugas($id){
			$this->M_admin->hapus_petugas($id);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
															  Petugas berhasil dihapus
															</div>');
			redirect('admin/petugas');
		}

		public function supplier(){
			$data['judul'] = 'supplier';
			$data['supplier'] = $this->M_admin->get_supplier();
			$this->load->view('templates/user_header', $data);
			$this->load->view('templates/user_topbar');
			$this->load->view('templates/user_sidebar');
			$this->load->view('admin/supplier', $data);
			$this->load->view('templates/user_footer');
		}

		public function tambah_supplier(){
			$data['judul'] = 'tambah supplier';
			$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[supplier.email_supplier]', ['is_unique' => 'Email supplier ini sudah terdaftar']);
			$this->form_validation->set_rules('telepon', 'Telepon', 'trim|required|numeric',
				['numeric' => 'Data harus angka']);
			$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
			if($this->form_validation->run() == FALSE){
				$this->load->view('templates/user_header', $data);
				$this->load->view('templates/user_topbar');
				$this->load->view('templates/user_sidebar');
				$this->load->view('admin/tambah_supplier', $data);
				$this->load->view('templates/user_footer');	
			}else{
				$data = [
					'nama_supplier' => $this->input->post('nama'),
					'email_supplier' => $this->input->post('email'),
					'alamat_supplier' => $this->input->post('alamat'),
					'telepon_supplier' => $this->input->post('telepon'),
				];
				$this->M_admin->tambah_supplier($data);
				$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
															  Supplier berhasil ditambahkan
															</div>');
				redirect('admin/supplier');
			}
		}

		public function ubah_supplier($id){
			$data['judul'] = 'tambah supplier';
			$data['supplier'] = $this->M_admin->get_supplier_id($id);
			$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
			$this->form_validation->set_rules('telepon', 'Telepon', 'trim|required|numeric',
				['numeric' => 'Data harus angka']);
			$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
			if($this->form_validation->run() == FALSE){
				$this->load->view('templates/user_header', $data);
				$this->load->view('templates/user_topbar');
				$this->load->view('templates/user_sidebar');
				$this->load->view('admin/ubah_supplier', $data);
				$this->load->view('templates/user_footer');	
			}else{
				$data = [
					'nama_supplier' => $this->input->post('nama'),
					'alamat_supplier' => $this->input->post('alamat'),
					'telepon_supplier' => $this->input->post('telepon'),
				];
				$this->M_admin->ubah_supplier($data, $id);
				$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
															  Supplier berhasil diubah
															</div>');
				redirect('admin/supplier');
			}
		}

		public function hapus_supplier($id){
			$this->M_admin->hapus_supplier($id);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
															  Supplier berhasil dihapus
															</div>');
			redirect('admin/supplier');
		}

		public function barang(){
			$data['judul'] = 'barang';
			$data['barang'] = $this->M_admin->get_barang();
			$this->load->view('templates/user_header', $data);
			$this->load->view('templates/user_topbar');
			$this->load->view('templates/user_sidebar');
			$this->load->view('admin/barang', $data);
			$this->load->view('templates/user_footer');
		}

		public function tambah_barang(){
			$data['judul'] = 'tambah barang';
			$data['supplier'] = $this->M_admin->get_supplier();
			$this->form_validation->set_rules('barcode', 'Barcode', 'trim|required|is_unique[barang.barcode]', ['is_unique' => 'Barcode sudah terdaftar']);
			$this->form_validation->set_rules('nama_barang', 'Nama barang', 'trim|required');
			$this->form_validation->set_rules('satuan', 'Satuan', 'required');
			$this->form_validation->set_rules('stok', 'Stok', 'trim|required|numeric',
				['numeric' => 'Data harus angka']);
			$this->form_validation->set_rules('supplier', 'Supplier', 'required');
			$this->form_validation->set_rules('harga_beli', 'Harga beli', 'trim|required|numeric',
				['numeric' => 'Data harus angka']);
			$this->form_validation->set_rules('harga_jual', 'Harga jual', 'trim|required|numeric',
				['numeric' => 'Data harus angka']);
			if($this->form_validation->run() == FALSE){
				$this->load->view('templates/user_header', $data);
				$this->load->view('templates/user_topbar');
				$this->load->view('templates/user_sidebar');
				$this->load->view('admin/tambah_barang', $data);
				$this->load->view('templates/user_footer');	
			}else{
				$data = [
					'barcode' => $this->input->post('barcode'),
					'nama_barang' => $this->input->post('nama_barang'),
					'satuan' => $this->input->post('satuan'),
					'stok' => $this->input->post('stok'),
					'supplier' => $this->input->post('supplier'),
					'harga_beli' => $this->input->post('harga_beli'),
					'harga_jual' => $this->input->post('harga_jual'),
					'untung' => $this->input->post('untung'),
				];
				$this->M_admin->tambah_barang($data);
				$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
															  Barang berhasil ditambahkan
															</div>');
				redirect('admin/barang');
			}
		}

		public function ubah_barang($id){
			$data['judul'] = 'ubah barang';
			$data['barang'] = $this->M_admin->get_barang_id($id);
			$data['supplier'] = $this->M_admin->get_supplier();
			$data['satuan'] = $data['barang']->satuan;
			$data['sup'] = $data['barang']->supplier;
			$this->form_validation->set_rules('nama_barang', 'Nama barang', 'trim|required');
			$this->form_validation->set_rules('stok', 'Stok', 'trim|required|numeric',
				['numeric' => 'Data harus angka']);
			$this->form_validation->set_rules('harga_beli', 'Harga beli', 'trim|required|numeric',
				['numeric' => 'Data harus angka']);
			$this->form_validation->set_rules('harga_jual', 'Harga jual', 'trim|required|numeric',
				['numeric' => 'Data harus angka']);
			if($this->form_validation->run() == FALSE){
				$this->load->view('templates/user_header', $data);
				$this->load->view('templates/user_topbar');
				$this->load->view('templates/user_sidebar');
				$this->load->view('admin/ubah_barang', $data);
				$this->load->view('templates/user_footer');	
			}else{
				$data = [
					'nama_barang' => $this->input->post('nama_barang'),
					'stok' => $this->input->post('stok'),
					'harga_beli' => $this->input->post('harga_beli'),
					'harga_jual' => $this->input->post('harga_jual'),
					'untung' => $this->input->post('untung'),
				];
				$this->M_admin->ubah_barang($data, $id);
				$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
															  Barang berhasil diubah
															</div>');
				redirect('admin/barang');
			}
		}

		public function hapus_barang($id){
			$this->M_admin->hapus_barang($id);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
															  Barang berhasil dihapus
															</div>');
			redirect('admin/barang');
		}

		public function penjualan_collapse(){
			$data['judul'] = 'penjualan collapse';
			$data['collapse'] = $this->M_admin->collapse();
			$this->load->view('templates/user_header', $data);
			$this->load->view('templates/user_topbar');
			$this->load->view('templates/user_sidebar');
			$this->load->view('admin/penjualan_collapse', $data);
			$this->load->view('templates/user_footer');	
		}

		public function kembalikan_barang(){
			$id = $this->input->get('id');
			$barcode = $this->input->get('barcode');
			$jumlah = $this->input->get('jumlah');
			$this->M_admin->kembalikan_barang($barcode, $jumlah);
			$this->M_admin->hapus_penjualan_barcode($id);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
															  Barang berhasil dikembalikan, stok barang kembali bertambah
															</div>');
			redirect('admin/penjualan_collapse');
		}
	}

 ?>