<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Page extends CI_Controller
{

    public function __Construct()
    {
        parent::__Construct();
        $this->load->library('form_validation');
        $this->load->model('M_page');
    }



    public function index()
    {
        $data['myinformasi'] = $this->M_page->get_informasi_view();
        $data['mykonfig']    = $this->M_page->get_konfig_view();
        $data['myslide']     = $this->M_page->get_slide_view();
        $data['mymatch']     = $this->M_page->get_match_view();
        $data['mysbenner']   = $this->M_page->get_benner_view();
        $data['myschedule']  = $this->M_page->get_schedule_view();
        $data['mytraining']  = $this->M_page->get_training_view();
        $data['myvideo']     = $this->M_page->get_video_view();
        $data['myplayer']    = $this->M_page->get_player_view();
        $data['mygallery']   = $this->M_page->get_gallery_view();
        $data['mynews']      = $this->M_page->get_news_view();
        $data['mysponsorp']  = $this->M_page->get_sponsorp_view();
        $data['mysponsors']  = $this->M_page->get_sponsors_view();


        $this->load->view('template/header');
        $this->load->view('template/navbar', $data);
        $this->load->view('page/home');
        $this->load->view('template/footer');
    }

    public function about()
    {
        $data['myinformasi']  = $this->M_page->get_informasi_view();
        $data['mykonfig']     = $this->M_page->get_konfig_view();
        $data['myslidprofil'] = $this->M_page->get_slideprofil_view();
        $data['myleader']     = $this->M_page->get_leadership_view();
        $data['myhistori']    = $this->M_page->get_histori_view();
        $data['mysponsorp']   = $this->M_page->get_sponsorp_view();
        $data['mysponsors']   = $this->M_page->get_sponsors_view();

        $this->load->view('template/header');
        $this->load->view('template/navbar', $data);
        $this->load->view('page/about');
        $this->load->view('template/footer');
    }

    public function team()
    {
        $data['myinformasi'] = $this->M_page->get_informasi_view();
        $data['mykonfig']    = $this->M_page->get_konfig_view();
        $data['myplayer']    = $this->M_page->get_player_view();
        $data['myplayers']   = $this->M_page->get_players_view();
        $data['mysponsorp']  = $this->M_page->get_sponsorp_view();
        $data['mysponsors']  = $this->M_page->get_sponsors_view();

        $this->load->view('template/header');
        $this->load->view('template/navbar', $data);
        $this->load->view('page/team');
        $this->load->view('template/footer');
    }

    public function gallery()
    {
        $jumlah_data = $this->M_page->get_gallery_total();
        $this->load->library('pagination');
        $config['base_url']   = base_url('page/gallery');
        $config['total_rows'] = count($jumlah_data);
        $config['per_page']   = 8;
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link" style="margin-bottom: -19px; padding: 15px 20px; background: #dfd6ba; margin-right: -6px;">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $from = empty($this->uri->segment(3)) ? 0 : $this->uri->segment(3);
        $this->pagination->initialize($config);
        $data['pagination']  = $this->pagination->create_links();
        $data['mygallery']   = $this->M_page->get_gallery_page($config['per_page'], $from);




        $data['myinformasi'] = $this->M_page->get_informasi_view();
        $data['mykonfig']    = $this->M_page->get_konfig_view();
        $data['mysponsorp']  = $this->M_page->get_sponsorp_view();
        $data['mysponsors']  = $this->M_page->get_sponsors_view();

        $this->load->view('template/header');
        $this->load->view('template/navbar', $data);
        $this->load->view('page/galeri');
        $this->load->view('template/footer');
    }

    public function news()
    {
        $jum_data = $this->M_page->get_news_total();
        $this->load->library('pagination');
        $config['base_url']   = base_url('page/news');
        $config['total_rows'] = count($jum_data);
        $config['per_page']   = 2;
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link" style="margin-bottom: -19px; padding: 15px 20px; background: #dfd6ba; margin-right: -6px;">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $from = empty($this->uri->segment(3)) ? 0 : $this->uri->segment(3);
        $this->pagination->initialize($config);
        $data['pagination']  = $this->pagination->create_links();
        $data['mynews']      = $this->M_page->get_news_page($config['per_page'], $from);





        $data['myinformasi'] = $this->M_page->get_informasi_view();
        $data['mykonfig']    = $this->M_page->get_konfig_view();
        $data['mysbenner']   = $this->M_page->get_benner_view();
        $data['mysponsorp']  = $this->M_page->get_sponsorp_view();
        $data['mysponsors']  = $this->M_page->get_sponsors_view();

        $this->load->view('template/header');
        $this->load->view('template/navbar', $data);
        $this->load->view('page/news');
        $this->load->view('template/footer');
    }

    public function contact()
    {
        $data['myinformasi'] = $this->M_page->get_informasi_view();
        $data['mykonfig']    = $this->M_page->get_konfig_view();
        $data['mysponsorp']  = $this->M_page->get_sponsorp_view();
        $data['mysponsors']  = $this->M_page->get_sponsors_view();

        $this->load->view('template/header');
        $this->load->view('template/navbar', $data);
        $this->load->view('page/contact');
        $this->load->view('template/footer');
    }

    public function newsingle($kode = null)
    {
        $data['myinformasi'] = $this->M_page->get_informasi_view();
        $data['mykonfig']    = $this->M_page->get_konfig_view();
        $data['mynewsingel'] = $this->M_page->get_news_kode($kode);
        $data['mynews']      = $this->M_page->get_news_view();
        $data['mysbenner']   = $this->M_page->get_benner_view();
        $data['mysponsorp']  = $this->M_page->get_sponsorp_view();
        $data['mysponsors']  = $this->M_page->get_sponsors_view();


        $this->load->view('template/header');
        $this->load->view('template/navbar', $data);
        $this->load->view('page/newsingle');
        $this->load->view('template/footer');
    }
}
