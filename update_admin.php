<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$user = \App\Models\User::first();
if ($user) {
    $user->email = 'sinanismailaidris@gmail.com';
    $user->password = \Illuminate\Support\Facades\Hash::make('Sinan3367#');
    $user->save();
    echo "Admin password updated successfully!\n";
} else {
    \App\Models\User::create([
        'name' => 'MCC Administrator',
        'email' => 'sinanismailaidris@gmail.com',
        'password' => \Illuminate\Support\Facades\Hash::make('Sinan3367#'),
    ]);
    echo "Admin created successfully!\n";
}
