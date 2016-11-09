<?php

namespace Mailchimp\Lists;

use Mailchimp\Resource;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

final class Member extends Resource
{
    const STATUS_SUBSCRIBED = 'subscribed';

    const STATUS_UNSUBSCRIBED = 'unsubscribed';

    const STATUS_CLEANED = 'cleaned';

    const STATUS_PENDING = 'pending';

    const EMAIL_TYPE_HTML = 'html';

    const EMAIL_TYPE_TEXT = 'text';

    protected static $path = 'lists/{list_id}/members';

    protected static $casts = [
        'merge_fields' => Collection::class
    ];

    protected static $hidden = [
        'unique_email_id',
        'stats',
        'last_note',
        '_links'
    ];

    /**
     * Get an one member from list
     *
     * @param  array $id
     * @return [type]
     */
    public static function get($id)
    {
        return static::instanceGetRequest(Arr::pull($id, 'id'), $id);
    }
}
