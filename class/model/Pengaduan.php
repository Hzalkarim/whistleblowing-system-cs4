<?php
class Pengaduan extends WbModel{
	private $id;
	private $nim_mahasiswa;
	private $tanggal_pengaduan;
	private $judul;
	private $isi;
	private $bukti;
	private $status;
	private $id_kategori;
	private $privasi_pengadu;
	private $deskripsi_tindak_lanjut;
	private $tanggal_tindak_lanjut;

	private $colfunType = 'pengaduan';


	public function getPrimaryKey() {
		return $this->getId();
	}

	protected function setTableName() {
		$this->tableName = 'pengaduan';
	}

	protected function setColumnFunc() {
		$colfun = Array();

		$colfun['pengaduan'] = Array(
			'id' => 'Id',
			'tanggal_pengaduan' => 'TanggalPengaduan',
			'judul' => 'Judul',
			'isi' => 'Isi',
			'bukti' => 'Bukti',
			'status' => 'Status',
			'privasi_pengadu' => 'PrivasiPengadu',
			'deskripsi_tindak_lanjut' => 'DeskripsiTindakLanjut',
			'tanggal_tindak_lanjut' => 'TanggalTindakLanjut',
			//fk
			'nim_mahasiswa' => 'NimMahasiswa',
			'id_kategori' => 'IdKategori'
		);

		$colfun['basic_pengaduan_insert'] = Array(
			'nim_mahasiswa' => 'NimMahasiswa',
			'judul' => 'Judul',
			'isi' => 'Isi',
			'bukti' => 'Bukti',
			'id_kategori' => 'IdKategori',
			'privasi_pengadu' => 'PrivasiPengadu'
		);

		if (is_null($this->colfunType)) $this->colfunType = 'pengaduan';
		$this->columnFunc = $colfun[$this->colfunType];
	}

	public function setColumnFuncType($table_view) {
		$this->colfunType = $table_view;
		$this->setColumnFunc();
	}

	public function getId(){
		return $this->id;
	}

	public function setId($id) {
		$this->id = $id;
	}

	public function getNimMahasiswa(){
		return $this->nim_mahasiswa;
	}

	public function setNimMahasiswa($nim_mahasiswa) {
		$this->nim_mahasiswa = $nim_mahasiswa;
	}

	public function getTanggalPengaduan(){
		return $this->tanggal_pengaduan;
	}

	public function setTanggalPengaduan($tanggal_pengaduan) {
		$this->tanggal_pengaduan = $tanggal_pengaduan;
	}

	public function getJudul(){
		return $this->judul;
	}

	public function setJudul($judul) {
		$this->judul = $judul;
	}

	public function getIsi(){
		return $this->isi;
	}

	public function setIsi($isi) {
		$this->isi = $isi;
	}

	public function getBukti(){
		return $this->bukti;
	}

	public function setBukti($bukti) {
		$this->bukti = $bukti;
	}

	public function getStatus(){
		return $this->status;
	}

	public function setStatus($status) {
		$this->status = $status;
	}

	public function getIdKategori(){
		return $this->id_kategori;
	}

	public function setIdKategori($id_kategori) {
		$this->id_kategori = $id_kategori;
	}

	public function getPrivasiPengadu(){
		return $this->privasi_pengadu;
	}

	public function setPrivasiPengadu($privasi_pengadu) {
		$this->privasi_pengadu = $privasi_pengadu;
	}

	public function getDeskripsiTindakLanjut(){
		return $this->deskripsi_tindak_lanjut;
	}

	public function setDeskripsiTindakLanjut($deskripsi_tindak_lanjut) {
		$this->deskripsi_tindak_lanjut = $deskripsi_tindak_lanjut;
	}

	public function getTanggalTindakLanjut(){
		return $this->tanggal_tindak_lanjut;
	}

	public function setTanggalTindakLanjut($tanggal_tindak_lanjut) {
		$this->tanggal_tindak_lanjut = $tanggal_tindak_lanjut;
	}

}
