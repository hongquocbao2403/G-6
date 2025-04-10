<?php

class VipSubscription extends Model
{
    protected $fillable = ['user_id', 'subscription_id', 'start_date'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function subscription()
    {
        return $this->belongsTo(Subscription::class);
    }
}
