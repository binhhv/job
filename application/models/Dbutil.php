<?php

// Created by Dev
class DBUtil extends CI_Model {

	const XMPP_PUSH = "xmpp_push_record";

	function __construct() {
		parent::__construct();
		$this->load->database();

	}
	public function escape($value) {
		return $this->db->escape($value);
	}
	public function getFromDb($projections) {

		if ($projections != null) {
			if (isset($projections["fields"])) {
				$this->db->select($projections["fields"]);
			} else {
				$this->db->select('*');
			}
			$this->db->from($projections["from"]);
			if (isset($projections["where"])) {
				$this->db->where($projections["where"]);
			}

			if (isset($projections["orderkey"]) && isset($projections["order"])) {
				$this->db->order_by($projections["orderkey"], $projections["order"]);
			}

			if (isset($projections["num"]) && isset($projections["startfrom"])) {
				$this->db->limit($projections["num"], $projections["startfrom"]); // 5 records starting from 1st record
			}
			$query = $this->db->get();

			return $query->result();
		}
	}
	public function insert_batch($data, $tbl) {
		return $this->db->insert_batch($data, $tbl);
	}
	public function getOneRowFromDb($projections) {

		if ($projections != null) {
			if (isset($projections["fields"])) {
				$this->db->select($projections["fields"]);
			} else {
				$this->db->select('*');
			}
			$this->db->from($projections["from"]);
			if (isset($projections["where"])) {
				$this->db->where($projections["where"]);
			}

			if (isset($projections["orderkey"]) && isset($projections["order"])) {
				$this->db->order_by($projections["orderkey"], $projections["order"]);
			}

			if (isset($projections["num"]) && isset($projections["startfrom"])) {
				$this->db->limit($projections["num"], $projections["startfrom"]); // 5 records starting from 1st record
			}
			$query = $this->db->get();

			return $query->row();
		}
	}

	public function getFromDbQueryBinding($sql, $data) {
		$query = $this->db->query($sql, $data);
		return $query->result();
	}
	public function getOneRowQueryFromDb($sql, $data) {
		$query = $this->db->query($sql, $data);
		return $query->row();
	}
	public function updateDb($projections) {
		if ($projections != null) {
			$this->db->where($projections["where"]);
			return $this->db->update($projections["from"], $projections["data"]);
		}
	}

	public function checkIfExists($unique_field, $unique_value, $from) {
		$insert_id = FALSE;
		//if ($projections != null) {
		$this->db->select($unique_field);
		$this->db->where("$unique_field = '$unique_value'");
		$query = $this->db->get($from);

		if ($query->num_rows() > 0) {
			$insert_id = TRUE;
		}
		//}

		return $insert_id;
	}

	public function checkIfExistsForUpdate($unique_field, $unique_value, $key_field, $key_value, $from) {
		$insert_id = FALSE;
		//if ($projections != null) {
		$this->db->select($unique_field);
		$this->db->where("$unique_field = '$unique_value' AND $key_field != '$key_value'");
		$query = $this->db->get($from);

		if ($query->num_rows() > 0) {
			$insert_id = TRUE;
		}
		//}

		return $insert_id;
	}

	public function updateDbUnique($unique_field, $unique_value, $key_field, $key_value, $projections) {
		if ($projections != null) {
			$this->db->select($unique_field);
			$this->db->where("$unique_field = '$unique_value' AND $key_field != '$key_value'");
			$query = $this->db->get($projections["from"]);
			$insert_id = -1;
			if ($query->num_rows() > 0) {
				$insert_id = -1;
			} else {
				$this->db->trans_start();
				$this->db->where($projections["where"]);
				$this->db->update($projections["from"], $projections["data"]);
				if ($this->db->trans_status() === FALSE) {
					$this->db->trans_rollback();
					return -1;
				} else {
					$this->db->trans_complete();
					$insert_id = 1;
				}
			}

			return $insert_id;
		}

		return -1;
	}

	public function updateDbUniqueNew($unique_field, $where, $key_field, $key_value, $projections) {
		if ($projections != null) {
			$this->db->select($unique_field);
			//$this->db->where("$unique_field = '$unique_value' AND $key_field != '$key_value'");
			$this->db->where($where);
			$this->db->where("$key_field != '$key_value'");
			$query = $this->db->get($projections["from"]);
			$insert_id = -1;
			if ($query->num_rows() > 0) {
				$insert_id = -1;
			} else {
				$this->db->trans_start();
				$this->db->where($projections["where"]);
				$this->db->update($projections["from"], $projections["data"]);
				if ($this->db->trans_status() === FALSE) {
					$this->db->trans_rollback();
					return -1;
				} else {
					$this->db->trans_complete();
					$insert_id = 1;
				}

			}

			return $insert_id;
		}

		return -1;
	}

	public function insertDb($data, $tbl) {
		$this->db->trans_start();
		$this->db->insert($tbl, $data);
		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			return -1;
		} else {
			$insert_id = $this->db->insert_id();
			$this->db->trans_complete();
			return $insert_id;
		}
		//$this->db->insert($tbl, $data);
		//return $insert_id = $this->db->insert_id();
	}

	public function insertDbUnique($unique_field, $unique_value, $data, $tbl) {
		$this->db->select($unique_field);
		$this->db->where(array($unique_field => $unique_value));
		$query = $this->db->get($tbl);
		$insert_id = -1;
		if ($query->num_rows() > 0) {
			// the query returned data, so the value already exist.
			$insert_id = -1;
		} else {
			// the value not exists, so you can insert it.
			$this->db->trans_start();
			$insert_id = $this->insertDb($data, $tbl);
			if ($this->db->trans_status() === FALSE) {
				$this->db->trans_rollback();
				return -1;
			} else {
				$this->db->trans_complete();
				return $insert_id;
			}
		}
		return $insert_id;
	}

	public function insertDbUniqueNew($unique_field, $where, $data, $tbl) {
		$this->db->select($unique_field);
		//$this->db->where(array($unique_field => $unique_value));
		$this->db->where($where);
		$query = $this->db->get($tbl);
		$insert_id = -1;
		if ($query->num_rows() > 0) {
			// the query returned data, so the value already exist.
			$insert_id = -1;
		} else {
			// the value not exists, so you can insert it.
			$this->db->trans_start();
			$insert_id = $this->insertDb($data, $tbl);
			if ($this->db->trans_status() === FALSE) {
				$this->db->trans_rollback();
				return -1;
			} else {
				$this->db->trans_complete();
				return $insert_id;
			}
		}

		return $insert_id;
	}

	public function delete($data, $tbl) {

		$this->db->delete($tbl, $data);
		return $this->db->affected_rows();
	}

	public function setSmtpSettings($smtpHost, $smtpPort, $smtpUser, $smtpPass, $smtpFrom, $smtpFromName) {
		$data = array(
			'back_email_smtp_host' => $smtpHost,
			'back_email_smtp_port' => $smtpPort,
			'back_email_smtp_user' => $smtpUser,
			'back_email_smtp_pass' => $smtpPass,
			'back_email_smtp_from' => $smtpFrom,
			'back_email_smtp_exta' => $smtpFromName,
		);

		$this->db->where('back_email_id', 1);
		$this->db->update("backend_smtp", $data);
	}

	public function getMessageById($userid) {
		$this->db->select('*');
		$this->db->from(self::XMPP_PUSH);
		$this->db->where("xmpp_push_from = $userid");
		$query = $this->db->get();

		return $query->result();
	}

	public function setDeliveredById($userid) {
		$data = array(
			'xmpp_push_msg' => 'DELIVERED',
		);

		$this->db->where('xmpp_push_from', $userid);
		$this->db->update(self::XMPP_PUSH, $data);
	}

	public function setXmppMsg($userid, $title, $msg, $cmd) {
		$c = $this->getCount("xmpp_push_from = $userid", self::XMPP_PUSH);

		if ($c == 0) {
			$dxmpp = array(
				'xmpp_push_id' => 'NULL',
				'xmpp_push_from' => $userid,
				'xmpp_push_cmd' => $cmd,
				'xmpp_push_title' => $title,
				'xmpp_push_msg' => $msg,
			);
			$this->db->insert(self::XMPP_PUSH, $dxmpp);
		} else {
			$dxmppUpdate = array(
				'xmpp_push_cmd' => $cmd,
				'xmpp_push_title' => $title,
				'xmpp_push_msg' => $msg,
			);
			$this->db->where('xmpp_push_from', $userid);
			$this->db->update(self::XMPP_PUSH, $dxmppUpdate);
		}
	}
}
