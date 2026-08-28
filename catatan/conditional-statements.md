# Catatan: Conditional Statements (Percabangan)

---

## Alur Kerja

```
Program dimulai
       │
       ▼
Cek kondisi
       │
       ├── if       → true? Jalankan kode if
       │              false? Lewati
       │
       ├── if...else
       │   ├── true?  → Jalankan kode if
       │   └── false? → Jalankan kode else
       │
       ├── if...elseif...else
       │   ├── kondisi 1 true? → Jalankan kode if
       │   ├── kondisi 2 true? → Jalankan kode elseif
       │   └── semua false?    → Jalankan kode else
       │
       └── switch
           ├── case cocok? → Jalankan kode case
           └── tidak cocok? → Jalankan default
                  │
                  ▼
           Lanjut ke kode setelah percabangan
```

---

## BAGIAN 1: if...else

> Percabangan **dasar** — jalankan kode berbeda berdasarkan kondisi **true** atau **false**.

---

### 1. Apa itu Percabangan?

```php
// Tanpa percabangan — selalu tampilkan "Grade A"
echo "Grade A";

// Dengan percabangan — pilih grade berdasarkan nilai
$nilai = 90;
if ($nilai >= 95) {
    echo "Grade A";
} else {
    echo "Grade B";
}
```

| Komponen  | Penjelasan                              |
| :-------- | :-------------------------------------- |
| `if`      | Keyword "kalau"                         |
| `(...)`   | Kondisi yang dicek                      |
| `{ ... }` | Kode yang dijalankan jika kondisi true  |

**Cara baca:** "Kalau `$nilai` lebih besar dari atau sama dengan 95, tampilkan `Grade A`."

> **Analogi:** Percabangan seperti **persimpangan jalan** — kamu pilih jalan mana sesuai kondisi.

---

### 2. if Saja

```php
$nilai = 90;

if ($nilai >= 95) {
    echo "Grade A";
}
```

| Komponen       | Penjelasan                              |
| :------------- | :-------------------------------------- |
| `$nilai >= 95` | Kondisi: apakah 90 >= 95?              |
| `true`         | Jalankan kode di dalam `{...}`         |
| `false`        | Lewati, tidak jalankan apa-apa          |

**Output:**

```
$nilai = 90 → 90 >= 95? false → Tidak ada output
```

**Jika `$nilai = 96`:**

```
$nilai = 96 → 96 >= 95? true → Output: Grade A
```

---

### 3. if...else

```php
$nilai = 90;

if ($nilai >= 95) {
    echo "Grade A";
} else {
    echo "Grade C";
}
```

| Komponen | Penjelasan                              |
| :------- | :-------------------------------------- |
| `if`     | Kondisi true → jalankan ini             |
| `else`   | Kondisi false → jalankan ini            |

**Cara baca:** "Kalau `$nilai >= 95`, tampilkan `Grade A`. Kalau tidak, tampilkan `Grade C`."

**Output:**

```
$nilai = 90 → 90 >= 95? false → else → Output: Grade C
```

**Diagram:**

```
$nilai >= 95?
      │
      ├── true  → echo "Grade A"
      │
      └── false → echo "Grade C"
```

---

### 4. if...elseif...else (Banyak Kondisi)

```php
$nilai = 90;

if ($nilai >= 95) {
    echo "Grade A";
} elseif ($nilai >= 80) {
    echo "Grade B";
} else {
    echo "Grade C";
}
```

| Komponen   | Penjelasan                              |
| :--------- | :-------------------------------------- |
| `if`       | Cek kondisi pertama                     |
| `elseif`   | Cek kondisi kedua (jika pertama false)  |
| `else`     | Kondisi cadangan (jika semua false)     |

**Cara baca:**

```
if ($nilai >= 95)        → "Kalau >= 95, Grade A"
elseif ($nilai >= 80)    → "Kalau >= 80, Grade B"
else                     → "Kalau tidak, Grade C"
```

**Step by step:**

```
$nilai = 90
       │
       ▼
90 >= 95? false → lanjut ke elseif
       │
       ▼
90 >= 80? true → echo "Grade B" → STOP
```

**Output:**

```
Grade B
```

**Diagram:**

```
$nilai >= 95?
      │
      ├── true  → echo "Grade A"
      │
      └── false → $nilai >= 80?
                      │
                      ├── true  → echo "Grade B"
                      │
                      └── false → echo "Grade C"
```

---

## BAGIAN 2: Alternative Syntax (HTML)

> Syntax alternatif menggunakan **titik dua `:`** dan **`endif`** — lebih rapi saat PHP dicampur HTML.

---

### 1. Perbandingan Syntax

```php
// Syntax biasa (kurung kurawal)
if ($nilai >= 95) {
    echo "Grade A";
} elseif ($nilai >= 80) {
    echo "Grade B";
} else {
    echo "Grade C";
}

// Alternative syntax (titik dua + endif)
if ($nilai >= 95):
    echo "Grade A";
elseif ($nilai >= 80):
    echo "Grade B";
else:
    echo "Grade C";
endif;
```

| Syntax         | Format                    | Cocok untuk       |
| :------------- | :------------------------ | :---------------- |
| Biasa          | `{ ... }`                 | PHP murni         |
| Alternative    | `: ... endif;`            | PHP di dalam HTML |

---

### 2. Contoh di Dalam HTML

```php
<?php if ($nilaibaru >= 90): ?>
    <h1 style="color: blue;">Grade A</h1>
<?php elseif ($nilaibaru >= 70): ?>
    <h2 style="color: green;">Grade B</h2>
<?php else: ?>
    <h3 style="color: red;">Grade C</h3>
<?php endif; ?>
```

| Komponen        | Penjelasan                              |
| :-------------- | :-------------------------------------- |
| `<?php if (...): ?>` | Buka kondisi dengan titik dua     |
| `<?php elseif (...): ?>` | Cek kondisi berikutnya         |
| `<?php else: ?>` | Kondisi cadangan                   |
| `<?php endif; ?>` | Tutup blok if                       |

**Cara baca:** "Kalau `$nilaibaru >= 90`, tampilkan heading biru `Grade A`. Kalau `>= 70`, tampilkan heading hijau `Grade B`. Kalau tidak, tampilkan heading merah `Grade C`."

**Output (jika $nilaibaru = 50):**

```html
<h3 style="color: red;">Grade C</h3>
```

> **Catatan:** Alternative syntax lebih cocok untuk **PHP di dalam HTML** karena lebih rapi dan mudah dibaca.

---

## BAGIAN 3: switch Statement

> `switch` cocok untuk **banyak kondisi** dengan **nilai pasti** — lebih rapi dari banyak `elseif`.

---

### 1. Syntax switch

```php
$warna = "biru";

switch ($warna) {
    case "merah":
        echo "warna kesukaan anda merah";
    break;
    case "biru":
        echo "warna kesukaan anda biru";
    break;
    default:
        echo "warna kesukaan anda tidak di ketahui";
}
```

| Komponen   | Penjelasan                              |
| :--------- | :-------------------------------------- |
| `switch`   | Keyword untuk mulai switch              |
| `$warna`   | Variable yang dicek                     |
| `case`     | Salah satu nilai yang mungkin          |
| `:`        | Titik dua setelah case                  |
| `break`    | Keluar dari switch                      |
| `default`  | Kondisi cadangan jika tidak ada cocok   |

**Cara baca:** "Cek isi `$warna`. Kalau `merah`, tampilkan pesan merah. Kalau `biru`, tampilkan pesan biru. Kalau tidak ada yang cocok, tampilkan pesan tidak diketahui."

---

### 2. Cara Kerja switch

```
$warna = "biru"
       │
       ▼
switch ($warna)
       │
       ├── case "merah": → "biru" == "merah"? false → skip
       │
       ├── case "biru":  → "biru" == "biru"? true → echo "..." → break
       │
       └── default:      → tidak dijalankan (karena sudah break)
```

**Output:**

```
warna kesukaan anda biru
```

---

### 3. Pentingnya `break`

```php
// TANPA break — jatuh ke case berikutnya!
$warna = "merah";

switch ($warna) {
    case "merah":
        echo "Merah ";
        // TANPA break → lanjut ke case berikutnya!
    case "biru":
        echo "Biru ";
        // TANPA break → lanjut ke default!
    default:
        echo "Tidak diketahui";
}

// Output: Merah Biru Tidak diketahui (semua dijalankan!)
```

**Dengan `break`:**

```php
switch ($warna) {
    case "merah":
        echo "Merah ";
        break;  // STOP di sini
    case "biru":
        echo "Biru ";
        break;  // STOP di sini
    default:
        echo "Tidak diketahui";
}

// Output: Merah (hanya case yang cocok)
```

> **Analogi:** `break` seperti **tanda berhenti** di lift — tanpa tanda, lift terus naik ke lantai berikutnya.

---

### 4. Default — Kondisi Cadangan

```php
$warna = "hijau";

switch ($warna) {
    case "merah":
        echo "Merah";
    break;
    case "biru":
        echo "Biru";
    break;
    default:
        echo "warna kesukaan anda tidak di ketahui";
}

// Output: warna kesukaan anda tidak di ketahui
```

| Komponen  | Penjelasan                              |
| :-------- | :-------------------------------------- |
| `default` | Dijalankan jika **tidak ada case cocok**|

**Cara baca:** "Kalau `$warna` bukan `merah` dan bukan `biru`, jalankan `default`."

---

### 5. Perbandingan if...else vs switch

| Fitur               | if...else                    | switch                      |
| :------------------ | :--------------------------- | :-------------------------- |
| **Kondisi**         | Bebas (>, <, ==, dll)        | Nilai pasti (==)            |
| **Banyak kondisi**  | Pakai `elseif` berulang     | Lebih rapi                  |
| **Cocok untuk**     | Kondisi kompleks             | Banyak pilihan dengan nilai |
| **Contoh**          | `$nilai >= 90`              | `$warna == "merah"`         |

**Kapan pakai mana?**

```
if...else  → Kondisi pakai >, <, >=, <=  → $nilai >= 90
switch     → Kondisi pakai == (sama)     → $warna == "merah"
```

> **Analogi:**
> - `if...else` seperti **mengecek harga** — "Kalau harga >= 100.000, diskon 10%"
> - `switch` seperti **memilih warna** — "Kalau merah, tampilkan merah. Kalau biru, tampilkan biru."

---

## Ringkasan

```
Conditional Statements PHP
│
├── if...else
│   ├── if ($kondisi) { ... }           → jalankan jika true
│   ├── if (...) { } else { }          → pilih salah satu
│   └── if (...) { } elseif (...) { } else { } → banyak kondisi
│
├── Alternative Syntax
│   ├── if ($kondisi): ... endif;      → untuk di dalam HTML
│   └── Lebih rapi, tanpa kurung kurawal
│
└── switch
    ├── switch ($var) { case: ... }    → cocok untuk nilai pasti
    ├── break;                          → wajib agar tidak jatuh
    └── default:                        → kondisi cadangan
```

**Ringkasan Cepat:**

| Kebutuhan                          | Gunakan     |
| :--------------------------------- | :---------- |
| 2 kondisi (true/false)             | `if...else` |
| Banyak kondisi, pakai >, <, >=     | `if...elseif` |
| Banyak kondisi, pakai == (sama)    | `switch`    |
| PHP di dalam HTML                  | Alternative syntax |
