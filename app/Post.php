<?php 

namespace App;


use App\User;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title','description','url'];



    /*Vamos a definir la relacion entre el user y la publicacion se dice que un post le pertenece a un usuario
*/

    public function user()
    {
    	$this->belongsTo(User::class);
    }
}
