# Catatan: Manipulasi String

---

## Alur Kerja

```
String asli: "dunia PHP adalah bahasa terbaik di dunia"
       │
       ▼
Pilih operasi manipulasi string
       │
       ├── Penggabungan
       │   ├── Concatenation (.) → "Anton Junior"
       │   └── Interpolation ("$var") → "Anton Junior"
       │
       ├── Pencarian Posisi
       │   ├── strpos() → posisi pertama substring
       │   └── strrpos() → posisi terakhir substring
       │
       ├── Penggantian
       │   └── str_replace() → ganti substring
       │
       ├── Informasi
       │   └── strlen() → panjang string
       │
       ├── Ubah Huruf
       │   ├── strtoupper() → huruf besar semua
       │   └── strtolower() → huruf kecil semua
       │
       └── Potong String
           └── substr() → ambil sebagian string
                  │
                  ▼
           Tampilkan hasil baru
```

---

## BAGIAN 1: Penggabungan String

> Ada **dua cara** menggabungkan string di PHP: **Concatenation** dan **Interpolation**.

---

### 1. Concatenation — Operator `.`

```php
$namadepan = "Anton";
$namabelakang = "Junior";
$fullname = $namadepan . " " . $namabelakang;
echo $fullname;    // Output: Anton Junior
```

| Komponen          | Penjelasan                              |
| :---------------- | :-------------------------------------- |
| `.`               | Operator concatenation (penggabung)     |
| `" "`             | Spasi di antara nama                    |
| `$namadepan . " "` | Gabung nama depan + spasi            |

**Cara baca:** "Gabung `$namadepan`, spasi, dan `$namabelakang`, simpan di `$fullname`."

**Step by step:**

```
$namadepan . " " . $namabelakang
     │         │         │
 "Anton"    + " "    + "Junior"
     │                  │
     └────────┬─────────┘
              ▼
      "Anton Junior"
```

**Concatenation dengan banyak string:**

```php
$a = "Halo";
$b = " ";
$c = "Dunia";
$d = "!";
echo $a . $b . $c . $d;    // Output: Halo Dunia!
```

> **Analogi:** Concatenation seperti **menjahit** kain per kain — satu per satu digabung jadi satu.

---

### 2. Interpolation — Variabel di Dalam Kutip Ganda

```php
$namadepan = "Anton";
$namabelakang = "Junior";
$fullname = "$namadepan $namabelakang";
echo $fullname;    // Output: Anton Junior
```

| Komponen                  | Penjelasan                              |
| :------------------------ | :-------------------------------------- |
| `"$namadepan $namabelakang"` | Variabel di dalam kutip ganda       |
| `$namadepan`              | Otomatis diganti jadi isinya           |

**Cara baca:** "Buat string yang berisi `$namadepan` diikuti spasi diikuti `$namabelakang`."

**Interpolation vs Concatenation:**

```php
// Interpolation — pakai kutip ganda
"$namadepan $namabelakang"       // Output: Anton Junior

// Concatenation — pakai operator .
$namadepan . " " . $namabelakang // Output: Anton Junior
```

Keduanya **hasilnya sama**. Pilih mana yang lebih nyaman.

**Perbedaan kutip ganda vs kutip tunggal:**

```php
$nama = "Anton";

echo "$nama";     // Output: Anton (variabel diinterpolasi)
echo '$nama';     // Output: $nama (variabel TIDAK diinterpolasi)
```

> **Analogi:** Interpolation seperti **template surat** — `$namadepan` seperti placeholder yang otomatis terisi nama.

---

## BAGIAN 2: Fungsi String

> PHP punya banyak **fungsi bawaan** untuk memanipulasi string.

---

### 1. strpos() — Posisi Pertama Substring

```php
$kalimat = "dunia PHP adalah bahasa terbaik di dunia";
$posisi = strpos($kalimat, "PHP");
echo $posisi;    // Output: 6
```

| Komponen              | Penjelasan                              |
| :-------------------- | :-------------------------------------- |
| `strpos()`            | Fungsi cari posisi pertama              |
| `$kalimat`            | String yang ingin dicari                |
| `"PHP"`               | Substring yang ingin ditemukan          |

**Cara baca:** "Cari posisi awal kata `PHP` dalam `$kalimat`."

**Index dimulai dari 0:**

```
d u n i a   P H P   a d a l a h ...
0 1 2 3 4 5 6 7 8 9 ...
            ↑
        posisi 6 (PHP mulai di sini)
```

> **Catatan:** `strpos()` mengembalikan **index** (mulai dari 0), bukan urutan keberapa.

> **Analogi:** `strpos()` seperti **mencari halaman** di buku — di halaman berapa kata "PHP" pertama kali muncul?

---

### 2. strrpos() — Posisi Terakhir Substring

```php
$kalimat = "dunia PHP adalah bahasa terbaik di dunia";
$posisiakhir = strrpos($kalimat, "dunia");
echo $posisiakhir;    // Output: 35
```

| Komponen              | Penjelasan                              |
| :-------------------- | :-------------------------------------- |
| `strrpos()`           | Fungsi cari posisi terakhir             |
| `$kalimat`            | String yang ingin dicari                |
| `"dunia"`             | Substring yang ingin ditemukan          |

**Cara baca:** "Cari posisi awal kata `dunia` yang **terakhir** muncul dalam `$kalimat`."

**Kenapa 35?**

```
"dunia PHP adalah bahasa terbaik di dunia"
                              ↑
                     "dunia" terakhir mulai di index 35
```

**Perbedaan `strpos()` vs `strrpos()`:**

```
strpos("dunia PHP...dunia", "dunia")  → 0   (pertama)
strrpos("dunia PHP...dunia", "dunia") → 35  (terakhir)
```

> **Analogi:** `strpos()` seperti **mencari awal** pertama. `strrpos()` seperti **mencari awal** terakhir.

---

### 3. str_replace() — Mengganti Teks

```php
$kalimat = "dunia PHP adalah bahasa terbaik di dunia";
$newtest = str_replace("PHP", "Python", $kalimat);
echo $newtest;
// Output: dunia Python adalah bahasa terbaik di dunia
```

| Komponen                      | Penjelasan                              |
| :---------------------------- | :-------------------------------------- |
| `str_replace()`               | Fungsi ganti substring                  |
| `"PHP"`                       | Teks yang ingin diganti                 |
| `"Python"`                    | Teks pengganti                          |
| `$kalimat`                    | String asli                             |

**Cara baca:** "Ganti semua kemunculan `PHP` dengan `Python` dalam `$kalimat`."

**Step by step:**

```
"dunia PHP adalah bahasa terbaik di dunia"
         │
         ▼ ganti "PHP" → "Python"
         │
"dunia Python adalah bahasa terbaik di dunia"
```

**Ganti banyak sekaligus:**

```php
$kalimat = "apel dan jeruk dan mangga";
$newtest = str_replace(["apel", "jeruk"], ["pisang", "anggur"], $kalimat);
echo $newtest;
// Output: pisang dan anggur dan mangga
```

> **Analogi:** `str_replace()` seperti **find & replace** di Microsoft Word.

---

### 4. strlen() — Panjang String

```php
$kalimat = "dunia PHP adalah bahasa terbaik di dunia";
$panjangstr = strlen($kalimat);
echo $panjangstr;    // Output: 40
```

| Komponen   | Penjelasan                              |
| :--------- | :-------------------------------------- |
| `strlen()` | Fungsi hitung panjang string            |
| `$kalimat` | String yang ingin dihitung              |

**Cara baca:** "Hitung jumlah karakter dalam `$kalimat`."

**Contoh:**

```
strlen("halo")     → 4
strlen("dunia")    → 5
strlen("")         → 0 (string kosong)
```

> **Catatan:** Spasi juga dihitung sebagai karakter!

> **Analogi:** `strlen()` seperti **menghitung huruf** di secarik kertas.

---

### 5. strtoupper() — Huruf Kapital

```php
$kalimat = "dunia PHP adalah bahasa terbaik di dunia";
$besartxt = strtoupper($kalimat);
echo $besartxt;
// Output: DUNIA PHP ADALAH BAHASA TERBAIK DI DUNIA
```

| Komponen       | Penjelasan                              |
| :------------- | :-------------------------------------- |
| `strtoupper()` | Fungsi ubah semua huruf jadi besar      |
| `$kalimat`     | String yang ingin diubah                |

**Cara baca:** "Ubah semua huruf dalam `$kalimat` jadi huruf kapital (besar)."

**Contoh:**

```
strtolower("halo")     → HALO
strtolower("Hello")    → HELLO
strtolower("hELLO")    → HELLO
```

> **Analogi:** `strtoupper()` seperti **menekan Caps Lock** — semua huruf jadi besar.

---

### 6. strtolower() — Huruf Kecil

```php
$kalimat = "dunia PHP adalah bahasa terbaik di dunia";
$keciltxt = strtolower($kalimat);
echo $keciltxt;
// Output: dunia php adalah bahasa terbaik di dunia
```

| Komponen       | Penjelasan                              |
| :------------- | :-------------------------------------- |
| `strtolower()` | Fungsi ubah semua huruf jadi kecil      |
| `$kalimat`     | String yang ingin diubah                |

**Cara baca:** "Ubah semua huruf dalam `$kalimat` jadi huruf kecil."

**Contoh:**

```
strtolower("HALO")     → halo
strtolower("Hello")    → hello
strtolower("hELLO")    → hello
```

> **Analogi:** `strtolower()` seperti **mematikan Caps Lock** — semua huruf jadi kecil.

---

### 7. substr() — Ambil Substring

```php
$kalimat = "dunia PHP adalah bahasa terbaik di dunia";
$subtxt = substr($kalimat, 0, 10);
echo $subtxt;
// Output: dunia PHP
```

| Komponen     | Penjelasan                              |
| :----------- | :-------------------------------------- |
| `substr()`   | Fungsi ambil sebagian string            |
| `$kalimat`   | String asli                             |
| `0`          | Posisi mulai (index)                    |
| `10`         | Panjang yang ingin diambil              |

**Cara baca:** "Ambil karakter dari `$kalimat`, mulai dari posisi `0`, ambil `10` karakter."

**Step by step:**

```
"dunia PHP adalah bahasa terbaik di dunia"
0123456789...
│         │
0         10 (10 karakter)
│         │
└────┬────┘
     ▼
"dunia PHP"
```

**Contoh lain:**

```php
$teks = "Hello World";
echo substr($teks, 0, 5);     // Output: Hello (mulai 0, ambil 5)
echo substr($teks, 6);        // Output: World (mulai 6, sampai akhir)
echo substr($teks, -5);       // Output: World (5 karakter dari belakang)
```

> **Analogi:** `substr()` seperti **memotong kue** — ambil sepotong dari kue yang utuh.

---

## Ringkasan

```
Manipulasi String PHP
│
├── Penggabungan
│   ├── Concatenation (.)  → $a . $b
│   └── Interpolation      → "$a $b"
│
├── Pencarian Posisi
│   ├── strpos()   → posisi pertama
│   └── strrpos()  → posisi terakhir
│
├── Penggantian
│   └── str_replace() → ganti substring
│
├── Informasi
│   └── strlen() → panjang string
│
├── Ubah Huruf
│   ├── strtoupper() → huruf besar semua
│   └── strtolower() → huruf kecil semua
│
└── Potong String
    └── substr() → ambil sebagian string
```
