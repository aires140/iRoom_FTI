<?php 

class Jadwal_GeneticAlgorithm {
    private $populationSize;
    private $mutationRate;
    private $population;
    private $rangeWaktuPagi;
    private $rangeWaktuSore;
    private $initialPopulation;
    
    public function __construct($populationSize, $mutationRate, $rangeWaktuPagi, $rangeWaktuSore) {
        $this->populationSize = $populationSize;
        $this->mutationRate = $mutationRate;
        $this->rangeWaktuPagi = $rangeWaktuPagi;
        $this->rangeWaktuSore = $rangeWaktuSore;
        $this->initialPopulation = null;
    }

    public function runGeneticAlgorithm($ruangan, $mataKuliah, $hari) {
        
        // Inisialisasi populasi awal secara acak
        if ($this->initialPopulation === null) {
            $this->initializePopulation($ruangan, $mataKuliah, $hari);

        $generations = 0;
        $maxGenerations = 100; // Jumlah maksimal generasi yang dijalankan

        // Proses seleksi, crossover, dan mutasi hingga mencapai kondisi berhenti
        while ($generations < $maxGenerations) {
            $this->selection();
            $this->crossoverAndMutation($hari);
            $this->evaluatePopulation();
            $generations++;
        }

        // Ambil individu terbaik dari populasi dan kembalikan sebagai hasil jadwal
        $bestIndividual = $this->getBestIndividual();
        return $bestIndividual; 
        
        }
    }

    
    private function initializePopulation($ruangan, $mataKuliah, $hari) {
        // srand(123);
        $this->population = array();
    
        for ($i = 0; $i < $this->populationSize; $i++) {
            $jadwalIndividu = array();
            $mataKuliahC = array_slice($mataKuliah, 0);
    
            foreach ($mataKuliahC as $mk) {
                if (isset($mk['mata_kuliah']) && isset($mk['kategori'])) {
                    $hariRandom = $hari[array_rand($hari)];
                    $rangeWaktu = $mk['kategori'] === 'Pagi' ? $this->rangeWaktuPagi : $this->rangeWaktuSore;
    
                    $waktuRandomCount = min(rand(1, 3), count($rangeWaktu));
                    $waktuRandomKeys = array_rand($rangeWaktu, $waktuRandomCount);
                    $waktuRandom = is_array($waktuRandomKeys) ? $waktuRandomKeys : [$waktuRandomKeys];
    
                    // Filter ruangan yang sesuai dengan mata kuliah dan kategori
                    $availableRooms = array_filter($ruangan, function ($ruang) use ($mk) {
                        return $ruang['ket'] === $mk['ket'];
                    });
    
                    foreach ($waktuRandom as $key) {
                        // Cek apakah ada jadwal yang telah dibuat pada hari dan waktu yang sama
                        $kunciUnik = $mk['id_kelas'] . '-' . $mk['mata_kuliah'];
                        $ruang = $availableRooms[array_rand($availableRooms)];
                        if (!isset($jadwalIndividu[$kunciUnik])) {
                            $jadwalIndividu[$kunciUnik] = array(
                                'matkul' => $mk,
                                'ruangan' => $ruang,
                                'waktu' => array(
                                    'hari' => $hariRandom,
                                    'range_waktu' => $rangeWaktu[$key]
                                ),
                            );
                        }
                    }
                }
            }
    
            // Hapus elemen yang kosong dari array $jadwalIndividu sebelum menambahkannya ke $this->population
            $jadwalIndividu = array_filter($jadwalIndividu);
        
            if (!empty($jadwalIndividu)) {
                $this->population[] = $jadwalIndividu;
            } 
        }
    }

    private function evaluatePopulation() {

        foreach ($this->population as &$individual) {
            // Pastikan setiap individu dalam populasi adalah array yang valid
            if (!is_array($individual)) {
                $individual = array();
            }

            $conflictCount = $this->countConflicts($individual);
            $individual['fitness'] = 1 / ($conflictCount + 1); // +1 untuk menghindari pembagian dengan nol

        }
    }

    private function countConflicts($individual) {
    
        $conflictCount = 0;
        $tempJadwal = array();
    
        foreach ($individual as $kelas) {
            // Pastikan $kelas adalah array sebelum mencoba menghitung jumlah elemennya
            if (is_array($kelas)) {
                $i = 0;
                $kelasLength = count($kelas);
    
                while ($i < $kelasLength) {
                    $mk = $kelas[$i];
    
                    // Pastikan 'range_waktu' selalu dianggap sebagai array sebelum mengakses elemennya
                    $waktuArr = is_array($mk['range_waktu']) ? $mk['range_waktu'] : [$mk['range_waktu']];
    
                    foreach ($waktuArr as $waktu) {
                        if (isset($tempJadwal[$waktu])) {
                            $conflictCount++;
                        } else {
                            $tempJadwal[$waktu] = true;
                        }
                    }
    
                    $i++;
                }
            }
        }
    
        return $conflictCount;
    }
    
    private function selection() {

        $elitismCount = 2; // Jumlah individu terbaik yang masuk ke generasi berikutnya

        $sortedPopulation = $this->population;
        usort($sortedPopulation, function ($a, $b) {
            return $a['fitness'] < $b['fitness'] ? 1 : -1; // Urutkan berdasarkan nilai fitness terbaik
        });

        $this->population = array_slice($sortedPopulation, 0, $elitismCount);
        $this->shufflePopulation(); // Acak posisi individu dalam populasi
    }

    private function crossoverAndMutation($hari) {

        while (count($this->population) < $this->populationSize) {
            $parent1 = $this->population[array_rand($this->population)];
            $parent2 = $this->population[array_rand($this->population)];

            $child1 = $this->createChild($hari, $parent1, $parent2);
            $child2 = $this->createChild($hari, $parent2, $parent1);

            $this->population[] = $this->mutation($hari, $child1);
            $this->population[] = $this->mutation($hari, $child2);
        }
    }

    private function createChild($hari, $parent1, $parent2) {
        // Buat keturunan baru dengan melakukan crossover pada dua orang tua (parent)
        // dan menukar rentang waktu (range_waktu) dari dua mata kuliah yang dipilih.
    
        $child = array();
    
        $parent1Count = count($parent1);
        $parent2Count = count($parent2);
        $maxCount = max($parent1Count, $parent2Count);
    
        for ($i = 0; $i < $maxCount; $i++) {
            // Ambil dua mata kuliah secara bergantian dari dua orang tua
            $mk1 = $parent1[$i] ?? null;
            $mk2 = $parent2[$i] ?? null;
    
            // Jika $mk1 atau $mk2 kosong, maka lanjutkan ke iterasi berikutnya
            if (!$mk1 || !$mk2) {
                continue;
            }
    
            // Pilih mata kuliah dan rentang waktu (range_waktu) dari parent secara acak
            $parent = $i % 2 === 0 ? $parent1 : $parent2;
    
            $mataKuliah = $parent[$i]['mata_kuliah'];
            $rangeWaktu = $parent[$i]['range_waktu'];
            $kategoriKelas = $parent[$i]['hari'] === 'Pagi' ? 'Pagi' : 'Sore';
    
            // Masukkan mata kuliah dan rentang waktu (range_waktu) ke dalam child
            $child[] = array(
                'mata_kuliah' => $mataKuliah,
                'range_waktu' => $rangeWaktu,
                'hari' => $hari[array_rand($hari)],
            );
        }
    
        return $child;
    }
    

    private function mutation($hari, $individual) {
        foreach ($individual as &$mk) {
            // Pastikan $mk adalah array
            if (!is_array($mk)) {
                $mk = array(
                    'mata_kuliah' => $mk, // Tentukan properti lainnya sesuai kebutuhan
                    'range_waktu' => '', // Nilai awal range_waktu (kosong atau sesuai kebutuhan)
                    'hari' => '', // Nilai awal hari (kosong atau sesuai kebutuhan)
                );
            }
    
            if (rand(0, 100) < $this->mutationRate) {
                // Mutasi terjadi, ganti hari secara acak
                $hariRandom = $hari[array_rand($hari)];
                $mk['hari'] = $hariRandom;
    
                // Pilih kategori kelas yang sesuai berdasarkan waktu saat ini
                $kategoriKelas = $hariRandom === 'Pagi' ? 'Pagi' : 'Sore';
                $rangeWaktuKelas = $kategoriKelas === 'Pagi' ? $this->rangeWaktuPagi : $this->rangeWaktuSore;
    
                // Pastikan 'rangeWaktuKelas' tidak kosong sebelum memilih waktu secara acak
                $waktuRandom = !empty($rangeWaktuKelas) ? $rangeWaktuKelas[array_rand($rangeWaktuKelas)] : '';
                $mk['range_waktu'] = $waktuRandom;
            }
        }
        return $individual;
    }

    private function getBestIndividual() {
        // Ambil individu terbaik dari populasi berdasarkan nilai fitness tertinggi
        $bestIndividual = $this->population[0];
        foreach ($this->population as $individual) {
            if ($individual['fitness'] > $bestIndividual['fitness']) {
                $bestIndividual = $individual;
            }
        }

        return $bestIndividual;
    }

    private function shufflePopulation() {
        // Acak posisi individu dalam populasi
        shuffle($this->population);
    }
}
