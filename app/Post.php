<?php 

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title','description','url'];

     protected $casts = ['user_id' => 'integer'];



    /*Vamos a definir la relacion entre el user y la publicacion se dice que un post le pertenece a un usuario
*/

    public function user()
    {
      return  $this->belongsTo(User::class);
    }

    public function wasCreatedBy($user)
    {
        if( is_null($user) ) {
            return false;
        }
        return $this->user_id === $user->id;
    }

}

