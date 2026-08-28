# Catatan: Tipe Data

---

## Alur Kerja

```
Program dimulai
       │
       ▼
Buat variable dengan isi tertentu
       │
       ▼
gettype($variable) → Cek tipe data apa?
       │
       ├── "string"  → Isinya teks
       ├── "integer" → Isinya angka bulat
       ├── "double"  → Isinya angka desimal
       ├── "boolean" → Isinya true/false
       ├── "array"   → Isinya kumpulan nilai
       └── "NULL"    → Isinya kosong
              │
              ▼
       Tampilkan ke layar
```

---

## BAGIAN 1: PHP

> Setiap variable punya **tipe data**. Tipe data = jenis isi yang disimpan dalam variable.

---

### 1. Apa itu Tipe Data?

```php
$nama = "andika";   // tipe: string (teks)
$num = 123;         // tipe: integer (angka bulat)
$des = 3.14;        // tipe: float (angka desimal)
$bool = true;       // tipe: boolean (benar/salah)
```

**Cara baca:** "Variable `$nama` bertipe `string` karena isinya teks `andika`."

> **Analogi:** Tipe data seperti **jenis wadah**. Teks masuk ke wadah teks, angka masuk ke wadah angka. Tidak bisa campur aduk.

---

### 2. Enam Tipe Data PHP

#### String — Teks

```php
$nama = "andika";
$items = "buku";
```

| Komponen      | Penjelasan                          |
| :------------ | :---------------------------------- |
| `"andika"`    | Teks yang diapit **kutip ganda**    |
| `'buku'`      | Teks yang diapit **kutip tunggal**  |

**Cara baca:** "Variable `$nama` berisi teks `andika`."

**Kutip ganda vs kutip tunggal:**

```php
$nama = "andika";
echo "Halo $nama";    // Output: Halo andika (variabel diinterpolasi)
echo 'Halo $nama';    // Output: Halo $nama (variabel TIDAK diinterpolasi)
```

> **Analogi:** String seperti **kalimat** — urutan huruf/kata yang membentuk makna.

---

#### Integer — Angka Bulat

```php
$num = 123;
$负数 = -456;
```

| Komponen | Penjelasan                      |
| :------- | :------------------------------ |
| `123`    | Angka bulat positif             |
| `-456`   | Angka bulat negatif             |

**Cara baca:** "Variable `$num` berisi angka bulat `123`."

**Yang termasuk integer:**

```
123       ← positif
-456      ← negatif
0         ← nol
```

**Yang BUKAN integer:**

```
3.14      ← desimal (float)
"123"     ← teks (string)
```

> **Analogi:** Integer seperti **jumlah** — berapa banyak, tidak ada pecahan.

---

#### Float — Angka Desimal

```php
$des = 3.14;
$pi = 22/7;
```

| Komponen | Penjelasan                      |
| :------- | :------------------------------ |
| `3.14`   | Angka desimal positif           |
| `22/7`   | Hasil pembagian = desimal       |

**Cara baca:** "Variable `$des` berisi angka desimal `3.14`."

**Contoh float lain:**

```
3.14      ← desimal
-0.5      ← desimal negatif
100.0     ← meskipun .0, tetap float jika ada titik
```

> **Analogi:** Float seperti **ukuran** — bisa pecahan, seperti 1.5 liter atau 3.14 meter.

---

#### Boolean — Benar atau Salah

```php
$bool = true;
$active = false;
```

| Komponen | Penjelasan                      |
| :------- | :------------------------------ |
| `true`   | Benar / Iya / 1                 |
| `false`  | Salah / Tidak / 0               |

**Cara baca:** "Variable `$bool` bernilai `true` (benar)."

**Kapan pakai boolean?**

```php
$login = true;      // user sudah login
$active = false;    // akun tidak aktif
$empty = false;     // tidak ada isi
```

> **Analogi:** Boolean seperti **lampu saklar** — hanya ada dua posisi: **ON** (true) atau **OFF** (false).

---

#### Array — Kumpulan Nilai

```php
$arr = ['a', 'b', 3, false];
```

| Komponen     | Penjelasan                          |
| :----------- | :---------------------------------- |
| `[...]`      | Tanda kurung siku = array           |
| `'a'`        | Index ke-0 (string)                 |
| `'b'`        | Index ke-1 (string)                 |
| `3`          | Index ke-2 (integer)                |
| `false`      | Index ke-3 (boolean)                |

**Cara baca:** "Variable `$arr` berisi array dengan 4 elemen: `'a'`, `'b'`, `3`, `false`."

**Isi array bisa campur tipe:**

```
['a', 'b', 3, false]
 │    │    │    │
 │    │    │    └── boolean
 │    │    └─────── integer
 │    └──────────── string
 └───────────────── string
```

> **Analogi:** Array seperti **rak buku** — bisa isi banyak buku sekaligus, tidak hanya satu.

---

#### Null — Kosong

```php
$var = null;
```

| Komponen | Penjelasan                          |
| :------- | :---------------------------------- |
| `null`   | Tidak ada isi / kosong              |

**Cara baca:** "Variable `$var` bernilai `null` (kosong/tidak ada isi)."

**Kapan pakai null?**

```php
$nama = null;       // awalnya belum diisi
$hasil = null;      // belum ada hasil
```

**Null vs string kosong:**

```php
$null = null;       // tipe: NULL (benar-benar kosong)
$kosong = "";       // tipe: string (ada isi, tapi kosong teksnya)
```

> **Analogi:** Null seperti **kotak yang benar-benar kosong** — bahkan udara pun tidak ada.

---

### 3. Fungsi Pendukung Tipe Data

#### gettype() — Cek Tipe Data

```php
$nama = "andika";
echo gettype($nama);    // Output: string

$num = 123;
echo gettype($num);     // Output: integer
```

| Komponen      | Penjelasan                          |
| :------------ | :---------------------------------- |
| `gettype()`   | Fungsi untuk mengetahui tipe data   |
| `$nama`       | Variable yang ingin dicek           |

**Cara baca:** "Tampilkan tipe data dari variable `$nama`."

**Output semua tipe:**

| Variable   | Isi        | `gettype()` | Tipe       |
| :--------- | :--------- | :---------- | :--------- |
| `$nama`    | `"andika"` | `"string"`  | Teks       |
| `$num`     | `123`      | `"integer"` | Bulat      |
| `$des`     | `3.14`     | `"double"`  | Desimal    |
| `$bool`    | `true`     | `"boolean"` | Benar/Salah|
| `$arr`     | `[...]`    | `"array"`   | Kumpulan   |
| `$var`     | `null`     | `"NULL"`    | Kosong     |

> **Catatan:** Float ditampilkan sebagai `"double"` oleh `gettype()`, bukan `"float"`. Keduanya sama.

---

#### var_dump() — Tampilkan Tipe + Nilai

```php
$var = null;
var_dump($var);     // Output: NULL
```

| Komponen       | Penjelasan                              |
| :------------- | :-------------------------------------- |
| `var_dump()`   | Tampilkan tipe data DAN nilai variable   |
| `$var`         | Variable yang ingin ditampilkan          |

**Cara baca:** "Tampilkan detail variable `$var` — tipenya apa dan isinya apa."

**Perbedaan `gettype()` vs `var_dump()`:**

```php
$nama = "andika";

echo gettype($nama);    // Output: string (hanya tipe)
var_dump($nama);        // Output: string(6) "andika" (tipe + isi + panjang)
```

> **Analogi:** `gettype()` seperti **label** pada wadah. `var_dump()` seperti **buka wadah** dan lihat isinya.

---

#### is_null() — Cek Apakah Null

```php
$var = null;
echo is_null($var);    // Output: 1 (true)
```

| Komponen     | Penjelasan                              |
| :----------- | :-------------------------------------- |
| `is_null()`  | Fungsi untuk mengecek apakah null       |
| `$var`       | Variable yang ingin dicek               |

**Cara baca:** "Apakah variable `$var` bernilai null? Kalau ya, tampilkan `1` (true)."

**Output:**

| Variable | `is_null()` | Arti               |
| :------- | :---------- | :----------------- |
| `$var = null` | `1` (true)  | Benar, isinya null |
| `$nama = "andika"` | `0` (false) | Salah, bukan null |

> **Catatan:** Di PHP, `true` ditampilkan sebagai `1` dan `false` sebagai `0` saat di-echo.

---

### 4. Ringkasan

```
Tipe Data PHP
│
├── String    → "teks"        → Teks/kalimat
├── Integer   → 123           → Angka bulat
├── Float     → 3.14          → Angka desimal
├── Boolean   → true/false    → Benar atau salah
├── Array     → [a, b, 3]     → Kumpulan nilai
└── NULL      → null          → Kosong/tidak ada
```

**Fungsi Pendukung:**

```
gettype($var)   → "string"        → Cek tipe data
var_dump($var)  → string(6) "..."  → Tampilkan tipe + nilai
is_null($var)   → true/false       → Cek apakah null
```
