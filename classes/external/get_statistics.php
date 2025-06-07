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

namespace block_users_stats\external;

defined('MOODLE_INTERNAL') || die;

global $CFG;

require_once $CFG->dirroot.'/lib/externallib.php';
require_once $CFG->dirroot.'/blocks/users_stats/lib.php';

use core\exception\coding_exception;
use core\exception\moodle_exception;
use dml_exception;
use external_api;
use external_function_parameters;
use external_single_structure;
use external_value;

class get_statistics extends external_api
{
    public static function execute_parameters(): external_function_parameters
    {
        return new external_function_parameters([]);
    }

    /**
     * @throws coding_exception
     * @throws moodle_exception
     * @throws dml_exception
     */
    public static function execute(): array
    {
        $stats = block_users_stats_get_statistics();

        return [
            'total_users' => [
                'title' => get_string('total_users', 'block_users_stats'),
                'count' => $stats['total_users'],
            ],
            'active_users' => [
                'title' => get_string('active_users', 'block_users_stats'),
                'count' => $stats['active_users'],
            ],
            'enrolments' => [
                'title' => get_string('enrolments', 'block_users_stats'),
                'count' => $stats['enrolments'],
            ],
            'courses_views' => [
                'title' => get_string('courses_views', 'block_users_stats'),
                'count' => $stats['courses_views'],
            ],
        ];
    }

    public static function execute_returns(): external_single_structure
    {
        return new external_single_structure([
            'total_users' => new external_single_structure([
                'title' => new external_value(PARAM_TEXT, 'Localized title for total users'),
                'count' => new external_value(PARAM_INT, 'Total number of users'),
            ]),
            'active_users' => new external_single_structure([
                'title' => new external_value(PARAM_TEXT, 'Localized title for active users'),
                'count' => new external_value(PARAM_INT, 'Number of active users'),
            ]),
            'enrolments' => new external_single_structure([
                'title' => new external_value(PARAM_TEXT, 'Localized title for enrolments'),
                'count' => new external_value(PARAM_INT, 'Number of enrolments'),
            ]),
            'courses_views' => new external_single_structure([
                'title' => new external_value(PARAM_TEXT, 'Localized title for courses views'),
                'count' => new external_value(PARAM_INT, 'Number of courses views'),
            ]),
        ]);
    }
}
