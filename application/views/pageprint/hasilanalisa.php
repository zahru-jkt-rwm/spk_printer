

<div class="box-body mdl-cell--12-col">

    <h3 class="mdl-cell mdl-cell--12-col">Data Siswa SMK Taruna Bhakti </h3>
   
    <div class="mdl-cell--12-col panel panel-default ">
        <div class="panel-body">
         
            <table width="85%"  class="table table-condensed" >
                <thead>

                    <tr>   
                        <th data-field="name">ID Siswa</th>
                        <th data-field="name">No Ujian</th>                      
                    </tr>    
                </thead>
                <tbody>
                    <?php
                    foreach ($data_tbsiswa as $dt) {
                        ?>
                        <tr><td><?php echo $dt->id_kerusakan; ?></td>
                            <td><?php echo $dt->kerusakan; ?></td>
                        </tr>
                    <?php } ?> 
                </tbody>
            </table>
        </div>
    </div>
</div>  



