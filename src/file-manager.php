<?php

/**
 * @author 	Andreas Jönsson <adde90@gmail.com>
 * @version	0.1 
 * @since 	2013-10-19
 */

class FileManager 
{
	protected $_folder = NULL;
	protected $_result = array();
	protected $_sort = 'ASC';

	public static $GETFILES = 1;
	public static $GETFOLDERS = 2;
	public static $GETALL = 3;

	public function __construct($folder = NULL)
	{
		if($folder != NULL) 
		{
			$this->_folder = $folder;
		}
	}

	public function folder($folder)
	{
		$this->_folder = $folder;
		return $this;
	}

	public function sort($sort = 'ASC')
	{
		$this->_sort = $sort;
		return $this;
	}

	public function get($mode = 1)
	{
		if($this->_folder === NULL) return FALSE;
		$this->_result = $this->_fetch_files_from_folder($mode);
		$this->_sort_result();
		return $this->_result;
	}

	private function _fetch_files_from_folder($mode)
	{
		$result = array();
		if ( ($objs = @scandir($this->_folder)) && (count($objs) > 0)  )
		{
			if ($handle = opendir($this->_folder)) 
			{
				while (false !== ($obj = readdir($handle))) {
					// Hämtar bara filer
					if(!is_dir($this->_folder.$obj) && $mode == self::$GETFILES)
					{
						$result[] = $obj;
					}
					// Hämtar bara mappar (bortser från bort . och ..)
					elseif(is_dir($this->_folder.$obj) && $mode == self::$GETFOLDERS && ($obj != '.' && $obj != '..'))
					{
						$result[] = $obj;
					}
					// Hämtar ALLT
					elseif($mode == self::$GETALL)
					{
						$result[] = $obj;
					}
				}
			}
		}
		return $result;
	}

	private function _sort_result()
	{
		if($this->_sort == 'ASC') $sort = SORT_ASC;
		else $sort = SORT_DESC;
		$temp_lowercase = array_map('strtolower', $this->_result);
		array_multisort($temp_lowercase, $sort, SORT_STRING, $this->_result);
	}
}