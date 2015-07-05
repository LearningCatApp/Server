<?php
/**
 * Demos App
 *
 * @category   Demos
 * @package    Demos_App_Server
 * @author     James.Huang <huangjuanshi@163.com>
 * @license    http://www.apache.org/licenses/LICENSE-2.0
 * @version    $Id$
 */

require_once 'Demos/App/Server.php';

/**
 * @package Demos_App_Server
 */
class TestServer extends Demos_App_Server
{
	/**
	 * ---------------------------------------------------------------------------------------------
	 * > 全局设置：
	 * <code>
	 * </code>
	 * ---------------------------------------------------------------------------------------------
	 */
	public function __init ()
	{
		parent::__init();
	}
	
	////////////////////////////////////////////////////////////////////////////////////////////////
	// service api methods
	
/**
	 * ---------------------------------------------------------------------------------------------
	 * > 接口说明：新建test接口
	 * <code>
	 * URL地址：/test/index
	 * 提交方式：POST
	 * 参数#1：id，类型：STRING，必须：YES
	 * 参数#2：content，类型：STRING，必须：YES
	 * </code>
	 * ---------------------------------------------------------------------------------------------
	 * @title 新建test接口
	 * @action /test/index
	 * @params id '' STRING
	 * @params content '' STRING
	 * @method post
	 */
	public function indexAction ()
	{
		$id = $this->param('id');
		$content = $this->param('content');
		if ($id && $content ) {
			$testDao = $this->dao->load('Core_Test');
			$testDao->create(array(
				'id'	=> $id,
				'content'	=> $content,

			));
			$this->render('10000', 'Create test ok');
		}
		$this->render('14005', 'Create test failed');
		echo "My First Api";
	}
}