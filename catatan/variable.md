# Catatan: Variable

---

## Alur Kerja

```
Program dimulai
       │
       ▼
Buat variable dengan $nama = "andika"
       │
       ▼
Buat variable dengan $_close = "door"
       │
       ▼
echo $_close;  →  Tampilkan "door" ke layar
       │
       ▼
echo $nama;    →  Tampilkan "andika" ke layar
       │
       ▼
Program selesai
```

---

## BAGIAN 1: PHP

> Variable adalah **kotak penyimpan data** dalam program. Setiap variable punya nama dan isi.

---

### 1. Apa itu Variable?

```php
$nama = "andika";
$_close = "door";
```

| Komponen  | Penjelasan                              |
| :-------- | :-------------------------------------- |
| `$nama`   | Nama variable (kotak yang dibuat)       |
| `=`       | Assignment operator (simpan nilai)      |
| `"andika"`| Isi/value yang disimpan dalam variable  |

**Cara baca:** "Buat variable `$nama`, isi dengan teks `andika`."

> **Analogi:** Variable seperti **kotak kemasan** yang diberi label. `$nama` adalah label kotaknya, `"andika"` adalah isi di dalamnya.

---

### 2. Aturan Penamaan Variable

```php
$nama = "andika";      // BENAR — diawali huruf
$_close = "door";      // BENAR — diawali underscore
$nama_saya = "budi";   // BENAR — pakai underscore
$123salah = "error";   // SALAH — diawali angka
$nama-saya = "error";  // SALAH — pakai dash/tanda strip
```

| Contoh       | Status  | Alasan                              |
| :----------- | :------ | :---------------------------------- |
| `$nama`      | BENAR   | Diawali huruf                       |
| `$_close`    | BENAR   | Diawali underscore                  |
| `$nama_saya` | BENAR   | Huruf, underscore, angka di tengah  |
| `$123salah`  | SALAH   | Diawali angka                       |
| `$nama-saya` | SALAH   | Pakai dash/tanda strip              |
| `$nama saya` | SALAH   | Ada spasi                           |

**Aturan sederhana:**

```
✅ Boleh: $, huruf, underscore (_), angka (di tengah/akhir)
❌ Tidak boleh: angka di awal, spasi, dash (-), titik (.)
```

> **Analogi:** Seperti **nama jalan** — tidak boleh diawali angka, tidak boleh ada spasi.

---

### 3. echo — Menampilkan ke Layar

```php
echo $_close;   // Tampilkan isi variable $_close
echo $nama;     // Tampilkan isi variable $nama
```

| Komponen  | Penjelasan                              |
| :-------- | :-------------------------------------- |
| `echo`    | Perintah PHP untuk menampilkan teks     |
| `$_close` | Variable yang isinya akan ditampilkan   |
| `;`       | Tanda akhir perintah PHP                |

**Cara baca:** "Tampilkan isi variable `$_close` ke layar."

**Output program:**

```
doorandika
```

**Kenapa tidak ada spasi/enter?**

```php
echo $_close;   // Output: door
echo $nama;     // Output: andika (langsung menyambung)
```

Untuk menambah spasi/enter, gunakan `<br>`:

```php
echo $_close . "<br>";   // Output: door (dengan baris baru)
echo $nama;              // Output: andika
```

> **Analogi:** `echo` seperti **tinta printer** — apa yang ditulis di `echo`, itulah yang muncul di layar.

---

### 4. Ringkasan

```
Variable = kotak penyimpan data
    │
    ├── Harus diawali dengan $
    ├── Nama boleh: huruf, _, angka (tapi tidak di awal)
    └── echo = tampilkan isi variable ke layar
```
