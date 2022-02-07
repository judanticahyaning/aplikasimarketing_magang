<?php

/**
 * 
 */
class marketmodel extends CI_Model
{
	public function cekLogin($tableName, $where)
	{
		$am = $this->db
			->get_where($tableName, $where)
			->row();
		if (!$am) {
			return false;
		} else {
			return $am;
		}
	}
}
