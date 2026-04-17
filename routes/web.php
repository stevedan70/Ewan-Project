<?php

use App\Http\Middleware\Authentication;
use App\Http\Middleware\AuthenticationAPI;
use App\Models\Article;
use App\Models\Report;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

Route::get('/', function () {
    return view('login');
})->middleware([StartSession::class])->name('login');

Route::get('/logout', function () {
    session()->flush();
    return view('login');
})->middleware([StartSession::class, Authentication::class]);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware([StartSession::class, Authentication::class]);

Route::get('/account', function () {
    return view('account');
})->middleware([StartSession::class, Authentication::class]);

Route::get('/users', function () {
    return view('users');
})->middleware([StartSession::class, Authentication::class]);

Route::get('/users/delete', function (Request $request) {
    User::where('id', $request->get('id'))->delete();
    return view('users');
})->middleware([StartSession::class, Authentication::class]);

Route::get('/articles', function () {
    return view('articles');
})->middleware([StartSession::class, Authentication::class]);

Route::get('/articles/delete', function (Request $request) {
    Article::where('id', $request->get('id'))->delete();
    return view('articles');
})->middleware([StartSession::class, Authentication::class]);

Route::get('/reports', function () {
    return view('reports');
})->middleware([StartSession::class, Authentication::class]);

Route::get('/reports/delete', function (Request $request) {
    Report::where('id', $request->get('id'))->delete();
    return view('reports');
})->middleware([StartSession::class, Authentication::class]);

Route::prefix('api')
    ->group(function () {
        Route::post('/login', function (Request $request) {
            $user = User::where('username', $request->get('username'))->first();
            if (!$user) {
                return response()->json(['error' => 'Invalid credentials'], 422);
            }
            if (!Hash::check($request->get('password'), $user->password)) {
                return response()->json(['error' => 'Invalid credentials'], 422);
            }

            $token = Str::random(120);
            User::where('id', $user->id)->update([
                'token' => $token,
            ]);

            session()->put('token', $token);

            return response()->json([
                'token' => $token,
            ]);
        })->middleware([StartSession::class]);

        Route::post('/users', function (Request $request) {
            $validations = [
                'name' => 'required',
                'username' => 'required',
            ];
            if (!$request->get('id')) {
                $validations['password'] = 'required';
            }

            $validator = Validator::make($request->all(), $validations);

            if ($validator->fails()) {
                return response()->json([
                    'error' => $validator->errors(),
                ], 422);
            }

            try {
                if ($request->get('id')) {
                    $data = [
                        'name' => $request->get('name'),
                        'birthday' => $request->get('birthday'),
                        'id_number' => $request->get('id_number'),
                        'username' => $request->get('username'),
                        'email' => $request->get('username') . '@example.com',
                        'role' => $request->get('role'),
                    ];
                    if ($request->get('password')) {
                        $data['password'] = Hash::make($request->get('password'));
                    }

                    User::where('id', $request->get('id'))->update($data);

                    return response()->json([
                        'id' => $request->get('id'),
                    ]);
                } else {
                    $id = User::create([
                        'name' => $request->get('name'),
                        'birthday' => $request->get('birthday'),
                        'id_number' => $request->get('id_number'),
                        'username' => $request->get('username'),
                        'email' => $request->get('username') . '@example.com',
                        'password' => Hash::make($request->get('password')),
                        'role' => $request->get('role'),
                    ])->id;

                    return response()->json([
                        'id' => $id,
                    ]);
                }
            } catch (\Exception $e) {
                return response()->json(['error' => $e->getMessage()], 422);
            }
        })->middleware([StartSession::class, AuthenticationAPI::class]);

        Route::post('/account', function (Request $request) {
            $validations = [
                'old_password' => 'required',
                'new_password' => 'required',
                'confirm_new_password' => 'required',
            ];

            $validator = Validator::make($request->all(), $validations);

            if ($validator->fails()) {
                return response()->json([
                    'error' => $validator->errors(),
                ], 422);
            }

            $user = $request->attributes->get('user');
            if (!Hash::check($request->get('old_password'), $user->password)) {
                return response()->json(['error' => 'Invalid old password'], 422);
            }


            if ($request->get('new_password') != $request->get('confirm_new_password')) {
                return response()->json(['error' => 'New password do not match with confirmation password'], 422);
            }

            try {
                $data = [
                    'password' => Hash::make($request->get('new_password')),
                ];

                User::where('id', $user->id)->update($data);

                return response()->json([
                    'id' => $user->id,
                ]);
            } catch (\Exception $e) {

                return response()->json(['error' => $e->getMessage()], 422);
            }
        })->middleware([StartSession::class, AuthenticationAPI::class]);

        Route::get('/articles', function (Request $request) {
            return response()->json(DB::table('articles')->get());
        });

        Route::get('/articles/{id}', function ($id) {
            return response()->json(DB::table('articles')->where('id', $id)->first());
        });

        Route::post('/articles', function (Request $request) {
            $validations = [
                'title' => 'required',
                'content' => 'required',
                'reading_time' => 'required',
                'publish_date' => 'required',
            ];

            $validator = Validator::make($request->all(), $validations);

            if ($validator->fails()) {
                return response()->json([
                    'error' => $validator->errors(),
                ], 422);
            }

            try {
                if ($request->get('id')) {
                    $data = [
                        'title' => $request->get('title'),
                        'content' => $request->get('content'),
                        'reading_time' => $request->get('reading_time'),
                        'publish_date' => $request->get('publish_date'),
                    ];

                    Article::where('id', $request->get('id'))->update($data);

                    return response()->json([
                        'id' => $request->get('id'),
                    ]);
                } else {
                    $id = Article::create([
                        'title' => $request->get('title'),
                        'content' => $request->get('content'),
                        'reading_time' => $request->get('reading_time'),
                        'publish_date' => $request->get('publish_date'),
                    ])->id;

                    return response()->json([
                        'id' => $id,
                    ]);
                }
            } catch (\Exception $e) {
                return response()->json(['error' => $e->getMessage()], 422);
            }
        })->middleware([StartSession::class, AuthenticationAPI::class]);

        Route::get('/reports', function (Request $request) {
            $user = $request->attributes->get('user');

            return response()->json(DB::table('reports')->where("user_id", $user->id)->get());
        })->middleware([AuthenticationAPI::class]);

        Route::get('/reports/{id}', function ($id) {
            return response()->json(DB::table('reports')->where('id', $id)->first());
        });

        Route::post('/reports', function (Request $request) {
            $validations = [
                'category' => 'required',
                'location' => 'required',
                'date_time' => 'required',
                'status' => 'required',
                'description' => 'required',
                'file_1' => 'file',
                'file_2' => 'file',
                'file_3' => 'file',
            ];

            $validator = Validator::make($request->all(), $validations);

            if ($validator->fails()) {
                return response()->json([
                    'error' => $validator->errors(),
                ], 422);
            }

            $file1 = null;
            $file2 = null;
            $file3 = null;

            // Store the file in the public storage disk
            try {
                if ($request->hasFile('file_1')) {
                    $file = $request->file('file_1');
                    // Generate a new file name with a unique identifier and the original extension
                    $file1 = Str::random(32) . '.' . $file->getClientOriginalExtension();
                    // Store the file
                    $file->storeAs('uploads', $file1, 'public');
                }

                if ($request->hasFile('file_2')) {
                    $file = $request->file('file_2');
                    // Generate a new file name with a unique identifier and the original extension
                    $file2 = Str::random(32) . '.' . $file->getClientOriginalExtension();
                    // Store the file
                    $file->storeAs('uploads', $file2, 'public');
                }

                if ($request->hasFile('file_3')) {
                    $file = $request->file('file_3');
                    // Generate a new file name with a unique identifier and the original extension
                    $file3 = Str::random(32) . '.' . $file->getClientOriginalExtension();
                    // Store the file
                    $file->storeAs('uploads', $file3, 'public');
                }
            } catch (\Exception $e) {
                return response()->json(['error' => $e->getMessage()], 422);
            }

            $user = $request->attributes->get('user');

            // file path
            // storage/upload/filename

            try {

                if ($request->get('id')) {
                    $data = [
                        'user_id' => $user->id,
                        'category' => $request->get('category'),
                        'location' => $request->get('location'),
                        'date_time' => $request->get('date_time'),
                        'involved_student_name' => $request->get('involved_student_name'),
                        'status' => $request->get('status'),
                        'description' => $request->get('description'),
                        'file_1' => $file1,
                        'file_2' => $file2,
                        'file_3' => $file3,
                        'is_private' => (int)$request->get('is_private', 0)
                    ];

                    Report::where('id', $request->get('id'))->update($data);

                    return response()->json([
                        'id' => $request->get('id'),
                    ]);
                } else {
                    $id = Report::create([
                        'user_id' => $user->id,
                        'category' => $request->get('category'),
                        'location' => $request->get('location'),
                        'date_time' => $request->get('date_time'),
                        'involved_student_name' => $request->get('involved_student_name'),
                        'status' => $request->get('status'),
                        'description' => $request->get('description'),
                        'file_1' => $file1,
                        'file_2' => $file2,
                        'file_3' => $file3,
                        'is_private' => (int)$request->get('is_private', 0)
                    ])->id;

                    return response()->json([
                        'id' => $id,
                    ]);
                }
            } catch (\Exception $e) {
                Log::info("report.create.error" . $e->getMessage());
                return response()->json(['error' => $e->getMessage()], 422);
            }
        })->middleware([StartSession::class, AuthenticationAPI::class]);
    });
