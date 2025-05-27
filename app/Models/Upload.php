<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    use HasFactory; // Enables factory methods for the model, allowing for easy creation of test data.

    protected $table = 'uploads'; // Specifies the name of the database table associated with this model.

    protected $fillable = [ // Defines which attributes can be mass assignable.
        'original_filename', // The original name of the uploaded file.
        'filename',         // The name of the file as stored in the system.
        'type',             // The MIME type of the uploaded file.
        'uploaded_by',      // The ID of the user who uploaded the file.
    ];

    // Relationship: Upload belongs to a user
    public function user() // Defines a relationship method to access the user associated with the upload.
    {
        return $this->belongsTo(Usersinfo::class, 'uploaded_by'); // Specifies that this upload belongs to a user in the Usersinfo model.
    }
}