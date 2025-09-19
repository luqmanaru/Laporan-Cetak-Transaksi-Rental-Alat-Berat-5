                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Laporan Transaksi</h1>
                        <a href="<?php echo site_url('admin/laporan_print_transaksi?dari='.date('Y-m-01').'&sampai='.date('Y-m-t')); ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" target="_blank"><i class="fas fa-print fa-sm text-white-50"></i> Cetak Laporan</a>
                    </div>

                    <!-- Filter Form -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Filter Laporan</h6>
                        </div>
                        <div class="card-body">
                            <?php echo form_open('admin/laporan_print_transaksi', array('method' => 'get', 'target' => '_blank')); ?>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="dari">Dari Tanggal</label>
                                        <?php echo form_input('dari', date('Y-m-01'), array('class' => 'form-control', 'id' => 'dari', 'type' => 'date')); ?>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="sampai">Sampai Tanggal</label>
                                        <?php echo form_input('sampai', date('Y-m-t'), array('class' => 'form-control', 'id' => 'sampai', 'type' => 'date')); ?>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>&nbsp;</label>
                                        <button type="submit" class="btn btn-primary btn-block">Tampilkan</button>
                                    </div>
                                </div>
                            </div>
                            <?php echo form_close(); ?>
                        </div>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tabel Laporan Transaksi</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Tanggal</th>
                                            <th>Customer</th>
                                            <th>Alat Berat</th>
                                            <th>Tanggal Sewa</th>
                                            <th>Tanggal Kembali</th>
                                            <th>Total Bayar</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        // Default ke bulan ini jika tidak ada filter
                                        $dari = date('Y-m-01');
                                        $sampai = date('Y-m-t');
                                        
                                        // Ambil data transaksi berdasarkan filter
                                        $transaksi = $this->Ab_rental->get_laporan_transaksi($dari, $sampai);
                                        
                                        foreach ($transaksi as $t): 
                                        ?>
                                        <tr>
                                            <td><?php echo $t->id_transaksi; ?></td>
                                            <td><?php echo date('d-m-Y', strtotime($t->tanggal_sewa)); ?></td>
                                            <td><?php echo $t->nama_customer; ?></td>
                                            <td><?php echo $t->nama_alat; ?></td>
                                            <td><?php echo date('d-m-Y', strtotime($t->tanggal_sewa)); ?></td>
                                            <td><?php echo date('d-m-Y', strtotime($t->tanggal_kembali)); ?></td>
                                            <td><?php echo "Rp " . number_format($t->total_bayar, 0, ',', '.'); ?></td>
                                            <td>
                                                <?php 
                                                if ($t->status == 'proses') {
                                                    echo '<span class="badge badge-warning">Proses</span>';
                                                } elseif ($t->status == 'selesai') {
                                                    echo '<span class="badge badge-success">Selesai</span>';
                                                } else {
                                                    echo '<span class="badge badge-danger">Batal</span>';
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="6" class="text-right">Total Pendapatan:</th>
                                            <th><?php echo "Rp " . number_format($this->Ab_rental->get_total_pendapatan($dari, $sampai), 0, ',', '.'); ?></th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
