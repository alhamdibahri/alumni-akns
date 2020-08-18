<div class="data-table-area mg-b-15" style="margin-top:80px;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline13-list">
                    <div class="sparkline13-hd">
                        <div class="main-sparkline13-hd">
                            <h1><i class="fa fa-database"></i> Data <span class="table-project-n">user</span></h1>
                        </div>
                    </div>
                    <a href="page-form-category.php?req=add" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah</a>
                    <div class="sparkline13-graph">
                        <div class="datatable-dashv1-list custom-datatable-overright">
                            <table id="table" data-toggle="table" data-pagination="true" data-search="true">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Id Category</th>
                                        <th>Nama Category</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = mysqli_query($connect, "SELECT * FROM post_type");
                                    $no = 1;
                                    while ($data = mysqli_fetch_array($sql)) {
                                        ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $data['id_type'] ?></td>
                                            <td><?php echo $data['type_post'] ?></td>
                                            <td>
                                                <center>
                                                    <a href="page-form-category.php?req=edit&id_type=<?php echo $data['id_type'] ?>" class="btn btn-default"><i class="fa fa-edit"></i></a>
                                                    <a href="action-category.php?action=dell&id_type=<?php echo $data['id_type'] ?>" class="btn btn-default" onclick="return confirm('yakin ingin menghapus data?');"><i class="fa fa-trash"></i></a>
                                                </center>
                                            </td>
                                        </tr>
                                        <?php $no++;
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>