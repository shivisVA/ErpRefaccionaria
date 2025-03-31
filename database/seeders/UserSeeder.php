<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Arr;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Crear roles
        $roles=['admin','auxiliar','ventas','compras'];
        foreach ($roles as $role) {
            Role::create(['name' => $role]);
        }

        $permisos=[
            ['name'=>'crud product',
            'roles'=>['admin','auxiliar']
            ],

            ['name'=>'crud category',
            'roles'=>['admin','auxiliar']
            ],

            ['name'=>'crud provider',
            'roles'=>['admin','auxiliar']
            ],

            ['name'=>'crud client',
            'roles'=>['admin','auxiliar']
            ],

            ['name'=>'crud purchase',
            'roles'=>['admin','compras']
            ],

            ['name'=>'crud sale',
            'roles'=>['admin','ventas']
            ],

            ['name'=>'crud user',
            'roles'=>['admin']
            ],

        ];

        foreach ($permisos as $permiso) {
            
            // 2. Crear permisos 
            $permission= Permission::create(['name' => $permiso['name']]);

            foreach($permiso['roles'] as $rol){

                // 3. Asignar permiso a un rol
                $role=Role::where('name',$rol)->first();
                $role->givePermissionTo($permission);     

            }
           
        }

        //Usuarios
        $users=[
            ['name'=>'Silvia Guadalupe',
            'email'=>'silvia@gmail.com',
            'password'=>'password',
            'rol'=>'admin',
            ],
            ['name'=>'Mareo',
            'email'=>'mareo@gmail.com',
            'password'=>'password',
            'rol'=>'auxiliar',
            ],
            ['name'=>'Nina',
            'email'=>'nina@gmail.com',
            'password'=>'password',
            'rol'=>'compras',
            ],
            ['name'=>'Luli',
            'email'=>'luli@gmail.com',
            'password'=>'password',
            'rol'=>'ventas',
            ]
        ];

        foreach ($users as $user) {  
            $filtered = Arr::except($user, ['rol']);
            $newUser= User::create($filtered);

            $newUser->assignRole($user['rol']);
        }
    }
}
