<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dana_keluar extends CI_Model {

	public function tampil($tahun_ajaran)
	{
		$query = $this->db->get_where('dana_keluar', ['tahun_ajaran' => $tahun_ajaran]);
		return $query;
	}

	public function tampil_perId($id)
	{
		$query = $this->db->get_where('dana_keluar', ['id' => $id]);
		return $query;
	}

	public function total($tahun_ajaran)
	{
		$this->db->select_sum('uang_keluar');
		$query = $this->db->get_where('dana_keluar', ['tahun_ajaran' => $tahun_ajaran]);
		return $query;
	}

	public function tambah()
	{
		$data = [
			'keperluan'    => $this->input->post('keperluan'),
			'jenis_dana'   => $this->input->post('jenis_dana'),
			'tanggal'      => $this->input->post('tanggal'),
			'uang_keluar'  => $this->input->post('uang_keluar'),
			'tahun_ajaran' => $this->input->post('tahun_ajaran'),
		];

		$this->db->insert('dana_keluar', $data);
	}

	public function edit($id)
	{
		$data = [
			'keperluan'   => $this->input->post('keperluan'),
			'jenis_dana'  => $this->input->post('jenis_dana'),
			'tanggal'     => $this->input->post('tanggal'),
			'uang_keluar' => $this->input->post('uang_keluar')
		];

		$this->db->where('id', $id);
		$this->db->update('dana_keluar', $data); 
	}

	public function hapus($id)
	{
		$this->db->delete('dana_keluar', ['id' => $id]);
	}
}