		<?php include 'header.php'; ?>
		
		<div class="page-content">
			<div class="row">
				<div class="col-xs-12">
					<!-- PAGE CONTENT BEGINS -->

					<div class="hr hr-18 hr-double dotted"></div>

					<div class="widget-box">
						<div class="widget-header widget-header-blue widget-header-flat">
							<h4 class="widget-title lighter">Arima Komunika</h4>
						</div>

						<div class="widget-body">
							<div class="widget-main">
								<div id="fuelux-wizard-container">
									<div>
										<ul class="steps">
											<li data-step="1" class="active">
												<span class="step">1</span>
												<span class="title">Pilih Provider</span>
											</li>

											<li data-step="2">
												<span class="step">2</span>
												<span class="title">Pilih Nominal</span>
											</li>

											<li data-step="3">
												<span class="step">3</span>
												<span class="title">Masukan Nomor</span>
											</li>

											<li data-step="4">
												<span class="step">4</span>
												<span class="title">Konfirmasi</span>
											</li>
										</ul>
									</div>

									<hr />

									<div class="step-content pos-rel">
										<div class="step-pane active center" data-step="1">
											<button class="btn-provider"><img src="image/tel.png" style="width: 100%; height: 100%; display: block;"></button>

											<button class="btn-provider"><img src="image/indo.png" style="width: 100%; height: 100%; display: block;"></button>

											<button class="btn-provider"><img src="image/xl.png" style="width: 100%; height: 100%; display: block;"></button>

											<button class="btn-provider"><img src="image/3.png" style="width: 100%; height: 100%; display: block;"></button>
										</div>

										<div class="step-pane center" data-step="2">
											<div>
												<button class="btn-nominal">5.000</button>

						<button class="btn-nominal">10.000</button>

							<button class="btn-nominal">20.000</button>
											</div>
										</div>

										<div class="step-pane center" data-step="3">
											<div>
												<form name="pulsa">	

						  		<div class="row">
				  			<div class="col-xs-12" >
			  				<input type="text" name="nomor"  id="nomor" class="input-nomor" readonly>
			  			  </div>
			  		    </div>

						  		<div class="space-12"></div>

						  		

				  			<div class="row" >
				  				<div class="col-xs-12">

				  				

				  					<tr></tr>

				  					<input type="button" value="1" onclick="pulsa.nomor.value += 1" class="btn-nominal"> 

				  						<input type="button" value="2" onclick="pulsa.nomor.value += 2" class="btn-nominal"> 

			  							<input type="button" value="3" onclick="pulsa.nomor.value += 3" class="btn-nominal"> 

			  								<input type="button" value="4" onclick="pulsa.nomor.value += 4" class="btn-nominal"> 

			  									<input type="button" value="5" onclick="pulsa.nomor.value += 5" class="btn-nominal"> 

	  										<input type="button" value="6" onclick="pulsa.nomor.value += 6" class="btn-nominal"> 

  											<input type="button" value="7" onclick="pulsa.nomor.value += 7" class="btn-nominal"> 

											<input type="button" value="8" onclick="pulsa.nomor.value += 8" class="btn-nominal"> 

												<input type="button" value="9" onclick="pulsa.nomor.value += 9" class="btn-nominal"> 

												<input type="button" value="0" onclick="pulsa.nomor.value += 0" class="btn-nominal"> 

												<input type="button" value="ENTER" onclick="pulsa.nomor.value += ENTER" class="btn-nominal">

													<input type="button" value="C" onclick="pulsa.nomor.value = ''" class="btn-nominal">	
				  				</div>
				  			</div>
				  			</form>
											</div>
										</div>

										<div class="step-pane" data-step="4">
											<div class="center">
												<h3 class="green">Konfirmasi!</h3>
												Your product is ready to ship! Click finish to continue!
											</div>
										</div>
									</div>
								</div>

								<hr />
								<div class="wizard-actions">
									<button class="btn btn-prev">
										<i class="ace-icon fa fa-arrow-left"></i>
										Sebelumnya
									</button>

									<button class="btn btn-success btn-next" data-last="Finish">
										Selanjutnya
										<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
									</button>
								</div>
							</div><!-- /.widget-main -->
						</div><!-- /.widget-body -->
					</div>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.page-content -->
		
		<?php include 'footer.php'; ?>