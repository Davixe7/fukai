<?php

use Illuminate\Database\Seeder;
use App\Project_path;

class ProjectPathTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Project_path::create([
            'code' => 'SCHEME',
            'folder_path' => 'http://',
            'status' => '1'
        ]);
        Project_path::create([
            'code' => 'HOST',
            'folder_path' => 'sitco.homeip.net/',
            'status' => '1'
        ]);
        Project_path::create([
            'code' => 'BASE',
            'folder_path' => 'fukai',
            'status' => '1'
        ]);
        Project_path::create([
            'code' => 'IMG',
            'folder_path' => 'img/',
            'status' => '1'
        ]);
        Project_path::create([
            'code' => 'JS',
            'folder_path' => 'js/',
            'status' => '1'
        ]);
        Project_path::create([
            'code' => 'CSS',
            'folder_path' => 'css/',
            'status' => '1'
        ]);
        Project_path::create([
            'code' => 'POST_CREATE',
            'folder_path' => 'st-inc/post_create.php',
            'status' => '1'
        ]);
        Project_path::create([
            'code' => 'POST_EDIT',
            'folder_path' => 'st-inc/post_edit.php',
            'status' => '1'
        ]);
        Project_path::create([
            'code' => 'POST_DEL',
            'folder_path' => 'st-inc/post_del.php',
            'status' => '1'
        ]);
        Project_path::create([
            'code' => 'POSTS',
            'folder_path' => 'content/posts/',
            'status' => '1'
        ]);
    }
}
