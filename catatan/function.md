# Catatan: Function

---

## Alur Kerja

```
Program dimulai
       │
       ▼
Definisikan function (simpan kode, belum jalan)
       │
       function salam() {
           echo "Halo";
       }
       │
       ▼
Panggil function (di sinilah kode dijalankan)
       │
       salam();
       │
       ▼
Kode di dalam function dijalankan
       │
       ▼
Program selesai
```

---

## BAGIAN 1: Function Biasa (Tanpa Parameter)

> Function adalah **blok kode** yang bisa dipanggil **berulang kali** tanpa perlu menulis ulang.

---

### 1. Apa itu Function?

```php
// Tanpa function — harus tulis ulang jika ingin pakai lagi
echo "Halo, selamat malam semuanya <br>";
// ... kode lain ...
echo "Halo, selamat malam semuanya <br>"; // ulang lagi!

// Dengan function — cukup definisi sekali, panggil berkali-kali
function salam() {
    echo "Halo, selamat malam semuanya <br>";
}

salam(); // panggil 1
salam(); // panggil 2
salam(); // panggil 3
```

| Komponen   | Penjelasan                              |
| :--------- | :-------------------------------------- |
| `function` | Keyword untuk mendefinisikan function   |
| `salam()`  | Nama function (boleh huruf, angka, _)   |
| `{ ... }`  | Blok kode yang akan dijalankan          |

**Cara baca:** "Buat function bernama `salam`, di dalamnya ada perintah `echo`."

> **Analogi:** Function seperti **mesin otomatis** — kamu definisi mesinnya sekali, lalu bisa tekan tombol berkali-kali untuk dapat hasil yang sama.

---

### 2. Definisi vs Pemanggilan

```php
// DEFINISI — menyimpan kode, belum jalan!
function salam() {
    echo "Halo, selamat malam semuanya";
    echo "<br>";
}

// PEMANGGILAN — di sinilah kode benar-benar dijalankan!
salam();
```

| Komponen     | Penjelasan                              |
| :----------- | :-------------------------------------- |
| `function salam() { ... }` | **Definisi** — mesin disimpan    |
| `salam();`   | **Pemanggilan** — mesin dinyalakan      |

**Cara baca:**

```
function salam() {     ← "Buat mesin bernama 'salam'"
    echo "...";        ← "Isi mesinnya: cetak teks"
}                      ← "Mesin selesai dirakit"

salam();               ← "Nyalakan mesin 'salam'!"
```

**Kapan kode dijalankan?**

```
function salam() {     ← TIDAK dijalankan saat definisi
    echo "Halo";       ← TIDAK dijalankan saat definisi
}                      ← TIDAK dijalankan saat definisi

salam();               ← BARU dijalankan di sini!
```

> **Analogi:** Definisi function seperti **merakit mesin** — mesin sudah jadi tapi belum dinyalakan. Pemanggilan seperti **menekan tombol power** — mesin baru bekerja.

---

## BAGIAN 2: Function dengan Parameter

> Parameter membuat function **lebih fleksibel** — bisa menerima data berbeda setiap kali dipanggil.

---

### 1. Parameter vs Argument

```php
function penjumlahan($a, $b) {   // $a dan $b = PARAMETER (wadah kosong)
    $hasil = $a + $b;
    echo "Jumlah sisi persegi : $hasil";
}

penjumlahan(5, 2);    // 5 dan 2 = ARGUMENT (isi yang dikirim)
penjumlahan(10, 10);  // 10 dan 10 = ARGUMENT
```

| Komponen          | Penjelasan                              |
| :---------------- | :-------------------------------------- |
| `$a`, `$b`       | **Parameter** — wadah kosong di definisi |
| `5`, `2`         | **Argument** — isi yang dikirim saat pemanggilan |

**Perbedaan:**

```
function penjumlahan($a, $b)   ← $a, $b = PARAMETER (wadah)
                  │ │
                  │ └── $b akan diisi oleh argument ke-2
                  └──── $a akan diisi oleh argument ke-1

penjumlahan(5, 2);             ← 5, 2 = ARGUMENT (isi)
                │ │
                │ └── 2 masuk ke $b
                └──── 5 masuk ke $a
```

**Cara baca:** "Kirim angka 5 ke `$a` dan angka 2 ke `$b`, lalu jumlahkan."

> **Analogi:** Parameter seperti **rongga gigi** — kosong, siap diisi. Argument seperti **tambalan gigi** — yang mengisi rongga tersebut.

---

### 2. Cara Kerja Parameter

```php
function penjumlahan($a, $b) {
    $hasil = $a + $b;
    echo "Jumlah sisi persegi : $hasil";
}

penjumlahan(5, 2);
```

**Step by step:**

```
penjumlahan(5, 2)
       │
       ▼
$a = 5, $b = 2 (argument masuk ke parameter)
       │
       ▼
$hasil = $a + $b = 5 + 2 = 7
       │
       ▼
echo "Jumlah sisi persegi : 7"
       │
       ▼
Output: Jumlah sisi persegi : 7
```

---

### 3. Panggil Ulang dengan Data Berbeda

```php
function penjumlahan($a, $b) {
    $hasil = $a + $b;
    echo "Jumlah sisi persegi : $hasil <br>";
}

penjumlahan(5, 2);    // Output: Jumlah sisi persegi : 7
penjumlahan(10, 10);  // Output: Jumlah sisi persegi : 20
penjumlahan(50, 5);   // Output: Jumlah sisi persegi : 55
```

**Keuntungan function:**

```
Tanpa function:
echo 5 + 2;     // tulis manual
echo 10 + 10;   // tulis ulang
echo 50 + 5;    // tulis ulang lagi

Dengan function:
penjumlahan(5, 2);    // cukup panggil
penjumlahan(10, 10);  // panggil lagi
penjumlahan(50, 5);   // panggil lagi
```

> **Analogi:** Seperti **mesin blender** — mesinnya sama, tapi hasilnya beda tergantung buah apa yang dimasukkan.

---

## BAGIAN 3: Return Value (Bonus)

> `return` mengembalikan **nilai** ke pemanggil, bukan menampilkan langsung ke layar.

---

### 1. echo vs return

```php
// echo — tampilkan langsung ke layar
function salam_echo() {
    echo "Halo dari echo";
}

salam_echo();    // Output: Halo dari echo (langsung tercetak)

// return — kirim nilai kembali ke pemanggil
function salam_return() {
    return "Halo dari return";
}

$pesan = salam_return();  // Simpan di variable
echo $pesan;              // Output: Halo dari return
```

| Fitur         | echo                  | return                  |
| :------------ | :-------------------- | :---------------------- |
| Hasil         | Langsung ke layar     | Kembali ke pemanggil    |
| Penyimpanan   | Tidak bisa disimpan   | Bisa disimpan di variabel |
| Penggunaan    | Hanya untuk tampil    | Untuk diproses lebih lanjut |

**Cara baca `return`:**

```
function salam_return() {
    return "Halo dari return";
    │     │
    │     └── nilai yang dikembalikan
    └──────── kirim kembali ke pemanggil
}

$pesan = salam_return();  // $pesan sekarang berisi "Halo dari return"
```

> **Analogi:** `echo` seperti **memanggil nama** — suara langsung terdengar. `return` seperti **mengembalikan barang** — barang dikirim kembali ke pengirim.

---

### 2. Contoh Praktis return

```php
function tambah($a, $b) {
    return $a + $b;
}

$hasil = tambah(5, 3);
echo "Hasil: $hasil";    // Output: Hasil: 8
```

**Step by step:**

```
tambah(5, 3)
       │
       ▼
return 5 + 3 = 8
       │
       ▼
$hasil = 8
       │
       ▼
echo "Hasil: 8"
```

---

## Ringkasan

```
Function PHP
│
├── Definisi — menyimpan kode
│   function namaFunction() { ... }
│
├── Pemanggilan — menjalankan kode
│   namaFunction();
│
├── Parameter — wadah kosong
│   function tambah($a, $b) { ... }
│   tambah(5, 2);  // $a = 5, $b = 2
│
└── Return — mengembalikan nilai
    function tambah($a, $b) {
        return $a + $b;
    }
    $hasil = tambah(5, 3);  // $hasil = 8
```

**Kapan pakai mana?**

| Kebutuhan                          | Gunakan                |
| :--------------------------------- | :--------------------- |
| Kode sama diulang-ulang            | `function` biasa       |
| Function butuh data masukan        | `function` + parameter |
| Function perlu menghasilkan nilai  | `return`               |
| Tampilkan langsung ke layar        | `echo` di dalam function |
