<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    use HasFactory;
    protected $fillable = ['name','form_template_id', 'label', 'type', 'options', 'order'];
    
    public function formTemplate() {
        return $this->belongsTo(FormTemplate::class);
    }

}
