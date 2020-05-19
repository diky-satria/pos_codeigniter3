<?php 

	class Petugas extends CI_Controller{

		public function __construct(){
			parent::__construct();
			if(!$this->session->userdata('username')){
				redirect('auth');
			}
		}

		public function index(){
			$data['judul'] = 'penjualan';
			$data['kode'] = $this->input->get('kode');
			$data['barang'] = $this->M_petugas->get_barang($data['kode']);
			$data['diskon'] = $this->M_petugas->diskon();
			$this->load->view('templates/user_header', $data);
			$this->load->view('templates/user_topbar');
			$this->load->view('templates/user_sidebar');
			$this->load->view('petugas/index', $data);
			$this->load->view('templates/user_footer');

			$tambahkan = $this->input->post('tambahkan', true);
			if(isset($tambahkan)){
				$kodes = $this->input->post('kodepj', true);
				$barcode = $this->input->post('barcode', true);
				$sql = $this->db->get_where('barang', ['barcode' => $barcode])->row_array();
				if($sql){
					$stok = $sql['stok'];
					$bar = $sql['barcode'];
					if($stok > 0){
						$kasir = $this->session->userdata('nama_user');
						$jumlah = 1;
						$harga = $sql['harga_jual'];
						$total = $jumlah * $harga;
						$data = [
							'kode_penjualan' => $kodes,
							'kode_barcode' => $bar,
							'harga_pembelian' => $harga,
							'jumlah_pembelian' => $jumlah,
							'total_pembelian' => $total,
							'kasir' => $kasir,
							'status' => 'beli'
						];
						$this->db->insert('penjualan', $data);
						$query = "UPDATE barang SET stok=(stok-1) WHERE barcode='$bar'";
						$this->db->query($query);
						?>
						<script type="text/javascript">
						alert('Barang berhasil ditambah');
						window.location.href="<?php echo base_url() ?>petugas?kode=<?php echo $kodes ?>";
						</script>
						<?php
					}else{
						?>
						<script type="text/javascript">
						alert('Stok barang sedang kosong');
						window.location.href="<?php echo base_url() ?>petugas?kode=<?php echo $kodes ?>";
						</script>
						<?php
					}
				}else{
					?>
					<script type="text/javascript">
					alert('Barang tidak terdaftar');
					window.location.href="<?php echo base_url() ?>petugas?kode=<?php echo $kodes ?>";
					</script>
					<?php
				}
			}

			$cetak = $this->input->post('cetak', true);
			if(isset($cetak)){
				$k = $this->input->post('kodekode', true);
				$data = [
					'kode_penjualan' => $k,
					'pembeli' => $this->input->post('pembeli', true),
					'sub_total' => $this->input->post('sub_total', true),
					'diskon' => $this->input->post('diskon', true),
					'potongan_diskon' => $this->input->post('p_diskon', true),
					'total' => $this->input->post('total', true),
					'bayar' => $this->input->post('bayar', true),
					'kembali' => $this->input->post('kembali', true),
					'tanggal_beli' => date('Y-m-d')
				];
				$this->db->insert('pembelian', $data);
				$ubah_status = "UPDATE penjualan SET status = 'terbeli' WHERE kode_penjualan = '$k'";
				$this->db->query($ubah_status);
				header("location:petugas/pembelian?kode=$k");
			}
		}

		public function tambah_penjualan(){
			$id = $this->input->get('id');
			$barcode = $this->input->get('barcode');
			$kode = $this->input->get('kode');
			$harga = $this->input->get('harga');
			//ambil data barang untuk cek stok
			$data['ubah'] = $this->M_petugas->ambil_barang_barcode($barcode);
			$stok = $data['ubah']->stok;
			if($stok < 1){
				?>
				<script type="text/javascript">
				alert('Stok barang telah habis');
				window.location.href="<?php echo base_url() ?>petugas?kode=<?php echo $kode ?>";
				</script>
				<?php
			}else{
				$this->M_petugas->tambah_penjualan($id, $harga);
				$this->M_petugas->kurangi_stok($barcode);
				redirect('petugas?kode='.$kode);	
			}
		}

		public function kurang_penjualan(){
			$id = $this->input->get('id');
			$barcode = $this->input->get('barcode');
			$kode = $this->input->get('kode');
			$harga = $this->input->get('harga');
			//ambil data penjualan berdasarkan id untuk cek jumlah
			$data['ubah'] = $this->M_petugas->ubah_pengurangan($id);
			if($data['ubah']->jumlah_pembelian <= 1){
				?>
				<script type="text/javascript">
				alert('Jumlah barang tidak boleh kosong');
				window.location.href="<?php echo base_url() ?>petugas?kode=<?php echo $kode ?>";
				</script>
				<?php
			}else{
				$this->M_petugas->kurang_penjualan($id, $harga);
				$this->M_petugas->tambah_stok($barcode);
				redirect('petugas?kode='.$kode);	
			}
		}

		public function hapus_penjualan(){
			$id = $this->input->get('id');
			$barcode = $this->input->get('barcode');
			$kode = $this->input->get('kode');
			$jumlah = $this->input->get('jumlah');
			$this->M_petugas->hapus_penjualan($id);
			$this->M_petugas->ubah_stok($barcode, $jumlah);
			redirect('petugas?kode='.$kode);
		}

		public function pembelian(){
			$data['judul'] = 'pembelian';
			$kode = $this->input->get('kode');
			$data['pembelian'] = $this->M_petugas->get_pembelian($kode);
			$data['penjualan'] = $this->M_petugas->get_penjualan($kode);
			if(!$data['pembelian']){
				redirect('petugas?kode='.kode_random(10));
			}
			$this->load->view('templates/user_header', $data);
			$this->load->view('templates/user_topbar');
			$this->load->view('templates/user_sidebar');
			$this->load->view('petugas/pembelian', $data);
			$this->load->view('templates/user_footer');
		}

		public function struk(){
			$data['judul'] = 'Bukti Pembelian';
			$kode = $this->input->get('kode');
			if(!$kode){
				redirect('petugas?kode='.kode_random(10));
			}
			$data['pembelian'] = $this->M_petugas->get_pembelian($kode);
			$data['penjualan'] = $this->M_petugas->get_barang($kode);
			$this->load->view('petugas/struk', $data);
		}

		public function laporan(){
			$data['judul'] = 'laporan penjualan';
			$data['tglm'] = '-';
			$data['tgla'] = '-';
			$cari = $this->input->post('cari');
			if(isset($cari)){
				$data['tglm'] = $this->input->post('tglm');
				$data['tgla'] = $this->input->post('tgla');
				$data['laporan'] = $this->M_petugas->laporan($data['tglm'], $data['tgla']);
				$this->load->view('templates/user_header', $data);
				$this->load->view('templates/user_topbar');
				$this->load->view('templates/user_sidebar');
				$this->load->view('petugas/laporan', $data);
				$this->load->view('templates/user_footer');	
			}else{
				?>
				<script type="text/javascript">
				window.location.href="<?php echo base_url() ?>petugas?kode=<?php echo kode_random(10) ?>";
				</script>
				<?php
			}
		}

		public function laporan_pertgl_pdf(){
			$data['tglm'] = $this->input->get('tglm');
			$data['tgla'] = $this->input->get('tgla');
			$data['laporan'] = $this->M_petugas->laporan($data['tglm'], $data['tgla']);
			$this->load->view('petugas/laporan_pertgl_pdf', $data);
		}

		public function laporan_pertgl_exel(){
			$data['tglm'] = $this->input->get('tglm');
			$data['tgla'] = $this->input->get('tgla');
			$data['laporan'] = $this->M_petugas->laporan($data['tglm'], $data['tgla']);
			$this->load->view('petugas/laporan_pertgl_exel', $data);
		}

		public function cek_barang(){
			$data['judul'] = 'cek barang';
			$data['barcode'] = '';
			$cek = $this->input->post('cek');
			if(isset($cek)){
				$data['barcode'] = $this->input->post('barcode');
				$data['barang'] = $this->M_petugas->barang_barcode($data['barcode']);
				if(!$data['barang']){
					?>
					<script type="text/javascript">
					alert('Barcode tidak terdaftar');
					window.location.href="<?php echo base_url() ?>petugas/cek_barang";
					</script>
					<?php
				}
			}
			$this->load->view('templates/user_header', $data);
			$this->load->view('templates/user_topbar');
			$this->load->view('templates/user_sidebar');
			$this->load->view('petugas/cek_barang', $data);
			$this->load->view('templates/user_footer');
		}

		public function barang_masuk(){
			$data['judul'] = 'Barang Masuk';
			$data['barcode'] = '';
			$tambah = $this->input->post('tambahkan');
			if(isset($tambah)){
				$data['barcode'] = $this->input->post('barcode');
				$data['barang'] = $this->M_petugas->barang_barcode($data['barcode']);
				if(!$data['barang']){
					?>
					<script type="text/javascript">
					alert('Barcode tidak terdaftar');
					window.location.href="<?php echo base_url() ?>petugas/barang_masuk";
					</script>
					<?php
				}
			}
			$konfirmasi = $this->input->post('konfirmasi');
			if(isset($konfirmasi)){
				$data = [
					'kode_barcode' => $this->input->post('kode'),
					'jumlah' => $this->input->post('jumlah'),
					'kasir' => $this->session->userdata('nama_user'),
					'status' => 'masuk'
				];
				$bar = $this->M_petugas->barang_masuk($data);
				?>
				<script type="text/javascript">
				alert('Barang berhasil ditambahkan');
				window.location.href="<?php echo base_url() ?>petugas/barang_masuk";
				</script>
				<?php
			}
			$this->load->view('templates/user_header', $data);
			$this->load->view('templates/user_topbar');
			$this->load->view('templates/user_sidebar');
			$this->load->view('petugas/barang_masuk', $data);
			$this->load->view('templates/user_footer');
		}

		public function riwayat_barang_masuk(){
			$data['judul'] = 'riwayat barang masuk';
			$data['barang_masuk'] = $this->M_petugas->riwayat_barang_masuk();
			$this->load->view('templates/user_header', $data);
			$this->load->view('templates/user_topbar');
			$this->load->view('templates/user_sidebar');
			$this->load->view('petugas/riwayat_barang_masuk', $data);
			$this->load->view('templates/user_footer');
		}

		public function ubah_password(){
			$data['judul'] = 'ubah password';
			$user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row();
			$this->form_validation->set_rules('password_lama', 'Password lama', 'trim|required|min_length[6]',
				[ 'min_length' => 'Password minimal 6 karakter' ]);
			$this->form_validation->set_rules('password_baru', 'Password baru', 'trim|required|min_length[6]',
				[ 'min_length' => 'Password minimal 6 karakter' ]);
			$this->form_validation->set_rules('konfirmasi_password', 'Konfirmasi password', 'trim|required|matches[password_baru]',
				[ 'matches' => 'Konfirmasi password salah' ]);
			if($this->form_validation->run() == FALSE){
				$this->load->view('templates/user_header', $data);
				$this->load->view('templates/user_topbar');
				$this->load->view('templates/user_sidebar');
				$this->load->view('petugas/ubah_password', $data);
				$this->load->view('templates/user_footer');	
			}else{	
				$password_lama = $this->input->post('password_lama');
				$password_baru = $this->input->post('password_baru');
				$konfirmasi_password = password_hash($this->input->post('konfirmasi_password'), PASSWORD_DEFAULT);
				if(password_verify($password_lama, $user->password)){
					if($password_baru == $password_lama){
						$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
															  Password baru tidak boleh sama dengan password lama
															</div>');
						redirect('petugas/ubah_password');
					}else{
						$this->db->set('password', $konfirmasi_password);
						$this->db->where('username', $this->session->userdata('username'));
						$this->db->update('user');
						$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
															  Password berhasil diganti
															</div>');
						redirect('petugas/ubah_password');
					}
				}else{
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
															  Password lama salah
															</div>');
					redirect('petugas/ubah_password');
				}
			}
		}

	}

 ?>