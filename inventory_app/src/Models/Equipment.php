<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    protected $table = 'equipment';
    protected $fillable = [
        'inventory_no',
        'name',
        'serial_number',
        'type',
        'category',
        'value',
        'received_at',
        'status',
        'location_id',
        'employee_id',
        'supplier_nip',
        'invoice_number',
        'warranty_end',
        'additional_data',
        'attachment_path'
    ];
}
