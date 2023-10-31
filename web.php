 <?php
  use App\Http\Controller\IndexController;
  use Illuminate\Http\Controller\Route;

  Route::get('/',[IndexController::class ,'index']);
  Route::get('/hello',[IndexController::class ,'show']);

  
  

 ?>