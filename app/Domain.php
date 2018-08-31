<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use File;

class Domain extends Model
{

    protected $guarded = [];

    protected $dates = [
        'deadline'
    ];

    // appartiene ad un User
    public function user(){
        return $this->belongsTo(User::class);
    }

    //appartiene ad un customer
    public function customer(){
        return $this->belongsTo(Customer::class);
    }

    // appartiene a un Providers(domain)
    public function domain(){
        return $this->belongsTo(Providers::class, 'domain_id', 'id', 'providers');
    }

    // appartiene a un Providers(hosting)
    public function hosting(){
        return $this->belongsTo(Providers::class, 'hosting_id', 'id', 'providers');
    }

    public function getDeadlineFormattedAttribute()
    {
        $deadline = $this->deadline;
        if(!is_null($deadline))
        return $deadline->format('d-m-Y');
    }

    public function setDeadlineAttribute($deadline) {

        if(is_string($deadline)) $deadline = Carbon::createFromFormat('d-m-Y', $deadline);
        $this->attributes['deadline'] = $deadline;

    }


    public function getAmountFormattedAttribute()
    {
        $amount = $this->amount;
        return number_format($amount, 2, ',', '');
    }

    public function setAmountAttribute($amount)
    {
        $this->attributes['amount'] = $this->floatvalue($amount);
    }


    public function getScreenshootAttribute($screenshoot)
    {
        return ($screenshoot) ? '/storage/' . $screenshoot : '';
    }

    public function setScreenshootAttribute($screenshoot)
    {
        if(File::exists(public_path($this->screenshoot))) File::delete(public_path($this->screenshoot)); // elimino il vecchio file se esiste

        $this->attributes['screenshoot'] = $screenshoot;
    }

    public function floatvalue($val){
        $val = str_replace(",",".",$val);
        $val = preg_replace('/\.(?=.*\.)/', '', $val);
        return floatval($val);
    }

    public function scopeUpdateDeadlineNextYear($query){
        return $query->whereDate('deadline', '<=', Carbon::now()->subMonth()->endOfMonth())
            ->where('payed', 1);
    }

    public function scopeExpiring($query){
        return $query->whereMonth('deadline', Carbon::today()->month)
            ->whereYear('deadline' , Carbon::today()->year);
    }

    public function scopeToPay($query){
        return $query->where('payed', 0)
            ->whereDate('deadline', '<=', Carbon::now()->endOfMonth());
    }

}