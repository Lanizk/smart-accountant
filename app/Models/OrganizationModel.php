<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrganizationModel extends Model
{
    use HasFactory;
    protected $table='organizations';
    protected $fillable=['company_name','full_name','email','password','phone','subdomain'];




    public static function BySubdomain($query,$subdomain)
    {
        return $query->where('subdomain',$subdomain);
    }
    public static function generateUniqueSubdomain($CompanyName)
    {
        $baseSubdomain= strtolower(str_replace('','_',$CompanyName));
        $subdomain=$baseSubdomain;

        //Check for uniqueness
        $count=self::where('subdomain',$subdomain)->count();
        if($count>0)
        {
            $subdomain .= '_'.($count+1);
        }

        return $subdomain;
        
    }
}
