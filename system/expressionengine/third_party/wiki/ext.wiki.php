<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Wiki_ext {

	public $name           = 'Wiki';
	public $version        = '2.3';
	public $settings_exist = 'n';
	public $docs_url       = 'http://ellislab.com/expressionengine/user-guide/modules/wiki/index.html';
	public $required_by    = array('module');

	/**
	 * Handle hook call
	 */
	public function files_after_delete($deleted_rows)
	{
		$names = array();

		foreach ($deleted_rows as $row)
		{
			$names[] = $row->file_name;
		}

		ee()->db->where_in('file_name', $names);
		ee()->db->delete('wiki_uploads');

		// Clear wiki cache
		ee()->functions->clear_caching('db');
	}


	// --------------------------------------------------------------------

	/**
	 * Activate Extension
	 */
	public function activate_extension()
	{
		return TRUE;
	}

	// --------------------------------------------------------------------

	/**
	 * Update Extension
	 */
	public function update_extension($current = FALSE)
	{
		return TRUE;
	}

	// --------------------------------------------------------------------

	/**
	 * Disable Extension
	 */
	public function disable_extension()
	{
		show_error('This extension is automatically deleted with the wiki module');
	}

		// --------------------------------------------------------------------

	/**
	 * Disable Extension
	 */
	public function uninstall_extension()
	{
		return TRUE;
	}

}

/* End of file ext.wiki.php */
/* Location: ./system/expressionengine/extensions/ext.wiki.php */
