<?php

use App\Models\Role_User\Category;
use App\Models\Role_User\Permission;
use App\Models\Role_User\Role;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Desacticar todas las claves foraneas
        DB::statement('SET foreign_key_checks=0');
        //Truncar o vaciar las tablas
        DB::table('role_user')->truncate();
        DB::table('permission_role')->truncate();
        Permission::truncate();
        Role::truncate();
        Category::truncate();

        $useradmin = User::where('email', 'admin@upfim.edu.mx')->first();
        if ($useradmin) {
            $useradmin->delete();
        }
        $useradmin = User::create([

            'name' => 'admin',
            'email' => 'admin@upfim.edu.mx',
            'password' => Hash::make('1234'), // password sin encriptar
            'typeUser' =>'administrador'
        ]);
        

        $userdirective = User::where('email', 'directivo@upfim.edu.mx')->first();
        if ($userdirective) {
            $userdirective->delete();
        }
        $userdirective = User::create([

            'name' => 'Directivo',
            'email' => 'directivo@upfim.edu.mx',
            'password' => Hash::make('1234'), // password sin encriptar
            'typeUser' =>'directivo'
        ]);
        


        $userstudent = User::where('email', 'alumno@upfim.edu.mx')->first();
        if ($userstudent) {
            $userstudent->delete();
        }
        $userstudent = User::create([

            'name' => 'alumno',
            'email' => 'alumno@upfim.edu.mx',
            'password' => Hash::make('1234'), // password sin encriptar
            'typeUser' =>'alumno'
        ]);


        //rol de admin
        $roleadmin = Role::create([
            'name' => 'Admin',
            'slug' => 'admin',
            'description' => 'Administrador',
            'full_access' => 'yes'
        ]);
        //Definir role_user
        $useradmin->roles()->sync([$roleadmin->id]);

        //rol de directivo
        $roledirective = Role::create([
            'name' => 'Directivo',
            'slug' => 'directivo',
            'description' => 'Directivo de universidad',
            'full_access' => 'no'
        ]);


        //Definir role_user
        $userdirective->roles()->sync([$roledirective->id]);

        //rol de alumno
        $rolestudent = Role::create([
            'name' => 'Alumno',
            'slug' => 'alumno',
            'description' => 'Alumno',
            'full_access' => 'no'
        ]);


        //Definir role_user
        $userstudent->roles()->sync([$rolestudent->id]);



        //Categorias
        $user_category = Category::create([
            'name' => 'User',
            'description' => 'Todas las funciones de usuario'
        ]);
        $role_category = Category::create([
            'name' => 'Role',
            'description' => 'Todas las funciones de los roles'
        ]);
        $self_category = Category::create([
            'name' => 'Category',
            'description' => 'Todas las funciones de categoria'
        ]);

        $academy_unit_category = Category::create([
            'name' => 'Unidad Academica',
            'description' => 'Selecciona '
        ]);        

        $directive_category = Category::create([
            'name' => 'Directivo',
            'description' => 'Todas las funciones de Directivo'
        ]);

        $student_category = Category::create([
            'name' => 'Alumno',
            'description' => 'Todas las funciones de Alumno'
        ]);


        

        //Permissions
        $permission_all = [];

        //permission_role


        //====================USERS
        //permission_role
        $permission = Permission::create([
            'category_id' => $user_category->id,
            'name' => 'Listar usuarios',
            'slug' => 'user.index',
            'description' => 'Puede ver la lista de usuarios'
        ]);
        //add permission to array
        $permission_all[] = $permission->id;
        $permission = Permission::create([
            'category_id' => $user_category->id,
            'name' => 'Ver usuario',
            'slug' => 'user.show',
            'description' => 'Puede ver a un usuario'
        ]);

        $permission_all[] = $permission->id;



        //add permission to array

        //add permission to array
        $permission_all[] = $permission->id;
        $permission = Permission::create([
            'category_id' => $user_category->id,
            'name' => 'Editar usuario',
            'slug' => 'user.edit',
            'description' => 'Puede editar usuarios'
        ]);
        //add permission to array
        $permission_all[] = $permission->id;




        $permission = Permission::create([
            'category_id' => $user_category->id,
            'name' => 'Borrar usuarios',
            'slug' => 'user.destroy',
            'description' => 'Puede borrar usuarios'
        ]);


        //add permission to array
        $permission_all[] = $permission->id;




        //add global permission to array
        $permission = Permission::create([
            'category_id' => $user_category->id,
            'name' => 'Editar perfil',
            'slug' => 'userown.edit',
            'description' => 'El usuario puede editar su perfil'
        ]);
        //add golbal permission to array
        $permission_all[] = $permission->id;



        $permission = Permission::create([
            'category_id' => $user_category->id,
            'name' => 'Ver perfil',
            'slug' => 'userown.show',
            'description' => 'El usuario puede ver su perfil'
        ]);
        $permission_all[] = $permission->id;


        //======================Role
        $permission = Permission::create([
            'category_id' => $role_category ->id,
            'name' => 'Listar roles',
            'slug' => 'role.index',
            'description' => 'Puede ver la lista de los roles'
        ]);
        //add permission to array
        $permission_all[] = $permission->id;
        $permission = Permission::create([
            'category_id' => $role_category ->id,
            'name' => 'Ver rol',
            'slug' => 'role.show',
            'description' => 'Usuario puede ver un rol'
        ]);
        //add permission to array
        $permission_all[] = $permission->id;
        $permission = Permission::create([
            'category_id' => $role_category ->id,
            'name' => 'Crear rol',
            'slug' => 'role.create',
            'description' => 'El usuario puede crear roles'
        ]);
        //add permission to array
        $permission_all[] = $permission->id;
        $permission = Permission::create([
            'category_id' => $role_category ->id,
            'name' => 'Editar roles',
            'slug' => 'role.edit',
            'description' => 'Puede editar roles'
        ]);
        //add permission to array
        $permission_all[] = $permission->id;

        $permission = Permission::create([
            'category_id' => $role_category ->id,
            'name' => 'Borrar roles',
            'slug' => 'role.destroy',
            'description' => 'El usuario puede borrar'
        ]);


        //add permission to array
        $permission_all[] = $permission->id;



        //=====================Category===================


        $permission = Permission::create([
            'category_id' => $self_category->id,
            'name' => 'Listar categorías',
            'slug' => 'category.index',
            'description' => 'Lista las categorías'
        ]);
        $permission_all[] = $permission->id;

        $permission = Permission::create([
            'category_id' => $self_category->id,
            'name' => 'Crear categorias',
            'slug' => 'category.create',
            'description' => 'Puede crear categorías'
        ]);
        $permission_all[] = $permission->id;




        $permission = Permission::create([
            'category_id' => $self_category->id,
            'name' => 'Mostrar categorías',
            'slug' => 'category.show',
            'description' => 'Puede ver una categoría'
        ]);
        $permission_all[] = $permission->id;



        $permission = Permission::create([
            'category_id' => $self_category->id,
            'name' => 'Editar categoria',
            'slug' => 'category.edit',
            'description' => 'Puede editar categorias'
        ]);
        $permission_all[] = $permission->id;


        $permission = Permission::create([
            'category_id' => $self_category->id,
            'name' => 'Borrar categoria',
            'slug' => 'category.destroy',
            'description' => 'Puede eliminar categorias'
        ]);
        $permission_all[] = $permission->id;


         $permission = Permission::create([
            'category_id' => $directive_category->id,
            'name' => 'Consentrado de unidad',
            'slug' => 'report.concentradoUnidad',
            'description' => 'Puede ejecutar el reporte de concentrado unidad'
        ]);
        $permission_all[] = $permission->id;



        $roleadmin->permissions()->sync($permission_all);
    }
}
