<div class="well"><div id="container2" style="min-width: 310px; height: 400px; margin: 0 auto"></div></div>
		<div class="row">
		  <div class="col-xs-12 col-sm-12 col-md-4">
		  <div class="well">
		  	<div class="page-header">
			  <h3>Nilai Preferensi</h3>
			</div>
			    <ol>
			    	<?php
					while ($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)){
					?>
				  	<li><?php echo $row3['absensi'] ?> (<?php echo $row3['total'] ?>)</li>
				  	<?php
					}
				  	?>
				</ol>
			  </div>
		  </div>
		  <div class="col-xs-12 col-sm-12 col-md-4">
		  <div class="well">
		  	<div class="page-header">
			  <h3>Kriteria-Kriteria</h3>
			</div>
			    <ol class="list-unstyled">
			    	<?php
					while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)){
					?>
				  	<li>(<?php echo $row2['nuptk'] ?>) <?php echo $row2['namalengkap'] ?></li>
				  	<?php
					}
				  	?>
				</ol>
			</div>
		  </div>

		</div>
		<script src="assets/js/jquery-1.11.3.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/highcharts.js"></script>
	<script src="assets/js/exporting.js"></script>
	<script>
	var chart1; // globally available
	$(document).ready(function() {
	      chart1 = new Highcharts.Chart({
	         chart: {
	            renderTo: 'container2',
	            type: 'column'
	         },
	         title: {
	            text: 'Grafik Perangkingan '
	         },
	         xAxis: {
	            categories: ['Rangking']
	         },
	         yAxis: {
	            title: {
	               text: 'Jumlah Nilai'
	            }
	         },
	              series:
	            [
	            <?php
	            while ($row4 = $stmt4->fetch(PDO::FETCH_ASSOC)){
	                  ?>
	                 //data yang diambil dari database dimasukan ke variable nama dan data
	                 //
	                  {
	                      name: '<?php echo $row4['nama'] ?>',
	                      data: [<?php echo $row4['total'] ?>]
	                  },
	                  <?php } ?>
	            ]
	      });
	   });
	   </script>