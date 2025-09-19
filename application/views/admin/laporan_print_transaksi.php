<!DOCTYPE html>
<html>
<head>
    <title>Laporan Transaksi Rental Alat Berat</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h1 {
            margin: 0;
            font-size: 18px;
        }
        .header p {
            margin: 5px 0;
        }
        .info {
            margin-bottom: 20px;
        }
        .info p {
            margin: 5px 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #000;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .text-right {
            text-align: right;
        }
        .text-center {
            text-align: center;
        }
        .footer {
            margin-top: 30px;
            text-align: right;
        }
        @media print {
            .no-print {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>LAPORAN TRANSAKSI RENTAL ALAT BERAT</h1>
        <p>Jl. Contoh No. 123, Jakarta</p>
        <p>Telp: (021) 12345678</p>
    </div>
    
    <div class="info">
        <p><strong>Periode:</strong> <?php echo date('d-m-Y', strtotime($dari)); ?> s/d <?php echo date('d-m-Y', strtotime($sampai)); ?></p>
        <p><strong>Tanggal Cetak:</strong> <?php echo date('d-m-Y H:i:s'); ?></p>
    </div>
    
    <table>
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="10%">ID</th>
                <th width="15%">Tanggal</th>
                <th width="20%">Customer</th>
                <th width="20%">Alat Berat</th>
                <th width="10%">Tgl. Sewa</th>
                <th width="10%">Tgl. Kembali</th>
                <th width="10%">Total Bayar</th>
                <th width="10%">Status</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($transaksi as $t): ?>
            <tr>
                <td class="text-center"><?php echo $no++; ?></td>
                <td><?php echo $t->id_transaksi; ?></td>
                <td><?php echo date('d-m-Y', strtotime($t->tanggal_sewa)); ?></td>
                <td><?php echo $t->nama_customer; ?></td>
                <td><?php echo $t->nama_alat; ?></td>
                <td><?php echo date('d-m-Y', strtotime($t->tanggal_sewa)); ?></td>
                <td><?php echo date('d-m-Y', strtotime($t->tanggal_kembali)); ?></td>
                <td class="text-right"><?php echo "Rp " . number_format($t->total_bayar, 0, ',', '.'); ?></td>
                <td class="text-center">
                    <?php 
                    if ($t->status == 'proses') {
                        echo 'Proses';
                    } elseif ($t->status == 'selesai') {
                        echo 'Selesai';
                    } else {
                        echo 'Batal';
                    }
                    ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="7" class="text-right"><strong>Total Pendapatan:</strong></td>
                <td class="text-right"><strong><?php echo "Rp " . number_format($total_pendapatan, 0, ',', '.'); ?></strong></td>
                <td></td>
            </tr>
        </tfoot>
    </table>
    
    <div class="footer">
        <p>Mengetahui,</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>_________________________</p>
        <p>Manager</p>
    </div>
    
    <div class="no-print" style="margin-top: 20px; text-align: center;">
        <button onclick="window.print()">Cetak</button>
        <button onclick="window.close()">Tutup</button>
    </div>
</body>
</html>
