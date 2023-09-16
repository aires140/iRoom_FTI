<?php 

// require __DIR__ . '/../algoritma/GreedyAlgorithm.php'; // Ubah nama file kelas GreedyAlgorithm sesuai dengan file yang sesuai

// class Proses extends Controller {

//     public function index() {
//         $data['title'] = 'Penjadwalan Ruangan Kampus';
//         $mataKuliah = $this->model('Proses_model')->getMataKuliah();
//         $ruangan = $this->model('Proses_model')->getRuangan();
//         $rangeWaktuPagi = $this->model('Proses_model')->getRangeWaktuPagi();
//         $rangeWaktuSore = $this->model('Proses_model')->getRangeWaktuSore();
//         $hari = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];

//         // Inisialisasi objek Jadwal_GreedyAlgorithm dengan parameter yang tepat
//         $greedyAlgorithm = new Jadwal_GreedyAlgorithm($ruangan, $mataKuliah, $hari, $rangeWaktuPagi, $rangeWaktuSore);

//         // Jalankan algoritma greedy
//         $hasilJadwal = $greedyAlgorithm->runGreedyAlgorithm();
        
//         // Panggil fungsi algoritma greedy untuk mengatur penjadwalan
//         // dan simpan hasil penjadwalan di dalam array $data['hasilJadwal']
//         var_dump($hasilJadwal);


//         $this->view('templates/header');
//         $this->view('templates/topbar');
//         $this->view('templates/sidebar');
//         $this->view('proses/index', $data); // Tampilkan view penjadwalan dengan data hasil penjadwalan
//         $this->view('templates/footer');
//     }

//     // Tambahkan fungsi lain yang dibutuhkan, misalnya untuk menyimpan hasil penjadwalan ke dalam database atau sumber data lainnya.
// }


require __DIR__ . '/../algoritma/geneticAlgorithm.php';

class Proses extends Controller {

    public function index() {
        $data['title'] = 'Penjadwalan';
        $mataKuliah = $this->model('Proses_model')->getMataKuliah();
        $ruangan = $this->model('Proses_model')->getRuangan();
        $rangeWaktuPagi = $this->model('Proses_model')->getRangeWaktuPagi();
        $rangeWaktuSore = $this->model('Proses_model')->getRangeWaktuSore();
        $hari = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];

        // Inisialisasi objek Jadwal_GeneticAlgorithm dengan parameter yang tepat
        $geneticAlgorithm = new Jadwal_GeneticAlgorithm(10, 1, $rangeWaktuPagi, $rangeWaktuSore);

        // Jalankan algoritma genetika
        $hasilJadwal = $geneticAlgorithm->runGeneticAlgorithm($ruangan, $mataKuliah, $hari);
        // Panggil fungsi algoritma genetika untuk mengatur penjadwalan
        // dan simpan hasil penjadwalan di dalam array $data['hasilJadwal']
        $data['hasilJadwal'] = $hasilJadwal;

        // foreach( $dataa['hasilJadwal']as $link) {
        //     if($link == '') {
        //         unset($link);
        //     }
        // } return $data['hasilJadwal'];


        // var_dump($hasilJadwal);
        // Tampilkan hasil penjadwalan
        $data['jadwal'] = $this->model('Jadwal_model')->getAllJadwal();
        
        $this->view('templates/header', $data);
        $this->view('templates/topbar');
        $this->view('templates/sidebar', $data);
        $this->view('jadwal/index', $data); // Tampilkan view penjadwalan dengan data hasil penjadwalan
        $this->view('templates/footer');
    }

    public function cari() {
        $data['title'] = 'Penjadwalan';
        $data['jadwal'] = $this->model('Jadwal_model')->cariDataJadwal();

        $this->view('templates/header', $data);
        $this->view('templates/topbar');
        $this->view('templates/sidebar', $data);
        $this->view('jadwal/index', $data); // Tampilkan view penjadwalan dengan data hasil penjadwalan
        $this->view('templates/footer');
    }

    public function tambah()
    {
        if( $this->model('Proses_model')->tambahUpdateJadwal($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'diperbarui', 'success');
            header('Location: ' . BASEURL . 'Proses');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diperbarui', 'danger');
            header('Location: ' . BASEURL . 'Proses');
            exit;
        }
        
    }

    public function forNotif()
    {
        $data['jadwal'] = $this->model('Jadwal_model')->getAllJadwal();
        
        $this->view('templates/header', $data);
        $this->view('templates/topbar');
        $this->view('templates/sidebar', $data);
        $this->view('notifikasi/index', $data); // Tampilkan view penjadwalan dengan data hasil penjadwalan
        $this->view('templates/footer');
    }

    
}
