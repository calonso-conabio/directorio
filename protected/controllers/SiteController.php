<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
				// captcha action renders the CAPTCHA image displayed on the contact page
				'captcha'=>array(
						'class'=>'CCaptchaAction',
						'backColor'=>0xFFFFFF,
				),
				// page action renders "static" pages stored under 'protected/views/site/pages'
				// They can be accessed via: index.php?r=site/page&view=FileName
				'page'=>array(
						'class'=>'CViewAction',
				),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		//Yii::import('ext.tcpdf.*');
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
						"Reply-To: {$model->email}\r\n".
						"MIME-Version: 1.0\r\n".
						"Content-type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
			{
				$this->setIdUsuario(Yii::app()->user->id);
				$this->redirect(Yii::app()->user->returnUrl);
			}
		}

		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}

	/**
	 * Pone la ventana de mantenimiento
	 */
	public function actionMaintenance()
	{
		$this->render('maintenance');
	}

	/**
	 * Vista para la informacion cuando se requiera exportar
	 */
	public function actionInformacion()
	{
		if (!Yii::app()->user->isGuest)
		{
			$tipo=Tipo::model()->findAll();
			$tipos='';
			$es_internacional="'No' => 0 <br> 'Sí' => 1";
			$sect=Sector::model()->findAll();
			$sectores='';
			$est=Estado::model()->findAll();
			$estados='';
			$pais=Paises::model()->findAll();
			$paises='';
			$tipo_m=TipoMedios::model()->findAll();
			$tipo_medios='';
			$grupo=Grupos::model()->findAll();
			$grupos='';
			$usuario=Usuarios::model()->findAll();
			$usuarios='';
				
			$es_internacional="'No' => 0 <br> 'Sí' => 1";
				
			foreach ($tipo as $t)
			{
				$tipos.="'".$t->nombre."' => ".$t->id." <br>";
			}
				
			foreach ($sect as $s)
			{
				$sectores.="'".$s->nombre."' => ".$s->id." <br>";
			}
				
			foreach ($usuario as $u)
			{
				$usuarios.="'".$u->nombre.' '.$u->apellido."' => ".$u->id." <br>";
			}
				
			foreach ($est as $e)
			{
				$estados.="'".$e->nombre."' => ".$e->id." <br>";
			}
				
			foreach ($pais as $p)
			{
				$paises.="'".$p->nombre."' => ".$p->id." <br>";
			}
				
			foreach ($tipo_m as $tm) 
			{
				$tipo_medios.="'".$tm->nombre."' => ".$tm->id." <br>";
			}
				
			foreach ($grupo as $g) 
			{
				$grupos.="'".$g->nombre."' => ".$g->id." <br>";
			}
				
			$datos=array('es_internacional'=>$es_internacional, 'tipos'=>$tipos, 'sectores'=>$sectores,
					'usuarios'=>$usuarios, 'estados'=>$estados, 'paises'=>$paises,
					'tipo_medios'=>$tipo_medios, 'grupos'=>$grupos,
			);
				
			$this->render('informacion',array('datos'=>$datos));
				
		} else {
			$this->redirect(Yii::app()->homeUrl);
		}
	}
}