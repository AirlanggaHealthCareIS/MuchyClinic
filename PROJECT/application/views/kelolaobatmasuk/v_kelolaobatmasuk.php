<div class="" style="">
	<h1 >Detail Kelola Obat Masuk</h1>
	<br>
	<div class = "row">
		<div class = "col-md-6">	
			<form class ="form-inline"  action="<?php echo base_url(); ?>kelolaobatmasuk/index2" method="post">
				<div class="form-group">
					
					<label for="ID Obat Masuk" class="col-sm-5 control-label">ID Obat Masuk</label>
	                    <div class="col-sm-7">
	                      <div class="row">
	                        <div class="col-sm-11">
	                          <input name="idobatmasuk" type="normal" class="form-control" id="idobatmasuk" placeholder="ID Obat Masuk" value="<?php echo $idobatmasuk ?>">    
	                        </div>
	                      </div>
	                    </div>

					<br>
					<br>

					<label for="ID Supplier" class="col-sm-5 control-label">ID Supplier</label>
	                    <div class="col-sm-7">
	                      <div class="row">
	                        <div class="col-sm-11">
	                          <input name="idsupplier" type="normal" class="form-control" id="IDSupplier" placeholder="ID Supplier" value="<?php echo $idsupplier ?>">    
	                        </div>
	                      </div>
	                    </div>

	                 <br>
	                 <br>

					<label for="ID Detail Obat Masuk" class="col-sm-5 control-label">ID Detail Obat Masuk</label>
	                    <div class="col-sm-7">
	                      <div class="row">
	                        <div class="col-sm-10">
	                          <input name="iddetailobatmasuk" type="normal" class="form-control" id="IDDetailObatMasuk" placeholder="ID Detail Obat Masuk" value="<?php echo $iddobatmasuk ?>">    
	                        </div>
	                      </div>
	                    </div>
	            </form>

                    <br>
                    <br>
                    <br>
                    <br>
		             
		        <form action="<?php echo base_url(); ?>kelolaobatmasuk/cariObatDetail/<?php echo $idobatmasuk.'/'.$iddobatmasuk.'/'.$idsupplier ?>" method ="post">	
		            <div class="form-group">
                	
	                    <label for="ID Aktor" class="col-sm-3 control-label">Nama Obat</label>
	                    <div class="col-sm-9">
	                      <div class="row">
	                        <div class="col-sm-10">
	                          <input name="namaobat" type="normal" class="form-control" id="NamaObat" placeholder="Nama Obat">    
	                        </div>
	                        <div class="col-sm-2">
	                          <button type="submit" class="btn btn-default">Search</button>      
	                        </div>
	                      </div>
	                    </div>
	              </div>
	           </form>				
			
			</form>	
		</div>
	</div>
</div>

	<br>
	<br>
	<br>

<div class = "row">
	<div class = "col-md-6">
		
          <div>
          	<table class="table table-bordered">
              
                <tr>
                  <td class="info">ID Obat</td>
                  <td class="info">ID Supplier</td>
                  <td class="info">Nama Obat</td>
                  <td class="info">Pilih</td>
                </tr>

                <?php if($cariobat!=null): ?>
                <?php foreach($cariobat->result() as $row) { ?>
                  <tr>
                    <td class="active idobat"><?php echo $row->ID_OBAT ?></td>
                    <td class="active"><?php echo $row->ID_SUPPLIER?></td>
                    <td class="active namaobat"><?php echo $row->NAMA_OBAT ?></td>
                    <td class="active">
                    	<button data-idobat="<?php echo $row->ID_OBAT ?>" data-namaobat="<?php echo $row->NAMA_OBAT ?>" class="btn btn-primary pilih">Pilih</button></td>
                    
                  </tr>
                 <?php } ?>
                 <?php endif ?>

              </table>
          </div>
    </div>


		    <div class = "col-md-6">

		    	<form action="<?php echo base_url(); ?>kelolaobatmasuk/inputObatDetail<?php echo $this->url; ?>" method="post">

			    	<div class="form-group">
	                	
			    			<label for="ID Aktor" class="col-sm-3 control-label">ID Obat</label>
		                    <div class="col-sm-9">
		                      <div class="row">
		                        <div class="col-sm-10">
		                          <input name="idobatbaru" type="normal" class="form-control" id="idobatx" placeholder="Id Obat">    
		                        </div>
		                      </div>
		                    </div>

		                    <br>
		                    <br>

		                    <label for="ID Aktor" class="col-sm-3 control-label">Nama Obat</label>
		                    <div class="col-sm-9">
		                      <div class="row">
		                        <div class="col-sm-10">
		                          <input name="namaobatbaru" type="normal" class="form-control" id="namaobatx" placeholder="Nama Obat">    
		                        </div>
		                      </div>
		                    </div>

		                    <br>
		                    <br>

		                    <label for="ID Aktor" class="col-sm-3 control-label">Jumlah Stok</label>
		                    <div class="col-sm-9">
		                      <div class="row">
		                        <div class="col-sm-10">
		                          <input name="jumlahstok" type="normal" class="form-control" id="jumlahstok" placeholder="Jumlah Stok">    
		                        </div>
		                      </div>
		                    </div>

		                    <br>
		                    <br>

		                    <div class="col-sm-2 col-sm-offset-8">
		                        <button type="submit" class="btn btn-default">Submit</button>      
		                    </div>

		                    <br>
		                    <br>
		                    <br>
		              </div>
	              </form>
		    </div>

		    <br>
		    <br>

		    <div class="form-group">
		    	<div>
		          	<table class="table table-bordered">
		              
		                <tr>
		                  <td class="info">ID Obat Masuk</td>
		                  <td class="info">ID Detail Obat Masuk</td>
		                  <td class="info">ID Obat</td>
		                  <td class="info">Nama Obat Obat</td>
		                  <td class="info">Quantity</td>
		                  <td class="info">Edit</td>
		                  <td class="info">Delete</td>
		                </tr>

		                <?php if($detailobat!=null): ?>
		                <?php foreach($detailobat->result() as $row) { ?>
		                  <tr>
		                    <td class="active"><?php echo $row->ID_DETAIL_OBAT_MASUK ?></td>
		                    <td class="active"><?php echo $row->ID_OBAT?></td>
		                    <td class="active"><?php echo $row->ID_OBAT_MASUK?></td>
		                    <td class="active"><?php echo $row->QTY_OBAT_MASUK?></td>
		                    <td class="active"><?php echo $row->NAMA_OBAT ?></td>
		                    <td class="active">
		                      <a href="<?php echo base_url() ?>/kelolaobatmasuk/editDetailObat/<?php echo $row->ID_DETAIL_OBAT_MASUK ?>" class="btn btn-primary">Edit</a><?php ?></td>
		                    </td>
		                    <td class="active">
		                      <a href="<?php echo base_url() ?>/kelolaobatmasuk/hapusdetailObat/<?php echo $row->ID_DETAIL_OBAT_MASUK ?>" class="btn btn-primary">Delete</a><?php ?></td>
		                    </td>
		                    
		                  </tr>
		                 <?php } ?>
		             <?php endif ?>
		                  

		              </table>

          		</div>
		    </div>



	    
	</div>