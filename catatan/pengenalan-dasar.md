# Catatan: Pengenalan Dasar PHP

---

## Alur Kerja

```
File pengenalan.php dibuka
       │
       ▼
Server proses kode PHP
       │
       ├── echo "Pengenalan <br>"   → Simpan "Pengenalan" + baris baru
       ├── echo "pengenalan"        → Simpan "pengenalan"
       └── Komentar diabaikan       → Tidak diproses
              │
              ▼
Server kirim HTML ke browser
       │
       ▼
Browser tampilkan:
       │
       ├── "Pengenalan" (ada <br> = baris baru)
       └── "pengenalan" (langsung di bawah)
              │
              ▼
HTML di-body diproses
       │
       ├── <h1> → "hallo semuanya" + <br> + "hallo juga"
       └── <h2> → "hallo semuanya" + <br>
              │
              ▼
Browser tampilkan semua hasil
```

---

## BAGIAN 1: PHP

> PHP adalah **bahasa pemrograman server-side**. Kode PHP diproses di **server** lalu hasilnya dikirim ke browser sebagai HTML.

---

### 1. Apa itu PHP?

```php
<?php
    echo "Halo Dunia";
?>
```

| Komponen    | Penjelasan                              |
| :---------- | :-------------------------------------- |
| `<?php`     | Tag pembuka PHP                         |
| `echo`      | Perintah untuk menampilkan teks         |
| `"Halo Dunia"` | Teks yang akan ditampilkan           |
| `;`         | Tanda akhir perintah                    |
| `?>`        | Tag penutup PHP                         |

**Cara baca:** "Buka PHP, tampilkan `Halo Dunia`, tutup PHP."

> **Analogi:** PHP seperti **koki di dapur** — memasak (memproses) di belakang, lalu menyajikan hasilnya ke tamu (browser).

---

### 2. Tag PHP

#### Tag Standar

```php
<?php
    // kode PHP di sini
    echo "ini PHP";
?>
```

| Komponen | Penjelasan                     |
| :------- | :----------------------------- |
| `<?php`  | Tag pembuka — mulai PHP        |
| `?>`     | Tag penutup — selesai PHP      |

#### Shorthand (Alternatif)

```php
<?= "ini juga PHP"; ?>
```

| Komponen | Penjelasan                              |
| :------- | :-------------------------------------- |
| `<?=`    | Shorthand dari `<?php echo`             |
| `?>`     | Tag penutup — selesai PHP               |

**Perbandingan:**

```
<?php echo "teks"; ?>    ← tag standar
<?= "teks"; ?>            ← shorthand (lebih pendek)
```

Keduanya **sama** — menampilkan teks ke layar.

> **Catatan:** Shorthand `<?=` hanya untuk **echo**, tidak bisa untuk kode PHP lainnya.

---

### 3. echo — Menampilkan Teks

```php
echo "Pengenalan <br> ";
echo "pengenalan";
```

| Komponen           | Penjelasan                              |
| :----------------- | :-------------------------------------- |
| `echo`             | Perintah PHP untuk menampilkan teks     |
| `"Pengenalan <br>"`| Teks + tag HTML `<br>` (baris baru)     |
| `;`                | Tanda akhir perintah                    |

**Cara baca:** "Tampilkan teks `Pengenalan` lalu pindah baris, kemudian tampilkan `pengenalan`."

**Output di browser:**

```
Pengenalan
pengenalan
```

**Kenapa ada `<br>` di dalam echo?**

```php
echo "baris 1";
echo "baris 2";
// Output: baris 1baris 2 (menyambung!)

echo "baris 1 <br>";
echo "baris 2";
// Output: baris 1
//         baris 2 (terpisah!)
```

> **Analogi:** `echo` seperti **pensil** — apa yang kamu tulis di `echo`, itulah yang muncul di kertas (layar).

---

### 4. Tanda Semicolon `;`

```php
echo "Pengenalan <br> ";    // BENAR — ada ;
echo "pengenalan";           // BENAR — ada ;

echo "tidak ada titik koma"  // SALAH — ERROR!
```

| Komponen | Penjelasan                              |
| :------- | :-------------------------------------- |
| `;`      | Tanda akhir perintah PHP                |

**Cara baca:** "Setiap perintah PHP **harus** diakhiri dengan `;`."

**Tanpa `;`:**

```php
echo "hello"
echo "world"
// ERROR: syntax error, unexpected echo
```

**Dengan `;`:**

```php
echo "hello";
echo "world";
// OK: hello world
```

> **Analogi:** Semicolon seperti **tanda titik** di akhir kalimat. Tanpa titik, kalimat tidak lengkap.

---

### 5. Komentar

#### Komentar Satu Baris

```php
// ini komentar satu baris
echo "halo"; // ini juga komentar
```

| Komponen | Penjelasan                     |
| :------- | :----------------------------- |
| `//`     | Awal komentar satu baris       |

#### Komentar Multi Baris

```php
/*
   ini komentar
   multi baris
   bisa beberapa baris
*/
echo "halo";
```

| Komponen | Penjelasan                     |
| :------- | :----------------------------- |
| `/*`     | Awal komentar multi baris      |
| `*/`     | Akhir komentar multi baris     |

#### Komentar HTML

```html
<!-- ini komentar HTML -->
<h1>halo</h1>
```

| Komponen   | Penjelasan                     |
| :--------- | :----------------------------- |
| `<!--`     | Awal komentar HTML             |
| `-->`      | Akhir komentar HTML            |

**Perbandingan:**

```php
// Komentar PHP — tidak terlihat di browser
/* Komentar PHP multi baris — tidak terlihat di browser */
<!-- Komentar HTML — bisa dilihat di "View Source" browser -->
```

> **Catatan:** Komentar **tidak diproses** oleh PHP. Hanya untuk catatan programmer.

---

### 6. PHP di Dalam HTML

PHP bisa ditempatkan di **mana saja** dalam dokumen HTML.

#### PHP di Dalam `<body>`

```php
<body>
    <?php
    // kode PHP di dalam body
    echo "halo dari PHP";
    ?>
</body>
```

#### PHP di Dalam Tag HTML

```html
<h1><?php echo "hallo semuanya"; ?><br>hallo juga</h1>
```

| Komponen                    | Penjelasan                      |
| :-------------------------- | :------------------------------ |
| `<h1>...</h1>`              | Tag heading HTML                |
| `<?php echo "..."; ?>`      | PHP di dalam tag h1             |
| `<br>`                      | Baris baru                      |
| `hallo juga`                | Teks HTML biasa                 |

**Cara baca:** "Tag `<h1>` berisi PHP yang menampilkan `hallo semuanya`, lalu baris baru, lalu teks `hallo juga`."

**Output di browser:**

```
hallo semuanya
hallo juga
```

#### PHP di Luar Tag HTML

```php
<?php
// PHP bisa di luar tag HTML
echo "ini di luar";
?>
<!DOCTYPE html>
<html>
    <body>
        <!-- HTML di sini -->
    </body>
</html>
```

**Kesimpulan:**

```
PHP bisa di:
├── Di dalam <body>        ✅
├── Di dalam <h1>          ✅
├── Di dalam tag HTML lain ✅
└── Di luar tag HTML       ✅
```

> **Analogi:** PHP seperti **air** — bisa mengalir ke mana saja dalam dokumen HTML.

---

### 7. Shorthand PHP

```php
<!-- Tag standar -->
<h1><?php echo "hallo semuanya"; ?><br></h1>

<!-- Shorthand (lebih pendek) -->
<h2><?= "hallo semuanya"; ?><br></h2>
```

**Perbandingan:**

| Standar                     | Shorthand           | Hasil                |
| :-------------------------- | :------------------ | :------------------- |
| `<?php echo "teks"; ?>`    | `<?= "teks"; ?>`    | `teks`               |
| `<?php echo $var; ?>`      | `<?= $var; ?>`      | isi `$var`           |

**Cara baca shorthand:**

```
<?= "hallo semuanya"; ?>
│  │                  │
│  │                  └── tutup PHP
│  └───────────────────── teks yang ditampilkan
└──────────────────────── awal PHP + echo (pendek)
```

> **Catatan:** Shorthand `<?=` hanya bisa untuk **echo**. Untuk kode lain, tetap pakai `<?php ... ?>`.

---

### 8. Ringkasan

```
Pengenalan Dasar PHP
│
├── Tag PHP
│   ├── <?php ... ?>    → tag standar
│   └── <?= ... ?>      → shorthand (echo)
│
├── echo "teks";        → menampilkan teks ke layar
│
├── ;                   → setiap perintah HARUS diakhiri semicolon
│
├── Komentar
│   ├── //              → satu baris
│   ├── /* ... */       → multi baris
│   └── <!-- ... -->    → komentar HTML
│
├── PHP di mana saja
│   ├── Di dalam <body>
│   ├── Di dalam tag HTML
│   └── Di luar tag HTML
│
└── Shorthand
    └── <?= "teks"; ?>  → sama dengan <?php echo "teks"; ?>
```
