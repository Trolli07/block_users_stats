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

namespace block_users_stats\output;

defined('MOODLE_INTERNAL') || die;

use core\exception\coding_exception;
use renderable;
use renderer_base;
use stdClass;
use templatable;

class content_renderable implements renderable, templatable
{
    protected string $users_title;

    protected string $enrolments_title;

    /**
     * @throws coding_exception
     */
    public function __construct()
    {
        $this->users_title = get_string('userstitle', 'block_users_stats');
        $this->enrolments_title = get_string('enrolmentstitle', 'block_users_stats');
    }

    public function export_for_template(renderer_base $output): stdClass
    {
        $data = new stdClass;
        $data->users_title = $this->users_title;
        $data->enrolments_title = $this->enrolments_title;

        return $data;
    }
}
