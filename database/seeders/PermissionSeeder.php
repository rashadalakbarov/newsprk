<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            [
                'key' => 'blog.view', 
                'label' => 'Blogs View'
            ],
            [
                'key' => 'blog.create', 
                'label' => 'Blog Create'
            ],
            [
                'key' => 'blog.update', 
                'label' => 'Blog Update'
            ],
            [
                'key' => 'blog.delete', 
                'label' => 'Blog Delete'
            ],
        ];

        foreach($permissions as $permission){
            Permission::create($permission);
        }
    }
}
