<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    // Define nama table yang perlu dihubungi oleh Model Faculty
    // Kalau tak define, nanti ia akan cari table bernama faculties (plural)
    protected $table = 'faculty';
}
