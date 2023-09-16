<?php

// Mendapatkan tanggal hari ini
  $todayDate = date("d F Y");
  $todayDay = date("d");
  // Mendapatkan hari dari tanggal hari ini
  $days = array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu");
  $todayDayNumber = date("w"); // Mendapatkan angka hari (0 untuk Minggu, 1 untuk Senin, dst.)
  $todayDayName = $days[$todayDayNumber];

?>

    <div class="content">
            <div class="container-fluid">
        <!-- Small boxes (Start box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-gradient-blue shadow rounded-lg">
              <div class="inner">
                <h3><?= count($data['JmlRuangKosong']); ?></h3>

                <p>Ruangan Kosong</p>
              </div>
              <div class="icon">
                <i class="nav-icon fas fa-door-open"></i>
              </div>
              <a href="<?= BASEURL; ?>Ruangan" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-gradient-blue shadow rounded-lg">
              <div class="inner">
                <h3><?= count($data['JmlRuangIsi']); ?></h3>

                <p>Ruangan Dipakai</p>
              </div>
              <div class="icon">
                <i class="nav-icon fas fa-door-closed"></i>
              </div>
              <a href="<?= BASEURL; ?>Ruangan" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->


          <div class="row" style="margin: 2px; margin-top: 20px;">
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
              <strong style="font-size: large;">Selamat datang User!</strong><br> Kamu sekarang dapat mengakses iRoom Informatika.
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          </div>


          <!-- kirim data mata kuliah -->
          <!-- notif jadwal user hari ini -->
          <div class="row" style="margin: 2px; margin-top: 20px;">
          <?php
            date_default_timezone_set('Asia/Jakarta'); // Mengatur zona waktu ke WIB (Waktu Indonesia Barat)

            $hasTodaySchedule = false;
            $notificationMessage = '';
            $remainingTime = 0; // Inisialisasi waktu mundur

            foreach ($data['jadwal'] as $jadwal) {
                if ($jadwal['hari'] === $todayDayName) {
                    list($startHour, $startMinute) = explode(':', explode('-', $jadwal['range_waktu'])[0]);
                    list($endHour, $endMinute) = explode(':', explode('-', $jadwal['range_waktu'])[1]);
                    $scheduleEndTime = mktime($endHour, $endMinute, 0);

                    $hasTodaySchedule = true;
                    $notificationMessage = "Anda memiliki jadwal hari ini: {$jadwal['mata_kuliah']} pukul {$jadwal['range_waktu']}";
                    
                    // Hitung waktu mundur
                    $currentTime = time();
                    $remainingTime = $scheduleEndTime - $currentTime;
                    break; // Keluar dari loop setelah menemukan jadwal
                }
            }

            if ($hasTodaySchedule) {
                $baseurl = BASEURL; // Ganti dengan base URL Anda

                if ($remainingTime <= 0) {
                    echo '
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong style="font-size: large;">Waktu untuk menggunakan ruangan telah berakhir.</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                } else {
                    if ($remainingTime === 0) {
                        $actionURL = $baseurl . '/Ruangan/setKosong/' . $jadwal['id_ruangan'];
                    } else {
                        $actionURL = $baseurl . '/Ruangan/setTerisi/' . $jadwal['id_ruangan'];
                    }

                    echo '
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong style="font-size: large;">Jadwal kamu hari ini</strong>
                        <p style="font-size: small;"><i>' . $todayDayName . ', ' . $todayDate . '</i></p>
                        <p>Mata kuliah <b>' . $jadwal['mata_kuliah'] . '</b> total sks <b>' . $jadwal['sks'] . '</b>, <b>' . $jadwal['kode_ruangan'] . '</b> pukul <b>' . $jadwal['range_waktu'] . '</b></p>
                        <a href="' . $actionURL . '" class="btn btn-warning" style="text-decoration: none; font-size: medium">Gunakan ruangan</a>
                        <p id="countdown" style="font-size: medium; margin-top: 10px;"></p>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                }
            }
            ?>

            <script>
                // Fungsi untuk menghitung dan menampilkan hitungan mundur
                function updateCountdown() {
                    var countdownElement = document.getElementById("countdown");
                    var seconds = <?php echo $remainingTime; ?>;
                    
                    if (seconds <= 0) {
                        countdownElement.innerHTML = "Waktu sudah habis!";
                    } else {
                        var minutes = Math.floor(seconds / 60);
                        seconds %= 60;
                        var hours = Math.floor(minutes / 60);
                        minutes %= 60;
                        
                        countdownElement.innerHTML = "Sisa waktu: " + hours + " jam " + minutes + " menit " + seconds + " detik";
                        
                        setTimeout(updateCountdown, 1000); // Update setiap 1 detik
                    }
                }
                
                // Panggil fungsi untuk pertama kali
                updateCountdown();
            </script>


            <script>
                // Fungsi untuk menghitung dan menampilkan hitungan mundur
                function updateCountdown() {
                    var countdownElement = document.getElementById("countdown");
                    var seconds = <?php echo $remainingTime; ?>;
                    
                    if (seconds <= 0) {
                        countdownElement.innerHTML = "Waktu sudah habis!";
                    } else {
                        var minutes = Math.floor(seconds / 60);
                        seconds %= 60;
                        var hours = Math.floor(minutes / 60);
                        minutes %= 60;
                        
                        countdownElement.innerHTML = "Sisa waktu: " + hours + " jam " + minutes + " menit " + seconds + " detik";
                        
                        setTimeout(updateCountdown, 1000); // Update setiap 1 detik
                    }
                }
                
                // Panggil fungsi untuk pertama kali
                updateCountdown();
            </script>
  
          </div>







          <!-- notif jadwal user hari ini -->
<!-- notif jadwal user hari ini -->
<!-- <div class="row" style="margin: 2px; margin-top: 20px;">
    <?php
    date_default_timezone_set('Asia/Jakarta'); // Mengatur zona waktu ke WIB (Waktu Indonesia Barat)

    $currentTime = time();

    foreach ($data['jadwal'] as $jadwal) {
        list($startHour, $startMinute) = explode(':', explode('-', $jadwal['range_waktu'])[0]);
        list($endHour, $endMinute) = explode(':', explode('-', $jadwal['range_waktu'])[1]);
        $scheduleStartTime = mktime($startHour, $startMinute, 0);
        $scheduleEndTime = mktime($endHour, $endMinute, 0);

        if ($currentTime >= $scheduleStartTime && $currentTime <= $scheduleEndTime && $jadwal['status'] === 'kosong') {
            ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong style="font-size: large;">Jadwal kamu hari ini</strong>
                <p style="font-size: small;"><i><?= $todayDayName ?>, <?= $todayDate; ?></i></p>

                <p>Mata kuliah <b><?= $jadwal['mata_kuliah'] ?></b> total sks <b><?= $jadwal['sks'] ?></b>, <b><?= $jadwal['kode_ruangan'] ?></b> pukul <b><?= $jadwal['range_waktu'] ?></b></p>

                <button id="gunakanButton" class="btn btn-warning" style="text-decoration: none; font-size: medium">Gunakan Ruangan</button>
                <p id="countdown" style="font-size: medium; margin-top: 10px;"></p>
                <script>
                    var gunakanButton = document.getElementById("gunakanButton");
                    gunakanButton.addEventListener("click", function() {
                        gunakanButton.classList.remove("btn-warning");
                        gunakanButton.classList.add("btn-secondary");
                        gunakanButton.innerHTML = "Sedang Digunakan";
                        document.getElementById("countdown").style.display = "block";

                        var baseurl = "<?= BASEURL; ?>"
                        var actionURL = baseurl + '/Ruangan/setTerisi/' + <?= $jadwal['id_ruangan'] ?>;
                        var scheduleEndTime = <?= $scheduleEndTime * 1000; ?>;

                        // Fungsi untuk menghitung dan menampilkan hitungan mundur
                        function updateCountdown() {
                            var countdownElement = document.getElementById("countdown");
                            var remainingTime = scheduleEndTime - Date.now();

                            if (remainingTime <= 0) {
                                countdownElement.innerHTML = "Waktu sudah habis!";
                                gunakanButton.classList.remove("btn-secondary");
                                gunakanButton.classList.add("btn-warning");
                                gunakanButton.innerHTML = "Gunakan Ruangan";
                                countdownElement.style.display = "none";
                                var jadwalAlert = document.querySelector(".alert");
                                jadwalAlert.style.display = "none";

                                // Redirect to setKosong
                                window.location.href = baseurl + '/Ruangan/setKosong/' + <?= $jadwal['id_ruangan'] ?>;
                            } else {
                                var seconds = Math.floor(remainingTime / 1000) % 60;
                                var minutes = Math.floor(remainingTime / (1000 * 60)) % 60;
                                var hours = Math.floor(remainingTime / (1000 * 60 * 60));

                                countdownElement.innerHTML = "Sisa waktu: " + hours + " jam " + minutes + " menit " + seconds + " detik";

                                setTimeout(updateCountdown, 1000); // Update setiap 1 detik
                            }
                        }

                        // Panggil fungsi untuk pertama kali
                        updateCountdown();
                    });
                </script>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
            break;
        }
    }
    ?>
</div> -->










          <!-- Visi dan Misi teknik informatika -->
          <!-- small box -->
          <div class="row" style="padding-right:3%;">
            <div class="small-box bg-white shadow" style="padding: 3%; margin:2%; padding-right:5%;">
              <h4 class="m-0"><b style="color:blue;"><center>Visi & Misi</center></b></h4><hr>
                <strong><center>Visi</center></strong>
                <p>Menjadi Program Studi Teknik Informatika yang mampu menghasilkan lulusan yang unggul dan mandiri bidang rekayasa perangkat lunak di Jawa Barat pada tahun 2028.</p>
                <strong><center>Misi</center></strong>
                <ul style="text-align: justify;">
                  <li><p>Mengembangkan sistem dan proses belajar bidang rekayasa perangkat lunak serta mampu mengembangkan Pendidikan untuk menghasilkan lulusan yang unggul dan mandiri.</p></li>
                  <li><p>Mengembangkan penelitian bidang rekayasa perangkat lunak yang inovatif dan bermanfaat untuk perkembangan teknologi rekayasa perangkat lunak dan masyarakat.</p></li>
                  <li><p>Mengembangkan pengabdian kepada masyarakat dalam bentuk pengembangan teori, sistem dan aplikasi serta pemecahan berbagai permasalahan bidang rekayasa perangkat lunak yang sesuai dengan kebutuhan masyarakat.</p></li>
                  <li><p>Meningkatkan Kerjasama yang berkelanjutan dengan Lembaga institusi lain, pemerintah industry, asosiasi bidang keilmuan, dan masyarakat dalam rangka meningkatkan terselenggaranya kualitas Pendidikan, penelitian dan pengabdian kepada masyarakat.</p></li>
                </ul>
            </div>
          </div>
          
        </div>

                        

    </div>




