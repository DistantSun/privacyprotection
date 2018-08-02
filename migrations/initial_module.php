<?php
/**
*
* @package phpBB Extension - tas2580 privacyprotection
* @copyright (c) 2018 tas2580 (https://tas2580.net)
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace tas2580\privacyprotection\migrations;

class initial_module extends \phpbb\db\migration\migration
{
	public function update_data()
	{
		return array(
			// Add ACP module
			array('module.add', array(
				'acp',
				'ACP_CAT_DOT_MODS',
				'ACP_PRIVACYPROTECTION_TITLE'
			)),
			array('module.add', array(
				'acp',
				'ACP_PRIVACYPROTECTION_TITLE',
				array(
					'module_basename'	=> '\tas2580\privacyprotection\acp\privacyprotection_module',
					'modes'				=> array('settings'),
				),
			)),
			array('module.add', array(
				'acp',
				'ACP_PRIVACYPROTECTION_TITLE',
				array(
					'module_basename'	=> '\tas2580\privacyprotection\acp\privacyprotection_module',
					'modes'				=> array('privacy'),
				),
			)),
			array('module.add', array(
				'acp',
				'ACP_PRIVACYPROTECTION_TITLE',
				array(
					'module_basename'	=> '\tas2580\privacyprotection\acp\privacyprotection_module',
					'modes'				=> array('list'),
				),
			)),

			// Add config values
			array('config.add', array('tas2580_privacyprotection_privacy_url', '')),
			array('config.add', array('tas2580_privacyprotection_reject_url', '')),
			array('config.add', array('tas2580_privacyprotection_reject_group', '0')),
			array('config.add', array('tas2580_privacyprotection_anonymize_ip', '0')),
			array('config.add', array('tas2580_privacyprotection_last_update', '0')),
			array('config.add', array('tas2580_privacyprotection_footerlink', '1')),
			array('config.add', array('tas2580_privacyprotection_post_format', '1')),
			array('config.add', array('tas2580_privacyprotection_post_read', '0')),
			array('config.add', array('tas2580_privacyprotection_post_unapproved', '1')),
			array('config.add', array('tas2580_privacyprotection_post_deleted', '1')),
			array('config.add', array('tas2580_privacyprotection_anonymize_gc', '0')),
			array('config.add', array('tas2580_privacyprotection_anonymize_last_gc', '0')),
			array('config.add', array('tas2580_privacyprotection_anonymize_ip_time', '0')),
			array('config.add', array('tas2580_privacyprotection_anonymize_ip_time_type', '0')),
			array('config.add', array('tas2580_privacyprotection_reg_accept_mail', '1')),
			array('config.add', array('tas2580_privacyprotection_reg_accept_privacy', '1')),

			array('config_text.add', array('privacy_text', '')),

			// Add permissions
			array('permission.add', array('u_privacyprotection_dl_data', true, 'u_')),
			array('permission.add', array('u_privacyprotection_dl_posts', true, 'u_')),
		);
	}
	public function update_schema()
	{
		return array(
			'add_columns'	=> array(
				$this->table_prefix . 'users'	=> array(
					'tas2580_privacy_last_accepted'				=> array('TIMESTAMP', '0'),
				),
			),
		);
	}
	public function revert_schema()
	{
		return array(
			'drop_columns' => array(
				$this->table_prefix . 'users'	=> array(
					'tas2580_privacy_last_accepted',
				),
			),
		);
	}
}
