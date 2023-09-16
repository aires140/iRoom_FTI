<?php

// Ambil waktu sekarang
$currentTime = date("l h:i A");

// Cek setiap jadwal
foreach ($data['jadwal'] as $schedule) {
    if ($schedule['day'] == date("l")) {
        // Bagi string waktu_range menjadi waktu awal dan waktu akhir
        list($start_time, $end_time) = explode("-", $schedule['time_range']);

        // Konversi waktu awal dan waktu akhir menjadi timestamp
        $start_timestamp = strtotime($start_time);
        $end_timestamp = strtotime($end_time);

        // Ambil waktu sekarang
        $current_time = strtotime($currentTime);

        // Cek apakah waktu sekarang berada dalam rentang waktu
        if ($current_time >= $start_timestamp && $current_time <= $end_timestamp) {
            $notificationMessage = $schedule['message'];
            break;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- Toast Container -->
<div class="toast-container position-fixed bottom-0 end-0 p-3">
    <!-- Cek apakah ada notifikasi untuk ditampilkan -->
    <?php if (isset($notificationMessage)): ?>
        <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <img src="..." class="rounded me-2" alt="...">
                <strong class="me-auto">iRoom</strong>
                <small><?php echo date("h:i A"); ?></small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                <?php echo $notificationMessage; ?>
            </div>
        </div>
    <?php endif; ?>
</div>

<!-- Bootstrap JS (Popper.js and Bootstrap JS) -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

</body>
</html>
