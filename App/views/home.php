<div id="categoria" class="row row-custom">
		<?php
		if ($categorias):
				foreach ($categorias as $categoria):
						?>
						<div class="col-lg-4 col-md-6 col-sm-12 col-12" id="0"><a href=<?= 'categoria/'.$categoria['nome'] ?>>
										<div class="card card-custom shadow-sm">
												<div class="card-body card-body-custom">
														<div class="row row-custom">
																<div class="col-8 col-custom d-flex align-content-between flex-wrap">
																		<div class="row row-custom"><h2><?= $categoria['nome']?></h2></div>
																		<div class="row row-custom"><?= $categoria['correto'] ?> / <?= $categoria['total'] ?> Completado</div>
																</div>
																<div class="imagem col-4 col-custom d-flex justify-content-end align-items-center">
																		<img src=<?= './Views/img/'.$categoria['img'] ?>></div>
														</div>
												</div>
												<div class="col-12 barra-progressao">
														<div class="barra-progressao-feita" style="width: 100%;"><p>a</p></div>
												</div>
										</div>
								</a></div>
				<?php
				endforeach;
		endif;
		?>
</div>