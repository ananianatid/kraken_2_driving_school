<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AcademicClass newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AcademicClass newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AcademicClass query()
 */
	class AcademicClass extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $year Ex: 2025
 * @property string $start_month 1 = janvier
 * @property string $end_month 12 = décembre
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Period newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Period newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Period query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Period whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Period whereEndMonth($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Period whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Period whereStartMonth($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Period whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Period whereYear($value)
 */
	class Period extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property string $readable_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Permission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Permission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Permission query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Permission whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Permission whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Permission whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Permission whereReadableName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Permission whereUpdatedAt($value)
 */
	class Permission extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $permission_id
 * @property int $role_id
 * @property int $value
 * @property string|null $expires
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PermissionRole newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PermissionRole newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PermissionRole query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PermissionRole whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PermissionRole whereExpires($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PermissionRole wherePermissionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PermissionRole whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PermissionRole whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PermissionRole whereValue($value)
 */
	class PermissionRole extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $user_id
 * @property int $permission_id
 * @property int $value
 * @property string|null $expires
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PermissionUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PermissionUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PermissionUser query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PermissionUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PermissionUser whereExpires($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PermissionUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PermissionUser wherePermissionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PermissionUser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PermissionUser whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PermissionUser whereValue($value)
 */
	class PermissionUser extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Role query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Role whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Role whereUpdatedAt($value)
 */
	class Role extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $user_id
 * @property int $role_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RoleUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RoleUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RoleUser query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RoleUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RoleUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RoleUser whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RoleUser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RoleUser whereUserId($value)
 */
	class RoleUser extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

