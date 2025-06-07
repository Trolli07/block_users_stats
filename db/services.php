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

$functions = [
    'block_users_stats_get_statistics' => [
        'classname' => 'block_users_stats\external\get_statistics',
        'methodname' => 'execute',
        'description' => 'Get users statistics data',
        'type' => 'read',
        'capabilities' => 'block/users_stats:myaddinstance',
        'ajax' => true,
    ],
];

$services = [
    'Users Statistics' => [
        'functions' => ['block_users_stats_get_statistics'],
        'restrictedusers' => 0,
        'enabled' => 1,
    ],
];
