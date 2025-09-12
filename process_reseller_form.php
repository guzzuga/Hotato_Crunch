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

echo $response;
?>