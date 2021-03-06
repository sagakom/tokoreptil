<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Barang extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_barang', 'mod');
	}

	public function class_data()
	{
		$data['base_level'] = $this->uri->segment(1);
		$data['base_class'] = 'barang';
		return $data;
	}

	public function index()
	{
		$data = self::class_data() + MY_Controller::data_session();
		$data['base_function'] 	= 'index';
		$data['table_view']		= 'barang';
		$data['fields']			= ["id_barang", "nama_barang", "harga_barang", "keterangan_barang", "gambar1_barang", "gambar2_barang", "gambar3_barang", "idkategori_barang", "idpersonal_barang", "status_barang"];
		$data['title']			= 'Tabel Barang';
		$data['total']			= $this->mod->fetch_data($data)['total'];
		$data['result']			= $this->mod->fetch_data($data)['result'];
		foreach ($data['result'] as $records) {
			$records['level']	= $data['base_level'];
			$temp[]				= $records;
		}
		$data['result']			= $temp;
		//print('<pre>'); print_r($data); exit();
		$this->parser->parse('tpl_admin/template', $data);
	}

	public function tambah()
	{
		$data					= self::class_data() + MY_Controller::data_session();
		$data['base_function']	= 'tambah_barang';
		$data['title']			= 'Input Barang';
		$data['kategori']		   = array(
            'kategori' => $this->mod->get_kategori(),
            'kategori_selected' => '',
            );
		//print('<pre>'); print_r($data); exit();
		$this->parser->parse('tpl_admin/template', $data);
	}

	public function tambah_proses()
	{
		$data						= self::class_data() + MY_Controller::data_session();
		$config['upload_path']		= './assets/foto_barang';
		$config['allowed_types']	= 'jpg|png|jpeg';
		$config['max_size']			= 20000;
		$config['max_width']		= 5000;
		$config['max_height']		= 1000;

		$this->load->library('upload', $config);
		$this->upload->do_upload('gambar1_barang');
		$gambar1_barang = $this->upload->data('file_name');

		$this->upload->do_upload('gambar2_barang');
		$gambar2_barang = $this->upload->data('file_name');

		$this->upload->do_upload('gambar3_barang');
		$gambar3_barang = $this->upload->data('file_name');

		$data	= [
			"id_barang" => $this->input->post('id_barang'),
			"nama_barang" => $this->input->post('nama_barang'),
			"harga_barang" => $this->input->post('harga_barang'),
			"keterangan_barang" => $this->input->post('keterangan_barang'),
			"gambar1_barang" => $gambar1_barang,
			"gambar2_barang" => $gambar2_barang,
			"gambar3_barang" => $gambar3_barang,
			"idkategori_barang" => $this->input->post('idkategori_barang'),
			"idpersonal_barang" => $this->input->post('idpersonal_barang'),
			"status_barang" => $this->input->post('status_barang'),
		];
		//print('<pre>'); print_r($data); exit();
		$this->mod->tambah_barang($data);
		redirect(site_url('admin/barang'));
	}

	public function ubah()
	{
		$data					= self::class_data() + MY_Controller::data_session();
		$data['base_function']	= 'ubah_barang';
		$data['title']			= 'Ubah barang';
		$data['kategori']		   = array(
            'kategori' => $this->mod->get_kategori(),
            'kategori_selected' => '',
            );
		$data['result']			= $this->mod->detail_barang($this->uri->segment(4));
		//print('<pre>'); print_r($data); exit();
		$this->parser->parse('tpl_admin/template', $data);
	}

	public function ubah_proses()
	{
		$aksi	= $this->input->post('aksi');
		$data	= [
			'id_barang' => $this->input->post('id_barang'),
			'nama_barang' => $this->input->post('nama_barang'),
			'harga_barang' => $this->input->post('harga_barang'),
			'keterangan_barang' => $this->input->post('keterangan_barang'),
			'idkategori_barang' => $this->input->post('idkategori_barang'),
			'idpersonal_barang' => $this->input->post('idpersonal_barang'),
			'status_barang' => $this->input->post('status_barang'),
		];
		//print('<pre>'); print_r($data); exit();
		if ($aksi == 'simpan') {
			$this->mod->ubah_barang($data);
			// echo "berhasil";
			redirect(site_url('admin/barang'));
		} else {
			// echo "gagal";
			redirect(site_url('admin/barang'));
		}	
	}

	public function hapus()
	{
		$id = $this->uri->segment(4);
		$this->mod->hapus('barang', $id);
		redirect(base_url('admin/barang'));
	}
}