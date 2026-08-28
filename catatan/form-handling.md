# Catatan: Form Handling

---

## Alur Kerja

```
User buka halaman form
       │
       ▼
Isi input (name, email)
       │
       ▼
Klik tombol "kirim" (submit)
       │
       ▼
Browser kirim data ke server
       │
       ├── GET  → data terlihat di URL (?name=Andika&email=...)
       └── POST → data tersembunyi di body HTTP
              │
              ▼
PHP terima data via $_POST atau $_GET
       │
       ▼
Validasi input
       │
       ├── name kosong?  → error "nama harus diisi"
       ├── email kosong? → error "email harus diisi"
       ├── email tidak valid? → error "email tidak valid"
       └── semua valid?  → tampilkan data
              │
              ▼
Tampilkan hasil ke browser
```

---

## BAGIAN 1: HTML Form

> Form adalah **wadah input** untuk mengirim data dari browser ke server.

---

### 1. Struktur Form

```html
<form action="index.php" method="post">
    <div>
        <label for="name">Name</label>
        <input type="text" name="name" id="name">
    </div>
    <div>
        <label for="email">Email</label>
        <input type="email" name="email" id="email">
    </div>
    <input type="submit" value="kirim">
</form>
```

| Komponen                | Penjelasan                              |
| :---------------------- | :-------------------------------------- |
| `<form>`                | Tag pembuka form                        |
| `action="index.php"`    | Data dikirim ke halaman ini             |
| `method="post"`         | Cara kirim data (POST)                  |
| `<input type="text">`   | Input teks biasa                        |
| `<input type="email">`  | Input email (otomatis validasi browser) |
| `<input type="submit">` | Tombol kirim                            |
| `name="name"`           | Nama variabel yang dikirim ke PHP       |
| `value="kirim"`         | Teks di tombol submit                   |

**Cara baca:** "Buat form yang dikirim ke `index.php` menggunakan metode POST."

---

### 2. Attribute Penting Form

#### action

```html
<form action="index.php">
```

| Komponen        | Penjelasan                              |
| :-------------- | :-------------------------------------- |
| `action`        | Halaman PHP yang menerima data form     |
| `"index.php"`   | Data dikirim ke halaman ini sendiri     |

**Cara baca:** "Kirim data ke `index.php`."

#### method

```html
<form method="post">
```

| Komponen    | Penjelasan                              |
| :---------- | :-------------------------------------- |
| `method`    | Cara mengirim data                      |
| `"post"`    | Data tersembunyi di body HTTP           |

---

### 3. Name Attribute — Kunci ke PHP

```html
<input type="text" name="name">
<input type="email" name="email">
```

| Komponen      | Penjelasan                              |
| :------------ | :-------------------------------------- |
| `name="name"` | Nama variabel → jadi `$_POST["name"]`   |
| `name="email"`| Nama variabel → jadi `$_POST["email"]`  |

**Koneksi HTML ke PHP:**

```
HTML                          PHP
────                          ───
<input name="name">    →     $_POST["name"]
<input name="email">   →     $_POST["email"]
```

> **Aturan penting:** `name=""` di HTML = `$_POST[""]` di PHP. **Harus sama!**

---

## BAGIAN 2: GET vs POST

> Ada **dua cara** mengirim data form ke server: **GET** dan **POST**.

---

### 1. Metode GET

```html
<form action="index.php" method="get">
```

**Data dikirim via URL:**

```
http://localhost:8000/form-handling/index.php?name=Andika&email=satuduatigapesawat%40gmail.com
                                        └────────────┬────────────┘
                                               parameter GET
```

| Fitur             | Penjelasan                              |
| :---------------- | :-------------------------------------- |
| Data terlihat     | **Ya** — terlihat di URL                |
| Keamanan          | **Rendah** — bisa dilihat orang lain    |
| Bookmark          | **Bisa** — URL bisa disimpan            |
| Cocok untuk       | Pencarian (search), filter              |

**Contoh penggunaan GET:**

```
search.php?query=php          → pencarian
products.php?category=phone   → filter produk
```

---

### 2. Metode POST

```html
<form action="index.php" method="post">
```

**Data dikirim via body HTTP:**

```
http://localhost:8000/form-handling/index.php
                                        └── URL bersih, tanpa parameter
```

| Fitur             | Penjelasan                              |
| :---------------- | :-------------------------------------- |
| Data terlihat     | **Tidak** — tersembunyi di body         |
| Keamanan          | **Lebih baik** — tidak terlihat di URL  |
| Bookmark          | **Tidak bisa** — URL tidak berubah      |
| Cocok untuk       | Data sensitif (password, KTP, email)    |

---

### 3. Perbandingan GET vs POST

| Fitur             | GET                         | POST                        |
| :---------------- | :-------------------------- | :-------------------------- |
| **Data terlihat** | Ya, di URL                  | Tidak, tersembunyi          |
| **Keamanan**      | Rendah                      | Lebih baik                  |
| **Bookmark**      | Bisa                        | Tidak bisa                  |
| **Ukuran data**   | Maks ~2000 karakter         | Tanpa batas                 |
| **Cocok untuk**   | Pencarian, filter           | Login, registrasi, upload   |
| **URL berubah?**  | Ya                          | Tidak                       |

**Contoh URL:**

```
GET:  index.php?name=Andika&email=abc@gmail.com  ← terlihat
POST: index.php                                   ← bersih
```

> **Analogi:**
> - **GET** seperti **membawa map terbuka** — semua orang bisa lihat isinya.
> - **POST** seperti **membawa map tertutup** — isinya tersembunyi.

---

## BAGIAN 3: Validasi Input

> Validasi memastikan data yang masuk **sudah benar** sebelum diproses.

---

### 1. Mengambil Data Form

```php
$name = $_POST["name"];
$email = $_POST["email"];
```

| Komponen           | Penjelasan                              |
| :----------------- | :-------------------------------------- |
| `$_POST["name"]`   | Ambil data dari input `name="name"`     |
| `$_POST["email"]`  | Ambil data dari input `name="email"`    |

**Cara baca:** "Ambil nilai dari input `name`, simpan di `$name`."

---

### 2. Validasi Kosong — `empty()`

```php
if(empty($_POST["name"])){
    echo "nama harus di isi <br>";
} else {
    echo $_POST["name"] . "<br>";
}
```

| Komponen              | Penjelasan                              |
| :-------------------- | :-------------------------------------- |
| `empty()`             | Cek apakah kosong, "", null, atau 0     |
| `$_POST["name"]`     | Data dari input name                    |
| `if(empty(...))`      | Jika kosong → tampilkan error           |
| `else`                | Jika tidak kosong → tampilkan nama      |

**Cara baca:** "Apakah `$_POST['name']` kosong? Kalau iya, error. Kalau tidak, tampilkan namanya."

**Apa yang dianggap `empty()`?**

| Nilai           | `empty()` | Penjelasan              |
| :-------------- | :-------- | :---------------------- |
| `""`            | `true`    | String kosong           |
| `null`          | `true`    | Null                    |
| `0`             | `true`    | Angka nol               |
| `"Andika"`      | `false`   | Ada isi                 |
| `123`           | `false`   | Ada isi                 |

---

### 3. Validasi Email — `filter_var()`

```php
if(empty($_POST["email"])){
    echo "email harus di isi <br>";
}
elseif(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
    echo "Email tidak valid";
}
else {
    echo $_POST["email"] . "<br>";
}
```

| Komponen                              | Penjelasan                          |
| :------------------------------------ | :---------------------------------- |
| `empty($_POST["email"])`             | Cek apakah kosong                   |
| `filter_var($email, FILTER_VALIDATE_EMAIL)` | Validasi format email      |
| `!filter_var(...)`                    | Balik nilai: `true` jika TIDAK valid |

**Cara baca:**

```
if (empty)                    → "Email kosong? Error."
elseif (!filter_var(...))     → "Email tidak valid? Error."
else                          → "Email valid, tampilkan."
```

**Contoh validasi email:**

```
"abc@gmail.com"     → valid ✅
"abc@gmail.co.id"   → valid ✅
"abc"               → tidak valid ❌
"abc@gmail"         → tidak valid ❌
"@gmail.com"        → tidak valid ❌
```

---

### 4. Alur Validasi Lengkap

```
Data masuk dari form
       │
       ▼
Cek name kosong?
       │
       ├── true  → error "nama harus diisi"
       │
       └── false → tampilkan nama
              │
              ▼
         Cek email kosong?
              │
              ├── true  → error "email harus diisi"
              │
              └── false → Cek format email valid?
                     │
                     ├── false → error "email tidak valid"
                     │
                     └── true  → tampilkan email
```

---

### 5. Kode Lengkap Validasi

```php
// Validasi Name
if(empty($_POST["name"])){
    echo "nama harus di isi <br>";
} else {
    echo $_POST["name"] . "<br>";
}

// Validasi Email (2 langkah)
if(empty($_POST["email"])){
    echo "email harus di isi <br>";
}
elseif(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
    echo "Email tidak valid";
}
else {
    echo $_POST["email"] . "<br>";
}
```

---

## Ringkasan

```
Form Handling PHP
│
├── HTML Form
│   ├── <form>        → wadah input
│   ├── action        → halaman tujuan
│   ├── method        → cara kirim (GET/POST)
│   └── name=""       → kunci ke PHP ($_POST["name"])
│
├── GET vs POST
│   ├── GET           → data di URL, cocok untuk search
│   └── POST          → data tersembunyi, cocok untuk sensitif
│
└── Validasi Input
    ├── empty()       → cek kosong/null/0
    ├── filter_var()  → cek format (email)
    └── if/elseif     → alur validasi berurutan
```
