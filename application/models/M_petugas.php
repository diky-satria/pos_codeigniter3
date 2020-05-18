<?php 

	class M_petugas extends CI_Model{

		public function get_barang($kode){
			$query = "SELECT * FROM penjualan 
					JOIN barang ON penjualan.kode_barcode=barang.barcode
					WHERE penjualan.kode_penjualan='$kode'";
			return $this->db->query($query)->result();
		}

		public function get_pembelian($kode){
			$query = "SELECT * FROM pembelian 
					JOIN penjualan ON pembelian.kode_penjualan=penjualan.kode_penjualan
					WHERE penjualan.kode_penjualan='$kode'";
			return $this->db->query($query)->row();
		}

		public function get_penjualan($kode){
			$query = "SELECT * FROM penjualan
					JOIN barang ON penjualan.kode_barcode=barang.barcode WHERE penjualan.kode_penjualan='$kode'";
			return $this->db->query($query)->result();
		}

		public function ambil_barang_barcode($barcode){
			return $this->db->get_where('barang', ['barcode' => $barcode])->row();
		}

		public function tambah_penjualan($id, $harga){
			$query = "UPDATE penjualan SET jumlah_pembelian=(jumlah_pembelian+1), total_pembelian=($harga*jumlah_pembelian) WHERE id_penjualan='$id'";
			return $this->db->query($query);
		}

		public function kurangi_stok($barcode){
			$query = "UPDATE barang SET stok=(stok-1) WHERE barcode='$barcode'";
			return $this->db->query($query);
		}

		public function ubah_pengurangan($id){
			return $this->db->get_where('penjualan', ['id_penjualan' => $id])->row();
		}

		public function kurang_penjualan($id, $harga){
			$query = "UPDATE penjualan SET jumlah_pembelian=(jumlah_pembelian-1), total_pembelian=($harga*jumlah_pembelian) WHERE id_penjualan='$id'";
			return $this->db->query($query);
		}

		public function tambah_stok($barcode){
			$query = "UPDATE barang SET stok=(stok+1) WHERE barcode='$barcode'";
			return $this->db->query($query);
		}

		public function hapus_penjualan($id){
			return $this->db->delete('penjualan', ['id_penjualan' => $id]);
		}

		public function ubah_stok($barcode, $jumlah){
			$query = "UPDATE barang SET stok=(stok+$jumlah) WHERE barcode='$barcode'";
			return $this->db->query($query);
		}

		public function laporan($tglm, $tgla){
			$query = "SELECT * FROM pembelian WHERE tanggal_beli between '$tglm' AND '$tgla'";
			return $this->db->query($query)->result();
		}

		public function barang_barcode($barcode){
			return $this->db->get_where('barang', ['barcode' => $barcode])->row();
		}

	}

 ?>