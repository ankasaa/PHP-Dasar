# Catatan: Operator

---

## Alur Kerja

```
Program dimulai
       │
       ▼
Buat variable ($a = 10, $b = 5)
       │
       ▼
Pilih jenis operator
       │
       ├── Aritmatika → Hitung hasil matematika
       ├── Perbandingan → Bandingkan dua nilai → true/false
       └── Logika → Gabungkan beberapa kondisi → true/false
              │
              ▼
Tampilkan hasil ke layar
```

---

## BAGIAN 1: Operator Aritmatika

> Operator aritmatika digunakan untuk **operasi matematika** pada variable.

---

### 1. Enam Operator Aritmatika

```php
$a = 10;
$b = 5;

$tambah = $a + $b;
$kurang = $a - $b;
$perkalian = $a * $b;
$pembagian = $a / $b;
$modulus = $a % $b;
$eksponensial = $a ** $b;
```

| Operator | Nama           | Contoh       | Hasil | Penjelasan                    |
| :------- | :------------- | :----------- | :---- | :---------------------------- |
| `+`      | Tambah         | `$a + $b`    | `15`  | 10 + 5 = 15                   |
| `-`      | Kurang         | `$a - $b`    | `5`   | 10 - 5 = 5                    |
| `*`      | Perkalian      | `$a * $b`    | `50`  | 10 x 5 = 50                   |
| `/`      | Pembagian      | `$a / $b`    | `2`   | 10 / 5 = 2                    |
| `%`      | Modulus (sisa bagi) | `$a % $b` | `0`  | 10 / 5 = 2 sisa **0**         |
| `**`     | Eksponensial (pangkat) | `$a ** $b` | `100000` | 10^5 = 100.000         |

---

### 2. Penjelasan Masing-masing

#### `+` Tambah

```php
$a = 10;
$b = 5;
$tambah = $a + $b;
echo $tambah;    // Output: 15
```

**Cara baca:** "Jumlahkan `$a` dengan `$b`, simpan di `$tambah`."

> **Analogi:** Seperti **menambah** uang di dompet — 10 ribu + 5 ribu = 15 ribu.

---

#### `-` Kurang

```php
$a = 10;
$b = 5;
$kurang = $a - $b;
echo $kurang;    // Output: 5
```

**Cara baca:** "Kurangi `$a` dengan `$b`, simpan di `$kurang`."

> **Analogi:** Seperti **mengurangi** jumlah barang — beli 10, makan 5, sisa 5.

---

#### `*` Perkalian

```php
$a = 10;
$b = 5;
$perkalian = $a * $b;
echo $perkalian;    // Output: 50
```

**Cara baca:** "Kalikan `$a` dengan `$b`, simpan di `$perkalian`."

> **Analogi:** Seperti **membeli** beberapa item — 10 barang x 5 ribu = 50 ribu.

---

#### `/` Pembagian

```php
$a = 10;
$b = 5;
$pembagian = $a / $b;
echo $pembagian;    // Output: 2
```

**Cara baca:** "Bagi `$a` dengan `$b`, simpan di `$pembagian`."

> **Analogi:** Seperti **membagi** kue — 10 kue dibagi 5 orang = 2 kue per orang.

---

#### `%` Modulus (Sisa Bagi)

```php
$a = 10;
$b = 5;
$modulus = $a % $b;
echo $modulus;    // Output: 0
```

**Cara baca:** "Sisa bagi `$a` dengan `$b`, simpan di `$modulus`."

**Contoh lain:**

```
10 % 3 = 1    → 10 / 3 = 3 sisa 1
10 % 5 = 0    → 10 / 5 = 2 sisa 0
7 % 2 = 1     → 7 / 2 = 3 sisa 1
```

> **Analogi:** Seperti **sisa** kue setelah dibagi rata — 10 kue dibagi 3 orang, sisa 1 kue.

---

#### `**` Eksponensial (Pangkat)

```php
$a = 10;
$b = 5;
$eksponensial = $a ** $b;
echo $eksponensial;    // Output: 100000
```

**Cara baca:** "`$a` pangkat `$b`, simpan di `$eksponensial`."

**Hitungan:**

```
10 ** 5 = 10 x 10 x 10 x 10 x 10 = 100.000
```

> **Analogi:** Seperti **mengalikan berulang** — 10 dikalikan 5 kali.

---

## BAGIAN 2: Operator Perbandingan

> Operator perbandingan digunakan untuk **membandingkan** dua nilai. Hasilnya selalu **boolean** (`true` atau `false`).

---

### 1. Delapan Operator Perbandingan

```php
$a = 5;
$b = 10;
```

| Operator | Nama               | Contoh        | Hasil  | Penjelasan                     |
| :------- | :----------------- | :------------ | :----- | :----------------------------- |
| `==`     | Sama dengan        | `$a == $b`    | `false`| 5 sama dengan 10? Tidak        |
| `!=`     | Tidak sama dengan  | `$a != $b`    | `true` | 5 tidak sama dengan 10? Ya     |
| `===`    | Identik            | `$a === $b`   | `false`| 5 identik dengan 10? Tidak     |
| `!==`    | Tidak identik      | `$a !== $b`   | `true` | 5 tidak identik dengan 10? Ya  |
| `>`      | Lebih besar        | `$a > $b`     | `false`| 5 lebih besar dari 10? Tidak   |
| `<`      | Lebih kecil        | `$a < $b`     | `true` | 5 lebih kecil dari 10? Ya      |
| `>=`     | Lebih besar/sama   | `$a >= $b`    | `false`| 5 lebih besar atau sama 10? Tidak |
| `<=`     | Lebih kecil/sama   | `$a <= $b`    | `true` | 5 lebih kecil atau sama 10? Ya |

---

### 2. Penjelasan Masing-masing

#### `==` Sama Dengan

```php
$a = 5;
$b = 10;
echo var_dump($a == $b);    // Output: bool(false)
```

**Cara baca:** "Apakah `$a` sama dengan `$b`? Jawab: `false` (tidak)."

> **Analogi:** Seperti **menimbang** — apakah berat 5 kg sama dengan 10 kg? Tidak.

---

#### `!=` Tidak Sama Dengan

```php
$a = 5;
$b = 10;
echo var_dump($a != $b);    // Output: bool(true)
```

**Cara baca:** "Apakah `$a` tidak sama dengan `$b`? Jawab: `true` (ya)."

> **Analogi:** Seperti **pertanyaan terbalik** — apakah 5 kg tidak sama dengan 10 kg? Ya, benar.

---

#### `===` Identik

```php
$a = 5;
$b = 10;
echo var_dump($a === $b);    // Output: bool(false)
```

**Cara baca:** "Apakah `$a` identik dengan `$b`? Jawab: `false` (tidak)."

**Perbedaan `==` vs `===`:**

```php
// == hanya cek NILAI
5 == "5"      → true     (nilai sama)

// === cek NILAI + TIPE DATA
5 === "5"     → false    (nilai sama, tapi tipe beda: integer vs string)
5 === 5       → true     (nilai sama, tipe sama: integer vs integer)
```

> **Analogi:** `==` seperti **menanyakan isi** — "Apakah isinya sama?" `===` seperti **menanyakan isi DAN wadah** — "Apakah isinya sama DAN wadahnya sama?"

---

#### `!==` Tidak Identik

```php
$a = 5;
$b = 10;
echo var_dump($a !== $b);    // Output: bool(true)
```

**Cara baca:** "Apakah `$a` tidak identik dengan `$b`? Jawab: `true` (ya)."

---

#### `>` Lebih Besar

```php
$a = 5;
$b = 10;
echo var_dump($a > $b);    // Output: bool(false)
```

**Cara baca:** "Apakah `$a` lebih besar dari `$b`? Jawab: `false` (tidak)."

> **Analogi:** Seperti **membandingkan umur** — apakah 5 tahun lebih tua dari 10 tahun? Tidak.

---

#### `<` Lebih Kecil

```php
$a = 5;
$b = 10;
echo var_dump($a < $b);    // Output: bool(true)
```

**Cara baca:** "Apakah `$a` lebih kecil dari `$b`? Jawab: `true` (ya)."

> **Analogi:** Seperti **membandingkan harga** — apakah Rp 5.000 lebih murah dari Rp 10.000? Ya.

---

#### `>=` Lebih Besar atau Sama

```php
$a = 5;
$b = 10;
echo var_dump($a >= $b);    // Output: bool(false)
```

**Cara baca:** "Apakah `$a` lebih besar atau sama dengan `$b`? Jawab: `false` (tidak)."

---

#### `<=` Lebih Kecil atau Sama

```php
$a = 5;
$b = 10;
echo var_dump($a <= $b);    // Output: bool(true)
```

**Cara baca:** "Apakah `$a` lebih kecil atau sama dengan `$b`? Jawab: `true` (ya)."

---

## BAGIAN 3: Operator Logika

> Operator logika digunakan untuk **menghubungkan** beberapa kondisi boolean. Hasilnya selalu **boolean** (`true` atau `false`).

---

### 1. Empat Operator Logika

```php
$a = true;
$b = false;
```

| Operator | Nama | Kondisi       | Hasil  | Penjelasan                     |
| :------- | :--- | :------------ | :----- | :----------------------------- |
| `&&`     | AND  | `$a && $b`   | `false`| Keduanya harus `true`          |
| `\|\|`   | OR   | `$a \|\| $b` | `true` | Salah satu harus `true`        |
| `!`      | NOT  | `!$b`         | `true` | Balik nilai boolean            |
| `xor`    | XOR  | `$a xor $b`  | `true` | Salah satu `true`, tapi tidak keduanya |

---

### 2. Penjelasan Masing-masing

#### `&&` AND (Dan)

```php
$a = true;
$b = false;
echo var_dump($a && $b);    // Output: bool(false)
```

**Cara baca:** "Apakah `$a` DAN `$b` keduanya `true`? Jawab: `false` (tidak, karena `$b` false)."

**Tabel Kebenaran:**

| `$a`   | `$b`   | `$a && $b` | Penjelasan                     |
| :----- | :----- | :--------- | :----------------------------- |
| `true` | `true` | `true`     | Keduanya true → hasil true     |
| `true` | `false`| `false`    | Salah satu false → hasil false |
| `false`| `true` | `false`    | Salah satu false → hasil false |
| `false`| `false`| `false`    | Keduanya false → hasil false   |

> **Analogi:** AND seperti **pintu berdua** — harus berdua buka pintu baru terbuka.

---

#### `||` OR (Atau)

```php
$a = true;
$b = false;
echo var_dump($a || $b);    // Output: bool(true)
```

**Cara baca:** "Apakah `$a` ATAU `$b` salah satunya `true`? Jawab: `true` (ya, karena `$a` true)."

**Tabel Kebenaran:**

| `$a`   | `$b`   | `$a \|\| $b` | Penjelasan                     |
| :----- | :----- | :----------- | :----------------------------- |
| `true` | `true` | `true`       | Salah satu true → hasil true   |
| `true` | `false`| `true`       | Salah satu true → hasil true   |
| `false`| `true` | `true`       | Salah satu true → hasil true   |
| `false`| `false`| `false`      | Keduanya false → hasil false   |

> **Analogi:** OR seperti **pintu alternatif** — salah satu pintu terbuka, kamu bisa masuk.

---

#### `!` NOT (Tidak)

```php
$a = true;
$b = false;
echo var_dump(!$b);    // Output: bool(true)
```

**Cara baca:** "Apakah `$b` TIDAK `true`? Jawab: `true` (ya, karena `$b` false, maka NOT false = true)."

**Tabel Kebenaran:**

| `$a`   | `!$a`  | Penjelasan                     |
| :----- | :----- | :----------------------------- |
| `true` | `false`| Balik true → false             |
| `false`| `true` | Balik false → true             |

> **Analogi:** NOT seperti **balik arah** — jika sekarang benar, jadi salah. Jika sekarang salah, jadi benar.

---

#### `xor` XOR (Exclusive Or)

```php
$a = true;
$b = false;
echo var_dump($a xor $b);    // Output: bool(true)
```

**Cara baca:** "Apakah salah satu `true` tapi TIDAK keduanya? Jawab: `true` (ya, karena hanya `$a` yang true)."

**Tabel Kebenaran:**

| `$a`   | `$b`   | `$a xor $b` | Penjelasan                     |
| :----- | :----- | :---------- | :----------------------------- |
| `true` | `true` | `false`     | Keduanya true → hasil false    |
| `true` | `false`| `true`      | Hanya satu true → hasil true   |
| `false`| `true` | `true`      | Hanya satu true → hasil true   |
| `false`| `false`| `false`     | Keduanya false → hasil false   |

**Perbedaan `||` vs `xor`:**

```
true || true  → true     (salah satu true → true)
true xor true → false    (keduanya true → false)
```

> **Analogi:** XOR seperti **lampu lalu lintas** — hanya boleh satu lampu menyala, bukan dua-duanya.

---

### 3. Perbandingan Semua Operator Logika

```php
$a = true;
$b = false;
```

| Operator | Kode             | Hasil  | Arti                                     |
| :------- | :--------------- | :----- | :--------------------------------------- |
| `&&`     | `$a && $b`      | `false`| Keduanya harus true                      |
| `\|\|`   | `$a \|\| $b`    | `true` | Salah satu saja cukup                    |
| `!`      | `!$b`            | `true` | Balik nilai (false jadi true)            |
| `xor`    | `$a xor $b`     | `true` | Hanya satu yang true, tidak keduanya     |

---

## Ringkasan

```
Operator PHP
│
├── Aritmatika (untuk hitungan)
│   ├── +   Tambah
│   ├── -   Kurang
│   ├── *   Perkalian
│   ├── /   Pembagian
│   ├── %   Modulus (sisa bagi)
│   └── **  Eksponensial (pangkat)
│
├── Perbandingan (hasilnya boolean)
│   ├── ==  Sama dengan
│   ├── !=  Tidak sama dengan
│   ├── === Identik (nilai + tipe)
│   ├── !== Tidak identik
│   ├── >   Lebih besar
│   ├── <   Lebih kecil
│   ├── >=  Lebih besar atau sama
│   └── <=  Lebih kecil atau sama
│
└── Logika (menghubungkan kondisi)
    ├── &&  AND (keduanya true)
    ├── ||  OR  (salah satu true)
    ├── !   NOT (balik nilai)
    └── xor XOR (hanya satu true)
```
