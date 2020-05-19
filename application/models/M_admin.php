<?php 

	class M_admin extends CI_Model{

		public function get_petugas(){
			return $this->db->get('user')->result();
		}

		public function tambah_petugas($data){
			return $this->db->insert('user', $data);
		}

		public function hapus_petugas($id){
			return $this->db->delete('user', ['id_user' => $id]);
		}

		public function count_petugas(){
			return $this->db->get('user')->num_rows();
		}

		public function get_supplier(){
			$query = "SELECT * FROM supplier ORDER BY nama_supplier ASC";
			return $this->db->query($query)->result();
		}

		public function tambah_supplier($data){
			return $this->db->insert('supplier', $data);
		}

		public function get_supplier_id($id){
			return $this->db->get_where('supplier', ['id_supplier' => $id])->row();
		}

		public function ubah_supplier($data, $id){
			$this->db->where('id_supplier', $id);
			return $this->db->update('supplier', $data);
		}

		public function hapus_supplier($id){
			return $this->db->delete('supplier', ['id_supplier' => $id]);
		}

		public function count_supplier(){
			return $this->db->get('supplier')->num_rows();
		}

		public function get_barang(){
			return $this->db->get('barang')->result();
		}

		public function tambah_barang($data){
			return $this->db->insert('barang', $data);
		}

		public function get_barang_id($id){
			return $this->db->get_where('barang', ['id_barang' => $id])->row();
		}

		public function ubah_barang($data, $id){
			$this->db->where('id_barang', $id);
			return $this->db->update('barang', $data);
		}

		public function hapus_barang($id){
			return $this->db->delete('barang', ['id_barang' => $id]);
		}

		public function count_barang(){
			return $this->db->get('barang')->num_rows();
		}

		public function collapse(){
			$query = "SELECT * FROM penjualan 
					JOIN barang ON penjualan.kode_barcode=barang.barcode
					WHERE penjualan.status='beli'";
			return $this->db->query($query)->result();
		}

		public function kembalikan_barang($barcode, $jumlah){
			$query = "UPDATE barang SET stok=(stok+$jumlah) WHERE barcode='$barcode'";
			return $this->db->query($query);
		}

		public function hapus_penjualan_barcode($id){
			return $this->db->delete('penjualan', ['id_penjualan' => $id]);
		}

		public function count_collapse(){
			return $this->db->get_where('penjualan', ['status' => 'beli'])->num_rows();
		}

		public function get_diskon(){
			return $this->db->get_where('diskon', ['id_diskon' => 1])->row();
		}

		public function ubah_diskon($diskon){
			$this->db->set('diskon', $diskon);
			$this->db->where('id_diskon', 1);
			return $this->db->update('diskon');
		}

		public function barang_masuk(){
			$query = "SELECT * FROM barang_masuk
					JOIN barang ON barang_masuk.kode_barcode=barang.barcode
					WHERE barang_masuk.status='masuk'";
			return $this->db->query($query)->result();
		}

		public function barang_masuk_id($id){
			$query = "SELECT * FROM barang_masuk 
					JOIN barang ON barang_masuk.kode_barcode=barang.barcode
					WHERE barang_masuk.id_barang_masuk='$id'";
			return $this->db->query($query)->row();
		}

		public function ubah_barang_masuk_id($id, $jumlah){
			$query = "UPDATE barang_masuk SET jumlah='$jumlah' WHERE id_barang_masuk='$id'";
			return $this->db->query($query);
		}

		public function konfirmasi_jumlah($barcode, $jumlah){
			$query = "UPDATE barang SET stok=(stok+$jumlah) WHERE barcode='$barcode'";
			return $this->db->query($query);
		}

		public function konfirmasi_barang_masuk($id){
			$this->db->set('status', 'terkonfirmasi');
			$this->db->where('id_barang_masuk', $id);
			return $this->db->update('barang_masuk');
		}

		public function count_barang_masuk(){
			return $this->db->get_where('barang_masuk', ['status' => 'masuk'])->num_rows();
		}

		public function riwayat_barang_masuk(){
			$query = "SELECT * FROM barang_masuk 
					JOIN barang ON barang_masuk.kode_barcode=barang.barcode
					WHERE barang_masuk.status='terkonfirmasi'";
			return $this->db->query($query)->result();
		}

		public function count_riwayat(){
			return $this->db->get_where('barang_masuk', ['status' => 'terkonfirmasi'])->num_rows();
		}

		public function hapus_riwayat($id){
			return $this->db->delete('barang_masuk', ['id_barang_masuk' => $id]);
		}

	}

 ?>