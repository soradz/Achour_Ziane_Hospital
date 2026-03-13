<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class XrayRequest extends Model
{
    protected $table = 'xray_requests';
    protected $fillable = [
        'patient_id','doctor_name','body_part','side',
        'notes','report','image_path','urgency','status'
    ];
    public function patient() {
        return $this->belongsTo(Patient::class);
    }
}