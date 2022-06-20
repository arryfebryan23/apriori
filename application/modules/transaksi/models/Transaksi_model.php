<?php defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi_model extends CI_Model
{

    public function get_all_transaksi()
    {
        $sql = "SELECT t.*, SUM(td.harga) harga 
                    FROM transaksi t 
                    JOIN transaksi_detail td ON td.id_transaksi = t.id AND td.deleted_at IS NULL
                    GROUP BY t.id ORDER BY t.id DESC;";

        return $this->db->query($sql);
    }

    public function get_transaksi_datang()
    {
        $sql = "SELECT t.*, SUM(td.harga) harga 
                    FROM transaksi t 
                    JOIN transaksi_detail td ON td.id_transaksi = t.id AND td.deleted_at IS NULL
                    WHERE t.status = '1'
                    GROUP BY t.id ORDER BY t.id DESC;";

        return $this->db->query($sql);
    }
}
