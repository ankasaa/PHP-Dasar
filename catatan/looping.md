# Catatan: Looping (Perulangan)

---

## Alur Kerja

```
Program dimulai
       │
       ▼
Pilih jenis loop
       │
       ├── while       → Cek kondisi DULU, baru jalankan
       ├── do...while  → Jalankan DULU, baru cek kondisi
       ├── for         → Counter + kondisi + increment
       └── foreach     → Khusus untuk array
              │
              ▼
Jalankan kode di dalam loop
       │
       ▼
Cek kondisi lagi?
       │
       ├── true  → Ulangi lagi
       └── false → Selesai
              │
              ▼
Program selesai
```

---

## BAGIAN 1: while Loop

> `while` = **"selama"** kondisi true, jalankan kode di dalamnya.

---

### 1. Apa itu Looping?

```php
// Tanpa looping — harus tulis 5 kali!
echo "Nomber : 1 <br>";
echo "Nomber : 2 <br>";
echo "Nomber : 3 <br>";
echo "Nomber : 4 <br>";
echo "Nomber : 5 <br>";

// Dengan looping — cukup sekali!
$i = 1;
while ($i <= 5) {
    echo "Nomber : $i <br>";
    $i++;
}
```

| Komponen | Penjelasan                              |
| :------- | :-------------------------------------- |
| `$i`     | Counter (penghitung)                    |
| `while`  | Keyword untuk loop                      |
| `$i++`   | Tambah 1 ke `$i` setiap putaran        |

**Cara baca:** "Selama `$i` kurang dari atau sama dengan 5, jalankan kode di dalam, lalu tambah `$i` satu."

> **Analogi:** Looping seperti **putaran jarum jam** — berputar berulang sampai waktu yang ditentukan habis.

---

### 2. Cara Kerja while

```
while ($i <= 5) {
    echo "Nomber : $i <br>";
    $i++;
}
```

**Step by step:**

```
Putaran 1: $i = 1  → 1 <= 5? true  → echo "Nomber : 1" → $i jadi 2
Putaran 2: $i = 2  → 2 <= 5? true  → echo "Nomber : 2" → $i jadi 3
Putaran 3: $i = 3  → 3 <= 5? true  → echo "Nomber : 3" → $i jadi 4
Putaran 4: $i = 4  → 4 <= 5? true  → echo "Nomber : 4" → $i jadi 5
Putaran 5: $i = 5  → 5 <= 5? true  → echo "Nomber : 5" → $i jadi 6
Putaran 6: $i = 6  → 6 <= 5? false → STOP
```

**Output:**

```
Nomber : 1
Nomber : 2
Nomber : 3
Nomber : 4
Nomber : 5
```

---

### 3. Pentingnya `$i++`

```php
$i = 1;
while ($i <= 5) {
    echo "Nomber : $i <br>";
    // Tanpa $i++ → infinite loop (loop tak terbatas)!
}
```

**Tanpa `$i++`:**

```
Putaran 1: $i = 1  → echo "Nomber : 1"
Putaran 2: $i = 1  → echo "Nomber : 1"
Putaran 3: $i = 1  → echo "Nomber : 1"
... (selamanya!)
```

> **Peringatan:** Tanpa increment, loop tidak akan pernah berhenti (**infinite loop**). Browser bisa hang/crash.

> **Analogi:** `$i++` seperti **timer** — tanpa timer, alarm tidak pernah berbunyi.

---

## BAGIAN 2: do...while Loop

> `do...while` = **"lakukan dulu"** minimal 1 kali, baru cek kondisi.

---

### 1. Perbedaan while vs do...while

```php
// while — cek DULU
while ($i <= 5) {
    echo "Number : $i <br>";
    $i++;
}

// do...while — jalankan DULU
do {
    echo "number : $j <br>";
    $j++;
} while ($j <= 5);
```

| Fitur             | while             | do...while            |
| :---------------- | :---------------- | :-------------------- |
| Kondisi dicek     | **DULU**          | **AKHIR**             |
| Minimal jalan     | 0 kali            | **1 kali**            |
| Syntax            | `while()` { }    | `do` { } `while()`;  |

**Analogi:**
- `while` seperti **mengecek uang dulu** sebelum beli — kalau cukup, beli.
- `do...while` seperti **beli dulu** baru bayar — pasti beli minimal sekali.

---

### 2. Cara Kerja do...while

```php
$j = 1;
do {
    echo "number : $j <br>";
    $j++;
} while ($j <= 5);
```

**Step by step:**

```
Putaran 1: echo "number : 1" → $j jadi 2 → 2 <= 5? true  → Ulangi
Putaran 2: echo "number : 2" → $j jadi 3 → 3 <= 5? true  → Ulangi
Putaran 3: echo "number : 3" → $j jadi 4 → 4 <= 5? true  → Ulangi
Putaran 4: echo "number : 4" → $j jadi 5 → 5 <= 5? true  → Ulangi
Putaran 5: echo "number : 5" → $j jadi 6 → 6 <= 5? false → STOP
```

**Output:**

```
number : 1
number : 2
number : 3
number : 4
number : 5
```

---

### 3. Kasus Khusus: do...while Tetap Jalan 1 Kali

```php
$j = 10;
do {
    echo "number : $j <br>";
    $j++;
} while ($j <= 5);
```

**Output:**

```
number : 10
```

**Kenapa?** Karena `do...while` **jalankan dulu** baru cek. Meskipun `$j = 10` sudah lebih dari 5, kode tetap dijalankan **1 kali**.

Jika pakai `while`, outputnya **kosong** (tidak ada apa-apa).

---

## BAGIAN 3: for Loop

> `for` = loop dengan **counter**, kondisi, dan increment dalam **satu baris**.

---

### 1. Syntax for Loop

```php
for ($i = 1; $i <= 5; $i++) {
    echo "Nomber : $i <br>";
}
```

| Komponen       | Penjelasan                              |
| :------------- | :-------------------------------------- |
| `$i = 1`       | **Inisialisasi** — mulai dari 1         |
| `$i <= 5`      | **Kondisi** — selama kurang dari/sama 5 |
| `$i++`         | **Increment** — tambah 1 setiap putaran |

**Cara baca:** "Mulai `$i` dari 1. Selama `$i <= 5`, jalankan kode, lalu tambah `$i` satu."

**Step by step:**

```
Inisialisasi: $i = 1
Putaran 1: 1 <= 5? true  → echo "Nomber : 1" → $i++ → $i = 2
Putaran 2: 2 <= 5? true  → echo "Nomber : 2" → $i++ → $i = 3
Putaran 3: 3 <= 5? true  → echo "Nomber : 3" → $i++ → $i = 4
Putaran 4: 4 <= 5? true  → echo "Nomber : 4" → $i++ → $i = 5
Putaran 5: 5 <= 5? true  → echo "Nomber : 5" → $i++ → $i = 6
Putaran 6: 6 <= 5? false → STOP
```

**Output:**

```
Nomber : 1
Nomber : 2
Nomber : 3
Nomber : 4
Nomber : 5
```

---

### 2. Perbandingan for vs while

```php
// for Loop
for ($i = 1; $i <= 5; $i++) {
    echo "Number : $i <br>";
}

// while Loop (hasilnya sama)
$i = 1;
while ($i <= 5) {
    echo "Number : $i <br>";
    $i++;
}
```

| Fitur             | for              | while              |
| :---------------- | :--------------- | :----------------- |
| Counter           | Di dalam `for()` | Di luar loop       |
| Kondisi           | Di dalam `for()` | Di dalam `while()` |
| Increment         | Di dalam `for()` | Di dalam `while()` |
| Kapan pakai       | Jumlah pasti     | Kondisi dinamis    |

> **Analogi:** `for` seperti **timer digital** — sudah diatur awal, akhir, dan langkahnya. `while` seperti **alarm** — hanya cek kondisi, cara hitung terserah.

---

## BAGIAN 4: foreach Loop

> `foreach` = loop **khusus untuk array** — otomatis ambil tiap elemen.

---

### 1. Syntax foreach

```php
$hewan = array("ayam", "anjing", "babi");

foreach ($hewan as $animals) {
    echo "hewannya adalah : $animals <br>";
}
```

| Komponen        | Penjelasan                              |
| :-------------- | :-------------------------------------- |
| `$hewan`        | Array yang akan di-loop                 |
| `as`            | Keyword "sebagai"                       |
| `$animals`      | Variable penampung tiap elemen          |

**Cara baca:** "Untuk tiap elemen dalam `$hewan`, simpan di `$animals`, lalu tampilkan."

**Step by step:**

```
Putaran 1: $animals = "ayam"   → echo "hewannya adalah : ayam"
Putaran 2: $animals = "anjing" → echo "hewannya adalah : anjing"
Putaran 3: $animals = "babi"   → echo "hewannya adalah : babi"
Array habis → STOP
```

**Output:**

```
hewannya adalah : ayam
hewannya adalah : anjing
hewannya adalah : babi
```

---

### 2. foreach dengan Index

```php
$buah = ["apel", "jeruk", "mangga"];

foreach ($buah as $index => $nama) {
    echo "$index: $nama <br>";
}
```

| Komponen        | Penjelasan                              |
| :-------------- | :-------------------------------------- |
| `$index`        | Index array (0, 1, 2, ...)              |
| `$nama`         | Isi elemen                              |

**Output:**

```
0: apel
1: jeruk
2: mangga
```

> **Analogi:** `foreach` seperti **membaca daftar belanja** — satu per satu dari awal sampai habis.

---

## BAGIAN 5: break dan continue

> `break` dan `continue` mengontrol **alur loop** dari dalam.

---

### 1. break — Hentikan TOTAL

```php
for ($i = 1; $i <= 10; $i++) {
    if ($i == 5) {
        break;
    }
    echo "Number: $i <br>";
}
```

**Output:**

```
Number: 1
Number: 2
Number: 3
Number: 4
```

**Step by step:**

```
$i = 1 → 1 == 5? false → echo "Number: 1"
$i = 2 → 2 == 5? false → echo "Number: 2"
$i = 3 → 3 == 5? false → echo "Number: 3"
$i = 4 → 4 == 5? false → echo "Number: 4"
$i = 5 → 5 == 5? true  → BREAK! (keluar total)
```

> **Analogi:** `break` seperti **berhenti total** dari lomba — langsung keluar arena.

---

### 2. continue — Lewati 1 Iterasi

```php
for ($j = 1; $j <= 10; $j++) {
    if ($j == 5) {
        continue;
    }
    echo "Number: $j <br>";
}
```

**Output:**

```
Number: 1
Number: 2
Number: 3
Number: 4
Number: 6
Number: 7
Number: 8
Number: 9
Number: 10
```

**Step by step:**

```
$j = 1 → 1 == 5? false → echo "Number: 1"
$j = 2 → 2 == 5? false → echo "Number: 2"
$j = 3 → 3 == 5? false → echo "Number: 3"
$j = 4 → 4 == 5? false → echo "Number: 4"
$j = 5 → 5 == 5? true  → CONTINUE (skip echo, lanjut ke 6)
$j = 6 → 6 == 5? false → echo "Number: 6"
... dst
```

> **Analogi:** `continue` seperti **lewat** satu pos — tidak berhenti, hanya skip satu.

---

### 3. Perbedaan break vs continue

| Fitur         | break             | continue            |
| :------------ | :---------------- | :------------------ |
| Efek          | **Keluar total**  | **Skip 1 iterasi**  |
| Sisa loop     | Tidak dijalankan  | Tetap dijalankan    |
| Ibarat        | Berhenti total    | Lewat satu pos      |

```
break:    1, 2, 3, 4, [STOP]
continue: 1, 2, 3, 4, [skip], 6, 7, 8, 9, 10
```

---

## Ringkasan

```
Looping PHP
│
├── while         → Cek kondisi DULU, baru jalankan
│                   while ($i <= 5) { ... $i++; }
│
├── do...while    → Jalankan DULU, baru cek kondisi
│                   do { ... } while ($i <= 5);
│
├── for           → Counter + kondisi + increment
│                   for ($i=1; $i<=5; $i++) { ... }
│
├── foreach       → Khusus array
│                   foreach ($arr as $val) { ... }
│
└── Kontrol Loop
    ├── break     → Hentikan TOTAL
    └── continue  → Skip 1 iterasi, lanjut lagi
```

**Kapan pakai mana?**

| Kebutuhan                        | Gunakan     |
| :------------------------------- | :---------- |
| Jumlah pasti, counter jelas      | `for`       |
| Kondisi dinamis, tanpa counter   | `while`     |
| Pasti jalan minimal 1 kali       | `do...while`|
| Iterasi semua elemen array       | `foreach`   |
