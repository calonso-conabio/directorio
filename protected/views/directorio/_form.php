<?php
/* @var $this DirectorioController */
/* @var $model Directorio */
/* @var $form CActiveForm */
?>

<div class="form">

	<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'directorio-form',
			'enableAjaxValidation'=>false,
			'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

	<p class="note">
		Campos con <span class="required">*</span> son necesarios. <br> Campos
		con <span style="color: #FFA500;">*</span> se necesita al menos un
		campo.
	</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<table id="casetas">
			<tr>
				<td width="20%"><?php echo $form->labelEx($model,'es_internacional', array('id'=>'etiqueta')); ?>
					<?php echo $form->checkBox($model,'es_internacional'); ?> <?php echo $form->error($model,'es_internacional'); ?>
				</td>
				<td width="20%"><?php echo $form->labelEx($model,'es_institucion', array('id'=>'etiqueta')); ?>
					<?php echo $form->checkBox($model,'es_institucion'); ?> <?php echo $form->error($model,'es_institucion'); ?>
				</td>
				<td width="20%"><label id="etiqueta">¿Tiene datos de medios?</label>
					<input type="checkbox" name="caja_medios" id="caja_medios">
				</td>
				<td width="20%"><label id="etiqueta">¿Tiene datos de centro
						documental?</label> <input type="checkbox" name="caja_documental"
					id="caja_documental">
				</td>
			</tr>
			<tr>
				<td width="20%"><label id="etiqueta">¿Tiene domicilio?</label> <input
					type="checkbox" name="caja_domicilio" id="caja_domicilio">
				</td>
				<td width="20%"><label id="etiqueta">¿Tiene domicilio alternativo?</label>
					<input type="checkbox" name="caja_otro_domicilio"
					id="caja_otro_domicilio">
				</td>
				<td width="20%"><label id="etiqueta">¿Tiene asistente?</label> <input
					type="checkbox" name="caja_asistente" id="caja_asistente">
				</td>
				<td width="20%"><?php echo $form->labelEx($model,'domicilio_alt_principal', array('id'=>'etiqueta')); ?>
					<?php echo $form->checkBox($model,'domicilio_alt_principal'); ?> <?php echo $form->error($model,'domicilio_alt_principal'); ?>
				</td>
			</tr>
		</table>
	</div>

	<table>
		<tr>
			<td><div id="enlace_principal" style="display: none"
					class="color_enlace">
					<span>Datos Principales &raquo;</span>
				</div></td>
			<td><div id="enlace_domicilio" style="display: none"
					class="color_enlace">
					<span>Domicilio &raquo;</span>
				</div></td>
			<td><div id="enlace_otro_domicilio" style="display: none"
					class="color_enlace">
					<span>Domicilio alternativo &raquo;</span>
				</div></td>
			<td><div id="enlace_medios" style="display: none"
					class="color_enlace">
					<span>Medios &raquo;</span>
				</div></td>
			<td><div id="enlace_documental" style="display: none"
					class="color_enlace">
					<span>Centro documental &raquo;</span>
				</div></td>
			<td><div id="enlace_foto" style="display: none" class="color_enlace">
					<span>Foto &raquo;</span>
				</div></td>
			<td><div id="enlace_asistente" style="display: none"
					class="color_enlace">
					<span>Asistente &raquo;</span>
				</div></td>
		</tr>
	</table>

	<?php if (!$model->isNewRecord) { ?>

	<div class="row" style="display: none;">
		<?php echo $form->labelEx($model,'id'); ?>
		<?php echo $form->textField($model,'id',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'id'); ?>
	</div>

	<?php } ?>

	<div class="row" align="justify">
		<?php echo $form->labelEx($model_f,'nombre'); ?>
		<?php echo $form->fileField($model_f, 'nombre'); ?>
		<?php echo $form->error($model_f,'nombre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nombre', array('id'=>'etiqueta')); ?>
		<span class="required" id="datos_nombre">*</span><br>
		<?php echo $form->textField($model,'nombre',array('size'=>60,'maxlength'=>255, 'id'=>'nombre')); ?>
		<?php echo $form->error($model,'nombre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'apellido', array('id'=>'etiqueta')); ?>
		<span class="required" id="datos_apellido">*</span><br>
		<?php echo $form->textField($model,'apellido',array('size'=>60,'maxlength'=>255, 'id'=>'apellido')); ?>
		<?php echo $form->error($model,'apellido'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'institucion', array('id'=>'etiqueta')); ?>
		<span class="required" id="datos_institucion" style="display: none;">*</span><br>
		<?php echo $form->textField($model,'institucion',array('size'=>60,'maxlength'=>255, 'id'=>'institucion')); ?>
		<?php echo $form->error($model,'institucion'); ?>
	</div>

	<?php if ($model->isNewRecord) { ?>

	<div class="row">
		<?php echo $form->labelEx($model_nuevo_td,'tipo_id'); ?>
		<?php echo $form->dropDownList($model_nuevo_td, 'tipo_id', CHtml::listData(Tipo::model()->findAll(array('order'=>'nombre ASC')), 'id', 'nombre'), 
				array('options'=>array(1=>array('selected'=>'selected')),
				)); ?>
		<?php echo $form->error($model_nuevo_td,'tipo_id'); ?>
	</div>

	<?php } else {
		$num_tipos=count($model_td);

		if ($num_tipos == 1)
				{ ?>

	<div class="row">
		<?php echo $form->labelEx($model_td[0],'[1]tipo_id'); ?>
		<?php echo $form->dropDownList($model_td[0], '[1]tipo_id', CHtml::listData(Tipo::model()->findAll(array('order'=>'nombre ASC')), 'id', 'nombre')); ?>
		<?php echo $form->error($model_td[0],'[1]tipo_id'); ?>
	</div>

	<?php 
	if ($model_td[0]->tipo_id != 1)
	{
		?>
	<div class="row">
		<?php echo CHtml::label('¿Deseas añadir otro tipo de clasificación?',''); ?>
		<?php echo $form->dropDownList($model_nuevo_td, 'tipo_id',  CHtml::listData(Tipo::model()->findAll(array('order'=>'nombre ASC')), 'id', 'nombre'), 
				array('options'=>array(1=>array('selected'=>'selected')),
							)); ?>
		<?php echo $form->error($model_nuevo_td,'tipo_id'); ?>
	</div>
	<?php 
	}
				} else {

					$orden="id>1 ORDER BY nombre ASC";
					$criteria = new CDbCriteria;
					$criteria->condition=$orden;

					for ($i=0;$i<$num_tipos;$i++)
					{
						if ($i == 0) {
							echo $form->labelEx($model_td[$i],'['.($i+1).']tipo_id');
						}
						?>

	<div class="row">
		<?php //echo $form->labelEx($model_td[$i],'['.($i+1).']tipo_id'); ?>
		<?php echo $form->dropDownList($model_td[$i],'['.($i+1).']tipo_id', CHtml::listData(Tipo::model()->findAll($criteria), 'id', 'nombre')); ?>
		<?php echo $form->error($model_td[$i],'['.($i+1).']tipo_id'); ?>
	</div>

	<?php				
					}
					?>

	<div class="row">
		<?php echo CHtml::label('¿Deseas añadir otro tipo de clasificación?',''); ?>
		<?php echo $form->dropDownList($model_nuevo_td, 'tipo_id',  CHtml::listData(Tipo::model()->findAll(array('order'=>'nombre ASC')), 'id', 'nombre'), 
				array('options'=>array(1=>array('selected'=>'selected')),
							)); ?>
		<?php echo $form->error($model_nuevo_td,'tipo_id'); ?>
	</div>

	<?php 					
				}
	}
	?>

	<div class="row">
		<?php echo $form->labelEx($model,'sector_id'); ?>
		<?php echo $form->dropDownList($model, 'sector_id',  CHtml::listData(Sector::model()->findAll(array('order'=>'nombre ASC')), 'id', 'nombre'), 
				array('empty'=>'---Selecciona el tipo de sector---', 'id'=>'sector'
				)); ?>
		<?php echo $form->error($model,'sector_id'); ?>
	</div>

	<div id="datos_principal">
		<div class="row">
			<?php echo $form->labelEx($model,'correo', array('id'=>'etiqueta')); ?>
			<span style="color: #FFA500;">*</span><br>
			<?php echo $form->textField($model,'correo',array('size'=>60,'maxlength'=>255)); ?>

			<div id="datos_correo_repetido" style="display: none">
				Ese correo ya existe en la base.
				<?php echo CHtml::link('Ver','', array('id'=>'enlace_correo_repetido', 'target'=>'blank')); ?>
			</div>

			<?php echo $form->error($model,'correo'); ?>
		</div>

		<div id="enlace_correos" class="color_enlace">
			<span>+ correos &raquo;</span>
		</div>

		<div id="datos_correos" style="display: none">
			<div class="row">
				<?php echo $form->labelEx($model,'correo_alternativo', array('id'=>'etiqueta')); ?>
				<span style="color: #FFA500;">*</span><br>
				<?php echo $form->textField($model,'correo_alternativo',array('size'=>60,'maxlength'=>255)); ?>

				<div id="datos_correo_alternativo_repetido" style="display: none">
					Ese correo ya existe en la base.
					<?php echo CHtml::link('Ver','', array('id'=>'enlace_correo_alternativo_repetido', 'target'=>'blank')); ?>
				</div>

				<?php echo $form->error($model,'correo_alternativo'); ?>
			</div>

			<div class="row">
				<?php echo $form->labelEx($model,'correos', array('id'=>'etiqueta')); ?>
				<span style="color: #FFA500;">*</span><br>
				<?php echo $form->textArea($model,'correos',array('rows'=>6, 'cols'=>50)); ?>
				<?php echo $form->error($model,'correos'); ?>
			</div>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'telefono_particular', array('id'=>'etiqueta')); ?>
			<span style="color: #FFA500;">*</span><br>
			<?php echo $form->textField($model,'telefono_particular',array('size'=>60,'maxlength'=>255)); ?>
			<?php echo $form->error($model,'telefono_particular'); ?>
		</div>

		<div id="enlace_telefonos" class="color_enlace">
			<span>+ telefónos &raquo;</span>
		</div>

		<div id="datos_telefonos" style="display: none">
			<div class="row">
				<?php echo $form->labelEx($model,'telefono_oficina', array('id'=>'etiqueta')); ?>
				<span style="color: #FFA500;">*</span><br>
				<?php echo $form->textField($model,'telefono_oficina',array('size'=>60,'maxlength'=>255)); ?>
				<?php echo $form->error($model,'telefono_oficina'); ?>
			</div>

			<div class="row">
				<?php echo $form->labelEx($model,'telefono_casa', array('id'=>'etiqueta')); ?>
				<span style="color: #FFA500;">*</span><br>
				<?php echo $form->textField($model,'telefono_casa',array('size'=>60,'maxlength'=>255)); ?>
				<?php echo $form->error($model,'telefono_casa'); ?>
			</div>

			<div class="row">
				<?php echo $form->labelEx($model,'telefonos', array('id'=>'etiqueta')); ?>
				<span style="color: #FFA500;">*</span><br>
				<?php echo $form->textArea($model,'telefonos',array('rows'=>6, 'cols'=>50)); ?>
				<?php echo $form->error($model,'telefonos'); ?>
			</div>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'puesto'); ?>
			<?php echo $form->textField($model,'puesto',array('size'=>60,'maxlength'=>255)); ?>
			<?php echo $form->error($model,'puesto'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'adscripcion'); ?>
			<?php echo $form->textField($model,'adscripcion',array('size'=>60,'maxlength'=>255)); ?>
			<?php echo $form->error($model,'adscripcion'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'pagina'); ?>
			<?php echo $form->textField($model,'pagina',array('size'=>60,'maxlength'=>255)); ?>
			<?php echo $form->error($model,'pagina'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'red_social'); ?>
			<?php echo $form->textField($model,'red_social',array('size'=>60,'maxlength'=>255)); ?>
			<?php echo $form->error($model,'red_social'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'observaciones'); ?>
			<?php echo $form->textArea($model,'observaciones',array('rows'=>6, 'cols'=>50)); ?>
			<?php echo $form->error($model,'observaciones'); ?>
		</div>
	</div>

	<div id="datos_asistente" style="display: none">
		<div class="row">
			<?php echo $form->labelEx($model,'nombre_asistente'); ?>
			<?php echo $form->textField($model,'nombre_asistente',array('size'=>60,'maxlength'=>255)); ?>
			<?php echo $form->error($model,'nombre_asistente'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'apellido_asistente'); ?>
			<?php echo $form->textField($model,'apellido_asistente',array('size'=>60,'maxlength'=>255)); ?>
			<?php echo $form->error($model,'apellido_asistente'); ?>
		</div>
	</div>

	<div id="datos_domicilio" style="display: none">

		<div id="datos_internacional" style="display: none">
			<div class="row">
				<?php echo $form->labelEx($model,'paises_id'); ?>
				<?php echo $form->dropDownList($model, 'paises_id',  CHtml::listData(Paises::model()->findAll(array('order'=>'nombre ASC')), 'id', 'nombre'), 
						array('empty'=>'---Selecciona un país---', 'id'=>'pais_id'
				)); ?>
				<?php echo $form->error($model,'paises_id'); ?>
			</div>
		</div>

		<div id="datos_nacional">
			<div class="row">
				<?php echo $form->labelEx($model,'cp'); ?>
				<?php echo $form->textField($model,'cp',array('size'=>10,'maxlength'=>10,'id'=>'cp')); ?>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

				<div id="sin_cp" style="display: none">Tu búsqueda no dio ningún
					resultado (puedes poner los datos manualmente)</div>

				<?php echo $form->error($model,'cp'); ?>
			</div>

			<div id="datos_manual" style="display: none">Pon el domicilio
				manualmente (OJO: solo si el contacto tiene domicilio internacional)
				&raquo;</div>
			<div id="datos_listas" style="display: none">Regresar a las listas de
				datos nacionales &raquo;</div>

			<div class="row">
				<?php echo $form->labelEx($model,'estado', array('id'=>'etiqueta')); ?>

				<?php for ($i=0;$i<33;$i++)
				echo "&nbsp;" ?>

				<div class="datos_ciudad_id" style="display: inline;">
					<?php echo $form->labelEx($model,'ciudad_id', array('id'=>'etiqueta')); ?>
				</div>
				<br>
				<!-- PROBLEMA AQUI ******************************** -->
				<?php echo $form->dropDownList($model, 'estado',  CHtml::listData(Estado::model()->findAll(), 'id', 'nombre'), 
						array('empty'=>'---Selecciona un estado---', 'id'=>'estado', 'ajax' => array(
						'type'=>'POST',
						'url'=>Yii::app()->createUrl('directorio/damemunicipios'),
						'update'=>'#municipio_lista',
			))); ?>
				<!-- PROBLEMA AQUI ******************************** -->
				<div style="display: none;" id="datos_estado_manual">
					<?php echo CHtml::textField('estado_manual','',array('size'=>60,'maxlength'=>255,'id'=>'estado_manual')); ?>
				</div>

				<div class="datos_ciudad_id" style="display: inline;">
					<?php echo $form->dropDownList($model,'ciudad_id',array(), array('prompt'=>'---Selecciona una ciudad---', 'id'=>'ciudad_id', 'disabled'=>'disabled')); ?>
				</div>

				<div id="con_ciudad" class="color_enlace" style="display: none">¿No
					encontraste la ciudad? Anótala &raquo;</div>

				<?php echo $form->error($model,'estado'); ?>
				<?php echo $form->error($model,'ciudad_id'); ?>
			</div>

			<div id="datos_ciudad" style="display: none">
				<div class="row">
					<?php echo $form->labelEx($model,'ciudad'); ?>
					<?php echo $form->textField($model,'ciudad',array('size'=>60,'maxlength'=>255, 'id'=>'ciudad')); ?>
					<?php echo $form->error($model,'ciudad'); ?>

					<div id="sin_ciudad" class="color_enlace" style="display: none">Escoger
						de la lista &raquo;</div>
				</div>
			</div>

			<div id="datos_municipio_lista" style="display: inline">
				<div class="row">
					<?php echo CHtml::label('Municipio','municipio_lista'); ?>
					<?php echo CHtml::dropDownList('municipio_lista','',array(), array('empty'=>'---Selecciona un municipio---', 'id'=>'municipio_lista', 'disabled'=>'disabled'
			)); ?>

					<div id="con_municipio" class="color_enlace" style="display: none">¿No
						encontraste el municipio? Anótalo &raquo;</div>
				</div>
			</div>

			<div id="datos_municipio" style="display: none;">
				<div class="row">
					<?php echo $form->labelEx($model,'municipio'); ?>
					<?php echo $form->textField($model,'municipio',array('size'=>60,'maxlength'=>255, 'id'=>'municipio')); ?>
					<?php echo $form->error($model,'municipio'); ?>

					<div id="sin_municipio" class="color_enlace" style="display: none">Escoger
						de la lista &raquo;</div>
				</div>
			</div>

			<div id="datos_asentamiento_lista">
				<div class="row">
					<?php echo CHtml::label('Colonia','asentamiento_lista'); ?>
					<?php echo CHtml::dropDownList('asentamiento_lista','',array(), array('prompt'=>'---Selecciona una colonia---', 'id'=>'asentamiento_lista', 'disabled'=>'disabled',
			)); ?>

					<div id="con_asentamiento" class="color_enlace"
						style="display: none">¿No encontraste la colonia? Anótala &raquo;</div>
				</div>
			</div>

			<div id="datos_asentamiento" style="display: none;">
				<div class="row">
					<?php echo $form->labelEx($model,'asentamiento'); ?>
					<?php echo $form->textField($model,'asentamiento',array('size'=>60,'maxlength'=>255, 'id'=>'asentamiento')); ?>
					<?php echo $form->error($model,'asentamiento'); ?>

					<div id="sin_asentamiento" class="color_enlace"
						style="display: none">Escoger de la lista &raquo;</div>
				</div>
			</div>

			<div class="row">
				<?php echo $form->label($model,'tipo_asentamiento_id'); ?>
				<?php echo $form->dropDownList($model, 'tipo_asentamiento_id',  CHtml::listData(TipoAsentamiento::model()->findAll(), 'id', 'nombre'), 
						array('empty'=>'---Selecciona el tipo de colonia---', 'id'=>'tipo_asentamiento_id', 'disabled'=>'disabled')); ?>
				<?php echo $form->error($model,'tipo_asentamiento_id'); ?>
			</div>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'direccion'); ?>
			<?php echo $form->textField($model,'direccion',array('size'=>60,'maxlength'=>255, 'id'=>'direccion')); ?>
			<?php echo $form->error($model,'direccion'); ?>
		</div>

		<div class="row" style="display: none;">
			<?php echo $form->labelEx($model,'codigo_postal_id'); ?>
			<?php echo $form->textField($model,'codigo_postal_id',array('size'=>5,'maxlength'=>5,'id'=>'codigo_postal')); ?>
			<?php echo $form->error($model,'codigo_postal_id'); ?>
		</div>
	</div>

	<div id="datos_otro_domicilio" style="display: none">

		<div id="datos_internacional_alternativo" style="display: none">
			<div class="row">
				<?php echo $form->labelEx($model,'paises_id1'); ?>
				<?php echo $form->dropDownList($model, 'paises_id1',  CHtml::listData(Paises::model()->findAll(array('order'=>'nombre ASC')), 'id', 'nombre'), 
						array('empty'=>'---Selecciona un país---', 'id'=>'pais_id_alternativo'
				)); ?>
				<?php echo $form->error($model,'paises_id1'); ?>
			</div>
		</div>

		<div id="datos_nacional_alternativo">
			<div class="row">
				<?php echo $form->labelEx($model,'cp_alternativo'); ?>
				<?php echo $form->textField($model,'cp_alternativo',array('size'=>10,'maxlength'=>10,'id'=>'cp_alternativo')); ?>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

				<div id="sin_cp_alternativo" style="display: none">Tu búsqueda no
					dio ningún resultado (puedes poner los datos manualmente)</div>

				<?php echo $form->error($model,'cp_alternativo'); ?>
			</div>

			<div id="datos_manual_alternativo" style="display: none">Pon el
				domicilio manualmente (OJO: solo si el contacto tiene domicilio
				internacional) &raquo;</div>
			<div id="datos_listas_alternativas" style="display: none">Regresar a
				las listas de datos nacionales &raquo;</div>

			<div class="row">
				<?php echo $form->labelEx($model,'estado_alternativo', array('id'=>'etiqueta')); ?>

				<?php for ($i=0;$i<17;$i++)
				echo "&nbsp;" ?>

				<div class="datos_ciudad_id_alternativa" style="display: inline;">
					<?php echo $form->labelEx($model,'ciudad_id1', array('id'=>'etiqueta')); ?>
				</div>
				<br>

				<?php echo $form->dropDownList($model, 'estado_alternativo',  CHtml::listData(Estado::model()->findAll(), 'id', 'nombre'), 
					array('empty'=>'---Selecciona un estado---', 'id'=>'estado_alternativo')); ?>

				<!-- PROBABLE PROBLEMA************************** -->
				<div style="display: none;" id="datos_estado_manual_alternativo">
					<?php echo CHtml::textField('estado_manual_alternativo','',array('size'=>60,'maxlength'=>255,'id'=>'estado_manual_alternativo')); ?>
				</div>

				<div class="datos_ciudad_id_alternativa" style="display: inline;">
					<?php echo $form->dropDownList($model,'ciudad_id1',array(), array('prompt'=>'---Selecciona una ciudad---', 'id'=>'ciudad_id_alternativa', 'disabled'=>'disabled')); ?>
				</div>

				<div id="con_ciudad_alternativa" class="color_enlace"
					style="display: none">¿No encontraste la ciudad? Anótala &raquo;</div>

				<?php echo $form->error($model,'estado_alternativo'); ?>
				<?php echo $form->error($model,'ciudad_id1'); ?>
			</div>

			<div id="datos_ciudad_alternativa" style="display: none">
				<div class="row">
					<?php echo $form->labelEx($model,'ciudad_alternativa'); ?>
					<?php echo $form->textField($model,'ciudad_alternativa',array('size'=>60,'maxlength'=>255, 'id'=>'ciudad_alternativa')); ?>
					<?php echo $form->error($model,'ciudad_alternativa'); ?>

					<div id="sin_ciudad_alternativa" class="color_enlace"
						style="display: none">Escoger de la lista &raquo;</div>
				</div>
			</div>

			<div id="datos_municipio_lista_alternativa" style="display: inline">
				<div class="row">
					<?php echo CHtml::label('Municipio alternativo','municipio_lista_alternativa'); ?>
					<?php echo CHtml::dropDownList('municipio_lista_alternativa','',array(), array('empty'=>'---Selecciona un municipio---', 'id'=>'municipio_lista_alternativa', 'disabled'=>'disabled'
			)); ?>

					<div id="con_municipio_alternativo" class="color_enlace"
						style="display: none">¿No encontraste el municipio? Anótalo
						&raquo;</div>
				</div>
			</div>

			<div id="datos_municipio_alternativo" style="display: none;">
				<div class="row">
					<?php echo $form->labelEx($model,'municipio_alternativo'); ?>
					<?php echo $form->textField($model,'municipio_alternativo',array('size'=>60,'maxlength'=>255, 'id'=>'municipio_alternativo')); ?>
					<?php echo $form->error($model,'municipio_alternativo'); ?>

					<div id="sin_municipio_alternativo" class="color_enlace"
						style="display: none">Escoger de la lista &raquo;</div>
				</div>
			</div>

			<div id="datos_asentamiento_lista_alternativa">
				<div class="row">
					<?php echo CHtml::label('Colonia alternativa','asentamiento_lista_alternativa'); ?>
					<?php echo CHtml::dropDownList('asentamiento_lista_alternativa','',array(), array('prompt'=>'---Selecciona una colonia---', 'id'=>'asentamiento_lista_alternativa', 'disabled'=>'disabled',
			)); ?>

					<div id="con_asentamiento_alternativo" class="color_enlace"
						style="display: none">¿No encontraste la colonia? Anótala &raquo;</div>
				</div>
			</div>

			<div id="datos_asentamiento_alternativo" style="display: none;">
				<div class="row">
					<?php echo $form->labelEx($model,'asentamiento_alternativo'); ?>
					<?php echo $form->textField($model,'asentamiento_alternativo',array('size'=>60,'maxlength'=>255, 'id'=>'asentamiento_alternativo')); ?>
					<?php echo $form->error($model,'asentamiento_alternativo'); ?>

					<div id="sin_asentamiento_alternativo" class="color_enlace"
						style="display: none">Escoger de la lista &raquo;</div>
				</div>
			</div>

			<div class="row">
				<?php echo $form->label($model,'tipo_asentamiento_id1'); ?>
				<?php echo $form->dropDownList($model, 'tipo_asentamiento_id1',  CHtml::listData(TipoAsentamiento::model()->findAll(), 'id', 'nombre'), 
						array('empty'=>'---Selecciona el tipo de colonia---', 'id'=>'tipo_asentamiento_id_alternativo', 'disabled'=>'disabled')); ?>
				<?php echo $form->error($model,'tipo_asentamiento_id1'); ?>
			</div>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'direccion_alternativa'); ?>
			<?php echo $form->textField($model,'direccion_alternativa',array('size'=>60,'maxlength'=>255, 'id'=>'direccion_alternativa')); ?>
			<?php echo $form->error($model,'direccion_alternativa'); ?>
		</div>

		<div class="row" style="display: none;">
			<?php echo $form->labelEx($model,'codigo_postal_id1'); ?>
			<?php echo $form->textField($model,'codigo_postal_id1',array('size'=>5,'maxlength'=>5,'id'=>'codigo_postal_alternativo')); ?>
			<?php echo $form->error($model,'codigo_postal_id1'); ?>
		</div>
	</div>

	<div id="datos_medios" style="display: none;">
		<div class="row">
			<?php echo $form->labelEx($model_m,'grupos_id'); ?>
			<?php echo $form->dropDownList($model_m, 'grupos_id',  CHtml::listData(Grupos::model()->findAll(array('order'=>'nombre ASC')), 'id', 'nombre'), 
						array('id'=>'grupos_id')); ?>
			<?php echo $form->error($model_m,'grupos_id'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model_m,'medio'); ?>
			<?php echo $form->textField($model_m,'medio',array('size'=>60,'maxlength'=>255,'id'=>'medio')); ?>
			<?php echo $form->error($model_m,'medio'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model_m,'tipo_medios_id'); ?>
			<?php echo $form->dropDownList($model_m, 'tipo_medios_id',  CHtml::listData(TipoMedios::model()->findAll(array('order'=>'nombre ASC')), 'id', 'nombre'), 
						array('id'=>'tipo_medios_id')); ?>
			<?php echo $form->error($model_m,'tipo_medios_id'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model_m,'perfil_medio'); ?>
			<?php echo $form->textField($model_m,'perfil_medio',array('size'=>60,'maxlength'=>255,'id'=>'perfil_medio')); ?>
			<?php echo $form->error($model_m,'perfil_medio'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model_m,'programa'); ?>
			<?php echo $form->textField($model_m,'programa',array('size'=>60,'maxlength'=>255,'id'=>'programa')); ?>
			<?php echo $form->error($model_m,'programa'); ?>
		</div>
	</div>

	<div id="datos_documental" style="display: none;">
		<div class="row">
			<?php echo $form->labelEx($model_c,'grado_academico'); ?>
			<?php echo $form->textField($model_c,'grado_academico',array('size'=>60,'maxlength'=>255,'id'=>'grado_academico')); ?>
			<?php echo $form->error($model_c,'grado_academico'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model_c,'sigla_institucion'); ?>
			<?php echo $form->textField($model_c,'sigla_institucion',array('size'=>60,'maxlength'=>255,'id'=>'sigla_institucion')); ?>
			<?php echo $form->error($model_c,'sigla_institucion'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model_c,'dependencia'); ?>
			<?php echo $form->textField($model_c,'dependencia',array('size'=>60,'maxlength'=>255,'id'=>'dependencia')); ?>
			<?php echo $form->error($model_c,'dependencia'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model_c,'sigla_dependencia'); ?>
			<?php echo $form->textField($model_c,'sigla_dependencia',array('size'=>60,'maxlength'=>255,'id'=>'sigla_dependencia')); ?>
			<?php echo $form->error($model_c,'sigla_dependencia'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model_c,'subdependencia'); ?>
			<?php echo $form->textField($model_c,'subdependencia',array('size'=>60,'maxlength'=>255,'id'=>'subdependencia')); ?>
			<?php echo $form->error($model_c,'subdependencia'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model_c,'actividad'); ?>
			<?php echo $form->textField($model_c,'actividad',array('size'=>60,'maxlength'=>255,'id'=>'actividad')); ?>
			<?php echo $form->error($model_c,'actividad'); ?>
		</div>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear contacto' : 'Guardar cambios'); ?>
	</div>

	<?php $this->endWidget(); ?>

</div>
<!-- form -->
