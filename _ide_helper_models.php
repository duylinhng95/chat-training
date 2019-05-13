<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Entities{
/**
 * App\Entities\User
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Entities\Message[] $messages
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\User query()
 */
	class User extends \Eloquent {}
}

namespace App\Entities{
/**
 * App\Entities\Message
 *
 * @property-read \App\Entities\User $receiver
 * @property-read \App\Entities\User $sender
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Message newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Message newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Message query()
 */
	class Message extends \Eloquent {}
}

