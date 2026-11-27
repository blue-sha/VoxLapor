<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Myth\Auth\Models\GroupModel;
use App\Models\UserModel;
use Myth\Auth\Password;

class UserPrototype extends Seeder
{
    public function run()
    {
        $userModel = model(UserModel::class);
        $groupModel = model(GroupModel::class);

        $groups = [
            'user' => $groupModel->where('name', 'user')->first(),
            'petugas' => $groupModel->where('name', 'petugas')->first(),
            'admin' => $groupModel->where('name', 'admin')->first(),
        ];

        $accounts = [
            [
                'data' => [
                    'email' => 'user.demo@kampus.ac.id',
                    'username' => 'user_demo',
                    'password_hash' => Password::hash('Password123!'),
                    'active' => 1,
                ],
                'group' => 'user',
            ],
            [
                'data' => [
                    'email' => 'petugas.demo@kampus.ac.id',
                    'username' => 'petugas_demo',
                    'full_name' => 'Petugas Kampus S.T.',
                    'password_hash' => Password::hash('Password123!'),
                    'active' => 1,
                ],
                'group' => 'petugas',
            ],
            [
                'data' => [
                    'email' => 'admin.demo@kampus.ac.id',
                    'username' => 'admin_demo',
                    'password_hash' => Password::hash('Password123!'),
                    'active' => 1,
                ],
                'group' => 'admin',
            ],
        ];

        foreach ($accounts as $account) {
            $existing = $userModel-> where('email', $account['data']['email'])->first();

            if(! $existing) {
                $userId = $userModel->insert($account['data'], true);
                if ($userId && ! empty($groups[$account['group']])) {
                    $groupModel->addUserToGroup($userId, $groups[$account['group']]->id);
                }
            }
        }
    }
}
