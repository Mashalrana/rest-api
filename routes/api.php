    <?php

    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\ArticleController;
    use App\Http\Controllers\Auth\AuthController;

    // Niet-beveiligde routes
    Route::get('/articles', [ArticleController::class, 'index']);
    Route::get('/articles/{article}', [ArticleController::class, 'show']);

    // Beveiligde routes
    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/articles', [ArticleController::class, 'store']);
        Route::put('/articles/{article}', [ArticleController::class, 'update']);
        Route::delete('/articles/{article}', [ArticleController::class, 'delete']);
    });

    // Authentificatie route voor het genereren van tokens
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

