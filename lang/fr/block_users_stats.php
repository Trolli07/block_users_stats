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
$string['pluginname'] = 'Statistiques des utilisateurs';
$string['users_stats:addinstance'] = 'Ajouter un bloc de statistiques des utilisateurs';
$string['users_stats:myaddinstance'] = 'Ajouter un bloc de statistiques des utilisateurs au tableau de bord';

// Privacy.
$string['privacy:metadata'] = 'Le bloc Statistiques des utilisateurs ne stocke aucune donnée personnelle.';

// Cache.
$string['cachedef_stats'] = 'Cache des statistiques des utilisateurs';

// Settings.
$string['settings'] = 'Paramètres des statistiques des utilisateurs';
$string['settingsdesc'] = 'Configurer les paramètres du bloc de statistiques des utilisateurs.';
$string['refresh_interval'] = 'Rafraîchir les statistiques toutes les';
$string['refresh_interval_desc'] = 'Les statistiques sont mises en cache pour des raisons de performance. Indiquez la durée en heures et minutes après laquelle les statistiques seront rafraîchies.';
$string['refresh_interval_hours'] = 'Intervalle de rafraîchissement';

// Labels.
$string['total_users'] = 'Nombre total d’utilisateurs';
$string['active_users'] = 'Utilisateurs actifs (24 heures)';
$string['enrolments'] = 'Inscriptions';
$string['courses_views'] = 'Nombre de consultations des cours';
$string['lastupdate'] = 'Dernière mise à jour';
$string['userstitle'] = 'Utilisateurs';
$string['enrolmentstitle'] = 'Inscriptions';
