<?php namespace App\Models;

use CodeIgniter\Model;

class RanjenModel extends Model
{
    protected $table = 'kartus';
    protected $primaryKey = 'kartu_id';
    protected $allowedFields = ['kartu_tag_no','kartu_tipe','kartu_ranjen_is','kartu_kendaraan','kartu_banned','kartu_created_tgl','kartu_paired','kartu_paired_by','kartu_paired_tgl','kartu_deleted','kartu_deleted_by','kartu_deleted_tgl'];
}
