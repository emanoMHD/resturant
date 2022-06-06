<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InvoiceDetails extends Model
{
    protected $guarded = [];

    public function invoice()
    {
        return $this->belongsTo(Invoice::class, 'invoice_id', 'id');
    }
    public function subcategory()
    {

        return $this->belongsTo('App\Models\SubCategory', 'subcategory_id', 'id');
    }

    public function unitText()
    {$text='';
        if ($this->unit == 'piece') {
            $text ='piece';
        } elseif ($this->unit == 'g') {
            $text = 'gram';
        } elseif ($this->unit == 'kg') {
            $text = 'kilo_gram';
        }

        return $text;
    }

}
