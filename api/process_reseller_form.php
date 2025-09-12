<?php
$token = "VeEJzEmBpJpQSoNyLfvCXY4ZioTXNG74KA9oh1c"; 
$target = "6287874722632"; 

$message = "🎉 *Reseller Baru Hotato Crunch* 🎉\n\n"
         . "--- _Detail Pesanan_ ---\n"
         . "👤 *Nama*: " . $_POST['nama'] . "\n"
         . "📧 *Email*: " . $_POST['email'] . "\n"
         . "📱 *Nomor HP*: " . $_POST['hp'] . "\n"
         . "📦 *Jumlah Order*: " . $_POST['order'] . " pcs\n"
         . "📝 *Pesan Tambahan*: " . $_POST['pesan'] . "\n\n"
         . "--- _Status & Tindakan_ ---\n"
         . "Mohon segera diproses dan hubungi reseller untuk konfirmasi lebih lanjut.\n"
         . "_Terima kasih_";

$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.fonnte.com/send",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_POST => true,
  CURLOPT_POSTFIELDS => array(
    'target' => $target,
    'message' => $message,
  ),
  CURLOPT_HTTPHEADER => array("Authorization: $token"),
));
$response = curl_exec($curl);
curl_close($curl);

// Mengubah respons untuk memberikan umpan balik kepada pengguna
$response_data = json_decode($response, true);

if ($response_data && isset($response_data['status']) && $response_data['status'] == true) {
    // Jika pengiriman berhasil, arahkan pengguna ke halaman Terima Kasih
    echo "<!DOCTYPE html><html lang='id'><head><meta charset='UTF-8'><title>Terima Kasih</title><style>body{font-family: Arial, sans-serif; text-align: center; padding-top: 50px;} .container{max-width: 600px; margin: auto; padding: 20px; border: 1px solid #ccc; border-radius: 8px;} h1{color: #28a745;} p{color: #6c757d;}</style></head><body><div class='container'><h1>Terima Kasih!</h1><p>Permintaan Anda telah berhasil dikirim. Tim kami akan segera menghubungi Anda.</p></div></body></html>";
} else {
    // Jika pengiriman gagal, tampilkan pesan error
    echo "<!DOCTYPE html><html lang='id'><head><meta charset='UTF-8'><title>Error</title><style>body{font-family: Arial, sans-serif; text-align: center; padding-top: 50px;} .container{max-width: 600px; margin: auto; padding: 20px; border: 1px solid #ccc; border-radius: 8px;} h1{color: #dc3545;} p{color: #6c757d;}</style></head><body><div class='container'><h1>Oops!</h1><p>Terjadi kesalahan saat mengirim permintaan Anda. Silakan coba lagi.</p><p>Error: " . htmlspecialchars($response) . "</p></div></body></html>";
}

?>
