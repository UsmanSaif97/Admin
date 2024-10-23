<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Investor extends Model
{
    use HasFactory;

    // Append custom attributes
    protected $appends = ['profile_photo_url', 'investment_status'];

    // Investment status codes
    public static $statusRegistered = 0;
    public static $statusApproved = 1;
    public static $statusRejected = 2;
    public static $statusDeactivated = 3;

    // Investment status text labels
    public static $Registered = "Registered";
    public static $Approved = "Approved";
    public static $Rejected = "Rejected";
    public static $Deactivated = "Deactivated";

    // Specify fillable attributes to protect against mass assignment
    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'investment_amount',
        'profile_photo',
        'status', // Ensure this field exists in your database
        'admin_id', // Ensure this field exists in your database
        'city_id' // Ensure this field exists in your database
    ];

    // Relationship with an Admin
    public function admin(){
        return $this->belongsTo(Admin::class, 'admin_id', 'id');
    }

    // Relationship with City
    public function city(){
        return $this->belongsTo(City::class, 'city_id', 'id');
    }

    // Accessor for profile photo URL
    public function getProfilePhotoUrlAttribute(){
        return $this->profile_photo ? asset('storage/' . $this->profile_photo) : null;
    }

    // Accessor to get human-readable investment status
    public function getInvestmentStatusAttribute(){
        switch ($this->status) {
            case self::$statusApproved:
                return self::$Approved;
            case self::$statusRejected:
                return self::$Rejected;
            case self::$statusDeactivated:
                return self::$Deactivated;
            default:
                return self::$Registered;
        }
    }
}
