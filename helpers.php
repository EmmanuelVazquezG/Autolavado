<?php 

//Loades view module NCHR
function View($view,$param = array(), $masterpage = '')
{
	extract($param);	

    ob_start();
	$file = "view/$view.view.php";
	require $file;
	$view_content = ob_get_clean();

	if($masterpage=='')
	{
		require 'view/masterpage/masterpage.default.view.php';	
	}	
	else 
	{
		require "view/masterpage/masterpage.$masterpage.view.php";
	}

} 
// Esta funcion es para el login att: Afantasmar7w7
function ViewL($view,$param = array(), $masterpage = '')
{
	extract($param);	

    ob_start();
	$file = "view/$view.view.php";
	require $file;
	$view_content = ob_get_clean();

	if($masterpage=='')
	{
		require 'view/masterpage/masterpage.default.viewLogin.php';	
	}	
	else 
	{
		require "view/masterpage/masterpage.$masterpage.view.php";
	}

} 

//Esta funcion es para el home Att: Afantasmar7w7
function ViewH($view,$param = array(), $masterpage = '')
{
	extract($param);	

    ob_start();
	$file = "view/$view.view.php";
	require $file;
	$view_content = ob_get_clean();

	if($masterpage=='')
	{
		require 'view/masterpage/masterpage.default.viewHome.php';	
	}	
	else 
	{
		require "view/masterpage/masterpage.$masterpage.view.php";
	}

} 

//Esta funcion es para el empleado Att: Afantasmar7w7
function ViewE($view,$param = array(), $masterpage = '')
{
	extract($param);	

    ob_start();
	$file = "view/$view.view.php";
	require $file;
	$view_content = ob_get_clean();

	if($masterpage=='')
	{
		require 'view/masterpage/masterpage.default.viewEsclavo.php';	
	}	
	else 
	{
		require "view/masterpage/masterpage.$masterpage.view.php";
	}

} 


//Controler load NCHR
function Controller($controller)
{
	if(empty($controller))
	{
		$controller = 'home';
	}
		
	$file = "controller/$controller.php";

	if(file_exists($file))
	{
		require $file;	
	}
	else
	{
		require 'controller/error404.php';
	}
	
}











