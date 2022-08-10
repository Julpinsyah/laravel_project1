<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_page extends CI_Model
{
    public function __Construct()
    {
        parent::__Construct();
    }



    function get_slide_view()
    {
        $query = "SELECT * FROM `tb_slide` s WHERE s.`aktif`='Y' ORDER BY s.`urutan` ASC LIMIT 5";

        return $this->db->query($query)->result_array();
    }

    function get_gallery_view()
    {
        $query = "SELECT * FROM `tb_galery` s WHERE s.`aktif`='Y' ORDER BY s.`urutan` DESC LIMIT 8";

        return $this->db->query($query)->result_array();
    }

    function get_gallery_total()
    {
        $query = "SELECT * FROM `tb_galery` s WHERE s.`aktif`='Y' ORDER BY s.`urutan` DESC";

        return $this->db->query($query)->result_array();
    }

    function get_gallery_page($perpage, $offset)
    {
        $query = "SELECT * FROM `tb_galery` s WHERE s.`aktif`='Y' ORDER BY s.`urutan` DESC 
        LIMIT $perpage offset $offset";

        return $this->db->query($query)->result_array();
    }

    function get_video_view()
    {
        $query = "SELECT * FROM `tb_video` s WHERE s.`aktif`='Y' ORDER BY s.`tanggal` DESC LIMIT 1";

        return $this->db->query($query)->row_array();
    }

    function get_news_view()
    {
        $query = "SELECT * FROM `tb_berita` s WHERE s.`aktif`='Y' ORDER BY s.`tanggal` DESC LIMIT 3";

        return $this->db->query($query)->result_array();
    }

    function get_news_total()
    {
        $query = "SELECT * FROM `tb_berita` s WHERE s.`aktif`='Y' ORDER BY s.`tanggal` DESC";

        return $this->db->query($query)->result_array();
    }

    function get_news_page($perpage, $offset)
    {
        $query = "SELECT * FROM `tb_berita` s WHERE s.`aktif`='Y' ORDER BY s.`tanggal` DESC 
        LIMIT $perpage offset $offset";

        return $this->db->query($query)->result_array();
    }

    function get_news_kode($kode)
    {
        $query = "SELECT * FROM `tb_berita` s WHERE s.`aktif`='Y' AND md5(s.`id`)='$kode' ";

        return $this->db->query($query)->row_array();
    }

    function get_player_view()
    {
        $query = "SELECT * FROM `tb_pemain` s WHERE s.`grup_tim`='primary' AND s.`aktif`='Y' ORDER BY s.`nomor` ASC";

        return $this->db->query($query)->result_array();
    }

    function get_players_view()
    {
        $query = "SELECT * FROM `tb_pemain` s WHERE s.`grup_tim`='secondary' AND s.`aktif`='Y' ORDER BY s.`nomor` ASC";

        return $this->db->query($query)->result_array();
    }

    function get_sponsorp_view()
    {
        $query = "SELECT * FROM `tb_sponsor` s WHERE s.`grup`='primary' AND s.`aktif`='Y' ORDER BY s.`tglmasuk` ASC";

        return $this->db->query($query)->result_array();
    }

    function get_sponsors_view()
    {
        $query = "SELECT * FROM `tb_sponsor` s WHERE s.`grup`='secondary' AND s.`aktif`='Y' ORDER BY s.`tglmasuk` ASC";

        return $this->db->query($query)->result_array();
    }

    function get_training_view()
    {
        $query = "SELECT * FROM `tb_jadwallatihan` s WHERE s.`aktif`='Y' ORDER BY s.`tglmasuk` ASC";

        return $this->db->query($query)->result_array();
    }

    function get_schedule_view()
    {
        $query = "SELECT *, 
        (SELECT c.`nama` FROM `tb_club` c WHERE c.`id`=s.`tandang`) AS clubtandang,
        (SELECT t.`nama` FROM `tb_club` t WHERE t.`id`=s.`tanding`) AS clubtanding FROM `tb_jadwaltanding` s 
        WHERE s.`aktif`='Y' AND s.`tanggal` > DATE(NOW()) ORDER BY s.`tanggal` ASC";

        return $this->db->query($query)->result_array();
    }

    function get_match_view()
    {
        $query = "SELECT *,        
        (SELECT p.`nama` FROM `tb_pertandingan` p WHERE p.`id`=s.`idtanding`) AS pertandingan,
        (SELECT c.`nama` FROM `tb_club` c WHERE c.`id`=s.`tandang`) AS clubtandang,
        (SELECT t.`nama` FROM `tb_club` t WHERE t.`id`=s.`tanding`) AS clubtanding,
        (SELECT l.`logo` FROM `tb_club` l WHERE l.`id`=s.`tandang`) AS logo_tandang,
        (SELECT k.`logo` FROM `tb_club` k WHERE k.`id`=s.`tanding`) AS logo_tanding 
        FROM `tb_jadwaltanding` s 
        WHERE s.`aktif`='Y' ORDER BY s.`tanggal` DESC"; 
        //WHERE s.`aktif`='Y' AND (s.`tandang`='0' OR s.`tanding`='0') ORDER BY s.`tanggal` DESC"; 
        // AND s.`tanggal` <= DATE_ADD(DATE(NOW()), INTERVAL 0 DAY
        // AND s.`tanggal` = DATE(NOW())";

        return $this->db->query($query)->row_array();
    }

    function get_benner_view()
    {
        $query = "SELECT * FROM `tb_benner` s WHERE s.`aktif`='Y' ORDER BY s.`urutan` ASC LIMIT 8";

        return $this->db->query($query)->result_array();
    }

    function get_informasi_view()
    {
        $query = "SELECT * FROM `tb_informasi` i WHERE i.`aktif`='Y' AND i.`batas`>=DATE(NOW())";

        return $this->db->query($query)->result_array();
    }

    function get_konfig_view()
    {
        $query = "SELECT 
        IF(k.`nama`='logo',k.`keterangan`, '') AS logo,
        IF(k.`nama`='icon',k.`keterangan`, '') AS icon,
        IF(k.`nama`='singkatan',k.`keterangan`, '') AS singkatan,
        IF(k.`nama`='profil',k.`keterangan`, '') AS profil,
        IF(k.`nama`='facebook',k.`keterangan`, '') AS facebook,
        IF(k.`nama`='instagram',k.`keterangan`, '') AS instagram,
        IF(k.`nama`='twitter',k.`keterangan`, '') AS twitter,
        IF(k.`nama`='pinterest',k.`keterangan`, '') AS pinterest,
        IF(k.`nama`='youtube',k.`keterangan`, '') AS youtube,
        IF(k.`nama`='map_embed',k.`keterangan`, '') AS map_embed,
        IF(k.`nama`='copyright',k.`keterangan`, '') AS copyright,
        IF(k.`nama`='versi',k.`keterangan`, '') AS versi,
        IF(k.`nama`='negara',k.`keterangan`, '') AS negara,
        IF(k.`nama`='provinsi',k.`keterangan`, '') AS provinsi,
        IF(k.`nama`='kota',k.`keterangan`, '') AS kota,
        IF(k.`nama`='kodepos',k.`keterangan`, '') AS kodepos,
        IF(k.`nama`='alamat',k.`keterangan`, '') AS alamat,
        IF(k.`nama`='gedung',k.`keterangan`, '') AS gedung,
        IF(k.`nama`='telepon',k.`keterangan`, '') AS telepon,
        IF(k.`nama`='handphone',k.`keterangan`, '') AS handphone,
        IF(k.`nama`='hari_kerja',k.`keterangan`, '') AS hari_kerja,
        IF(k.`nama`='jam_kerja',k.`keterangan`, '') AS jam_kerja 
        FROM `tb_konfig` k WHERE k.`aktif`='Y'";

        return $this->db->query($query)->result_array();
    }

    function get_leadership_view()
    {
        $query = "SELECT * FROM `tb_pengurus` s WHERE s.`aktif`='Y' ORDER BY s.`urutan` ASC";

        return $this->db->query($query)->result_array();
    }

    function get_histori_view()
    {
        $query = "SELECT * FROM `tb_histori` s WHERE s.`aktif`='Y' ORDER BY s.`tahun` ASC";

        return $this->db->query($query)->result_array();
    }

    function get_slideprofil_view()
    {
        $query = "SELECT * FROM `tb_slideprofil` s WHERE s.`aktif`='Y' ORDER BY s.`urutan` ASC";

        return $this->db->query($query)->result_array();
    }
}
