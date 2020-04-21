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
	private $user_id_admin_verifikator;
	private $deskripsi_tindak_lanjut;
	private $tanggal_tindak_lanjut;
	private $id_pegawai_penindak_lanjut;

	protected function setColumnFunc() {
		$colfun = Array(
			'id' => 'Id',
			'nim_mahasiswa' => 'NimMahasiswa',
			'tanggal_pengaduan' => 'TanggalPengaduan',
			'judul' => 'Judul',
			'isi' => 'Isi',
			'bukti' => 'Bukti',
			'status' => 'Status',
			'id_kategori' => 'IdKategori',
			'privasi_pengadu' => 'PrivasiPengadu',
			'user_id_admin_verifikator' => 'UserIdAdminVerifikator',
			'deskripsi_tindak_lanjut' => 'DeskripsiTindakLanjut',
			'tanggal_tindak_lanjut' => 'TanggalTindakLanjut',
			'id_pegawai_penindak_lanjut' => 'IdPegawaiPenindakLanjut'
		);

		$this->columnFunc = $colfun;
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

	public function getUserIdAdminVerifikator(){
		return $this->user_id_admin_verifikator;
	}

	public function setUserIdAdminVerifikator($user_id_admin_verifikator) {
		$this->user_id_admin_verifikator = $user_id_admin_verifikator;
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

	public function getIdPegawaiPenindakLanjut(){
		return $this->id_pegawai_penindak_lanjut;
	}

	public function setIdPegawaiPenindakLanjut($id_pegawai_penindak_lanjut) {
		$this->id_pegawai_penindak_lanjut = $id_pegawai_penindak_lanjut;
	}

}
