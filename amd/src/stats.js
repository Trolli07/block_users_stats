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
 * Call the service to get statistics and render them.
 *
 * @module     block_users_stats/stats.js
 * @copyright  2025 Olivier Piton
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

import Ajax from 'core/ajax';
import Templates from 'core/templates';
import Notification from 'core/notification';

export const init = () => {
    const usersContainer = document.getElementById('block-users-stats-users-items');
    const enrolmentsContainer = document.getElementById('block-users-stats-enrolments-items');

    if (!usersContainer || !enrolmentsContainer) {
        return;
    }

    const containerMapping = {
        total_users: usersContainer,
        active_users: usersContainer,
        courses_views: enrolmentsContainer,
        enrolments: enrolmentsContainer
    };

    Ajax.call([{
        methodname: 'block_users_stats_get_statistics',
        args: {}
    }])[0]
    .then(response => renderStats(response, containerMapping))
    .catch(err => Notification.exception(err));
};

/**
 * Render all the statistics items.
 *
 * @param {Object} response - The response data containing statistics
 * @param {Object} containerMapping - Mapping of stat keys to DOM containers
 */
function renderStats(response, containerMapping) {
    Object.entries(response).forEach(([key, item]) => {
        const container = containerMapping[key];
        if (!container) {
            return;
        }
        Templates.render('block_users_stats/item', item)
        .then(html => Templates.appendNodeContents(container, html, ''))
        .catch(err => Notification.exception(err));
    });
}