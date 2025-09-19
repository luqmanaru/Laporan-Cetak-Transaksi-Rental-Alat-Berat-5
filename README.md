# Laporan-Cetak-Transaksi-Rental-Alat-Berat-5

![CodeIgniter](https://img.shields.io/badge/CodeIgniter-3.x-orange.svg)
![PHP](https://img.shields.io/badge/PHP-7.x-blue.svg)
![MySQL](https://img.shields.io/badge/MySQL-5.x-green.svg)
![Bootstrap](https://img.shields.io/badge/Bootstrap-4.x-purple.svg)

Aplikasi laporan transaksi untuk sistem rental alat berat dengan fitur filter periode dan cetak laporan yang dibangun menggunakan framework CodeIgniter.

## Fitur

- Filter laporan berdasarkan periode tanggal
- Tampilan laporan transaksi dalam bentuk tabel
- Total pendapatan per periode
- Cetak laporan dengan format yang rapi
- Desain laporan yang siap untuk dicetak
- Notifikasi status transaksi dengan badge berwarna
- Template admin yang responsif dan modern
- Sidebar navigasi yang terstruktur

## Struktur Direktori
<img width="285" height="334" alt="image" src="https://github.com/user-attachments/assets/6d4dda97-e807-4746-a766-a77a8f781fcd" />


## Struktur Database

Tabel: `transaksi`

| Kolom | Tipe | Keterangan |
|-------|------|------------|
| id_transaksi | INT(11) | Primary Key, Auto Increment |
| id_customer | INT(11) | Foreign Key ke customer.id_customer |
| id_alat | INT(11) | Foreign Key ke alat_berat.id_alat |
| id_admin | INT(11) | Foreign Key ke admin.id_admin |
| tanggal_sewa | DATE | Tanggal mulai sewa |
| tanggal_kembali | DATE | Tanggal selesai sewa |
| total_bayar | DECIMAL(10,2) | Total pembayaran |
| status | ENUM('proses', 'selesai', 'batal') | Status transaksi |
| tanggal_pengembalian | DATE | Tanggal pengembalian aktual |
| denda | DECIMAL(10,2) | Denda jika terlambat |

## Screenshot Aplikasi
- Laporan Transaksi
<img width="827" height="440" alt="image" src="https://github.com/user-attachments/assets/e0cf08fd-36bd-41ff-890d-72512330c3ed" />
<img width="827" height="440" alt="image" src="https://github.com/user-attachments/assets/051fda6f-bdd7-4fdc-9e0e-d06c8cb2de25" />

- Print Laporan Transaksi
<img width="827" height="440" alt="image" src="https://github.com/user-attachments/assets/2ec973ae-1659-4134-959a-c38e866caa64" />
<img width="827" height="440" alt="image" src="https://github.com/user-attachments/assets/f8c3838b-14aa-4c81-8dbc-5c6bfca5d3e3" />

---
**luqmanaru**

Ini adalah proyek pengembangan web lanjut untuk memenuhi tugas kuliah Pemrograman Web Lanjut
