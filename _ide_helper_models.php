<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * App\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $avatar
 * @property int|null $role_id
 * @property string|null $settings
 * @property mixed $locale
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \TCG\Voyager\Models\Role|null $role
 * @property-read \Illuminate\Database\Eloquent\Collection|\TCG\Voyager\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereSettings($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

namespace App{
/**
 * App\Element
 *
 * @property int $index
 * @property string $symbol
 * @property string $name
 * @property int|null $order
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Isotope[] $isotopes
 * @property-read int|null $isotopes_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Element newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Element newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Element query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Element whereIndex($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Element whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Element whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Element whereSymbol($value)
 */
	class Element extends \Eloquent {}
}

namespace App{
/**
 * App\AcceptableRadiationLevel
 *
 * @property int $id
 * @property int $raw_id
 * @property int|null $order
 * @property int $isotope_id
 * @property float|null $level
 * @property-read \App\Isotope $isotope
 * @property-read \App\Raw $raw
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AcceptableRadiationLevel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AcceptableRadiationLevel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AcceptableRadiationLevel query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AcceptableRadiationLevel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AcceptableRadiationLevel whereIsotopeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AcceptableRadiationLevel whereLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AcceptableRadiationLevel whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AcceptableRadiationLevel whereRawId($value)
 */
	class AcceptableRadiationLevel extends \Eloquent {}
}

namespace App{
/**
 * App\Isotope
 *
 * @property int $id
 * @property float $mass
 * @property string $name
 * @property int $element_index
 * @property int|null $order
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\AcceptableRadiationLevel[] $acceptableRadiationLevels
 * @property-read int|null $acceptable_radiation_levels_count
 * @property-read \App\Element $element
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\PollutionFactor[] $pollutionFactors
 * @property-read int|null $pollution_factors_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Isotope newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Isotope newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Isotope query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Isotope whereElementIndex($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Isotope whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Isotope whereMass($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Isotope whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Isotope whereOrder($value)
 */
	class Isotope extends \Eloquent {}
}

namespace App{
/**
 * App\PollutionFactor
 *
 * @property int $id
 * @property int $soil_id
 * @property int $raw_id
 * @property int $isotope_id
 * @property float $coefficient
 * @property int|null $order
 * @property-read \App\Isotope $isotope
 * @property-read \App\Raw $raw
 * @property-read \App\Soil $soil
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PollutionFactor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PollutionFactor newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PollutionFactor query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PollutionFactor whereCoefficient($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PollutionFactor whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PollutionFactor whereIsotopeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PollutionFactor whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PollutionFactor whereRawId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PollutionFactor whereSoilId($value)
 */
	class PollutionFactor extends \Eloquent {}
}

namespace App{
/**
 * App\Raw
 *
 * @property int $id
 * @property string $name
 * @property string|null $picture
 * @property int|null $order
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\AcceptableRadiationLevel[] $acceptableRadiationLevels
 * @property-read int|null $acceptable_radiation_levels_count
 * @property-read mixed $picture_uri
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\PollutionFactor[] $pollutionFactors
 * @property-read int|null $pollution_factors_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Raw newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Raw newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Raw query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Raw whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Raw whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Raw whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Raw wherePicture($value)
 */
	class Raw extends \Eloquent {}
}

namespace App{
/**
 * App\Soil
 *
 * @property int $id
 * @property string $name
 * @property string|null $picture
 * @property int|null $order
 * @property-read mixed $picture_uri
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\PollutionFactor[] $pollutionFactors
 * @property-read int|null $pollution_factors_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Soil newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Soil newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Soil query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Soil whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Soil whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Soil whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Soil wherePicture($value)
 */
	class Soil extends \Eloquent {}
}

