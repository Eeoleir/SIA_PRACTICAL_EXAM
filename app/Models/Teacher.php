<?php

    namespace App\Models;
    use Illuminate\Database\Eloquent\Model;

    class Teacher extends Model{
        protected $table = 'tblteacher';
        protected $fillable = [
            'lastname','firstname', 'middlename', 'bday', 'age'
        ];

        public $timestamps = false;
        protected $primaryKey = 'teacherid';
    }

