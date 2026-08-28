# Catatan: Calculator Sederhana

---

## Alur Kerja

```
User buka halaman
       │
       ▼
PHP cek: isset($_POST["calculate"])?
       │
       ├─ false → $result = '' (kosong)
       │          HTML tampilkan form kosong
       │
       └─ true  → Ambil num1, num2, operator
                  │
                  ▼
              is_numeric?
              │
              ├─ false → "angka tidak valid"
              │
              └─ true  → switch(operator)
                         ├─ add       → num1 + num2
                         ├─ subtract  → num1 - num2
                         ├─ multiply  → num1 * num2
                         └─ divida    → num1 / num2
                                         │
                                         ▼
                                  HTML tampilkan hasil
```

---

## BAGIAN 1: PHP

> PHP diproses **duluan oleh server** sebelum HTML dikirim ke browser.

---

### 1. `$result = '';`

```php
$result = '';
```

| Komponen   | Penjelasan                          |
| :--------- | :---------------------------------- |
| `$result`  | Variabel — kotak untuk menyimpan sesuatu |
| `=`        | Assignment operator — simpan nilai ke variabel |
| `''`       | String kosong — tidak ada isi       |

**Cara baca:** "Buat kotak bernama `$result`, isi kosong dulu."

**Kenapa kosong?** Karena saat halaman baru dibuka, belum ada perhitungan.

---

### 2. `if(isset($_POST["calculate"]))`

```php
if(isset($_POST["calculate"])){
```

**Cara baca:** "Kalau tombol Hitung sudah diklik, jalankan kode di dalam `{...}`"

**Pecahan per karakter:**

```
isset($_POST["calculate"])
│    │    │
│    │    └── "calculate" = name dari tombol <button>
│    └─────── $_POST = kotak data dari form (method POST)
│            $_POST hanya terisi SAAT form disubmit
│            Kalau belum disubmit, $_POST kosong
└──────────── isset() = cek apakah variabel ada & tidak kosong
```

**Contoh konkret:**

| Situasi                        | `$_POST["calculate"]` | `isset()` |
| :----------------------------- | :-------------------- | :-------- |
| User baru buka halaman         | Kosong/tidak ada      | `false`   |
| User klik tombol "Hitung"      | Ada                   | `true`    |

> **Analogi:** `isset()` seperti mengecek **ada tidaknya surat** di mailbox. Kalau ada, baru dibuka isinya.

---

### 3. Mengambil data dari form

```php
$num1 = $_POST["num1"];
$num2 = $_POST["num2"];
$operator = $_POST["operator"];
```

**Cara baca:**

- Line 10: "Ambil angka pertama dari input `name="num1"`, simpan di `$num1`"
- Line 11: "Ambil angka kedua dari input `name="num2"`, simpan di `$num2`"
- Line 12: "Ambil operator dari select `name="operator"`, simpan di `$operator`"

**Koneksi HTML ke PHP:**

| HTML                       | PHP                |
| :------------------------- | :----------------- |
| `<input name="num1">`     | `$_POST["num1"]`   |
| `<input name="num2">`     | `$_POST["num2"]`   |
| `<select name="operator">`| `$_POST["operator"]` |

> **Aturan penting:** `name=""` di HTML = `$_POST[""]` di PHP. **Harus sama!**

---

### 4. `if(is_numeric($num1) && is_numeric($num2))`

```php
if(is_numeric($num1) && is_numeric($num2)){
```

**Cara baca:** "Kalau `$num1` DAN `$num2` keduanya berupa angka, jalankan kode di dalam"

**Pecahan:**

```
is_numeric($num1)  &&  is_numeric($num2)
│                  │   │
│                  │   └── cek apakah $num2 angka
│                  └────── AND (keduanya harus true)
└───────────────────────── cek apakah $num1 angka
```

**Contoh:**

| `$num1` | `$num2` | `is_numeric($num1)` | `is_numeric($num2)` | `&&` (hasil) |
| :------ | :------ | :------------------ | :------------------ | :----------- |
| `"5"`   | `"3"`   | `true`              | `true`              | `true`       |
| `"5"`   | `"abc"` | `true`              | `false`             | `false`      |
| `"abc"` | `"3"`   | `false`             | `true`              | `false`      |
| `"abc"` | `"xyz"` | `false`             | `false`             | `false`      |

> **Analogi:** `&&` seperti pintu yang butuh **dua kunci** untuk dibuka. Satu kunci saja tidak cukup.

---

### 5. `switch($operator)`

```php
switch ($operator){
    case "add":
        $result = $num1 + $num2;
    break;
}
```

**Cara baca:** "Cek isi `$operator`, cocokkan dengan salah satu `case`"

**Analogi:** Seperti **mesin penjual otomatis**:

- Tekan tombol "1" → keluar produk A
- Tekan tombol "2" → keluar produk B

**Pecahan:**

```
switch ($operator)          ← "Cek tombol yang ditekan"
    case "add":             ← "Kalau tombol 'add'..."
        $result = ...       ← "...jalankan penjumlahan"
    break;                  ← "Berhenti, keluar dari switch"

    case "subtract":        ← "Kalau tombol 'subtract'..."
        $result = ...       ← "...jalankan pengurangan"
    break;
```

**Kenapa pakai `:` bukan `;`?**

```
case "add":     ← BENAR (titik dua)
case "add";     ← SALAH (titik koma)
```

Karena `case` diikuti **label** (seperti nama pintu), jadi pakai `:`.

---

### 6. `break;`

```php
break;
```

**Cara baca:** "Keluar dari switch, jangan lanjut ke case berikutnya."

**Tanpa `break`:**

```php
case "add":
    $result = $num1 + $num2;
    // TANPA break → lanjut ke case berikutnya!
case "subtract":
    $result = $num1 - $num2;  // ← ikut dijalankan!
```

**Dengan `break`:**

```php
case "add":
    $result = $num1 + $num2;
    break;  // ← STOP di sini
case "subtract":
    $result = $num1 - $num2;  // ← TIDAK dijalankan
```

> **Analogi:** `break` seperti **tanda berhenti** di lift. Tanpa tanda, lift terus naik ke lantai berikutnya.

---

### 7. Kasus khusus pembagian

```php
case "divida":
    if($num2 != 0){
        $result = $num1 / $num2;
    } else {
        $result = "Error : Pembagian dengan 0 tidak bisa";
    }
break;
```

**Cara baca:** "Kalau bagi, cek dulu apakah pembagi bukan 0. Kalau 0, tampilkan error."

**Kenapa?** Dalam matematika, **pembagian dengan 0 tidak terdefinisi**:

```
10 / 2 = 5     (boleh)
10 / 0 = ???   (error)
```

---

### 8. `else` (validasi gagal)

```php
} else {
    $result = "angka tidak valid";
}
```

**Cara baca:** "Kalau input bukan angka, tampilkan pesan error."

| Input  | `is_numeric()` | Hasil                |
| :----- | :------------- | :------------------- |
| `"10"` | `true`         | Kalkulasi berjalan   |
| `"abc"`| `false`        | `"angka tidak valid"`|

---

## BAGIAN 2: HTML

> HTML dikirim ke browser **setelah PHP selesai diproses**.

---

### 1. Form

```html
<form action="/calculator/index.php" class="calculator-form" method="post">
```

**Cara baca:** "Buat form yang dikirim ke `index.php` menggunakan method POST."

| Komponen                         | Penjelasan                    |
| :------------------------------- | :---------------------------- |
| `action="/calculator/index.php"` | Form dikirim ke halaman ini   |
| `method="post"`                  | Data dikirim tersembunyi (bukan di URL) |

**POST vs GET:**

```
GET:  /calculator/index.php?num1=5&num2=3&operator=add  ← terlihat di URL
POST: (data tersembunyi di body request)                ← tidak terlihat
```

---

### 2. Input dengan PHP (value)

```html
<input type="text" name="num1" placeholder="Angka ke 1"
       value="<?php echo isset($_POST['num1']) ? $_POST['num1'] : '';?>">
```

**Cara baca per bagian:**

```
<input type="text"              ← input teks biasa
       name="num1"              ← nama ini yang jadi $_POST["num1"] di PHP
       placeholder="Angka ke 1" ← teks samar di dalam input
       value="..."              ← nilai awal input (diisi oleh PHP)
```

**Bagian PHP di dalam `value`:**

```php
<?php echo isset($_POST['num1']) ? $_POST['num1'] : ''; ?>
```

```
isset($_POST['num1'])  ?  $_POST['num1']  :  ''
       │                    │               │
  "Apakah ada           "Tampilkan       "Kalau tidak,
   data num1?"           nilainya"        tampilkan kosong"
       │                    │               │
    true/false           jika true       jika false
```

**Contoh:**

| Situasi                          | `$_POST['num1']` | Hasil `value=""` |
| :------------------------------- | :--------------- | :--------------- |
| Baru buka halaman                | Kosong           | `value=""`       |
| Isi "5", submit, kembali         | `"5"`            | `value="5"`      |

> **Analogi:** Seperti **memory** di kalkulator. Setelah dihitung, angka sebelumnya masih terlihat.

---

### 3. Ternary Operator `? :`

```php
isset($_POST['num1']) ? $_POST['num1'] : ''
```

**Format:**

```
kondisi ? nilai_jika_true : nilai_jika_false
```

**Cara baca:** "Kalau kondisi `true`, ambil nilai pertama. Kalau `false`, ambil nilai kedua."

---

### 4. Select Option dengan `selected`

```html
<option <?= isset($_POST['operator']) && $_POST['operator'] == 'add' ? "selected": "" ?> value="add">Tambah</option>
```

**Cara baca PHP:**

```php
<?= isset($_POST['operator']) && $_POST['operator'] == 'add' ? "selected": "" ?>
```

```
isset($_POST['operator'])        ← "Apakah operator ada?"
         &&
$_POST['operator'] == 'add'     ← "Dan apakah nilainya 'add'?"
         │
    ? "selected"                 ← "Kalau YA, tambahkan atribut selected"
    : ""                         ← "Kalau TIDAK, kosong saja"
```

**Hasil di browser:**

```html
<!-- Jika user sebelumnya pilih "Tambah" -->
<option selected value="add">Tambah</option>    ← aktif/terpilih
<option value="subtract">Kurang</option>         ← tidak aktif
```

> **Analogi:** Seperti **sticky note** yang mengingat pilihan terakhir user.

---

### 5. Tombol Submit

```html
<button class="calculator-btn" type="submit" name="calculate">Hitung</button>
```

| Komponen             | Penjelasan                                    |
| :------------------- | :-------------------------------------------- |
| `type="submit"`      | Tombol ini untuk mengirim form                |
| `name="calculate"`   | Ini yang dicek oleh `$_POST['calculate']` di PHP |

**Koneksi ke PHP:**

```
HTML: <button name="calculate">
                    │
                    ▼
PHP: if(isset($_POST["calculate"]))
```

---

### 6. Menampilkan Hasil

```html
<div class="result">Result : <?php echo htmlspecialchars($result) ?></div>
```

**`htmlspecialchars($result)` — Kenapa perlu?**

Bayangkan `$result` berisi:

```php
$result = "<script>alert('Hacked!')</script>";
```

Tanpa `htmlspecialchars()`:

```html
<div>Result : <script>alert('Hacked!')</script></div>  ← BAHAYA!
```

Dengan `htmlspecialchars()`:

```html
<div>Result : &lt;script&gt;alert(&#039;Hacked!&#039;)&lt;/script&gt;</div>  ← AMAN
```

> **Analogi:** `htmlspecialchars()` seperti **filter** yang mengubah karakter berbahaya jadi teks biasa.

---

## BAGIAN 3: CSS

> CSS mengatur **tampilan** halaman.

---

### 1. Body

```css
body{
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    font-family: sans-serif;
    background-color: #f4f4f4;
    margin: 0;
}
```

| Properti              | Arti                                            |
| :-------------------- | :---------------------------------------------- |
| `display: flex`       | Aktifkan flexbox (susunan fleksibel)            |
| `justify-content: center` | Rata tengah horizontal                     |
| `align-items: center` | Rata tengah vertikal                            |
| `height: 100vh`       | Tinggi = 100% viewport (seluruh layar)          |
| `background-color: #f4f4f4` | Warna abu-abu muda                        |
| `margin: 0`           | Hapus jarak dari tepi browser                   |

**`100vh` vs `100%`:**

```
100vh = 100% dari VIEWPORT (area browser yang terlihat)
100%  = 100% dari PARENT ELEMENT (elemen yang membungkus)
```

---

### 2. Container

```css
.container{
    display: flex;
    flex-direction: column;
    gap: 20px;
    background-color: #fff;
    padding: 20px;
    border-radius: 20px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    text-align: center;
    max-width: 350px;
    width: 100%;
}
```

| Properti               | Arti                                     |
| :--------------------- | :--------------------------------------- |
| `flex-direction: column` | Susun elemen child secara vertikal     |
| `gap: 20px`            | Jarak antar elemen = 20px                |
| `padding: 20px`        | Jarak dalam container = 20px             |
| `border-radius: 20px`  | Sudut melengkung                         |
| `box-shadow`           | Bayangan di bawah container              |
| `max-width: 350px`     | Lebar maksimal 350px                     |
| `width: 100%`          | Lebar ikut parent (responsive)           |

**Visual:**

```
┌─────────────────────────────┐ ← border-radius: 20px
│                             │
│  ┌───────────────────────┐  │ ← padding: 20px
│  │       Calculator      │  │
│  │                       │  │ ← gap: 20px
│  │  [  Input Angka 1  ]  │  │
│  │                       │  │
│  │  [  Input Angka 2  ]  │  │
│  │                       │  │
│  │  [  Pilih Operator ]  │  │
│  │                       │  │
│  │  [     Hitung      ]  │  │
│  │                       │  │
│  │  Result : 8          │  │
│  └───────────────────────┘  │
│                             │ ← box-shadow
└─────────────────────────────┘
```

---

### 3. Form Layout

```css
.calculator-form{
    display: flex;
    flex-direction: column;
    gap: 15px;
}
```

| Properti               | Arti                                     |
| :--------------------- | :--------------------------------------- |
| `display: flex`        | Aktifkan flexbox untuk form              |
| `flex-direction: column` | Susun input secara vertikal            |
| `gap: 15px`            | Jarak antar input = 15px                 |

---

### 4. Input Styling

```css
.calculator-form input[type="text"],
.calculator-form select{
    padding: 10px;
    font-size: 16px;
    border-radius: 10px;
    border: 1px solid #ccc;
    width: 100%;
    box-sizing: border-box;
}
```

**Selector ganda:** Koma `,` = "terapkan style ke **kedua** selector"

| Properti               | Arti                                     |
| :--------------------- | :--------------------------------------- |
| `padding: 10px`        | Jarak dalam input = 10px                 |
| `font-size: 16px`      | Ukuran huruf = 16px                      |
| `border-radius: 10px`  | Sudut input melengkung                   |
| `border: 1px solid #ccc` | Garis abu-abu tipis                    |
| `box-sizing: border-box` | Padding tidak menambah lebar total     |

**`box-sizing: border-box` vs default:**

```
Default (content-box):
width: 100% + padding: 10px + border: 1px = LEBIH dari 100%

border-box:
width: 100% (sudah termasuk padding & border)
```

---

### 5. Tombol

```css
.calculator-btn{
    padding: 10px 20px;
    font-size: 16px;
    background-color: #28A745;
    color: white;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.4s ease;
}
```

| Properti                                | Arti                                     |
| :-------------------------------------- | :--------------------------------------- |
| `padding: 10px 20px`                    | Atas-bawah: 10px, Kiri-kanan: 20px      |
| `background-color: #28A745`             | Warna hijau                              |
| `color: white`                          | Teks putih                               |
| `cursor: pointer`                       | Kursor jadi tangan saat hover            |
| `transition: background-color 0.4s ease` | Animasi perubahan warna 0.4 detik      |

---

### 6. Hover Effect

```css
.calculator-btn:hover{
    background-color: #218838;
}
```

**`:hover`** = "Saat kursor **di atas** tombol"

```
Normal:  #28A745 (hijau terang)
Hover:   #218838 (hijau gelap)
```

Dengan `transition: 0.4s`, perubahan warna terjadi **halus**.

---

### 7. Result Area

```css
.result{
    padding: 10px;
    font-size: 18px;
    font-weight: bold;
    background-color: #f8f8f9;
    border-radius: 5px;
    border: 1px solid #fff;
}
```

| Properti               | Arti                                     |
| :--------------------- | :--------------------------------------- |
| `font-size: 18px`      | Ukuran huruf lebih besar dari input      |
| `font-weight: bold`    | Teks tebal                               |
| `background-color: #f8f8f9` | Abu-abu sangat muda (hampir putih)  |
