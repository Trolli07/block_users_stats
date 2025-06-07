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

// Plugin name and capabilities.
$string['pluginname'] = 'Users statistics';
$string['users_stats:addinstance'] = 'Add a new users statistics block';
$string['users_stats:myaddinstance'] = 'Add a new users statistics block to Dashboard';

// Privacy.
$string['privacy:metadata'] = 'The Users statistics block does not store any personal data.';

// Cache.
$string['cachedef_stats'] = 'Users statistics cache';

// Settings.
$string['settings'] = 'Users statistics settings';
$string['settingsdesc'] = 'Configure the users statistics block settings.';
$string['refresh_interval'] = 'Refresh the statistics every';
$string['refresh_interval_desc'] = 'The statistics are cached for performance reasons. Set the time in hours/minutes after which the statistics are refreshed.';
$string['refresh_interval_hours'] = 'Refresh interval';

// Labels.
$string['total_users'] = 'Total users';
$string['active_users'] = 'Active users (24 hours)';
$string['enrolments'] = 'Enrolments';
$string['courses_views'] = 'Number of course views';
$string['lastupdate'] = 'Last updated';
$string['userstitle'] = 'Users';
$string['enrolmentstitle'] = 'Enrolments';
