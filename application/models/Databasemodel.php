<?php
Class Databasemodel extends CI_Model {
	
	function get_item_info($itemID) {
		$items = array();
		$in_comment = false;
		$in_trade = false;
		$in_script = false;
		$in_nouse = false;
		$in_equipScript = false;
		$in_unequipScript = false;
		$in_stack = false;
		// First, get the path to the file we need to read:
		$servers = $this->config->item('ragnarok_servers');
		$itemDB_path = $servers[$this->session->userdata('server_select')]['conf_db_location']."item_db.conf";
		$itemDB = file($itemDB_path);
		foreach ($itemDB as $row) {
			$row = trim($row);
			if (strpos($row, "//") === 0) continue;
			if (strpos($row, "/*") === 0) {
				$in_comment = true;
				continue;
			}
			if (strpos($row, "*/") === 0) {
				$in_comment = false;
				continue;
			}
			if ($in_comment) continue;
			if ($row === "item_db: (") continue;
			if ($row === ")") continue;
			if (strpos($row, "{") === 0) {
				  $item = array();
			}
			elseif (!$in_trade && strpos($row, "}") === 0) {
				$items[$item["Id"]] = $item;
			} 
			else {
				$row = explode(":", $row);
				$key = trim($row[0]);
				$val = isset($row[1]) ? trim($row[1]) : "";
				if ($key === "Trade" && strpos($val, "{") === 0) {
					$in_trade = true;
					$item["Trade"] = array();
					continue;
				}
				elseif ($in_trade && $key === "}") {
					$in_trade = false;
					continue;
				} 
				elseif ($key === "Nouse" && strpos($val, "{") === 0) {
					$in_nouse = true;
					$item["Nouse"] = array();
					continue;
				}
				elseif ($in_nouse && $key === "}") {
					$in_nouse = false;
					continue;
				}
				elseif ($key === "Stack") {
					$item["Stack"] = json_decode($val);
				}
				elseif ($key === "Script") {
					$in_script = true;
					$item["Script"] = "";
				}
				elseif ($key === "OnEquipScript") {
					$in_equipScript = true;
					$item["OnEquipScript"] = "";
				}
				elseif ($key === "OnUnequipScript") {
					$in_unequipScript = true;
					$item["OnUnequipScript"] = "";
				}
				if ($in_trade) {
					$item["Trade"][$key] = $val;
				} 
				elseif ($in_script) {
					$item["Script"] .= (empty($val) ? $key : $val) . "\n";
					if (strpos($key, "\">") !== false || strpos($val, "\">") !== false) {
						$item["Script"] = str_replace(array("<\"", "\">"), "", $item["Script"]);
						$item["Script"] = trim($item["Script"]);
						$in_script = false;
					}
				}
				elseif ($in_equipScript) {
					$item["OnEquipScript"] .= (empty($val) ? $key : $val) . "\n";
					if (strpos($key, "\">") !== false || strpos($val, "\">") !== false) {
						$item["OnEquipScript"] = str_replace(array("<\"", "\">"), "", $item["OnEquipScript"]);
						$item["OnEquipScript"] = trim($item["OnEquipScript"]);
						$in_equipScript = false;
					}
				}
				elseif ($in_unequipScript) {
					$item["OnUnequipScript"] .= (empty($val) ? $key : $val) . "\n";
					if (strpos($key, "\">") !== false || strpos($val, "\">") !== false) {
						$item["OnUnequipScript"] = str_replace(array("<\"", "\">"), "", $item["OnUnequipScript"]);
						$item["OnUnequipScript"] = trim($item["OnUnequipScript"]);
						$in_unequipScript = false;
					}
				}
				else {
					$item[$key] = $val;
				}
			}
		}
		return $items[$itemID];
	}
}