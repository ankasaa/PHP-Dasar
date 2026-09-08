# 🐘 Belajar Session di PHP

---

## Alur Kerja

```
BROWSER (Client)                         SERVER (PHP)
      │                                       │
      │  1. Request pertama (buka halaman)    │
      │ ─────────────────────────────────────> │
      │                                       │
      │  2. Server buat session               │
      │     session_start();                  │
      │     Simpan data di $_SESSION          │
      │                                       │
      │  3. Server kirim Session ID           │
      │     (via cookie "PHPSESSID")          │
      │ <───────────────────────────────────── │
      │                                       │
      │  4. Browser SIMPAN Session ID         │
      │     (disimpan di memory browser)      │
      │                                       │
      │                                       │
      │  5. Request berikutnya                │
      │     Browser KIRIM Session ID otomatis │
      │ ─────────────────────────────────────> │
      │                                       │
      │  6. Server BACA Session ID            │
      │     dan ambil data dari $_SESSION     │
      │                                       │
```

---

## BAGIAN 1: Apa itu Session?

> Session adalah **data yang disimpan di server** untuk mengingat identitas pengguna
> selama masih aktif (belum logout atau timeout).

---

### 1. Penjelasan

- Server menyimpan data session di **file** di folder `/tmp` server
- Browser hanya menyimpan **Session ID** (bukan data sesungguhnya)
- Setiap kali browser mengirim request, Session ID **ikut dikirim otomatis**
- Session berguna untuk **menyimpan status** pengguna (login, keranjang belanja, dll)

---

### 2. Analogi

> Session seperti **locker penitipan barang di gym** — kamu menitipkan barang (data),
> lalu diberi kunci (Session ID). Setiap kali mau ambil barang, tunjukkan kunci dulu.
> Barang tetap aman di locker (server), bukan dibawa ke mana-mana (bukan di browser).

```
Kunci locker        = Session ID (disimpan di browser)
Barang di locker    = Data session (disimpan di server)
Ruangan penyimpanan = Server / website
Petugas gym         = PHP (membaca Session ID & mengambil data)
```

---

### 3. Session vs Cookie

| | Session | Cookie |
| :--- | :--- | :--- |
| **Disimpan di** | Server (file) | Browser (client) |
| **Data apa yang disimpan** | Data sesungguhnya | Hanya Session ID / data kecil |
| **Batas ukuran** | Tidak terbatas | ~4 KB |
| **Keamanan** | Lebih aman | Bisa diubah pengguna |
| **Kapan hilang** | Saat logout / timeout | Saat expiry / browser ditutup |

---

## BAGIAN 2: session_start() — Memulai Session

> `session_start()` digunakan untuk **memulai atau melanjutkan session** yang sudah ada.

---

### 1. Syntax

```php
session_start(); // Memulai session baru atau melanjutkan session yang sudah ada
```

---

### 2. Contoh: Memulai Session

```php
<?php
session_start(); // Memulai session — WAJIB dipanggil pertama kali
?>
```

**Step by step:**

```
session_start()
      │
      ▼
PHP akan:
1. Cek apakah browser mengirim Session ID?
      │
   ┌──┴──┐
   │     │
  YA    TIDAK
   │     │
   ▼     ▼
Buka     Buat session BARU
session  dan generate Session ID baru
yang sudah
ada
```

---

### 3. ⚠️ PENTING: Posisi session_start()

```php
// ❌ SALAH — session_start() dipanggil SETELAH ada output
echo "Hello";
session_start();  // WARNING: Cannot send session cookie - headers already sent

// ✅ BENAR — session_start() dipanggil SEBELUM ada output apapun
session_start();  // Session berhasil dimulai
echo "Hello";
```

> **Mengapa?** Session menggunakan **HTTP Header** untuk mengirim Session ID.
> Header harus dikirim sebelum body (HTML/echo). Jika sudah ada output,
> header sudah terkirim, sehingga `session_start()` gagal.

---

### 4. ⚠️ PENTING: Harus di Baris Paling Atas

```php
// ❌ SALAH — ada kode PHP sebelum session_start()
<?php
$nama = "andi";
session_start();  // WARNING!

// ✅ BENAR — session_start() di baris pertama
<?php
session_start();  // Berhasil
$nama = "andi";
```

> **Aturan emas:** `session_start()` harus dipanggil **sebelum** ada output HTML,
> `echo`, `print`, atau bahkan spasi kosong di luar tag PHP.

---

## BAGIAN 3: $_SESSION — Menyimpan & Membaca Data

> `$_SESSION` adalah **superglobal array** yang berisi semua data session.

---

### 1. Menyimpan Data ke Session

```php
<?php
session_start(); // Memulai session terlebih dahulu

// Simpan data ke session
$_SESSION['nama_pengguna'] = "andika";  // Menyimpan nama pengguna
$_SESSION['role'] = "admin";           // Menyimpan role/posisi
$_SESSION['login'] = true;             // Menyimpan status login
?>
```

**Step by step:**

```
$_SESSION['nama_pengguna'] = "andika"
         │           │
         │           └── Nilai yang disimpan: "andika"
         └── Nama key: "nama_pengguna"
                   │
                   ▼
Data disimpan di SERVER (bukan di browser)
Browser hanya menerima Session ID
```

**Cara baca:** "Simpan data `nama_pengguna` dengan nilai `andika` ke dalam session."

---

### 2. Membaca Data dari Session

```php
<?php
session_start(); // Memulai session terlebih dahulu

// Cek apakah data session ada, lalu tampilkan
if (isset($_SESSION['nama_pengguna'])) {
    echo $_SESSION['nama_pengguna'];  // Output: andika
} else {
    echo "Session sudah kosong, nama tidak tampil";
}
?>
```

**Step by step:**

```
isset($_SESSION['nama_pengguna'])
          │
          ▼
Apakah data "nama_pengguna" ada di session?
          │
      ┌───┴───┐
      │       │
     IYA     TIDAK
      │       │
      ▼       ▼
  echo       echo "Session
  $_SESSION  sudah kosong,
  [...]      nama tidak
             tampil"
```

---

### 3. Mengapa Harus Pakai isset()?

```php
// ❌ SALAH — langsung akses tanpa cek
echo $_SESSION['nama_pengguna'];  // Warning jika data belum ada

// ✅ BENAR — cek dulu dengan isset()
if (isset($_SESSION['nama_pengguna'])) {
    echo $_SESSION['nama_pengguna'];  // Aman, hanya dijalankan jika data ada
}
```

> `isset()` mengembalikan `true` jika variabel ada dan bukan `null`,
> mengembalikan `false` jika variabel tidak ada atau `null`.

---

## BAGIAN 4: unset() & session_destroy() — Menghapus Session

> Ada 2 cara menghapus session: menghapus **data tertentu** atau menghapus **semua session**.

---

### 1. unset() — Menghapus Data Tertentu

```php
<?php
session_start(); // Memulai session terlebih dahulu

// Hapus data tertentu dari session
unset($_SESSION['nama_pengguna']); // Data "nama_pengguna" dihapus
// Data lain di $_SESSION masih ada
?>
```

**Step by step:**

```
unset($_SESSION['nama_pengguna'])
          │
          ▼
Data "nama_pengguna" DIHAPUS dari $_SESSION
          │
          ▼
$_SESSION sekarang:
├── 'role' = "admin"        ← Masih ada
├── 'login' = true          ← Masih ada
└── 'nama_pengguna' = ???   ← SUDAH DIHAPUS
```

---

### 2. session_destroy() — Menghancurkan Semua Session

```php
<?php
session_start(); // Memulai session terlebih dahulu

// Hapus SEMUA data session
session_destroy(); // Seluruh session dihapus
?>
```

**Step by step:**

```
session_destroy()
      │
      ▼
SEMUA data di $_SESSION DIHAPUS
      │
      ▼
$_SESSION sekarang:
(KOSONG — tidak ada data sama sekali)
```

---

### 3. Urutan yang Benar: unset() lalu session_destroy()

```php
<?php
session_start(); // Memulai session terlebih dahulu

// ✅ BENAR — hapus data dulu, baru hancurkan session
unset($_SESSION['nama_pengguna']); // Hapus data tertentu
session_destroy();                 // Hancurkan session
?>

// ❌ JANGAN — session_destroy() sebelum unset()
// Karena session_destroy() menghapus SEMUA, jadi unset() jadi tidak berguna
```

---

### 4. Perbandingan unset() vs session_destroy()

| | unset() | session_destroy() |
| :--- | :--- | :--- |
| **Fungsi** | Hapus data **tertentu** | Hapus **semua** session |
| **Parameter** | `$_SESSION['key']` | Tidak ada parameter |
| **Hasil** | Data tertentu hilang | Seluruh session hilang |
| **Contoh** | Logout dari satu akun | Logout total |

---

## BAGIAN 5: Contoh Praktis — Kode Lengkap

> Berikut adalah kode lengkap dari `session/index.php` yang bisa langsung dicoba.

---

### 1. Kode Lengkap

```php
<?php
    //_SESSION merupakan variabel global
    session_start(); //untuk memulai session

    $_SESSION['nama_pengguna']="andika"; //menyimpan data ke session

    if(isset($_SESSION['nama_pengguna'])){ //mengambil data dari session, gunakan $_SESSION sebagai variabel global
        echo($_SESSION['nama_pengguna']);
    }else{
        echo "session sudah kosong, nama tidak tampil";
    }

    unset($_SESSION['nama_pengguna']); //untuk menghapus session, agar bekerja taruh unsetnya di atas if(isset)
    session_destroy(); //untuk menghakhiri session
?>
```

---

### 2. Alur Kode

```
session_start()
      │
      ▼
$_SESSION['nama_pengguna'] = "andika"
      │
      ▼
isset($_SESSION['nama_pengguna'])?
      │
  ┌───┴───┐
  │       │
 IYA     TIDAK
  │       │
  ▼       ▼
echo     echo "session
"andika" sudah kosong,
          nama tidak
          tampil"
  │
  ▼
unset($_SESSION['nama_pengguna'])
      │
      ▼
session_destroy()
      │
      ▼
Session SELESAI — data sudah tidak ada
```

---

### 3. Penjelasan Setiap Baris

| Baris | Kode | Penjelasan |
| :--- | :--- | :--- |
| 3 | `session_start();` | Memulai session baru |
| 5 | `$_SESSION['nama_pengguna']="andika";` | Menyimpan data "andika" ke key "nama_pengguna" |
| 7 | `if(isset($_SESSION['nama_pengguna']))` | Mengecek apakah data "nama_pengguna" ada |
| 8 | `echo($_SESSION['nama_pengguna']);` | Menampilkan data jika ada |
| 10 | `echo "session sudah kosong...";` | Menampilkan pesan jika tidak ada |
| 12 | `unset($_SESSION['nama_pengguna']);` | Menghapus data "nama_pengguna" dari session |
| 13 | `session_destroy();` | Menghancurkan seluruh session |

---

## Ringkasan

```
Session di PHP
│
├── session_start() — memulai session (WAJIB di baris pertama)
│   session_start();
│
├── $_SESSION — menyimpan & membaca data (superglobal array)
│   $_SESSION['key'] = "nilai";        // Simpan
│   echo $_SESSION['key'];             // Baca
│
├── isset() — cek apakah data session ada
│   isset($_SESSION['key'])
│
├── unset() — menghapus data tertentu
│   unset($_SESSION['key']);
│
├── session_destroy() — menghancurkan seluruh session
│   session_destroy();
│
└── ⚠️ ATURAN: session_start() harus SEBELUM output HTML/echo/print
```

**Kapan pakai mana?**

| Kebutuhan | Gunakan |
| :--- | :--- |
| Mulai session | `session_start();` |
| Simpan data di session | `$_SESSION['key'] = "nilai";` |
| Baca data dari session | `echo $_SESSION['key'];` |
| Cek apakah data ada | `isset($_SESSION['key'])` |
| Hapus data tertentu | `unset($_SESSION['key']);` |
| Hancurkan seluruh session | `session_destroy();` |

---

> **💡 Tips:** Session sangat cocok untuk menyimpan data yang **sifatnya rahasia**
> dan **tidak boleh diubah** oleh pengguna (seperti status login, hak akses, dll).
> Untuk data yang **tidak terlalu penting** dan perlu diingat lama, gunakan **Cookie**.
