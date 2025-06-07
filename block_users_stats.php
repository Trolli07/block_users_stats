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

use block_users_stats\output\content_renderable;
use block_users_stats\output\renderer;

/**
 * Users stats block.
 *
 * @copyright  2025 Olivier Piton
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class block_users_stats extends block_base
{
    /**
     * Initializes block.
     *
     * @throws core\exception\coding_exception
     */
    public function init(): void
    {
        $this->title = get_string('pluginname', 'block_users_stats');
    }

    /**
     * Gets the block contents.
     *
     * @throws core\exception\moodle_exception
     */
    public function get_content(): stdClass
    {
        global $PAGE;

        // Check if content has already been generated.
        if ($this->content !== null) {
            return $this->content;
        }

        // Initialize content.
        $this->content = new stdClass;
        $this->content->text = '';
        $this->content->footer = '';

        if (! has_capability('block/users_stats:myaddinstance', $this->page->context)) {
            return $this->content;
        }

        // Render content.
        /* @var renderer $renderer */
        $renderer = $this->page->get_renderer('block_users_stats');
        $renderable = new content_renderable;
        $this->content->text = $renderer->render_content($renderable);

        $PAGE->requires->js_call_amd('block_users_stats/stats', 'init');

        return $this->content;
    }

    /**
     * The block can only be displayed on the "my" page.
     */
    public function applicable_formats(): array
    {
        return [
            'my' => true,
        ];
    }

    /**
     * Do not allow multiple instances of the block.
     */
    public function instance_allow_multiple(): bool
    {
        return false;
    }

    /**
     * This plugin has settings, but it does not have any configurable options for individual block instances.
     */
    public function has_config(): bool
    {
        return true;
    }
}
