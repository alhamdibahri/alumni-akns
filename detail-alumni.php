<div class="modal fade" id="exampleModalCenter<?php echo $dataAlumni['kode_alumni'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalCenterTitle"><i class="fa fa-graduation-cap"></i> Detail Alumni</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
                $query = mysqli_query($connect, "SELECT * FROM login l , data_alumni a WHERE l.kodeuser=a.kodeuser AND a.kode_alumni='" . $dataAlumni['kode_alumni'] . "'");
                //echo $queryAlumni;
                while ($data = mysqli_fetch_array($query)) { ?>
                    <table style="font-size:12px;" width="100%" cellspacing="0" cellpadding="0">
                        <tr width="15%">
                            <td rowspan="8"><img class="rounded" width="150" height="150" src="pages/admin/upload/<?php echo $data['gambar'] ?>" alt=""></td>
                        </tr>
                        <tr>
                            <td>Nama Lengkap</td>
                            <td width="10">:</td>
                            <td><?php echo $data['nama_lengkap'] ?></td>
                        </tr>
                        <tr>
                            <td>Tempat, Tanggal Lahir</td>
                            <td>:</td>
                            <td><?php echo $data['tempat_lahir'] . ', ' . TanggalIndo($data['tanggal_lahir']) ?></td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td>:</td>
                            <td><?php echo jk($data['jenis_kelamin']) ?></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>:</td>
                            <td><?php echo $data['alamat'] ?></td>
                        </tr>
                        <tr>
                            <td>Tahun Angkatan</td>
                            <td>:</td>
                            <td><?php echo $data['tahun_angkatan'] ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Lulus</td>
                            <td>:</td>
                            <td><?php echo TanggalIndo($data['tahun_lulusan']) ?></td>
                        </tr>
                        <tr>
                            <td>Jurusan</td>
                            <td>:</td>
                            <td><?php echo $data['jurusan'] ?></td>
                        </tr>
                    </table>
                <?php }
            ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>