<?php

// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * @package    block_users_stats
 * @copyright  2025 Olivier Piton
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die;

/**
 * @throws core\exception\coding_exception
 * @throws core\exception\moodle_exception
 * @throws dml_exception
 */
function block_users_stats_get_statistics(): array
{
    global $DB;

    // Get statistics from cache.
    $cache = cache::make('block_users_stats', 'users_stats');
    $stats = $cache->get('users_stats');

    // Get settings.
    $settings = get_config('block_users_stats');

    // Check if we need to refresh the statistics.
    if (empty($stats)) {
        // Caches purged.
        $must_refresh = true;
    } elseif ($settings->refresh_time_hours * 3600 + $settings->refresh_time_minutes * 60 < $stats['last_update'] - time()) {
        // Statistics expired.
        $must_refresh = true;
    } else {
        // OK.
        $must_refresh = false;
    }

    if ($must_refresh) {
        // Lock.
        $cache->acquire_lock('users_stats');

        // Calculate statistics.
        $stats = [
            'total_users' => $DB->count_records_sql(
                "SELECT COUNT(u.id)
                FROM {user} u
                WHERE u.deleted = 0"
            ),
            'active_users' => $DB->count_records_sql(
                "SELECT COUNT(u.id)
                FROM {user} u
                WHERE u.deleted = 0
                    AND u.currentlogin > UNIX_TIMESTAMP() - 86400"
            ),
            'enrolments' => $DB->count_records_sql(
                "SELECT COUNT(ue.id)
                FROM {user} u
                JOIN {user_enrolments} ue ON ue.userid = u.id
                JOIN {enrol} e ON e.id = ue.enrolid
                WHERE u.deleted = 0
                    AND ue.status = 0
                    AND e.status = 0
                    AND (ue.timestart = 0 OR ue.timestart < UNIX_TIMESTAMP())
                    AND (ue.timeend = 0 OR ue.timeend > UNIX_TIMESTAMP())"
            ),
            'courses_views' => $DB->count_records_sql(
                "SELECT COUNT(ul.id)
                FROM {user_lastaccess} ul
                WHERE ul.timeaccess > UNIX_TIMESTAMP() - 86400"
            ),
            'last_update' => time(),
        ];

        // Unlock.
        $cache->release_lock('users_stats');

        // Cache statistics.
        $cache->set('users_stats', $stats);
    }

    return $stats;
}
