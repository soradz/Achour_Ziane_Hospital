<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LabRequest extends Model
{
    protected $table = 'lab_requests';

    protected $fillable = [
        'patient_id', 'doctor_name', 'requested_tests',
        'results', 'lab_notes', 'urgency', 'notes', 'status', 'type',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    // نحذف cast نتاع results — نتعامل معاه يدوياً
    protected $casts = [
        'requested_tests' => 'array',
    ];
}