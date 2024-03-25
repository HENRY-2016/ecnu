<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrganizationsModel extends Model
{
    use HasFactory;
    protected $table = 'organizations_table';
    protected $guarded = array();
}
