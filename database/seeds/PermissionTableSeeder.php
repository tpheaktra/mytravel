<?php

use Illuminate\Database\Seeder;


use App\Permission;


class PermissionTableSeeder extends Seeder

{

    /**

     * Run the database seeds.

     *

     * @return void

     */

    public function run()

    {

        $permission = [

        	[
        		'name' => 'role-list',
                'parent_id' => 1,
        		'display_name' => 'Display Role Listing',
        		'description' => 'See only Listing Of Role'
        	],

        	[
        		'name' => 'role-create',
                'parent_id' => 1,
        		'display_name' => 'Create Role',
        		'description' => 'Create New Role'
        	],

        	[

        		'name' => 'role-edit',
                'parent_id' => 1,
        		'display_name' => 'Edit Role',
        		'description' => 'Edit Role'
        	],

        	[

        		'name' => 'role-delete',
                'parent_id' => 1,
        		'display_name' => 'Delete Role',
        		'description' => 'Delete Role'
        	],

        	[

        		'name' => 'team-list',
                'parent_id' => 5,
        		'display_name' => 'Display Our Team',
        		'description' => 'See only Listing Of Item'
        	],

        	[

        		'name' => 'team-create',
                'parent_id' => 5,
        		'display_name' => 'Create Our Team',
        		'description' => 'Create New Item'
        	],

        	[

        		'name' => 'team-edit',
                'parent_id' => 5,
        		'display_name' => 'Edit Our Team',
        		'description' => 'Edit Item'

        	],

        	[

        		'name' => 'team-delete',
                'parent_id' => 5,
        		'display_name' => 'Delete Our Team',
        		'description' => 'Delete Item'

        	],

        	[

        		'name' => 'user-list',
                'parent_id' => 2,
        		'display_name' => 'Display Users',
        		'description' => 'See only Listing Of Item'
        	],

        	[

        		'name' => 'user-create',
                'parent_id' => 2,
        		'display_name' => 'Create Users',
        		'description' => 'Create New Item'
        	],

        	[

        		'name' => 'user-edit',
                'parent_id' => 2,
        		'display_name' => 'Edit Users',
        		'description' => 'Edit Item'

        	],

        	[

        		'name' => 'user-delete',
                'parent_id' => 2,
        		'display_name' => 'Delete Users',
        		'description' => 'Delete Item'

        	],

        	[

        		'name' => 'menu-list',
                'parent_id' => 3,
        		'display_name' => 'Display Menu',
        		'description' => 'See only Listing Of Item'
        	],

        	[

        		'name' => 'menu-create',
                'parent_id' => 3,
        		'display_name' => 'Create Menu',
        		'description' => 'Create New Item'
        	],

        	[

        		'name' => 'menu-edit',
                'parent_id' => 3,
        		'display_name' => 'Edit Menu',
        		'description' => 'Edit Item'

        	],

        	[

        		'name' => 'menu-delete',
                'parent_id' => 3,
        		'display_name' => 'Delete Menu',
        		'description' => 'Delete Item'

        	],

        	[

        		'name' => 'slide-list',
                'parent_id' => 4,
        		'display_name' => 'Display slide',
        		'description' => 'See only Listing Of Item'
        	],

        	[

        		'name' => 'slide-create',
                'parent_id' => 4,
        		'display_name' => 'Create slide',
        		'description' => 'Create New Item'
        	],

        	[

        		'name' => 'slide-edit',
                'parent_id' => 4,
        		'display_name' => 'Edit slide',
        		'description' => 'Edit Item'

        	],

        	[

        		'name' => 'slide-delete',
                'parent_id' => 4,
        		'display_name' => 'Delete slide',
        		'description' => 'Delete Item'

        	],

        	[

        		'name' => 'post-list',
                'parent_id' => 6,
        		'display_name' => 'Display post',
        		'description' => 'See only Listing Of Item'
        	],

        	[

        		'name' => 'post-create',
                'parent_id' => 6,
        		'display_name' => 'Create post',
        		'description' => 'Create New Item'
        	],

        	[

        		'name' => 'post-edit',
                'parent_id' => 6,
        		'display_name' => 'Edit post',
        		'description' => 'Edit Item'

        	],

        	[

        		'name' => 'post-delete',
                'parent_id' => 6,
        		'display_name' => 'Delete post',
        		'description' => 'Delete Item'

        	]


        ];


        foreach ($permission as $key => $value) {
        	Permission::create($value);
        }

    }

}


