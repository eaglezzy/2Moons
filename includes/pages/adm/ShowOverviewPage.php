<?php

/**
 *  2Moons
 *  Copyright (C) 2012 Jan
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @package 2Moons
 * @author Jan <info@2moons.cc>
 * @copyright 2006 Perberos <ugamela@perberos.com.ar> (UGamela)
 * @copyright 2008 Chlorel (XNova)
 * @copyright 2009 Lucky (XGProyecto)
 * @copyright 2012 Jan <info@2moons.cc> (2Moons)
 * @license http://www.gnu.org/licenses/gpl.html GNU GPLv3 License
 * @version 1.7.0 (2012-05-31)
 * @info $Id$
 * @link http://code.google.com/p/2moons/
 */

function ShowOverviewPage()
{
	global $LNG, $USER, $CONF;
	
	$Message	= array();

	if ($USER['authlevel'] >= AUTH_ADM)
	{
		if(file_exists(ROOT_PATH.'update.php'))
			$Message[]	= sprintf($LNG['ow_file_detected'], 'update.php');
			
		if(file_exists(ROOT_PATH.'webinstall.php'))
			$Message[]	= sprintf($LNG['ow_file_detected'], 'webinstall.php');
			
		if(file_exists(ROOT_PATH.'includes/ENABLE_INSTALL_TOOL'))
			$Message[]	= sprintf($LNG['ow_file_detected'], 'includes/ENABLE_INSTALL_TOOL');
					
		if(!is_writable(ROOT_PATH.'cache'))
			$Message[]	= sprintf($LNG['ow_dir_not_writable'], 'cache');
			
		if(!is_writable(ROOT_PATH.'includes'))
			$Message[]	= sprintf($LNG['ow_dir_not_writable'], 'includes');
	}
	
	$template	= new template();


	$template->assign_vars(array(	
		'ow_none'			=> $LNG['ow_none'],
		'ow_overview'		=> $LNG['ow_overview'],
		'ow_welcome_text'	=> $LNG['ow_welcome_text'],
		'ow_credits'		=> $LNG['ow_credits'],
		'ow_special_thanks'	=> $LNG['ow_special_thanks'],
		'ow_translator'		=> $LNG['ow_translator'],
		'ow_proyect_leader'	=> $LNG['ow_proyect_leader'],
		'ow_support'		=> $LNG['ow_support'],
		'ow_title'			=> $LNG['ow_title'],
		'ow_forum'			=> $LNG['ow_forum'],
		'ow_donate'			=> $LNG['ow_donate'],
		'Messages'			=> $Message,
		'date'				=> date('m\_Y', TIMESTAMP),
	));
	
	$template->show('OverviewBody.tpl');
}
