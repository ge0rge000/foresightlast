<?php

// app/Models/ReceiveOrder.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReceiveOrder extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'equipment_id',
        'name_person',
        'number_person',
        'another_number_person',
        'company_id',
        'guarantee_status',
        'case_status',
        'serial',
        'person_receive',
        'created_at',
        'updated_at',
        'comment',
        'brand_id',
        'type_tool_id',
        'indicator_equipment_id',
        'date_recieve'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function contactPerson()
    {
        return $this->belongsTo(ContactPerson::class, 'person_id');
    }

    public function equipment()
    {
        return $this->belongsTo(Equipment::class, 'equipment_id');
    }
    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }
    public function Brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }
    public function type_tool ()
    {
        return $this->belongsTo(TypeTool::class, 'type_tool_id');
    }
    public function indicator_equipment()
    {
        return $this->belongsTo(IndicatorEquipment::class, 'indicator_equipment_id');
    }
}
