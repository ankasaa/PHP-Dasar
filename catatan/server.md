<p align="center">
  <h1 align="center">🌐 Belajar Superglobal Variable $_SERVER di PHP</h1>
  <p align="center">
    <img src="https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP">
    <img src="https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white" alt="HTML5">
  </p>
</p>

---

## Alur Kerja

```
BROWSER (Client)                         SERVER (PHP)
      │                                       │
      │  1. Request pertama (buka halaman)    │
      │ ─────────────────────────────────────> │
      │                                       │
      │  2. Server terima request             │
      │     PHP buat array $_SERVER           │
      │     berisi informasi request          │
      │                                       │
      │  3. Script PHP dijalankan             │
      │     $_SERVER tersedia di seluruh      │
      │     script sebagai superglobal        │
      │                                       │
      │  4. Server kirim response             │
      │     HTML dikirim ke browser           │
      │ <───────────────────────────────────── │
      │                                       │
      │  5. Browser tampilkan halaman         │
      │                                       │
```

---

## BAGIAN 1: Apa itu $_SERVER?

> `$_SERVER` adalah **superglobal array** yang berisi informasi mengenai
> **server, environment, dan request** yang sedang dijalankan oleh script PHP.

---

### 1. Penjelasan

- `$_SERVER` adalah array asosiatif yang **dibuat otomatis** oleh PHP
- Berisi informasi tentang **header HTTP**, **path**, **script location**, dan **data server** lainnya
- Tersedia di **semua scope** (tidak perlu deklarasi `global`)
- Sangat berguna untuk **mengontrol alur program** berdasarkan kondisi request

---

### 2. Analogi

> `$_SERVER` seperti **kartu identitas server** — berisi semua informasi dasar tentang
> "siapa saya" (server), "dari mana kamu datang" (client), dan "apa yang kamu minta" (request).

```
Kartu Identitas       = $_SERVER
Nama pemilik          = $_SERVER['SERVER_NAME']
Alamat rumah          = $_SERVER['REMOTE_ADDR']
Jenis kelamin         = $_SERVER['REQUEST_METHOD']
Waktu lahir           = $_SERVER['REQUEST_TIME']
```

---

### 3. Cara Melihat Seluruh Isi $_SERVER

```php
<?php
// Tampilkan semua isi $_SERVER
foreach($_SERVER as $key => $item) {
    echo "<br> $key : $item";
}
?>
```

**Output yang ditampilkan:**

```
PHP_SELF : /server/index.php
SERVER_NAME : localhost
HTTP_HOST : localhost
HTTP_USER_AGENT : Mozilla/5.0...
REQUEST_METHOD : GET
REMOTE_ADDR : 127.0.0.1
... (dan lainnya)
```

---

## BAGIAN 2: Tabel Referensi Lengkap

> Berikut adalah elemen-elemen penting dalam `$_SERVER` beserta deskripsinya.

---

| # | Key | Deskripsi | Contoh Nilai |
| :--- | :--- | :--- | :--- |
| 1 | `$_SERVER['PHP_SELF']` | Menyimpan path file saat ini relatif terhadap root. Berguna untuk menentukan lokasi file. | `/server/index.php` |
| 2 | `$_SERVER['SERVER_NAME']` | Menyimpan nama host server tempat script dijalankan, seperti localhost atau domain. | `localhost` |
| 3 | `$_SERVER['HTTP_HOST']` | Menyimpan header Host dari permintaan HTTP, biasanya berisi nama domain atau alamat IP. | `localhost` |
| 4 | `$_SERVER['HTTP_USER_AGENT']` | Menyimpan informasi tentang browser dan sistem operasi yang digunakan oleh pengguna. | `Mozilla/5.0 (Windows...)` |
| 5 | `$_SERVER['SCRIPT_NAME']` | Menyimpan path skrip yang sedang dijalankan. Berguna untuk menciptakan URL yang dinamis. | `/server/index.php` |
| 6 | `$_SERVER['REQUEST_METHOD']` | Menyimpan metode HTTP yang digunakan untuk mengakses halaman, seperti GET atau POST. | `GET` / `POST` |
| 7 | `$_SERVER['REMOTE_ADDR']` | Menyimpan alamat IP pengguna yang mengakses halaman. | `127.0.0.1` |
| 8 | `$_SERVER['SERVER_PROTOCOL']` | Menyimpan protokol yang digunakan, seperti HTTP/1.1 atau HTTP/2.0. | `HTTP/1.1` |
| 9 | `$_SERVER['REQUEST_TIME']` | Menyimpan timestamp (waktu Unix) saat permintaan dimulai. | `1694000000` |
| 10 | `$_SERVER['QUERY_STRING']` | Menyimpan query string dari URL, jika ada parameter yang dikirimkan melalui URL. | `name=andi&id=5` |
| 11 | `$_SERVER['HTTPS']` | Menyimpan informasi apakah halaman diakses melalui HTTPS (koneksi aman). | `on` / tidak ada |

---

### Perbandingan PHP_SELF vs SCRIPT_NAME

| | `$_SERVER['PHP_SELF']` | `$_SERVER['SCRIPT_NAME']` |
| :--- | :--- | :--- |
| **Isi** | Path + query string tambahan | Path murni script |
| **Contoh** | `/page.php/extra/path` | `/page.php` |
| **Penggunaan** | Form action (hati-hati XSS) | Membuat URL dinamis |
| **Keamanan** | ⚠️ Bisa dimanipulasi attacker | Lebih aman |

---

## BAGIAN 3: $_SERVER['PHP_SELF'] — Form Action Sendiri

> `$_SERVER['PHP_SELF']` mengembalikan path file PHP yang sedang dijalankan,
> sehingga bisa digunakan sebagai **action form** agar form mengirim data ke halaman yang sama.

---

### 1. Syntax

```php
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
```

---

### 2. Contoh: Form dengan PHP_SELF

```php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Server Form</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
        <label for="name">Nama:</label>
        <input type="text" name="name" id="name">
        <button type="submit">Kirim</button>
    </form>
</body>
</html>
```

**Step by step:**

```
$_SERVER['PHP_SELF']
        │
        ▼
PHP akan:
1. Ambil path file saat ini: "/server/index.php"
        │
        ▼
2. Sisipkan ke attribute action form:
   <form action="/server/index.php" method="get">
        │
        ▼
3. Saat form di-submit:
   Browser kirim data ke "/server/index.php?name=andi"
```

---

### 3. Cara Membaca Data dari Form

```php
<?php
// Mengecek metode request
if($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Cek apakah parameter "name" ada di URL
    if(isset($_GET['name'])) {
        echo "Halo, " . $_GET['name'];  // Output: Halo, andi
    }
} else {
    echo "Bukan method GET";
}
?>
```

**Step by step:**

```
Form di-submit (method GET)
        │
        ▼
URL menjadi: /server/index.php?name=andi
        │
        ▼
$_SERVER['REQUEST_METHOD'] == 'GET'?
        │
    ┌───┴───┐
    │       │
   IYA     TIDAK
    │       │
    ▼       ▼
isset     echo
$_GET['name']  "Bukan
    │      method GET"
    ▼
echo "Halo, andi"
```

---

## BAGIAN 4: $_SERVER['REQUEST_METHOD'] — Mengecek Metode Request

> `$_SERVER['REQUEST_METHOD']` menyimpan metode HTTP yang digunakan untuk mengirim request.

---

### 1. Metode HTTP yang Sering Digunakan

| Metode | Fungsi | Contoh Penggunaan |
| :--- | :--- | :--- |
| `GET` | Mengambil data dari server | Load halaman, search, filter |
| `POST` | Mengirim data ke server | Login, registrasi, upload file |
| `PUT` | Memperbarui data | Update profil |
| `DELETE` | Menghapus data | Hapus artikel |

---

### 2. Contoh: Mengecek Metode Request

```php
<?php
if($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Proses untuk GET request
    echo "Method: GET";
} else {
    // Proses untuk POST (atau method lain)
    echo "Bukan method GET";
}
?>
```

---

### 3. Kapan Menggunakan REQUEST_METHOD?

```php
<?php
// Contoh: Handle form login
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Proses form login (kirim data)
    $username = $_POST['username'];
    $password = $_POST['password'];
    // ... proses autentikasi
} else {
    // Tampilkan form login (ambil data)
    echo "<form method='POST'>";
    echo "<input name='username'>";
    echo "<input type='password' name='password'>";
    echo "<button type='submit'>Login</button>";
    echo "</form>";
}
?>
```

**Step by step:**

```
User buka halaman login
        │
        ▼
REQUEST_METHOD == 'GET' (default)
        │
        ▼
Tampilkan form login
        │
        ▼
User isi form, klik "Login"
        │
        ▼
Form submit dengan method POST
        │
        ▼
REQUEST_METHOD == 'POST'
        │
        ▼
Proses autentikasi
```

---

## BAGIAN 5: Contoh Praktis — Kode Lengkap

> Berikut adalah kode lengkap dari `server/index.php` yang bisa langsung dicoba.

---

### 1. Kode Lengkap

```php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Server</title>
</head>
<body>
    <form action="<?php $_SERVER["PHP_SELF"] ?>" method="get">
        <label for="">nama</label>
        <input type="text" name="name" id="name">
    </form>
</body>
</html>

<?php
// Melihat semua isi $_SERVER
foreach($_SERVER as $key => $item){
    echo "<br> $key : $item";
}

// Mengecek metode request
if($_SERVER['REQUEST_METHOD'] == 'GET'){
    echo $_GET["name"];
} else {
    echo "bukan metod get";
}
?>
```

---

### 2. Alur Kode

```
Buka halaman server/index.php
        │
        ▼
HTML ditampilkan (form dengan action PHP_SELF)
        │
        ▼
PHP loop foreach → Tampilkan semua isi $_SERVER
        │
        ▼
Cek REQUEST_METHOD
        │
    ┌───┴───┐
    │       │
   GET     POST/LAIN
    │       │
    ▼       ▼
echo      echo
$_GET     "bukan
["name"]  metod get"
```

---

### 3. Penjelasan Setiap Baris

| Baris | Kode | Penjelasan |
| :--- | :--- | :--- |
| 9 | `action="<?php $_SERVER["PHP_SELF"] ?>"` | Form mengirim data ke halaman yang sama |
| 19-21 | `foreach($_SERVER as $key => $item)` | Loop untuk menampilkan semua isi `$_SERVER` |
| 24 | `if($_SERVER['REQUEST_METHOD'] == 'GET')` | Cek apakah request menggunakan metode GET |
| 25 | `echo $_GET["name"]` | Tampilkan data dari parameter `name` |
| 27 | `echo "bukan metod get"` | Pesan jika bukan metode GET |

---

## ⚠️ Tips Keamanan: Bahaya XSS pada PHP_SELF

> Penggunaan `$_SERVER['PHP_SELF']` tanpa filter dapat menyebabkan **celah keamanan XSS**.

---

### Bahaya yang Mengintai

- ⚠️ **XSS (Cross-Site Scripting)** — Attacker bisa menyisipkan script berbahaya melalui URL
- ⚠️ Contoh serangan: `/page.php/<script>alert('Hacked!')</script>`
- ⚠️ Jika tidak difilter, script akan **dieksekusi oleh browser** pengguna lain
- ⚠️ Bisa mencuri **cookie**, **session**, atau **data sensitif** lainnya

---

### Solusi: Gunakan htmlspecialchars()

```php
// ❌ SALAH — TANPA filter (bahaya XSS)
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">

// ✅ BENAR — DENGAN filter htmlspecialchars()
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="get">
```

**Step by step htmlspecialchars():**

```
$_SERVER['PHP_SELF']
= "/page.php/<script>alert('XSS')</script>"
        │
        ▼
htmlspecialchars()
        │
        ▼
"/page.php/&lt;script&gt;alert('XSS')&lt;/script&gt;"
        │
        ▼
Script TIDAK dieksekusi (aman!)
```

---

### Ringkasan Keamanan

| Tanpa Filter | Dengan htmlspecialchars() |
| :--- | :--- |
| `$_SERVER['PHP_SELF']` | `htmlspecialchars($_SERVER['PHP_SELF'])` |
| ⚠️ Bisa disisipkan script berbahaya | ✅ Aman dari serangan XSS |
| Browser mengeksekusi script | Browser menampilkan teks biasa |
| Data pengguna bisa dicuri | Data pengguna tetap aman |

---

## Ringkasan

```
$_SERVER di PHP
│
├── $_SERVER['PHP_SELF'] — path file saat ini (HATI-HATI XSS!)
│   htmlspecialchars($_SERVER['PHP_SELF'])
│
├── $_SERVER['SERVER_NAME'] — nama host server
│   echo $_SERVER['SERVER_NAME'];
│
├── $_SERVER['HTTP_HOST'] — header Host dari request
│   echo $_SERVER['HTTP_HOST'];
│
├── $_SERVER['HTTP_USER_AGENT'] — info browser & OS
│   echo $_SERVER['HTTP_USER_AGENT'];
│
├── $_SERVER['SCRIPT_NAME'] — path skrip (lebih aman)
│   echo $_SERVER['SCRIPT_NAME'];
│
├── $_SERVER['REQUEST_METHOD'] — metode HTTP (GET/POST)
│   if($_SERVER['REQUEST_METHOD'] == 'GET')
│
├── $_SERVER['REMOTE_ADDR'] — alamat IP pengguna
│   echo $_SERVER['REMOTE_ADDR'];
│
├── $_SERVER['SERVER_PROTOCOL'] — protokol HTTP
│   echo $_SERVER['SERVER_PROTOCOL'];
│
├── $_SERVER['REQUEST_TIME'] — timestamp request
│   echo $_SERVER['REQUEST_TIME'];
│
├── $_SERVER['QUERY_STRING'] — parameter dari URL
│   echo $_SERVER['QUERY_STRING'];
│
├── $_SERVER['HTTPS'] — status koneksi HTTPS
│   if(isset($_SERVER['HTTPS']))
│
└── ⚠️ ATURAN: Gunakan htmlspecialchars() pada PHP_SELF untuk keamanan XSS
```

**Kapan pakai mana?**

| Kebutuhan | Gunakan |
| :--- | :--- |
| Form action (halaman yang sama) | `htmlspecialchars($_SERVER['PHP_SELF'])` |
| Cek metode request (GET/POST) | `$_SERVER['REQUEST_METHOD']` |
| Dapatkan IP pengguna | `$_SERVER['REMOTE_ADDR']` |
| Dapatkan info browser | `$_SERVER['HTTP_USER_AGENT']` |
| Dapatkan nama domain | `$_SERVER['SERVER_NAME']` |
| Dapatkan query string URL | `$_SERVER['QUERY_STRING']` |
| Cek apakah HTTPS | `isset($_SERVER['HTTPS'])` |
| Buat URL dinamis | `$_SERVER['SCRIPT_NAME']` |

---

> **💡 Tips:** Selalu gunakan `htmlspecialchars()` saat menampilkan `$_SERVER['PHP_SELF']`
> atau data dari pengguna ke dalam HTML untuk mencegah serangan **XSS**.
> Prioritaskan keamanan dalam setiap line of code!
