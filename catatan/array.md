# Catatan: Array

---

## Alur Kerja

```
Program dimulai
       │
       ▼
Buat array
       │
       ├── Short Syntax: $arr = ["a", "b", "c"]
       └── Long Syntax:  $arr = array("a", "b", "c")
              │
              ▼
Pilih operasi
       │
       ├── Akses by index     → $arr[0]
       ├── Akses by key       → $arr["nama"]
       ├── Sort               → sort($arr)
       ├── Merge              → array_merge($arr1, $arr2)
       ├── Cek keberadaan     → in_array("a", $arr)
       └── Loop               → foreach ($arr as $val)
              │
              ▼
Tampilkan hasil
```

---

## BAGIAN 1: Membuat Array

> Array adalah **kumpulan nilai** dalam satu variable — bisa simpan banyak data sekaligus.

---

### 1. Apa itu Array?

```php
// Tanpa array — butuh banyak variable
$sayur1 = "nangka";
$sayur2 = "bayam";
$sayur3 = "wortel";

// Dengan array — cukup satu variable
$sayur = ["nangka", "bayam", "wortel"];
```

| Komponen   | Penjelasan                              |
| :--------- | :-------------------------------------- |
| `$sayur`   | Nama array (variable)                   |
| `[...]`    | Tanda kurung siku = array               |
| `"nangka"` | Elemen pertama (index 0)                |
| `"bayam"`  | Elemen kedua (index 1)                  |
| `"wortel"` | Elemen ketiga (index 2)                 |

**Cara baca:** "Buat array `$sayur` berisi 3 elemen: nangka, bayam, wortel."

> **Analogi:** Array seperti **rak sepatu** — bisa isi banyak pasang sepatu dalam satu rak.

---

### 2. Short Syntax `[]`

```php
$sayur = ["nangka", "bayam", "wortel"];
echo "Membuat array cara 1 <br>";
print_r($sayur);
```

**Output:**

```
Array ( [0] => nangka [1] => bayam [2] => wortel )
```

| Komponen  | Penjelasan                              |
| :-------- | :-------------------------------------- |
| `[...]`   | Short syntax — lebih pendek dan modern  |
| `print_r()`| Menampilkan isi array ke layar         |

**Cara baca:** "Buat array `$sayur` dengan short syntax, lalu tampilkan isinya."

---

### 3. Long Syntax `array()`

```php
$buah = array("pisang", "kelapa", "mangga");
echo "Membuat array cara 2 <br>";
print_r($buah);
```

**Output:**

```
Array ( [0] => pisang [1] => kelapa [2] => mangga )
```

| Komponen     | Penjelasan                              |
| :----------- | :-------------------------------------- |
| `array(...)` | Long syntax — cara lama tapi masih bisa |
| `print_r()`  | Menampilkan isi array ke layar          |

---

### 4. Perbandingan Short vs Long Syntax

| Fitur           | Short Syntax `[]`       | Long Syntax `array()`  |
| :-------------- | :---------------------- | :--------------------- |
| **Syntax**      | `["a", "b", "c"]`      | `array("a", "b", "c")` |
| **Panjang**     | Pendek                  | Panjang                |
| **Modern**      | Ya (PHP 5.4+)          | Semua versi PHP        |
| **Rekomendasi** | **Pakai ini**           | Untuk kompatibilitas   |

> **Rekomendasi:** Gunakan **short syntax `[]`** — lebih pendek dan mudah dibaca.

---

## BAGIAN 2: Memanggil Array

> Array diakses berdasarkan **index** (posisi). Index dimulai dari **0**.

---

### 1. Index Array

```php
$buah = ["pisang", "kelapa", "mangga"];

echo $buah[0];    // Output: pisang
echo $buah[1];    // Output: kelapa
echo $buah[2];    // Output: mangga
```

| Komponen | Penjelasan                              |
| :------- | :-------------------------------------- |
| `$buah`  | Nama array                              |
| `[0]`    | Index ke-0 (elemen pertama)             |
| `[1]`    | Index ke-1 (elemen kedua)               |
| `[2]`    | Index ke-2 (elemen ketiga)              |

**Index dimulai dari 0:**

```
$buah = ["pisang", "kelapa", "mangga"]
         │         │         │
         0         1         2
```

> **Penting:** Index array **selalu mulai dari 0**, bukan 1!

> **Analogi:** Index seperti **nomor loker** — loker pertama bernomor 0, bukan 1.

---

### 2. Contoh Lain

```php
$sayur = ["nangka", "bayam", "wortel"];

echo $sayur[0];    // Output: nangka
echo "<br>";
echo $sayur[1];    // Output: bayam
echo "<br>";
echo $sayur[2];    // Output: wortel
```

**Output:**

```
nangka
bayam
wortel
```

---

## BAGIAN 3: Array Asosiatif

> Array asosiatif menggunakan **key (kunci) string** sebagai index, bukan angka.

---

### 1. Syntax Array Asosiatif

```php
$nama = [
    "anto" => 21,
    "dewa" => 30,
    "rizky" => 40
];
echo "Membuat array asosiatif <br>";
print_r($nama);
```

| Komponen     | Penjelasan                              |
| :----------- | :-------------------------------------- |
| `"anto"`     | Key (kunci) — berupa string             |
| `=>`         | Menunjukkan hubungan key → value        |
| `21`         | Value (nilai) yang tersimpan            |

**Cara baca:** "Buat array asosiatif `$nama` dengan key `anto` bernilai 21, `dewa` bernilai 30, `rizky` bernilai 40."

**Output:**

```
Array ( [anto] => 21 [dewa] => 30 [rizky] => 40 )
```

---

### 2. Akses Array Asosiatif

```php
$nama = [
    "anto" => 21,
    "dewa" => 30,
    "rizky" => 40
];

echo $nama["anto"];    // Output: 21
echo $nama["dewa"];    // Output: 30
echo $nama["rizky"];   // Output: 40
```

**Perbedaan akses:**

| Jenis Array      | Cara Akses       | Contoh             |
| :--------------- | :--------------- | :----------------- |
| Indexed          | Angka            | `$arr[0]`          |
| Asosiatif        | String           | `$arr["anto"]`     |

> **Analogi:** Array asosiatif seperti **lemari dengan label** — setiap laci punya nama, bukan nomor.

---

## BAGIAN 4: Array Multidimensi

> Array multidimensi = **array di dalam array** — setiap elemen bisa berisi sub-array.

---

### 1. Syntax Array Multidimensi

```php
$tour = [
    ["nama" => "Bali",     "harga" => "Rp. 1.000.000"],
    ["nama" => "Surabaya", "harga" => "Rp. 500.000"],
    ["nama" => "IKN",      "harga" => "Rp. 240.000"],
];
```

| Komponen                     | Penjelasan                              |
| :--------------------------- | :-------------------------------------- |
| `$tour`                      | Array induk                              |
| `["nama" => "Bali", ...]`   | Sub-array (elemen ke-0)                 |
| `["nama" => "Surabaya", ...]`| Sub-array (elemen ke-1)                |

**Visual:**

```
$tour
├── [0] → ["nama" => "Bali",     "harga" => "Rp. 1.000.000"]
├── [1] → ["nama" => "Surabaya", "harga" => "Rp. 500.000"]
└── [2] → ["nama" => "IKN",      "harga" => "Rp. 240.000"]
```

---

### 2. Akses Array Multidimensi

```php
$tour = [
    ["nama" => "Bali",     "harga" => "Rp. 1.000.000"],
    ["nama" => "Surabaya", "harga" => "Rp. 500.000"],
    ["nama" => "IKN",      "harga" => "Rp. 240.000"],
];

echo $tour[0]["nama"];     // Output: Bali
echo $tour[0]["harga"];    // Output: Rp. 1.000.000
echo $tour[1]["nama"];     // Output: Surabaya
echo $tour[2]["harga"];    // Output: Rp. 240.000
```

| Komponen        | Penjelasan                              |
| :-------------- | :-------------------------------------- |
| `$tour[0]`      | Ambil sub-array index ke-0              |
| `["nama"]`      | Ambil value dari key "nama"             |

**Cara baca:** "Ambil elemen ke-0 dari `$tour`, lalu ambil value dari key `nama`."

> **Analogi:** Array multidimensi seperti **papan catur** — ada baris (index) dan kolom (key).

---

## BAGIAN 5: Built-in Functions

> PHP punya banyak **fungsi bawaan** untuk manipulasi array.

---

### 1. sort() — Mengurutkan Array

```php
$angka = [5, 4, 3, 2, 1];
sort($angka);
print_r($angka);
```

**Output:**

```
Array ( [0] => 1 [1] => 2 [2] => 3 [3] => 4 [4] => 5 )
```

| Komponen   | Penjelasan                              |
| :--------- | :-------------------------------------- |
| `sort()`   | Fungsi urutkan array dari kecil ke besar|
| `$angka`   | Array yang ingin diurutkan              |

**Cara baca:** "Urutkan array `$angka` dari yang terkecil ke terbesar."

**Sebelum vs Sesudah:**

```
Sebelum: [5, 4, 3, 2, 1]
Sesudah: [1, 2, 3, 4, 5]
```

> **Catatan:** `sort()` mengurutkan dari **kecil ke besar** (ascending).

---

### 2. array_merge() — Menggabungkan Array

```php
$list_item = ["buku", "pensil", "eraser"];
$list_perlengkapan = ["sepatu", "baju", "topi"];
$perlengkapan = array_merge($list_item, $list_perlengkapan);
print_r($perlengkapan);
```

**Output:**

```
Array ( [0] => buku [1] => pensil [2] => eraser [3] => sepatu [4] => baju [5] => topi )
```

| Komponen                 | Penjelasan                              |
| :----------------------- | :-------------------------------------- |
| `array_merge()`          | Fungsi gabungkan dua array              |
| `$list_item`             | Array pertama                           |
| `$list_perlengkapan`     | Array kedua                             |
| `$perlengkapan`          | Array hasil gabungan                    |

**Cara baca:** "Gabungkan `$list_item` dan `$list_perlengkapan` jadi satu array."

**Visual:**

```
$list_item:        ["buku", "pensil", "eraser"]
$list_perlengkapan: ["sepatu", "baju", "topi"]
                         │
                         ▼ array_merge()
                         │
$perlengkapan:     ["buku", "pensil", "eraser", "sepatu", "baju", "topi"]
```

---

### 3. in_array() — Mengecek Keberadaan Elemen

```php
$perlengkapan = ["buku", "pensil", "eraser", "sepatu", "baju", "topi"];

if (in_array("buku", $perlengkapan)) {
    echo "buku adalah perlengkapan anda";
} else {
    echo "Sisir bukan perlengkapan anda";
}

// Output: buku adalah perlengkapan anda
```

| Komponen                | Penjelasan                              |
| :---------------------- | :-------------------------------------- |
| `in_array()`            | Fungsi cek apakah elemen ada di array   |
| `"buku"`                | Elemen yang ingin dicari                |
| `$perlengkapan`         | Array yang dicek                        |

**Cara baca:** "Apakah `buku` ada di array `$perlengkapan`? Kalau ya, tampilkan pesan."

**Output:**

| Elemen Dicek | `in_array()` | Output                     |
| :----------- | :----------- | :------------------------- |
| `"buku"`     | `true`       | "buku adalah perlengkapan anda" |
| `"sisir"`    | `false`      | "Sisir bukan perlengkapan anda" |

> **Analogi:** `in_array()` seperti **mengecek daftar hadir** — apakah nama tertentu ada di daftar?

---

## BAGIAN 6: Looping Array

> Looping array = **iterasi tiap elemen** dari awal sampai habis.

---

### 1. foreach Loop

```php
$tour = [
    ["nama" => "Bali",     "harga" => "Rp. 1.000.000"],
    ["nama" => "Surabaya", "harga" => "Rp. 500.000"],
    ["nama" => "IKN",      "harga" => "Rp. 240.000"],
];

foreach ($tour as $wisata) {
    echo $wisata["nama"] . " - " . $wisata["harga"] . "<br>";
}
```

| Komponen        | Penjelasan                              |
| :-------------- | :-------------------------------------- |
| `foreach`       | Keyword untuk loop array                |
| `$tour`         | Array yang akan di-loop                 |
| `as`            | Keyword "sebagai"                       |
| `$wisata`       | Variable penampung tiap sub-array       |

**Step by step:**

```
Putaran 1: $wisata = ["nama" => "Bali", "harga" => "Rp. 1.000.000"]
Putaran 2: $wisata = ["nama" => "Surabaya", "harga" => "Rp. 500.000"]
Putaran 3: $wisata = ["nama" => "IKN", "harga" => "Rp. 240.000"]
Array habis → STOP
```

**Output:**

```
Bali - Rp. 1.000.000
Surabaya - Rp. 500.000
IKN - Rp. 240.000
```

---

### 2. foreach di Dalam HTML

```php
<ul>
    <?php foreach ($tour as $wisata): ?>
        <li>Tempat Wisata : <?= $wisata["nama"] ?></li>
        <li>Harga Wisata : <?= $wisata["harga"] ?></li>
    <?php endforeach; ?>
</ul>
```

| Komponen         | Penjelasan                              |
| :--------------- | :-------------------------------------- |
| `<?php foreach (...): ?>` | Buka foreach dengan alternative syntax |
| `<?= ... ?>`     | Shorthand echo                          |
| `<?php endforeach; ?>`   | Tutup foreach                      |

**Output HTML:**

```html
<ul>
    <li>Tempat Wisata : Bali</li>
    <li>Harga Wisata : Rp. 1.000.000</li>
    <li>Tempat Wisata : Surabaya</li>
    <li>Harga Wisata : Rp. 500.000</li>
    <li>Tempat Wisata : IKN</li>
    <li>Harga Wisata : Rp. 240.000</li>
</ul>
```

> **Analogi:** `foreach` seperti **membaca daftar belanja** — satu per satu dari awal sampai habis.

---

## Ringkasan

```
Array PHP
│
├── Membuat Array
│   ├── Short Syntax:  $arr = ["a", "b"]     ← REKOMENDASI
│   └── Long Syntax:   $arr = array("a", "b")
│
├── Jenis Array
│   ├── Indexed:       $arr[0] = "a"
│   ├── Asosiatif:     $arr["key"] = "value"
│   └── Multidimensi:  $arr[0]["key"] = "value"
│
├── Built-in Functions
│   ├── sort()         → urutkan array
│   ├── array_merge()  → gabungkan array
│   └── in_array()     → cek keberadaan elemen
│
└── Looping Array
    └── foreach ($arr as $val) { ... }
```

**Ringkasan Cepat:**

| Kebutuhan                        | Gunakan                  |
| :------------------------------- | :----------------------- |
| Simpan banyak data               | Array `[...]`            |
| Akses by posisi                  | `$arr[0]`                |
| Akses by nama                    | `$arr["key"]`            |
| Array di dalam array             | Multidimensi             |
| Urutkan array                    | `sort($arr)`             |
| Gabung array                     | `array_merge($a, $b)`    |
| Cek elemen ada                   | `in_array("x", $arr)`    |
| Iterasi semua elemen             | `foreach ($arr as $val)` |
